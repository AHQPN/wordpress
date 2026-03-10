import { RichText } from '@wordpress/block-editor';

interface FooterLink {
	label: string;
	url: string;
}

interface FooterColumnProps {
	title: string;
	links: FooterLink[];
	titleClassName: string;
	listClassName: string;
	onTitleChange?: ( val: string ) => void;
	isEdit?: boolean;
}

export default function FooterColumn( {
	title,
	links,
	titleClassName,
	listClassName,
	onTitleChange,
	isEdit = false,
}: FooterColumnProps ) {
	return (
		<div className="sm-footer-column">
			{ isEdit ? (
				<RichText
					tagName="h6"
					className={ titleClassName }
					value={ title }
					onChange={ onTitleChange || ( () => {} ) }
					placeholder="Column Title"
				/>
			) : (
				<RichText.Content tagName="h6" className={ titleClassName } value={ title } />
			) }
			
			<div className={ listClassName }>
				{ links && links.map( ( link, i ) => (
					<p key={ i }>
						<a href={ link.url || '#' } onClick={ ( e ) => isEdit && e.preventDefault() }>
							{ link.label || 'Link' }
						</a>
					</p>
				) ) }
			</div>
		</div>
	);
}
