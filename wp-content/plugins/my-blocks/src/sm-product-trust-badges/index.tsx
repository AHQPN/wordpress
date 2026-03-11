import { registerBlockType } from '@wordpress/blocks';
import { useBlockProps } from '@wordpress/block-editor';
import metadata from './block.json';
import './style.scss';

registerBlockType( metadata as any, {
	edit: () => {
		const blockProps = useBlockProps();
		return (
			<div { ...blockProps }>
				<div className="sm-trust-badges-editor-preview">
					<span>Trust Badges Section</span>
				</div>
			</div>
		);
	},
	save: () => null,
} );
