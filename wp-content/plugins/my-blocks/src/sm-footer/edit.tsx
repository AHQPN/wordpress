import { __ } from '@wordpress/i18n';
import { useBlockProps, RichText, InspectorControls } from '@wordpress/block-editor';
import { PanelBody, TextControl, Button, SelectControl, Spinner } from '@wordpress/components';
import { useState, useEffect } from '@wordpress/element';
import apiFetch from '@wordpress/api-fetch';
import FooterColumn from './components/FooterColumn';
import './editor.scss';

interface FooterLink { label: string; url: string; }

function MenuImporter( { onImport }: { onImport: ( links: FooterLink[] ) => void } ) {
	const [ menus, setMenus ] = useState<any[]>( [] );
	const [ selectedMenu, setSelectedMenu ] = useState( '' );
	const [ isLoading, setIsLoading ] = useState( false );
	const [ isFetchingMenus, setIsFetchingMenus ] = useState( true );

	useEffect( () => {
		// Fetch classic menus
		apiFetch( { path: '/wp/v2/menus' } )
			.then( ( res: any ) => setMenus( res ) )
			.catch( () => { /* ignore or handle */ } )
			.finally( () => setIsFetchingMenus( false ) );
	}, [] );

	const handleImport = () => {
		if ( ! selectedMenu ) return;
		setIsLoading( true );
		apiFetch( { path: `/wp/v2/menu-items?menus=${ selectedMenu }&per_page=100` } )
			.then( ( items: any ) => {
				if ( ! Array.isArray( items ) ) {
					window.alert( "API did not return an array. returned: " + JSON.stringify(items) );
					return;
				}
				const newLinks = items.map( ( item: any ) => ( {
					label: item.title?.rendered || item.title || '',
					url: item.url || '#'
				} ) );
				if ( newLinks.length > 0 ) {
					// window.alert( "Found " + newLinks.length + " links." );
					onImport( newLinks );
				} else {
					window.alert( "Menu này không có item nào!" );
				}
			} )
			.catch( ( err ) => {
				window.alert( "API error: " + err?.message );
			} )
			.finally( () => setIsLoading( false ) );
	};

	if ( isFetchingMenus ) return <div style={{ marginBottom: 16 }}><Spinner /></div>;
	if ( menus.length === 0 ) return null;

	return (
		<div style={ { display: 'flex', gap: '8px', marginBottom: '16px', alignItems: 'flex-end', paddingBottom: '16px', borderBottom: '1px solid #ddd' } }>
			<div style={ { flex: 1 } }>
				<SelectControl
					label={ __( 'Load từ Menu (WordPress)', 'my-blocks' ) }
					value={ selectedMenu }
					options={ [
						{ label: __( 'Chọn menu...', 'my-blocks' ), value: '' },
						...menus.map( m => ( { label: m.name, value: m.id } ) )
					] }
					onChange={ ( v ) => setSelectedMenu( v ) }
					__nextHasNoMarginBottom
				/>
			</div>
			<Button variant="secondary" onClick={ handleImport } disabled={ ! selectedMenu || isLoading }>
				{ isLoading ? <Spinner /> : __( 'Tải', 'my-blocks' ) }
			</Button>
		</div>
	);
}

function LinkListEditor( { title, links, onChange }: { title: string, links: FooterLink[], onChange: ( links: FooterLink[] ) => void } ) {
	const handleUpdate = ( index: number, field: string, value: string ) => {
		const newLinks = [ ...links ];
		newLinks[ index ] = { ...newLinks[ index ], [ field ]: value };
		onChange( newLinks );
	};
	const handleRemove = ( index: number ) => {
		const newLinks = [ ...links ];
		newLinks.splice( index, 1 );
		onChange( newLinks );
	};
	const handleAdd = () => {
		onChange( [ ...links, { label: 'New Link', url: '#' } ] );
	};

	return (
		<PanelBody title={ title } initialOpen={ false }>
			<MenuImporter onImport={ onChange } />
			
			<p style={{ fontSize: '13px', fontWeight: 600, marginBottom: '12px' }}>{ __('Danh sách thủ công', 'my-blocks') }</p>
			{ links.map( ( link, i ) => (
				<div key={ i } style={ { marginBottom: '12px', padding: '8px', border: '1px solid #ddd', borderRadius: '4px', background: '#f9f9f9' } }>
					<div style={ { display: 'flex', gap: '8px', marginBottom: '8px' } }>
						<TextControl
							label="Label" hideLabelFromVision
							value={ link.label }
							onChange={ ( v ) => handleUpdate( i, 'label', v ) }
							__nextHasNoMarginBottom
							style={ { flex: 1, marginBottom: 0 } }
						/>
						<Button isSmall isDestructive onClick={ () => handleRemove( i ) }>✕</Button>
					</div>
					<TextControl
						label="URL" hideLabelFromVision
						value={ link.url }
						onChange={ ( v ) => handleUpdate( i, 'url', v ) }
						__nextHasNoMarginBottom
						style={ { marginBottom: 0 } }
					/>
				</div>
			) ) }
			<Button variant="secondary" onClick={ handleAdd } style={ { width: '100%', justifyContent: 'center' } }>
				+ { __( 'Thêm link', 'my-blocks' ) }
			</Button>
		</PanelBody>
	);
}

