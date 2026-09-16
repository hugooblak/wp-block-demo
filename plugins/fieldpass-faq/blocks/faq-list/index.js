/**
 * FAQ list block: editor side.
 *
 * Plain JavaScript using WordPress's own libraries, so there is no build step.
 * The front end is rendered in PHP (render.php); the editor shows a live preview
 * of that same output, plus settings in the sidebar.
 */
( function ( wp ) {
	const { registerBlockType } = wp.blocks;
	const { createElement: el, Fragment } = wp.element;
	const { InspectorControls, useBlockProps } = wp.blockEditor;
	const { PanelBody, SelectControl, Disabled } = wp.components;
	const { useSelect } = wp.data;
	const { __ } = wp.i18n;
	const ServerSideRender = wp.serverSideRender;

	registerBlockType( 'fieldpass/faq-list', {
		edit: function ( props ) {
			const { attributes, setAttributes } = props;
			const blockProps = useBlockProps();

			const topics = useSelect( function ( select ) {
				return select( 'core' ).getEntityRecords( 'taxonomy', 'fp_faq_topic', { per_page: 100, hide_empty: false } );
			}, [] );

			const topicOptions = [ { label: __( 'All topics', 'fieldpass-faq' ), value: '' } ].concat(
				( topics || [] ).map( function ( term ) {
					return { label: term.name, value: term.slug };
				} )
			);

			return el(
				Fragment,
				null,
				el(
					InspectorControls,
					null,
					el(
						PanelBody,
						{ title: __( 'FAQ settings', 'fieldpass-faq' ) },
						el( SelectControl, {
							label: __( 'Topic', 'fieldpass-faq' ),
							value: attributes.topic,
							options: topicOptions,
							onChange: function ( value ) {
								setAttributes( { topic: value } );
							},
							__nextHasNoMarginBottom: true,
						} ),
						el( 'p', null, __( 'Add, edit and reorder questions under FAQs in the admin menu.', 'fieldpass-faq' ) )
					)
				),
				el(
					'div',
					blockProps,
					el(
						Disabled,
						null,
						el( ServerSideRender, {
							block: 'fieldpass/faq-list',
							attributes: attributes,
							skipBlockSupportAttributes: true,
						} )
					)
				)
			);
		},
		save: function () {
			return null; // Rendered by PHP.
		},
	} );
} )( window.wp );
