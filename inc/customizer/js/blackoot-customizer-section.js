/**
 *
 * Blackoot Lite WordPress Theme by Iceable Themes | http://www.iceablethemes.com
 *
 * Copyright 2014-2016 Mathieu Sarrasin - Iceable Media
 *
 * Theme Customizer sections functions
 *
 */

( function( $ ) {

	// Add Blackoot Pro upgrade message
	upgrade = $('<a class="blackoot-customize-pro"></a>')
	.attr('href', "http://www.iceablethemes.com/shop/blackoot-pro/")
	.attr('target', '_blank')
	.text(blackoot_customizer_section_l10n.upgrade_pro)
	;
	$('.preview-notice').append(upgrade);
	// Remove accordion click event
	$('.blackoot-customize-pro').on('click', function(e) {
		e.stopPropagation();
	});

} )( jQuery );