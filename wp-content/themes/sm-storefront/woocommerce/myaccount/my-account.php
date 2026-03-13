<?php
/**
 * My Account page - Custom Shell Override
 *
 * @version 3.5.0
 */

defined( 'ABSPATH' ) || exit;
?>

<div class="sm-account-layout">
	<div class="sm-account-layout__sidebar">
		<?php do_action( 'woocommerce_account_navigation' ); ?>
	</div>

	<div class="sm-account-layout__content">
		<?php do_action( 'woocommerce_account_content' ); ?>
	</div>
</div>
