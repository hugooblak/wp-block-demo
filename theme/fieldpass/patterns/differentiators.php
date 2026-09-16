<?php
/**
 * Title: Why choose us (dark)
 * Slug: fieldpass/differentiators
 * Categories: fieldpass, featured
 * Keywords: benefits, differentiators, why
 * Viewport Width: 1400
 *
 * Dark section with four short reasons to choose Fieldpass.
 */

$fieldpass_items = array(
	array( __( 'No account needed for fans', 'fieldpass' ), __( 'Families check out with just an email address. No passwords to remember at the gate.', 'fieldpass' ) ),
	array( __( 'Scanning works offline', 'fieldpass' ), __( 'Weak signal at the field? The scanner keeps checking tickets and syncs when it reconnects.', 'fieldpass' ) ),
	array( __( 'Weekly payouts', 'fieldpass' ), __( 'Ticket money reaches the school account every week, with a report for the business office.', 'fieldpass' ) ),
	array( __( 'A named support contact', 'fieldpass' ), __( 'Every school gets one person who helps with setup and stays on call for the first event.', 'fieldpass' ) ),
);
?>
<!-- wp:group {"align":"full","className":"is-style-section-dark","style":{"spacing":{"padding":{"top":"var:preset|spacing|70","bottom":"var:preset|spacing|70"},"margin":{"top":"0"}}},"layout":{"type":"constrained","contentSize":"1200px"}} -->
<div class="wp-block-group alignfull is-style-section-dark" style="margin-top:0;padding-top:var(--wp--preset--spacing--70);padding-bottom:var(--wp--preset--spacing--70)">
<!-- wp:heading -->
<h2 class="wp-block-heading">Why schools switch to Fieldpass</h2>
<!-- /wp:heading -->

<!-- wp:columns {"className":"is-four-up","style":{"spacing":{"margin":{"top":"var:preset|spacing|50"},"blockGap":{"left":"var:preset|spacing|50"}}}} -->
<div class="wp-block-columns is-four-up" style="margin-top:var(--wp--preset--spacing--50)">
<?php foreach ( $fieldpass_items as $fieldpass_item ) : ?>
<!-- wp:column {"style":{"border":{"top":{"color":"var:preset|color|accent","width":"3px","style":"solid"}},"spacing":{"padding":{"top":"var:preset|spacing|30"}}}} -->
<div class="wp-block-column" style="border-top-color:var(--wp--preset--color--accent);border-top-style:solid;border-top-width:3px;padding-top:var(--wp--preset--spacing--30)">
<!-- wp:heading {"level":3} -->
<h3 class="wp-block-heading"><?php echo esc_html( $fieldpass_item[0] ); ?></h3>
<!-- /wp:heading -->
<!-- wp:paragraph -->
<p><?php echo esc_html( $fieldpass_item[1] ); ?></p>
<!-- /wp:paragraph -->
</div>
<!-- /wp:column -->
<?php endforeach; ?>
</div>
<!-- /wp:columns -->
</div>
<!-- /wp:group -->
