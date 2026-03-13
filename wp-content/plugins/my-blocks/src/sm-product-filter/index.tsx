import { registerBlockType } from '@wordpress/blocks';
import { useBlockProps } from '@wordpress/block-editor';
import metadata from './block.json';
import './style.scss';

registerBlockType( metadata.name, {
	...( metadata as any ),
	edit: () => {
		const blockProps = useBlockProps( { className: 'sm-product-filter-editor' } );
		return (
			<div { ...blockProps }>
				<div style={{ background: '#f8f8f8', padding: '20px', border: '1px solid #ddd' }}>
					<strong>Product Filter Placeholder</strong>
					<p>Availability, Price, etc.</p>
				</div>
			</div>
		);
	},
	save: () => null,
} );
