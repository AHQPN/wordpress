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
	TextControl,
	Button,
	SelectControl,
	Spinner,
	RangeControl,
} from '@wordpress/components';
import { useState, useEffect } from '@wordpress/element';
import apiFetch from '@wordpress/api-fetch';
import './editor.scss';

interface CollectionItem {
	id: number;
	label: string;
	url: string;
	imageUrl: string;
	description: string;
}

export default function Edit( { attributes, setAttributes }: any ) {
	const { sectionTitle, columns, items } = attributes;
	const blockProps = useBlockProps( { className: 'sm-collection-list' } );

	const [ menus, setMenus ] = useState<any[]>( [] );
	const [ selectedMenu, setSelectedMenu ] = useState( '' );
	const [ isImporting, setIsImporting ] = useState( false );

	// Fetch available menus
	useEffect( () => {
		apiFetch( { path: '/wp/v2/menus' } )
			.then( ( res: any ) => setMenus( res ) )
			.catch( () => {} );
	}, [] );

	const handleImport = () => {
		if ( ! selectedMenu ) return;
		setIsImporting( true );
		apiFetch( {
			path: `/wp/v2/menu-items?menus=${ selectedMenu }&per_page=100`,
		} )
			.then( async ( menuItems: any ) => {
				if ( ! Array.isArray( menuItems ) || menuItems.length === 0 ) {
					alert( 'Không tìm thấy item trong menu này!' );
					return;
				}
				const imported: CollectionItem[] = [];
				for ( const mi of menuItems ) {
					const label =
						mi.title?.rendered || mi.title || 'Untitled';
					const url = mi.url || '#';
					let imageUrl = '';
					let description = '';

					// Try fetching product_cat thumbnail
					if ( mi.object === 'product_cat' && mi.object_id ) {
						try {
							const cat: any = await apiFetch( {
								path: `/wc/v3/products/categories/${ mi.object_id }`,
							} );
							imageUrl = cat?.image?.src || '';
							description = cat?.description || '';
						} catch {
							// fallback: try WP category
							try {
								const wpCat: any = await apiFetch( {
									path: `/wp/v2/product_cat/${ mi.object_id }`,
								} );
								description = wpCat?.description || '';
							} catch {}
						}
					} else if (
						mi.object === 'category' &&
						mi.object_id
					) {
						try {
							const wpCat: any = await apiFetch( {
								path: `/wp/v2/categories/${ mi.object_id }`,
							} );
							description = wpCat?.description || '';
						} catch {}
					}

					imported.push( {
						id: mi.id || Date.now() + Math.random(),
						label,
						url,
						imageUrl,
						description,
					} );
				}
				setAttributes( { items: imported } );
			} )
			.catch( ( err: any ) => {
				alert( 'Lỗi import: ' + ( err?.message || 'Unknown' ) );
			} )
			.finally( () => setIsImporting( false ) );
	};

	const updateItem = ( index: number, data: Partial<CollectionItem> ) => {
		const newItems = [ ...items ];
		newItems[ index ] = { ...newItems[ index ], ...data };
		setAttributes( { items: newItems } );
	};

	const removeItem = ( index: number ) => {
		setAttributes( {
			items: items.filter( ( _: any, i: number ) => i !== index ),
		} );
	};

	const addItem = () => {
		setAttributes( {
			items: [
				...items,
				{
					id: Date.now(),
					label: 'New Collection',
					url: '#',
					imageUrl: '',
					description: '',
				},
			],
		} );
	};

	return (
		<>
			<InspectorControls>
				<PanelBody
					title={ __( 'Import từ Menu', 'my-blocks' ) }
					initialOpen={ true }
				>
					<SelectControl
						label={ __( 'Chọn Menu', 'my-blocks' ) }
						value={ selectedMenu }
						options={ [
							{ label: '-- Chọn menu --', value: '' },
							...menus.map( ( m: any ) => ( {
								label: m.name,
								value: String( m.id ),
							} ) ),
						] }
						onChange={ ( v: string ) => setSelectedMenu( v ) }
					/>
					<Button
						variant="primary"
						onClick={ handleImport }
						disabled={ ! selectedMenu || isImporting }
						isBusy={ isImporting }
						style={ { width: '100%', justifyContent: 'center' } }
					>
						{ isImporting ? (
							<Spinner />
						) : (
							__( 'Import Categories', 'my-blocks' )
						) }
					</Button>
				</PanelBody>

				<PanelBody title={ __( 'Cài đặt', 'my-blocks' ) }>
					<RangeControl
						label={ __( 'Số cột hiển thị', 'my-blocks' ) }
						value={ columns }
						onChange={ ( val: any ) =>
							setAttributes( { columns: val ?? 4 } )
						}
						min={ 2 }
						max={ 6 }
					/>
				</PanelBody>

				<PanelBody
					title={ __( 'Quản lý Items', 'my-blocks' ) }
					initialOpen={ false }
				>
					{ items.map( ( item: CollectionItem, i: number ) => (
						<div
							key={ i }
							style={ {
								borderBottom: '1px solid #ddd',
								paddingBottom: 10,
								marginBottom: 10,
							} }
						>
							<strong>{ item.label }</strong>
							<TextControl
								label="Label"
								value={ item.label }
								onChange={ ( v: string ) =>
									updateItem( i, { label: v } )
								}
							/>
							<TextControl
								label="URL"
								value={ item.url }
								onChange={ ( v: string ) =>
									updateItem( i, { url: v } )
								}
							/>
							<TextControl
								label="Image URL"
								value={ item.imageUrl }
								onChange={ ( v: string ) =>
									updateItem( i, { imageUrl: v } )
								}
							/>
							<Button
								isDestructive
								variant="link"
								onClick={ () => removeItem( i ) }
							>
								Xóa
							</Button>
						</div>
					) ) }
					<Button
						variant="secondary"
						onClick={ addItem }
						style={ { width: '100%', marginTop: 10 } }
					>
						+ Thêm item
					</Button>
				</PanelBody>
			</InspectorControls>

			<section { ...blockProps }>
				<div className="sm-cl-header">
					<RichText
						tagName="h2"
						className="sm-cl-title"
						value={ sectionTitle }
						onChange={ ( v: string ) =>
							setAttributes( { sectionTitle: v } )
						}
						placeholder="Section Title"
					/>
					<div className="sm-cl-nav">
						<span className="sm-cl-counter">
							1 / { Math.ceil( items.length / columns ) || 1 }
						</span>
						<div className="sm-cl-nav-btns">
							<button disabled>❮</button>
							<button disabled>❯</button>
						</div>
					</div>
				</div>
				<div
					className="sm-cl-track"
					style={ {
						gridTemplateColumns: `repeat(${ items.length || columns }, calc(${ 100 / columns }% - 20px))`,
					} }
				>
					{ items.length === 0 && (
						<p style={ { gridColumn: '1/-1', textAlign: 'center', color: '#999' } }>
							Chưa có item. Hãy import từ Menu hoặc thêm thủ công.
						</p>
					) }
					{ items.map( ( item: CollectionItem, i: number ) => (
						<div className="sm-cl-item" key={ i }>
							<MediaUploadCheck>
								<MediaUpload
									onSelect={ ( m: any ) =>
										updateItem( i, { imageUrl: m.url } )
									}
									allowedTypes={ [ 'image' ] }
									render={ ( { open }: any ) => (
										<div
											className="sm-cl-img"
											onClick={ open }
											style={ {
												backgroundImage: item.imageUrl
													? `url(${ item.imageUrl })`
													: undefined,
											} }
										>
											{ ! item.imageUrl && (
												<span>+ Chọn ảnh</span>
											) }
										</div>
									) }
								/>
							</MediaUploadCheck>
							<RichText
								tagName="span"
								className="sm-cl-label"
								value={ item.label }
								onChange={ ( v: string ) =>
									updateItem( i, { label: v } )
								}
								placeholder="Label"
							/>
						</div>
					) ) }
				</div>
			</section>
		</>
	);
}
