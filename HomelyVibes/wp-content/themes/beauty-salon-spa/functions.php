<?php
/**
 * Beauty Salon Spa functions and definitions
 *
 * @subpackage Beauty Salon Spa
 * @since 1.0
 */

/**
 * Change number or products per row to 3
 */
add_filter('loop_shop_columns', 'beauty_salon_spa_loop_columns', 999);
if (!function_exists('beauty_salon_spa_loop_columns')) {
	function beauty_salon_spa_loop_columns() {
		return 3;
	}
}

function beauty_salon_spa_sanitize_dropdown_pages( $page_id, $setting ) {
	$page_id = absint( $page_id );
	return ( 'publish' == get_post_status( $page_id ) ? $page_id : $setting->default );
}

function beauty_salon_spa_sanitize_checkbox( $input ) {
	return ( ( isset( $input ) && true == $input ) ? true : false );
}

function beauty_salon_spa_sanitize_select( $input, $setting ){
    $input = sanitize_key($input);
    $choices = $setting->manager->get_control( $setting->id )->choices;
    return ( array_key_exists( $input, $choices ) ? $input : $setting->default );
}

function beauty_salon_spa_sanitize_choices( $input, $setting ) {
    global $wp_customize;
    $control = $wp_customize->get_control( $setting->id );
    if ( array_key_exists( $input, $control->choices ) ) {
        return $input;
    } else {
        return $setting->default;
    }
}

function beauty_salon_spa_callback_sanitize_switch( $value ) {
	
	// Switch values must be equal to 1 of off. Off is indicator and should not be translated.
	return ( ( isset( $value ) && $value == 1 ) ? 1 : 'off' );

}


function beauty_salon_spa_sanitize_number_absint( $number, $setting ) {
	// Ensure $number is an absolute integer (whole number, zero or greater).
	$number = absint( $number );

	// If the input is an absolute integer, return it; otherwise, return the default
	return ( $number ? $number : $setting->default );
}

function beauty_salon_spa_sanitize_phone_number( $phone ) {
  return preg_replace( '/[^\d+]/', '', $phone );
}

function beauty_salon_spa_excerpt_more( $link ) {
	if ( is_admin() ) {
		return $link;
	}

	$link = sprintf(
		'<div class="link-more text-center"><a href="%1$s" class="more-link py-2 px-4">%2$s</a></div>',
		esc_url( get_permalink( get_the_ID() ) ),
		/* translators: %s: Name of current post */
		sprintf( __( 'Read More<span class="screen-reader-text"> "%s"</span>', 'beauty-salon-spa' ), get_the_title( get_the_ID() ) )
	);
	return ' &hellip; ' . $link;
}
add_filter( 'excerpt_more', 'beauty_salon_spa_excerpt_more' );

function beauty_salon_spa_notice(){
    global $pagenow;
    if ( is_admin() && ('themes.php' == $pagenow) && isset( $_GET['activated'] ) ) {
   		wp_safe_redirect( admin_url("themes.php?page=beauty-salon-spa-guide-page") );
   	}
}
add_action('after_setup_theme', 'beauty_salon_spa_notice');

function beauty_salon_spa_add_new_page() {
    $edit_page = admin_url().'post-new.php?post_type=page';
    echo json_encode(['page_id'=>'','edit_page_url'=> $edit_page ]);

    exit;
}
add_action( 'wp_ajax_beauty_salon_spa_add_new_page','beauty_salon_spa_add_new_page' );

function beauty_salon_spa_setup() {
	add_theme_support( 'woocommerce' );
	add_theme_support( "align-wide" );
	add_theme_support( "wp-block-styles" );
	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'post-thumbnails' );
	add_theme_support( "responsive-embeds" );
	add_theme_support( 'title-tag' );
	add_theme_support('custom-background',array(
		'default-color' => 'ffffff',
	));
	add_image_size( 'beauty-salon-spa-featured-image', 2000, 1200, true );
	add_image_size( 'beauty-salon-spa-thumbnail-avatar', 100, 100, true );

	$GLOBALS['content_width'] = 525;
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'beauty-salon-spa' ),
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

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );

	/*
	 * This theme styles the visual editor to resemble the theme style,
	 * specifically font, colors, and column width.
 	 */
	add_editor_style( array( 'assets/css/editor-style.css', beauty_salon_spa_fonts_url() ) );
}
add_action( 'after_setup_theme', 'beauty_salon_spa_setup' );

