/******/ (() => { // webpackBootstrap
/******/ 	"use strict";
/******/ 	var __webpack_modules__ = ({

/***/ "./src/common/slider.ts"
/*!******************************!*\
  !*** ./src/common/slider.ts ***!
  \******************************/
(__unused_webpack_module, __webpack_exports__, __webpack_require__) {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   SMSlider: () => (/* binding */ SMSlider)
/* harmony export */ });
class SMSlider {
  currentIndex = 0;
  startX = 0;
  currentX = 0;
  isDragging = false;
  startOffset = 0;
  constructor(options) {
    this.options = options;
    this.totalItems = options.items.length;
    this.gap = options.gap ?? 20;
    if (this.totalItems === 0) return;
    this.init();
  }
  init() {
    this.setItemWidths();
    this.updateSlider();
    window.addEventListener('resize', () => {
      this.setItemWidths();
      this.updateSlider();
    });
    if (this.options.prevBtn) {
      this.options.prevBtn.addEventListener('click', () => this.prev());
    }
    if (this.options.nextBtn) {
      this.options.nextBtn.addEventListener('click', () => this.next());
    }
    this.initTouchEvents();
  }
  getVisibleCols() {
    if (window.innerWidth <= 480) return 1;
    if (window.innerWidth <= 768) return 2;
    return Math.min(this.options.columns, this.totalItems);
  }
  setItemWidths() {
    const visibleCols = this.getVisibleCols();
    const containerWidth = this.options.track.parentElement.offsetWidth;
    const itemWidth = (containerWidth - this.gap * (visibleCols - 1)) / visibleCols;
    this.options.items.forEach(item => {
      item.style.width = itemWidth + 'px';
    });
  }
  updateSlider(animate = true) {
    const visibleCols = this.getVisibleCols();
    const containerWidth = this.options.track.parentElement.offsetWidth;
    const itemWidth = (containerWidth - this.gap * (visibleCols - 1)) / visibleCols;
    const maxIndex = Math.max(1, this.totalItems - visibleCols);
    if (this.currentIndex > maxIndex) this.currentIndex = maxIndex;
    if (this.currentIndex < 0) this.currentIndex = 0;
    const offset = this.currentIndex * (itemWidth + this.gap);
    if (animate) {
      this.options.track.style.transition = 'transform 0.5s cubic-bezier(0.25, 0.46, 0.45, 0.94)';
    } else {
      this.options.track.style.transition = 'none';
    }
    this.options.track.style.transform = `translateX(-${offset}px)`;
    const totalPositions = maxIndex + 1;
    if (this.options.currentEl) {
      this.options.currentEl.textContent = String(this.currentIndex + 1);
    }
    if (this.options.totalEl) {
      this.options.totalEl.textContent = String(totalPositions);
    }

    // Update button states
    if (this.options.prevBtn) {
      this.options.prevBtn.disabled = this.currentIndex === 0;
      this.options.prevBtn.style.opacity = this.currentIndex === 0 ? '0.2' : '1';
    }
    if (this.options.nextBtn) {
      this.options.nextBtn.disabled = this.currentIndex >= maxIndex;
      this.options.nextBtn.style.opacity = this.currentIndex >= maxIndex ? '0.2' : '1';
    }
  }
  next() {
    const visibleCols = this.getVisibleCols();
    const maxIndex = Math.max(0, this.totalItems - visibleCols);
    if (this.currentIndex < maxIndex) {
      this.currentIndex++;
      this.updateSlider();
    }
  }
  prev() {
    if (this.currentIndex > 0) {
      this.currentIndex--;
      this.updateSlider();
    }
  }
  initTouchEvents() {
    const track = this.options.track;
    track.addEventListener('touchstart', e => {
      this.startX = e.touches[0].clientX;
      this.isDragging = true;
      this.startOffset = this.getTranslateX();
      track.style.transition = 'none';
    }, {
      passive: true
    });
    track.addEventListener('touchmove', e => {
      if (!this.isDragging) return;
      this.currentX = e.touches[0].clientX;
      const diff = this.currentX - this.startX;
      track.style.transform = `translateX(${this.startOffset + diff}px)`;
    }, {
      passive: true
    });
    track.addEventListener('touchend', e => {
      if (!this.isDragging) return;
      this.isDragging = false;
      const diff = this.currentX - this.startX;
      const threshold = 50; // pixels

      if (Math.abs(diff) > threshold) {
        if (diff > 0) {
          this.prev();
        } else {
          this.next();
        }
      } else {
        this.updateSlider();
      }
    });
  }
  getTranslateX() {
    const style = window.getComputedStyle(this.options.track);
    const transform = style.transform || style.webkitTransform;
    if (!transform || transform === 'none') return 0;
    try {
      const matrix = window.WebKitCSSMatrix ? new window.WebKitCSSMatrix(transform) : new DOMMatrix(transform);
      return matrix.m41;
    } catch (e) {
      return 0;
    }
  }
}

/***/ }

/******/ 	});
/************************************************************************/
/******/ 	// The module cache
/******/ 	var __webpack_module_cache__ = {};
/******/ 	
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/ 		// Check if module is in cache
/******/ 		var cachedModule = __webpack_module_cache__[moduleId];
/******/ 		if (cachedModule !== undefined) {
/******/ 			return cachedModule.exports;
/******/ 		}
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = __webpack_module_cache__[moduleId] = {
/******/ 			// no module.id needed
/******/ 			// no module.loaded needed
/******/ 			exports: {}
/******/ 		};
/******/ 	
/******/ 		// Execute the module function
/******/ 		if (!(moduleId in __webpack_modules__)) {
/******/ 			delete __webpack_module_cache__[moduleId];
/******/ 			var e = new Error("Cannot find module '" + moduleId + "'");
/******/ 			e.code = 'MODULE_NOT_FOUND';
/******/ 			throw e;
/******/ 		}
/******/ 		__webpack_modules__[moduleId](module, module.exports, __webpack_require__);
/******/ 	
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/ 	
/************************************************************************/
/******/ 	/* webpack/runtime/define property getters */
/******/ 	(() => {
/******/ 		// define getter functions for harmony exports
/******/ 		__webpack_require__.d = (exports, definition) => {
/******/ 			for(var key in definition) {
/******/ 				if(__webpack_require__.o(definition, key) && !__webpack_require__.o(exports, key)) {
/******/ 					Object.defineProperty(exports, key, { enumerable: true, get: definition[key] });
/******/ 				}
/******/ 			}
/******/ 		};
/******/ 	})();
/******/ 	
/******/ 	/* webpack/runtime/hasOwnProperty shorthand */
/******/ 	(() => {
/******/ 		__webpack_require__.o = (obj, prop) => (Object.prototype.hasOwnProperty.call(obj, prop))
/******/ 	})();
/******/ 	
/******/ 	/* webpack/runtime/make namespace object */
/******/ 	(() => {
/******/ 		// define __esModule on exports
/******/ 		__webpack_require__.r = (exports) => {
/******/ 			if(typeof Symbol !== 'undefined' && Symbol.toStringTag) {
/******/ 				Object.defineProperty(exports, Symbol.toStringTag, { value: 'Module' });
/******/ 			}
/******/ 			Object.defineProperty(exports, '__esModule', { value: true });
/******/ 		};
/******/ 	})();
/******/ 	
/************************************************************************/
var __webpack_exports__ = {};
// This entry needs to be wrapped in an IIFE because it needs to be isolated against other modules in the chunk.
(() => {
/*!****************************************!*\
  !*** ./src/sm-collection-list/view.ts ***!
  \****************************************/
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _common_slider__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ../common/slider */ "./src/common/slider.ts");

document.addEventListener('DOMContentLoaded', () => {
  const blocks = document.querySelectorAll('.sm-collection-list');
  blocks.forEach(block => {
    const track = block.querySelector('.sm-cl-track');
    const allItems = block.querySelectorAll('.sm-cl-item');
    const prevBtn = block.querySelector('.sm-cl-prev');
    const nextBtn = block.querySelector('.sm-cl-next');
    const currentEl = block.querySelector('.sm-cl-current');
    const totalEl = block.querySelector('.sm-cl-total');
    const columns = parseInt(block.dataset.columns || '4', 10);
    if (!track || allItems.length === 0) return;
    new _common_slider__WEBPACK_IMPORTED_MODULE_0__.SMSlider({
      container: block,
      track,
      items: allItems,
      prevBtn,
      nextBtn,
      currentEl,
      totalEl,
      columns,
      gap: 20
    });
  });
});
})();

/******/ })()
;
//# sourceMappingURL=view.js.map