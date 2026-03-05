<footer id="colophon" class="site-footer"
	style="background:#f9f9f9; padding:60px 0; margin-top:60px; border-top:1px solid #eee;">
	<div class="container footer-inner" style="display:flex; justify-content:space-between;">
		<div class="footer-widget">
			<h3 style="font-size:16px; margin-bottom:20px;">About Bagberry</h3>
			<p style="color:#666; font-size:14px; max-width:300px;">We create high quality bags for everyday use.
				Designed with minimalism and functionality in mind.</p>
		</div>

		<div class="footer-widget">
			<h3 style="font-size:16px; margin-bottom:20px;">Shop</h3>
			<?php
			wp_nav_menu(array(
				'theme_location' => 'footer-menu',
				'menu_id' => 'footer-menu',
				'fallback_cb' => false,
				'container' => false,
				'items_wrap' => '<ul id="%1$s" class="%2$s" style="list-style:none; margin:0; padding:0; line-height:2; font-size:14px;">%3$s</ul>'
			));
			?>
		</div>

		<div class="footer-widget">
			<h3 style="font-size:16px; margin-bottom:20px;">Newsletter</h3>
			<form style="display:flex;">
				<input type="email" placeholder="Your email" style="padding:10px; border:1px solid #ccc; width:200px;">
				<button type="submit"
					style="background:#000; color:#fff; border:none; padding:10px 20px; cursor:pointer;">Subscribe</button>
			</form>
		</div>
	</div>

	<div class="site-info"
		style="text-align:center; padding-top:40px; margin-top:40px; border-top:1px solid #ddd; font-size:12px; color:#999;">
		&copy; <?php echo date('Y'); ?> Bagberry Clone. All rights reserved.
	</div><!-- .site-info -->
</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>
</body>

</html>