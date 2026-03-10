/**
 * SM Header – Mega Menu + Mobile Drawer interactions
 * Ported from Shopify sm-header.js
 */
( function () {
	'use strict';

	/* ———— Selectors ———— */
	const header = document.getElementById( 'sm-header' );
	const navItems = document.querySelectorAll( '.sm-header__nav-item.has-submenu' );
	const megaPanels = document.querySelectorAll( '.sm-mega' );
	const hamburger = document.getElementById( 'sm-hamburger' );
	const mobileDrawer = document.getElementById( 'sm-mobile-drawer' );

	let activeMega: string | null = null;

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
		}
	} );
} )();
