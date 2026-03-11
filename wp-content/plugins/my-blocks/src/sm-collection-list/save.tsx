import { useBlockProps, RichText } from '@wordpress/block-editor';

interface CollectionItem {
	id: number;
	label: string;
	url: string;
	imageUrl: string;
	description: string;
}

export default function save( { attributes }: any ) {
	const { sectionTitle, columns, items } = attributes;
	const blockProps = useBlockProps.save( { className: 'sm-collection-list' } );

	return (
		<section { ...blockProps } data-columns={ columns }>
			<div className="sm-cl-inner sm-slider-container">
				<div className="sm-cl-header sm-slider-nav">
					<RichText.Content
						tagName="h2"
						className="sm-cl-title"
						value={ sectionTitle }
					/>
					<div className="sm-slider-nav-btns-wrap" style={{ display: 'flex', alignItems: 'center', gap: '15px' }}>
						<span className="sm-slider-counter">
							<span className="sm-cl-current">1</span> /{ ' ' }
							<span className="sm-cl-total">{ items.length }</span>
						</span>
						<div className="sm-slider-nav-btns">
							<button className="sm-cl-prev">❮</button>
							<button className="sm-cl-next">❯</button>
						</div>
					</div>
				</div>

				<div className="sm-slider-track-wrap">
					<div className="sm-cl-track sm-slider-track">
						{ items.map( ( item: CollectionItem, i: number ) => (
							<a
								className="sm-cl-item sm-item-card"
								href={ item.url || '#' }
								key={ i }
								data-index={ i }
							>
								<div className="sm-item-img">
									{ item.imageUrl && (
										<img
											src={ item.imageUrl }
											alt={ item.label }
										/>
									) }
								</div>
								<div className="sm-item-content">
									<span className="sm-item-label">
										<RichText.Content value={ item.label } />
									</span>
								</div>
							</a>
						) ) }
					</div>
				</div>
			</div>
		</section>
	);
}
