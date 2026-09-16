<?php
/**
 * Title: Two visitor paths
 * Slug: fieldpass/audience-split
 * Categories: fieldpass, call-to-action
 * Keywords: audience, paths, schools, parents
 * Viewport Width: 1400
 *
 * Two cards that send schools to the sales path and families to the Help Centre.
 */
?>
<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|60","bottom":"var:preset|spacing|60"},"margin":{"top":"0"}}},"layout":{"type":"constrained","contentSize":"1200px"}} -->
<div class="wp-block-group alignfull" style="margin-top:0;padding-top:var(--wp--preset--spacing--60);padding-bottom:var(--wp--preset--spacing--60)">
<!-- wp:heading {"textAlign":"center"} -->
<h2 class="wp-block-heading has-text-align-center">Where do you want to start?</h2>
<!-- /wp:heading -->

<!-- wp:columns {"className":"is-equal-cards","style":{"spacing":{"margin":{"top":"var:preset|spacing|50"},"blockGap":{"left":"var:preset|spacing|40"}}}} -->
<div class="wp-block-columns is-equal-cards" style="margin-top:var(--wp--preset--spacing--50)">
<!-- wp:column -->
<div class="wp-block-column">
<!-- wp:group {"className":"is-style-card","style":{"spacing":{"padding":{"top":"var:preset|spacing|50","bottom":"var:preset|spacing|50","left":"var:preset|spacing|50","right":"var:preset|spacing|50"}}},"layout":{"type":"flex","orientation":"vertical"}} -->
<div class="wp-block-group is-style-card" style="padding-top:var(--wp--preset--spacing--50);padding-right:var(--wp--preset--spacing--50);padding-bottom:var(--wp--preset--spacing--50);padding-left:var(--wp--preset--spacing--50)">
<!-- wp:image {"width":"56px","height":"56px","sizeSlug":"full","linkDestination":"none"} -->
<figure class="wp-block-image size-full is-resized"><img src="<?php echo esc_url( get_theme_file_uri( 'assets/images/icon-school.svg' ) ); ?>" alt="" style="width:56px;height:56px"/></figure>
<!-- /wp:image -->
<!-- wp:paragraph {"className":"is-eyebrow","style":{"color":{"text":"var:preset|color|primary"}}} -->
<p class="is-eyebrow has-text-color" style="color:var(--wp--preset--color--primary)">For schools and districts</p>
<!-- /wp:paragraph -->
<!-- wp:heading {"level":3,"style":{"typography":{"fontSize":"var:preset|font-size|x-large"}}} -->
<h3 class="wp-block-heading" style="font-size:var(--wp--preset--font-size--x-large)">Run ticketing for every event from one account</h3>
<!-- /wp:heading -->
<!-- wp:paragraph -->
<p>Football, theatre, graduation, fundraisers. Set up an event in minutes, follow sales as they happen and get paid out every week.</p>
<!-- /wp:paragraph -->
<!-- wp:buttons -->
<div class="wp-block-buttons">
<!-- wp:button -->
<div class="wp-block-button"><a class="wp-block-button__link wp-element-button" href="<?php echo esc_url( home_url( '/for-schools/' ) ); ?>">See how it works</a></div>
<!-- /wp:button -->
</div>
<!-- /wp:buttons -->
</div>
<!-- /wp:group -->
</div>
<!-- /wp:column -->

<!-- wp:column -->
<div class="wp-block-column">
<!-- wp:group {"className":"is-style-card","style":{"spacing":{"padding":{"top":"var:preset|spacing|50","bottom":"var:preset|spacing|50","left":"var:preset|spacing|50","right":"var:preset|spacing|50"}}},"layout":{"type":"flex","orientation":"vertical"}} -->
<div class="wp-block-group is-style-card" style="padding-top:var(--wp--preset--spacing--50);padding-right:var(--wp--preset--spacing--50);padding-bottom:var(--wp--preset--spacing--50);padding-left:var(--wp--preset--spacing--50)">
<!-- wp:image {"width":"56px","height":"56px","sizeSlug":"full","linkDestination":"none"} -->
<figure class="wp-block-image size-full is-resized"><img src="<?php echo esc_url( get_theme_file_uri( 'assets/images/icon-fans.svg' ) ); ?>" alt="" style="width:56px;height:56px"/></figure>
<!-- /wp:image -->
<!-- wp:paragraph {"className":"is-eyebrow","style":{"color":{"text":"var:preset|color|primary"}}} -->
<p class="is-eyebrow has-text-color" style="color:var(--wp--preset--color--primary)">For parents and fans</p>
<!-- /wp:paragraph -->
<!-- wp:heading {"level":3,"style":{"typography":{"fontSize":"var:preset|font-size|x-large"}}} -->
<h3 class="wp-block-heading" style="font-size:var(--wp--preset--font-size--x-large)">Get help with tickets you bought</h3>
<!-- /wp:heading -->
<!-- wp:paragraph -->
<p>Find your tickets, see how entry works at the gate, and get answers about refunds.</p>
<!-- /wp:paragraph -->
<!-- wp:buttons -->
<div class="wp-block-buttons">
<!-- wp:button {"className":"is-style-outline"} -->
<div class="wp-block-button is-style-outline"><a class="wp-block-button__link wp-element-button" href="<?php echo esc_url( home_url( '/help-centre/' ) ); ?>">Visit the Help Centre</a></div>
<!-- /wp:button -->
</div>
<!-- /wp:buttons -->
</div>
<!-- /wp:group -->
</div>
<!-- /wp:column -->
</div>
<!-- /wp:columns -->
</div>
<!-- /wp:group -->
