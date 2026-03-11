import { useBlockProps } from '@wordpress/block-editor';

export default function Edit() {
	const blockProps = useBlockProps();

	return (
		<div { ...blockProps }>
			<div className="sm-product-reviews-editor-preview">
				<h3>Customer Reviews (Modern Layout)</h3>
				<p>Review summary, star distribution, and modern review list will appear here on the frontend.</p>
				<div className="preview-placeholder">
                    <div className="placeholder-stars">★★★★★ 4.5</div>
                    <div className="placeholder-btn">Write a Review</div>
                </div>
			</div>
		</div>
	);
}
