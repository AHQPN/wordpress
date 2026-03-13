import { __ } from '@wordpress/i18n';
import { useBlockProps, MediaUpload, MediaUploadCheck, InspectorControls } from '@wordpress/block-editor';
import { PanelBody, Button, ToggleControl, TextControl, RangeControl, ColorPalette, SelectControl, Spinner } from '@wordpress/components';
import { useSelect } from '@wordpress/data';
import './editor.scss';

interface Attrs {
	logoUrl: string; logoWidth: number; siteName: string; menuId: number;
	bgColor: string; textColor: string;
	showSearch: boolean; showLocale: boolean; showStoreLocator: boolean; storeLocatorUrl: string;
	showAccount: boolean; showCart: boolean; stickyHeader: boolean;
}

export default function Edit( { attributes, setAttributes }: { attributes: Attrs; setAttributes: ( a: Partial<Attrs> ) => void } ) {
	const { logoUrl, logoWidth, siteName, menuId, bgColor, textColor, showSearch, showLocale, showStoreLocator, storeLocatorUrl, showAccount, showCart, stickyHeader } = attributes;

	const blockProps = useBlockProps( {
		className: 'sm-header-wrapper sm-header-editor-preview',
		'data-sticky': stickyHeader ? 'true' : 'false',
		style: { '--sm-header-bg': bgColor, '--sm-header-text': textColor } as React.CSSProperties
	} );

	// Fetch available WordPress navigation menus
	const { menus, isResolving } = useSelect( ( select ) => {
		const { getEntityRecords, isResolving } = select( 'core' ) as any;
		return {
			menus: getEntityRecords( 'taxonomy', 'nav_menu', { per_page: -1 } ),
			isResolving: isResolving( 'core', 'getEntityRecords', [ 'taxonomy', 'nav_menu', { per_page: -1 } ] ),
		};
	}, [] );

	const menuOptions = [
		{ label: __( 'Select a menu', 'my-blocks' ), value: 0 },
		...( menus || [] ).map( ( menu: any ) => ( {
			label: menu.name,
			value: menu.id,
		} ) ),
	];

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

				<PanelBody title={ __( 'Navigation Menu', 'my-blocks' ) } initialOpen={ true }>
					{ isResolving ? (
						<Spinner />
					) : (
						<>
							<SelectControl
								label={ __( 'Select Menu', 'my-blocks' ) }
								value={ String( menuId ) }
								options={ menuOptions }
								onChange={ ( value ) => setAttributes( { menuId: parseInt( value, 10 ) } ) }
								help={ __( 'Select a navigation menu created in Appearance -> Menus. This block supports up to 3 levels: Top level -> Mega columns -> Links.', 'my-blocks' ) }
							/>
							{ ! menus?.length && (
								<p style={ { fontSize: '13px', color: '#d63638' } }>
									{ __( 'No menus found. Please create one in Appearance -> Menus.', 'my-blocks' ) }
								</p>
							) }
						</>
					) }
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

						{ /* Nav CENTER placeholder for editor */ }
						<nav className="sm-header__nav">
							<ul className="sm-header__nav-list">
								<li className="sm-header__nav-item">
                                    <span className="sm-header__nav-link" style={{ padding: '10px 15px', border: '1px dashed #ccc', borderRadius: '4px', opacity: 0.7 }}>
                                        { menuId ? __( 'Dynamic Menu Selected', 'my-blocks' ) : __( 'Select a Menu', 'my-blocks' ) }
                                    </span>
                                </li>
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
