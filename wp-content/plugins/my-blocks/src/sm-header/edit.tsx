import { __ } from '@wordpress/i18n';
import { useBlockProps, MediaUpload, MediaUploadCheck, InspectorControls } from '@wordpress/block-editor';
import { PanelBody, Button, ToggleControl, TextControl, RangeControl, ColorPalette } from '@wordpress/components';
import { useState } from '@wordpress/element';
import './editor.scss';

interface MenuItem { label: string; url: string; children: MenuItem[]; }

interface Attrs {
	logoUrl: string; logoWidth: number; siteName: string; menuItems: MenuItem[];
	bgColor: string; textColor: string;
	showSearch: boolean; showLocale: boolean; showStoreLocator: boolean; storeLocatorUrl: string;
	showAccount: boolean; showCart: boolean; stickyHeader: boolean;
}

/* ---- Recursive menu editor ---- */
function MenuItemEditor( { item, path, onUpdate, onRemove, depth }: {
	item: MenuItem; path: number[]; depth: number;
	onUpdate: ( path: number[], field: string, value: any ) => void;
	onRemove: ( path: number[] ) => void;
} ) {
	const [ open, setOpen ] = useState( false );
	const indent = depth * 16;
	const colors = [ '#f7f7f7', '#eef2ff', '#fff7ed' ];
	const bg = colors[ depth ] || '#f7f7f7';

	return (
		<div style={ { marginLeft: `${ indent }px`, marginBottom: '4px' } }>
			<div style={ { display: 'flex', alignItems: 'center', gap: '4px', background: bg, padding: '6px 8px', borderRadius: '4px', border: '1px solid #ddd' } }>
				<span style={ { fontWeight: 600, fontSize: '11px', color: '#666', minWidth: '14px' } }>L{ depth }</span>
				<TextControl
					hideLabelFromVision label="Label"
					value={ item.label }
					onChange={ ( v ) => onUpdate( path, 'label', v ) }
					__nextHasNoMarginBottom
					style={ { flex: 1, marginBottom: 0 } }
				/>
				{ depth < 2 && (
					<Button isSmall variant="secondary" onClick={ () => setOpen( ! open ) }>
						{ open ? '▲' : `▼ (${ item.children.length })` }
					</Button>
				) }
				<Button isSmall isDestructive onClick={ () => onRemove( path ) }>✕</Button>
			</div>
			{ open && (
				<div style={ { marginLeft: '8px', borderLeft: '2px solid #ccc', paddingLeft: '8px', marginTop: '4px' } }>
					<TextControl
						label={ __( 'URL', 'my-blocks' ) }
						value={ item.url }
						onChange={ ( v ) => onUpdate( path, 'url', v ) }
						__nextHasNoMarginBottom
						style={ { marginBottom: '8px' } }
					/>
					{ item.children.map( ( child, ci ) => (
						<MenuItemEditor
							key={ ci }
							item={ child }
							path={ [ ...path, ci ] }
							depth={ depth + 1 }
							onUpdate={ onUpdate }
							onRemove={ onRemove }
						/>
					) ) }
					{ depth < 2 && (
						<Button isSmall variant="secondary" onClick={ () => {
							onUpdate( path, 'children', [ ...item.children, { label: 'New', url: '#', children: [] } ] );
						} } style={ { marginTop: '4px' } }>
							+ Thêm sub (L{ depth + 1 })
						</Button>
					) }
				</div>
			) }
		</div>
	);
}