function beauty_salon_spa_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Sidebar', 'beauty-salon-spa' ),
		'id'            => 'sidebar-1',
		'description'   => __( 'Add widgets here to appear in your sidebar on blog posts and archive pages.', 'beauty-salon-spa' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<div class="widget_container"><h3 class="widget-title">',
		'after_title'   => '</h3></div>',
	) );

	register_sidebar( array(
		'name'          => __( 'Page Sidebar', 'beauty-salon-spa' ),
		'id'            => 'sidebar-2',
		'description'   => __( 'Add widgets here to appear in your pages and posts', 'beauty-salon-spa' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<div class="widget_container"><h3 class="widget-title">',
		'after_title'   => '</h3></div>',
	) );

	register_sidebar( array(
		'name'          => __( 'Footer 1', 'beauty-salon-spa' ),
		'id'            => 'footer-1',
		'description'   => __( 'Add widgets here to appear in your footer.', 'beauty-salon-spa' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => __( 'Footer 2', 'beauty-salon-spa' ),
		'id'            => 'footer-2',
		'description'   => __( 'Add widgets here to appear in your footer.', 'beauty-salon-spa' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => __( 'Footer 3', 'beauty-salon-spa' ),
		'id'            => 'footer-3',
		'description'   => __( 'Add widgets here to appear in your footer.', 'beauty-salon-spa' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => __( 'Footer 4', 'beauty-salon-spa' ),
		'id'            => 'footer-4',
		'description'   => __( 'Add widgets here to appear in your footer.', 'beauty-salon-spa' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
}
add_action( 'widgets_init', 'beauty_salon_spa_widgets_init' );

function beauty_salon_spa_fonts_url(){
	$font_url = '';
	$font_family = array();
	$font_family[] = 'Playfair Display:ital,wght@0,400;0,500;0,600;0,700;0,800;0,900;1,400;1,500;1,600;1,700;1,800;1,900';
	$font_family[] = 'Jost:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900';
	$font_family[] = 'Raleway:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900';
	$beauty_salon_spa_query_args = array(
		'family'	=> rawurlencode(implode('|',$font_family)),
	);
	$font_url = add_query_arg($beauty_salon_spa_query_args,'//fonts.googleapis.com/css');
	return $font_url;
}

//Enqueue scripts and styles.
function beauty_salon_spa_scripts() {

	// Add custom fonts, used in the main stylesheet.
	wp_enqueue_style( 'beauty-salon-spa-fonts', beauty_salon_spa_fonts_url(), array() );

	//Bootstarp
	wp_enqueue_style( 'bootstrap-style', get_template_directory_uri().'/assets/css/bootstrap.css' );

	// Theme stylesheet.
	wp_enqueue_style( 'beauty-salon-spa-style', get_stylesheet_uri() );

	wp_style_add_data('modern-ecommerce-style', 'rtl', 'replace');

	// Theme Customize CSS.
	require get_parent_theme_file_path( 'inc/extra_customization.php' );
	wp_add_inline_style( 'beauty-salon-spa-style',$beauty_salon_spa_custom_style );

	//font-awesome
	wp_enqueue_style( 'font-awesome-style', get_template_directory_uri().'/assets/css/fontawesome-all.css' );

	//owl-carousel
	wp_enqueue_style( 'owl-carousel-style', get_template_directory_uri().'/assets/css/owl.carousel.css' );

	// Block Style
	wp_enqueue_style( 'beauty-salon-spa-block-style',get_template_directory_uri().'/assets/css/blocks.css' );

	//Custom JS
	wp_enqueue_script( 'beauty-salon-spa-custom.js', get_theme_file_uri( '/assets/js/theme-script.js' ), array( 'jquery' ), true );

	//Nav Focus JS
	wp_enqueue_script( 'beauty-salon-spa-navigation-focus', get_theme_file_uri( '/assets/js/navigation-focus.js' ), array( 'jquery' ), true );

	//Superfish JS
	wp_enqueue_script( 'superfish-js', get_theme_file_uri( '/assets/js/jquery.superfish.js' ), array( 'jquery' ),true );

	//Bootstarp JS
	wp_enqueue_script( 'bootstrap-js', get_theme_file_uri( '/assets/js/bootstrap.js' ), array( 'jquery' ),true );

	//Owl-carousel JS
	wp_enqueue_script( 'owl-carousel-js', get_theme_file_uri( '/assets/js/owl.carousel.js' ), array( 'jquery' ),true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'beauty_salon_spa_scripts' );

function beauty_salon_spa_fonts_scripts() {
	$beauty_salon_spa_headings_font = esc_html(get_theme_mod('beauty_salon_spa_headings_text'));
	$beauty_salon_spa_body_font = esc_html(get_theme_mod('beauty_salon_spa_body_text'));

	if( $beauty_salon_spa_headings_font ) {
		wp_enqueue_style( 'beauty-salon-spa-headings-fonts', '//fonts.googleapis.com/css?family='. $beauty_salon_spa_headings_font );
	} else {
		wp_enqueue_style( 'beauty-salon-spa-playfair-sans', '//fonts.googleapis.com/css?family=Playfair Display:ital,wght@0,400;0,500;0,600;0,700;0,800;0,900;1,400;1,500;1,600;1,700;1,800;1,900');
	}
	if( $beauty_salon_spa_body_font ) {
		wp_enqueue_style( 'beauty-salon-spa-body-fonts', '//fonts.googleapis.com/css?family='. $beauty_salon_spa_body_font );
	} else {
		wp_enqueue_style( 'beauty-salon-spa-jost-body', '//fonts.googleapis.com/css?family=Jost:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900');
	}
}
add_action( 'wp_enqueue_scripts', 'beauty_salon_spa_fonts_scripts' );

function beauty_salon_spa_enqueue_admin_script( $hook ) {

	// Admin JS
	wp_enqueue_script( 'beauty-salon-spa-admin.js', get_theme_file_uri( '/assets/js/beauty-salon-spa-admin.js' ), array( 'jquery' ), true );

	wp_localize_script('beauty-salon-spa-admin.js', 'beauty_salon_spa_scripts_localize',
        array(
            'ajax_url' => esc_url(admin_url('admin-ajax.php'))
        )
    );
}
add_action( 'admin_enqueue_scripts', 'beauty_salon_spa_enqueue_admin_script' );

// Enqueue editor styles for Gutenberg
function beauty_salon_spa_block_editor_styles() {
	// Block styles.
	wp_enqueue_style( 'beauty-salon-spa-block-editor-style', trailingslashit( esc_url ( get_template_directory_uri() ) ) . '/assets/css/editor-blocks.css' );

	// Add custom fonts.
	wp_enqueue_style( 'beauty-salon-spa-fonts', beauty_salon_spa_fonts_url(), array() );
}
add_action( 'enqueue_block_editor_assets', 'beauty_salon_spa_block_editor_styles' );

function beauty_salon_spa_front_page_template( $template ) {
	return is_home() ? '' : $template;
}
add_filter( 'frontpage_template',  'beauty_salon_spa_front_page_template' );

require get_parent_theme_file_path( '/inc/custom-header.php' );

require get_parent_theme_file_path( '/inc/template-tags.php' );

require get_parent_theme_file_path( '/inc/template-functions.php' );

require get_parent_theme_file_path( '/inc/customizer.php' );

require get_parent_theme_file_path( '/inc/dashboard/dashboard.php' );

require get_parent_theme_file_path( '/inc/typofont.php' );

require get_parent_theme_file_path('/inc/wptt-webfont-loader.php' );

# Load scripts and styles.(fontawesome)
add_action( 'customize_controls_enqueue_scripts', 'beauty_salon_customize_controls_register_scripts' );

function beauty_salon_customize_controls_register_scripts() {
	
	wp_enqueue_style( 'beauty-salon-ctypo-customize-controls-style', trailingslashit( esc_url(get_template_directory_uri()) ) . '/assets/css/customize-controls.css' );
}