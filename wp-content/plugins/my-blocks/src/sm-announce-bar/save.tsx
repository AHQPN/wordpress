import { useBlockProps, RichText } from '@wordpress/block-editor';

export default function save( { attributes }: any ) {
	const { content, bgColor, textColor, linkColor } = attributes;

	const blockProps = useBlockProps.save( {
		className: 'sm-announce-bar-wrapper',
		style: {
			'--sm-announce-bg': bgColor,
			'--sm-announce-text': textColor,
			'--sm-announce-link': linkColor
		} as React.CSSProperties
	} );

	return (
		<div { ...blockProps }>
			<div className="sm-announce-bar" id="sm-announce-bar">
				<div className="sm-announce-bar__inner">
					<RichText.Content tagName="div" className="sm-announce-bar__content" value={ content } />
				</div>
			</div>
		</div>
	);
}
