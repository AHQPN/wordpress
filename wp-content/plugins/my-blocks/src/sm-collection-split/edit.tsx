import { __ } from '@wordpress/i18n';
import {
	useBlockProps,
	RichText,
	InspectorControls,
	MediaUpload,
	MediaUploadCheck,
} from '@wordpress/block-editor';
import {
	PanelBody,
	SelectControl,
	Button,
	TextControl,
} from '@wordpress/components';
import { useState, useEffect } from '@wordpress/element';
import apiFetch from '@wordpress/api-fetch';
import './editor.scss';

interface SplitItem {
	id: number;
	categoryId: number;
	imageUrl: string;
	title: string;
	description: string;
	buttonText: string;
	buttonUrl: string;
	layout: 'image-text' | 'text-image';
	overlayPosition: string;
}

export default function Edit( { attributes, setAttributes }: any ) {
	const { displayMode, items, bgColor, textColor, sectionTitle } = attributes;
	const [ categories, setCategories ] = useState<any[]>( [] );

	const blockProps = useBlockProps( {
		className: `sm-collection-split-editor sm-cs-mode-${ displayMode }`,
		style: { backgroundColor: bgColor, color: textColor }
	} );

	// Fetch categories
	useEffect( () => {
		apiFetch( { path: '/wc/v3/products/categories?per_page=100' } )
			.then( ( res: any ) => setCategories( res ) )
			.catch( () => {
				apiFetch( { path: '/wp/v2/product_cat?per_page=100' } )
					.then( ( res: any ) => setCategories( res ) )
					.catch( () => {} );
			} );
	}, [] );

	const updateItem = ( index: number, data: Partial<SplitItem> ) => {
		console.log( 'Updating item', index, data );
		const newItems = [ ...items ];
		newItems[ index ] = { ...newItems[ index ], ...data };
		setAttributes( { items: newItems } );
	};

	const handleCategoryChange = async ( index: number, catId: number ) => {
		console.log( 'Category changed', index, catId );
		if ( catId === 0 ) {
			updateItem( index, { categoryId: 0 } );
			return;
		}

		try {
			// Fetch from WP API first for the most reliable Link
			const wpCat: any = await apiFetch( { path: `/wp/v2/product_cat/${ catId }` } );
			
			const updateData: Partial<SplitItem> = {
				categoryId: catId,
				title: wpCat.name?.rendered || wpCat.name || '',
				description: wpCat.description?.rendered || wpCat.description || '',
				buttonUrl: wpCat.link || '#',
			};

			// Try to fetch image from WC API
			try {
				const wcCat: any = await apiFetch( { path: `/wc/v3/products/categories/${ catId }` } );
				if ( wcCat.image && wcCat.image.src ) {
					updateData.imageUrl = wcCat.image.src;
				}
			} catch ( e ) {
				console.log( 'Failed to fetch WC image, keeping current or empty' );
			}

			console.log( 'Updating item with:', updateData );
			updateItem( index, updateData );
		} catch ( err ) {
			console.error( 'Failed to fetch category data', err );
		}
	};

	const addItem = () => {
		setAttributes( {
			items: [
				...items,
				{
					id: Date.now(),
					categoryId: 0,
					imageUrl: '',
					title: 'New Collection',
					description: '',
					buttonText: 'Shop Now',
					buttonUrl: '#',
					layout: 'image-text',
					overlayPosition: 'bottom-left'
				}
			]
		} );
	};

	const removeItem = ( index: number ) => {
		setAttributes( {
			items: items.filter( ( _: any, i: number ) => i !== index )
		} );
	};

	return (
		<>
			<InspectorControls>
				<PanelBody title={ __( 'Layout Settings', 'my-blocks' ) }>
					<SelectControl
						label={ __( 'Display Mode', 'my-blocks' ) }
						value={ displayMode }
						options={ [
							{ label: 'Split (Rows)', value: 'split' },
							{ label: 'Grid (2 Columns)', value: 'grid' }
						] }
						onChange={ ( v ) => setAttributes( { displayMode: v } ) }
					/>
				</PanelBody>

				<PanelBody title={ __( 'Manage Items', 'my-blocks' ) }>
					{ items.map( ( item: SplitItem, i: number ) => (
						<div key={ i } className="sm-cs-editor-item">
							<div style={{ display: 'flex', justifyContent: 'space-between', alignItems: 'center', marginBottom: '10px' }}>
								<strong>Item #{ i + 1 }</strong>
								<Button isDestructive variant="link" onClick={ () => removeItem( i ) }>Remove</Button>
							</div>

							<SelectControl
								label="Select Category to Import"
								value={ String( item.categoryId ) }
								options={ [
									{ label: '-- Manual / Custom --', value: '0' },
									...categories.map( ( c ) => ( { label: c.name, value: String( c.id ) } ) )
								] }
								onChange={ ( v ) => handleCategoryChange( i, parseInt( v, 10 ) ) }
							/>
							
							<SelectControl
								label="Layout / Position"
								value={ ( displayMode === 'split' ? item.layout : item.overlayPosition ) as any }
								options={ displayMode === 'split' 
									? [
										{ label: 'Image Left', value: 'image-text' },
										{ label: 'Image Right', value: 'text-image' }
									]
									: [
										{ label: 'Bottom Left', value: 'bottom-left' },
										{ label: 'Bottom Right', value: 'bottom-right' },
										{ label: 'Bottom Center', value: 'bottom-center' },
										{ label: 'Center Center', value: 'center-center' }
									]
								}
								onChange={ ( v: string ) => updateItem( i, displayMode === 'split' ? { layout: v as any } : { overlayPosition: v } ) }
							/>

							<TextControl
								label="Button URL"
								value={ item.buttonUrl }
								onChange={ ( v: string ) => updateItem( i, { buttonUrl: v } ) }
							/>
						</div>
					) ) }
					<Button variant="secondary" isSmall onClick={ addItem }>Add New Item</Button>
				</PanelBody>
			</InspectorControls>

			<section { ...blockProps }>
				<div className="sm-cs-inner">
					{ displayMode === 'grid' && (
						<div className="sm-cs-header sm-cl-header">
							<RichText
								tagName="h2"
								className="sm-cs-section-title sm-cl-title"
								value={ sectionTitle }
								onChange={ ( v ) => setAttributes( { sectionTitle: v } ) }
								placeholder="Section Title"
							/>
						</div>
					) }
					<div className="sm-cs-items">
						{ items.map( ( item: SplitItem, i: number ) => (
							<div key={ i } className={ `sm-cs-item sm-cs-layout-${ displayMode === 'split' ? item.layout : item.overlayPosition }` }>
								<div className="sm-cs-media">
									<MediaUploadCheck>
										<MediaUpload
											onSelect={ ( m: { url: string } ) => updateItem( i, { imageUrl: m.url } ) }
											allowedTypes={ [ 'image' ] }
											render={ ( { open }: { open: () => void } ) => (
												<div 
													className="sm-cs-img-placeholder" 
													onClick={ open }
													style={{ backgroundImage: item.imageUrl ? `url(${item.imageUrl})` : undefined }}
												>
													{ ! item.imageUrl && <span>+ Add Image</span> }
												</div>
											) }
										/>
									</MediaUploadCheck>
								</div>
								
								<div className="sm-cs-content">
									<div className="sm-cs-content-inner">
										<RichText
											tagName="h2"
											className="sm-cs-title"
											value={ item.title }
											onChange={ ( v: string ) => updateItem( i, { title: v } ) }
											placeholder="Title"
										/>
										<RichText
											tagName="p"
											className="sm-cs-description"
											value={ item.description }
											onChange={ ( v: string ) => updateItem( i, { description: v } ) }
											placeholder="Description"
										/>
										<RichText
											tagName="span"
											className="sm-cs-button"
											value={ item.buttonText }
											onChange={ ( v: string ) => updateItem( i, { buttonText: v } ) }
											placeholder="Button Label"
										/>
									</div>
								</div>
							</div>
						) ) }
					</div>
				</div>
			</section>
		</>
	);
}