export default function Edit( { attributes, setAttributes }: any ) {
	const {
		newsletterTitle,
		newsletterSubtitle,
		aboutTitle,
		aboutContent,
		categoriesTitle,
		categoriesContent,
		helpTitle,
		helpContent,
		storeCount,
		storeBtnText,
		storeBtnUrl,
		bgColor,
		textColor,
	} = attributes;

	const blockProps = useBlockProps( {
		className: 'sm-footer',
		style: { backgroundColor: bgColor, color: textColor } as React.CSSProperties,
	} );

	return (
		<>
			<InspectorControls>
				<LinkListEditor
					title={ __( 'Cột 2: ABOUT LACOSTE', 'my-blocks' ) }
					links={ aboutContent }
					onChange={ ( links ) => setAttributes( { aboutContent: links } ) }
				/>
				<LinkListEditor
					title={ __( 'Cột 3: CATEGORIES', 'my-blocks' ) }
					links={ categoriesContent }
					onChange={ ( links ) => setAttributes( { categoriesContent: links } ) }
				/>
				<LinkListEditor
					title={ __( 'Cột 4: HELP & CONTACTS', 'my-blocks' ) }
					links={ helpContent }
					onChange={ ( links ) => setAttributes( { helpContent: links } ) }
				/>
			</InspectorControls>

		<footer { ...blockProps }>
			<div className="sm-footer-inner sm-grid-wrap">
				{/* Column 1: Newsletter & Social */}
				<div className="sm-footer-column sm-footer-col-main">
					<RichText
						tagName="h4"
						className="sm-footer-newsletter-title"
						value={ newsletterTitle }
						onChange={ ( val: string ) => setAttributes( { newsletterTitle: val } ) }
						placeholder="Title"
					/>
					<RichText
						tagName="p"
						className="sm-footer-newsletter-subtitle"
						value={ newsletterSubtitle }
						onChange={ ( val: string ) => setAttributes( { newsletterSubtitle: val } ) }
						placeholder="Subtitle"
					/>
					
					{/* Fake form for editor */}
					<div className="sm-footer-newsletter-form">
						<input type="email" placeholder="Email" disabled />
						<button disabled>Register</button>
					</div>

					{/* Static Social Icons */}
					<div className="sm-footer-social-icons">
						<span>📷</span>
						<span>📘</span>
						<span>🐦</span>
						<span>📌</span>
						<span>📱</span>
						<span>▶️</span>
					</div>

					<div className="sm-footer-store-info">
						<RichText
							tagName="p"
							className="sm-footer-store-count"
							value={ storeCount }
							onChange={ ( val: string ) => setAttributes( { storeCount: val } ) }
							placeholder="Store count text"
						/>
						<div className="sm-footer-store-btn-wrap">
							<a className="sm-footer-store-btn" href="#" onClick={(e) => e.preventDefault()}>
								<RichText
									tagName="span"
									value={ storeBtnText }
									onChange={ ( val: string ) => setAttributes( { storeBtnText: val } ) }
									placeholder="Button text"
								/>
							</a>
						</div>
					</div>
				</div>

				{/* Column 2: About */}
				<FooterColumn
					isEdit={ true }
					title={ aboutTitle }
					links={ aboutContent }
					titleClassName="sm-footer-col-title"
					listClassName="sm-footer-about sm-footer-list"
					onTitleChange={ ( val ) => setAttributes( { aboutTitle: val } ) }
				/>

				{/* Column 3: Categories */}
				<FooterColumn
					isEdit={ true }
					title={ categoriesTitle }
					links={ categoriesContent }
					titleClassName="sm-footer-col-title"
					listClassName="sm-footer-categories sm-footer-list"
					onTitleChange={ ( val ) => setAttributes( { categoriesTitle: val } ) }
				/>

				{/* Column 4: Help */}
				<FooterColumn
					isEdit={ true }
					title={ helpTitle }
					links={ helpContent }
					titleClassName="sm-footer-col-title"
					listClassName="sm-footer-help sm-footer-list"
					onTitleChange={ ( val ) => setAttributes( { helpTitle: val } ) }
				/>
			</div>

			<div className="sm-footer-bottom">
				<div className="sm-footer-bottom-inner">
					<div className="sm-footer-payments">
						<span className="sm-payment-icon">VISA</span>
						<span className="sm-payment-icon">Mastercard</span>
						<span className="sm-payment-icon">Virtual Account</span>
						<span className="sm-payment-icon">Kredivo</span>
					</div>
					<p className="sm-footer-secure">🛡️ 100% secure payment</p>
				</div>
			</div>
		</footer>
		</>
	);
}
