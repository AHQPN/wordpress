/**
 * SM Header – Mega Menu + Mobile Drawer interactions
 * Lacoste-style click-based mega menu
 */
(function () {
  'use strict';

  /* ——— Selectors ——— */
  const header = document.getElementById('sm-header');
  const navItems = document.querySelectorAll('.sm-header__nav-item.has-submenu');
  const megaPanels = document.querySelectorAll('.sm-mega');
  const hamburger = document.getElementById('sm-hamburger');
  const mobileDrawer = document.getElementById('sm-mobile-drawer');

  let activeMega = null;

  /* ——————————————————————————————
     MEGA MENU (desktop)
  —————————————————————————————— */

  function openMega(index) {
    // Close any currently open
    closeMega();

    const panel = document.getElementById('sm-mega-' + index);
    if (!panel) return;

    panel.classList.add('is-open');
    panel.setAttribute('aria-hidden', 'false');
    document.body.classList.add('sm-no-scroll');

    // Mark nav item active
    navItems.forEach((item) => {
      if (item.dataset.menuIndex === String(index)) {
        item.classList.add('is-active');
        const btn = item.querySelector('button');
        if (btn) btn.setAttribute('aria-expanded', 'true');
      }
    });

    activeMega = index;
  }

  function closeMega() {
    megaPanels.forEach((p) => {
      p.classList.remove('is-open');
      p.setAttribute('aria-hidden', 'true');
    });
    navItems.forEach((item) => {
      item.classList.remove('is-active');
      const btn = item.querySelector('button');
      if (btn) btn.setAttribute('aria-expanded', 'false');
    });
    document.body.classList.remove('sm-no-scroll');
    activeMega = null;
  }

  // Click on nav item button
  navItems.forEach((item) => {
    const btn = item.querySelector('button');
    if (!btn) return;

    btn.addEventListener('click', function (e) {
      e.preventDefault();
      const idx = item.dataset.menuIndex;

      if (activeMega !== null && String(activeMega) === String(idx)) {
        // Toggle off
        closeMega();
      } else {
        openMega(idx);
      }
    });
  });

  // Close buttons inside mega panels
  document.querySelectorAll('[data-mega-close]').forEach((el) => {
    el.addEventListener('click', closeMega);
  });

  /* ——————————————————————————————
     LANGUAGE SWITCHER
  —————————————————————————————— */

  const langSwitcher = document.querySelector('.sm-header__lang-switcher');
  const langToggle = document.querySelector('.sm-header__lang-toggle');

  function closeLangDropdown() {
    if (!langSwitcher) return;
    langSwitcher.classList.remove('is-open');
    if (langToggle) langToggle.setAttribute('aria-expanded', 'false');
    const dropdown = langSwitcher.querySelector('.sm-header__lang-dropdown');
    if (dropdown) dropdown.setAttribute('aria-hidden', 'true');
  }

  if (langToggle && langSwitcher) {
    langToggle.addEventListener('click', function (e) {
      e.stopPropagation();
      const isOpen = langSwitcher.classList.contains('is-open');
      if (isOpen) {
        closeLangDropdown();
      } else {
        langSwitcher.classList.add('is-open');
        langToggle.setAttribute('aria-expanded', 'true');
        const dropdown = langSwitcher.querySelector('.sm-header__lang-dropdown');
        if (dropdown) dropdown.setAttribute('aria-hidden', 'false');
      }
    });
  }

  // Close lang dropdown when clicking outside
  document.addEventListener('click', function (e) {
    if (langSwitcher && !langSwitcher.contains(e.target)) {
      closeLangDropdown();
    }
  });

  // Close on Escape key
  document.addEventListener('keydown', function (e) {
    if (e.key === 'Escape') {
      closeMega();
      closeDrawer();
      closeLangDropdown();
    }
  });

  /* ——————————————————————————————
     MOBILE DRAWER
  —————————————————————————————— */

  /* ——————————————————————————————
     MOBILE DRAWER: DRILL-DOWN
  —————————————————————————————— */

  const panels = document.querySelectorAll('.sm-mobile-drawer__panel');
  const overlay = document.querySelector('.sm-mobile-drawer__overlay');

  function openDrawer() {
    if (!mobileDrawer) return;
    mobileDrawer.classList.add('is-open');
    mobileDrawer.setAttribute('aria-hidden', 'false');
    document.body.classList.add('sm-no-scroll');
    
    // Reset to main panel on open
    resetPanels();
  }

  function closeDrawer() {
    if (!mobileDrawer) return;
    mobileDrawer.classList.remove('is-open');
    mobileDrawer.setAttribute('aria-hidden', 'true');
    document.body.classList.remove('sm-no-scroll');
  }

  function resetPanels() {
    panels.forEach(p => {
      p.classList.remove('is-active', 'is-parent-hidden');
      if (p.dataset.panelId === 'main') {
        p.classList.add('is-active');
      }
    });
  }

  // Drill-down trigger
  document.querySelectorAll('[data-drill-trigger]').forEach(trigger => {
    trigger.addEventListener('click', () => {
      const targetId = trigger.getAttribute('data-drill-trigger');
      if (!targetId) return;

      const targetPanel = document.querySelector(`.sm-mobile-drawer__panel[data-panel-id="${targetId}"]`);
      if (!targetPanel) return;

      const parentPanelId = targetPanel.getAttribute('data-parent-panel');
      if (parentPanelId) {
        const parentPanel = document.querySelector(`.sm-mobile-drawer__panel[data-panel-id="${parentPanelId}"]`);
        if (parentPanel) parentPanel.classList.add('is-parent-hidden');
      }

      targetPanel.classList.add('is-active');
    });
  });

  // Back trigger
  document.querySelectorAll('[data-drill-back]').forEach(backBtn => {
    backBtn.addEventListener('click', () => {
      const currentPanel = backBtn.closest('.sm-mobile-drawer__panel');
      if (!currentPanel) return;

      const parentPanelId = currentPanel.getAttribute('data-parent-panel');
      if (parentPanelId) {
        const parentPanel = document.querySelector(`.sm-mobile-drawer__panel[data-panel-id="${parentPanelId}"]`);
        if (parentPanel) {
          currentPanel.classList.remove('is-active');
          parentPanel.classList.remove('is-parent-hidden');
        }
      }
    });
  });

  if (hamburger) {
    hamburger.addEventListener('click', function() {
      if (mobileDrawer && mobileDrawer.classList.contains('is-open')) {
        closeDrawer();
      } else {
        openDrawer();
      }
    });
  }

  if (overlay) {
    overlay.addEventListener('click', closeDrawer);
  }

  document.querySelectorAll('[data-drawer-close]').forEach((el) => {
    if (el !== overlay) { // Avoid double event if overlay is also data-drawer-close
      el.addEventListener('click', closeDrawer);
    }
  });

  // Mobile language switcher toggle
  const mobileLangTrigger = document.querySelector('.sm-mobile-drawer__lang-trigger');
  if (mobileLangTrigger) {
    mobileLangTrigger.addEventListener('click', function () {
      const langList = mobileLangTrigger.nextElementSibling;
      if (!langList || !(langList instanceof HTMLElement)) return;
      const isExpanded = mobileLangTrigger.getAttribute('aria-expanded') === 'true';
      if (isExpanded) {
        langList.style.display = 'none';
        mobileLangTrigger.setAttribute('aria-expanded', 'false');
      } else {
        langList.style.display = 'block';
        mobileLangTrigger.setAttribute('aria-expanded', 'true');
      }
    });
  }
})();
