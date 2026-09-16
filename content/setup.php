<?php
/**
 * Demo content for the Fieldpass site.
 *
 * Creates the pages, blog posts, FAQ library, forms and settings.
 * Run once on a fresh install (WordPress Playground does this automatically
 * through blueprint.json). Safe to run again: it skips anything that exists.
 *
 * Local run:  wp eval-file content/setup.php
 *
 * This is demo scaffolding only. On a real project, content is entered
 * by the team in WordPress, not by a script.
 */

defined( 'ABSPATH' ) || exit;

// Act as the admin, so WordPress keeps the block markup exactly as written.
wp_set_current_user( 1 );

/* --------------------------------------------------------------------------
 * Helpers
 * ----------------------------------------------------------------------- */

/**
 * Get a theme pattern's markup, with nested pattern references expanded,
 * so saved pages contain plain, editable blocks.
 */
function fp_setup_pattern( $slug ) {
	$pattern = WP_Block_Patterns_Registry::get_instance()->get_registered( $slug );
	if ( ! $pattern ) {
		fp_setup_log( "Missing pattern: $slug" );
		return '';
	}
	return preg_replace_callback(
		'#<!-- wp:pattern \{"slug":"([^"]+)"\} /-->#',
		function ( $m ) {
			return fp_setup_pattern( $m[1] );
		},
		$pattern['content']
	);
}

function fp_setup_log( $msg ) {
	if ( defined( 'WP_CLI' ) && WP_CLI ) {
		WP_CLI::log( $msg );
	}
}

function fp_setup_page( $slug, $title, $content, $excerpt, $template = '' ) {
	$existing = get_page_by_path( $slug );
	if ( $existing ) {
		return $existing->ID;
	}
	$id = wp_insert_post(
		array(
			'post_type'    => 'page',
			'post_status'  => 'publish',
			'post_name'    => $slug,
			'post_title'   => $title,
			'post_content' => $content,
			'post_excerpt' => $excerpt,
			'meta_input'   => $template ? array( '_wp_page_template' => $template ) : array(),
		)
	);
	fp_setup_log( "Page: $title" );
	return $id;
}

function fp_setup_find( $title, $post_type ) {
	$found = get_posts(
		array(
			'post_type'   => $post_type,
			'title'       => $title,
			'post_status' => 'any',
			'numberposts' => 1,
			'fields'      => 'ids',
		)
	);
	return $found ? (int) $found[0] : 0;
}

function fp_p( $text ) {
	return "<!-- wp:paragraph -->\n<p>$text</p>\n<!-- /wp:paragraph -->\n\n";
}
function fp_h( $text, $level = 2 ) {
	$attr = 2 === $level ? '' : ' {"level":' . $level . '}';
	return "<!-- wp:heading$attr -->\n<h$level class=\"wp-block-heading\">$text</h$level>\n<!-- /wp:heading -->\n\n";
}
function fp_ul( $items ) {
	$out = "<!-- wp:list -->\n<ul class=\"wp-block-list\">";
	foreach ( $items as $item ) {
		$out .= "<!-- wp:list-item -->\n<li>$item</li>\n<!-- /wp:list-item -->";
	}
	return $out . "</ul>\n<!-- /wp:list -->\n\n";
}
function fp_ol( $items ) {
	$out = "<!-- wp:list {\"ordered\":true} -->\n<ol class=\"wp-block-list\">";
	foreach ( $items as $item ) {
		$out .= "<!-- wp:list-item -->\n<li>$item</li>\n<!-- /wp:list-item -->";
	}
	return $out . "</ol>\n<!-- /wp:list -->\n\n";
}

/* --------------------------------------------------------------------------
 * Settings
 * ----------------------------------------------------------------------- */

update_option( 'blogname', 'Fieldpass' );
update_option( 'blogdescription', 'Digital ticketing for school events' );
global $wp_rewrite;
$wp_rewrite->set_permalink_structure( '/%postname%/' ); // Pretty links like /help-centre/.
update_option( 'default_comment_status', 'closed' );
update_option( 'timezone_string', 'America/Chicago' );

// Remove WordPress's sample content.
foreach ( array( 'hello-world' => 'post', 'sample-page' => 'page' ) as $fp_slug => $fp_type ) {
	$fp_sample = get_page_by_path( $fp_slug, OBJECT, $fp_type );
	if ( $fp_sample ) {
		wp_delete_post( $fp_sample->ID, true );
	}
}

