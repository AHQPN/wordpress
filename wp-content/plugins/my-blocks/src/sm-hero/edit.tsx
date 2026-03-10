import { __ } from '@wordpress/i18n';
import {
	useBlockProps,
	RichText,
	MediaUpload,
	MediaUploadCheck,
	InspectorControls,
} from '@wordpress/block-editor';
import { PanelBody, Button, TextControl, RadioControl } from '@wordpress/components';
import './editor.scss';

interface HeroAttributes {
	title: string;
	subtitle: string;
	buttonText: string;
	buttonUrl: string;
	backgroundImage: string;
	backgroundVideo: string;
	backgroundType: string;
	overlayColor: string;
}

interface EditProps {
	attributes: HeroAttributes;
	setAttributes: ( attrs: Partial<HeroAttributes> ) => void;
}

export default function Edit( { attributes, setAttributes }: EditProps ) {
	const { title, subtitle, buttonText, buttonUrl, backgroundImage, backgroundVideo, backgroundType, overlayColor } = attributes;

	const hasBackground = backgroundType === 'image' ? !!backgroundImage : !!backgroundVideo;
	const bgStyle = backgroundType === 'image' && backgroundImage
		? { backgroundImage: `url(${ backgroundImage })` }
		: backgroundType === 'image' && !backgroundImage
		? { backgroundImage: 'linear-gradient(135deg, #667eea 0%, #764ba2 100%)' }
		: {};

	const blockProps = useBlockProps( {
		className: `sm-hero-section sm-hero-section--${backgroundType}`,
		style: {
			...bgStyle,
			backgroundSize: 'cover',
			backgroundPosition: 'center',
		},
	} );

	const onSelectImage = ( media: { url: string } ) => {
		setAttributes( { backgroundImage: media.url } );
	};

	const onSelectVideo = ( media: { url: string } ) => {
		setAttributes( { backgroundVideo: media.url } );
	};

	return (
		<>
			<InspectorControls>
				<PanelBody title={ __( 'Cài đặt Hero', 'my-blocks' ) }>
					<RadioControl
						label={ __( 'Loại nền', 'my-blocks' ) }
						selected={ backgroundType }
						options={ [
							{ label: 'Hình ảnh', value: 'image' },
							{ label: 'Video', value: 'video' },
						] }
						onChange={ ( val ) => setAttributes( { backgroundType: val } ) }
					/>

					{ backgroundType === 'image' && (
						<MediaUploadCheck>
							<MediaUpload
								onSelect={ onSelectImage }
								allowedTypes={ [ 'image' ] }
								render={ ( { open }: { open: () => void } ) => (
									<div style={ { marginBottom: '16px' } }>
										{ backgroundImage && (
											<img src={ backgroundImage } alt="" style={ { width: '100%', marginBottom: '8px', borderRadius: '4px' } } />
										) }
										<Button onClick={ open } variant="secondary">
											{ backgroundImage ? __( 'Đổi hình ảnh', 'my-blocks' ) : __( 'Chọn hình ảnh', 'my-blocks' ) }
										</Button>
										{ backgroundImage && (
											<Button onClick={ () => setAttributes({ backgroundImage: '' }) } isDestructive style={ { marginLeft: '8px' } } >
												{ __( 'Xoá', 'my-blocks' ) }
											</Button>
										) }
									</div>
								) }
							/>
						</MediaUploadCheck>
					) }

					{ backgroundType === 'video' && (
						<MediaUploadCheck>
							<MediaUpload
								onSelect={ onSelectVideo }
								allowedTypes={ [ 'video' ] }
								render={ ( { open }: { open: () => void } ) => (
									<div style={ { marginBottom: '16px' } }>
										{ backgroundVideo && (
											<video src={ backgroundVideo } style={ { width: '100%', marginBottom: '8px', borderRadius: '4px' } } controls muted />
										) }
										<Button onClick={ open } variant="secondary">
											{ backgroundVideo ? __( 'Đổi video', 'my-blocks' ) : __( 'Chọn video', 'my-blocks' ) }
										</Button>
										{ backgroundVideo && (
											<Button onClick={ () => setAttributes({ backgroundVideo: '' }) } isDestructive style={ { marginLeft: '8px' } } >
												{ __( 'Xoá', 'my-blocks' ) }
											</Button>
										) }
									</div>
								) }
							/>
						</MediaUploadCheck>
					) }

					<TextControl
						label={ __( 'Link nút bấm', 'my-blocks' ) }
						value={ buttonUrl }
						onChange={ ( val: string ) => setAttributes( { buttonUrl: val } ) }
					/>
				</PanelBody>
			</InspectorControls>

			<div { ...blockProps }>
				{ backgroundType === 'video' && backgroundVideo && (
					<video autoPlay muted loop playsInline className="sm-hero-video-bg">
						<source src={ backgroundVideo } type="video/mp4" />
					</video>
				) }
				{ backgroundType === 'video' && !backgroundVideo && (
					<div className="sm-hero-video-placeholder" style={ { position: 'absolute', inset: 0, background: 'linear-gradient(135deg, #1e293b 0%, #0f172a 100%)' } }></div>
				) }
				<div className="sm-hero-overlay" style={ { backgroundColor: overlayColor } }>
					<div className="sm-hero-content">
						<RichText
							tagName="h1"
							className="sm-hero-title"
							value={ title }
							onChange={ ( val: string ) => setAttributes( { title: val } ) }
							placeholder={ __( 'Tiêu đề Hero...', 'my-blocks' ) }
						/>
						<RichText
							tagName="p"
							className="sm-hero-subtitle"
							value={ subtitle }
							onChange={ ( val: string ) => setAttributes( { subtitle: val } ) }
							placeholder={ __( 'Mô tả ngắn...', 'my-blocks' ) }
						/>
						<RichText
							tagName="span"
							className="sm-hero-button"
							value={ buttonText }
							onChange={ ( val: string ) => setAttributes( { buttonText: val } ) }
							placeholder={ __( 'Nút bấm...', 'my-blocks' ) }
						/>
					</div>
				</div>
			</div>
		</>
	);
}
