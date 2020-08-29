/**
 *
 * Blackoot Lite WordPress Theme by Iceable Themes | https://www.iceablethemes.com
 *
 * Copyright 2014-2020 Iceable Themes - https://www.iceablethemes.com
 *
 * Theme Customizer sections functions
 *
 */

( function( $ ) {

	// Add Blackoot Pro upgrade message
	upgrade = $('<a class="blackoot-customize-pro"></a>')
	.attr('href', "https://www.iceablethemes.com/shop/blackoot-pro/")
	.attr('target', '_blank')
	.text(blackoot_customizer_section_l10n.upgrade_pro)
	;
	$('.preview-notice').append(upgrade);
	// Remove accordion click event
	$('.blackoot-customize-pro').on('click', function(e) {
		e.stopPropagation();
	});

} )( jQuery );
