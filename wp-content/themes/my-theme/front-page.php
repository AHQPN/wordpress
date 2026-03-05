<?php
/**
 * The template for displaying the front page
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 */

get_header();
?>

<main id="primary" class="site-main">

    <!-- Hero Slider Section -->
    <section class="hero-slider" style="margin-bottom: 60px;">
        <div class="swiper myHeroSwiper">
            <div class="swiper-wrapper">
                <?php
                $has_slides = false;
                for ($i = 1; $i <= 3; $i++) {
                    $image = get_theme_mod('hero_slide_image_' . $i);
                    $subtitle = get_theme_mod('hero_slide_subtitle_' . $i);
                    $title = get_theme_mod('hero_slide_title_' . $i);
                    $btn_text = get_theme_mod('hero_slide_btn_text_' . $i);
                    $btn_link = get_theme_mod('hero_slide_btn_link_' . $i);

                    if ($image || $title) {
                        $has_slides = true;
                        ?>
                        <div class="swiper-slide"
                            style="background-image: url('<?php echo esc_url($image); ?>'); background-size: cover; background-position: center; min-height: 600px; display: flex; align-items: center; position: relative;">

                            <!-- Overlay to make text readable -->
                            <div class="slider-overlay"
                                style="position: absolute; top: 0; left: 0; right: 0; bottom: 0; background: rgba(0,0,0,0.2);">
                            </div>

                            <div class="container" style="position: relative; z-index: 10; width: 100%;">
                                <div class="slider-content" style="max-width: 600px;">
                                    <?php if ($subtitle): ?>
                                        <div class="slider-subtitle"
                                            style="font-size: 14px; text-transform: uppercase; letter-spacing: 2px; font-weight: 600; color: #fff; margin-bottom: 15px;">
                                            <?php echo esc_html($subtitle); ?></div>
                                    <?php endif; ?>

                                    <?php if ($title): ?>
                                        <h2 class="slider-title"
                                            style="font-size: 48px; font-weight: 800; color: #fff; margin-bottom: 30px; text-transform: uppercase; line-height: 1.1;">
                                            <?php echo esc_html($title); ?></h2>
                                    <?php endif; ?>

                                    <?php if ($btn_text && $btn_link): ?>
                                        <a href="<?php echo esc_url($btn_link); ?>" class="slider-btn"
                                            style="display: inline-block; background: #fff; color: #000; padding: 15px 40px; text-transform: uppercase; font-weight: 600; font-size: 14px; letter-spacing: 1px;"><?php echo esc_html($btn_text); ?></a>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                        <?php
                    }
                }

                if (!$has_slides):
                    // Fallback Demo Slide
                    ?>
                    <div class="swiper-slide"
                        style="background-color: #e5e5e5; min-height: 500px; display: flex; align-items: center; text-align: center;">
                        <div class="container" style="width: 100%;">
                            <h2 style="font-size: 48px; font-weight: 800; margin-bottom: 20px; text-transform: uppercase;">
                                The New Minimalist</h2>
                            <p
                                style="font-size: 18px; color: #666; margin-bottom: 30px; max-width: 600px; margin-left: auto; margin-right: auto;">
                                Discover our latest collection of premium bags designed for everyday elegance.</p>
                            <a href="<?php echo esc_url(get_permalink(wc_get_page_id('shop'))); ?>"
                                style="display: inline-block; background-color: #000; color: #fff; padding: 15px 40px; text-transform: uppercase; font-weight: 600; letter-spacing: 1px;">Shop
                                Collection</a>
                            <p style="margin-top:20px; font-size: 12px; color:red;">Customize this slider in Appearance >
                                Customize > Hero Slider</p>
                        </div>
                    </div>
                    <?php
                endif;
                ?>
            </div>

            <!-- Swiper Navigation Arrows -->
            <div class="swiper-button-next" style="color: #fff;"></div>
            <div class="swiper-button-prev" style="color: #fff;"></div>

            <!-- Swiper Pagination -->
            <div class="swiper-pagination"></div>
        </div>
    </section>

    <div class="container">
        <!-- Featured Categories -->
        <section class="featured-categories" style="margin-bottom: 80px;">
            <div class="section-title" style="text-align: center; margin-bottom: 40px;">
                <h2 style="font-size: 28px; font-weight: 700;">Shop by Category</h2>
            </div>

            <div class="category-grid" style="display: grid; grid-template-columns: repeat(3, 1fr); gap: 30px;">
                <?php
                // Get WooCommerce product categories
                $args = array(
                    'taxonomy' => 'product_cat',
                    'hide_empty' => false, // Set to true to hide empty categories
                    'number' => 3
                );
                $product_categories = get_terms($args);

                if (!empty($product_categories) && !is_wp_error($product_categories)):
                    foreach ($product_categories as $category):
                        // Get category image if available
                        $thumbnail_id = get_term_meta($category->term_id, 'thumbnail_id', true);
                        $image_url = wp_get_attachment_url($thumbnail_id);

                        // Placeholder if no image
                        if (!$image_url) {
                            $image_url = wc_placeholder_img_src();
                        }
                        ?>
                        <div class="category-item" style="position: relative; overflow: hidden; text-align: center;">
                            <a href="<?php echo esc_url(get_term_link($category)); ?>" style="display: block;">
                                <div class="category-image"
                                    style="background-image: url('<?php echo esc_url($image_url); ?>'); background-size: cover; background-position: center; height: 350px; background-color: #eee;">
                                </div>
                                <div class="category-content" style="padding-top: 20px;">
                                    <h3 style="font-size: 18px; margin: 0; text-transform: uppercase; letter-spacing: 1px;">
                                        <?php echo esc_html($category->name); ?>
                                    </h3>
                                </div>
                            </a>
                        </div>
                        <?php
                    endforeach;
                else:
                    ?>
                    <!-- Fallback Categories if none exist -->
                    <div class="category-item" style="text-align: center;">
                        <div style="height: 350px; background-color: #eee; margin-bottom: 20px;"></div>
                        <h3 style="font-size: 18px; text-transform: uppercase;">Backpacks</h3>
                    </div>
                    <div class="category-item" style="text-align: center;">
                        <div style="height: 350px; background-color: #eee; margin-bottom: 20px;"></div>
                        <h3 style="font-size: 18px; text-transform: uppercase;">Tote Bags</h3>
                    </div>
                    <div class="category-item" style="text-align: center;">
                        <div style="height: 350px; background-color: #eee; margin-bottom: 20px;"></div>
                        <h3 style="font-size: 18px; text-transform: uppercase;">Accessories</h3>
                    </div>
                    <?php
                endif;
                ?>
            </div>
        </section>

        <!-- Trending Products -->
        <section class="trending-products" style="margin-bottom: 80px;">
            <div class="section-title"
                style="text-align: center; margin-bottom: 40px; display: flex; justify-content: space-between; align-items: center; border-bottom: 1px solid #eee; padding-bottom: 15px;">
                <h2 style="font-size: 24px; font-weight: 700; margin: 0;">Trending Products</h2>
                <a href="<?php echo esc_url(get_permalink(wc_get_page_id('shop'))); ?>"
                    style="font-size: 14px; text-transform: uppercase; font-weight: 600; border-bottom: 1px solid #000; padding-bottom: 2px;">View
                    All</a>
            </div>

            <div class="woocommerce">
                <?php
                // Display exactly 4 featured or recent products via shortcode
                echo do_shortcode('[recent_products limit="4" columns="4"]');
                ?>
            </div>
        </section>

        <!-- Feature Banner -->
        <section class="feature-banner"
            style="display: flex; background: #fafafa; margin-bottom: 80px; align-items: center;">
            <div class="banner-image" style="flex: 1; height: 500px; background-color: #ddd;">
                <!-- Typically an image here -->
            </div>
            <div class="banner-content" style="flex: 1; padding: 60px;">
                <span class="subtitle"
                    style="text-transform: uppercase; font-size: 12px; font-weight: 600; letter-spacing: 2px; color: #666; display: block; margin-bottom: 15px;">Quality
                    Craftsmanship</span>
                <h2 style="font-size: 36px; margin-bottom: 20px; line-height: 1.2;">Designed to endure.<br>Styled to
                    inspire.</h2>
                <p style="color: #666; margin-bottom: 30px; font-size: 16px;">We pride ourselves on using only the
                    finest materials. Every stitch is carefully considered to ensure life-long durability.</p>
                <a href="#" class="btn-secondary"
                    style="display: inline-block; border: 2px solid #000; color: #000; padding: 12px 30px; text-transform: uppercase; font-weight: 600; letter-spacing: 1px;">Learn
                    More</a>
            </div>
        </section>

    </div><!-- .container -->
</main><!-- #main -->

<?php
get_footer();
