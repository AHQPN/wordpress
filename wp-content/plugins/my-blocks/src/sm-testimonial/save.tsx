import { useBlockProps, RichText } from '@wordpress/block-editor';

interface Attrs { heading: string; quote: string; authorName: string; authorRole: string; avatarUrl: string; }

export default function save( { attributes }: { attributes: Attrs } ) {
	const { heading, quote, authorName, authorRole, avatarUrl } = attributes;
	const blockProps = useBlockProps.save( { className: 'sm-testimonial' } );

	return (
		<section { ...blockProps }>
			<RichText.Content tagName="h2" className="sm-testimonial-heading" value={ heading } />
			<div className="sm-testimonial-card">
				<RichText.Content tagName="blockquote" className="sm-testimonial-quote" value={ quote } />
				<div className="sm-testimonial-author">
					{ avatarUrl && <img src={ avatarUrl } alt={ authorName } className="sm-testimonial-avatar" /> }
					<div>
						<RichText.Content tagName="strong" value={ authorName } />
						<RichText.Content tagName="span" className="sm-testimonial-role" value={ authorRole } />
					</div>
				</div>
			</div>
		</section>
	);
}
