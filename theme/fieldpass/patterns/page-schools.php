<?php
/**
 * Title: For Schools page layout
 * Slug: fieldpass/page-schools
 * Categories: fieldpass-pages
 * Post Types: page
 * Block Types: core/post-content
 * Viewport Width: 1400
 *
 * Sales page for schools: intro, features, steps, reasons to choose, FAQs, demo banner.
 */
?>
<!-- wp:group {"align":"full","className":"is-style-section-surface","style":{"spacing":{"padding":{"top":"var:preset|spacing|60","bottom":"var:preset|spacing|60"},"margin":{"top":"0"}}},"layout":{"type":"constrained","contentSize":"1200px"}} -->
<div class="wp-block-group alignfull is-style-section-surface" style="margin-top:0;padding-top:var(--wp--preset--spacing--60);padding-bottom:var(--wp--preset--spacing--60)">
<!-- wp:group {"layout":{"type":"constrained","contentSize":"760px","justifyContent":"left"}} -->
<div class="wp-block-group">
<!-- wp:paragraph {"className":"is-eyebrow","style":{"color":{"text":"var:preset|color|primary"}}} -->
<p class="is-eyebrow has-text-color" style="color:var(--wp--preset--color--primary)">For schools and districts</p>
<!-- /wp:paragraph -->
<!-- wp:heading {"level":1} -->
<h1 class="wp-block-heading">Ticketing that works for every school event</h1>
<!-- /wp:heading -->
<!-- wp:paragraph {"fontSize":"large"} -->
<p class="has-large-font-size">Sell tickets and passes online, check people in at the gate with any phone, and give your business office clean reports. No cash boxes, no paper tickets.</p>
<!-- /wp:paragraph -->
<!-- wp:buttons {"style":{"spacing":{"margin":{"top":"var:preset|spacing|40"}}}} -->
<div class="wp-block-buttons" style="margin-top:var(--wp--preset--spacing--40)">
<!-- wp:button -->
<div class="wp-block-button"><a class="wp-block-button__link wp-element-button" href="<?php echo esc_url( home_url( '/request-a-demo/' ) ); ?>">Request a demo</a></div>
<!-- /wp:button -->
</div>
<!-- /wp:buttons -->
</div>
<!-- /wp:group -->
</div>
<!-- /wp:group -->
<!-- wp:pattern {"slug":"fieldpass/feature-grid"} /-->
<!-- wp:pattern {"slug":"fieldpass/steps"} /-->
<!-- wp:pattern {"slug":"fieldpass/differentiators"} /-->
<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|70","bottom":"var:preset|spacing|30"},"margin":{"top":"0"}}},"layout":{"type":"constrained","contentSize":"760px"}} -->
<div class="wp-block-group alignfull" style="margin-top:0;padding-top:var(--wp--preset--spacing--70);padding-bottom:var(--wp--preset--spacing--30)">
<!-- wp:heading {"level":2,"anchor":"school-faqs"} -->
<h2 class="wp-block-heading" id="school-faqs">Questions from schools</h2>
<!-- /wp:heading -->
<!-- wp:fieldpass/faq-list {"topic":"for-schools","style":{"spacing":{"margin":{"bottom":"var:preset|spacing|50"}}}} /-->
</div>
<!-- /wp:group -->
<!-- wp:pattern {"slug":"fieldpass/cta-banner"} /-->
