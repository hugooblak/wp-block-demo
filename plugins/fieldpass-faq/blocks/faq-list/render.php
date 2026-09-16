<?php
/**
 * FAQ list block: front-end output.
 *
 * Each FAQ is a native <details> element: it opens and closes without any
 * JavaScript, works with the keyboard and is announced by screen readers.
 *
 * @var array $attributes Block settings. "topic" = topic slug, or '' for all.
 *
 * @package FieldpassFAQ
 */

defined( 'ABSPATH' ) || exit;

$fp_topic = isset( $attributes['topic'] ) ? sanitize_key( $attributes['topic'] ) : '';

$fp_args = array(
	'post_type'              => 'fp_faq',
	'post_status'            => 'publish',
	'posts_per_page'         => 100,
	'orderby'                => array( 'menu_order' => 'ASC', 'title' => 'ASC' ), // The "Order" field set in the admin.
	'no_found_rows'          => true,
	'update_post_term_cache' => false,
);
if ( $fp_topic ) {
	$fp_args['tax_query'] = array( // phpcs:ignore WordPress.DB.SlowDBQuery.slow_db_query_tax_query
		array(
			'taxonomy' => 'fp_faq_topic',
			'field'    => 'slug',
			'terms'    => $fp_topic,
		),
	);
}
$fp_faqs = get_posts( $fp_args );

if ( ! $fp_faqs ) {
	// Only the editor preview explains an empty list. Visitors see nothing.
	if ( defined( 'REST_REQUEST' ) && REST_REQUEST ) {
		echo '<p>' . esc_html__( 'No published FAQs for this topic yet.', 'fieldpass-faq' ) . '</p>';
	}
	return;
}
?>
<div <?php echo get_block_wrapper_attributes( array( 'class' => 'fp-faq-list' ) ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>>
	<?php
	foreach ( $fp_faqs as $fp_faq ) :
		$fp_question = get_the_title( $fp_faq );
		// Render the answer's blocks directly. Not 'the_content', so share buttons or
		// related-post plugins don't get added to every answer.
		$fp_answer   = wptexturize( do_blocks( $fp_faq->post_content ) );

		fieldpass_faq_schema_items(
			array(
				'q' => wp_strip_all_tags( $fp_question ),
				'a' => trim( wp_strip_all_tags( $fp_answer ) ),
			)
		);
		?>
		<details class="fp-faq">
			<summary class="fp-faq__question"><?php echo esc_html( $fp_question ); ?></summary>
			<div class="fp-faq__answer"><?php echo wp_kses_post( $fp_answer ); ?></div>
		</details>
	<?php endforeach; ?>
</div>
