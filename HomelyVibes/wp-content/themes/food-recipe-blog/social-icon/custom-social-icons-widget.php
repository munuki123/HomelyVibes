<?php
class Custom_Social_Icons_Widget extends WP_Widget {

  public function __construct() {
    parent::__construct(
      'custom_social_icons_widget',
      'Custom Social Icons Widget',
      array( 'description' => 'Displays custom social media icons.' )
    );
  }

  public function widget( $args, $instance ) {
    // Widget output
    echo $args['before_widget'];

    // Get the social media URLs from the widget settings
    $title = isset( $instance['title'] ) ? $instance['title'] : '';
    $facebook_url = ! empty( $instance['facebook_url'] ) ? $instance['facebook_url'] : '';
    $twitter_url = ! empty( $instance['twitter_url'] ) ? $instance['twitter_url'] : '';
    $instagram_url = ! empty( $instance['instagram_url'] ) ? $instance['instagram_url'] : '';
    $linkedin_url = ! empty( $instance['linkedin_url'] ) ? $instance['linkedin_url'] : '';
    $whatsapp_url = ! empty( $instance['whatsapp_url'] ) ? $instance['whatsapp_url'] : '';
    $youtube_url = ! empty( $instance['youtube_url'] ) ? $instance['youtube_url'] : '';


    // Output the social icons

    if ( $title ) {
      echo '<h5>' . esc_html( $title ) . '</h5>';
    }
    echo '<div class="custom-social-icons-widget">';
    if ( $facebook_url ) {
      echo '<span><a href="' . esc_url( $facebook_url ) . '"><i class="fab fa-facebook"></i></a></span>';
    }
    if ( $twitter_url ) {
      echo '<span><a href="' . esc_url( $twitter_url ) . '"><i class="fab fa-twitter"></i></a></span>';
    }
    if ( $instagram_url ) {
      echo '<span><a href="' . esc_url( $instagram_url ) . '"><i class="fab fa-instagram"></i></a></span>';
    }
    if ( $linkedin_url ) {
      echo '<span><a href="' . esc_url( $linkedin_url ) . '"><i class="fab fa-linkedin-in"></i></a></span>';
    }
    if ( $whatsapp_url ) {
      echo '<span><a href="' . esc_url( $whatsapp_url ) . '"><i class="fab fa-whatsapp"></i></a></span>';
    }
    if ( $youtube_url ) {
      echo '<span><a href="' . esc_url( $youtube_url ) . '"><i class="fab fa-youtube"></i></a></span>';
    }
    echo '</div>';

    echo $args['after_widget'];
  }

  public function form( $instance ) {
    // Form fields for widget settings
    $title = ! empty( $instance['title'] ) ? $instance['title'] : '';
    $facebook_url = ! empty( $instance['facebook_url'] ) ? $instance['facebook_url'] : '';
    $twitter_url = ! empty( $instance['twitter_url'] ) ? $instance['twitter_url'] : '';
    $instagram_url = ! empty( $instance['instagram_url'] ) ? $instance['instagram_url'] : '';
    $linkedin_url = ! empty( $instance['linkedin_url'] ) ? $instance['linkedin_url'] : '';
    $whatsapp_url = ! empty( $instance['whatsapp_url'] ) ? $instance['whatsapp_url'] : '';
    $youtube_url = ! empty( $instance['youtube_url'] ) ? $instance['youtube_url'] : '';
    ?>
    <p>
        <label for="<?php echo esc_attr($this->get_field_id('title')); ?>"><?php esc_html_e('Title:', 'food-recipe-blog'); ?></label>
        <input class="widefat" id="<?php echo esc_attr($this->get_field_id('title')); ?>" name="<?php echo esc_attr($this->get_field_name('title')); ?>" type="text" value="<?php echo esc_attr($title); ?>">
      </p>
    <p>
    <p>
      <label for="<?php echo $this->get_field_id( 'facebook_url' ); ?>">Facebook URL:</label>
      <input class="widefat" type="url" id="<?php echo $this->get_field_id( 'facebook_url' ); ?>" name="<?php echo $this->get_field_name( 'facebook_url' ); ?>" value="<?php echo esc_attr( $facebook_url ); ?>">
    </p>
    <p>
      <label for="<?php echo $this->get_field_id( 'twitter_url' ); ?>">Twitter URL:</label>
      <input class="widefat" type="url" id="<?php echo $this->get_field_id( 'twitter_url' ); ?>" name="<?php echo $this->get_field_name( 'twitter_url' ); ?>" value="<?php echo esc_attr( $twitter_url ); ?>">
    </p>
    <p>
      <label for="<?php echo $this->get_field_id( 'instagram_url' ); ?>">Instagram URL:</label>
      <input class="widefat" type="url" id="<?php echo $this->get_field_id( 'instagram_url' ); ?>" name="<?php echo $this->get_field_name( 'instagram_url' ); ?>" value="<?php echo esc_attr( $instagram_url ); ?>">
    </p>
    <p>
      <label for="<?php echo $this->get_field_id( 'linkedin_url' ); ?>">Linkedin URL:</label>
      <input class="widefat" type="url" id="<?php echo $this->get_field_id( 'linkedin_url' ); ?>" name="<?php echo $this->get_field_name( 'linkedin_url' ); ?>" value="<?php echo esc_attr( $linkedin_url ); ?>">
    </p>
    <p>
      <label for="<?php echo $this->get_field_id( 'whatsapp_url' ); ?>">Whatsapp URL:</label>
      <input class="widefat" type="url" id="<?php echo $this->get_field_id( 'whatsapp_url' ); ?>" name="<?php echo $this->get_field_name( 'whatsapp_url' ); ?>" value="<?php echo esc_attr( $whatsapp_url ); ?>">
    </p>
    <p>
      <label for="<?php echo $this->get_field_id( 'youtube_url' ); ?>">Youtube URL:</label>
      <input class="widefat" type="url" id="<?php echo $this->get_field_id( 'youtube_url' ); ?>" name="<?php echo $this->get_field_name( 'youtube_url' ); ?>" value="<?php echo esc_attr( $youtube_url ); ?>">
    </p>
    <?php
  }

