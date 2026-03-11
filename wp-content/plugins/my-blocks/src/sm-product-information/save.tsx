import { useBlockProps, InnerBlocks } from '@wordpress/block-editor';

export default function save( { attributes }: any ) {
	const blockProps = useBlockProps.save( { className: 'sm-product-information' } );

	return (
		<section { ...blockProps }>
			<div className="sm-pi-inner">
				<InnerBlocks.Content />
			</div>
		</section>
	);
}
