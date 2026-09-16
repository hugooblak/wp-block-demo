<?php
/**
 * Title: Help Centre page layout
 * Slug: fieldpass/page-help-centre
 * Categories: fieldpass-pages
 * Post Types: page
 * Block Types: core/post-content
 * Viewport Width: 1400
 *
 * Support page for parents and fans: intro, help topics, FAQs by topic, contact options.
 */
?>
<!-- wp:group {"align":"full","className":"is-style-section-surface","style":{"spacing":{"padding":{"top":"var:preset|spacing|60","bottom":"var:preset|spacing|60"},"margin":{"top":"0"}}},"layout":{"type":"constrained","contentSize":"1200px"}} -->
<div class="wp-block-group alignfull is-style-section-surface" style="margin-top:0;padding-top:var(--wp--preset--spacing--60);padding-bottom:var(--wp--preset--spacing--60)">
<!-- wp:group {"layout":{"type":"constrained","contentSize":"760px","justifyContent":"left"}} -->
<div class="wp-block-group">
<!-- wp:paragraph {"className":"is-eyebrow","style":{"color":{"text":"var:preset|color|primary"}}} -->
<p class="is-eyebrow has-text-color" style="color:var(--wp--preset--color--primary)">Help Centre</p>
<!-- /wp:paragraph -->
<!-- wp:heading {"level":1} -->
<h1 class="wp-block-heading">How can we help?</h1>
<!-- /wp:heading -->
<!-- wp:paragraph {"style":{"typography":{"fontSize":"var:preset|font-size|large"}}} -->
<p style="font-size:var(--wp--preset--font-size--large)">Answers for parents, students and fans who buy tickets to school events with Fieldpass.</p>
<!-- /wp:paragraph -->

</div>
<!-- /wp:group -->
</div>
<!-- /wp:group -->
<!-- wp:pattern {"slug":"fieldpass/help-links"} /-->
<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|60","bottom":"var:preset|spacing|60"},"margin":{"top":"0"}}},"layout":{"type":"constrained","contentSize":"760px"}} -->
<div class="wp-block-group alignfull" style="margin-top:0;padding-top:var(--wp--preset--spacing--60);padding-bottom:var(--wp--preset--spacing--60)">
<!-- wp:heading {"anchor":"faqs"} -->
<h2 class="wp-block-heading" id="faqs">Frequently asked questions</h2>
<!-- /wp:heading -->
<!-- wp:heading {"level":3,"anchor":"buying-tickets","style":{"spacing":{"margin":{"top":"var:preset|spacing|40"}}}} -->
<h3 class="wp-block-heading" id="buying-tickets" style="margin-top:var(--wp--preset--spacing--40)">Buying tickets</h3>
<!-- /wp:heading -->
<!-- wp:fieldpass/faq-list {"topic":"buying-tickets","style":{"spacing":{"margin":{"bottom":"var:preset|spacing|50"}}}} /-->
<!-- wp:heading {"level":3,"anchor":"at-the-event","style":{"spacing":{"margin":{"top":"var:preset|spacing|50"}}}} -->
<h3 class="wp-block-heading" id="at-the-event" style="margin-top:var(--wp--preset--spacing--50)">At the event</h3>
<!-- /wp:heading -->
<!-- wp:fieldpass/faq-list {"topic":"at-the-event","style":{"spacing":{"margin":{"bottom":"var:preset|spacing|50"}}}} /-->
<!-- wp:heading {"level":3,"anchor":"refunds","style":{"spacing":{"margin":{"top":"var:preset|spacing|50"}}}} -->
<h3 class="wp-block-heading" id="refunds" style="margin-top:var(--wp--preset--spacing--50)">Refunds and changes</h3>
<!-- /wp:heading -->
<!-- wp:fieldpass/faq-list {"topic":"refunds","style":{"spacing":{"margin":{"bottom":"var:preset|spacing|50"}}}} /-->
</div>
<!-- /wp:group -->
<!-- wp:pattern {"slug":"fieldpass/contact-options"} /-->
