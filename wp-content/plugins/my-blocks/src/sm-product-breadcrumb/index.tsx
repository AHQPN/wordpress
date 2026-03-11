import { registerBlockType } from '@wordpress/blocks';
import { useBlockProps } from '@wordpress/block-editor';
import metadata from './block.json';
import './style.scss';

registerBlockType( metadata as any, {
	edit: () => {
		const blockProps = useBlockProps( {
			className: 'sm-product-breadcrumb-container',
		} );
		return (
			<div { ...blockProps }>
				<nav className="woocommerce-breadcrumb">
					<a href="#">Home</a> / <a href="#">Category</a> / Product Name
				</nav>
			</div>
		);
	},
	save: () => null,
} );
