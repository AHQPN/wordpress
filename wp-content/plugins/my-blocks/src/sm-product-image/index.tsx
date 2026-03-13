import { registerBlockType } from '@wordpress/blocks';
import { useBlockProps } from '@wordpress/block-editor';
import metadata from './block.json';
import './style.scss';

registerBlockType( metadata.name, {
	...( metadata as any ),
	edit: () => {
		const blockProps = useBlockProps( { className: 'sm-product-image-editor' } );
		return (
			<div { ...blockProps }>
				<div style={{ background: '#f0f0f0', padding: '100px 20px', textAlign: 'center', border: '1px dashed #ccc' }}>
					Product Image Placeholder
				</div>
			</div>
		);
	},
	save: () => null, // Dynamic block
} );
