<?php
/**
 * Title: Footer
 * Slug: fieldpass/footer
 * Categories: footer
 * Block Types: core/template-part/footer
 * Inserter: no
 *
 * Site footer: short brand line, link columns for each visitor path, demo notice.
 */
?>
<!-- wp:group {"align":"full","className":"is-style-section-dark site-footer","style":{"spacing":{"padding":{"top":"var:preset|spacing|60","bottom":"var:preset|spacing|50"},"margin":{"top":"0"}}},"layout":{"type":"constrained","contentSize":"1200px"}} -->
<div class="wp-block-group alignfull is-style-section-dark site-footer" style="margin-top:0;padding-top:var(--wp--preset--spacing--60);padding-bottom:var(--wp--preset--spacing--50)">
<!-- wp:columns {"style":{"spacing":{"blockGap":{"left":"var:preset|spacing|50"}}}} -->
<div class="wp-block-columns">
<!-- wp:column {"width":"40%"} -->
<div class="wp-block-column" style="flex-basis:40%">
<!-- wp:site-title {"level":0} /-->
<!-- wp:paragraph {"fontSize":"small"} -->
<p class="has-small-font-size">Digital ticketing for school events. Sell online, scan at the gate, see every sale in one place.</p>
<!-- /wp:paragraph -->
</div>
<!-- /wp:column -->

<!-- wp:column -->
<div class="wp-block-column">
<!-- wp:heading {"level":2,"fontSize":"medium"} -->
<h2 class="wp-block-heading has-medium-font-size">Schools</h2>
<!-- /wp:heading -->
<!-- wp:list {"className":"is-style-default","fontSize":"small","style":{"spacing":{"padding":{"left":"0"}}}} -->
<ul style="padding-left:0" class="wp-block-list is-style-default has-small-font-size">
<!-- wp:list-item --><li><a href="<?php echo esc_url( home_url( '/for-schools/' ) ); ?>">How Fieldpass works</a></li><!-- /wp:list-item -->
<!-- wp:list-item --><li><a href="<?php echo esc_url( home_url( '/request-a-demo/' ) ); ?>">Request a demo</a></li><!-- /wp:list-item -->
</ul>
<!-- /wp:list -->
</div>
<!-- /wp:column -->

<!-- wp:column -->
<div class="wp-block-column">
<!-- wp:heading {"level":2,"fontSize":"medium"} -->
<h2 class="wp-block-heading has-medium-font-size">Parents and fans</h2>
<!-- /wp:heading -->
<!-- wp:list {"className":"is-style-default","fontSize":"small","style":{"spacing":{"padding":{"left":"0"}}}} -->
<ul style="padding-left:0" class="wp-block-list is-style-default has-small-font-size">
<!-- wp:list-item --><li><a href="<?php echo esc_url( home_url( '/help-centre/' ) ); ?>">Help Centre</a></li><!-- /wp:list-item -->
<!-- wp:list-item --><li><a href="<?php echo esc_url( home_url( '/help-centre/#faqs' ) ); ?>">FAQs</a></li><!-- /wp:list-item -->
<!-- wp:list-item --><li><a href="<?php echo esc_url( home_url( '/contact/' ) ); ?>">Contact support</a></li><!-- /wp:list-item -->
</ul>
<!-- /wp:list -->
</div>
<!-- /wp:column -->

<!-- wp:column -->
<div class="wp-block-column">
<!-- wp:heading {"level":2,"fontSize":"medium"} -->
<h2 class="wp-block-heading has-medium-font-size">Company</h2>
<!-- /wp:heading -->
<!-- wp:list {"className":"is-style-default","fontSize":"small","style":{"spacing":{"padding":{"left":"0"}}}} -->
<ul style="padding-left:0" class="wp-block-list is-style-default has-small-font-size">
<!-- wp:list-item --><li><a href="<?php echo esc_url( home_url( '/blog/' ) ); ?>">Blog</a></li><!-- /wp:list-item -->
<!-- wp:list-item --><li><a href="<?php echo esc_url( home_url( '/contact/' ) ); ?>">Contact</a></li><!-- /wp:list-item -->
</ul>
<!-- /wp:list -->
</div>
<!-- /wp:column -->
</div>
<!-- /wp:columns -->

<!-- wp:separator {"backgroundColor":"ink-2","style":{"spacing":{"margin":{"top":"var:preset|spacing|50","bottom":"var:preset|spacing|30"}}}} -->
<hr class="wp-block-separator has-text-color has-ink-2-color has-alpha-channel-opacity has-ink-2-background-color has-background" style="margin-top:var(--wp--preset--spacing--50);margin-bottom:var(--wp--preset--spacing--30)"/>
<!-- /wp:separator -->

<!-- wp:group {"fontSize":"small","layout":{"type":"flex","flexWrap":"wrap","justifyContent":"space-between"}} -->
<div class="wp-block-group has-small-font-size">
<!-- wp:paragraph -->
<p>© <?php echo esc_html( gmdate( 'Y' ) ); ?> Fieldpass</p>
<!-- /wp:paragraph -->
<!-- wp:paragraph -->
<p>Fieldpass is a fictional brand made for a portfolio demo.</p>
<!-- /wp:paragraph -->
</div>
<!-- /wp:group -->
</div>
<!-- /wp:group -->
