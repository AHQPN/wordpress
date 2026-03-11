import { registerBlockType } from '@wordpress/blocks';
import { useBlockProps } from '@wordpress/block-editor';
import metadata from './block.json';

registerBlockType( metadata as any, {
	edit: () => {
		const blockProps = useBlockProps();
		return (
			<div { ...blockProps }>
				<p style={{ fontStyle: 'italic', color: '#666' }}>Product short description will appear here...</p>
			</div>
		);
	},
	save: () => null,
} );