export default function Edit( { attributes, setAttributes }: { attributes: Attrs; setAttributes: ( a: Partial<Attrs> ) => void } ) {
	const { logoUrl, logoWidth, siteName, menuItems, bgColor, textColor, showSearch, showLocale, showStoreLocator, storeLocatorUrl, showAccount, showCart, stickyHeader } = attributes;

	const blockProps = useBlockProps( {
		className: 'sm-header-wrapper',
		'data-sticky': stickyHeader ? 'true' : 'false',
		style: { '--sm-header-bg': bgColor, '--sm-header-text': textColor } as React.CSSProperties
	} );

	/* Deep update helper for nested menu */
	const deepUpdate = ( items: MenuItem[], path: number[], field: string, value: any ): MenuItem[] => {
		const copy = [ ...items ];
		if ( path.length === 1 ) {
			copy[ path[ 0 ] ] = { ...copy[ path[ 0 ] ], [ field ]: value };
		} else {
			const [ head, ...rest ] = path;
			copy[ head ] = { ...copy[ head ], children: deepUpdate( copy[ head ].children, rest, field, value ) };
		}
		return copy;
	};

	const deepRemove = ( items: MenuItem[], path: number[] ): MenuItem[] => {
		const copy = [ ...items ];
		if ( path.length === 1 ) {
			copy.splice( path[ 0 ], 1 );
		} else {
			const [ head, ...rest ] = path;
			copy[ head ] = { ...copy[ head ], children: deepRemove( copy[ head ].children, rest ) };
		}
		return copy;
	};

	const handleUpdate = ( path: number[], field: string, value: any ) => {
		setAttributes( { menuItems: deepUpdate( menuItems, path, field, value ) } );
	};
	const handleRemove = ( path: number[] ) => {
		setAttributes( { menuItems: deepRemove( menuItems, path ) } );
	};

	return (
		<>
			<InspectorControls>
				<PanelBody title={ __( 'Logo', 'my-blocks' ) } initialOpen={ true }>
					<MediaUploadCheck>
						<MediaUpload
							onSelect={ ( media: { url: string } ) => setAttributes( { logoUrl: media.url } ) }
							allowedTypes={ [ 'image' ] }
							render={ ( { open }: { open: () => void } ) => (
								<div style={ { marginBottom: '12px' } }>
									{ logoUrl && <img src={ logoUrl } alt="" style={ { maxWidth: '100%', marginBottom: '8px', border: '1px solid #ddd', padding: '4px', borderRadius: '4px' } } /> }
									<Button onClick={ open } variant="secondary">
										{ logoUrl ? __( 'Đổi Logo', 'my-blocks' ) : __( 'Chọn Logo (hỗ trợ SVG)', 'my-blocks' ) }
									</Button>
									{ logoUrl && <Button isDestructive onClick={ () => setAttributes( { logoUrl: '' } ) } style={ { marginLeft: '8px' } }>{ __( 'Xoá', 'my-blocks' ) }</Button> }
								</div>
							) }
						/>
					</MediaUploadCheck>
					<RangeControl label={ __( 'Logo width (px)', 'my-blocks' ) } value={ logoWidth } onChange={ ( v ) => setAttributes( { logoWidth: v ?? 160 } ) } min={ 60 } max={ 280 } step={ 5 } />
					<TextControl label={ __( 'Tên thương hiệu (fallback)', 'my-blocks' ) } value={ siteName } onChange={ ( v ) => setAttributes( { siteName: v } ) } />
				</PanelBody>

				<PanelBody title={ __( 'Navigation (Menu đa cấp)', 'my-blocks' ) } initialOpen={ false }>
					<p style={ { fontSize: '12px', color: '#666', marginBottom: '12px' } }>
						Hỗ trợ 3 cấp: <strong>L0</strong> (top) → <strong>L1</strong> (mega column) → <strong>L2</strong> (sub-links)
					</p>
					{ menuItems.map( ( item, i ) => (
						<MenuItemEditor
							key={ i }
							item={ item }
							path={ [ i ] }
							depth={ 0 }
							onUpdate={ handleUpdate }
							onRemove={ handleRemove }
						/>
					) ) }
					<Button variant="primary" onClick={ () => setAttributes( { menuItems: [ ...menuItems, { label: 'New', url: '#', children: [] } ] } ) } style={ { marginTop: '8px' } }>
						+ Thêm menu (L0)
					</Button>
				</PanelBody>

				<PanelBody title={ __( 'Utilities', 'my-blocks' ) } initialOpen={ false }>
					<ToggleControl label={ __( 'Search', 'my-blocks' ) } checked={ showSearch } onChange={ ( v ) => setAttributes( { showSearch: v } ) } />
					<ToggleControl label={ __( 'Language code', 'my-blocks' ) } checked={ showLocale } onChange={ ( v ) => setAttributes( { showLocale: v } ) } />
					<ToggleControl label={ __( 'Store locator', 'my-blocks' ) } checked={ showStoreLocator } onChange={ ( v ) => setAttributes( { showStoreLocator: v } ) } />
					{ showStoreLocator && <TextControl label={ __( 'Store locator URL', 'my-blocks' ) } value={ storeLocatorUrl } onChange={ ( v ) => setAttributes( { storeLocatorUrl: v } ) } /> }
					<ToggleControl label={ __( 'Account', 'my-blocks' ) } checked={ showAccount } onChange={ ( v ) => setAttributes( { showAccount: v } ) } />
					<ToggleControl label={ __( 'Cart', 'my-blocks' ) } checked={ showCart } onChange={ ( v ) => setAttributes( { showCart: v } ) } />
					<ToggleControl label={ __( 'Sticky header', 'my-blocks' ) } checked={ stickyHeader } onChange={ ( v ) => setAttributes( { stickyHeader: v } ) } />
				</PanelBody>

				<PanelBody title={ __( 'Colors', 'my-blocks' ) } initialOpen={ false }>
					<p style={ { marginBottom: 4 } }>{ __( 'Background', 'my-blocks' ) }</p>
					<ColorPalette value={ bgColor } onChange={ ( v ) => setAttributes( { bgColor: v || '#ffffff' } ) } />
					<p style={ { marginBottom: 4 } }>{ __( 'Text / Icon color', 'my-blocks' ) }</p>
					<ColorPalette value={ textColor } onChange={ ( v ) => setAttributes( { textColor: v || '#000000' } ) } />
				</PanelBody>
			</InspectorControls>

		<div { ...blockProps }>
				<header className="sm-header" style={ { background: bgColor, color: textColor } }>
					<div className="sm-header__inner">
						
						{ /* Mobile left: Search */ }
						{ showSearch && (
							<div className="sm-header__mobile-left sm-header__mobile-only">
								<button type="button" className="sm-header__search-trigger" aria-label="Search">
									<svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" strokeWidth="1.5"><circle cx="11" cy="11" r="8" /><line x1="21" y1="21" x2="16.65" y2="16.65" /></svg>
								</button>
							</div>
						) }

						{ /* Logo CENTER (Mobile) / LEFT (Desktop) */ }
						<div className="sm-header__logo">
							<span className="sm-header__logo-link">
								{ logoUrl ? (
									<>
										<img src={ logoUrl } alt={ siteName } className="sm-header__logo-img sm-header__logo-img--desktop" style={ { width: `${ logoWidth }px` } } />
										<img src={ logoUrl } alt={ siteName } className="sm-header__logo-img sm-header__logo-img--mobile sm-header__mobile-only" style={ { width: '100px' } } />
									</>
								) : (
									<>
										<span className="sm-header__logo-text sm-header__logo-text--desktop">{ siteName }</span>
										<span className="sm-header__logo-text sm-header__logo-text--mobile sm-header__mobile-only">{ siteName }</span>
									</>
								) }
							</span>
						</div>

						{ /* Nav CENTER */ }
						<nav className="sm-header__nav">
							<ul className="sm-header__nav-list">
								{ menuItems.map( ( item, i ) => (
									<li className={ `sm-header__nav-item${ item.children.length > 0 ? ' has-submenu' : '' }` } key={ i }>
										<span className="sm-header__nav-link">
											<span>{ item.label }</span>
											{ item.children.length > 0 && (
												<svg className="sm-icon-chevron" width="8" height="5" viewBox="0 0 8 5" fill="none"><path d="M1 1l3 3 3-3" stroke="currentColor" strokeWidth="1.5"/></svg>
											) }
										</span>
									</li>
								) ) }
								{ showSearch && (
									<li className="sm-header__nav-item sm-header__nav-item--search">
										<span className="sm-header__nav-link sm-header__search-trigger">
											<svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" strokeWidth="1.5"><circle cx="11" cy="11" r="8" /><line x1="21" y1="21" x2="16.65" y2="16.65" /></svg>
										</span>
									</li>
								) }
							</ul>
						</nav>

						{ /* Utilities RIGHT */ }
						<div className="sm-header__utilities">
							{ showLocale && <span className="sm-header__utility-text">EN</span> }
							{ showStoreLocator && (
								<span className="sm-header__icon-btn">
									<svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" strokeWidth="1.5"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z" /><circle cx="12" cy="10" r="3" /></svg>
								</span>
							) }
							{ showAccount && (
								<span className="sm-header__icon-btn">
									<svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" strokeWidth="1.5"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2" /><circle cx="12" cy="7" r="4" /></svg>
								</span>
							) }
							{ showCart && (
								<span className="sm-header__icon-btn sm-header__cart-btn">
									<svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" strokeWidth="1.5"><path d="M6 2L3 6v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V6l-3-4z" /><line x1="3" y1="6" x2="21" y2="6" /><path d="M16 10a4 4 0 0 1-8 0" /></svg>
									<span className="sm-header__cart-count">0</span>
								</span>
							) }
						</div>
					</div>
				</header>
			</div>
		</>
	);
}
