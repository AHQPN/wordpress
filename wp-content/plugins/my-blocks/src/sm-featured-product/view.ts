document.addEventListener( 'DOMContentLoaded', () => {
	const blocks = document.querySelectorAll( '.sm-featured-product' );

	blocks.forEach( ( block ) => {
		const track = block.querySelector( '.sm-fp-track' ) as HTMLElement;
		const allItems = block.querySelectorAll( '.sm-fp-card' ) as NodeListOf<HTMLElement>;
		const prevBtn = block.querySelector( '.sm-fp-prev' );
		const nextBtn = block.querySelector( '.sm-fp-next' );
		const currentEl = block.querySelector( '.sm-fp-current' );
		const totalEl = block.querySelector( '.sm-fp-total' );
		const columns = parseInt( ( block as HTMLElement ).dataset.columns || '3', 10 );

		if ( ! track || allItems.length === 0 ) return;

		const gap = 20;
		let currentIndex = 0;
		const totalItems = allItems.length;

		const getVisibleCols = (): number => {
			if ( window.innerWidth <= 480 ) return 1;
			if ( window.innerWidth <= 768 ) return 2;
			return Math.min( columns, totalItems );
		};

		const setItemWidths = () => {
			const visibleCols = getVisibleCols();
			const containerWidth = ( track.parentElement as HTMLElement ).offsetWidth;
			const itemWidth = ( containerWidth - gap * ( visibleCols - 1 ) ) / visibleCols;
			allItems.forEach( ( item ) => {
				item.style.width = itemWidth + 'px';
			} );
		};

		const updateSlider = () => {
			const visibleCols = getVisibleCols();
			const containerWidth = ( track.parentElement as HTMLElement ).offsetWidth;
			const itemWidth = ( containerWidth - gap * ( visibleCols - 1 ) ) / visibleCols;

			const maxIndex = Math.max( 0, totalItems - visibleCols );
			if ( currentIndex > maxIndex ) currentIndex = maxIndex;
			if ( currentIndex < 0 ) currentIndex = 0;

			const offset = currentIndex * ( itemWidth + gap );
			track.style.transform = `translateX(-${ offset }px)`;

			const totalPositions = maxIndex + 1;
			if ( currentEl ) {
				currentEl.textContent = String( currentIndex + 1 );
			}
			if ( totalEl ) {
				totalEl.textContent = String( totalPositions );
			}
		};

		setItemWidths();
		updateSlider();

		window.addEventListener( 'resize', () => {
			setItemWidths();
			updateSlider();
		} );

		if ( prevBtn ) {
			prevBtn.addEventListener( 'click', () => {
				if ( currentIndex > 0 ) {
					currentIndex--;
					updateSlider();
				}
			} );
		}

		if ( nextBtn ) {
			nextBtn.addEventListener( 'click', () => {
				const visibleCols = getVisibleCols();
				const maxIndex = Math.max( 0, totalItems - visibleCols );
				if ( currentIndex < maxIndex ) {
					currentIndex++;
					updateSlider();
				}
			} );
		}
	} );
} );
