<?php
/**
 * Theme functions and definitions
 *
 * @package barbershop_nail_salon
 */

if ( ! function_exists( 'barbershop_nail_salon_enqueue_styles' ) ) :
	/**
	 * Load assets.
	 *
	 * @since 1.0.0
	 */
	function barbershop_nail_salon_enqueue_styles() {
		wp_enqueue_style( 'beauty-salon-spa-style-parent', get_template_directory_uri() . '/style.css' );
		wp_enqueue_style( 'barbershop-nail-salon-style', get_stylesheet_directory_uri() . '/style.css', array( 'beauty-salon-spa-style-parent' ), '1.0.0' );
		// Theme Customize CSS.
		require get_parent_theme_file_path( 'inc/extra_customization.php' );
		wp_add_inline_style( 'barbershop-nail-salon-style',$beauty_salon_spa_custom_style );
	}
endif;
add_action( 'wp_enqueue_scripts', 'barbershop_nail_salon_enqueue_styles', 99 );

function barbershop_nail_salon_setup() {
	add_theme_support( 'align-wide' );
	add_theme_support( 'automatic-feed-links' );
	add_theme_support( "responsive-embeds" );
	add_theme_support( "wp-block-styles" );
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'title-tag' );
	add_theme_support('custom-background',array(
		'default-color' => 'ffffff',
	));
	add_image_size( 'barbershop-nail-salon-featured-image', 2000, 1200, true );
	add_image_size( 'barbershop-nail-salon-thumbnail-avatar', 100, 100, true );

	$GLOBALS['content_width'] = 525;
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'barbershop-nail-salon' ),
	) );

	add_theme_support( 'html5', array(
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

	// Add theme support for Custom Logo.
	add_theme_support( 'custom-logo', array(
		'width'       => 250,
		'height'      => 250,
		'flex-width'  => true,
	) );

	/*
	* This theme styles the visual editor to resemble the theme style,
	* specifically font, colors, and column width.
	*/
	add_editor_style( array( 'assets/css/editor-style.css', beauty_salon_spa_fonts_url() ) );
}
add_action( 'after_setup_theme', 'barbershop_nail_salon_setup' );

function barbershop_nail_salon_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Sidebar', 'barbershop-nail-salon' ),
		'id'            => 'sidebar-1',
		'description'   => __( 'Add widgets here to appear in your sidebar on blog posts and archive pages.', 'barbershop-nail-salon' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<div class="widget_container"><h3 class="widget-title">',
		'after_title'   => '</h3></div>',
	) );

	register_sidebar( array(
		'name'          => __( 'Page Sidebar', 'barbershop-nail-salon' ),
		'id'            => 'sidebar-2',
		'description'   => __( 'Add widgets here to appear in your pages and posts', 'barbershop-nail-salon' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<div class="widget_container"><h3 class="widget-title">',
		'after_title'   => '</h3></div>',
	) );

	register_sidebar( array(
		'name'          => __( 'Footer 1', 'barbershop-nail-salon' ),
		'id'            => 'footer-1',
		'description'   => __( 'Add widgets here to appear in your footer.', 'barbershop-nail-salon' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => __( 'Footer 2', 'barbershop-nail-salon' ),
		'id'            => 'footer-2',
		'description'   => __( 'Add widgets here to appear in your footer.', 'barbershop-nail-salon' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => __( 'Footer 3', 'barbershop-nail-salon' ),
		'id'            => 'footer-3',
		'description'   => __( 'Add widgets here to appear in your footer.', 'barbershop-nail-salon' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => __( 'Footer 4', 'barbershop-nail-salon' ),
		'id'            => 'footer-4',
		'description'   => __( 'Add widgets here to appear in your footer.', 'barbershop-nail-salon' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => __( 'Product Category Dropdown', 'barbershop-nail-salon' ),
		'id'            => 'product-cat',
		'description'   => __( 'Add widgets here to appear in your header.', 'barbershop-nail-salon' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
}
add_action( 'widgets_init', 'barbershop_nail_salon_widgets_init' );

function barbershop_nail_salon_customize_register() {
  	global $wp_customize;
	$wp_customize->remove_section( 'beauty_salon_spa_pro' );
}
add_action( 'customize_register', 'barbershop_nail_salon_customize_register', 11 );

function barbershop_nail_salon_customize( $wp_customize ) {

	wp_enqueue_style('customizercustom_css',get_stylesheet_directory_uri(). '/assets/css/customizer.css');

	$wp_customize->add_section('barbershop_nail_salon_pro', array(
		'title'    => __('UPGRADE NAIL SALON PREMIUM', 'barbershop-nail-salon'),
		'priority' => 1,
	));

	$wp_customize->add_setting('barbershop_nail_salon_pro', array(
		'default'           => null,
		'sanitize_callback' => 'sanitize_text_field',
	));
	$wp_customize->add_control(new Barbershop_Nail_Salon_Pro_Control($wp_customize, 'barbershop_nail_salon_pro', array(
		'label'    => __('NAIL SALON PREMIUM', 'barbershop-nail-salon'),
		'section'  => 'barbershop_nail_salon_pro',
		'settings' => 'barbershop_nail_salon_pro',
		'priority' => 1,
	)));

}
add_action( 'customize_register', 'barbershop_nail_salon_customize' );

function barbershop_nail_salon_enqueue_comments_reply() {
  if( is_singular() && comments_open() && ( get_option( 'thread_comments' ) == 1) ) {
    // Load comment-reply.js (into footer)
    wp_enqueue_script( 'comment-reply', '/wp-includes/js/comment-reply.min.js', array(), false, true );
  }
}
add_action(  'wp_enqueue_scripts', 'barbershop_nail_salon_enqueue_comments_reply' );

if ( ! defined( 'BARBERSHOP_NAIL_SALON_PRO_LINK' ) ) {
	define('BARBERSHOP_NAIL_SALON_PRO_LINK',__('https://www.ovationthemes.com/wordpress/nail-salon-wordpress-theme/','barbershop-nail-salon'));
}
if ( ! defined( 'BEAUTY_SALON_SPA_SUPPORT' ) ) {
	define('BEAUTY_SALON_SPA_SUPPORT',__('https://wordpress.org/support/theme/barbershop-nail-salon','barbershop-nail-salon'));
}
if ( ! defined( 'BEAUTY_SALON_SPA_REVIEW' ) ) {
	define('BEAUTY_SALON_SPA_REVIEW',__('https://wordpress.org/support/theme/barbershop-nail-salon/reviews/#new-post','barbershop-nail-salon'));
}
if ( ! defined( 'BEAUTY_SALON_SPA_LIVE_DEMO' ) ) {
define('BEAUTY_SALON_SPA_LIVE_DEMO',__('https://www.ovationthemes.com/demos/barbershop-nail-salon/','barbershop-nail-salon'));
}
if ( ! defined( 'BEAUTY_SALON_SPA_BUY_PRO' ) ) {
define('BEAUTY_SALON_SPA_BUY_PRO',__('https://www.ovationthemes.com/wordpress/nail-salon-wordpress-theme/','barbershop-nail-salon'));
}
if ( ! defined( 'BEAUTY_SALON_SPA_PRO_DOC' ) ) {
define('BEAUTY_SALON_SPA_PRO_DOC',__('https://www.ovationthemes.com/docs/ot-barbershop-nail-salon-pro-doc','barbershop-nail-salon'));
}
if ( ! defined( 'BEAUTY_SALON_SPA_THEME_NAME' ) ) {
define('BEAUTY_SALON_SPA_THEME_NAME',__('Premium Barbershop Theme','barbershop-nail-salon'));
}

/* Pro control */
if (class_exists('WP_Customize_Control') && !class_exists('Barbershop_Nail_Salon_Pro_Control')):
    class Barbershop_Nail_Salon_Pro_Control extends WP_Customize_Control{

    public function render_content(){?>
        <label style="overflow: hidden; zoom: 1;">
            <div class="col-md upsell-btn">
                <a href="<?php echo esc_url( BARBERSHOP_NAIL_SALON_PRO_LINK ); ?>" target="blank" class="btn btn-success btn"><?php esc_html_e('UPGRADE NAIL SALON PREMIUM','barbershop-nail-salon');?> </a>
            </div>
            <div class="col-md">
                <img class="barbershop_nail_salon_img_responsive " src="<?php echo esc_url( get_stylesheet_directory_uri() ); ?>/screenshot.png">
            </div>
            <div class="col-md">
                <h3 style="margin-top:10px; margin-left: 20px; text-decoration:underline; color:#333;"><?php esc_html_e('NAIL SALON PREMIUM - Features', 'barbershop-nail-salon'); ?></h3>
                <ul style="padding-top:10px">
                    <li class="upsell-barbershop_nail_salon"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Responsive Design', 'barbershop-nail-salon');?> </li>
                    <li class="upsell-barbershop_nail_salon"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Boxed or fullwidth layout', 'barbershop-nail-salon');?> </li>
                    <li class="upsell-barbershop_nail_salon"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Shortcode Support', 'barbershop-nail-salon');?> </li>
                    <li class="upsell-barbershop_nail_salon"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Demo Importer', 'barbershop-nail-salon');?> </li>
                    <li class="upsell-barbershop_nail_salon"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Section Reordering', 'barbershop-nail-salon');?> </li>
                    <li class="upsell-barbershop_nail_salon"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Contact Page Template', 'barbershop-nail-salon');?> </li>
                    <li class="upsell-barbershop_nail_salon"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Multiple Blog Layouts', 'barbershop-nail-salon');?> </li>
                    <li class="upsell-barbershop_nail_salon"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Unlimited Color Options', 'barbershop-nail-salon');?> </li>
                    <li class="upsell-barbershop_nail_salon"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Designed with HTML5 and CSS3', 'barbershop-nail-salon');?> </li>
                    <li class="upsell-barbershop_nail_salon"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Customizable Design & Code', 'barbershop-nail-salon');?> </li>
                    <li class="upsell-barbershop_nail_salon"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Cross Browser Support', 'barbershop-nail-salon');?> </li>
                    <li class="upsell-barbershop_nail_salon"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Detailed Documentation Included', 'barbershop-nail-salon');?> </li>
                    <li class="upsell-barbershop_nail_salon"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Stylish Custom Widgets', 'barbershop-nail-salon');?> </li>
                    <li class="upsell-barbershop_nail_salon"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Patterns Background', 'barbershop-nail-salon');?> </li>
                    <li class="upsell-barbershop_nail_salon"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('WPML Compatible (Translation Ready)', 'barbershop-nail-salon');?> </li>
                    <li class="upsell-barbershop_nail_salon"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Woo-commerce Compatible', 'barbershop-nail-salon');?> </li>
                    <li class="upsell-barbershop_nail_salon"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Full Support', 'barbershop-nail-salon');?> </li>
                    <li class="upsell-barbershop_nail_salon"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('10+ Sections', 'barbershop-nail-salon');?> </li>
                    <li class="upsell-barbershop_nail_salon"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Live Customizer', 'barbershop-nail-salon');?> </li>
                    <li class="upsell-barbershop_nail_salon"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('AMP Ready', 'barbershop-nail-salon');?> </li>
                    <li class="upsell-barbershop_nail_salon"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Clean Code', 'barbershop-nail-salon');?> </li>
                    <li class="upsell-barbershop_nail_salon"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('SEO Friendly', 'barbershop-nail-salon');?> </li>
                    <li class="upsell-barbershop_nail_salon"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Supper Fast', 'barbershop-nail-salon');?> </li>
                </ul>
            </div>
            <div class="col-md upsell-btn upsell-btn-bottom">
                <a href="<?php echo esc_url( BARBERSHOP_NAIL_SALON_PRO_LINK ); ?>" target="blank" class="btn btn-success btn"><?php esc_html_e('UPGRADE NAIL SALON PREMIUM','barbershop-nail-salon');?> </a>
            </div>
        </label>
    <?php } }
endif;
