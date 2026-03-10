import { useBlockProps, RichText } from '@wordpress/block-editor';

export default function save( { attributes }: any ) {
	const { sectionTitle, sectionIconLogo, slides, bgColor, textColor } = attributes;

	const blockProps = useBlockProps.save( {
		className: 'sm-blog-slider',
		style: { '--bg-color': bgColor, '--text-color': textColor }
	} );

	return (
		<div { ...blockProps }>
			<div className="sm-blog-slider-inner">
				<div className="sm-blog-slider-header">
					<div className="sm-blog-slider-header-left">
						<RichText.Content tagName="h2" value={ sectionTitle } />
						{ sectionIconLogo && <img src={ sectionIconLogo } alt="" className="sm-section-icon" /> }
					</div>
					<div className="sm-blog-slider-nav">
						<span className="sm-nav-counter">
							<span className="current">1</span> / <span className="total">{ slides.length }</span>
						</span>
						<div className="sm-nav-btns">
							<button className="sm-nav-prev">❮</button>
							<button className="sm-nav-next">❯</button>
						</div>
					</div>
				</div>

				<div className="sm-blog-slider-track-wrap">
					<div className="sm-blog-slider-track">
						{ slides.map( ( slide: any, i: number ) => (
							<div 
								key={ i } 
								className={ `sm-blog-slide ${ i === 0 ? 'active' : '' }` }
								data-index={ i }
							>
								<div className="sm-blog-slide-image">
									{ slide.imageUrl && <img src={ slide.imageUrl } alt={ slide.title } /> }
								</div>
								<div className="sm-blog-slide-content">
									<RichText.Content tagName="h3" value={ slide.title } />
									<RichText.Content tagName="p" value={ slide.description } />
									{ slide.btnText && (
										<div className="sm-slide-btn-wrap">
											<a href={ slide.btnUrl || '#' } className="sm-slide-btn">
												<RichText.Content value={ slide.btnText } />
											</a>
										</div>
									) }
								</div>
							</div>
						) ) }
					</div>
				</div>
			</div>
		</div>
	);
}
