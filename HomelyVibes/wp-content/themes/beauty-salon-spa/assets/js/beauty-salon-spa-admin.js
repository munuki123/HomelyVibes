jQuery(document).ready(function($) {
    'use strict';
	var myObj = beauty_salon_spa_scripts_localize;
	$('.dashboard_add_new_page').on('click', function (e) {
		jQuery.post(
	    myObj.ajax_url,
	    {
	        action: 'beauty_salon_spa_add_new_page'

	    }, function(data, status){
	        window.open(data.edit_page_url,'_blank');
	    }, 'json');
	})
})