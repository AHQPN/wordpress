import { useBlockProps, RichText } from '@wordpress/block-editor';

interface SplitItem {
	imageUrl: string;
	title: string;
	description: string;
	buttonText: string;
	buttonUrl: string;
	layout: 'image-text' | 'text-image';
	overlayPosition: string;
}

export default function save( { attributes }: any ) {
	const { displayMode, items, bgColor, textColor, sectionTitle } = attributes;
	const blockProps = useBlockProps.save( {
		className: `sm-collection-split sm-cs-mode-${ displayMode }`,
		style: { backgroundColor: bgColor, color: textColor }
	} );

	return (
		<section { ...blockProps }>
			<div className="sm-cs-inner">
				{ displayMode === 'grid' && sectionTitle && (
					<div className="sm-cs-header sm-cl-header">
						<RichText.Content
							tagName="h2"
							className="sm-cs-section-title sm-cl-title"
							value={ sectionTitle }
						/>
					</div>
				) }
				<div className="sm-cs-items">
					{ items.map( ( item: SplitItem, i: number ) => (
						<div key={ i } className={ `sm-cs-item sm-cs-layout-${ displayMode === 'split' ? item.layout : item.overlayPosition }` }>
							<div className="sm-cs-media">
								{ item.imageUrl && (
									<img src={ item.imageUrl } alt="" loading="lazy" />
								) }
							</div>
							
							<div className="sm-cs-content">
								<div className="sm-cs-content-inner">
									<RichText.Content
										tagName="h2"
										className="sm-cs-title"
										value={ item.title }
									/>
									<RichText.Content
										tagName="p"
										className="sm-cs-description"
										value={ item.description }
									/>
									<a href={ item.buttonUrl } className="sm-cs-button">
										<RichText.Content value={ item.buttonText } />
									</a>
								</div>
							</div>
						</div>
					) ) }
				</div>
			</div>
		</section>
	);
}