/* --------------------------------------------------------------------------
 * Blog categories and posts
 * ----------------------------------------------------------------------- */

wp_update_term( 1, 'category', array( 'name' => 'News', 'slug' => 'news' ) );
$fp_cat_guides  = term_exists( 'guides', 'category' ) ?: wp_insert_term( 'Guides', 'category', array( 'slug' => 'guides', 'description' => 'Step-by-step help for families buying tickets.' ) );
$fp_cat_schools = term_exists( 'for-schools', 'category' ) ?: wp_insert_term( 'For schools', 'category', array( 'slug' => 'for-schools', 'description' => 'Practical tips for running school events.' ) );

$fp_posts = array(
	array(
		'slug'    => 'how-to-find-your-tickets',
		'title'   => 'How to find your tickets after you buy',
		'cat'     => $fp_cat_guides['term_id'],
		'date'    => '-2 days',
		'excerpt' => 'Your tickets arrive by email a minute after you pay. Here is where to look, and what to do if they are missing.',
		'content' => fp_p( 'When you buy tickets with Fieldpass, they are sent to the email address you entered at checkout. The email usually arrives within a minute. You don\'t need an account.' )
			. fp_h( 'Where to look' )
			. fp_ol(
				array(
					'Open the email from Fieldpass with the event name in the subject line.',
					'Tap <strong>View tickets</strong>. Your tickets open in your phone browser.',
					'Keep the email. You can open your tickets from it as many times as you need.',
				)
			)
			. fp_h( 'If the email is missing' )
			. fp_ul(
				array(
					'Check your spam, junk or promotions folder.',
					'Search your inbox for "Fieldpass".',
					'Use the <strong>Resend my tickets</strong> link on the event page and enter the email you used.',
				)
			)
			. fp_p( 'Still nothing after 15 minutes? <a href="' . esc_url( home_url( '/contact/' ) ) . '">Send us a message</a> with your name and the event, and we\'ll find your order.' ),
	),
	array(
		'slug'    => 'what-to-expect-at-the-gate',
		'title'   => 'What to expect at the gate',
		'cat'     => $fp_cat_guides['term_id'],
		'date'    => '-9 days',
		'excerpt' => 'How ticket scanning works at school events, and what to do if your phone dies before you get in.',
		'content' => fp_p( 'Most school events using Fieldpass check tickets at the entrance with a phone scanner. It takes a few seconds per person.' )
			. fp_h( 'Before you leave home' )
			. fp_ul(
				array(
					'Open your tickets once so they load on your phone.',
					'Turn up your screen brightness. It helps the scanner read the code.',
					'Buying for a group? You can show all tickets from one phone, or send each person their own.',
				)
			)
			. fp_h( 'At the entrance' )
			. fp_p( 'Show the code on your screen to the staff member. A green check means you\'re in. Each ticket can only be scanned once.' )
			. fp_h( 'If your phone battery dies' )
			. fp_p( 'Go to the ticket table at the entrance. Staff can look up your order with your name and email address and let you in.' ),
	),
	array(
		'slug'    => 'speed-up-entry-on-game-night',
		'title'   => 'Five ways to speed up entry on game night',
		'cat'     => $fp_cat_schools['term_id'],
		'date'    => '-20 days',
		'excerpt' => 'Long lines at the gate mean missed kickoffs. Five simple changes that get fans in faster.',
		'content' => fp_p( 'A slow gate is the most common complaint at school events. These five changes help, and none of them cost extra.' )
			. fp_h( '1. Sell online before the day' )
			. fp_p( 'Share the ticket link with families a week ahead. Every ticket sold online is one less cash payment at the gate.' )
			. fp_h( '2. Open more than one scan line' )
			. fp_p( 'Any staff phone can be a scanner. Add a second or third line for the 20 minutes before start time.' )
			. fp_h( '3. Keep a separate line for problems' )
			. fp_p( 'Send anyone with a missing ticket or a dead phone to one table, so the main lines keep moving.' )
			. fp_h( '4. Put up clear signs' )
			. fp_p( 'A simple sign that says "Have your ticket open" saves a few seconds per person. It adds up.' )
			. fp_h( '5. Check the numbers after the game' )
			. fp_p( 'Look at the scan report to see when the rush peaked. Plan next week\'s staffing around it.' ),
	),
);

