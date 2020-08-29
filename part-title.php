<?php
/**
 *
 * Blackoot Lite WordPress Theme by Iceable Themes | https://www.iceablethemes.com
 *
 * Copyright 2014-2020 Iceable Themes - https://www.iceablethemes.com
 *
 * Page Title & Breadcrumbs
 *
 */

$blackoot_page_title = '';

if ( is_singular() ) :

	$blackoot_page_title = get_the_title();

else :

	/* 404 ERROR CONDITIONAL TITLE */
	if ( is_404() ) :
		$blackoot_page_title = __( '404: Page Not Found', 'blackoot-lite' );
	endif;

	/* SEARCH CONDITIONAL TITLE */
	if ( is_search() ) :
		// Translators: %s is the search term.
		$blackoot_page_title = sprintf( __( 'Search Results for "%s"', 'blackoot-lite' ), get_search_query() );
	endif;

	/* ARCHIVE CONDITIONAL TITLE */
	if ( is_archive() ) :
		$blackoot_page_title = get_the_archive_title();
	endif;

	/* DEFAULT BLOG INDEX TITLE */
	if ( is_home() && ! is_front_page() ) :
		/* If the blog index is not the front page
		 * then use the "posts page" (page_for_posts) title */
		$blackoot_page_for_posts = get_option( 'page_for_posts' );
		$blackoot_page_title = get_the_title( $blackoot_page_for_posts );
	endif;

endif;

if ( $blackoot_page_title ) :

	?>
	<div id="page-title">
		<div class="container">
			<?php
			if ( ! is_front_page() ) :
				?>
				<div id="breadcrumbs">
					<?php blackoot_breadcrumbs(); ?>
				</div>
				<?php
			endif;
			?>
			<h1><?php echo wp_kses( $blackoot_page_title, 'post' ); ?></h1>
		</div>
	</div>
	<?php

endif;
