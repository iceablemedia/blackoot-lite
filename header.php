<?php
/**
 *
 * Blackoot Lite WordPress Theme by Iceable Themes | http://www.iceablethemes.com
 *
 * Copyright 2014-2016 Mathieu Sarrasin - Iceable Media
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
<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
<?php if ( ! function_exists('wp_site_icon') ) :
	$favicon = get_theme_mod('blackoot_favicon');
	if ($favicon):
		?><link rel="shortcut icon" href="<?php echo esc_url($favicon); ?>" /><?php
	endif;
endif;
?>
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
				?><div id="logo"><a href="<?php echo esc_url( home_url() ); ?>" title='<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>' rel='home'><?php
					if ( get_theme_mod( 'blackoot_logo' ) ) :
						?><h1 class="site-title" style="display:none"><?php echo bloginfo('name'); ?></h1><?php
						?><img src="<?php echo esc_url( get_theme_mod( 'blackoot_logo' ) ); ?>" alt="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>"><?php
					else:
						?><h1 class="site-title"><?php echo bloginfo('name'); ?></h1><?php
					endif;
				?></a></div><?php // End #logo

			if ( get_bloginfo ( 'description' ) ):
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
			if ( ( is_front_page() && get_theme_mod('home_header_image') != 'off' )
				|| ( is_page() && !is_front_page() && get_theme_mod('pages_header_image') != 'off' )
				|| ( is_single() && get_theme_mod('single_header_image') != 'off' )
				|| ( !is_front_page() && !is_singular() && get_theme_mod('blog_header_image') != 'off' )
				|| ( is_404() ) ):

	?><div id="header-image" class="container"><?php
		?><img src="<?php header_image(); ?>" height="<?php echo get_custom_header()->height; ?>" width="<?php echo get_custom_header()->width; ?>" alt="" /><?php
	?></div><?php

			endif;
		endif; ?>