foreach ( $fp_posts as $fp_post ) {
	if ( get_page_by_path( $fp_post['slug'], OBJECT, 'post' ) ) {
		continue;
	}
	wp_insert_post(
		array(
			'post_type'     => 'post',
			'post_status'   => 'publish',
			'post_name'     => $fp_post['slug'],
			'post_title'    => $fp_post['title'],
			'post_content'  => $fp_post['content'],
			'post_excerpt'  => $fp_post['excerpt'],
			'post_category' => array( (int) $fp_post['cat'] ),
			'post_date'     => wp_date( 'Y-m-d H:i:s', strtotime( $fp_post['date'] ) ),
		)
	);
	fp_setup_log( 'Post: ' . $fp_post['title'] );
}

/* --------------------------------------------------------------------------
 * FAQ library
 * ----------------------------------------------------------------------- */

$fp_faqs = array(
	'buying-tickets' => array(
		'name'  => 'Buying tickets',
		'items' => array(
			array( 'Do I need an account to buy tickets?', 'No. You only need an email address. Your tickets are sent there right after you pay.' ),
			array( 'Which payment methods can I use?', 'Debit and credit cards, Apple Pay and Google Pay.' ),
			array( 'I didn\'t get my ticket email. What now?', 'Check your spam or promotions folder first. If it isn\'t there, use the "Resend my tickets" link on the event page and enter the email you used.' ),
		),
	),
	'at-the-event'   => array(
		'name'  => 'At the event',
		'items' => array(
			array( 'How do I show my ticket?', 'Open your ticket email and tap "View tickets". Staff scan the code on your screen. A printed ticket works too.' ),
			array( 'What if my phone battery dies?', 'Go to the ticket table at the entrance. Staff can look up your order with your name and email.' ),
			array( 'Can I send a ticket to someone else?', 'Yes. Forward the ticket email, or tap "Send ticket" and enter their email address.' ),
		),
	),
	'refunds'        => array(
		'name'  => 'Refunds and changes',
		'items' => array(
			array( 'Can I get a refund?', 'Each school sets its own refund rules. Check the event page, or contact the school that runs the event.' ),
			array( 'What happens if an event is cancelled?', 'If the school cancels the event, you get a refund to the card you paid with. It usually shows up within 5 to 10 working days.' ),
		),
	),
	'for-schools'    => array(
		'name'  => 'For schools',
		'items' => array(
			array( 'How much does Fieldpass cost?', 'There is no setup fee and no monthly fee. A small fee is added to each ticket. Schools choose whether buyers pay it or the school covers it.' ),
			array( 'How long does setup take?', 'Usually a few days. Your support contact sets up the first event with you.' ),
			array( 'Do we need scanning equipment?', 'No. Staff scan tickets with the free scanner app on any iPhone or Android phone.' ),
			array( 'Can a district manage several schools?', 'Yes. District admins see events and reports for every school. Each school still manages its own events.' ),
		),
	),
);

foreach ( $fp_faqs as $fp_topic_slug => $fp_topic ) {
	$fp_term = term_exists( $fp_topic_slug, 'fp_faq_topic' ) ?: wp_insert_term( $fp_topic['name'], 'fp_faq_topic', array( 'slug' => $fp_topic_slug ) );
	foreach ( $fp_topic['items'] as $fp_order => $fp_item ) {
		$fp_exists = get_posts(
			array(
				'post_type'   => 'fp_faq',
				'title'       => $fp_item[0],
				'post_status' => 'any',
				'numberposts' => 1,
			)
		);
		if ( $fp_exists ) {
			continue;
		}
		$fp_faq_id = wp_insert_post(
			array(
				'post_type'    => 'fp_faq',
				'post_status'  => 'publish',
				'post_title'   => $fp_item[0],
				'post_content' => fp_p( $fp_item[1] ),
				'menu_order'   => ( $fp_order + 1 ) * 10, // 10, 20, 30: leaves room to slot new FAQs in between.
			)
		);
		wp_set_object_terms( $fp_faq_id, (int) $fp_term['term_id'], 'fp_faq_topic' );
	}
	fp_setup_log( 'FAQ topic: ' . $fp_topic['name'] );
}

