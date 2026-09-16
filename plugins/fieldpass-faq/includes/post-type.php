<?php
/**
 * FAQ post type and FAQ topic taxonomy.
 *
 * - Question = post title, answer = post content (normal block editor).
 * - Topic = category-style taxonomy, e.g. "Buying tickets", "Refunds".
 * - Order = the built-in "Order" field (menu_order). Lower numbers show first.
 *
 * FAQs have no pages of their own. They only appear through the FAQ list block,
 * so they are not public and don't create thin pages for search engines.
 *
 * @package FieldpassFAQ
 */

defined( 'ABSPATH' ) || exit;

function fieldpass_faq_register_types() {
	register_post_type(
		'fp_faq',
		array(
			'labels'              => array(
				'name'               => __( 'FAQs', 'fieldpass-faq' ),
				'singular_name'      => __( 'FAQ', 'fieldpass-faq' ),
				'add_new'            => __( 'Add FAQ', 'fieldpass-faq' ),
				'add_new_item'       => __( 'Add new FAQ', 'fieldpass-faq' ),
				'edit_item'          => __( 'Edit FAQ', 'fieldpass-faq' ),
				'new_item'           => __( 'New FAQ', 'fieldpass-faq' ),
				'search_items'       => __( 'Search FAQs', 'fieldpass-faq' ),
				'not_found'          => __( 'No FAQs found.', 'fieldpass-faq' ),
				'not_found_in_trash' => __( 'No FAQs in the bin.', 'fieldpass-faq' ),
				'all_items'          => __( 'All FAQs', 'fieldpass-faq' ),
				'menu_name'          => __( 'FAQs', 'fieldpass-faq' ),
			),
			'public'              => false,
			'show_ui'             => true,
			'show_in_menu'        => true,
			'show_in_rest'        => true, // Needed for the block editor.
			'exclude_from_search' => true,
			'publicly_queryable'  => false,
			'has_archive'         => false,
			'rewrite'             => false,
			'menu_position'       => 21,
			'menu_icon'           => 'dashicons-editor-help',
			'supports'            => array( 'title', 'editor', 'page-attributes', 'revisions' ),
			// Start every new answer with a single paragraph, so editors just type.
			'template'            => array(
				array( 'core/paragraph', array( 'placeholder' => __( 'Write the answer. Keep it short and plain.', 'fieldpass-faq' ) ) ),
			),
		)
	);

	register_taxonomy(
		'fp_faq_topic',
		'fp_faq',
		array(
			'labels'            => array(
				'name'          => __( 'FAQ topics', 'fieldpass-faq' ),
				'singular_name' => __( 'FAQ topic', 'fieldpass-faq' ),
				'add_new_item'  => __( 'Add new topic', 'fieldpass-faq' ),
				'edit_item'     => __( 'Edit topic', 'fieldpass-faq' ),
				'all_items'     => __( 'All topics', 'fieldpass-faq' ),
				'menu_name'     => __( 'Topics', 'fieldpass-faq' ),
			),
			'public'            => false,
			'show_ui'           => true,
			'show_in_rest'      => true,
			'show_admin_column' => true,
			'hierarchical'      => true, // Checkbox UI, like post categories.
			'rewrite'           => false,
		)
	);
}
add_action( 'init', 'fieldpass_faq_register_types' );

/**
 * Title field says "Question" instead of "Add title".
 */
function fieldpass_faq_title_placeholder( $text, $post ) {
	return 'fp_faq' === $post->post_type ? __( 'Question', 'fieldpass-faq' ) : $text;
}
add_filter( 'enter_title_here', 'fieldpass_faq_title_placeholder', 10, 2 );
