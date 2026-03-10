import { useBlockProps, RichText } from '@wordpress/block-editor';

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

interface SaveProps {
	attributes: HeroAttributes;
}

export default function save( { attributes }: SaveProps ) {
	const { title, subtitle, buttonText, buttonUrl, backgroundImage, backgroundVideo, backgroundType, overlayColor } = attributes;

	const bgStyle = backgroundType === 'image' && backgroundImage
		? { backgroundImage: `url(${ backgroundImage })` }
		: backgroundType === 'image' && !backgroundImage
		? { backgroundImage: 'linear-gradient(135deg, #667eea 0%, #764ba2 100%)' }
		: {};

	const blockProps = useBlockProps.save( {
		className: `sm-hero-section sm-hero-section--${backgroundType}`,
		style: {
			...bgStyle,
			backgroundSize: 'cover',
			backgroundPosition: 'center',
		},
	} );

	return (
		<div { ...blockProps }>
			{ backgroundType === 'video' && backgroundVideo && (
				<video autoPlay muted loop playsInline className="sm-hero-video-bg">
					<source src={ backgroundVideo } type="video/mp4" />
				</video>
			) }
			<div className="sm-hero-overlay" style={ { backgroundColor: overlayColor } }>
				<div className="sm-hero-content">
					<RichText.Content tagName="h1" className="sm-hero-title" value={ title } />
					<RichText.Content tagName="p" className="sm-hero-subtitle" value={ subtitle } />
					{ buttonText && (
						<a href={ buttonUrl || '#' } className="sm-hero-button">
							<RichText.Content tagName="span" value={ buttonText } />
						</a>
					) }
				</div>
			</div>
		</div>
	);
}
