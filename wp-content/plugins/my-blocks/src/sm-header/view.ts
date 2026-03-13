/**
 * SM Header – Mega Menu + Mobile Drawer + Live Search
 * Ported from Shopify sm-header.js
 */
declare const smHeaderSearch: { ajaxUrl: string; nonce: string } | undefined;

( function () {
	'use strict';

	/* ———— Selectors ———— */
	const header = document.getElementById( 'sm-header' );
	const navItems = document.querySelectorAll( '.sm-header__nav-item.has-submenu' );
	const megaPanels = document.querySelectorAll( '.sm-mega' );
	const hamburger = document.getElementById( 'sm-hamburger' );
	const mobileDrawer = document.getElementById( 'sm-mobile-drawer' );
	const searchBar = document.getElementById( 'sm-search-bar' );
	const searchTriggers = document.querySelectorAll( '.sm-header__search-trigger' );
	const searchClose = document.getElementById( 'sm-search-close' );
	const searchInput = document.getElementById( 'sm-header-search-input' ) as HTMLInputElement;

	// Live search elements
	const searchResultsContainer = document.getElementById( 'sm-search-results' );
	const searchResultsList = document.getElementById( 'sm-search-results-list' );
	const searchLoading = document.getElementById( 'sm-search-loading' );
	const searchEmpty = document.getElementById( 'sm-search-empty' );
	const searchViewAll = document.getElementById( 'sm-search-view-all' ) as HTMLAnchorElement;

	let activeMega: string | null = null;
	let searchDebounce: ReturnType< typeof setTimeout > | null = null;
	let currentAbortController: AbortController | null = null;

	/* ————— Search Functions ———— */
	function openSearch() {
		if ( ! searchBar ) return;
		searchBar.classList.add( 'is-active' );
		searchBar.setAttribute( 'aria-hidden', 'false' );
		document.body.classList.add( 'sm-no-scroll' );
		setTimeout( () => {
			if ( searchInput ) searchInput.focus();
		}, 100 );
	}

	function closeSearch() {
		if ( ! searchBar ) return;
		searchBar.classList.remove( 'is-active' );
		searchBar.setAttribute( 'aria-hidden', 'true' );
		document.body.classList.remove( 'sm-no-scroll' );
		clearSearchResults();
	}

	function clearSearchResults() {
		if ( searchResultsList ) searchResultsList.innerHTML = '';
		if ( searchLoading ) searchLoading.style.display = 'none';
		if ( searchEmpty ) searchEmpty.style.display = 'none';
		if ( searchViewAll ) searchViewAll.style.display = 'none';
		if ( searchResultsContainer ) searchResultsContainer.classList.remove( 'has-results' );
	}

	function showLoading() {
		if ( searchLoading ) searchLoading.style.display = 'flex';
		if ( searchEmpty ) searchEmpty.style.display = 'none';
		if ( searchViewAll ) searchViewAll.style.display = 'none';
		if ( searchResultsList ) searchResultsList.innerHTML = '';
	}

	function renderResults( data: {
		products: Array< {
			id: number;
			name: string;
			permalink: string;
			thumbnail: string;
			price: string;
		} >;
		keyword: string;
		search_url: string;
	} ) {
		if ( searchLoading ) searchLoading.style.display = 'none';

		if ( ! data.products || data.products.length === 0 ) {
			if ( searchEmpty ) searchEmpty.style.display = 'flex';
			if ( searchResultsContainer ) searchResultsContainer.classList.remove( 'has-results' );
			return;
		}

		if ( searchResultsContainer ) searchResultsContainer.classList.add( 'has-results' );

		const html = data.products
			.map(
				( product ) => `
			<a href="${ product.permalink }" class="sm-search-results__item">
				<div class="sm-search-results__thumb">
					<img src="${ product.thumbnail }" alt="${ product.name }" loading="lazy" />
				</div>
				<div class="sm-search-results__info">
					<span class="sm-search-results__name">${ product.name }</span>
					<span class="sm-search-results__price">${ product.price }</span>
				</div>
			</a>
		`
			)
			.join( '' );

		if ( searchResultsList ) searchResultsList.innerHTML = html;

		// Show "View All" link
		if ( searchViewAll ) {
			searchViewAll.href = data.search_url;
			searchViewAll.style.display = 'flex';
		}
	}

	function performSearch( keyword: string ) {
		if ( typeof smHeaderSearch === 'undefined' ) return;
		if ( keyword.length < 2 ) {
			clearSearchResults();
			return;
		}

		// Abort previous request
		if ( currentAbortController ) {
			currentAbortController.abort();
		}
		currentAbortController = new AbortController();

		showLoading();

		const url = new URL( smHeaderSearch.ajaxUrl );
		url.searchParams.set( 'action', 'sm_header_search' );
		url.searchParams.set( 'nonce', smHeaderSearch.nonce );
		url.searchParams.set( 'keyword', keyword );

		fetch( url.toString(), { signal: currentAbortController.signal } )
			.then( ( res ) => res.json() )
			.then( ( response ) => {
				if ( response.success ) {
					renderResults( response.data );
				}
			} )
			.catch( ( err ) => {
				if ( err.name !== 'AbortError' ) {
					if ( searchLoading ) searchLoading.style.display = 'none';
				}
			} );
	}

	// Debounced input handler
	if ( searchInput ) {
		searchInput.addEventListener( 'input', function () {
			const value = this.value.trim();
			if ( searchDebounce ) clearTimeout( searchDebounce );

			if ( value.length < 2 ) {
				clearSearchResults();
				return;
			}

			searchDebounce = setTimeout( () => {
				performSearch( value );
			}, 300 );
		} );
	}

	/* ——————————————————————————————
	   MEGA MENU (desktop)
	—————————————————————————————— */

	function openMega( index: string ) {
		closeMega();

		const panel = document.getElementById( 'sm-mega-' + index );
		if ( ! panel ) return;

		panel.classList.add( 'is-open' );
		panel.setAttribute( 'aria-hidden', 'false' );
		document.body.classList.add( 'sm-no-scroll' );

		navItems.forEach( ( item ) => {
			const el = item as HTMLElement;
			if ( el.dataset.menuIndex === String( index ) ) {
				el.classList.add( 'is-active' );
				const btn = el.querySelector( 'button' );
				if ( btn ) btn.setAttribute( 'aria-expanded', 'true' );
			}
		} );

		activeMega = index;
	}

	function closeMega() {
		megaPanels.forEach( ( p ) => {
			p.classList.remove( 'is-open' );
			p.setAttribute( 'aria-hidden', 'true' );
		} );
		navItems.forEach( ( item ) => {
			item.classList.remove( 'is-active' );
			const btn = item.querySelector( 'button' );
			if ( btn ) btn.setAttribute( 'aria-expanded', 'false' );
		} );
		document.body.classList.remove( 'sm-no-scroll' );
		activeMega = null;
	}

	// Click on nav item button
	navItems.forEach( ( item ) => {
		const btn = item.querySelector( 'button' );
		if ( ! btn ) return;

		btn.addEventListener( 'click', function ( e ) {
			e.preventDefault();
			const idx = ( item as HTMLElement ).dataset.menuIndex;
			if ( ! idx ) return;

			if ( activeMega !== null && String( activeMega ) === String( idx ) ) {
				closeMega();
			} else {
				openMega( idx );
			}
		} );
	} );

	// Close buttons inside mega panels
	document.querySelectorAll( '[data-mega-close]' ).forEach( ( el ) => {
		el.addEventListener( 'click', closeMega );
	} );

	/* ——————————————————————————————
	   MOBILE DRAWER
	—————————————————————————————— */

	const panels = document.querySelectorAll( '.sm-mobile-drawer__panel' );
	const overlay = mobileDrawer?.querySelector( '.sm-mobile-drawer__overlay' );

	function openDrawer() {
		if ( ! mobileDrawer ) return;
		mobileDrawer.classList.add( 'is-open' );
		mobileDrawer.setAttribute( 'aria-hidden', 'false' );
		document.body.classList.add( 'sm-no-scroll' );
		resetPanels();
	}

	function closeDrawer() {
		if ( ! mobileDrawer ) return;
		mobileDrawer.classList.remove( 'is-open' );
		mobileDrawer.setAttribute( 'aria-hidden', 'true' );
		document.body.classList.remove( 'sm-no-scroll' );
	}

	function resetPanels() {
		panels.forEach( ( p ) => {
			p.classList.remove( 'is-active', 'is-parent-hidden' );
			if ( ( p as HTMLElement ).dataset.panelId === 'main' ) {
				p.classList.add( 'is-active' );
			}
		} );
	}

	// Drill-down trigger
	document.querySelectorAll( '[data-drill-trigger]' ).forEach( ( trigger ) => {
		trigger.addEventListener( 'click', () => {
			const targetId = trigger.getAttribute( 'data-drill-trigger' );
			if ( ! targetId ) return;

			const targetPanel = document.querySelector( `.sm-mobile-drawer__panel[data-panel-id="${ targetId }"]` );
			if ( ! targetPanel ) return;

			const parentPanelId = ( targetPanel as HTMLElement ).getAttribute( 'data-parent-panel' );
			if ( parentPanelId ) {
				const parentPanel = document.querySelector( `.sm-mobile-drawer__panel[data-panel-id="${ parentPanelId }"]` );
				if ( parentPanel ) parentPanel.classList.add( 'is-parent-hidden' );
			}

			targetPanel.classList.add( 'is-active' );
		} );
	} );

	// Back trigger
	document.querySelectorAll( '[data-drill-back]' ).forEach( ( backBtn ) => {
		backBtn.addEventListener( 'click', () => {
			const currentPanel = backBtn.closest( '.sm-mobile-drawer__panel' );
			if ( ! currentPanel ) return;

			const parentPanelId = currentPanel.getAttribute( 'data-parent-panel' );
			if ( parentPanelId ) {
				const parentPanel = document.querySelector( `.sm-mobile-drawer__panel[data-panel-id="${ parentPanelId }"]` );
				if ( parentPanel ) {
					currentPanel.classList.remove( 'is-active' );
					parentPanel.classList.remove( 'is-parent-hidden' );
				}
			}
		} );
	} );

	if ( hamburger ) {
		hamburger.addEventListener( 'click', function () {
			if ( mobileDrawer && mobileDrawer.classList.contains( 'is-open' ) ) {
				closeDrawer();
			} else {
				openDrawer();
			}
		} );
	}

	if ( overlay ) {
		overlay.addEventListener( 'click', closeDrawer );
	}

	document.querySelectorAll( '[data-drawer-close]' ).forEach( ( el ) => {
		if ( el !== overlay ) {
			el.addEventListener( 'click', closeDrawer );
		}
	} );

	// Escape key
	document.addEventListener( 'keydown', function ( e ) {
		if ( e.key === 'Escape' ) {
			closeMega();
			closeDrawer();
			closeSearch();
		}
	} );

	// Search triggers
	searchTriggers.forEach( ( trigger ) => {
		trigger.addEventListener( 'click', ( e ) => {
			e.preventDefault();
			openSearch();
		} );
	} );

	if ( searchClose ) {
		searchClose.addEventListener( 'click', closeSearch );
	}
} )();

