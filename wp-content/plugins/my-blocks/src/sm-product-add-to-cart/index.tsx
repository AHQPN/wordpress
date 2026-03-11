import { registerBlockType } from '@wordpress/blocks';
import { useBlockProps } from '@wordpress/block-editor';
import metadata from './block.json';

registerBlockType( metadata.name, {
	...( metadata as any ),
	edit: () => {
		const blockProps = useBlockProps( { className: 'sm-product-atc-editor' } );
		return (
			<div { ...blockProps }>
				<button style={{ width: '100%', padding: '15px', background: '#000', color: '#fff' }}>
					ADD TO CART
				</button>
			</div>
		);
	},
	save: () => null,
} );
