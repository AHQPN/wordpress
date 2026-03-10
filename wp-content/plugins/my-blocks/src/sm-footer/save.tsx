import { useBlockProps, RichText } from '@wordpress/block-editor';
import FooterColumn from './components/FooterColumn';

export default function save( { attributes }: any ) {
	const {
		newsletterTitle,
		newsletterSubtitle,
		aboutTitle,
		aboutContent,
		categoriesTitle,
		categoriesContent,
		helpTitle,
		helpContent,
		storeCount,
		storeBtnText,
		storeBtnUrl,
		bgColor,
		textColor,
	} = attributes;

	const blockProps = useBlockProps.save( {
		className: 'sm-footer',
		style: { backgroundColor: bgColor, color: textColor } as React.CSSProperties,
	} );

	return (
		<footer { ...blockProps }>
			<div className="sm-footer-inner sm-grid-wrap">
				{/* Column 1: Newsletter & Social */}
				<div className="sm-footer-column sm-footer-col-main">
					<RichText.Content tagName="h4" className="sm-footer-newsletter-title" value={ newsletterTitle } />
					<RichText.Content tagName="p" className="sm-footer-newsletter-subtitle" value={ newsletterSubtitle } />
					
					{/* Real form for frontend (can be hooked to a real action later) */}
					<form className="sm-footer-newsletter-form" action="#" method="POST">
						<input type="email" placeholder="Email" required />
						<button type="submit">Register</button>
					</form>

					{/* Static Social Icons */}
					<div className="sm-footer-social-icons">
						<a href="#">📷</a>
						<a href="#">📘</a>
						<a href="#">🐦</a>
						<a href="#">📌</a>
						<a href="#">📱</a>
						<a href="#">▶️</a>
					</div>

					<div className="sm-footer-store-info">
						<RichText.Content tagName="p" className="sm-footer-store-count" value={ storeCount } />
						<div className="sm-footer-store-btn-wrap">
							<a className="sm-footer-store-btn" href={ storeBtnUrl || '#' }>
								<RichText.Content tagName="span" value={ storeBtnText } />
							</a>
						</div>
					</div>
				</div>

				{/* Column 2: About */}
				<FooterColumn isEdit={ false } title={ aboutTitle } links={ aboutContent } titleClassName="sm-footer-col-title" listClassName="sm-footer-about sm-footer-list" />

				{/* Column 3: Categories */}
				<FooterColumn isEdit={ false } title={ categoriesTitle } links={ categoriesContent } titleClassName="sm-footer-col-title" listClassName="sm-footer-categories sm-footer-list" />

				{/* Column 4: Help */}
				<FooterColumn isEdit={ false } title={ helpTitle } links={ helpContent } titleClassName="sm-footer-col-title" listClassName="sm-footer-help sm-footer-list" />
			</div>

			<div className="sm-footer-bottom">
				<div className="sm-footer-bottom-inner">
					<div className="sm-footer-payments">
						<span className="sm-payment-icon">VISA</span>
						<span className="sm-payment-icon">Mastercard</span>
						<span className="sm-payment-icon">Virtual Account</span>
						<span className="sm-payment-icon">Kredivo</span>
					</div>
					<p className="sm-footer-secure">🛡️ 100% secure payment</p>
				</div>
			</div>
		</footer>
	);
}
