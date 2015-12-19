<?php
/**
 *
 * Blackoot Lite WordPress Theme by Iceable Themes | http://www.iceablethemes.com
 *
 * Copyright 2014 Mathieu Sarrasin - Iceable Media
 *
 * Header Template
 *
 */
?><!DOCTYPE html>
<!--[if lt IE 7 ]><html class="ie ie6" <?php language_attributes(); ?>><![endif]-->
<!--[if IE 7 ]><html class="ie ie7" <?php language_attributes(); ?>><![endif]-->
<!--[if IE 8 ]><html class="ie ie8" <?php language_attributes(); ?>><![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--><html <?php language_attributes(); ?>><!--<![endif]-->
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
<!--[if IE]><meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"><![endif]-->
<title><?php wp_title( '|', true, 'right' ); ?></title>
<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
<?php $favicon = blackoot_get_option('favicon');
if ($favicon): ?><link rel="shortcut icon" href="<?php echo esc_url($favicon); ?>" /><?php endif; ?>
<?php // Loads HTML5 JavaScript file to add support for HTML5 elements in older IE versions. ?>
<!--[if lt IE 9]>
<script src="<?php echo get_template_directory_uri(); ?>/js/html5.js" type="text/javascript"></script>
<![endif]-->
<?php wp_head(); ?>
</head><body <?php body_class(); ?>><?php

?><div id="main-wrap"><?php

	?><div id="header-wrap"><?php

		?><div id="tophead-wrap"><div class="container"><?php
				?><div class="tophead"><?php
						echo get_search_form();
				?></div><?php
		?></div></div><?php

		?><div id="header"><?php
			?><div class="container"><?php
				?><div id="logo"><a href="<?php echo esc_url( home_url() ); ?>"><?php
					$logo_url = blackoot_get_option('logo');
					if ( blackoot_get_option('header_title') == 'Display Title' || $logo_url == "" ):
						?><h1 class="site-title"><?php echo bloginfo('name'); ?></h1><?php
					else:
						?><img src="<?php echo esc_url( $logo_url ); ?>" alt="<?php bloginfo('name') ?>"><?php
					endif;
				?></a></div><?php // End #logo

			if ( "On" == blackoot_get_option('header_tagline') ):
				?><div id="tagline"><?php bloginfo('description'); ?></div><?php
			endif;

			?></div><?php // End .container
		?></div><?php // End #header

		?><div id="nav-wrap"><?php
				?><div id="navbar" class="container"><?php
					wp_nav_menu( array( 'theme_location' => 'primary',
						'items_wrap' => '<ul id="%1$s" class="%2$s sf-menu">%3$s</ul>',
						) );
					blackoot_dropdown_nav_menu();
				?></div><?php // End #navbar
		?></div><?php // End #nav-wrap
	?></div><?php // End #header-wrap

		if ( get_custom_header()->url ) :
			if ( ( is_front_page() && blackoot_get_option('home_header_image') != 'Off' )
				|| ( is_page() && !is_front_page() && blackoot_get_option('pages_header_image') != 'Off' )
				|| ( is_single() && blackoot_get_option('single_header_image') != 'Off' )
				|| ( !is_front_page() && !is_singular() && blackoot_get_option('blog_header_image') != 'Off' )
				|| ( is_404() ) ):

	?><div id="header-image" class="container"><?php
		?><img src="<?php header_image(); ?>" height="<?php echo get_custom_header()->height; ?>" width="<?php echo get_custom_header()->width; ?>" alt="" /><?php
	?></div><?php

			endif;
		endif; ?>