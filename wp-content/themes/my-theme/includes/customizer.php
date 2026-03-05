<?php
/**
 * My Theme Theme Customizer
 */

function my_theme_customize_register($wp_customize)
{

    // Add Hero Slider Section
    $wp_customize->add_section('my_theme_hero_slider', array(
        'title' => __('Hero Slider', 'my-theme'),
        'description' => __('Customize the homepage hero slider. You can add up to 3 slides.', 'my-theme'),
        'priority' => 30,
    ));

    // Loop to create 3 slides
    for ($i = 1; $i <= 3; $i++) {

        // Slide Image
        $wp_customize->add_setting('hero_slide_image_' . $i, array(
            'default' => '',
            'sanitize_callback' => 'esc_url_raw',
        ));
        $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'hero_slide_image_' . $i, array(
            'label' => sprintf(__('Slide %d Image', 'my-theme'), $i),
            'section  ' => 'my_theme_hero_slider',
            'settings' => 'hero_slide_image_' . $i,
        )));

        // Slide Subtitle
        $wp_customize->add_setting('hero_slide_subtitle_' . $i, array(
            'default' => '',
            'sanitize_callback' => 'sanitize_text_field',
        ));
        $wp_customize->add_control('hero_slide_subtitle_' . $i, array(
            'label' => sprintf(__('Slide %d Subtitle', 'my-theme'), $i),
            'section' => 'my_theme_hero_slider',
            'type' => 'text',
        ));

        // Slide Title
        $wp_customize->add_setting('hero_slide_title_' . $i, array(
            'default' => '',
            'sanitize_callback' => 'sanitize_text_field',
        ));
        $wp_customize->add_control('hero_slide_title_' . $i, array(
            'label' => sprintf(__('Slide %d Title', 'my-theme'), $i),
            'section' => 'my_theme_hero_slider',
            'type' => 'text',
        ));

        // Slide Button Text
        $wp_customize->add_setting('hero_slide_btn_text_' . $i, array(
            'default' => '',
            'sanitize_callback' => 'sanitize_text_field',
        ));
        $wp_customize->add_control('hero_slide_btn_text_' . $i, array(
            'label' => sprintf(__('Slide %d Button Text', 'my-theme'), $i),
            'section' => 'my_theme_hero_slider',
            'type' => 'text',
        ));

        // Slide Button Link
        $wp_customize->add_setting('hero_slide_btn_link_' . $i, array(
            'default' => '',
            'sanitize_callback' => 'esc_url_raw',
        ));
        $wp_customize->add_control('hero_slide_btn_link_' . $i, array(
            'label' => sprintf(__('Slide %d Button Link', 'my-theme'), $i),
            'section' => 'my_theme_hero_slider',
            'type' => 'url',
        ));
    }
}
add_action('customize_register', 'my_theme_customize_register');
