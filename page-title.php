<?php
/**
 *
 * Blackoot Lite WordPress Theme by Iceable Themes | http://www.iceablethemes.com
 *
 * Copyright 2014 Mathieu Sarrasin - Iceable Media
 *
 * Page Title & Breadcrumbs
 *
 */

$title = '';

if ( is_singular() ):

	$title = get_the_title();

else:

	/* 404 ERROR CONDITIONAL TITLE */
	if (is_404()):
		$title =  __('404: Page Not Found', 'blackoot');
	endif;

	/* SEARCH CONDITIONAL TITLE */
	if ( is_search() ):
		$title = sprintf( __('Search Results for "%s"', 'blackoot'), get_search_query() );
	endif;
	
	/* TAG CONDITIONAL TITLE */
	if ( is_tag() ):
		$title = sprintf( __('Tag: %s', 'blackoot'), single_tag_title('', false) );
	endif;
				
	/* CATEGORY CONDITIONAL TITLE */
	if ( is_category() ):
		$title = sprintf( __('Category: %s', 'blackoot'), single_cat_title('', false) );
	endif;

	/* ARCHIVES CONDITIONAL TITLE */
	if ( is_day() ):
		$title = sprintf( __('Daily archives: %s', 'blackoot'), get_the_time('F jS, Y') );
	endif;
	
	if ( is_month() ):
		$title = sprintf( __('Monthly archives: %s', 'blackoot'), get_the_time('F, Y') );
	endif;

	if ( is_year() ):
		$title = sprintf( __('Yearly archives: %s', 'blackoot'), get_the_time('Y') );
	endif;
	
	/* DEFAULT BLOG INDEX TITLE */
	if ( is_home() ):
		$show_on_front = get_option('show_on_front');
		/* If settings > reading > Front page display: latest posts */
		/* Use theme options > Blog settings for blog index */
		if( $show_on_front == 'page' ):
			$page_for_posts = get_option('page_for_posts');
			$title = get_the_title($page_for_posts);
		endif;
	endif;

endif;

if ($title):
	?><div id="page-title"><div class="container"><?php
				if ( ! is_front_page() ):
				?><div id="breadcrumbs"><?php blackoot_breadcrumbs(); ?></div><?php
				endif;
			?><h1><?php echo $title; ?></h1><?php
	?></div></div><?php
endif;

?>