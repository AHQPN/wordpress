jQuery(document).ready(function ($) {
    // Attach click event to the dismiss button
    $(document).on('click', '.welcome-notice button.notice-dismiss', function () {
        // Dismiss the notice via AJAX
        $.ajax({
            type: 'POST',
            url: ajaxurl,
            data: {
                action: 'vw_cloud_kitchen_dismissed_notice',
            },
            success: function () {
                // Remove the notice on success
                $('.notice[data-notice="example"]').remove();
            }
        });
    });
});

// Plugin – AI Content Writer plugin activation
document.addEventListener('DOMContentLoaded', function () {
    const vw_cloud_kitchen_button = document.getElementById('install-activate-button');

    if (!vw_cloud_kitchen_button) return;

    vw_cloud_kitchen_button.addEventListener('click', function (e) {
        e.preventDefault();

        const vw_cloud_kitchen_redirectUrl = vw_cloud_kitchen_button.getAttribute('data-redirect');

        // Step 1: Check if plugin is already active
        const vw_cloud_kitchen_checkData = new FormData();
        vw_cloud_kitchen_checkData.append('action', 'check_plugin_activation');

        fetch(installPluginData.ajaxurl, {
            method: 'POST',
            body: vw_cloud_kitchen_checkData,
        })
        .then(res => res.json())
        .then(res => {
            if (res.success && res.data.active) {
                // Plugin is already active → just redirect
                window.location.href = vw_cloud_kitchen_redirectUrl;
            } else {
                // Not active → proceed with install + activate
                vw_cloud_kitchen_button.textContent = 'Installing & Activating...';

                const vw_cloud_kitchen_installData = new FormData();
                vw_cloud_kitchen_installData.append('action', 'install_and_activate_required_plugin');
                vw_cloud_kitchen_installData.append('_ajax_nonce', installPluginData.nonce);

                fetch(installPluginData.ajaxurl, {
                    method: 'POST',
                    body: vw_cloud_kitchen_installData,
                })
                .then(res => res.json())
                .then(res => {
                    if (res.success) {
                        window.location.href = vw_cloud_kitchen_redirectUrl;
                    } else {
                        alert('Activation error: ' + (res.data?.message || 'Unknown error'));
                        vw_cloud_kitchen_button.textContent = 'Try Again';
                    }
                })
                .catch(error => {
                    alert('Request failed: ' + error.message);
                    vw_cloud_kitchen_button.textContent = 'Try Again';
                });
            }
        })
        .catch(error => {
            alert('Check request failed: ' + error.message);
        });
    });
});
