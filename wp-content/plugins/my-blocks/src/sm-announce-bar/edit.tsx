import { __ } from '@wordpress/i18n';
import { useBlockProps, InspectorControls, RichText } from '@wordpress/block-editor';
import { PanelBody, ColorPalette } from '@wordpress/components';
import './editor.scss';

export default function Edit( { attributes, setAttributes }: any ) {
	const { content, bgColor, textColor, linkColor } = attributes;

	const blockProps = useBlockProps( {
		className: 'sm-announce-bar-wrapper',
		style: {
			'--sm-announce-bg': bgColor,
			'--sm-announce-text': textColor,
			'--sm-announce-link': linkColor
		} as React.CSSProperties
	} );

	return (
		<>
			<InspectorControls>
				<PanelBody title={ __( 'Colors', 'my-blocks' ) } initialOpen={ true }>
					<p style={ { marginBottom: 4 } }>{ __( 'Background', 'my-blocks' ) }</p>
					<ColorPalette value={ bgColor } onChange={ ( v ) => setAttributes( { bgColor: v || '#0b172a' } ) } />
					<p style={ { marginBottom: 4 } }>{ __( 'Text color', 'my-blocks' ) }</p>
					<ColorPalette value={ textColor } onChange={ ( v ) => setAttributes( { textColor: v || '#ffffff' } ) } />
					<p style={ { marginBottom: 4 } }>{ __( 'Link color (if any)', 'my-blocks' ) }</p>
					<ColorPalette value={ linkColor } onChange={ ( v ) => setAttributes( { linkColor: v || '#e2e8f0' } ) } />
				</PanelBody>
			</InspectorControls>

			<div { ...blockProps }>
				<div className="sm-announce-bar" style={ { background: bgColor, color: textColor } }>
					<div className="sm-announce-bar__inner">
						<RichText
							tagName="div"
							className="sm-announce-bar__content"
							value={ content }
							onChange={ ( v ) => setAttributes( { content: v } ) }
							placeholder={ __( 'Enter announcement...', 'my-blocks' ) }
							allowedFormats={ [ 'core/bold', 'core/italic', 'core/link' ] }
						/>
					</div>
				</div>
			</div>
		</>
	);
}
