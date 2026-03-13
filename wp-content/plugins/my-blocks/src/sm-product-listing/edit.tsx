import { useBlockProps, InspectorControls } from '@wordpress/block-editor';
import { PanelBody, RangeControl, ToggleControl, TextControl } from '@wordpress/components';

export default function Edit({ attributes, setAttributes }) {
    const { columns, showFilter, filterWidth, gridWidth } = attributes;

    return (
        <>
            <InspectorControls>
                <PanelBody title="Listing Settings">
                    <RangeControl
                        label="Grid Columns"
                        value={columns}
                        onChange={(val) => setAttributes({ columns: val })}
                        min={2}
                        max={6}
                    />
                    <ToggleControl
                        label="Show Filter Sidebar"
                        checked={showFilter}
                        onChange={(val) => setAttributes({ showFilter: val })}
                    />
                    {showFilter && (
                        <>
                            <TextControl
                                label="Filter Width (e.g. 25%)"
                                value={filterWidth}
                                onChange={(val) => setAttributes({ filterWidth: val })}
                            />
                            <TextControl
                                label="Grid Width (e.g. 75%)"
                                value={gridWidth}
                                onChange={(val) => setAttributes({ gridWidth: val })}
                            />
                        </>
                    )}
                </PanelBody>
            </InspectorControls>

            <div {...useBlockProps({ className: 'sm-product-listing-preview' })}>
                <div style={{ display: 'flex', gap: '20px', border: '2px dashed #ccc', padding: '20px' }}>
                    {showFilter && (
                        <div style={{ flexBasis: filterWidth, backgroundColor: '#f9f9f9', padding: '15px' }}>
                            <strong>Filter Sidebar</strong>
                            <div style={{ marginTop: '10px', height: '100px', border: '1px solid #ddd' }} />
                        </div>
                    )}
                    <div style={{ flexBasis: gridWidth, backgroundColor: '#fff', padding: '15px' }}>
                        <strong>Product Grid ({columns} Columns)</strong>
                        <div style={{ 
                            marginTop: '10px', 
                            display: 'grid', 
                            gridTemplateColumns: `repeat(${columns}, 1fr)`, 
                            gap: '10px' 
                        }}>
                            {[...Array(columns)].map((_, i) => (
                                <div key={i} style={{ height: '150px', backgroundColor: '#eee' }} />
                            ))}
                        </div>
                    </div>
                </div>
            </div>
        </>
    );
}
