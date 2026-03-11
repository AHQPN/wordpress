import { SMSlider } from '../common/slider';

document.addEventListener( 'DOMContentLoaded', () => {
	const blocks = document.querySelectorAll( '.sm-collection-list' );

	blocks.forEach( ( block ) => {
		const track = block.querySelector( '.sm-cl-track' ) as HTMLElement;
		const allItems = block.querySelectorAll( '.sm-cl-item' ) as NodeListOf<HTMLElement>;
		const prevBtn = block.querySelector( '.sm-cl-prev' ) as HTMLElement;
		const nextBtn = block.querySelector( '.sm-cl-next' ) as HTMLElement;
		const currentEl = block.querySelector( '.sm-cl-current' ) as HTMLElement;
		const totalEl = block.querySelector( '.sm-cl-total' ) as HTMLElement;
		const columns = parseInt( ( block as HTMLElement ).dataset.columns || '4', 10 );

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
