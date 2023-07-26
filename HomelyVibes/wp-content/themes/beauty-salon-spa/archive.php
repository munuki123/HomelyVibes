<?php
/**
 * The template for displaying archive pages
 *
 * @subpackage Beauty Salon Spa
 * @since 1.0
 */

get_header(); ?>

<?php
	$beauty_salon_spa_post_sidebar = get_option( 'beauty_salon_spa_post_sidebar' );
	
	if ( '1' == $beauty_salon_spa_post_sidebar ) {

	$beauty_salon_spa_column = 'col-lg-12 col-md-12';
	} else { 
	$beauty_salon_spa_column = 'col-lg-8 col-md-8';
	}

?>

<main id="content" class="mt-5">
	<div class="container">
		<?php if ( have_posts() ) : ?>
			<header class="page-header">
				<?php
					the_archive_title( '<h1 class="page-title"><span>', '</span></h1>' );
					the_archive_description( '<div class="taxonomy-description">', '</div>' );
				?>
			</header>
		<?php endif; ?>

		<div class="content-area">
			<div id="main" class="site-main" role="main">
		    	<div class="row m-0">
			        <div class="content_area <?php echo esc_html( $beauty_salon_spa_column ); ?>">
				    	<section id="post_section">
				    		<div class="row">
								<?php
									if ( have_posts() ) : ?>
									<?php
									while ( have_posts() ) : the_post();

										$beauty_salon_spa_post_option = get_theme_mod( 'beauty_salon_spa_post_option','simple_post');
										if($beauty_salon_spa_post_option == 'simple_post'){

											get_template_part( 'template-parts/post/content' );

										}else if($beauty_salon_spa_post_option == 'grid_post'){

											get_template_part( 'template-parts/post/grid-content' );
										}

									endwhile;

									else :

										get_template_part( 'template-parts/post/content', 'none' );

									endif;
								?>
							</div>
							<div class="navigation">
				                <?php
				                    the_posts_pagination( array(
				                        'prev_text'          => __( 'Previous page', 'beauty-salon-spa' ),
				                        'next_text'          => __( 'Next page', 'beauty-salon-spa' ),
				                        'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'beauty-salon-spa' ) . ' </span>',
				                    ) );
				                ?>
				                <div class="clearfix"></div>
				            </div>
						</section>
					</div>
					<?php if ( '1' != $beauty_salon_spa_post_sidebar ) {?>
						<div id="sidebar" class="col-lg-4 col-md-4"><?php dynamic_sidebar('sidebar-1'); ?></div>
					<?php } ?>
				</div>
			</div>
		</div>
	</div>
</main>

<?php get_footer();
