<?php
/**
 * Smart Tech Blog functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Smart Tech Blog
 */

if ( ! defined( 'FOOD_RECIPE_BLOG_URL' ) ) {
    define( 'FOOD_RECIPE_BLOG_URL', esc_url( 'https://www.themagnifico.net/themes/tech-blog-wordpress-theme/', 'smart-tech-blog') );
}
if ( ! defined( 'FOOD_RECIPE_BLOG_TEXT' ) ) {
    define( 'FOOD_RECIPE_BLOG_TEXT', __( 'Smart Tech Blog Pro','smart-tech-blog' ));
}

function smart_tech_blog_enqueue_styles() {
    wp_enqueue_style( 'bootstrap-css', get_template_directory_uri() . '/assets/css/bootstrap.css');
    $smart_tech_blog_parentcss = 'food-recipe-blog-style';
    $smart_tech_blog_theme = wp_get_theme(); wp_enqueue_style( $smart_tech_blog_parentcss, get_template_directory_uri() . '/style.css', array(), $smart_tech_blog_theme->parent()->get('Version'));
    wp_enqueue_style( 'smart-tech-blog-style', get_stylesheet_uri(), array( $smart_tech_blog_parentcss ), $smart_tech_blog_theme->get('Version'));

    wp_enqueue_script( 'comment-reply', '/wp-includes/js/comment-reply.min.js', array(), false, true );  
}

add_action( 'wp_enqueue_scripts', 'smart_tech_blog_enqueue_styles' );

function smart_tech_blog_popular_articles_string_limit_words($string, $word_limit) {
    $words = explode(' ', $string, ($word_limit + 1));
    if(count($words) > $word_limit)
    array_pop($words);
    return implode(' ', $words);
}

function smart_tech_blog_customize_register($wp_customize){

    //Banner Section
    $wp_customize->add_section('smart_tech_blog_banner',array(
        'title' => esc_html__('Banner Option','smart-tech-blog')
    ));

    $wp_customize->add_setting('smart_tech_blog_banner_bg_image',array(
        'default' => '',
        'sanitize_callback' => 'esc_url_raw',
    ));
    $wp_customize->add_control(
        new WP_Customize_Image_Control( $wp_customize,'smart_tech_blog_banner_bg_image',array(
        'label' => __('Background Image','smart-tech-blog'),
        'description' => __('Dimension 700 * 125','smart-tech-blog'),
        'section' => 'smart_tech_blog_banner',
        'settings' => 'smart_tech_blog_banner_bg_image'
    )));

    $wp_customize->add_setting('smart_tech_blog_banner_heading',array(
        'default' => '',
        'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control('smart_tech_blog_banner_heading',array(
        'label' => esc_html__('Section Heading','smart-tech-blog'),
        'section' => 'smart_tech_blog_banner',
        'setting' => 'smart_tech_blog_banner_heading',
        'type'  => 'text'
    ));

    $wp_customize->add_setting('smart_tech_blog_banner_text',array(
        'default' => '',
        'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control('smart_tech_blog_banner_text',array(
        'label' => esc_html__('Section Title','smart-tech-blog'),
        'section' => 'smart_tech_blog_banner',
        'setting' => 'smart_tech_blog_banner_text',
        'type'  => 'text'
    ));

    //Latest Recipes
    $wp_customize->add_section('smart_tech_blog_popular_articles',array(
        'title' => esc_html__('Popular Articles Option','smart-tech-blog')
    ));

    $wp_customize->add_setting('smart_tech_blog_popular_articles_title',array(
        'default' => '',
        'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control('smart_tech_blog_popular_articles_title',array(
        'label' => esc_html__('Section Title','smart-tech-blog'),
        'section' => 'smart_tech_blog_popular_articles',
        'setting' => 'smart_tech_blog_popular_articles_title',
        'type'  => 'text'
    ));

    $wp_customize->add_setting('smart_tech_blog_popular_articles_button_text',array(
        'default' => '',
        'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control('smart_tech_blog_popular_articles_button_text',array(
        'label' => esc_html__('Section Button Text','smart-tech-blog'),
        'section' => 'smart_tech_blog_popular_articles',
        'setting' => 'smart_tech_blog_popular_articles_button_text',
        'type'  => 'text'
    ));

    $wp_customize->add_setting('smart_tech_blog_popular_articles_button_link',array(
        'default' => '',
        'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control('smart_tech_blog_popular_articles_button_link',array(
        'label' => esc_html__('Section Button Link','smart-tech-blog'),
        'section' => 'smart_tech_blog_popular_articles',
        'setting' => 'smart_tech_blog_popular_articles_button_link',
        'type'  => 'text'
    ));

    $wp_customize->add_setting('smart_tech_blog_popular_articles_number',array(
        'default' => '',
        'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control('smart_tech_blog_popular_articles_number',array(
        'label' => esc_html__('Number of Post','smart-tech-blog'),
        'section' => 'smart_tech_blog_popular_articles',
        'setting' => 'smart_tech_blog_popular_articles_number',
        'type'  => 'number'
    ));

    $categories = get_categories();
    $cats = array();
    $i = 0;
    $cat_post[]= 'select';
    foreach($categories as $category){
        if($i==0){
            $default = $category->slug;
            $i++;
        }
        $cat_post[$category->slug] = $category->name;
    }

    $wp_customize->add_setting('smart_tech_blog_popular_articles_category',array(
        'default' => 'select',
        'sanitize_callback' => 'food_recipe_blog_sanitize_choices',
    ));
    $wp_customize->add_control('smart_tech_blog_popular_articles_category',array(
        'type'    => 'select',
        'choices' => $cat_post,
        'label' => __('Select Category to display Latest Recipes','smart-tech-blog'),
        'section' => 'smart_tech_blog_popular_articles',
    ));
}
add_action('customize_register', 'smart_tech_blog_customize_register');

