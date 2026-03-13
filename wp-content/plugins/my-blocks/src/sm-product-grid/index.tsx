import { registerBlockType } from '@wordpress/blocks';
import { useBlockProps, InspectorControls } from '@wordpress/block-editor';
import { PanelBody, RangeControl } from '@wordpress/components';
import './style.scss';
import metadata from './block.json';

registerBlockType(metadata.name, {
    edit: ({ attributes, setAttributes }) => {
        const { columns } = attributes;
        const blockProps = useBlockProps();

        return (
            <div {...blockProps}>
                <InspectorControls>
                    <PanelBody title="Grid Settings">
                        <RangeControl
                            label="Columns"
                            value={columns}
                            onChange={(val) => setAttributes({ columns: val })}
                            min={2}
                            max={6}
                        />
                    </PanelBody>
                </InspectorControls>
                <div className="sm-product-grid-editor-placeholder">
                    <h3>Product Grid Preview</h3>
                    <p>Current layout: {columns} columns</p>
                    <div className="placeholder-grid" style={{ 
                        display: 'grid', 
                        gridTemplateColumns: `repeat(${columns}, 1fr)`,
                        gap: '20px',
                        marginTop: '20px'
                    }}>
                        {[...Array(columns)].map((_, i) => (
                            <div key={i} style={{ background: '#eee', height: '200px' }}></div>
                        ))}
                    </div>
                </div>
            </div>
        );
    },
    save: () => null,
});
