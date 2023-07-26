
(function( $ ) {
	wp.customize.bind( 'ready', function() {

		var optPrefix = '#customize-control-food_recipe_blogs_options-';
		
		function food_recipe_blogs_customizer_label( id, title ) {

			// Colors

			if ( id === 'food_recipe_blogs_theme_color' || id === 'background_color' || id === 'background_image' ) {
				$( '#customize-control-'+ id ).before('<li class="tab-title customize-control">'+ title  +'</li>');
			} else {
				$( '#customize-control-food_recipe_blogs_options-'+ id ).before('<li class="tab-title customize-control">'+ title +'</li>');
			}

			// Site Identity

			if ( id === 'custom_logo' || id === 'site_icon' ) {
				$( '#customize-control-'+ id ).before('<li class="tab-title customize-control">'+ title  +'</li>');
			} else {
				$( '#customize-control-food_recipe_blogs_options-'+ id ).before('<li class="tab-title customize-control">'+ title +'</li>');
			}

			//  Header 

			if ( id === 'food_recipe_blogs_address' || id === 'food_recipe_blogs_email' || id === 'food_recipe_blogs_phone_number' ) {
				$( '#customize-control-'+ id ).before('<li class="tab-title customize-control">'+ title  +'</li>');
			} else {
				$( '#customize-control-food_recipe_blogs_options-'+ id ).before('<li class="tab-title customize-control">'+ title +'</li>');
			}

			//  Banner Section

			if ( id === 'smart_tech_blog_banner_bg_image' ) {
				$( '#customize-control-'+ id ).before('<li class="tab-title customize-control">'+ title  +'</li>');
			} else {
				$( '#customize-control-food_recipe_blogs_options-'+ id ).before('<li class="tab-title customize-control">'+ title +'</li>');
			}

			//  Popular Articles

			if ( id === 'smart_tech_blog_popular_articles_title' ) {
				$( '#customize-control-'+ id ).before('<li class="tab-title customize-control">'+ title  +'</li>');
			} else {
				$( '#customize-control-food_recipe_blogs_options-'+ id ).before('<li class="tab-title customize-control">'+ title +'</li>');
			}

			//  Social Icon 

			if ( id === 'food_recipe_blog_social_icon' || id === 'food_recipe_blog_subscribe_button' ) {
				$( '#customize-control-'+ id ).before('<li class="tab-title customize-control">'+ title  +'</li>');
			} else {
				$( '#customize-control-food_recipe_blogs_options-'+ id ).before('<li class="tab-title customize-control">'+ title +'</li>');
			}

			// General Setting

			if ( id === 'food_recipe_blogs_preloader_hide' || id === 'food_recipe_blogs_sticky_header' || id === 'food_recipe_blogs_scroll_hide' ) {
				$( '#customize-control-'+ id ).before('<li class="tab-title customize-control">'+ title  +'</li>');
			} else {
				$( '#customize-control-food_recipe_blogs_options-'+ id ).before('<li class="tab-title customize-control">'+ title +'</li>');
			}

			// Slider

			if ( id === 'food_recipe_blog_slider_loop' ) {
				$( '#customize-control-'+ id ).before('<li class="tab-title customize-control">'+ title  +'</li>');
			} else {
				$( '#customize-control-food_recipe_blogs_options-'+ id ).before('<li class="tab-title customize-control">'+ title +'</li>');
			}

			// Latest Recipes

			if ( id === 'food_recipe_blog_latest_recipes_title' ) {
				$( '#customize-control-'+ id ).before('<li class="tab-title customize-control">'+ title  +'</li>');
			} else {
				$( '#customize-control-food_recipe_blogs_options-'+ id ).before('<li class="tab-title customize-control">'+ title +'</li>');
			}

			// Header Image

			if ( id === 'header_image' ) {
				$( '#customize-control-'+ id ).before('<li class="tab-title customize-control">'+ title  +'</li>');
			} else {
				$( '#customize-control-food_recipe_blogs_options-'+ id ).before('<li class="tab-title customize-control">'+ title +'</li>');
			}

			// Footer

			if ( id === 'food_recipe_blog_footer_text_setting' ) {
				$( '#customize-control-'+ id ).before('<li class="tab-title customize-control">'+ title  +'</li>');
			} else {
				$( '#customize-control-food_recipe_blogs_options-'+ id ).before('<li class="tab-title customize-control">'+ title +'</li>');
			}
			
		}

		// Colors
		food_recipe_blogs_customizer_label( 'food_recipe_blogs_theme_color', 'Theme Color' );
		food_recipe_blogs_customizer_label( 'background_color', 'Colors' );
		food_recipe_blogs_customizer_label( 'background_image', 'Image' );

		// Site Identity
		food_recipe_blogs_customizer_label( 'custom_logo', 'Logo Setup' );
		food_recipe_blogs_customizer_label( 'site_icon', 'Favicon' );

		// Banner Section
		food_recipe_blogs_customizer_label( 'smart_tech_blog_banner_bg_image', 'Banner Section' );

		// Popular Articles
		food_recipe_blogs_customizer_label( 'smart_tech_blog_popular_articles_title', 'Popular Articles' );

		// Social Icon
		food_recipe_blogs_customizer_label( 'food_recipe_blog_social_icon', 'Social Icons' );
		food_recipe_blogs_customizer_label( 'food_recipe_blog_subscribe_button', 'Subscribe Button' );

		// General Setting
		food_recipe_blogs_customizer_label( 'food_recipe_blogs_preloader_hide', 'Preloader' );
		food_recipe_blogs_customizer_label( 'food_recipe_blogs_sticky_header', 'Sticky Header' );
		food_recipe_blogs_customizer_label( 'food_recipe_blogs_scroll_hide', 'Scroll To Top' );

		//Slider
		food_recipe_blogs_customizer_label( 'food_recipe_blog_slider_loop', 'Slider' );

		//Latest Recipes
		food_recipe_blogs_customizer_label( 'food_recipe_blog_latest_recipes_title', 'Latest Recipes' );
		
		//Header Image
		food_recipe_blogs_customizer_label( 'header_image', 'Header Image' );

		//Footer
		food_recipe_blogs_customizer_label( 'food_recipe_blog_footer_text_setting', 'Footer' );


	}); 
})( jQuery );
