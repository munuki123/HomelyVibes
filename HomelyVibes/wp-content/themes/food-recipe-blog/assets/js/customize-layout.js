/*
** Scripts within the customizer controls window.
*/

(function( $ ) {
	wp.customize.bind( 'ready', function() {

	/*
	** Reusable Functions
	*/
		var optPrefix = '#customize-control-food_recipe_blog_options-';
		
		// Label
		function food_recipe_blog_customizer_label( id, title ) {

			// Colors

			if ( id === 'food_recipe_blog_theme_color' || id === 'background_color' || id === 'background_image' ) {
				$( '#customize-control-'+ id ).before('<li class="tab-title customize-control">'+ title  +'</li>');
			} else {
				$( '#customize-control-food_recipe_blog_options-'+ id ).before('<li class="tab-title customize-control">'+ title +'</li>');
			}

			// Site Identity

			if ( id === 'custom_logo' || id === 'site_icon' ) {
				$( '#customize-control-'+ id ).before('<li class="tab-title customize-control">'+ title  +'</li>');
			} else {
				$( '#customize-control-food_recipe_blog_options-'+ id ).before('<li class="tab-title customize-control">'+ title +'</li>');
			}

			// Top Header

			if ( id === 'food_recipe_blog_subscribe_button' ) {
				$( '#customize-control-'+ id ).before('<li class="tab-title customize-control">'+ title  +'</li>');
			} else {
				$( '#customize-control-food_recipe_blog_options-'+ id ).before('<li class="tab-title customize-control">'+ title +'</li>');
			}

			// General Setting

			if ( id === 'food_recipe_blog_preloader_hide' || id === 'food_recipe_blog_sticky_header' || id === 'food_recipe_blog_scroll_hide' ) {
				$( '#customize-control-'+ id ).before('<li class="tab-title customize-control">'+ title  +'</li>');
			} else {
				$( '#customize-control-food_recipe_blog_options-'+ id ).before('<li class="tab-title customize-control">'+ title +'</li>');
			}

			// Social Icon

			if ( id === 'food_recipe_blog_social_icon' ) {
				$( '#customize-control-'+ id ).before('<li class="tab-title customize-control">'+ title  +'</li>');
			} else {
				$( '#customize-control-food_recipe_blog_options-'+ id ).before('<li class="tab-title customize-control">'+ title +'</li>');
			}

			// Slider

			if ( id === 'food_recipe_blog_slider_loop' ) {
				$( '#customize-control-'+ id ).before('<li class="tab-title customize-control">'+ title  +'</li>');
			} else {
				$( '#customize-control-food_recipe_blog_options-'+ id ).before('<li class="tab-title customize-control">'+ title +'</li>');
			}

			// Header Image

			if ( id === 'header_image' ) {
				$( '#customize-control-'+ id ).before('<li class="tab-title customize-control">'+ title  +'</li>');
			} else {
				$( '#customize-control-food_recipe_blog_options-'+ id ).before('<li class="tab-title customize-control">'+ title +'</li>');
			}
			
			// Latest Recipes

			if ( id === 'food_recipe_blog_latest_recipes_title' ) {
				$( '#customize-control-'+ id ).before('<li class="tab-title customize-control">'+ title  +'</li>');
			} else {
				$( '#customize-control-food_recipe_blog_options-'+ id ).before('<li class="tab-title customize-control">'+ title +'</li>');
			}

			// Footer

			if ( id === 'food_recipe_blog_footer_text_setting' ) {
				$( '#customize-control-'+ id ).before('<li class="tab-title customize-control">'+ title  +'</li>');
			} else {
				$( '#customize-control-food_recipe_blog_options-'+ id ).before('<li class="tab-title customize-control">'+ title +'</li>');
			}
			
		}


	/*
	** Tabs
	*/

		// Colors
		food_recipe_blog_customizer_label( 'food_recipe_blog_theme_color', 'Theme Color' );
		food_recipe_blog_customizer_label( 'background_color', 'Colors' );
		food_recipe_blog_customizer_label( 'background_image', 'Image' );

		// Site Identity
		food_recipe_blog_customizer_label( 'custom_logo', 'Logo Setup' );
		food_recipe_blog_customizer_label( 'site_icon', 'Favicon' );

		// Top Header
		food_recipe_blog_customizer_label( 'food_recipe_blog_subscribe_button', 'Subscribe Button' );

		// General Setting
		food_recipe_blog_customizer_label( 'food_recipe_blog_preloader_hide', 'Preloader' );
		food_recipe_blog_customizer_label( 'food_recipe_blog_sticky_header', 'Sticky Header' );
		food_recipe_blog_customizer_label( 'food_recipe_blog_scroll_hide', 'Scroll To Top' );

		// Social Icon
		food_recipe_blog_customizer_label( 'food_recipe_blog_social_icon', 'Social Links' );

		//Slider
		food_recipe_blog_customizer_label( 'food_recipe_blog_slider_loop', 'Slider' );

		//Header Image
		food_recipe_blog_customizer_label( 'header_image', 'Header Image' );

		//Latest Recipes
		food_recipe_blog_customizer_label( 'food_recipe_blog_latest_recipes_title', 'Latest Recipes' );

		//Footer
		food_recipe_blog_customizer_label( 'food_recipe_blog_footer_text_setting', 'Footer' );
	

	}); // wp.customize ready

})( jQuery );
