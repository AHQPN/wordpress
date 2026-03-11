import { registerBlockType } from '@wordpress/blocks';
import { useBlockProps } from '@wordpress/block-editor';
import metadata from './block.json';

registerBlockType( metadata.name, {
	...( metadata as any ),
	edit: () => {
		const blockProps = useBlockProps( { className: 'sm-product-price-editor' } );
		return <div { ...blockProps }><strong>$99.00</strong></div>;
	},
	save: () => null,
} );
