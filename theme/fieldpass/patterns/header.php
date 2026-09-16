<?php
/**
 * Title: Header
 * Slug: fieldpass/header
 * Categories: header
 * Block Types: core/template-part/header
 * Inserter: no
 *
 * Site header: logo, main menu (collapses on mobile) and the demo button.
 *
 * The menu is the "Main menu" in Appearance > Editor > Navigation, so the team
 * edits links there. If that menu doesn't exist yet, a default set of links shows.
 */

$fieldpass_menu    = get_page_by_path( 'fieldpass-main-menu', OBJECT, 'wp_navigation' );
$fieldpass_menu_id = $fieldpass_menu ? $fieldpass_menu->ID : 0;
?>
<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"1rem","bottom":"1rem"}},"border":{"bottom":{"color":"var:preset|color|line","width":"1px","style":"solid"}}},"backgroundColor":"base","layout":{"type":"constrained","contentSize":"1200px"}} -->
<div class="wp-block-group alignfull has-base-background-color has-background" style="border-bottom-color:var(--wp--preset--color--line);border-bottom-style:solid;border-bottom-width:1px;padding-top:1rem;padding-bottom:1rem">
<!-- wp:group {"layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"space-between"}} -->
<div class="wp-block-group">
<!-- wp:group {"style":{"spacing":{"blockGap":"0.6rem"}},"layout":{"type":"flex","flexWrap":"nowrap"}} -->
<div class="wp-block-group">
<!-- wp:image {"width":"36px","height":"36px","scale":"contain","sizeSlug":"full","linkDestination":"none","className":"fp-logo-mark"} -->
<figure class="wp-block-image size-full is-resized fp-logo-mark"><img src="<?php echo esc_url( get_theme_file_uri( 'assets/images/logo-mark.svg' ) ); ?>" alt="" style="object-fit:contain;width:36px;height:36px"/></figure>
<!-- /wp:image -->
<!-- wp:site-title {"level":0} /-->
</div>
<!-- /wp:group -->

<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|40"}},"layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"right"}} -->
<div class="wp-block-group">
<?php if ( $fieldpass_menu_id ) : ?>
<!-- wp:navigation {"ref":<?php echo (int) $fieldpass_menu_id; ?>,"overlayMenu":"mobile","ariaLabel":"Main","layout":{"type":"flex","justifyContent":"right"},"style":{"spacing":{"blockGap":"var:preset|spacing|40"}}} /-->
<?php else : ?>
<!-- wp:navigation {"overlayMenu":"mobile","ariaLabel":"Main","layout":{"type":"flex","justifyContent":"right"},"style":{"spacing":{"blockGap":"var:preset|spacing|40"}}} -->
<!-- wp:navigation-link {"label":"For schools","url":"<?php echo esc_url( home_url( '/for-schools/' ) ); ?>","kind":"custom"} /-->
<!-- wp:navigation-link {"label":"Help Centre","url":"<?php echo esc_url( home_url( '/help-centre/' ) ); ?>","kind":"custom"} /-->
<!-- wp:navigation-link {"label":"Blog","url":"<?php echo esc_url( home_url( '/blog/' ) ); ?>","kind":"custom"} /-->
<!-- wp:navigation-link {"label":"Contact","url":"<?php echo esc_url( home_url( '/contact/' ) ); ?>","kind":"custom"} /-->
<!-- /wp:navigation -->
<?php endif; ?>

<!-- wp:buttons {"className":"fp-header-cta"} -->
<div class="wp-block-buttons fp-header-cta">
<!-- wp:button {"style":{"spacing":{"padding":{"top":"0.6rem","bottom":"0.6rem","left":"1rem","right":"1rem"}}}} -->
<div class="wp-block-button"><a class="wp-block-button__link wp-element-button" href="<?php echo esc_url( home_url( '/request-a-demo/' ) ); ?>" style="padding-top:0.6rem;padding-right:1rem;padding-bottom:0.6rem;padding-left:1rem">Request a demo</a></div>
<!-- /wp:button -->
</div>
<!-- /wp:buttons -->
</div>
<!-- /wp:group -->
</div>
<!-- /wp:group -->
</div>
<!-- /wp:group -->
