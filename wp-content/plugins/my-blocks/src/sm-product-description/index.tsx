import { registerBlockType } from '@wordpress/blocks';
import { useBlockProps } from '@wordpress/block-editor';
import metadata from './block.json';

registerBlockType( metadata.name, {
	...( metadata as any ),
	edit: () => {
		const blockProps = useBlockProps( { className: 'sm-product-desc-editor' } );
		return <div { ...blockProps }><p>Product detailed description goes here...</p></div>;
	},
	save: () => null,
} );
