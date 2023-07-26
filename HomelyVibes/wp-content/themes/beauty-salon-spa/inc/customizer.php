<?php
/**
 * Beauty Salon Spa: Customizer
 *
 * @subpackage Beauty Salon Spa
 * @since 1.0
 */

function beauty_salon_spa_customize_register( $wp_customize ) {

	wp_enqueue_style('customizercustom_css', esc_url( get_template_directory_uri() ). '/assets/css/customizer.css');

	// fontawesome icon-picker

	load_template( trailingslashit( get_template_directory() ) . '/inc/icon-picker.php' );

	// Add custom control.

  	require get_parent_theme_file_path( 'inc/switch/control_switch.php' );

	$wp_customize->add_section( 'beauty_salon_spa_typography_settings', array(
		'title'       => __( 'Typography', 'beauty-salon-spa' ),
		'priority'       => 2,
	) );

	$font_choices = array(
			'' => 'Select',
			'Source Sans Pro:400,700,400italic,700italic' => 'Source Sans Pro',
			'Open Sans:400italic,700italic,400,700' => 'Open Sans',
			'Oswald:400,700' => 'Oswald',
			'Playfair Display:400,700,400italic' => 'Playfair Display',
			'Montserrat:400,700' => 'Montserrat',
			'Raleway:400,700' => 'Raleway',
			'Droid Sans:400,700' => 'Droid Sans',
			'Lato:400,700,400italic,700italic' => 'Lato',
			'Arvo:400,700,400italic,700italic' => 'Arvo',
			'Lora:400,700,400italic,700italic' => 'Lora',
			'Merriweather:400,300italic,300,400italic,700,700italic' => 'Merriweather',
			'Oxygen:400,300,700' => 'Oxygen',
			'PT Serif:400,700' => 'PT Serif',
			'PT Sans:400,700,400italic,700italic' => 'PT Sans',
			'PT Sans Narrow:400,700' => 'PT Sans Narrow',
			'Cabin:400,700,400italic' => 'Cabin',
			'Fjalla One:400' => 'Fjalla One',
			'Francois One:400' => 'Francois One',
			'Josefin Sans:400,300,600,700' => 'Josefin Sans',
			'Libre Baskerville:400,400italic,700' => 'Libre Baskerville',
			'Arimo:400,700,400italic,700italic' => 'Arimo',
			'Ubuntu:400,700,400italic,700italic' => 'Ubuntu',
			'Bitter:400,700,400italic' => 'Bitter',
			'Droid Serif:400,700,400italic,700italic' => 'Droid Serif',
			'Roboto:400,400italic,700,700italic' => 'Roboto',
			'Open Sans Condensed:700,300italic,300' => 'Open Sans Condensed',
			'Roboto Condensed:400italic,700italic,400,700' => 'Roboto Condensed',
			'Roboto Slab:400,700' => 'Roboto Slab',
			'Yanone Kaffeesatz:400,700' => 'Yanone Kaffeesatz',
			'Rokkitt:400' => 'Rokkitt',
		);

	$wp_customize->add_setting( 'beauty_salon_spa_section_typo_heading', array(
			'default'           => '',
			'transport'         => 'refresh',
			'sanitize_callback' => 'sanitize_text_field',
		) );
		$wp_customize->add_control( new Beauty_Salon_Spa_Customizer_Customcontrol_Section_Heading( $wp_customize, 'beauty_salon_spa_section_typo_heading', array(
			'label'       => esc_html__( 'Typography Settings', 'beauty-salon-spa' ),
			'section'     => 'beauty_salon_spa_typography_settings',
			'settings'    => 'beauty_salon_spa_section_typo_heading',
		) ) );

	$wp_customize->add_setting( 'beauty_salon_spa_headings_text', array(
		'sanitize_callback' => 'beauty_salon_spa_sanitize_fonts',
	));
	$wp_customize->add_control( 'beauty_salon_spa_headings_text', array(
		'type' => 'select',
		'description' => __('Select your suitable font for the headings.', 'beauty-salon-spa'),
		'section' => 'beauty_salon_spa_typography_settings',
		'choices' => $font_choices
	));

	$wp_customize->add_setting( 'beauty_salon_spa_headings_text', array(
		'sanitize_callback' => 'beauty_salon_spa_sanitize_fonts',
	));

	$wp_customize->add_control( 'beauty_salon_spa_headings_text', array(
		'type' => 'select',
		'description' => __('Select your suitable font for the headings.', 'beauty-salon-spa'),
		'section' => 'beauty_salon_spa_typography_settings',
		'choices' => $font_choices
	));

	$wp_customize->add_setting( 'beauty_salon_spa_body_text', array(
		'sanitize_callback' => 'beauty_salon_spa_sanitize_fonts'
	));

	$wp_customize->add_control( 'beauty_salon_spa_body_text', array(
		'type' => 'select',
		'description' => __( 'Select your suitable font for the body.', 'beauty-salon-spa' ),
		'section' => 'beauty_salon_spa_typography_settings',
		'choices' => $font_choices
	) );

 	$wp_customize->add_section('beauty_salon_spa_pro', array(
        'title'    => __('UPGRADE BEAUTY SALON PREMIUM', 'beauty-salon-spa'),
        'priority' => 1,
    ));

    $wp_customize->add_setting('beauty_salon_spa_pro', array(
        'default'           => null,
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control(new Beauty_Salon_Spa_Pro_Control($wp_customize, 'beauty_salon_spa_pro', array(
        'label'    => __('BEAUTY SALON SPA PREMIUM', 'beauty-salon-spa'),
        'section'  => 'beauty_salon_spa_pro',
        'settings' => 'beauty_salon_spa_pro',
        'priority' => 1,
    )));

    //Logo
    $wp_customize->add_setting('beauty_salon_spa_logo_max_height',array(
		'default'	=> '',
		'sanitize_callback'	=> 'beauty_salon_spa_sanitize_number_absint'
	));
	$wp_customize->add_control('beauty_salon_spa_logo_max_height',array(
		'label'	=> esc_html__('Logo Width','beauty-salon-spa'),
		'section'	=> 'title_tagline',
		'type'		=> 'number'
	));

	$wp_customize->add_setting('beauty_salon_spa_logo_title',
		array(
			'type'                 => 'option',
			'capability'           => 'edit_theme_options',
			'theme_supports'       => '',
			'default'              => '1',
			'transport'            => 'refresh',
			'sanitize_callback'    => 'beauty_salon_spa_callback_sanitize_switch',
		)
	);
	$wp_customize->add_control(new Beauty_Salon_Spa_Customizer_Customcontrol_Switch(
			$wp_customize,
			'beauty_salon_spa_logo_title',
			array(
				'settings'        => 'beauty_salon_spa_logo_title',
				'section'         => 'title_tagline',
				'label'           => __( 'Show Site Title', 'beauty-salon-spa' ),				
				'choices'		  => array(
					'1'      => __( 'On', 'beauty-salon-spa' ),
					'off'    => __( 'Off', 'beauty-salon-spa' ),
				),
				'active_callback' => '',
			)
		)
	);

	$wp_customize->add_setting('beauty_salon_spa_logo_text',
		array(
			'type'                 => 'option',
			'capability'           => 'edit_theme_options',
			'theme_supports'       => '',
			'default'              => '1',
			'transport'            => 'refresh',
			'sanitize_callback'    => 'beauty_salon_spa_callback_sanitize_switch',
		)
	);
	$wp_customize->add_control(new Beauty_Salon_Spa_Customizer_Customcontrol_Switch(
			$wp_customize,
			'beauty_salon_spa_logo_text',
			array(
				'settings'        => 'beauty_salon_spa_logo_text',
				'section'         => 'title_tagline',
				'label'           => __( 'Show Site Tagline', 'beauty-salon-spa' ),				
				'choices'		  => array(
					'1'      => __( 'On', 'beauty-salon-spa' ),
					'off'    => __( 'Off', 'beauty-salon-spa' ),
				),
				'active_callback' => '',
			)
		)
	);

    // Theme General Settings
    $wp_customize->add_section('beauty_salon_spa_theme_settings',array(
        'title' => __('Theme General Settings', 'beauty-salon-spa'),
        'priority' => 1
    ) );
    $wp_customize->add_setting(
		'beauty_salon_spa_sticky_header',
		array(
			'type'                 => 'option',
			'capability'           => 'edit_theme_options',
			'theme_supports'       => '',
			'default'              => '1',
			'transport'            => 'refresh',
			'sanitize_callback'    => 'beauty_salon_spa_callback_sanitize_switch',
		)
	);
	$wp_customize->add_control(
		new Beauty_Salon_Spa_Customizer_Customcontrol_Switch(
			$wp_customize,
			'beauty_salon_spa_sticky_header',
			array(
				'settings'        => 'beauty_salon_spa_sticky_header',
				'section'         => 'beauty_salon_spa_theme_settings',
				'label'           => __( 'Show Sticky Header', 'beauty-salon-spa' ),				
				'choices'		  => array(
					'1'      => __( 'On', 'beauty-salon-spa' ),
					'off'    => __( 'Off', 'beauty-salon-spa' ),
				),
				'active_callback' => '',
			)
		)
	);

	$wp_customize->add_setting(
		'beauty_salon_spa_theme_loader',
		array(
			'type'                 => 'option',
			'capability'           => 'edit_theme_options',
			'theme_supports'       => '',
			'default'              => '',
			'transport'            => 'refresh',
			'sanitize_callback'    => 'beauty_salon_spa_callback_sanitize_switch',
		)
	);
	$wp_customize->add_control(
		new Beauty_Salon_Spa_Customizer_Customcontrol_Switch(
			$wp_customize,
			'beauty_salon_spa_theme_loader',
			array(
				'settings'        => 'beauty_salon_spa_theme_loader',
				'section'         => 'beauty_salon_spa_theme_settings',
				'label'           => __( 'Show Site Loader', 'beauty-salon-spa' ),				
				'choices'		  => array(
					'1'      => __( 'On', 'beauty-salon-spa' ),
					'off'    => __( 'Off', 'beauty-salon-spa' ),
				),
				'active_callback' => '',
			)
		)
	);

	$wp_customize->add_setting('beauty_salon_spa_menu_text_transform',array(
        'default' => 'CAPITALISE',
        'sanitize_callback' => 'beauty_salon_spa_sanitize_choices'
	));
	$wp_customize->add_control('beauty_salon_spa_menu_text_transform',array(
        'type' => 'select',
        'label' => __('Menus Text Transform','beauty-salon-spa'),
        'section' => 'beauty_salon_spa_theme_settings',
        'choices' => array(
            'CAPITALISE' => __('CAPITALISE','beauty-salon-spa'),
            'UPPERCASE' => __('UPPERCASE','beauty-salon-spa'),
            'LOWERCASE' => __('LOWERCASE','beauty-salon-spa'),
        ),
	) );

	$wp_customize->add_setting( 'beauty_salon_spa_section_scroll_heading', array(
		'default'           => '',
		'transport'         => 'refresh',
		'sanitize_callback' => 'sanitize_text_field',
	) );
	$wp_customize->add_control( new Beauty_Salon_Spa_Customizer_Customcontrol_Section_Heading( $wp_customize, 'beauty_salon_spa_section_scroll_heading', array(
		'label'       => esc_html__( 'Scroll Top Settings', 'beauty-salon-spa' ),
		'section'     => 'beauty_salon_spa_theme_settings',
		'settings'    => 'beauty_salon_spa_section_scroll_heading',
	) ) );

	$wp_customize->add_setting(
		'beauty_salon_spa_scroll_enable',
		array(
			'type'                 => 'option',
			'capability'           => 'edit_theme_options',
			'theme_supports'       => '',
			'default'              => 'off',
			'transport'            => 'refresh',
			'sanitize_callback'    => 'beauty_salon_spa_callback_sanitize_switch',
		)
	);
	$wp_customize->add_control(
		new Beauty_Salon_Spa_Customizer_Customcontrol_Switch(
			$wp_customize,
			'beauty_salon_spa_scroll_enable',
			array(
				'settings'        => 'beauty_salon_spa_scroll_enable',
				'section'         => 'beauty_salon_spa_theme_settings',
				'label'           => __( 'Hide Scroll Top', 'beauty-salon-spa' ),				
				'choices'		  => array(
					'1'      => __( 'On', 'beauty-salon-spa' ),
					'off'    => __( 'Off', 'beauty-salon-spa' ),
				),
				'active_callback' => '',
			)
		)
	);

	$wp_customize->add_setting('beauty_salon_spa_scroll_options',array(
        'default' => 'right_align',
        'sanitize_callback' => 'beauty_salon_spa_sanitize_choices'
	));
	$wp_customize->add_control('beauty_salon_spa_scroll_options',array(
        'type' => 'select',
        'label' => __('Scroll Top Alignment','beauty-salon-spa'),
        'section' => 'beauty_salon_spa_theme_settings',
        'choices' => array(
            'right_align' => __('Right Align','beauty-salon-spa'),
            'center_align' => __('Center Align','beauty-salon-spa'),
            'left_align' => __('Left Align','beauty-salon-spa'),
        ),
	) );

	$wp_customize->add_setting('beauty_salon_scroll_top_icon',array(
		'default'	=> 'fas fa-chevron-up',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control(new Beauty_Salon_Fontawesome_Icon_Chooser(
        $wp_customize,'beauty_salon_scroll_top_icon',array(
		'label'	=> __('Add Scroll Top Icon','beauty-salon-spa'),
		'transport' => 'refresh',
		'section'	=> 'beauty_salon_spa_theme_settings',
		'setting'	=> 'beauty_salon_scroll_top_icon',
		'type'		=> 'icon'
	)));	

	$wp_customize->add_setting( 'beauty_salon_spa_section_shoppage_heading', array(
		'default'           => '',
		'transport'         => 'refresh',
		'sanitize_callback' => 'sanitize_text_field',
	) );
	$wp_customize->add_control( new Beauty_Salon_Spa_Customizer_Customcontrol_Section_Heading( $wp_customize, 'beauty_salon_spa_section_shoppage_heading', array(
		'label'       => esc_html__( 'Shop Page Settings', 'beauty-salon-spa' ),
		'section'     => 'beauty_salon_spa_theme_settings',
		'settings'    => 'beauty_salon_spa_section_shoppage_heading',
	) ) );

	$wp_customize->add_setting(
		'beauty_salon_spa_shop_page_sidebar',
		array(
			'type'                 => 'option',
			'capability'           => 'edit_theme_options',
			'theme_supports'       => '',
			'default'              => 'off',
			'transport'            => 'refresh',
			'sanitize_callback'    => 'beauty_salon_spa_callback_sanitize_switch',
		)
	);
	$wp_customize->add_control(
		new Beauty_Salon_Spa_Customizer_Customcontrol_Switch(
			$wp_customize,
			'beauty_salon_spa_shop_page_sidebar',
			array(
				'settings'        => 'beauty_salon_spa_shop_page_sidebar',
				'section'         => 'beauty_salon_spa_theme_settings',
				'label'           => __( 'Hide Shop Page Sidebar', 'beauty-salon-spa' ),				
				'choices'		  => array(
					'1'      => __( 'On', 'beauty-salon-spa' ),
					'off'    => __( 'Off', 'beauty-salon-spa' ),
				),
				'active_callback' => '',
			)
		)
	);

	$wp_customize->add_setting(
		'beauty_salon_spa_wocommerce_single_page_sidebar',
		array(
			'type'                 => 'option',
			'capability'           => 'edit_theme_options',
			'theme_supports'       => '',
			'default'              => 'off',
			'transport'            => 'refresh',
			'sanitize_callback'    => 'beauty_salon_spa_callback_sanitize_switch',
		)
	);
	$wp_customize->add_control(
		new Beauty_Salon_Spa_Customizer_Customcontrol_Switch(
			$wp_customize,
			'beauty_salon_spa_wocommerce_single_page_sidebar',
			array(
				'settings'        => 'beauty_salon_spa_wocommerce_single_page_sidebar',
				'section'         => 'beauty_salon_spa_theme_settings',
				'label'           => __( 'Hide Single Product Page Sidebar', 'beauty-salon-spa' ),				
				'choices'		  => array(
					'1'      => __( 'On', 'beauty-salon-spa' ),
					'off'    => __( 'Off', 'beauty-salon-spa' ),
				),
				'active_callback' => '',
			)
		)
	);

    //theme width

	$wp_customize->add_section('beauty_salon_spa_theme_width_settings',array(
        'title' => __('Theme Width Option', 'beauty-salon-spa'),
        'priority' => 1,
    ) );

	$wp_customize->add_setting('beauty_salon_spa_width_options',array(
        'default' => 'full_width',
        'sanitize_callback' => 'beauty_salon_spa_sanitize_choices'
	));
	$wp_customize->add_control('beauty_salon_spa_width_options',array(
        'type' => 'select',
        'label' => __('Theme Width Option','beauty-salon-spa'),
        'section' => 'beauty_salon_spa_theme_width_settings',
        'choices' => array(
            'full_width' => __('Fullwidth','beauty-salon-spa'),
            'Container' => __('Container','beauty-salon-spa'),
            'container_fluid' => __('Container Fluid','beauty-salon-spa'),
        ),
	) );

	// Post Layouts
    $wp_customize->add_section('beauty_salon_spa_layout',array(
        'title' => __('Post Layout', 'beauty-salon-spa'),
        'priority'=> '1',
        
    ) );

    $wp_customize->add_setting( 'beauty_salon_spa_section_post_heading', array(
		'default'           => '',
		'transport'         => 'refresh',
		'sanitize_callback' => 'sanitize_text_field',
	) );
	$wp_customize->add_control( new Beauty_Salon_Spa_Customizer_Customcontrol_Section_Heading( $wp_customize, 'beauty_salon_spa_section_post_heading', array(
		'label'       => esc_html__( 'Post Structure', 'beauty-salon-spa' ),
		 'description' => __( 'Change the post layout from below options', 'beauty-salon-spa' ),
		'section'     => 'beauty_salon_spa_layout',
		'settings'    => 'beauty_salon_spa_section_post_heading',
	) ) );

	$wp_customize->add_setting(
		'beauty_salon_spa_post_sidebar',
		array(
			'type'                 => 'option',
			'capability'           => 'edit_theme_options',
			'theme_supports'       => '',
			'default'              => '',
			'transport'            => 'refresh',
			'sanitize_callback'    => 'beauty_salon_spa_callback_sanitize_switch',
		)
	);
	$wp_customize->add_control(
		new Beauty_Salon_Spa_Customizer_Customcontrol_Switch(
			$wp_customize,
			'beauty_salon_spa_post_sidebar',
			array(
				'settings'        => 'beauty_salon_spa_post_sidebar',
				'section'         => 'beauty_salon_spa_layout',
				'label'           => __( 'Show Fullwidth', 'beauty-salon-spa' ),				
				'choices'		  => array(
					'1'      => __( 'On', 'beauty-salon-spa' ),
					'off'    => __( 'Off', 'beauty-salon-spa' ),
				),
				'active_callback' => '',
			)
		)
	);

	$wp_customize->add_setting(
		'beauty_salon_spa_single_post_sidebar',
		array(
			'type'                 => 'option',
			'capability'           => 'edit_theme_options',
			'theme_supports'       => '',
			'default'              => '',
			'transport'            => 'refresh',
			'sanitize_callback'    => 'beauty_salon_spa_callback_sanitize_switch',
		)
	);
	$wp_customize->add_control(
		new Beauty_Salon_Spa_Customizer_Customcontrol_Switch(
			$wp_customize,
			'beauty_salon_spa_single_post_sidebar',
			array(
				'settings'        => 'beauty_salon_spa_single_post_sidebar',
				'section'         => 'beauty_salon_spa_layout',
				'label'           => __( 'Show Single Post Fullwidth', 'beauty-salon-spa' ),				
				'choices'		  => array(
					'1'      => __( 'On', 'beauty-salon-spa' ),
					'off'    => __( 'Off', 'beauty-salon-spa' ),
				),
				'active_callback' => '',
			)
		)
	);

    $wp_customize->add_setting('beauty_salon_spa_post_option',array(
		'default' => 'simple_post',
		'sanitize_callback' => 'beauty_salon_spa_sanitize_select'
	));
	$wp_customize->add_control('beauty_salon_spa_post_option',array(
		'label' => esc_html__('Select Layout','beauty-salon-spa'),
		'section' => 'beauty_salon_spa_layout',
		'setting' => 'beauty_salon_spa_post_option',
		'type' => 'radio',
        'choices' => array(
            'simple_post' => __('Simple Post','beauty-salon-spa'),
            'grid_post' => __('Grid Post','beauty-salon-spa'),
        ),
	));

    $wp_customize->add_setting('beauty_salon_spa_grid_column',array(
		'default' => '3_column',
		'sanitize_callback' => 'beauty_salon_spa_sanitize_select'
	));
	$wp_customize->add_control('beauty_salon_spa_grid_column',array(
		'label' => esc_html__('Grid Post Per Row','beauty-salon-spa'),
		'section' => 'beauty_salon_spa_layout',
		'setting' => 'beauty_salon_spa_grid_column',
		'type' => 'radio',
        'choices' => array(
            '1_column' => __('1','beauty-salon-spa'),
            '2_column' => __('2','beauty-salon-spa'),
            '3_column' => __('3','beauty-salon-spa'),
            '4_column' => __('4','beauty-salon-spa'),
            '5_column' => __('6','beauty-salon-spa'),
        ),
	));

	$wp_customize->add_setting('beauty_salon_spa_date',
		array(
			'type'                 => 'option',
			'capability'           => 'edit_theme_options',
			'theme_supports'       => '',
			'default'              => 'off',
			'transport'            => 'refresh',
			'sanitize_callback'    => 'beauty_salon_spa_callback_sanitize_switch',
		)
	);
	$wp_customize->add_control(new Beauty_Salon_Spa_Customizer_Customcontrol_Switch(
			$wp_customize,
			'beauty_salon_spa_date',
			array(
				'settings'        => 'beauty_salon_spa_date',
				'section'         => 'beauty_salon_spa_layout',
				'label'           => __( 'Hide Date', 'beauty-salon-spa' ),				
				'choices'		  => array(
					'1'      => __( 'On', 'beauty-salon-spa' ),
					'off'    => __( 'Off', 'beauty-salon-spa' ),
				),
				'active_callback' => '',
			)
		)
	);

	$wp_customize->selective_refresh->add_partial( 'beauty_salon_spa_date', array(
		'selector' => '.date-box',
		'render_callback' => 'beauty_salon_spa_customize_partial_beauty_salon_spa_date',
	) );

	$wp_customize->add_setting('beauty_salon_spa_admin',
		array(
			'type'                 => 'option',
			'capability'           => 'edit_theme_options',
			'theme_supports'       => '',
			'default'              => 'off',
			'transport'            => 'refresh',
			'sanitize_callback'    => 'beauty_salon_spa_callback_sanitize_switch',
		)
	);
	$wp_customize->add_control(new Beauty_Salon_Spa_Customizer_Customcontrol_Switch(
			$wp_customize,
			'beauty_salon_spa_admin',
			array(
				'settings'        => 'beauty_salon_spa_admin',
				'section'         => 'beauty_salon_spa_layout',
				'label'           => __( 'Hide Author/Admin', 'beauty-salon-spa' ),				
				'choices'		  => array(
					'1'      => __( 'On', 'beauty-salon-spa' ),
					'off'    => __( 'Off', 'beauty-salon-spa' ),
				),
				'active_callback' => '',
			)
		)
	);

	$wp_customize->selective_refresh->add_partial( 'beauty_salon_spa_admin', array(
		'selector' => '.entry-author',
		'render_callback' => 'beauty_salon_spa_customize_partial_beauty_salon_spa_admin',
	) );

	$wp_customize->add_setting('beauty_salon_spa_comment',
		array(
			'type'                 => 'option',
			'capability'           => 'edit_theme_options',
			'theme_supports'       => '',
			'default'              => 'off',
			'transport'            => 'refresh',
			'sanitize_callback'    => 'beauty_salon_spa_callback_sanitize_switch',
		)
	);
	$wp_customize->add_control(new Beauty_Salon_Spa_Customizer_Customcontrol_Switch(
			$wp_customize,
			'beauty_salon_spa_comment',
			array(
				'settings'        => 'beauty_salon_spa_comment',
				'section'         => 'beauty_salon_spa_layout',
				'label'           => __( 'Hide Comment', 'beauty-salon-spa' ),				
				'choices'		  => array(
					'1'      => __( 'On', 'beauty-salon-spa' ),
					'off'    => __( 'Off', 'beauty-salon-spa' ),
				),
				'active_callback' => '',
			)
		)
	);

	$wp_customize->selective_refresh->add_partial( 'beauty_salon_spa_comment', array(
		'selector' => '.entry-comments',
		'render_callback' => 'beauty_salon_spa_customize_partial_beauty_salon_spa_comment',
	) );

	// Top Header
    $wp_customize->add_section('beauty_salon_spa_top',array(
        'title' => __('Contact info', 'beauty-salon-spa'),
        'priority' => 1
    ) );

    $wp_customize->add_setting( 'beauty_salon_spa_section_contact_heading', array(
			'default'           => '',
			'transport'         => 'refresh',
			'sanitize_callback' => 'sanitize_text_field',
		) );
		$wp_customize->add_control( new Beauty_Salon_Spa_Customizer_Customcontrol_Section_Heading( $wp_customize, 'beauty_salon_spa_section_contact_heading', array(
			'label'       => esc_html__( 'Contact Settings', 'beauty-salon-spa' ),	
			'description' => __( 'Add contact info in the below feilds', 'beauty-salon-spa' ),		
			'section'     => 'beauty_salon_spa_top',
			'settings'    => 'beauty_salon_spa_section_contact_heading',
		) ) );

    $wp_customize->add_setting('beauty_salon_spa_top_text',array(
		'default' => '',
		'sanitize_callback' => 'sanitize_text_field'
	));
	$wp_customize->add_control('beauty_salon_spa_top_text',array(
		'label' => esc_html__('Add Topbar Text','beauty-salon-spa'),
		'section' => 'beauty_salon_spa_top',
		'setting' => 'beauty_salon_spa_top_text',
		'type'    => 'text'
	));	

    $wp_customize->add_setting('beauty_salon_spa_email_address',array(
		'default' => '',
		'sanitize_callback' => 'sanitize_email'
	));
	$wp_customize->add_control('beauty_salon_spa_email_address',array(
		'label' => esc_html__('Add Email Address','beauty-salon-spa'),
		'section' => 'beauty_salon_spa_top',
		'setting' => 'beauty_salon_spa_email_address',
		'type'    => 'text'
	));

	$wp_customize->add_setting('beauty_salon_mail_icon',array(
		'default'	=> 'fas fa-envelope-open',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control(new Beauty_Salon_Fontawesome_Icon_Chooser(
        $wp_customize,'beauty_salon_mail_icon',array(
		'label'	=> __('Add Mail Icon','beauty-salon-spa'),
		'transport' => 'refresh',
		'section'	=> 'beauty_salon_spa_top',
		'setting'	=> 'beauty_salon_mail_icon',
		'type'		=> 'icon'
	)));

	$wp_customize->add_setting('beauty_salon_spa_location_address',array(
		'default' => '',
		'sanitize_callback' => 'sanitize_text_field'
	));
	$wp_customize->add_control('beauty_salon_spa_location_address',array(
		'label' => esc_html__('Add Location','beauty-salon-spa'),
		'section' => 'beauty_salon_spa_top',
		'setting' => 'beauty_salon_spa_location_address',
		'type'    => 'text'
	));

	$wp_customize->add_setting('beauty_salon_address_icon',array(
		'default'	=> 'fas fa-map-marker-alt',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control(new Beauty_Salon_Fontawesome_Icon_Chooser(
        $wp_customize,'beauty_salon_address_icon',array(
		'label'	=> __('Add Address Icon','beauty-salon-spa'),
		'transport' => 'refresh',
		'section'	=> 'beauty_salon_spa_top',
		'setting'	=> 'beauty_salon_address_icon',
		'type'		=> 'icon'
	)));

    $wp_customize->add_setting('beauty_salon_spa_call_number',array(
		'default' => '',
		'sanitize_callback' => 'beauty_salon_spa_sanitize_phone_number'
	));
	$wp_customize->add_control('beauty_salon_spa_call_number',array(
		'label' => esc_html__('Add Phone Number','beauty-salon-spa'),
		'section' => 'beauty_salon_spa_top',
		'setting' => 'beauty_salon_spa_call_number',
		'type'    => 'text'
	));

	$wp_customize->add_setting('beauty_salon_call_icon',array(
		'default'	=> 'fas fa-phone-volume',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control(new Beauty_Salon_Fontawesome_Icon_Chooser(
        $wp_customize,'beauty_salon_call_icon',array(
		'label'	=> __('Add Call Icon','beauty-salon-spa'),
		'transport' => 'refresh',
		'section'	=> 'beauty_salon_spa_top',
		'setting'	=> 'beauty_salon_call_icon',
		'type'		=> 'icon'
	)));

    $wp_customize->add_setting('beauty_salon_spa_talk_btn_text',array(
		'default' => '',
		'sanitize_callback' => 'sanitize_text_field'
	));
	$wp_customize->add_control('beauty_salon_spa_talk_btn_text',array(
		'label' => esc_html__('Add Button Text','beauty-salon-spa'),
		'section' => 'beauty_salon_spa_top',
		'setting' => 'beauty_salon_spa_talk_btn_text',
		'type'    => 'text'
	));

    $wp_customize->add_setting('beauty_salon_spa_talk_btn_link',array(
		'default' => '',
		'sanitize_callback' => 'esc_url_raw'
	));
	$wp_customize->add_control('beauty_salon_spa_talk_btn_link',array(
		'label' => esc_html__('Add Button URL','beauty-salon-spa'),
		'section' => 'beauty_salon_spa_top',
		'setting' => 'beauty_salon_spa_talk_btn_link',
		'type'    => 'url'
	));

    //Slider
	$wp_customize->add_section( 'beauty_salon_spa_slider_section' , array(
    	'title'      => __( 'Slider Settings', 'beauty-salon-spa' ),
    	'priority'   => 3,
	) );

	$wp_customize->add_setting( 'beauty_salon_spa_section_slide_heading', array(
			'default'           => '',
			'transport'         => 'refresh',
			'sanitize_callback' => 'sanitize_text_field',
		) );
		$wp_customize->add_control( new Beauty_Salon_Spa_Customizer_Customcontrol_Section_Heading( $wp_customize, 'beauty_salon_spa_section_slide_heading', array(
			'label'       => esc_html__( 'Slider Settings', 'beauty-salon-spa' ),
			'description' => __( 'Slider Image Dimension ( 600px x 700px )', 'beauty-salon-spa' ),		
			'section'     => 'beauty_salon_spa_slider_section',
			'settings'    => 'beauty_salon_spa_section_slide_heading',
		) ) );

		$wp_customize->add_setting(
		'beauty_salon_spa_slider_arrows',
		array(
			'type'                 => 'option',
			'capability'           => 'edit_theme_options',
			'theme_supports'       => '',
			'default'              => 'off',
			'transport'            => 'refresh',
			'sanitize_callback'    => 'beauty_salon_spa_callback_sanitize_switch',
		)
	);
	$wp_customize->add_control(
		new Beauty_Salon_Spa_Customizer_Customcontrol_Switch(
			$wp_customize,
			'beauty_salon_spa_slider_arrows',
			array(
				'settings'        => 'beauty_salon_spa_slider_arrows',
				'section'         => 'beauty_salon_spa_slider_section',
				'label'           => __( 'Check To Hide Slider', 'beauty-salon-spa' ),				
				'choices'		  => array(
					'1'      => __( 'On', 'beauty-salon-spa' ),
					'off'    => __( 'Off', 'beauty-salon-spa' ),
				),
				'active_callback' => '',
			)
		)
	);

	$beauty_salon_spa_args = array('numberposts' => -1);
	$post_list = get_posts($beauty_salon_spa_args);
	$i = 0;
	$pst_sls[]= __('Select','beauty-salon-spa');
	foreach ($post_list as $key => $p_post) {
		$pst_sls[$p_post->ID]=$p_post->post_title;
	}
	for ( $i = 1; $i <= 4; $i++ ) {
		$wp_customize->add_setting('beauty_salon_spa_post_setting'.$i,array(
			'sanitize_callback' => 'beauty_salon_spa_sanitize_select',
		));
		$wp_customize->add_control('beauty_salon_spa_post_setting'.$i,array(
			'type'    => 'select',
			'choices' => $pst_sls,
			'label' => __('Select post','beauty-salon-spa'),
			'section' => 'beauty_salon_spa_slider_section',
		));
	}
	wp_reset_postdata();

	$wp_customize->add_setting('beauty_salon_spa_slider_content_alignment',array(
        'default' => 'LEFT-ALIGN',
        'sanitize_callback' => 'beauty_salon_spa_sanitize_choices'
	));
	$wp_customize->add_control('beauty_salon_spa_slider_content_alignment',array(
        'type' => 'select',
        'label' => __('Slider Content Alignment','beauty-salon-spa'),
        'section' => 'beauty_salon_spa_slider_section',
        'choices' => array(
            'LEFT-ALIGN' => __('LEFT-ALIGN','beauty-salon-spa'),
            'CENTER-ALIGN' => __('CENTER-ALIGN','beauty-salon-spa'),
            'RIGHT-ALIGN' => __('RIGHT-ALIGN','beauty-salon-spa'),),
	) );

	// Services Section
	$wp_customize->add_section( 'beauty_salon_spa_services_section' , array(
    	'title'      => __( 'Services Section Settings', 'beauty-salon-spa' ),
		'priority'   => 4,
	) );

	$wp_customize->add_setting('beauty_salon_spa_services_short_title',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('beauty_salon_spa_services_short_title',array(
		'label'	=> esc_html__('Section Short Title ','beauty-salon-spa'),
		'section'	=> 'beauty_salon_spa_services_section',
		'type'		=> 'text'
	));

	$wp_customize->add_setting('beauty_salon_spa_services_main_title',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('beauty_salon_spa_services_main_title',array(
		'label'	=> esc_html__('Section Main Title','beauty-salon-spa'),
		'section'	=> 'beauty_salon_spa_services_section',
		'type'		=> 'text'
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

	$wp_customize->add_setting('beauty_salon_spa_services_category_setting',array(
		'default' => 'select',
		'sanitize_callback' => 'beauty_salon_spa_sanitize_select',
	));
	$wp_customize->add_control('beauty_salon_spa_services_category_setting',array(
		'type'    => 'select',
		'choices' => $cat_post,
		'label' => esc_html__('Select Category to display Services','beauty-salon-spa'),
		'section' => 'beauty_salon_spa_services_section',
	));

	//Footer
    $wp_customize->add_section( 'beauty_salon_spa_footer_copyright', array(
    	'title'      => esc_html__( 'Footer Text', 'beauty-salon-spa' ),
    	'priority' => 6
	) );

	$wp_customize->add_setting( 'beauty_salon_spa_section_footer_heading', array(
			'default'           => '',
			'transport'         => 'refresh',
			'sanitize_callback' => 'sanitize_text_field',
		) );
		$wp_customize->add_control( new Beauty_Salon_Spa_Customizer_Customcontrol_Section_Heading( $wp_customize, 'beauty_salon_spa_section_footer_heading', array(
			'label'       => esc_html__( 'Footer Settings', 'beauty-salon-spa' ),		
			'section'     => 'beauty_salon_spa_footer_copyright',
			'settings'    => 'beauty_salon_spa_section_footer_heading',
		) ) );


    $wp_customize->add_setting('beauty_salon_spa_footer_text',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('beauty_salon_spa_footer_text',array(
		'label'	=> esc_html__('Copyright Text','beauty-salon-spa'),
		'section'	=> 'beauty_salon_spa_footer_copyright',
		'type'		=> 'text'
	));

	$wp_customize->add_setting('beauty_salon_spa_footer_widget',array(
		'default' => '4',
		'sanitize_callback' => 'beauty_salon_spa_sanitize_select'
));
	$wp_customize->add_control('beauty_salon_spa_footer_widget',array(
		'label' => esc_html__('Footer Per Column','beauty-salon-spa'),
		'section' => 'beauty_salon_spa_footer_copyright',
		'setting' => 'beauty_salon_spa_footer_widget',
		'type' => 'radio',
				'choices' => array(
						'1'   => __('1 Column', 'beauty-salon-spa'),
						'2'  => __('2 Column', 'beauty-salon-spa'),
						'3' => __('3 Column', 'beauty-salon-spa'),
						'4' => __('4 Column', 'beauty-salon-spa')
				),
	));

	$wp_customize->get_setting( 'blogname' )->transport          = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport   = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport  = 'postMessage';

	$wp_customize->selective_refresh->add_partial( 'blogname', array(
		'selector' => '.site-title a',
		'render_callback' => 'beauty_salon_spa_customize_partial_blogname',
	) );
	$wp_customize->selective_refresh->add_partial( 'blogdescription', array(
		'selector' => '.site-description',
		'render_callback' => 'beauty_salon_spa_customize_partial_blogdescription',
	) );

	//front page
	$num_sections = apply_filters( 'beauty_salon_spa_front_page_sections', 4 );

	// Create a setting and control for each of the sections available in the theme.
	for ( $i = 1; $i < ( 1 + $num_sections ); $i++ ) {
		$wp_customize->add_setting( 'panel_' . $i, array(
			'default'           => false,
			'sanitize_callback' => 'beauty_salon_spa_sanitize_dropdown_pages',
			'transport'         => 'postMessage',
		) );

		$wp_customize->add_control( 'panel_' . $i, array(
			/* translators: %d is the front page section number */
			'label'          => sprintf( __( 'Front Page Section %d Content', 'beauty-salon-spa' ), $i ),
			'description'    => ( 1 !== $i ? '' : __( 'Select pages to feature in each area from the dropdowns. Add an image to a section by setting a featured image in the page editor. Empty sections will not be displayed.', 'beauty-salon-spa' ) ),
			'section'        => 'theme_options',
			'type'           => 'dropdown-pages',
			'allow_addition' => true,
			'active_callback' => 'beauty_salon_spa_is_static_front_page',
		) );

		$wp_customize->selective_refresh->add_partial( 'panel_' . $i, array(
			'selector'            => '#panel' . $i,
			'render_callback'     => 'beauty_salon_spa_front_page_section',
			'container_inclusive' => true,
		) );
	}
}
add_action( 'customize_register', 'beauty_salon_spa_customize_register' );

function beauty_salon_spa_customize_partial_blogname() {
	bloginfo( 'name' );
}
function beauty_salon_spa_customize_partial_blogdescription() {
	bloginfo( 'description' );
}
function beauty_salon_spa_is_static_front_page() {
	return ( is_front_page() && ! is_home() );
}
function beauty_salon_spa_is_view_with_layout_option() {
	return ( is_page() || ( is_archive() && ! is_active_sidebar( 'sidebar-1' ) ) );
}

define('BEAUTY_SALON_SPA_PRO_LINK',__('https://www.ovationthemes.com/wordpress/beauty-salon-wordpress-theme/','beauty-salon-spa'));

/* Pro control */
if (class_exists('WP_Customize_Control') && !class_exists('Beauty_Salon_Spa_Pro_Control')):
    class Beauty_Salon_Spa_Pro_Control extends WP_Customize_Control{

    public function render_content(){?>
        <label style="overflow: hidden; zoom: 1;">
	        <div class="col-md upsell-btn">
                <a href="<?php echo esc_url( BEAUTY_SALON_SPA_PRO_LINK ); ?>" target="blank" class="btn btn-success btn"><?php esc_html_e('UPGRADE BEAUTY SALON PREMIUM','beauty-salon-spa');?> </a>
	        </div>
            <div class="col-md">
                <img class="beauty_salon_spa_img_responsive " src="<?php echo esc_url(get_template_directory_uri()); ?>/screenshot.png">
            </div>
	        <div class="col-md">
	            <h3 style="margin-top:10px; margin-left: 20px; text-decoration:underline; color:#333;"><?php esc_html_e('BEAUTY SALON SPA PREMIUM - Features', 'beauty-salon-spa'); ?></h3>
                <ul style="padding-top:10px">
                    <li class="upsell-beauty_salon_spa"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Responsive Design', 'beauty-salon-spa');?> </li>
                    <li class="upsell-beauty_salon_spa"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Boxed or fullwidth layout', 'beauty-salon-spa');?> </li>
                    <li class="upsell-beauty_salon_spa"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Shortcode Support', 'beauty-salon-spa');?> </li>
                    <li class="upsell-beauty_salon_spa"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Demo Importer', 'beauty-salon-spa');?> </li>
                    <li class="upsell-beauty_salon_spa"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Section Reordering', 'beauty-salon-spa');?> </li>
                    <li class="upsell-beauty_salon_spa"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Contact Page Template', 'beauty-salon-spa');?> </li>
                    <li class="upsell-beauty_salon_spa"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Multiple Blog Layouts', 'beauty-salon-spa');?> </li>
                    <li class="upsell-beauty_salon_spa"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Unlimited Color Options', 'beauty-salon-spa');?> </li>
                    <li class="upsell-beauty_salon_spa"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Designed with HTML5 and CSS3', 'beauty-salon-spa');?> </li>
                    <li class="upsell-beauty_salon_spa"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Customizable Design & Code', 'beauty-salon-spa');?> </li>
                    <li class="upsell-beauty_salon_spa"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Cross Browser Support', 'beauty-salon-spa');?> </li>
                    <li class="upsell-beauty_salon_spa"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Detailed Documentation Included', 'beauty-salon-spa');?> </li>
                    <li class="upsell-beauty_salon_spa"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Stylish Custom Widgets', 'beauty-salon-spa');?> </li>
                    <li class="upsell-beauty_salon_spa"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Patterns Background', 'beauty-salon-spa');?> </li>
                    <li class="upsell-beauty_salon_spa"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('WPML Compatible (Translation Ready)', 'beauty-salon-spa');?> </li>
                    <li class="upsell-beauty_salon_spa"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Woo-commerce Compatible', 'beauty-salon-spa');?> </li>
                    <li class="upsell-beauty_salon_spa"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Full Support', 'beauty-salon-spa');?> </li>
                    <li class="upsell-beauty_salon_spa"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('10+ Sections', 'beauty-salon-spa');?> </li>
                    <li class="upsell-beauty_salon_spa"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Live Customizer', 'beauty-salon-spa');?> </li>
                   	<li class="upsell-beauty_salon_spa"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('AMP Ready', 'beauty-salon-spa');?> </li>
                   	<li class="upsell-beauty_salon_spa"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Clean Code', 'beauty-salon-spa');?> </li>
                   	<li class="upsell-beauty_salon_spa"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('SEO Friendly', 'beauty-salon-spa');?> </li>
                   	<li class="upsell-beauty_salon_spa"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Supper Fast', 'beauty-salon-spa');?> </li>
                </ul>
        	</div>
		    <div class="col-md upsell-btn upsell-btn-bottom">
	            <a href="<?php echo esc_url( BEAUTY_SALON_SPA_PRO_LINK ); ?>" target="blank" class="btn btn-success btn"><?php esc_html_e('UPGRADE BEAUTY SALON PREMIUM','beauty-salon-spa');?> </a>
		    </div>
        </label>
    <?php } }
endif;
