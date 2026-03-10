import { useBlockProps } from '@wordpress/block-editor';

interface MenuItem { label: string; url: string; children: MenuItem[]; }

interface Attrs {
	logoUrl: string; logoWidth: number; siteName: string; menuItems: MenuItem[];
	bgColor: string; textColor: string;
	showSearch: boolean; showLocale: boolean; showStoreLocator: boolean; storeLocatorUrl: string;
	showAccount: boolean; showCart: boolean; stickyHeader: boolean;
}

export default function save( { attributes }: { attributes: Attrs } ) {
	const { logoUrl, logoWidth, siteName, menuItems, bgColor, textColor, showSearch, showLocale, showStoreLocator, storeLocatorUrl, showAccount, showCart, stickyHeader } = attributes;

	const blockProps = useBlockProps.save( {
		className: 'sm-header-wrapper',
		'data-sticky': stickyHeader ? 'true' : 'false',
		style: { '--sm-header-bg': bgColor, '--sm-header-text': textColor } as React.CSSProperties,
	} );

	const hasSubmenu = ( item: MenuItem ) => item.children && item.children.length > 0;

	return (
		<div { ...blockProps }>
			{ /* ============ HEADER BAR ============ */ }
			<header className="sm-header" id="sm-header">
				<div className="sm-header__inner">

					{ /* Mobile left: Search */ }
					{ showSearch && (
						<div className="sm-header__mobile-left sm-header__mobile-only">
							<button type="button" className="sm-header__search-trigger" aria-label="Search">
								<svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" strokeWidth="1.5"><circle cx="11" cy="11" r="8" /><line x1="21" y1="21" x2="16.65" y2="16.65" /></svg>
							</button>
						</div>
					) }

					{ /* Logo LEFT */ }
					<div className="sm-header__logo">
						<a href="/" className="sm-header__logo-link">
							{ logoUrl ? (
								<img src={ logoUrl } alt={ siteName } className="sm-header__logo-img sm-header__logo-img--desktop" style={ { width: `${ logoWidth }px` } } />
							) : (
								<span className="sm-header__logo-text sm-header__logo-text--desktop">{ siteName }</span>
							) }
							{ logoUrl ? (
								<img src={ logoUrl } alt={ siteName } className="sm-header__logo-img sm-header__logo-img--mobile sm-header__mobile-only" style={ { width: '100px' } } />
							) : (
								<span className="sm-header__logo-text sm-header__logo-text--mobile sm-header__mobile-only">{ siteName }</span>
							) }
						</a>
					</div>

					{ /* Nav CENTER */ }
					<nav className="sm-header__nav" id="sm-nav" aria-label="Main navigation">
						<ul className="sm-header__nav-list">
							{ menuItems.map( ( item, i ) => (
								<li className={ `sm-header__nav-item${ hasSubmenu( item ) ? ' has-submenu' : '' }` } data-menu-index={ i } key={ i }>
									{ hasSubmenu( item ) ? (
										<button type="button" className="sm-header__nav-link" aria-expanded="false" aria-controls={ `sm-mega-${ i }` }>
											<span>{ item.label }</span>
											<svg className="sm-icon-chevron" width="8" height="5" viewBox="0 0 8 5" fill="none"><path d="M1 1l3 3 3-3" stroke="currentColor" strokeWidth="1.5"/></svg>
										</button>
									) : (
										<a href={ item.url } className="sm-header__nav-link">
											<span>{ item.label }</span>
										</a>
									) }
								</li>
							) ) }
							{ showSearch && (
								<li className="sm-header__nav-item sm-header__nav-item--search sm-header__desktop-only">
									<button type="button" className="sm-header__nav-link sm-header__search-trigger" aria-label="Search">
										<svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" strokeWidth="1.5"><circle cx="11" cy="11" r="8" /><line x1="21" y1="21" x2="16.65" y2="16.65" /></svg>
									</button>
								</li>
							) }
						</ul>
					</nav>

					{ /* Utilities RIGHT */ }
					<div className="sm-header__utilities">
						{ showLocale && (
							<div className="sm-header__lang-switcher sm-header__desktop-only">
								<button type="button" className="sm-header__utility-text sm-header__lang-toggle" aria-expanded="false" aria-label="Change language">EN</button>
							</div>
						) }
						{ showStoreLocator && (
							<a href={ storeLocatorUrl } className="sm-header__icon-btn sm-header__desktop-only" aria-label="Store locator">
								<svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" strokeWidth="1.5"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z" /><circle cx="12" cy="10" r="3" /></svg>
							</a>
						) }
						{ showAccount && (
							<a href="/my-account" className="sm-header__icon-btn sm-header__desktop-only" aria-label="Account">
								<svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" strokeWidth="1.5"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2" /><circle cx="12" cy="7" r="4" /></svg>
							</a>
						) }
						{ showCart && (
							<a href="/cart" className="sm-header__icon-btn sm-header__cart-btn" aria-label="Cart">
								<svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" strokeWidth="1.5"><path d="M6 2L3 6v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V6l-3-4z" /><line x1="3" y1="6" x2="21" y2="6" /><path d="M16 10a4 4 0 0 1-8 0" /></svg>
								<span className="sm-header__cart-count" data-cart-count="">0</span>
							</a>
						) }
						<button type="button" className="sm-header__hamburger sm-header__mobile-only" aria-label="Menu" id="sm-hamburger">
							<svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" strokeWidth="1.5"><line x1="3" y1="6" x2="21" y2="6" /><line x1="3" y1="12" x2="21" y2="12" /><line x1="3" y1="18" x2="21" y2="18" /></svg>
						</button>
					</div>
				</div>
			</header>

			{ /* ============ MEGA MENU PANELS (Desktop) ============ */ }
			{ menuItems.map( ( topItem, i ) =>
				hasSubmenu( topItem ) && (
					<div className="sm-mega" id={ `sm-mega-${ i }` } aria-hidden="true" data-mega-index={ i } key={ `mega-${ i }` }>
						<div className="sm-mega__overlay" data-mega-close=""></div>
						<div className="sm-mega__panel">
							<button type="button" className="sm-mega__close" data-mega-close="" aria-label="Close menu">
								<svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" strokeWidth="1.5"><line x1="18" y1="6" x2="6" y2="18" /><line x1="6" y1="6" x2="18" y2="18" /></svg>
							</button>
							<div className="sm-mega__body">
								<div className="sm-mega__columns">
									{ topItem.children.map( ( child, ci ) => (
										<div className="sm-mega__col" key={ ci }>
											{ child.children && child.children.length > 0 ? (
												<>
													<h3 className="sm-mega__col-title">{ child.label }</h3>
													<ul className="sm-mega__list">
														{ child.children.map( ( grandchild, gi ) => (
															<li key={ gi }><a href={ grandchild.url } className="sm-mega__link">{ grandchild.label }</a></li>
														) ) }
													</ul>
												</>
											) : (
												<a href={ child.url } className="sm-mega__col-title sm-mega__col-title--link">{ child.label }</a>
											) }
										</div>
									) ) }
								</div>
							</div>
						</div>
					</div>
				)
			) }

			{ /* ============ MOBILE DRAWER ============ */ }
			<div className="sm-mobile-drawer" id="sm-mobile-drawer" aria-hidden="true">
				<div className="sm-mobile-drawer__overlay" data-drawer-close=""></div>
				<div className="sm-mobile-drawer__panels">
					{ /* Main panel (Level 0) */ }
					<div className="sm-mobile-drawer__panel is-active" data-panel-id="main">
						<div className="sm-mobile-drawer__header">
							<button type="button" className="sm-mobile-drawer__close" data-drawer-close="" aria-label="Close menu">
								<svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" strokeWidth="1.5"><line x1="18" y1="6" x2="6" y2="18" /><line x1="6" y1="6" x2="18" y2="18" /></svg>
							</button>
						</div>
						<nav className="sm-mobile-drawer__nav">
							<ul className="sm-mobile-drawer__list">
								{ menuItems.map( ( item, i ) => (
									<li className="sm-mobile-drawer__item" key={ i }>
										{ hasSubmenu( item ) ? (
											<button type="button" className="sm-mobile-drawer__link" data-drill-trigger={ `panel-${ i + 1 }` }>
												<span>{ item.label }</span>
												<svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" strokeWidth="2"><path d="M9 18l6-6-6-6"/></svg>
											</button>
										) : (
											<a href={ item.url } className="sm-mobile-drawer__link"><span>{ item.label }</span></a>
										) }
									</li>
								) ) }
							</ul>
							<div className="sm-mobile-drawer__secondary">
								<ul className="sm-mobile-drawer__secondary-list">
									{ showAccount && (
										<li><a href="/my-account" className="sm-mobile-drawer__secondary-link">
											<svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" strokeWidth="1.5"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2" /><circle cx="12" cy="7" r="4" /></svg>
											<span>My Account</span>
										</a></li>
									) }
									{ showStoreLocator && (
										<li><a href={ storeLocatorUrl } className="sm-mobile-drawer__secondary-link">
											<svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" strokeWidth="1.5"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z" /><circle cx="12" cy="10" r="3" /></svg>
											<span>Find a boutique</span>
										</a></li>
									) }
								</ul>
							</div>
						</nav>
					</div>

					{ /* Sub panels (Level 1) */ }
					{ menuItems.map( ( topItem, i ) =>
						hasSubmenu( topItem ) && (
							<div className="sm-mobile-drawer__panel" data-panel-id={ `panel-${ i + 1 }` } data-parent-panel="main" key={ `sub-${ i }` }>
								<div className="sm-mobile-drawer__header">
									<button type="button" className="sm-mobile-drawer__back" data-drill-back="" aria-label="Back">
										<svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" strokeWidth="2"><path d="M19 12H5M12 19l-7-7 7-7"/></svg>
									</button>
									<div className="sm-mobile-drawer__breadcrumbs">
										<span>Home</span> / <span>{ topItem.label }</span>
									</div>
									<button type="button" className="sm-mobile-drawer__close" data-drawer-close="" aria-label="Close">
										<svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" strokeWidth="1.5"><line x1="18" y1="6" x2="6" y2="18" /><line x1="6" y1="6" x2="18" y2="18" /></svg>
									</button>
								</div>
								<div className="sm-mobile-drawer__content">
									<h2 className="sm-mobile-drawer__panel-title">{ topItem.label }</h2>
									<ul className="sm-mobile-drawer__sub-list">
										{ topItem.children.map( ( child, ci ) => (
											<li key={ ci }>
												{ child.children && child.children.length > 0 ? (
													<button type="button" className="sm-mobile-drawer__sub-link" data-drill-trigger={ `subpanel-${ i + 1 }-${ ci + 1 }` }>
														<span>{ child.label }</span>
														<svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" strokeWidth="2"><path d="M9 18l6-6-6-6"/></svg>
													</button>
												) : (
													<a href={ child.url } className="sm-mobile-drawer__sub-link"><span>{ child.label }</span></a>
												) }
											</li>
										) ) }
									</ul>
								</div>
							</div>
						)
					) }

					{ /* Sub-sub panels (Level 2) */ }
					{ menuItems.map( ( topItem, i ) =>
						hasSubmenu( topItem ) && topItem.children.map( ( child, ci ) =>
							child.children && child.children.length > 0 && (
								<div className="sm-mobile-drawer__panel" data-panel-id={ `subpanel-${ i + 1 }-${ ci + 1 }` } data-parent-panel={ `panel-${ i + 1 }` } key={ `subsub-${ i }-${ ci }` }>
									<div className="sm-mobile-drawer__header">
										<button type="button" className="sm-mobile-drawer__back" data-drill-back="" aria-label="Back">
											<svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" strokeWidth="2"><path d="M19 12H5M12 19l-7-7 7-7"/></svg>
										</button>
										<div className="sm-mobile-drawer__breadcrumbs">
											<span>Home</span> / <span>{ topItem.label }</span> / <span>{ child.label }</span>
										</div>
										<button type="button" className="sm-mobile-drawer__close" data-drawer-close="" aria-label="Close">
											<svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" strokeWidth="1.5"><line x1="18" y1="6" x2="6" y2="18" /><line x1="6" y1="6" x2="18" y2="18" /></svg>
										</button>
									</div>
									<div className="sm-mobile-drawer__content">
										<h2 className="sm-mobile-drawer__panel-title">{ child.label }</h2>
										<ul className="sm-mobile-drawer__sub-list">
											{ child.children.map( ( grandchild, gi ) => (
												<li key={ gi }>
													<a href={ grandchild.url } className="sm-mobile-drawer__sub-link"><span>{ grandchild.label }</span></a>
												</li>
											) ) }
										</ul>
									</div>
								</div>
							)
						)
					) }
				</div>
			</div>
		</div>
	);
}
