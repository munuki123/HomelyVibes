<?php

	/*---------------------------Width -------------------*/

	$beauty_salon_spa_custom_style= "";

	$beauty_salon_spa_theme_width = get_theme_mod( 'beauty_salon_spa_width_options','full_width');

    if($beauty_salon_spa_theme_width == 'full_width'){

		$beauty_salon_spa_custom_style .='body{';

			$beauty_salon_spa_custom_style .='max-width: 100%;';

		$beauty_salon_spa_custom_style .='}';

	}else if($beauty_salon_spa_theme_width == 'Container'){

		$beauty_salon_spa_custom_style .='.page-template-custom-home-page .wrap_figure{';

			$beauty_salon_spa_custom_style .='position:static;';

		$beauty_salon_spa_custom_style .='}';

		$beauty_salon_spa_custom_style .='body{';

			$beauty_salon_spa_custom_style .='max-width: 1140px; width: 100%; padding-right: 15px; padding-left: 15px; margin-right: auto !important; margin-left: auto !important;';

		$beauty_salon_spa_custom_style .='}';


	}else if($beauty_salon_spa_theme_width == 'container_fluid'){

		$beauty_salon_spa_custom_style .='body{';

			$beauty_salon_spa_custom_style .='width: 100%;padding-right: 15px;padding-left: 15px;margin-right: auto;margin-left: auto;';

		$beauty_salon_spa_custom_style .='}';

		$beauty_salon_spa_custom_style .='.page-template-custom-home-page .wrap_figure{';

			$beauty_salon_spa_custom_style .='position:static;';

		$beauty_salon_spa_custom_style .='}';
	}

	//----------------------------------------------------------------------------

	$beauty_salon_spa_logo_max_height = get_theme_mod('beauty_salon_spa_logo_max_height');

	if($beauty_salon_spa_logo_max_height != false){

		$beauty_salon_spa_custom_style .='.custom-logo-link img{';

			$beauty_salon_spa_custom_style .='max-height: '.esc_html($beauty_salon_spa_logo_max_height).'px;';

		$beauty_salon_spa_custom_style .='}';
	}

	/*---------------------------Scroll-top-position -------------------*/

	$beauty_salon_spa_scroll_options = get_theme_mod( 'beauty_salon_spa_scroll_options','right_align');

    if($beauty_salon_spa_scroll_options == 'right_align'){

		$beauty_salon_spa_custom_style .='.scroll-top button{';

			$beauty_salon_spa_custom_style .='';

		$beauty_salon_spa_custom_style .='}';

	}else if($beauty_salon_spa_scroll_options == 'center_align'){

		$beauty_salon_spa_custom_style .='.scroll-top button{';

			$beauty_salon_spa_custom_style .='right: 0; left:0; margin: 0 auto; top:85% !important';

		$beauty_salon_spa_custom_style .='}';

	}else if($beauty_salon_spa_scroll_options == 'left_align'){

		$beauty_salon_spa_custom_style .='.scroll-top button{';

			$beauty_salon_spa_custom_style .='right: auto; left:5%; margin: 0 auto';

		$beauty_salon_spa_custom_style .='}';
	}

			/*---------------------------text-transform-------------------*/

	$beauty_salon_spa_text_transform = get_theme_mod( 'beauty_salon_spa_menu_text_transform','CAPITALISE');
    if($beauty_salon_spa_text_transform == 'CAPITALISE'){

		$beauty_salon_spa_custom_style .='nav#top_gb_menu ul li a{';

			$beauty_salon_spa_custom_style .='text-transform: capitalize ; font-size: 14px;';

		$beauty_salon_spa_custom_style .='}';

	}else if($beauty_salon_spa_text_transform == 'UPPERCASE'){

		$beauty_salon_spa_custom_style .='nav#top_gb_menu ul li a{';

			$beauty_salon_spa_custom_style .='text-transform: uppercase ; font-size: 14px;';

		$beauty_salon_spa_custom_style .='}';

	}else if($beauty_salon_spa_text_transform == 'LOWERCASE'){

		$beauty_salon_spa_custom_style .='nav#top_gb_menu ul li a{';

			$beauty_salon_spa_custom_style .='text-transform: lowercase ; font-size: 14px;';

		$beauty_salon_spa_custom_style .='}';
	}

			/*-------------------------Slider-content-alignment-------------------*/

		$beauty_salon_spa_slider_content_alignment = get_theme_mod( 'beauty_salon_spa_slider_content_alignment','LEFT-ALIGN');

		 if($beauty_salon_spa_slider_content_alignment == 'LEFT-ALIGN'){

				$beauty_salon_spa_custom_style .='.slider-inner{';

					$beauty_salon_spa_custom_style .='text-align:left;';

				$beauty_salon_spa_custom_style .='}';


			}else if($beauty_salon_spa_slider_content_alignment == 'CENTER-ALIGN'){

				$beauty_salon_spa_custom_style .='.slider-inner{';

					$beauty_salon_spa_custom_style .='text-align:center;';

				$beauty_salon_spa_custom_style .='}';


			}else if($beauty_salon_spa_slider_content_alignment == 'RIGHT-ALIGN'){

				$beauty_salon_spa_custom_style .='.slider-inner{';

					$beauty_salon_spa_custom_style .='text-align:right;';

				$beauty_salon_spa_custom_style .='}';

			}
			if( get_option( 'beauty_salon_spa_sticky_header',true) != 'on') {

		$beauty_salon_spa_custom_style .='.fixed_header.fixed{';

			$beauty_salon_spa_custom_style .='position: static;';
			
		$beauty_salon_spa_custom_style .='}';
	}

	if( get_option( 'beauty_salon_spa_sticky_header',true) != 'off') {

		$beauty_salon_spa_custom_style .='.fixed_header.fixed{';

			$beauty_salon_spa_custom_style .='position: fixed;';
			
		$beauty_salon_spa_custom_style .='}';
	}