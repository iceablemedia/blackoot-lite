<?php
/**
 *
 * Blackoot Lite WordPress Theme by Iceable Themes | https://www.iceablethemes.com
 *
 * Copyright 2014-2017 Mathieu Sarrasin - Iceable Media
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
		$title =  __('404: Page Not Found', 'blackoot-lite');
	endif;

	/* SEARCH CONDITIONAL TITLE */
	if ( is_search() ):
		$title = sprintf( __('Search Results for "%s"', 'blackoot-lite'), get_search_query() );
	endif;

	/* ARCHIVE CONDITIONAL TITLE */
  if ( is_archive() ):
    $title = get_the_archive_title();
  endif;

	/* DEFAULT BLOG INDEX TITLE */
	if ( is_home() && !is_front_page() ):
		/* If the blog index is not the front page
		 * then use the "posts page" (page_for_posts) title */
		$page_for_posts = get_option('page_for_posts');
		$title = get_the_title($page_for_posts);
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
