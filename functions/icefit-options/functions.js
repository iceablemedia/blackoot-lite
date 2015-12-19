/**
 *
 * Blackoot Lite WordPress Theme by Iceable Themes | http://www.iceablethemes.com
 *
 * Copyright 2014-2015 Mathieu Sarrasin - Iceable Media
 *
 * Admin Settings Panel JS
 *
 */
var blackoot_admin_panel;
(function(jQuery){blackoot_admin_panel={
	init:function(){
		//admin panel
		var icf_title;
		jQuery('#icefit-admin-panel').removeClass('no-js');
		jQuery('#no-js-warning').hide();
		jQuery('#icefit-admin-panel .icefit-admin-panel-menu-link:first').addClass('visible');
		jQuery('#icefit-admin-panel .icefit-admin-panel-content-box:first').addClass('visible');
		jQuery('.icefit-admin-panel-menu-link').click(function(event) {
			event.preventDefault();
		});
		jQuery('.icefit-admin-panel-menu-link').click(function() {
			icf_title = jQuery(this).attr("id").replace('icefit-admin-panel-menu-', '');
			jQuery('.icefit-admin-panel-menu-link').removeClass('visible');
			jQuery('#icefit-admin-panel-menu-' + icf_title).addClass('visible');
			jQuery('.icefit-admin-panel-content-box').removeClass('visible');
			jQuery('.icefit-admin-panel-content-box').hide();
			jQuery('#icefit-admin-panel-content-' + icf_title).fadeIn("fast");
			jQuery('.icefit-admin-panel-content-box').removeClass('visible');
		});

		// Init social buttons when the tab is activated
		// (twitter button doesn't init properly if loaded in an hidden element)
		jQuery('#icefit-admin-panel-menu-support_feedback').click(function(){
			jQuery('#social').html('').html('<div class="social-button"><a href="https://twitter.com/iceablethemes" class="twitter-follow-button" data-show-count="false" data-show-screen-name="true" data-lang="en">Follow @iceablethemes</a><script type="text/javascript">!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="//platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script></div><div class="social-button"><iframe src="//www.facebook.com/plugins/like.php?href=https%3A%2F%2Fwww.facebook.com%2Ficeablethemes&amp;width&amp;layout=button&amp;action=like&amp;show_faces=true&amp;share=true&amp;height=80&amp;appId=361768900585105" scrolling="no" frameborder="0" style="border:none; overflow:hidden; height:80px;" allowTransparency="true"></iframe></div>');
		});

		// Submit
		jQuery('#icefitform').submit(function(){
			function newValues() {
				var serializedValues = jQuery("#icefitform").serialize();
				return serializedValues;
			}
			var serializedReturn = newValues();
			var data = {
				action: 'blackoot_settings_ajax_post_action',
				data: serializedReturn,
				blackoot_settings_nonce: jQuery('#blackoot_settings_nonce').val()
			};
			jQuery.post(ajaxurl, data);
			jQuery('#ajax-result').html(blackoot_js_strings.settings_saved).fadeIn("normal").delay('1000').fadeOut("normal");
			return false; 
		});
		
		// Reset
		jQuery('#icefit-reset-button').click(function() {
			var answer = confirm(blackoot_js_strings.reset_confirm);
			if (answer) {
				var data = { action: 'blackoot_settings_reset_ajax_post_action' };
				jQuery.post(ajaxurl, data);
				setTimeout("location.reload(true);",1000);
			}
		});

	}
};

jQuery(document).ready(function(){
	blackoot_admin_panel.init()	
})})(jQuery);