export interface SliderOptions {
	container: HTMLElement;
	track: HTMLElement;
	items: NodeListOf<HTMLElement> | HTMLElement[];
	prevBtn?: HTMLElement | null;
	nextBtn?: HTMLElement | null;
	currentEl?: HTMLElement | null;
	totalEl?: HTMLElement | null;
	columns: number;
	gap?: number;
}

export class SMSlider {
	private options: SliderOptions;
	private currentIndex: number = 0;
	private totalItems: number;
	private gap: number;
	private startX: number = 0;
	private currentX: number = 0;
	private isDragging: boolean = false;
	private startOffset: number = 0;

	constructor( options: SliderOptions ) {
		this.options = options;
		this.totalItems = options.items.length;
		this.gap = options.gap ?? 20;

		if ( this.totalItems === 0 ) return;

		this.init();
	}

	private init() {
		this.setItemWidths();
		this.updateSlider();

		window.addEventListener( 'resize', () => {
			this.setItemWidths();
			this.updateSlider();
		} );

		if ( this.options.prevBtn ) {
			this.options.prevBtn.addEventListener( 'click', () => this.prev() );
		}

		if ( this.options.nextBtn ) {
			this.options.nextBtn.addEventListener( 'click', () => this.next() );
		}

		this.initTouchEvents();
	}

	public getVisibleCols(): number {
		if ( window.innerWidth <= 480 ) return 1;
		if ( window.innerWidth <= 768 ) return 2;
		return Math.min( this.options.columns, this.totalItems );
	}

	private setItemWidths() {
		const visibleCols = this.getVisibleCols();
		const containerWidth = this.options.track.parentElement!.offsetWidth;
		const itemWidth =
			( containerWidth - this.gap * ( visibleCols - 1 ) ) / visibleCols;

		this.options.items.forEach( ( item ) => {
			item.style.width = itemWidth + 'px';
		} );
	}

	private updateSlider( animate: boolean = true ) {
		const visibleCols = this.getVisibleCols();
		const containerWidth = this.options.track.parentElement!.offsetWidth;
		const itemWidth =
			( containerWidth - this.gap * ( visibleCols - 1 ) ) / visibleCols;

		const maxIndex = Math.max( 1, this.totalItems - visibleCols );
		if ( this.currentIndex > maxIndex ) this.currentIndex = maxIndex;
		if ( this.currentIndex < 0 ) this.currentIndex = 0;

		const offset = this.currentIndex * ( itemWidth + this.gap );

		if ( animate ) {
			this.options.track.style.transition =
				'transform 0.5s cubic-bezier(0.25, 0.46, 0.45, 0.94)';
		} else {
			this.options.track.style.transition = 'none';
		}

		this.options.track.style.transform = `translateX(-${ offset }px)`;

		const totalPositions = maxIndex + 1;
		if ( this.options.currentEl ) {
			this.options.currentEl.textContent = String( this.currentIndex + 1 );
		}
		if ( this.options.totalEl ) {
			this.options.totalEl.textContent = String( totalPositions );
		}

		// Update button states
		if ( this.options.prevBtn ) {
			( this.options.prevBtn as HTMLButtonElement ).disabled =
				this.currentIndex === 0;
			this.options.prevBtn.style.opacity =
				this.currentIndex === 0 ? '0.2' : '1';
		}
		if ( this.options.nextBtn ) {
			( this.options.nextBtn as HTMLButtonElement ).disabled =
				this.currentIndex >= maxIndex;
			this.options.nextBtn.style.opacity =
				this.currentIndex >= maxIndex ? '0.2' : '1';
		}
	}

	public next() {
		const visibleCols = this.getVisibleCols();
		const maxIndex = Math.max( 0, this.totalItems - visibleCols );
		if ( this.currentIndex < maxIndex ) {
			this.currentIndex++;
			this.updateSlider();
		}
	}

	public prev() {
		if ( this.currentIndex > 0 ) {
			this.currentIndex--;
			this.updateSlider();
		}
	}

	private initTouchEvents() {
		const track = this.options.track;

		track.addEventListener( 'touchstart', ( e ) => {
			this.startX = e.touches[ 0 ].clientX;
			this.isDragging = true;
			this.startOffset = this.getTranslateX();
			track.style.transition = 'none';
		}, { passive: true } );

		track.addEventListener( 'touchmove', ( e ) => {
			if ( ! this.isDragging ) return;
			this.currentX = e.touches[ 0 ].clientX;
			const diff = this.currentX - this.startX;
			track.style.transform = `translateX(${ this.startOffset + diff }px)`;
		}, { passive: true } );

		track.addEventListener( 'touchend', ( e ) => {
			if ( ! this.isDragging ) return;
			this.isDragging = false;
			const diff = this.currentX - this.startX;
			const threshold = 50; // pixels

			if ( Math.abs( diff ) > threshold ) {
				if ( diff > 0 ) {
					this.prev();
				} else {
					this.next();
				}
			} else {
				this.updateSlider();
			}
		} );
	}

	private getTranslateX(): number {
		const style = window.getComputedStyle( this.options.track );
		const transform = style.transform || style.webkitTransform;
		if ( ! transform || transform === 'none' ) return 0;

		try {
			const matrix = ( window as any ).WebKitCSSMatrix
				? new ( window as any ).WebKitCSSMatrix( transform )
				: new DOMMatrix( transform );
			return matrix.m41;
		} catch ( e ) {
			return 0;
		}
	}
}
