<?php
/**
 * The template for displaying the footer
 *
 * @subpackage Beauty Salon Spa
 * @since 1.0
 */

?>
	<footer id="colophon" class="site-footer" role="contentinfo">
		<div class="copyright">
			<div class="container footer-content">
				<?php get_template_part( 'template-parts/footer/footer', 'widgets' ); ?>
			</div>
		</div>
		<?php get_template_part( 'template-parts/footer/site', 'info' ); ?>
		<?php if( get_option( 'beauty_salon_spa_scroll_enable',false) != '1') { ?>
			<div class="scroll-top">
				<button type=button id="beauty-salon-spa-scroll-to-top" class="scrollup">
					<i class="<?php echo esc_html(get_theme_mod('beauty_salon_scroll_top_icon','fas fa-chevron-up')); ?>"></i>
				</button>
			</div>
		<?php }?>
	</footer>
<?php wp_footer(); ?>

</body>
</html>