import { SMSlider } from '../common/slider';

document.addEventListener( 'DOMContentLoaded', () => {
	const blocks = document.querySelectorAll( '.sm-featured-product' );

	blocks.forEach( ( block ) => {
		const track = block.querySelector( '.sm-fp-track' ) as HTMLElement;
		const allItems = block.querySelectorAll( '.sm-fp-item' ) as NodeListOf<HTMLElement>;
		const prevBtn = block.querySelector( '.sm-fp-prev' ) as HTMLElement;
		const nextBtn = block.querySelector( '.sm-fp-next' ) as HTMLElement;
		const currentEl = block.querySelector( '.sm-fp-current' ) as HTMLElement;
		const totalEl = block.querySelector( '.sm-fp-total' ) as HTMLElement;
		const columns = parseInt( ( block as HTMLElement ).dataset.columns || '3', 10 );

		if ( ! track || allItems.length === 0 ) return;

		new SMSlider( {
			container: block as HTMLElement,
			track,
			items: allItems,
			prevBtn,
			nextBtn,
			currentEl,
			totalEl,
			columns,
			gap: 20,
		} );
	} );
} );
