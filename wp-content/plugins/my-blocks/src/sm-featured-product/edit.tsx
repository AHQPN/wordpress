import { __ } from '@wordpress/i18n';
import {
	useBlockProps,
	InspectorControls,
	RichText,
} from '@wordpress/block-editor';
import {
	PanelBody,
	SelectControl,
	RangeControl,
	Spinner,
	Placeholder,
} from '@wordpress/components';
import { useState, useEffect } from '@wordpress/element';
import apiFetch from '@wordpress/api-fetch';
import './editor.scss';

interface WCProduct {
	id: number;
	name: string;
	price_html: string;
	images: { src: string }[];
	permalink: string;
	on_sale: boolean;
	regular_price: string;
	sale_price: string;
}

export default function Edit( { attributes, setAttributes }: any ) {
	const { categoryId, columns, numberOfProducts, sectionTitle } = attributes;
	const blockProps = useBlockProps( { className: 'sm-featured-product-editor' } );

	const [ categories, setCategories ] = useState<any[]>( [] );
	const [ products, setProducts ] = useState<WCProduct[]>( [] );
	const [ isLoading, setIsLoading ] = useState( false );

	// Fetch WooCommerce product categories
	useEffect( () => {
		apiFetch( { path: '/wc/v3/products/categories?per_page=100' } )
			.then( ( res: any ) => setCategories( res ) )
			.catch( () => {
				// Fallback to WP categories
				apiFetch( { path: '/wp/v2/product_cat?per_page=100' } )
					.then( ( res: any ) => setCategories( res ) )
					.catch( () => {} );
			} );
	}, [] );

	// Fetch products when category changes
	useEffect( () => {
		if ( ! categoryId ) {
			setProducts( [] );
			return;
		}
		setIsLoading( true );
		apiFetch( {
			path: `/wc/v3/products?category=${ categoryId }&per_page=${ numberOfProducts }&status=publish`,
		} )
			.then( ( res: any ) => setProducts( res ) )
			.catch( () => setProducts( [] ) )
			.finally( () => setIsLoading( false ) );
	}, [ categoryId, numberOfProducts ] );

	const formatPrice = ( product: WCProduct ) => {
		if ( product.price_html ) {
			return product.price_html.replace( /<[^>]*>/g, ' ' ).trim();
		}
		return product.regular_price || '';
	};

	return (
		<>
			<InspectorControls>
				<PanelBody title={ __( 'Product Settings', 'my-blocks' ) }>
					<SelectControl
						label={ __( 'Product Category', 'my-blocks' ) }
						value={ String( categoryId ) }
						options={ [
							{ label: '-- Select Category --', value: '0' },
							...categories.map( ( c: any ) => ( {
								label: c.name,
								value: String( c.id ),
							} ) ),
						] }
						onChange={ ( v: string ) =>
							setAttributes( { categoryId: parseInt( v, 10 ) } )
						}
					/>
					<RangeControl
						label={ __( 'Columns', 'my-blocks' ) }
						value={ columns }
						onChange={ ( v: any ) =>
							setAttributes( { columns: v ?? 3 } )
						}
						min={ 2 }
						max={ 5 }
					/>
					<RangeControl
						label={ __( 'Number of Products', 'my-blocks' ) }
						value={ numberOfProducts }
						onChange={ ( v: any ) =>
							setAttributes( { numberOfProducts: v ?? 12 } )
						}
						min={ 3 }
						max={ 24 }
					/>
				</PanelBody>
			</InspectorControls>

			<section { ...blockProps }>
				{ ! categoryId && (
					<Placeholder
						icon="star-filled"
						label="SM Featured Product"
						instructions="Select a Product Category in the sidebar to display products."
					/>
				) }

				{ categoryId > 0 && isLoading && (
					<div style={ { textAlign: 'center', padding: '60px' } }>
						<Spinner />
					</div>
				) }

				{ categoryId > 0 && ! isLoading && products.length > 0 && (
					<>
						<div className="sm-fp-header sm-slider-nav sm-cl-header">
							<RichText
								tagName="h2"
								className="sm-fp-section-title sm-cl-title"
								value={ sectionTitle }
								onChange={ ( v ) => setAttributes( { sectionTitle: v } ) }
								placeholder="Section Title"
							/>
							<div className="sm-slider-nav-btns-wrap" style={{ display: 'flex', alignItems: 'center', gap: '15px' }}>
								<span className="sm-slider-counter">
									1 / { Math.max( 1, products.length - columns + 1 ) }
								</span>
								<div className="sm-slider-nav-btns">
									<button disabled>❮</button>
									<button disabled>❯</button>
								</div>
							</div>
						</div>
						<div className="sm-slider-container">
							<div
								className="sm-fp-grid sm-slider-track"
								style={ {
									display: 'grid',
									gridTemplateColumns: `repeat(${ columns }, 1fr)`,
									gap: '20px',
								} }
							>
								{ products.slice( 0, columns ).map( ( p ) => (
									<div className="sm-fp-item sm-item-card" key={ p.id }>
										<div className="sm-item-img">
											{ p.images?.[0]?.src ? (
												<img src={ p.images[0].src } alt={ p.name } />
											) : (
												<div className="sm-item-card-placeholder">No Image</div>
											) }
										</div>
										<div className="sm-item-content">
											<h3
												className="sm-item-label"
												dangerouslySetInnerHTML={ { __html: p.name } }
											/>
											<div
												className="sm-item-price"
												dangerouslySetInnerHTML={ { __html: p.price_html } }
											/>
										</div>
									</div>
								) ) }
							</div>
						</div>
					</>
				) }

				{ categoryId > 0 && ! isLoading && products.length === 0 && (
					<p style={ { textAlign: 'center', padding: '40px', color: '#999' } }>
						No products found in this category.
					</p>
				) }
			</section>
		</>
	);
}
