import { __ } from '@wordpress/i18n';
import { useBlockProps, RichText, MediaUpload, MediaUploadCheck, InspectorControls } from '@wordpress/block-editor';
import { PanelBody, Button, ColorPicker } from '@wordpress/components';
import './editor.scss';

export default function Edit( { attributes, setAttributes } ) {
	const { logoUrl, siteName, menuItems, backgroundColor } = attributes;

	const blockProps = useBlockProps( {
		className: 'sm-header',
		style: { backgroundColor },
	} );

	return (
		<>
			<InspectorControls>
				<PanelBody title={ __( 'Cài đặt Header', 'my-blocks' ) }>
					<MediaUploadCheck>
						<MediaUpload
							onSelect={ ( media ) => setAttributes( { logoUrl: media.url } ) }
							allowedTypes={ [ 'image' ] }
							render={ ( { open } ) => (
								<Button onClick={ open } variant="secondary" style={ { marginBottom: '16px' } }>
									{ logoUrl ? __( 'Đổi Logo', 'my-blocks' ) : __( 'Chọn Logo', 'my-blocks' ) }
								</Button>
							) }
						/>
					</MediaUploadCheck>
					<p>{ __( 'Màu nền', 'my-blocks' ) }</p>
					<ColorPicker
						color={ backgroundColor }
						onChangeComplete={ ( val ) => setAttributes( { backgroundColor: val.hex } ) }
					/>
				</PanelBody>
			</InspectorControls>

			<header { ...blockProps }>
				<div className="sm-header-inner">
					<div className="sm-header-logo">
						{ logoUrl ? (
							<img src={ logoUrl } alt={ siteName } />
						) : (
							<RichText
								tagName="span"
								className="sm-header-site-name"
								value={ siteName }
								onChange={ ( val ) => setAttributes( { siteName: val } ) }
								placeholder={ __( 'Tên trang web...', 'my-blocks' ) }
							/>
						) }
					</div>
					<nav className="sm-header-nav">
						<RichText
							tagName="span"
							value={ menuItems }
							onChange={ ( val ) => setAttributes( { menuItems: val } ) }
							placeholder={ __( 'Home | Shop | About', 'my-blocks' ) }
						/>
					</nav>
				</div>
			</header>
		</>
	);
}
