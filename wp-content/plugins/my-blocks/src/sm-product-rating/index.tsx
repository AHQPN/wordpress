import { registerBlockType } from '@wordpress/blocks';
import { useBlockProps } from '@wordpress/block-editor';
import metadata from './block.json';
import './style.scss';

registerBlockType( metadata as any, {
	edit: () => {
		const blockProps = useBlockProps();
		return (
			<div { ...blockProps }>
				<div className="sm-product-rating-preview">
					<span className="stars">★★★★★</span>
					<span className="count">(5 reviews)</span>
				</div>
			</div>
		);
	},
	save: () => null,
} );
