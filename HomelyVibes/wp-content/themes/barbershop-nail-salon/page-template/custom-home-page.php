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
            $beauty_hair_salon_mod =  get_theme_mod( 'beauty_salon_spa_post_setting' . $i );
            if ( 'page-none-selected' != $beauty_hair_salon_mod ) {
              $beauty_salon_spa_slide_post[] = $beauty_hair_salon_mod;
            }
          }
           if( !empty($beauty_salon_spa_slide_post) ) :
          $barbershop_nail_salon_args = array(
            'post_type' =>array('post'),
            'post__in' => $beauty_salon_spa_slide_post
          );
          $barbershop_nail_salon_query = new WP_Query( $barbershop_nail_salon_args );
          if ( $barbershop_nail_salon_query->have_posts() ) :
            $i = 1;
        ?>
        <div class="carousel-inner" role="listbox">
          <?php  while ( $barbershop_nail_salon_query->have_posts() ) : $barbershop_nail_salon_query->the_post(); ?>
          <div <?php if($i == 1){echo 'class="carousel-item active"';} else{ echo 'class="carousel-item"';}?>>
            <img src="<?php esc_url(the_post_thumbnail_url('full')); ?>"/>
            <div class="carousel-caption slider-inner">
              <h2 class="slider-title"><?php the_title();?></h2>
              <p class="mb-0"><?php echo esc_html(wp_trim_words(get_the_content(),'30') );?></p>
              <div class="home-btn my-4">
                <a class="py-3 px-4" href="<?php the_permalink(); ?>"><?php echo esc_html('READ MORE','barbershop-nail-salon'); ?></a>
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
        <h3 class="text-center"><?php echo esc_html(get_theme_mod('beauty_salon_spa_services_short_title','')); ?></h3>
      <?php }?>
      <?php if( get_theme_mod('beauty_salon_spa_services_main_title') != '' ){ ?>
        <p class="heading-text text-center mb-0"><?php echo esc_html(get_theme_mod('beauty_salon_spa_services_main_title','')); ?></p>
      <?php }?>
      <div class="row pt-5">
        <?php
          $barbershop_nail_salon_project_category=  get_theme_mod('beauty_salon_spa_services_category_setting');if($barbershop_nail_salon_project_category){
          $barbershop_nail_salon_page_query = new WP_Query(array( 'category_name' => esc_html($barbershop_nail_salon_project_category ,'barbershop-nail-salon')));?>
            <?php while( $barbershop_nail_salon_page_query->have_posts() ) : $barbershop_nail_salon_page_query->the_post(); ?>
              <div class="col-lg-4 col-md-6 col-sm-6">
                <div class="box mb-5">
                  <div class="img-box">
                    <?php the_post_thumbnail(); ?>
                  </div>
                  <div class="box-content">
                    <a href="<?php the_permalink(); ?>"><h4><?php the_title();?></h4></a>
                    <p><?php echo esc_html(wp_trim_words(get_the_content(),'10') );?></p>
                    <div class="box-button">
                      <a href="<?php the_permalink(); ?>"><?php esc_html_e('READ MORE','barbershop-nail-salon');?></a>
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
