<?php
/**
 * Title: How it works (3 steps)
 * Slug: fieldpass/steps
 * Categories: fieldpass, featured
 * Keywords: steps, process, how it works
 * Viewport Width: 1400
 *
 * Three numbered steps on a warm background.
 */

$fieldpass_steps = array(
	array( __( 'Book a demo', 'fieldpass' ), __( 'A 30-minute call to see if Fieldpass fits your events and your budget.', 'fieldpass' ) ),
	array( __( 'Set up your first event', 'fieldpass' ), __( 'Your support contact helps you add events, prices and payout details.', 'fieldpass' ) ),
	array( __( 'Share the link', 'fieldpass' ), __( 'Post the ticket link on your website and social channels. Sales start right away.', 'fieldpass' ) ),
);
?>
<!-- wp:group {"align":"full","className":"is-style-section-surface","style":{"spacing":{"padding":{"top":"var:preset|spacing|70","bottom":"var:preset|spacing|70"},"margin":{"top":"0"}}},"layout":{"type":"constrained","contentSize":"1200px"}} -->
<div class="wp-block-group alignfull is-style-section-surface" style="margin-top:0;padding-top:var(--wp--preset--spacing--70);padding-bottom:var(--wp--preset--spacing--70)">
<!-- wp:heading -->
<h2 class="wp-block-heading">How getting started works</h2>
<!-- /wp:heading -->

<!-- wp:columns {"style":{"spacing":{"margin":{"top":"var:preset|spacing|50"},"blockGap":{"left":"var:preset|spacing|50"}}}} -->
<div class="wp-block-columns" style="margin-top:var(--wp--preset--spacing--50)">
<?php foreach ( $fieldpass_steps as $fieldpass_n => $fieldpass_step ) : ?>
<!-- wp:column -->
<div class="wp-block-column">
<!-- wp:paragraph {"className":"is-step-number"} -->
<p class="is-step-number"><?php echo (int) $fieldpass_n + 1; ?></p>
<!-- /wp:paragraph -->
<!-- wp:heading {"level":3} -->
<h3 class="wp-block-heading"><?php echo esc_html( $fieldpass_step[0] ); ?></h3>
<!-- /wp:heading -->
<!-- wp:paragraph -->
<p><?php echo esc_html( $fieldpass_step[1] ); ?></p>
<!-- /wp:paragraph -->
</div>
<!-- /wp:column -->
<?php endforeach; ?>
</div>
<!-- /wp:columns -->
</div>
<!-- /wp:group -->
