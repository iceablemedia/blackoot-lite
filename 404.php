<?php
/**
 *
 * Blackoot Lite WordPress Theme by Iceable Themes | http://www.iceablethemes.com
 *
 * Copyright 2014-2016 Mathieu Sarrasin - Iceable Media
 *
 * 404 Page Template
 *
 */

get_header();
get_template_part( 'part-title' );

?><div class="container" id="main-content"><?php

?><div id="page-container" class="with-sidebar"><?php

?><h2><?php _e('Page Not Found', 'blackoot-lite'); ?></h2><?php
?><p><?php _e('What you are looking for isn\'t here...', 'blackoot-lite'); ?></p><?php
?><p><?php _e('Maybe a search will help ?', 'blackoot-lite'); ?></p><?php
?><p><?php get_search_form(); ?></p><?php

?></div><?php

?><div id="sidebar-container"><ul id="sidebar"><?php
	get_sidebar();
?></ul></div><?php // End sidebar

?></div><?php // End main content

get_footer(); ?>