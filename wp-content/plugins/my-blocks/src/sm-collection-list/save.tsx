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
			<div className="sm-cl-inner">
				<div className="sm-cl-header">
					<RichText.Content
						tagName="h2"
						className="sm-cl-title"
						value={ sectionTitle }
					/>
					<div className="sm-cl-nav">
						<span className="sm-cl-counter">
							<span className="sm-cl-current">1</span> /{ ' ' }
							<span className="sm-cl-total">{ items.length }</span>
						</span>
						<div className="sm-cl-nav-btns">
							<button className="sm-cl-prev">❮</button>
							<button className="sm-cl-next">❯</button>
						</div>
					</div>
				</div>

				<div className="sm-cl-track-wrap">
					<div className="sm-cl-track">
						{ items.map( ( item: CollectionItem, i: number ) => (
							<a
								className="sm-cl-item"
								href={ item.url || '#' }
								key={ i }
								data-index={ i }
							>
								<div className="sm-cl-img">
									{ item.imageUrl && (
										<img
											src={ item.imageUrl }
											alt={ item.label }
										/>
									) }
								</div>
								<span className="sm-cl-label">
									<RichText.Content value={ item.label } />
								</span>
							</a>
						) ) }
					</div>
				</div>
			</div>
		</section>
	);
}
