<?php
// This file is generated. Do not modify it manually.
return array(
	'sm-announce-bar' => array(
		'$schema' => 'https://schemas.wp.org/trunk/block.json',
		'apiVersion' => 3,
		'name' => 'sm/announce-bar',
		'version' => '0.1.0',
		'title' => 'SM Announce Bar',
		'category' => 'design',
		'icon' => 'megaphone',
		'description' => 'Thanh thông báo (Announce bar) nằm ngay dưới Header.',
		'attributes' => array(
			'content' => array(
				'type' => 'string',
				'source' => 'html',
				'selector' => '.sm-announce-bar__content',
				'default' => 'Free Shipping | Get Rp 50,000 off for your first purchase. Use code: FIRST50 | Extra 10% off for Mandiri Card. Use code: LACMAN'
			),
			'bgColor' => array(
				'type' => 'string',
				'default' => '#0b172a'
			),
			'textColor' => array(
				'type' => 'string',
				'default' => '#ffffff'
			),
			'linkColor' => array(
				'type' => 'string',
				'default' => '#e2e8f0'
			)
		),
		'supports' => array(
			'html' => false,
			'align' => array(
				'wide',
				'full'
			)
		),
		'textdomain' => 'my-blocks',
		'editorScript' => 'file:./index.js',
		'editorStyle' => 'file:./index.css',
		'style' => 'file:./style-index.css'
	),
	'sm-blog-slider' => array(
		'$schema' => 'https://schemas.wp.org/trunk/block.json',
		'apiVersion' => 3,
		'name' => 'sm/blog-slider',
		'version' => '0.1.0',
		'title' => 'SM Blog Slider',
		'category' => 'design',
		'icon' => 'slides',
		'description' => 'Block blog slider Lacoste style with manual and auto-import support.',
		'supports' => array(
			'html' => false,
			'align' => array(
				'wide',
				'full'
			)
		),
		'attributes' => array(
			'sectionTitle' => array(
				'type' => 'string',
				'default' => 'We are Lacoste'
			),
			'sectionIconLogo' => array(
				'type' => 'string',
				'default' => ''
			),
			'slides' => array(
				'type' => 'array',
				'default' => array(
					array(
						'id' => 1,
						'imageUrl' => 'https://www.lacoste.com/on/demandware.static/-/Library-Sites-LacosteContent/default/dw2f7f9e8f/img/home/2024/03/WE-ARE-LACOSTE-DESKTOP.jpg',
						'title' => 'Steal the look!',
						'description' => 'Step onto the court with confidence. Discover padel-inspired styles that blend performance with modern elegance.',
						'btnText' => 'See the look',
						'btnUrl' => '#'
					)
				)
			),
			'bgColor' => array(
				'type' => 'string',
				'default' => '#596c3d'
			),
			'textColor' => array(
				'type' => 'string',
				'default' => '#ffffff'
			),
			'align' => array(
				'type' => 'string',
				'default' => 'full'
			)
		),
		'style' => 'file:./style-index.css',
		'editorStyle' => 'file:./index.css',
		'editorScript' => 'file:./index.js',
		'viewScript' => 'file:./view.js',
		'textdomain' => 'my-blocks'
	),
	'sm-collection-list' => array(
		'$schema' => 'https://schemas.wp.org/trunk/block.json',
		'apiVersion' => 3,
		'name' => 'sm/collection-list',
		'version' => '0.1.0',
		'title' => 'SM Collection List',
		'category' => 'design',
		'icon' => 'grid-view',
		'description' => 'Block hiển thị danh sách bộ sưu tập dạng lưới.',
		'keywords' => array(
			'collection',
			'grid',
			'list',
			'sm'
		),
		'attributes' => array(
			'sectionTitle' => array(
				'type' => 'string',
				'default' => 'Lacoste seasonal wardrobe'
			),
			'columns' => array(
				'type' => 'number',
				'default' => 4
			),
			'items' => array(
				'type' => 'array',
				'default' => array(
					
				)
			),
			'align' => array(
				'type' => 'string',
				'default' => 'full'
			)
		),
		'supports' => array(
			'html' => false,
			'align' => array(
				'wide',
				'full'
			)
		),
		'textdomain' => 'my-blocks',
		'editorScript' => 'file:./index.js',
		'editorStyle' => 'file:./index.css',
		'style' => 'file:./style-index.css',
		'viewScript' => 'file:./view.js'
	),
	'sm-collection-split' => array(
		'$schema' => 'https://schemas.wp.org/trunk/block.json',
		'apiVersion' => 3,
		'name' => 'sm/collection-split',
		'version' => '0.1.0',
		'title' => 'SM Collection Split',
		'category' => 'sm-blocks',
		'icon' => 'columns',
		'description' => '50/50 split layout or 2-column grid with text overlays.',
		'supports' => array(
			'html' => false,
			'align' => array(
				'wide',
				'full'
			)
		),
		'attributes' => array(
			'displayMode' => array(
				'type' => 'string',
				'default' => 'split'
			),
			'items' => array(
				'type' => 'array',
				'default' => array(
					array(
						'id' => 1,
						'categoryId' => 0,
						'imageUrl' => '',
						'title' => 'New Collection',
						'description' => 'Short description here',
						'buttonText' => 'Find out more',
						'buttonUrl' => '#',
						'layout' => 'image-text',
						'overlayPosition' => 'bottom-left'
					)
				)
			),
			'bgColor' => array(
				'type' => 'string',
				'default' => '#ffffff'
			),
			'textColor' => array(
				'type' => 'string',
				'default' => '#000000'
			),
			'align' => array(
				'type' => 'string',
				'default' => 'full'
			),
			'sectionTitle' => array(
				'type' => 'string',
				'default' => ''
			)
		),
		'textdomain' => 'my-blocks',
		'editorScript' => 'file:./index.js',
		'editorStyle' => 'file:./index.css',
		'style' => 'file:./style-index.css'
	),
	'sm-featured-product' => array(
		'$schema' => 'https://schemas.wp.org/trunk/block.json',
		'apiVersion' => 3,
		'name' => 'sm/featured-product',
		'version' => '0.1.0',
		'title' => 'SM Featured Product',
		'category' => 'design',
		'icon' => 'star-filled',
		'description' => 'Block hiển thị sản phẩm dạng slider, dynamic load từ product category.',
		'keywords' => array(
			'product',
			'featured',
			'sm',
			'woocommerce'
		),
		'attributes' => array(
			'categoryId' => array(
				'type' => 'number',
				'default' => 0
			),
			'columns' => array(
				'type' => 'number',
				'default' => 3
			),
			'numberOfProducts' => array(
				'type' => 'number',
				'default' => 12
			),
			'align' => array(
				'type' => 'string',
				'default' => 'full'
			),
			'sectionTitle' => array(
				'type' => 'string',
				'default' => ''
			)
		),
		'supports' => array(
			'html' => false,
			'align' => array(
				'wide',
				'full'
			)
		),
		'textdomain' => 'my-blocks',
		'editorScript' => 'file:./index.js',
		'editorStyle' => 'file:./index.css',
		'style' => 'file:./style-index.css',
		'render' => 'file:./render.php',
		'viewScript' => 'file:./view.js'
	),
	'sm-footer' => array(
		'$schema' => 'https://schemas.wp.org/trunk/block.json',
		'apiVersion' => 3,
		'name' => 'sm/footer',
		'version' => '0.1.0',
		'title' => 'SM Footer',
		'category' => 'design',
		'icon' => 'shield-alt',
		'description' => 'Block footer Lacoste style với 4 cột và thanh toán.',
		'keywords' => array(
			'footer',
			'lacoste',
			'sm'
		),
		'attributes' => array(
			'newsletterTitle' => array(
				'type' => 'string',
				'default' => 'Sign up for new stories,'
			),
			'newsletterSubtitle' => array(
				'type' => 'string',
				'default' => 'news and personal offers'
			),
			'aboutTitle' => array(
				'type' => 'string',
				'default' => 'ABOUT LACOSTE'
			),
			'aboutContent' => array(
				'type' => 'array',
				'default' => array(
					array(
						'label' => 'The Lacoste Group',
						'url' => '#'
					),
					array(
						'label' => 'Careers',
						'url' => '#'
					),
					array(
						'label' => 'Brand protection',
						'url' => '#'
					)
				)
			),
			'categoriesTitle' => array(
				'type' => 'string',
				'default' => 'CATEGORIES'
			),
			'categoriesContent' => array(
				'type' => 'array',
				'default' => array(
					array(
						'label' => 'Men\'s collection',
						'url' => '#'
					),
					array(
						'label' => 'Women\'s collection',
						'url' => '#'
					),
					array(
						'label' => 'Kids collection',
						'url' => '#'
					)
				)
			),
			'helpTitle' => array(
				'type' => 'string',
				'default' => 'HELP & CONTACTS'
			),
			'helpContent' => array(
				'type' => 'array',
				'default' => array(
					array(
						'label' => 'Lacoste size chart',
						'url' => '#'
					),
					array(
						'label' => 'FAQ',
						'url' => '#'
					),
					array(
						'label' => 'By email',
						'url' => '#'
					)
				)
			),
			'storeCount' => array(
				'type' => 'string',
				'default' => '50 STORES IN INDONESIA'
			),
			'storeBtnText' => array(
				'type' => 'string',
				'default' => 'Find a boutique'
			),
			'storeBtnUrl' => array(
				'type' => 'string',
				'default' => '#'
			),
			'bgColor' => array(
				'type' => 'string',
				'default' => '#f4f4f4'
			),
			'textColor' => array(
				'type' => 'string',
				'default' => '#222222'
			)
		),
		'supports' => array(
			'html' => false,
			'align' => array(
				'wide',
				'full'
			)
		),
		'textdomain' => 'my-blocks',
		'editorScript' => 'file:./index.js',
		'editorStyle' => 'file:./index.css',
		'style' => 'file:./style-index.css'
	),
	'sm-header' => array(
		'$schema' => 'https://schemas.wp.org/trunk/block.json',
		'apiVersion' => 3,
		'name' => 'sm/header',
		'version' => '0.1.0',
		'title' => 'SM Header',
		'category' => 'design',
		'icon' => 'menu',
		'description' => 'Header Lacoste-style: Logo trái, Navigation giữa, Utilities phải.',
		'keywords' => array(
			'header',
			'menu',
			'navigation',
			'sm'
		),
		'attributes' => array(
			'logoUrl' => array(
				'type' => 'string',
				'default' => ''
			),
			'logoWidth' => array(
				'type' => 'number',
				'default' => 160
			),
			'siteName' => array(
				'type' => 'string',
				'default' => 'LACOSTE'
			),
			'menuItems' => array(
				'type' => 'array',
				'default' => array(
					array(
						'label' => 'Men',
						'url' => '#',
						'children' => array(
							array(
								'label' => 'Clothing',
								'url' => '#',
								'children' => array(
									array(
										'label' => 'Polo Shirts',
										'url' => '#',
										'children' => array(
											
										)
									),
									array(
										'label' => 'T-Shirts',
										'url' => '#',
										'children' => array(
											
										)
									),
									array(
										'label' => 'Jackets',
										'url' => '#',
										'children' => array(
											
										)
									)
								)
							),
							array(
								'label' => 'Shoes',
								'url' => '#',
								'children' => array(
									array(
										'label' => 'Sneakers',
										'url' => '#',
										'children' => array(
											
										)
									),
									array(
										'label' => 'Loafers',
										'url' => '#',
										'children' => array(
											
										)
									)
								)
							),
							array(
								'label' => 'Accessories',
								'url' => '#',
								'children' => array(
									
								)
							)
						)
					),
					array(
						'label' => 'Women',
						'url' => '#',
						'children' => array(
							array(
								'label' => 'Clothing',
								'url' => '#',
								'children' => array(
									
								)
							),
							array(
								'label' => 'Shoes',
								'url' => '#',
								'children' => array(
									
								)
							)
						)
					),
					array(
						'label' => 'Kids',
						'url' => '#',
						'children' => array(
							
						)
					),
					array(
						'label' => 'Polo',
						'url' => '#',
						'children' => array(
							
						)
					),
					array(
						'label' => 'Collections',
						'url' => '#',
						'children' => array(
							
						)
					)
				)
			),
			'bgColor' => array(
				'type' => 'string',
				'default' => '#ffffff'
			),
			'textColor' => array(
				'type' => 'string',
				'default' => '#000000'
			),
			'showSearch' => array(
				'type' => 'boolean',
				'default' => true
			),
			'showLocale' => array(
				'type' => 'boolean',
				'default' => true
			),
			'showStoreLocator' => array(
				'type' => 'boolean',
				'default' => true
			),
			'storeLocatorUrl' => array(
				'type' => 'string',
				'default' => '#'
			),
			'showAccount' => array(
				'type' => 'boolean',
				'default' => true
			),
			'showCart' => array(
				'type' => 'boolean',
				'default' => true
			),
			'stickyHeader' => array(
				'type' => 'boolean',
				'default' => true
			)
		),
		'supports' => array(
			'html' => false,
			'align' => array(
				'wide',
				'full'
			)
		),
		'textdomain' => 'my-blocks',
		'editorScript' => 'file:./index.js',
		'editorStyle' => 'file:./index.css',
		'style' => 'file:./style-index.css',
		'viewScript' => 'file:./view.js'
	),
	'sm-hero' => array(
		'$schema' => 'https://schemas.wp.org/trunk/block.json',
		'apiVersion' => 3,
		'name' => 'sm/hero',
		'version' => '0.1.0',
		'title' => 'SM Hero Section',
		'category' => 'design',
		'icon' => 'cover-image',
		'description' => 'Block hero banner toàn màn hình với tiêu đề, mô tả và nút CTA.',
		'keywords' => array(
			'hero',
			'banner',
			'slider',
			'sm'
		),
		'attributes' => array(
			'title' => array(
				'type' => 'string',
				'default' => 'Welcome to Our Store'
			),
			'subtitle' => array(
				'type' => 'string',
				'default' => 'Discover amazing products and services'
			),
			'buttonText' => array(
				'type' => 'string',
				'default' => 'Shop Now'
			),
			'buttonUrl' => array(
				'type' => 'string',
				'default' => '#'
			),
			'backgroundImage' => array(
				'type' => 'string',
				'default' => ''
			),
			'backgroundVideo' => array(
				'type' => 'string',
				'default' => ''
			),
			'backgroundType' => array(
				'type' => 'string',
				'default' => 'image'
			),
			'overlayColor' => array(
				'type' => 'string',
				'default' => 'rgba(0,0,0,0.5)'
			)
		),
		'supports' => array(
			'html' => false,
			'align' => array(
				'wide',
				'full'
			)
		),
		'textdomain' => 'my-blocks',
		'editorScript' => 'file:./index.js',
		'editorStyle' => 'file:./index.css',
		'style' => 'file:./style-index.css'
	),
	'sm-product-add-to-cart' => array(
		'$schema' => 'https://schemas.wp.org/trunk/block.json',
		'apiVersion' => 3,
		'name' => 'sm/product-add-to-cart',
		'version' => '0.1.0',
		'title' => 'SM Product Add to Cart',
		'category' => 'sm-blocks',
		'icon' => 'cart',
		'description' => 'Displays the add to cart button and quantity input.',
		'supports' => array(
			'html' => false
		),
		'textdomain' => 'my-blocks',
		'editorScript' => 'file:./index.js',
		'viewScript' => 'file:./view.js',
		'render' => 'file:./render.php'
	),
	'sm-product-breadcrumb' => array(
		'$schema' => 'https://schemas.wp.org/trunk/block.json',
		'apiVersion' => 3,
		'name' => 'sm/product-breadcrumb',
		'version' => '0.1.0',
		'title' => 'SM Product Breadcrumb',
		'category' => 'sm-blocks',
		'icon' => 'arrow-right-alt2',
		'description' => 'Displays the product breadcrumb.',
		'supports' => array(
			'html' => false
		),
		'textdomain' => 'my-blocks',
		'editorScript' => 'file:./index.js',
		'style' => 'file:./style-index.css',
		'render' => 'file:./render.php'
	),
	'sm-product-description' => array(
		'$schema' => 'https://schemas.wp.org/trunk/block.json',
		'apiVersion' => 3,
		'name' => 'sm/product-description',
		'version' => '0.1.0',
		'title' => 'SM Product Description',
		'category' => 'sm-blocks',
		'icon' => 'text',
		'description' => 'Displays the product detailed description.',
		'supports' => array(
			'html' => false
		),
		'textdomain' => 'my-blocks',
		'editorScript' => 'file:./index.js',
		'render' => 'file:./render.php'
	),
	'sm-product-grid' => array(
		'$schema' => 'https://schemas.wp.org/trunk/block.json',
		'apiVersion' => 3,
		'name' => 'sm/product-grid',
		'version' => '0.1.0',
		'title' => 'SM Product Grid',
		'category' => 'sm-theme',
		'description' => 'Premium product grid for archive and category pages.',
		'attributes' => array(
			'columns' => array(
				'type' => 'number',
				'default' => 4
			),
			'number' => array(
				'type' => 'number',
				'default' => 12
			)
		),
		'supports' => array(
			'html' => false,
			'anchor' => true
		),
		'editorScript' => 'file:./index.js',
		'editorStyle' => 'file:./index.css',
		'style' => 'file:./style-index.css',
		'render' => 'file:./render.php'
	),
	'sm-product-image' => array(
		'$schema' => 'https://schemas.wp.org/trunk/block.json',
		'apiVersion' => 3,
		'name' => 'sm/product-image',
		'version' => '0.1.0',
		'title' => 'SM Product Image',
		'category' => 'sm-blocks',
		'icon' => 'format-image',
		'description' => 'Displays the product image gallery.',
		'supports' => array(
			'html' => false
		),
		'textdomain' => 'my-blocks',
		'editorScript' => 'file:./index.js',
		'render' => 'file:./render.php'
	),
	'sm-product-information' => array(
		'$schema' => 'https://schemas.wp.org/trunk/block.json',
		'apiVersion' => 3,
		'name' => 'sm/product-information',
		'version' => '0.1.0',
		'title' => 'SM Product Information (PDP Layout)',
		'category' => 'sm-blocks',
		'icon' => 'feedback',
		'description' => 'A wrapper block defining the CSS Grid layout for a Single Product Page, containing dynamic sub-blocks.',
		'supports' => array(
			'html' => false,
			'align' => array(
				'wide',
				'full'
			),
			'layout' => array(
				'allowEditing' => false
			)
		),
		'attributes' => array(
			'align' => array(
				'type' => 'string',
				'default' => 'full'
			)
		),
		'textdomain' => 'my-blocks',
		'editorScript' => 'file:./index.js',
		'editorStyle' => 'file:./index.css',
		'style' => 'file:./style-index.css'
	),
	'sm-product-price' => array(
		'$schema' => 'https://schemas.wp.org/trunk/block.json',
		'apiVersion' => 3,
		'name' => 'sm/product-price',
		'version' => '0.1.0',
		'title' => 'SM Product Price',
		'category' => 'sm-blocks',
		'icon' => 'money-alt',
		'description' => 'Displays the product price.',
		'supports' => array(
			'html' => false
		),
		'textdomain' => 'my-blocks',
		'editorScript' => 'file:./index.js',
		'render' => 'file:./render.php'
	),
	'sm-product-rating' => array(
		'$schema' => 'https://schemas.wp.org/trunk/block.json',
		'apiVersion' => 3,
		'name' => 'sm/product-rating',
		'version' => '0.1.0',
		'title' => 'SM Product Rating',
		'category' => 'woocommerce',
		'description' => 'Displays the product average rating and review count.',
		'supports' => array(
			'html' => false
		),
		'textdomain' => 'my-blocks',
		'editorScript' => 'file:./index.js',
		'editorStyle' => 'file:./index.css',
		'style' => 'file:./style-index.css',
		'render' => 'file:./render.php'
	),
	'sm-product-related' => array(
		'$schema' => 'https://schemas.wp.org/trunk/block.json',
		'apiVersion' => 3,
		'name' => 'sm/product-related',
		'version' => '0.1.0',
		'title' => 'SM Related Products',
		'category' => 'woocommerce',
		'description' => 'Display related products with custom Lacoste styling.',
		'supports' => array(
			'html' => false,
			'align' => array(
				'wide',
				'full'
			)
		),
		'attributes' => array(
			'limit' => array(
				'type' => 'number',
				'default' => 4
			),
			'columns' => array(
				'type' => 'number',
				'default' => 4
			),
			'sectionTitle' => array(
				'type' => 'string',
				'default' => 'Related Products'
			)
		),
		'textdomain' => 'my-blocks',
		'editorScript' => 'file:./index.js',
		'editorStyle' => 'file:./index.css',
		'style' => 'file:./style-index.css',
		'render' => 'file:./render.php'
	),
	'sm-product-reviews' => array(
		'$schema' => 'https://schemas.wp.org/trunk/block.json',
		'apiVersion' => 3,
		'name' => 'sm/product-reviews',
		'version' => '0.1.0',
		'title' => 'SM Product Reviews',
		'category' => 'woocommerce',
		'description' => 'A modern, premium product reviews block with summaries and submission form.',
		'supports' => array(
			'html' => false,
			'align' => array(
				'wide',
				'full'
			)
		),
		'textdomain' => 'my-blocks',
		'editorScript' => 'file:./index.js',
		'editorStyle' => 'file:./index.css',
		'style' => 'file:./style-index.css',
		'render' => 'file:./render.php'
	),
	'sm-product-short-description' => array(
		'$schema' => 'https://schemas.wp.org/trunk/block.json',
		'apiVersion' => 3,
		'name' => 'sm/product-short-description',
		'version' => '0.1.0',
		'title' => 'SM Product Short Description',
		'category' => 'woocommerce',
		'description' => 'Displays the product short description.',
		'supports' => array(
			'html' => false
		),
		'textdomain' => 'my-blocks',
		'editorScript' => 'file:./index.js',
		'render' => 'file:./render.php'
	),
	'sm-product-title' => array(
		'$schema' => 'https://schemas.wp.org/trunk/block.json',
		'apiVersion' => 3,
		'name' => 'sm/product-title',
		'version' => '0.1.0',
		'title' => 'SM Product Title',
		'category' => 'sm-blocks',
		'icon' => 'heading',
		'description' => 'Displays the product title.',
		'supports' => array(
			'html' => false
		),
		'textdomain' => 'my-blocks',
		'editorScript' => 'file:./index.js',
		'render' => 'file:./render.php'
	),
	'sm-product-trust-badges' => array(
		'$schema' => 'https://schemas.wp.org/trunk/block.json',
		'apiVersion' => 3,
		'name' => 'sm/product-trust-badges',
		'version' => '0.1.0',
		'title' => 'SM Product Trust Badges',
		'category' => 'woocommerce',
		'description' => 'Displays custom shop trust badges.',
		'supports' => array(
			'html' => false
		),
		'textdomain' => 'my-blocks',
		'editorScript' => 'file:./index.js',
		'editorStyle' => 'file:./index.css',
		'style' => 'file:./style-index.css',
		'render' => 'file:./render.php'
	),
	'sm-testimonial' => array(
		'$schema' => 'https://schemas.wp.org/trunk/block.json',
		'apiVersion' => 3,
		'name' => 'sm/testimonial',
		'version' => '0.1.0',
		'title' => 'SM Testimonial',
		'category' => 'design',
		'icon' => 'format-quote',
		'description' => 'Block đánh giá khách hàng.',
		'keywords' => array(
			'testimonial',
			'review',
			'quote',
			'sm'
		),
		'attributes' => array(
			'heading' => array(
				'type' => 'string',
				'default' => 'What Our Customers Say'
			),
			'quote' => array(
				'type' => 'string',
				'default' => 'This is the best store I have ever shopped at!'
			),
			'authorName' => array(
				'type' => 'string',
				'default' => 'Jane Doe'
			),
			'authorRole' => array(
				'type' => 'string',
				'default' => 'Happy Customer'
			),
			'avatarUrl' => array(
				'type' => 'string',
				'default' => ''
			)
		),
		'supports' => array(
			'html' => false,
			'align' => array(
				'wide',
				'full'
			)
		),
		'textdomain' => 'my-blocks',
		'editorScript' => 'file:./index.js',
		'editorStyle' => 'file:./index.css',
		'style' => 'file:./style-index.css'
	)
);
