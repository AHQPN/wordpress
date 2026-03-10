/******/ (() => { // webpackBootstrap
/*!****************************************!*\
  !*** ./src/sm-collection-list/view.ts ***!
  \****************************************/
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
    const gap = 20;
    let currentIndex = 0;
    const totalItems = allItems.length;

    // Determine how many columns are visible based on screen width
    const getVisibleCols = () => {
      if (window.innerWidth <= 480) return 1;
      if (window.innerWidth <= 768) return 2;
      return Math.min(columns, totalItems);
    };
    const setItemWidths = () => {
      const visibleCols = getVisibleCols();
      const containerWidth = track.parentElement.offsetWidth;
      const itemWidth = (containerWidth - gap * (visibleCols - 1)) / visibleCols;
      allItems.forEach(item => {
        item.style.width = itemWidth + 'px';
      });
    };
    const updateSlider = () => {
      const visibleCols = getVisibleCols();
      const containerWidth = track.parentElement.offsetWidth;
      const itemWidth = (containerWidth - gap * (visibleCols - 1)) / visibleCols;

      // Clamp currentIndex so we don't scroll past the end
      const maxIndex = Math.max(0, totalItems - visibleCols);
      if (currentIndex > maxIndex) currentIndex = maxIndex;
      if (currentIndex < 0) currentIndex = 0;
      const offset = currentIndex * (itemWidth + gap);
      track.style.transform = `translateX(-${offset}px)`;

      // Update counter: currentPosition / totalScrollablePositions
      const totalPositions = maxIndex + 1;
      if (currentEl) {
        currentEl.textContent = String(currentIndex + 1);
      }
      if (totalEl) {
        totalEl.textContent = String(totalPositions);
      }
    };
    setItemWidths();
    updateSlider();
    window.addEventListener('resize', () => {
      setItemWidths();
      updateSlider();
    });
    if (prevBtn) {
      prevBtn.addEventListener('click', () => {
        if (currentIndex > 0) {
          currentIndex--;
          updateSlider();
        }
      });
    }
    if (nextBtn) {
      nextBtn.addEventListener('click', () => {
        const visibleCols = getVisibleCols();
        const maxIndex = Math.max(0, totalItems - visibleCols);
        if (currentIndex < maxIndex) {
          currentIndex++;
          updateSlider();
        }
      });
    }
  });
});
/******/ })()
;
//# sourceMappingURL=view.js.map