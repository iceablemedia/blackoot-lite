<?php
/**
 *
 * Blackoot Lite WordPress Theme by Iceable Themes | http://www.iceablethemes.com
 *
 * Copyright 2014-2015 Mathieu Sarrasin - Iceable Media
 *
 * Admin settings template
 *
 */

// Load the icefit options framework
include_once('icefit-options.php');

// Set setting panel name and slug
$blackoot_settings_name = __("Blackoot Lite Settings", 'blackoot');
$blackoot_settings_slug = "blackoot_settings";


// Set settings template (returns an array)
function blackoot_settings_template() {

	$settings_options = array();

// START PAGE 0

	$settings_options[] = array(
		'name'          => __('Go Pro', 'blackoot'),
		'type'          => 'start_menu',
		'id'            => 'gopro_page',
		'icon'          => 'down',
	);

		$settings_options[] = array(
			'name'          => __('Upgrade to Blackoot Pro!', 'blackoot'),
			'desc'          => '',
			'id'            => 'gopro',
			'type'          => 'gopro',
			'default'       => '',
		);

	$settings_options[] = array('type' => 'end_menu');

// END PAGE 0

// START PAGE 1
	$settings_options[] = array(
		'name'          => __('Main settings', 'blackoot'),
		'type'          => 'start_menu',
		'id'            => 'main',
		'icon'          => 'control',
	);

		$settings_options[] = array(
			'name'          => __('Logo', 'blackoot'),
			'desc'          => __('Upload your own logo', 'blackoot'),
			'id'            => 'logo',
			'type'          => 'image',
			'default'       => '',
		);

		$settings_options[] = array(
			'name'          => __('Site Title', 'blackoot'),
			'desc'          => __('Choose "display title" if you want to use a text-based title instead of an uploaded logo.', 'blackoot'),
			'id'            => 'header_title',
			'type'          => 'radio',
			'default'       => 'Use Logo',
			'values'		=> array (
								array( 'value' => 'Use Logo', 'display' => __('Use Logo', 'blackoot') ),
								array( 'value' => 'Display Title', 'display' => __('Display Title', 'blackoot') ),
								),
		);

		$settings_options[] = array(
			'name'          => __('Favicon', 'blackoot'),
			'desc'          => __('Set your favicon. 16x16 or 32x32 pixels, either 8-bit or 24-bit colors. PNG (W3C standard), GIF, or ICO.', 'blackoot'),
			'id'            => 'favicon',
			'type'          => 'image',
			'default'       => '',
		);

		$settings_options[] = array(
			'name'          => __('Display Tagline', 'blackoot'),
			'desc'          => __('Display your site description (tagline) on the right side of the header.', 'blackoot'),
			'id'            => 'header_tagline',
			'type'          => 'radio',
			'default'       => 'Off',
			'values'		=> array (
								array( 'value' => 'Off', 'display' => __('Off', 'blackoot') ),
								array( 'value' => 'On', 'display' => __('On', 'blackoot') ),
								),
		);

		$settings_options[] = array(
			'name'          => __('Blog Index Shows', 'blackoot'),
			'desc'          => __('Choose what content to display on Main Blog page and archives', 'blackoot'),
			'id'            => 'blog_index_shows',
			'type'          => 'radio',
			'default'       => 'Excerpt',
			'values'		=> array (
								array( 'value' => 'Excerpt', 'display' => __('Excerpt', 'blackoot') ),
								array( 'value' => 'Full content', 'display' => __('Full content', 'blackoot') ),
								),
		);

		$settings_options[] = array(
			'name'          => __('Responsive mode', 'blackoot'),
			'desc'          => __('Turn this setting off if you want your site to be unresponsive.', 'blackoot'),
			'id'            => 'responsive_mode',
			'type'          => 'radio',
			'default'       => 'on',
			'values'		=> array (
								array( 'value' => 'on', 'display' => __('On', 'blackoot') ),
								array( 'value' => 'off', 'display' => __('Off', 'blackoot') ),
								),
		);

	$settings_options[] = array('type' => 'end_menu');
// END PAGE 1
// START PAGE 2
	$settings_options[] = array(
		'name'          => __('Custom Header', 'blackoot'),
		'type'          => 'start_menu',
		'id'            => 'custom_header',
		'icon'          => 'picture',
	);

		$settings_options[] = array(
			'name'          => __('Display custom header on Homepage', 'blackoot'),
			'desc'          => __('Enable or disable display of custom header image on the front page.', 'blackoot'),
			'id'            => 'home_header_image',
			'type'          => 'radio',
			'default'       => 'On',
			'values'		=> array (
								array( 'value' => 'On', 'display' => __('On', 'blackoot') ),
								array( 'value' => 'Off', 'display' => __('Off', 'blackoot') ),
								),
		);

		$settings_options[] = array(
			'name'          => __('Display custom header on Blog Index', 'blackoot'),
			'desc'          => __('Enable or disable display of custom header image on blog index pages.', 'blackoot'),
			'id'            => 'blog_header_image',
			'type'          => 'radio',
			'default'       => 'On',
			'values'		=> array (
								array( 'value' => 'On', 'display' => __('On', 'blackoot') ),
								array( 'value' => 'Off', 'display' => __('Off', 'blackoot') ),
								),
		);

		$settings_options[] = array(
			'name'          => __('Display custom header on Blog Posts', 'blackoot'),
			'desc'          => __('Enable or disable display of custom header image on single blog posts', 'blackoot'),
			'id'            => 'single_header_image',
			'type'          => 'radio',
			'default'       => 'On',
			'values'		=> array (
								array( 'value' => 'On', 'display' => __('On', 'blackoot') ),
								array( 'value' => 'Off', 'display' => __('Off', 'blackoot') ),
								),
		);

		$settings_options[] = array(
			'name'          => __('Display custom header on Pages', 'blackoot'),
			'desc'          => __('Enable or disable display of custom header image on individual pages.', 'blackoot'),
			'id'            => 'pages_header_image',
			'type'          => 'radio',
			'default'       => 'On',
			'values'		=> array (
								array( 'value' => 'On', 'display' => __('On', 'blackoot') ),
								array( 'value' => 'Off', 'display' => __('Off', 'blackoot') ),
								),
		);


	$settings_options[] = array('type' => 'end_menu');
// END PAGE 2
// START PAGE 3
	$settings_options[] = array(
		'name'          => __('Support and Feedback', 'blackoot'),
		'type'          => 'start_menu',
		'id'            => 'support_feedback',
		'icon'          => 'network',
	);

		$settings_options[] = array(
			'name'          => __('Support and Feedback', 'blackoot'),
			'desc'          => '',
			'id'            => 'support_feedback',
			'type'          => 'support_feedback',
			'default'       => '',
		);

	$settings_options[] = array('type' => 'end_menu');
// END PAGE 3

	return $settings_options;
}
?>