if ( ! function_exists( 'smart_tech_blog_setup' ) ) :
    /**
     * Sets up theme defaults and registers support for various WordPress features.
     *
     * Note that this function is hooked into the after_setup_theme hook, which
     * runs before the init hook. The init hook is too late for some features, such
     * as indicating support for post thumbnails.
     */
    function smart_tech_blog_setup() {

        add_theme_support( 'responsive-embeds' );

        // Add default posts and comments RSS feed links to head.
        add_theme_support( 'automatic-feed-links' );

        /*
         * Let WordPress manage the document title.
         * By adding theme support, we declare that this theme does not use a
         * hard-coded <title> tag in the document head, and expect WordPress to
         * provide it for us.
         */
        add_theme_support( 'title-tag' );

        /*
         * Enable support for Post Thumbnails on posts and pages.
         *
         * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
         */
        add_theme_support( 'post-thumbnails' );

        add_image_size('smart-tech-blog-featured-header-image', 2000, 660, true);

        /*
         * Switch default core markup for search form, comment form, and comments
         * to output valid HTML5.
         * to output valid HTML5.
         */
        add_theme_support( 'html5', array(
            'search-form',
            'comment-form',
            'comment-list',
            'gallery',
            'caption',
        ) );

        // Set up the WordPress core custom background feature.
        add_theme_support( 'custom-background', apply_filters( 'food_recipe_blog_custom_background_args', array(
            'default-color' => '',
            'default-image' => '',
        ) ) );

        /**
         * Add support for core custom logo.
         *
         * @link https://codex.wordpress.org/Theme_Logo
         */
        add_theme_support( 'custom-logo', array(
            'height'      => 50,
            'width'       => 50,
            'flex-width'  => true,
        ) );

        add_editor_style( array( '/editor-style.css' ) );

        add_theme_support( 'align-wide' );

        add_theme_support( 'wp-block-styles' );
    }
endif;
add_action( 'after_setup_theme', 'smart_tech_blog_setup' );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function smart_tech_blog_widgets_init() {
        register_sidebar( array(
        'name'          => esc_html__( 'Sidebar', 'smart-tech-blog' ),
        'id'            => 'sidebar',
        'description'   => esc_html__( 'Add widgets here.', 'smart-tech-blog' ),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h5 class="widget-title">',
        'after_title'   => '</h5>',
    ) );
}
add_action( 'widgets_init', 'smart_tech_blog_widgets_init' );

function smart_tech_blog_remove_my_action() {
    remove_action( 'admin_menu','food_recipe_blog_themepage' );
    remove_action( 'after_switch_theme','food_recipe_blog_setup_options' );
}
add_action( 'init', 'smart_tech_blog_remove_my_action');

function smart_tech_blog_remove_customize_register() {
    global $wp_customize;
    $wp_customize->remove_section( 'food_recipe_blog_general_settings' );
    $wp_customize->remove_section( 'food_recipe_blog_color_option' );

        $wp_customize->remove_control( 'pro_version_header_setting' );

        $wp_customize->remove_control( 'pro_version_latest_recipes_setting' );

        $wp_customize->remove_control( 'pro_version_footer_setting' );

        $wp_customize->remove_control( 'pro_version_slider_setting' );
}

add_action( 'customize_register', 'smart_tech_blog_remove_customize_register', 11 );