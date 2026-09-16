<?php
/**
 * Title: Demo call to action
 * Slug: fieldpass/cta-banner
 * Categories: fieldpass, call-to-action
 * Keywords: cta, demo, contact
 * Viewport Width: 1400
 *
 * Closing banner that asks schools to book a demo.
 */
?>
<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|60","bottom":"var:preset|spacing|60"},"margin":{"top":"0"}}},"layout":{"type":"constrained","contentSize":"1200px"}} -->
<div class="wp-block-group alignfull" style="margin-top:0;padding-top:var(--wp--preset--spacing--60);padding-bottom:var(--wp--preset--spacing--60)">
<!-- wp:group {"style":{"border":{"radius":"20px"},"spacing":{"padding":{"top":"var:preset|spacing|60","bottom":"var:preset|spacing|60","left":"var:preset|spacing|50","right":"var:preset|spacing|50"}}},"backgroundColor":"accent","textColor":"ink","layout":{"type":"constrained","contentSize":"680px"}} -->
<div class="wp-block-group has-ink-color has-accent-background-color has-text-color has-background" style="border-radius:20px;padding-top:var(--wp--preset--spacing--60);padding-right:var(--wp--preset--spacing--50);padding-bottom:var(--wp--preset--spacing--60);padding-left:var(--wp--preset--spacing--50)">
<!-- wp:heading {"textAlign":"center"} -->
<h2 class="wp-block-heading has-text-align-center">See Fieldpass with your own events</h2>
<!-- /wp:heading -->
<!-- wp:paragraph {"align":"center","style":{"typography":{"fontSize":"var:preset|font-size|large"}}} -->
<p class="has-text-align-center" style="font-size:var(--wp--preset--font-size--large)">Book a 30-minute demo. We'll walk through setup, checkout and gate scanning using an event from your calendar.</p>
<!-- /wp:paragraph -->
<!-- wp:buttons {"layout":{"type":"flex","justifyContent":"center"}} -->
<div class="wp-block-buttons">
<!-- wp:button {"backgroundColor":"ink","textColor":"base"} -->
<div class="wp-block-button"><a class="wp-block-button__link has-base-color has-ink-background-color has-text-color has-background wp-element-button" href="<?php echo esc_url( home_url( '/request-a-demo/' ) ); ?>">Request a demo</a></div>
<!-- /wp:button -->
</div>
<!-- /wp:buttons -->
</div>
<!-- /wp:group -->
</div>
<!-- /wp:group -->