/* --------------------------------------------------------------------------
 * Forms (Contact Form 7)
 * ----------------------------------------------------------------------- */

/**
 * Create a form once and return the block that shows it.
 */
function fp_setup_form( $title, $form, $subject ) {
	if ( ! class_exists( 'WPCF7_ContactForm' ) ) {
		return fp_p( '<em>Form plugin not active.</em>' );
	}
	$existing = fp_setup_find( $title, 'wpcf7_contact_form' );
	if ( $existing ) {
		$contact_form = wpcf7_contact_form( $existing );
	} else {
		$contact_form = WPCF7_ContactForm::get_template( array( 'title' => $title ) );
		$mail         = $contact_form->prop( 'mail' );
		$mail['subject']   = $subject;
		$mail['recipient'] = '[_site_admin_email]';
		$contact_form->set_properties(
			array(
				'form'                => $form,
				'mail'                => $mail,
				'mail_2'              => array_merge( $contact_form->prop( 'mail_2' ), array( 'active' => false ) ),
				// Demo mode: the form validates and shows the thank-you message, but sends no email.
				'additional_settings' => 'demo_mode: on',
				'messages'            => array_merge(
					$contact_form->prop( 'messages' ),
					array( 'mail_sent_ok' => 'Thanks. Your message is on its way, and we will reply within one school day.' )
				),
			)
		);
		$contact_form->save();
		$contact_form = wpcf7_contact_form( $contact_form->id() ); // Reload to get the saved hash.
		fp_setup_log( "Form: $title" );
	}
	return sprintf(
		"<!-- wp:contact-form-7/contact-form-selector {\"id\":%d,\"hash\":\"%s\",\"title\":\"%s\"} -->\n<div class=\"wp-block-contact-form-7-contact-form-selector\">[contact-form-7 id=\"%s\" title=\"%s\"]</div>\n<!-- /wp:contact-form-7/contact-form-selector -->\n\n",
		$contact_form->id(),
		$contact_form->hash(),
		esc_attr( $title ),
		$contact_form->hash(),
		esc_attr( $title )
	);
}

// Remove the sample form Contact Form 7 creates on activation.
$fp_default_form = fp_setup_find( 'Contact form 1', 'wpcf7_contact_form' );
if ( $fp_default_form ) {
	wp_delete_post( $fp_default_form, true );
}

$fp_demo_form = fp_setup_form(
	'Request a demo',
	'<p><label for="fp-demo-name">Your name</label> [text* your-name id:fp-demo-name autocomplete:name]</p>

<p><label for="fp-demo-school">School or district</label> [text* your-school id:fp-demo-school autocomplete:organization]</p>

<p><label for="fp-demo-role">Your role</label> [select* your-role id:fp-demo-role first_as_label "Choose one" "Athletic director" "Principal or head teacher" "Activities coordinator" "Business office" "District administrator" "Other"]</p>

<p><label for="fp-demo-email">Work email</label> [email* your-email id:fp-demo-email autocomplete:email]</p>

<p><label for="fp-demo-phone">Phone <span class="fp-optional">(optional)</span></label> [tel your-phone id:fp-demo-phone autocomplete:tel]</p>

<p><label for="fp-demo-message">What events do you want to sell tickets for? <span class="fp-optional">(optional)</span></label> [textarea your-message id:fp-demo-message]</p>

<p>[submit "Request a demo"]</p>',
	'Demo request from [your-school]'
);

$fp_contact_form = fp_setup_form(
	'Contact support',
	'<p><label for="fp-contact-name">Your name</label> [text* your-name id:fp-contact-name autocomplete:name]</p>

<p><label for="fp-contact-email">Email</label> [email* your-email id:fp-contact-email autocomplete:email]</p>

<p><label for="fp-contact-topic">What is it about?</label> [select* your-topic id:fp-contact-topic first_as_label "Choose one" "My tickets did not arrive" "My ticket will not scan" "Refund question" "Something else"]</p>

<p><label for="fp-contact-event">Event and school <span class="fp-optional">(optional)</span></label> [text your-event id:fp-contact-event]</p>

<p><label for="fp-contact-message">Message</label> [textarea* your-message id:fp-contact-message]</p>

<p>[submit "Send message"]</p>',
	'Support: [your-topic]'
);