  public function update( $new_instance, $old_instance ) {
    // Update widget settings
    $instance = array();
    $instance['title'] = (!empty($new_instance['title']) ) ? strip_tags($new_instance['title']) : '';
    $instance['facebook_url'] = ! empty( $new_instance['facebook_url'] ) ? esc_url( $new_instance['facebook_url'] ) : '';
    $instance['twitter_url'] = ! empty( $new_instance['twitter_url'] ) ? esc_url( $new_instance['twitter_url'] ) : '';
    $instance['instagram_url'] = ! empty( $new_instance['instagram_url'] ) ? esc_url( $new_instance['instagram_url'] ) : '';
    $instance['linkedin_url'] = ! empty( $new_instance['linkedin_url'] ) ? esc_url( $new_instance['linkedin_url'] ) : '';
    $instance['whatsapp_url'] = ! empty( $new_instance['whatsapp_url'] ) ? esc_url( $new_instance['whatsapp_url'] ) : '';
    $instance['youtube_url'] = ! empty( $new_instance['youtube_url'] ) ? esc_url( $new_instance['youtube_url'] ) : '';
    return $instance;
  }
}

function register_custom_social_icons_widget() {
  register_widget( 'Custom_Social_Icons_Widget' );
}
add_action( 'widgets_init', 'register_custom_social_icons_widget' );



class Custom_Recent_Posts_Widget extends WP_Widget {

    public function __construct() {
        $widget_ops = array(
            'classname' => 'custom_recent_posts_widget',
            'description' => 'Displays recent posts with images'
        );
        parent::__construct('custom_recent_posts_widget', 'Custom Recent Posts with Images', $widget_ops);
    }

    public function widget($args, $instance) {
        $title = apply_filters('widget_title', $instance['title']);
        $num_posts = isset($instance['num_posts']) ? absint($instance['num_posts']) : 5;

        echo $args['before_widget'];

        if (!empty($title)) {
            echo $args['before_title'] . $title . $args['after_title'];
        }

        $recent_posts = new WP_Query(array(
            'post_type' => 'post',
            'posts_per_page' => $num_posts,
            'ignore_sticky_posts' => true
        ));

        if ($recent_posts->have_posts()) {
            echo '<ul>';
            while ($recent_posts->have_posts()) {
                $recent_posts->the_post();
                ?>
                <li>
                    <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
                      <div class="row">
                        <div class="col-lg-4 col-md-4 col-sm-4 col-4 post-img">
                           <?php if (has_post_thumbnail()) {
                              the_post_thumbnail('thumbnail');
                          } ?>
                        </div>
                        <div class="col-lg-8 col-md-8 col-sm-8 col-8 post-cont pl-0 align-self-center">
                           <?php the_title(); ?>
                        </div>
                      </div>
                    </a>
                </li>
                <?php
            }
            echo '</ul>';
            wp_reset_postdata();
        }

        echo $args['after_widget'];
    }

    public function form($instance) {
        $title = isset($instance['title']) ? esc_attr($instance['title']) : '';
        $num_posts = isset($instance['num_posts']) ? absint($instance['num_posts']) : 5;
        ?>
        <p>
            <label for="<?php echo $this->get_field_id('title'); ?>">Title:</label>
            <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>"
                   name="<?php echo $this->get_field_name('title'); ?>" type="text"
                   value="<?php echo $title; ?>">
        </p>
        <p>
            <label for="<?php echo $this->get_field_id('num_posts'); ?>">Number of posts to show:</label>
            <input class="tiny-text" id="<?php echo $this->get_field_id('num_posts'); ?>"
                   name="<?php echo $this->get_field_name('num_posts'); ?>" type="number" step="1" min="1"
                   value="<?php echo $num_posts; ?>" size="3">
        </p>
        <?php
    }

    public function update($new_instance, $old_instance) {
        $instance = array();
        $instance['title'] = (!empty($new_instance['title'])) ? strip_tags($new_instance['title']) : '';
        $instance['num_posts'] = (!empty($new_instance['num_posts'])) ? absint($new_instance['num_posts']) : 5;
        return $instance;
    }
}

function register_custom_recent_posts_widget() {
    register_widget('Custom_Recent_Posts_Widget');
}

add_action('widgets_init', 'register_custom_recent_posts_widget');