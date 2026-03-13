import { useBlockProps, InspectorControls } from '@wordpress/block-editor';
import { PanelBody, TextControl, RangeControl } from '@wordpress/components';

export default function Edit({ attributes, setAttributes }) {
    const { height, overlayOpacity, defaultImage } = attributes;

    return (
        <>
            <InspectorControls>
                <PanelBody title="Banner Settings">
                    <TextControl
                        label="Banner Height (px, vh, etc.)"
                        value={height}
                        onChange={(val) => setAttributes({ height: val })}
                    />
                    <RangeControl
                        label="Overlay Opacity"
                        value={overlayOpacity}
                        onChange={(val) => setAttributes({ overlayOpacity: val })}
                        min={0}
                        max={1}
                        step={0.1}
                    />
                    <TextControl
                        label="Default Image URL (Fallback)"
                        value={defaultImage}
                        onChange={(val) => setAttributes({ defaultImage: val })}
                    />
                </PanelBody>
            </InspectorControls>

            <div {...useBlockProps({
                className: 'sm-category-banner-preview',
                style: {
                    maxHeight: '400px',
                    height: height,
                    backgroundColor: '#333',
                    display: 'flex',
                    alignItems: 'center',
                    justifyContent: 'center',
                    position: 'relative',
                    overflow: 'hidden'
                }
            })}>
                <div style={{
                    position: 'absolute',
                    top: 0,
                    left: 0,
                    width: '100%',
                    height: '100%',
                    backgroundColor: `rgba(0,0,0,${overlayOpacity})`,
                    zIndex: 1
                }} />
                <h1 style={{
                    color: '#fff',
                    zIndex: 2,
                    fontSize: 'clamp(28px, 4vw, 48px)',
                    fontWeight: '800',
                    margin: 0,
                    textTransform: 'uppercase',
                    letterSpacing: '4px',
                    textAlign: 'center',
                    lineHeight: '1.2'
                }}>Category Title (Preview)</h1>
            </div>
        </>
    );
}
