<?php
/**
 * Template Name: Custom Home Page
 */
get_header(); ?>

<main id="content">
  <?php if( get_option('beauty_salon_spa_slider_arrows',false) != '1'){ ?>
    <section id="slider">
      <span class="design-right"></span>
      <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <?php
          for ( $i = 1; $i <= 4; $i++ ) {
            $beauty_salon_spa_mod =  get_theme_mod( 'beauty_salon_spa_post_setting' . $i );
            if ( 'page-none-selected' != $beauty_salon_spa_mod ) {
              $beauty_salon_spa_slide_post[] = $beauty_salon_spa_mod;
            }
          }
           if( !empty($beauty_salon_spa_slide_post) ) :
          $beauty_salon_spa_args = array(
            'post_type' =>array('post'),
            'post__in' => $beauty_salon_spa_slide_post
          );
          $beauty_salon_spa_query = new WP_Query( $beauty_salon_spa_args );
          if ( $beauty_salon_spa_query->have_posts() ) :
            $i = 1;
        ?>
        <div class="carousel-inner" role="listbox">
          <?php  while ( $beauty_salon_spa_query->have_posts() ) : $beauty_salon_spa_query->the_post(); ?>
          <div <?php if($i == 1){echo 'class="carousel-item active"';} else{ echo 'class="carousel-item"';}?>>
            <img src="<?php esc_url(the_post_thumbnail_url('full')); ?>"/>
            <div class="carousel-caption slider-inner">
              <h2 class="slider-title"><?php the_title();?></h2>
              <p class="mb-0"><?php echo esc_html(wp_trim_words(get_the_content(),'20') );?></p>
              <div class="home-btn my-4">
                <a class="py-3 px-4" href="<?php the_permalink(); ?>"><?php echo esc_html('READ MORE','beauty-salon-spa'); ?></a>
              </div>
            </div>
          </div>
          <?php $i++; endwhile;
          wp_reset_postdata();?>
        </div>
        <?php else : ?>
        <div class="no-postfound"></div>
          <?php endif;
        endif;?>
          <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"><i class="fas fa-long-arrow-alt-left"></i></span>
          </a>
          <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"><i class="fas fa-long-arrow-alt-right"></i></span>
          </a>
      </div>
      <div class="clearfix"></div>
    </section>
  <?php }?>

  <section id="home-services" class="py-5">
    <div class="container">
      <?php if( get_theme_mod('beauty_salon_spa_services_short_title') != '' ){ ?>
        <h6 class="text-center"><?php echo esc_html(get_theme_mod('beauty_salon_spa_services_short_title','')); ?></h6>
      <?php }?>
      <?php if( get_theme_mod('beauty_salon_spa_services_main_title') != '' ){ ?>
        <h3 class="text-center"><?php echo esc_html(get_theme_mod('beauty_salon_spa_services_main_title','')); ?></h3>
      <?php }?>
      <div class="owl-carousel pt-5">
        <?php
          $beauty_salon_spa_project_category=  get_theme_mod('beauty_salon_spa_services_category_setting');if($beauty_salon_spa_project_category){
          $beauty_salon_spa_page_query = new WP_Query(array( 'category_name' => esc_html($beauty_salon_spa_project_category ,'beauty-salon-spa')));?>
            <?php while( $beauty_salon_spa_page_query->have_posts() ) : $beauty_salon_spa_page_query->the_post(); ?>
              <div class="box">
                <div class="row">
                  <div class="col-lg-6 col-md-6 align-self-center">
                    <div class="img-box">
                      <?php the_post_thumbnail(); ?>
                    </div>
                  </div>
                  <div class="col-lg-6 col-md-6 align-self-center">
                    <div class="box-content">
                      <?php if( get_option('beauty_salon_spa_date',false) != '1') { ?>
                      <span class="mr-2"><?php the_time( get_option( 'date_format' ) ); ?></span>
                      <?php } ?>
                      <?php if( get_option('beauty_salon_spa_admin',false) != '1') { ?>
                      <span class="entry-author"><a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' )) ); ?>"><?php the_author(); ?></a></span>
                      <?php }?>

                      <a href="<?php the_permalink(); ?>"><h4 class="mt-3"><?php the_title();?></h4></a>
                      <p><?php echo esc_html(wp_trim_words(get_the_content(),'10') );?></p>
                      <div class="box-button">
                        <a class="py-2 px-3" href="<?php the_permalink(); ?>"><?php esc_html_e('READ MORE','beauty-salon-spa');?></a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            <?php endwhile;
          wp_reset_postdata();
        }?>
      </div>
    </div>
  </section>
</main>

<?php get_footer(); ?>
