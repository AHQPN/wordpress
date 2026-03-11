import { registerBlockType } from '@wordpress/blocks';
import { useBlockProps } from '@wordpress/block-editor';
import metadata from './block.json';

registerBlockType( metadata.name, {
	...( metadata as any ),
	edit: () => {
		const blockProps = useBlockProps( { className: 'sm-product-title-editor' } );
		return <div { ...blockProps }><h2>Product Title Placeholder</h2></div>;
	},
	save: () => null,
} );
