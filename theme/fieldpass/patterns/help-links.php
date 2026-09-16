<?php
/**
 * Title: Help guide cards
 * Slug: fieldpass/help-links
 * Categories: fieldpass, featured
 * Keywords: help, guides, support, links
 * Viewport Width: 1400
 *
 * Three cards linking families to the most-used help topics, plus app store links.
 * The store links are placeholders: replace them with the real app listings.
 */

$fieldpass_cards = array(
	array(
		'title' => __( 'Find your tickets', 'fieldpass' ),
		'text'  => __( 'Where your tickets go after you pay, and what to do if the email never arrived.', 'fieldpass' ),
		'link'  => home_url( '/how-to-find-your-tickets/' ),
		'label' => __( 'Read the ticket guide', 'fieldpass' ),
	),
	array(
		'title' => __( 'Getting in at the gate', 'fieldpass' ),
		'text'  => __( 'How to show your ticket, and what happens if your phone battery dies.', 'fieldpass' ),
		'link'  => home_url( '/what-to-expect-at-the-gate/' ),
		'label' => __( 'Read the gate guide', 'fieldpass' ),
	),
	array(
		'title' => __( 'Refunds and changes', 'fieldpass' ),
		'text'  => __( 'Each school sets its own refund rules. See who to contact and what happens if an event is cancelled.', 'fieldpass' ),
		'link'  => home_url( '/help-centre/#refunds' ),
		'label' => __( 'See refund answers', 'fieldpass' ),
	),
);
?>
<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|60","bottom":"var:preset|spacing|60"},"margin":{"top":"0"}}},"layout":{"type":"constrained","contentSize":"1200px"}} -->
<div class="wp-block-group alignfull" style="margin-top:0;padding-top:var(--wp--preset--spacing--60);padding-bottom:var(--wp--preset--spacing--60)">
<!-- wp:heading -->
<h2 class="wp-block-heading">Popular help topics</h2>
<!-- /wp:heading -->

<!-- wp:columns {"className":"is-equal-cards","style":{"spacing":{"margin":{"top":"var:preset|spacing|40"},"blockGap":{"left":"var:preset|spacing|40"}}}} -->
<div class="wp-block-columns is-equal-cards" style="margin-top:var(--wp--preset--spacing--40)">
<?php foreach ( $fieldpass_cards as $fieldpass_card ) : ?>
<!-- wp:column -->
<div class="wp-block-column">
<!-- wp:group {"className":"is-style-card","layout":{"type":"flex","orientation":"vertical"}} -->
<div class="wp-block-group is-style-card">
<!-- wp:heading {"level":3} -->
<h3 class="wp-block-heading"><?php echo esc_html( $fieldpass_card['title'] ); ?></h3>
<!-- /wp:heading -->
<!-- wp:paragraph {"style":{"color":{"text":"var:preset|color|muted"}}} -->
<p class="has-text-color" style="color:var(--wp--preset--color--muted)"><?php echo esc_html( $fieldpass_card['text'] ); ?></p>
<!-- /wp:paragraph -->
<!-- wp:paragraph {"style":{"typography":{"fontWeight":"600"}}} -->
<p style="font-weight:600"><a href="<?php echo esc_url( $fieldpass_card['link'] ); ?>"><?php echo esc_html( $fieldpass_card['label'] ); ?></a></p>
<!-- /wp:paragraph -->
</div>
<!-- /wp:group -->
</div>
<!-- /wp:column -->
<?php endforeach; ?>
</div>
<!-- /wp:columns -->

<!-- wp:group {"className":"is-style-section-dark","style":{"border":{"radius":"14px"},"spacing":{"padding":{"top":"var:preset|spacing|40","bottom":"var:preset|spacing|40","left":"var:preset|spacing|50","right":"var:preset|spacing|50"},"margin":{"top":"var:preset|spacing|40"}}},"layout":{"type":"flex","flexWrap":"wrap","justifyContent":"space-between"}} -->
<div class="wp-block-group is-style-section-dark" style="border-radius:14px;margin-top:var(--wp--preset--spacing--40);padding-top:var(--wp--preset--spacing--40);padding-right:var(--wp--preset--spacing--50);padding-bottom:var(--wp--preset--spacing--40);padding-left:var(--wp--preset--spacing--50)">
<!-- wp:group {"style":{"spacing":{"blockGap":"0.25rem"}},"layout":{"type":"flex","orientation":"vertical"}} -->
<div class="wp-block-group">
<!-- wp:heading {"level":3} -->
<h3 class="wp-block-heading">Prefer an app?</h3>
<!-- /wp:heading -->
<!-- wp:paragraph -->
<p>You never need it to get in, but the free Fieldpass app keeps all your tickets in one place.</p>
<!-- /wp:paragraph -->
</div>
<!-- /wp:group -->
<!-- wp:buttons -->
<div class="wp-block-buttons">
<!-- wp:button -->
<div class="wp-block-button"><a class="wp-block-button__link wp-element-button" href="https://www.apple.com/app-store/">Get it on the App Store</a></div>
<!-- /wp:button -->
<!-- wp:button {"className":"is-style-outline"} -->
<div class="wp-block-button is-style-outline"><a class="wp-block-button__link wp-element-button" href="https://play.google.com/store">Get it on Google Play</a></div>
<!-- /wp:button -->
</div>
<!-- /wp:buttons -->
</div>
<!-- /wp:group -->
</div>
<!-- /wp:group -->
