<?php
/**
 * Title: Feature grid
 * Slug: fieldpass/feature-grid
 * Categories: fieldpass, featured
 * Keywords: features, grid, capabilities
 * Viewport Width: 1400
 *
 * Section heading plus six feature cards in two rows of three.
 */

$fieldpass_features = array(
	array( __( 'Events in minutes', 'fieldpass' ), __( 'Add the date, venue, prices and seat limit. Copy last season\'s events with one click.', 'fieldpass' ) ),
	array( __( 'Passes and bundles', 'fieldpass' ), __( 'Sell season passes, family bundles and staff tickets next to single tickets.', 'fieldpass' ) ),
	array( __( 'Fast gate entry', 'fieldpass' ), __( 'Staff scan tickets with any phone. Each person gets through the gate in a few seconds.', 'fieldpass' ) ),
	array( __( 'Live sales reports', 'fieldpass' ), __( 'See sales by event, gate and ticket type while they happen. Export for the business office.', 'fieldpass' ) ),
	array( __( 'One view for the district', 'fieldpass' ), __( 'District admins see every school. Each school still runs its own events.', 'fieldpass' ) ),
	array( __( 'Accessible checkout', 'fieldpass' ), __( 'Checkout is built to work with a keyboard and screen readers, on any phone or computer.', 'fieldpass' ) ),
);
$fieldpass_rows = array_chunk( $fieldpass_features, 3 );
?>
<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|70","bottom":"var:preset|spacing|70"},"margin":{"top":"0"}}},"layout":{"type":"constrained","contentSize":"1200px"}} -->
<div class="wp-block-group alignfull" style="margin-top:0;padding-top:var(--wp--preset--spacing--70);padding-bottom:var(--wp--preset--spacing--70)">
<!-- wp:group {"layout":{"type":"constrained","contentSize":"720px","justifyContent":"left"}} -->
<div class="wp-block-group">
<!-- wp:heading -->
<h2 class="wp-block-heading">Everything a school event needs</h2>
<!-- /wp:heading -->
<!-- wp:paragraph {"fontSize":"large","style":{"color":{"text":"var:preset|color|muted"}}} -->
<p class="has-text-color has-large-font-size" style="color:var(--wp--preset--color--muted)">From the first home game to graduation, one system handles sales, entry and reporting.</p>
<!-- /wp:paragraph -->
</div>
<!-- /wp:group -->
<?php foreach ( $fieldpass_rows as $fieldpass_i => $fieldpass_row ) : ?>
<!-- wp:columns {"className":"is-equal-cards","style":{"spacing":{"margin":{"top":"var:preset|spacing|40"},"blockGap":{"left":"var:preset|spacing|40"}}}} -->
<div class="wp-block-columns is-equal-cards" style="margin-top:var(--wp--preset--spacing--40)">
<?php foreach ( $fieldpass_row as $fieldpass_feature ) : ?>
<!-- wp:column -->
<div class="wp-block-column">
<!-- wp:group {"className":"is-style-card","layout":{"type":"flex","orientation":"vertical"}} -->
<div class="wp-block-group is-style-card">
<!-- wp:heading {"level":3} -->
<h3 class="wp-block-heading"><?php echo esc_html( $fieldpass_feature[0] ); ?></h3>
<!-- /wp:heading -->
<!-- wp:paragraph {"style":{"color":{"text":"var:preset|color|muted"}}} -->
<p class="has-text-color" style="color:var(--wp--preset--color--muted)"><?php echo esc_html( $fieldpass_feature[1] ); ?></p>
<!-- /wp:paragraph -->
</div>
<!-- /wp:group -->
</div>
<!-- /wp:column -->
<?php endforeach; ?>
</div>
<!-- /wp:columns -->
<?php endforeach; ?>
</div>
<!-- /wp:group -->
