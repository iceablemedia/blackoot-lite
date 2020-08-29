<?php
/**
 *
 * Blackoot Lite WordPress Theme by Iceable Themes | https://www.iceablethemes.com
 *
 * Copyright 2014-2020 Iceable Themes - https://www.iceablethemes.com
 *
 * 404 Page Template
 *
 */

get_header();
get_template_part( 'part-title' );

?>
<div class="container" id="main-content">
	<div id="page-container" class="with-sidebar">
		<h2><?php esc_html_e( 'Page Not Found', 'blackoot-lite' ); ?></h2>
		<p><?php esc_html_e( 'What you are looking for isn\'t here...', 'blackoot-lite' ); ?></p>
		<p><?php esc_html_e( 'Maybe a search will help ?', 'blackoot-lite' ); ?></p>
		<p><?php get_search_form(); ?></p>
	</div>

	<div id="sidebar-container"><ul id="sidebar">
		<?php get_sidebar(); ?>
	</ul></div>

</div>
<?php

get_footer();
