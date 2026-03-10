import { __ } from '@wordpress/i18n';
import { useBlockProps, RichText, MediaUpload, MediaUploadCheck, InspectorControls } from '@wordpress/block-editor';
import { PanelBody, Button } from '@wordpress/components';
import './editor.scss';

interface Attrs {
	heading: string;
	quote: string;
	authorName: string;
	authorRole: string;
	avatarUrl: string;
}

export default function Edit( { attributes, setAttributes }: { attributes: Attrs; setAttributes: ( a: Partial<Attrs> ) => void } ) {
	const { heading, quote, authorName, authorRole, avatarUrl } = attributes;
	const blockProps = useBlockProps( { className: 'sm-testimonial' } );

	return (
		<>
			<InspectorControls>
				<PanelBody title={ __( 'Cài đặt Testimonial', 'my-blocks' ) }>
					<MediaUploadCheck>
						<MediaUpload
							onSelect={ ( media: { url: string } ) => setAttributes( { avatarUrl: media.url } ) }
							allowedTypes={ [ 'image' ] }
							render={ ( { open }: { open: () => void } ) => (
								<Button onClick={ open } variant="secondary">
									{ avatarUrl ? __( 'Đổi avatar', 'my-blocks' ) : __( 'Chọn avatar', 'my-blocks' ) }
								</Button>
							) }
						/>
					</MediaUploadCheck>
				</PanelBody>
			</InspectorControls>

			<section { ...blockProps }>
				<RichText tagName="h2" className="sm-testimonial-heading" value={ heading } onChange={ ( val: string ) => setAttributes( { heading: val } ) } placeholder={ __( 'Tiêu đề...', 'my-blocks' ) } />
				<div className="sm-testimonial-card">
					<RichText tagName="blockquote" className="sm-testimonial-quote" value={ quote } onChange={ ( val: string ) => setAttributes( { quote: val } ) } placeholder={ __( 'Nhận xét của khách hàng...', 'my-blocks' ) } />
					<div className="sm-testimonial-author">
						{ avatarUrl && <img src={ avatarUrl } alt={ authorName } className="sm-testimonial-avatar" /> }
						<div>
							<RichText tagName="strong" value={ authorName } onChange={ ( val: string ) => setAttributes( { authorName: val } ) } placeholder={ __( 'Tên khách hàng', 'my-blocks' ) } />
							<RichText tagName="span" className="sm-testimonial-role" value={ authorRole } onChange={ ( val: string ) => setAttributes( { authorRole: val } ) } placeholder={ __( 'Vai trò', 'my-blocks' ) } />
						</div>
					</div>
				</div>
			</section>
		</>
	);
}