/* --------------------------------------------------------------------------
 * Pages
 * ----------------------------------------------------------------------- */

$fp_home = fp_setup_page(
	'home',
	'Home',
	fp_setup_pattern( 'fieldpass/page-home' ),
	'Fieldpass helps schools sell event tickets online, scan them at the gate and see every sale in one place.'
);

fp_setup_page(
	'for-schools',
	'For schools',
	fp_setup_pattern( 'fieldpass/page-schools' ),
	'Online ticketing for school and district events: passes, fast gate scanning, live reports and weekly payouts.',
	'page-landing'
);

fp_setup_page(
	'help-centre',
	'Help Centre',
	fp_setup_pattern( 'fieldpass/page-help-centre' ),
	'Help for parents and fans: find your tickets, get in at the gate, and get answers about refunds.',
	'page-landing'
);

fp_setup_page(
	'request-a-demo',
	'Request a demo',
	fp_p( 'Tell us a little about your school. We\'ll reply within one school day to book a 30-minute call.' )
		. "<!-- wp:heading {\"fontSize\":\"large\"} -->\n<h2 class=\"wp-block-heading has-large-font-size\">What happens next</h2>\n<!-- /wp:heading -->\n\n"
		. fp_ol(
			array(
				'We email you to pick a time.',
				'On the call, we set up one of your real events together.',
				'You get a written summary of pricing for your school.',
			)
		)
		. $fp_demo_form,
	'Book a 30-minute Fieldpass demo for your school or district.'
);

fp_setup_page(
	'contact',
	'Contact',
	fp_p( 'Questions about an event, like start times or refunds, are best sent to the school running it. Their details are in your ticket email.' )
		. fp_p( 'For problems with your ticket or with Fieldpass, use this form. You can also check the <a href="' . esc_url( home_url( '/help-centre/' ) ) . '">Help Centre</a> first.' )
		. $fp_contact_form,
	'Contact Fieldpass support about tickets, scanning or refunds.'
);

$fp_blog = fp_setup_page( 'blog', 'Blog', '', 'News and guides from Fieldpass: help for families and tips for running school events.' );

/* --------------------------------------------------------------------------
 * Main menu (edited in Appearance > Editor > Navigation)
 * ----------------------------------------------------------------------- */

// WordPress may have auto-created an empty fallback menu called "Navigation".
// Remove it so the team only sees the one menu the header actually uses.
$fp_fallback_menu = get_page_by_path( 'navigation', OBJECT, 'wp_navigation' );
if ( $fp_fallback_menu ) {
	wp_delete_post( $fp_fallback_menu->ID, true );
}

if ( ! get_page_by_path( 'fieldpass-main-menu', OBJECT, 'wp_navigation' ) ) {
	$fp_menu = '';
	foreach ( array( 'for-schools' => 'For schools', 'help-centre' => 'Help Centre', 'blog' => 'Blog', 'contact' => 'Contact', 'request-a-demo' => 'Request a demo' ) as $fp_slug => $fp_label ) {
		$fp_page = get_page_by_path( $fp_slug );
		// The demo link only shows on small screens, where the header button is hidden.
		$fp_class = 'request-a-demo' === $fp_slug ? ',"className":"fp-nav-demo-link"' : '';
		$fp_menu .= sprintf(
			'<!-- wp:navigation-link {"label":"%s","type":"page","id":%d,"url":"%s","kind":"post-type"%s} /-->',
			esc_attr( $fp_label ),
			$fp_page->ID,
			esc_url( get_permalink( $fp_page ) ),
			$fp_class
		);
	}
	wp_insert_post(
		array(
			'post_type'    => 'wp_navigation',
			'post_status'  => 'publish',
			'post_name'    => 'fieldpass-main-menu',
			'post_title'   => 'Main menu',
			'post_content' => $fp_menu,
		)
	);
	fp_setup_log( 'Menu: Main menu' );
}

update_option( 'show_on_front', 'page' );
update_option( 'page_on_front', $fp_home );
update_option( 'page_for_posts', $fp_blog );

// Clear the saved link rules. WordPress rebuilds them on the next page load,
// with every post type and category registered (flushing here would miss categories).
delete_option( 'rewrite_rules' );

fp_setup_log( 'Done.' );
