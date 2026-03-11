import { useBlockProps, InspectorControls } from '@wordpress/block-editor';
import { PanelBody, RangeControl, TextControl } from '@wordpress/components';

export default function Edit( { attributes, setAttributes }: any ) {
	const blockProps = useBlockProps();
	const { limit, columns, sectionTitle } = attributes;

	return (
		<div { ...blockProps }>
			<InspectorControls>
				<PanelBody title="Settings">
					<TextControl
						label="Section Title"
						value={ sectionTitle }
						onChange={ ( val ) => setAttributes( { sectionTitle: val } ) }
					/>
					<RangeControl
						label="Limit"
						value={ limit }
						onChange={ ( val ) => setAttributes( { limit: val } ) }
						min={ 1 }
						max={ 12 }
					/>
					<RangeControl
						label="Columns"
						value={ columns }
						onChange={ ( val ) => setAttributes( { columns: val } ) }
						min={ 1 }
						max={ 6 }
					/>
				</PanelBody>
			</InspectorControls>
			<div className="sm-product-related-editor-preview">
				<h3>{ sectionTitle }</h3>
				<p>Product related items will appear here on the frontend.</p>
			</div>
		</div>
	);
}
