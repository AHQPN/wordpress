import { useBlockProps, InnerBlocks } from '@wordpress/block-editor';
import './editor.scss';

const ALLOWED_BLOCKS = [
	'core/column',
	'core/columns',
	'core/group',
	'core/separator',
	'core/paragraph',
	'core/heading',
	'sm/product-image',
	'sm/product-title',
	'sm/product-price',
	'sm/product-add-to-cart',
	'sm/product-description',
	'sm/product-breadcrumb',
];

const TEMPLATE: any = [
    [ 'sm/product-breadcrumb', {} ],
	[
		'core/columns',
		{ className: 'sm-pi-top-section' },
		[
			[
				'core/column',
				{ className: 'sm-pi-left-column', width: '50%' },
				[
					[ 'sm/product-image', {} ]
				],
			],
			[
				'core/column',
				{ className: 'sm-pi-right-column', width: '50%' },
				[
					[ 'sm/product-title', {} ],
					[ 'sm/product-price', {} ],
					[ 'sm/product-add-to-cart', {} ],
					[ 'core/separator', {} ],
				],
			],
		],
	],
	[
		'core/group',
		{ className: 'sm-pi-bottom-section', layout: { type: 'default' } },
		[
			[ 'core/heading', { level: 2, content: 'Product Description' } ],
			[ 'sm/product-description', {} ]
		],
	],
];

export default function Edit( { attributes, setAttributes }: any ) {
	const blockProps = useBlockProps( { className: 'sm-product-information-editor' } );

	return (
		<div { ...blockProps }>
			<div className="sm-pi-inner">
				<InnerBlocks
					allowedBlocks={ ALLOWED_BLOCKS }
					template={ TEMPLATE }
				/>
			</div>
		</div>
	);
}
