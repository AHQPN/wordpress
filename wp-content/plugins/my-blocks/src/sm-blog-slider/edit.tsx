import { __ } from '@wordpress/i18n';
import { 
	useBlockProps, 
	InspectorControls, 
	RichText, 
	MediaUpload, 
	MediaUploadCheck 
} from '@wordpress/block-editor';
import { 
	PanelBody, 
	TextControl, 
	TextareaControl, 
	Button, 
	ColorPalette, 
	SelectControl,
	Spinner
} from '@wordpress/components';
import { useState, useEffect } from '@wordpress/element';
import apiFetch from '@wordpress/api-fetch';
import './editor.scss';

export default function Edit( { attributes, setAttributes }: any ) {
	const { sectionTitle, sectionIconLogo, slides, bgColor, textColor } = attributes;
	const [ activeSlideIndex, setActiveSlideIndex ] = useState( 0 );
	const [ categories, setCategories ] = useState<any[]>( [] );
	const [ selectedCategory, setSelectedCategory ] = useState( '' );
	const [ isImporting, setIsImporting ] = useState( false );

	const blockProps = useBlockProps( {
		className: 'sm-blog-slider-editor',
		style: { '--bg-color': bgColor, '--text-color': textColor }
	} );

	useEffect( () => {
		apiFetch( { path: '/wp/v2/categories?per_page=100' } ).then( ( res: any ) => {
			setCategories( res );
		} );
	}, [] );

	const updateSlide = ( index: number, data: any ) => {
		const newSlides = [ ...slides ];
		newSlides[ index ] = { ...newSlides[ index ], ...data };
		setAttributes( { slides: newSlides } );
	};

	const addSlide = () => {
		const newSlides = [ ...slides, {
			id: Date.now(),
			imageUrl: '',
			title: 'New Slide',
			description: 'Add description here',
			btnText: 'Read More',
			btnUrl: '#'
		} ];
		setAttributes( { slides: newSlides } );
		setActiveSlideIndex( newSlides.length - 1 );
	};

	const removeSlide = ( index: number ) => {
		const newSlides = slides.filter( ( _: any, i: number ) => i !== index );
		setAttributes( { slides: newSlides } );
		if ( activeSlideIndex >= newSlides.length ) {
			setActiveSlideIndex( Math.max( 0, newSlides.length - 1 ) );
		}
	};

	const handleImport = () => {
		if ( ! selectedCategory ) return;
		setIsImporting( true );
		apiFetch( { path: `/wp/v2/posts?categories=${ selectedCategory }&per_page=8&_embed` } )
			.then( ( posts: any ) => {
				const importedSlides = posts.map( ( post: any ) => ( {
					id: post.id,
					imageUrl: post._embedded?.[ 'wp:featuredmedia' ]?.[ 0 ]?.source_url || '',
					title: post.title.rendered,
					description: post.excerpt.rendered.replace( /<[^>]*>?/gm, '' ).substring( 0, 150 ) + '...',
					btnText: 'See more',
					btnUrl: post.link
				} ) );
				if ( importedSlides.length > 0 ) {
					setAttributes( { slides: importedSlides } );
					setActiveSlideIndex( 0 );
				} else {
					alert( 'No posts found in this category' );
				}
			} )
			.finally( () => setIsImporting( false ) );
	};

	const currentSlide = slides[ activeSlideIndex ] || {};

	return (
		<>
			<InspectorControls>
				<PanelBody title={ __( 'Section Info', 'my-blocks' ) }>
					<TextControl
						label={ __( 'Section Title', 'my-blocks' ) }
						value={ sectionTitle }
						onChange={ ( v ) => setAttributes( { sectionTitle: v } ) }
					/>
					<MediaUploadCheck>
						<MediaUpload
							onSelect={ ( m: any ) => setAttributes( { sectionIconLogo: m.url } ) }
							allowedTypes={ [ 'image' ] }
							render={ ( { open }: any ) => (
								<Button onClick={ open } variant="secondary">
									{ sectionIconLogo ? 'Change Icon' : 'Select Icon' }
								</Button>
							) }
						/>
					</MediaUploadCheck>
				</PanelBody>

				<PanelBody title={ __( 'Auto Import', 'my-blocks' ) }>
					<SelectControl
						label={ __( 'Import from Category', 'my-blocks' ) }
						value={ selectedCategory }
						options={ [
							{ label: 'Select Category', value: '' },
							...categories.map( c => ( { label: c.name, value: c.id } ) )
						] }
						onChange={ ( v ) => setSelectedCategory( v ) }
					/>
					<Button 
						variant="primary" 
						onClick={ handleImport } 
						disabled={ ! selectedCategory || isImporting }
						isBusy={ isImporting }
					>
						{ isImporting ? 'Importing...' : 'Import Posts' }
					</Button>
				</PanelBody>

				<PanelBody title={ __( 'Slides Management', 'my-blocks' ) }>
					{ slides.map( ( s: any, i: number ) => (
						<div key={ i } style={ { display: 'flex', gap: '5px', marginBottom: '5px' } }>
							<Button 
								variant={ activeSlideIndex === i ? 'primary' : 'secondary' }
								onClick={ () => setActiveSlideIndex( i ) }
								style={ { flex: 1 } }
							>
								Slide { i + 1 }
							</Button>
							<Button isDestructive onClick={ () => removeSlide( i ) }>✕</Button>
						</div>
					) ) }
					<Button variant="secondary" onClick={ addSlide } style={ { width: '100%', marginTop: '10px' } }>
						+ Add Slide
					</Button>
				</PanelBody>

				<PanelBody title={ __( 'Colors', 'my-blocks' ) } initialOpen={ false }>
					<p>{ __( 'Background Color', 'my-blocks' ) }</p>
					<ColorPalette value={ bgColor } onChange={ ( v ) => setAttributes( { bgColor: v || '#596c3d' } ) } />
					<p>{ __( 'Text Color', 'my-blocks' ) }</p>
					<ColorPalette value={ textColor } onChange={ ( v ) => setAttributes( { textColor: v || '#ffffff' } ) } />
				</PanelBody>
			</InspectorControls>

			<div { ...blockProps }>
				<div className="sm-blog-slider-inner">
					<div className="sm-blog-slider-header">
						<div className="sm-blog-slider-header-left">
							<RichText
								tagName="h2"
								value={ sectionTitle }
								onChange={ ( v: string ) => setAttributes( { sectionTitle: v } ) }
								placeholder="Section Title"
							/>
							{ sectionIconLogo && <img src={ sectionIconLogo } alt="" className="sm-section-icon" /> }
						</div>
						<div className="sm-blog-slider-nav">
							<span className="sm-nav-counter">{ activeSlideIndex + 1 } / { slides.length }</span>
							<div className="sm-nav-btns">
								<button onClick={ () => setActiveSlideIndex( ( activeSlideIndex - 1 + slides.length ) % slides.length ) }>❮</button>
								<button onClick={ () => setActiveSlideIndex( ( activeSlideIndex + 1 ) % slides.length ) }>❯</button>
							</div>
						</div>
					</div>

					<div className="sm-blog-slide-active">
						<div className="sm-blog-slide-image">
							<MediaUploadCheck>
								<MediaUpload
									onSelect={ ( m: any ) => updateSlide( activeSlideIndex, { imageUrl: m.url } ) }
									allowedTypes={ [ 'image' ] }
									render={ ( { open }: any ) => (
										<div className="sm-image-placeholder" onClick={ open } style={ { backgroundImage: `url(${ currentSlide.imageUrl })` } }>
											{ ! currentSlide.imageUrl && 'Select Image' }
										</div>
									) }
								/>
							</MediaUploadCheck>
						</div>
						<div className="sm-blog-slide-content" style={ { backgroundColor: bgColor, color: textColor } }>
							<RichText
								tagName="h3"
								value={ currentSlide.title }
								onChange={ ( v: string ) => updateSlide( activeSlideIndex, { title: v } ) }
								placeholder="Slide Title"
							/>
							<RichText
								tagName="p"
								value={ currentSlide.description }
								onChange={ ( v: string ) => updateSlide( activeSlideIndex, { description: v } ) }
								placeholder="Slide Description"
							/>
							<div className="sm-slide-btn-wrap">
								<RichText
									tagName="span"
									className="sm-slide-btn"
									value={ currentSlide.btnText }
									onChange={ ( v: string ) => updateSlide( activeSlideIndex, { btnText: v } ) }
									placeholder="Button Text"
								/>
							</div>
						</div>
					</div>
				</div>
			</div>
		</>
	);
}
