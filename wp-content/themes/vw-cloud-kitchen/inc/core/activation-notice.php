<?php
// Add Getstart admin notice
function vw_cloud_kitchen_admin_notice() { 
    global $pagenow;
    $vw_cloud_kitchen_theme_args      = wp_get_theme();
    $vw_cloud_kitchen_meta            = get_option( 'vw_cloud_kitchen_admin_notice' );
    $vw_cloud_kitchen_name            = $vw_cloud_kitchen_theme_args->__get( 'Name' );
    $vw_cloud_kitchen_current_screen  = get_current_screen();

    if( !$vw_cloud_kitchen_meta ){
        if( is_network_admin() ){
            return;
        }

        if( ! current_user_can( 'manage_options' ) ){
            return;
        } if($vw_cloud_kitchen_current_screen->base != 'appearance_page_vw-cloud-kitchen-guide-page' && $vw_cloud_kitchen_current_screen->id != 'appearance_page_vw-cloud-kitchen-info' && $vw_cloud_kitchen_current_screen->base != 'toplevel_page_cretats-theme-showcase' ) { ?>
        <div class="notice notice-success is-dismissible welcome-notice">
            <div class="notice-row">
                <div class="notice-text">
                    <p class="welcome-text1"><?php esc_html_e( '🎉 Welcome to VW Themes,', 'vw-cloud-kitchen' ); ?></p>
                    <p class="welcome-text2"><?php esc_html_e( 'You are now using the VW Cloud Kitchen, a beautifully designed theme to kickstart your website.', 'vw-cloud-kitchen' ); ?></p>
                    <p class="welcome-text3"><?php esc_html_e( 'To help you get started quickly, use the options below:', 'vw-cloud-kitchen' ); ?></p>

                    <span class="import-btn">
                        <a href="javascript:void(0);" id="install-activate-button" class="button admin-button info-button">
                           <?php echo __('GET STARTED', 'vw-cloud-kitchen'); ?>
                        </a>
                        <script type="text/javascript">
                            document.getElementById('install-activate-button').addEventListener('click', function () {
                                const vw_cloud_kitchen_button = this;
                                const vw_cloud_kitchen_redirectUrl = '<?php echo esc_url(admin_url("themes.php?page=vw-cloud-kitchen-info")); ?>';
                                // First, check if plugin is already active
                                jQuery.post(ajaxurl, { action: 'check_plugin_activation' }, function (response) {
                                    if (response.success && response.data.active) {
                                        // Plugin already active — just redirect
                                        window.location.href = vw_cloud_kitchen_redirectUrl;
                                    } else {
                                        // Show Installing & Activating only if not already active
                                        vw_cloud_kitchen_button.textContent = 'Installing & Activating...';

                                        jQuery.post(ajaxurl, {
                                            action: 'install_and_activate_required_plugin',
                                            nonce: '<?php echo wp_create_nonce("install_activate_nonce"); ?>'
                                        }, function (response) {
                                            if (response.success) {
                                                window.location.href = vw_cloud_kitchen_redirectUrl;
                                            } else {
                                                alert('Failed to activate the plugin.');
                                                vw_cloud_kitchen_button.textContent = 'Try Again';
                                            }
                                        });
                                    }
                                });
                            });
                        </script>
                    </span>

                    <span class="demo-btn">
                        <a href="https://www.vwthemes.net/vw-cloud-kitchen-pro/" class="button button-primary" target="_blank">
                            <?php esc_html_e( 'VIEW DEMO', 'vw-cloud-kitchen' ); ?>
                        </a>
                    </span>

                    <span class="upgrade-btn">
                        <a href="https://www.vwthemes.com/products/kitchen-wordpress-theme" class="button button-primary" target="_blank">
                            <?php esc_html_e( 'UPGRADE TO PRO', 'vw-cloud-kitchen' ); ?>
                        </a>
                    </span>

                    <span class="bundle-btn">
                        <a href="https://www.vwthemes.com/products/wp-theme-bundle" class="button button-primary" target="_blank">
                            <?php esc_html_e( 'BUNDLE OF 400+ THEMES', 'vw-cloud-kitchen' ); ?>
                        </a>
                    </span>
                </div>

                <div class="notice-img1">
                    <img src="<?php echo esc_url( get_template_directory_uri() . '/images/arrow-notice.png' ); ?>" width="180" alt="<?php esc_attr_e( 'VW Cloud Kitchen', 'vw-cloud-kitchen' ); ?>" />
                </div>

                <div class="notice-img2">
                    <img src="<?php echo esc_url( get_template_directory_uri() . '/images/bundle-notice.png' ); ?>" width="180" alt="<?php esc_attr_e( 'VW Cloud Kitchen', 'vw-cloud-kitchen' ); ?>" />
                </div>
            </div>
        </div>
        <?php

    }?>
        <?php

    }
}

add_action( 'admin_notices', 'vw_cloud_kitchen_admin_notice' );

if( ! function_exists( 'vw_cloud_kitchen_update_admin_notice' ) ) :
/**
 * Updating admin notice on dismiss
*/
function vw_cloud_kitchen_update_admin_notice(){
    if ( isset( $_GET['vw_cloud_kitchen_admin_notice'] ) && $_GET['vw_cloud_kitchen_admin_notice'] = '1' ) {
        update_option( 'vw_cloud_kitchen_admin_notice', true );
    }
}
endif;
add_action( 'admin_init', 'vw_cloud_kitchen_update_admin_notice' );

//After Switch theme function
add_action('after_switch_theme', 'vw_cloud_kitchen_getstart_setup_options');
function vw_cloud_kitchen_getstart_setup_options () {
    update_option('vw_cloud_kitchen_admin_notice', FALSE );
}