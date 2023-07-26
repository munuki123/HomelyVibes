<?php
/**
 * The header for our theme
 *
 * @subpackage Beauty Salon Spa
 * @since 1.0
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js no-svg">
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<?php
	if ( function_exists( 'wp_body_open' ) ) {
	    wp_body_open();
	} else {
	    do_action( 'wp_body_open' );
	}
?>
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'beauty-salon-spa' ); ?></a>
	<?php if( get_option('beauty_salon_spa_theme_loader') == '1'){ ?>
		<div class="preloader">
			<div class="load">
			  <hr/><hr/><hr/><hr/>
			</div>
		</div>
	<?php }?>
	<div id="page" class="site">
		<div id="header">
			<div class="top_bar py-2 text-center text-lg-left">
				<div class="container">
					<div class="row">
						<div class="col-lg-5 col-md-12 col-sm-12 align-self-center">
							<?php if( get_theme_mod('beauty_salon_spa_top_text') != '' ){ ?>
								<p class="mb-0"><?php echo esc_html(get_theme_mod('beauty_salon_spa_top_text','')); ?></p>
							<?php }?>
						</div>
						<div class="col-lg-7 col-md-12 col-sm-12 align-self-center text-md-right text-center">
							<?php if( get_theme_mod('beauty_salon_spa_email_address') != '' ){ ?>
								<span class="mr-md-2"><i class="<?php echo esc_html(get_theme_mod('beauty_salon_mail_icon','fas fa-envelope-open')); ?> mr-3"></i><?php echo esc_html(get_theme_mod('beauty_salon_spa_email_address','')); ?></span>
							<?php }?>
							<?php if( get_theme_mod('beauty_salon_spa_location_address') != '' ){ ?>
								<span class="mr-md-2"><i class="<?php echo esc_html(get_theme_mod('beauty_salon_address_icon','fas fa-map-marker-alt')); ?> mr-3"></i><?php echo esc_html(get_theme_mod('beauty_salon_spa_location_address','')); ?></span>
							<?php }?>
							<?php if( get_theme_mod('beauty_salon_spa_call_number') != '' ){ ?>
								<span><i class="<?php echo esc_html(get_theme_mod('beauty_salon_call_icon','fas fa-phone-volume')); ?> mr-3"></i><?php echo esc_html(get_theme_mod('beauty_salon_spa_call_number','')); ?></span>
							<?php }?>
						</div>
					</div>
				</div>
			</div>
			<div class="wrap_figure">
				<div class="menu_header py-3">
					<div class="container">
						<div class="row">
							<div class="col-lg-3 col-md-4 col-sm-6 col-8 align-self-center">
								<div class="logo py-3 py-md-0">
							        <?php if ( has_custom_logo() ) : ?>
					            		<?php the_custom_logo(); ?>
						            <?php endif; ?>
					              	<?php $beauty_salon_spa_blog_info = get_bloginfo( 'name' ); ?>
					              		<?php if( get_option('beauty_salon_spa_logo_title','') != 'off' ){ ?>
						                <?php if ( ! empty( $beauty_salon_spa_blog_info ) ) : ?>
						                  	<?php if ( is_front_page() && is_home() ) : ?>
						                    	<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
						                  	<?php else : ?>
					                      		<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
					                  		<?php endif; ?>
						                <?php endif; ?>
						            <?php }?>
						                <?php
					                  		$beauty_salon_spa_description = get_bloginfo( 'description', 'display' );
						                  	if ( $beauty_salon_spa_description || is_customize_preview() ) :
						                ?>
						                <?php if( get_option('beauty_salon_spa_logo_text','') != 'off' ){ ?>
					                  	<p class="site-description">
					                    	<?php echo esc_html($beauty_salon_spa_description); ?>
					                  	</p>
					                  <?php }?>
					              	<?php endif; ?>
							    </div>
							</div>
							<div class="col-lg-7 col-md-4 col-sm-6 col-4 align-self-center">
								<div class="fixed_header"> 
								<?php if(has_nav_menu('primary')){?>
									<div class="toggle-menu gb_menu text-md-right">
										<button onclick="beauty_salon_spa_gb_Menu_open()" class="gb_toggle p-2"><i class="fas fa-ellipsis-h"></i><p class="mb-0"><?php esc_html_e('Menu','beauty-salon-spa'); ?></p></button>
									</div>
								<?php }?>
				   				<?php get_template_part('template-parts/navigation/navigation'); ?>
				   				</div>
							</div>
							<div class="col-lg-2 col-md-4 col-sm-6 col-12 align-self-center">
								<?php if( get_theme_mod('beauty_salon_spa_talk_btn_link') != '' || get_theme_mod('beauty_salon_spa_talk_btn_text') != ''){ ?>
									<p class="chat_btn mb-0 text-center text-md-right"><a href="<?php echo esc_url(get_theme_mod('beauty_salon_spa_talk_btn_link','')); ?>"><?php echo esc_html(get_theme_mod('beauty_salon_spa_talk_btn_text','')); ?></a></p>
								<?php }?>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
