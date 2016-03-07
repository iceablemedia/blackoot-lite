<?php
/**
 *
 * Blackoot Lite WordPress Theme by Iceable Themes | http://www.iceablethemes.com
 *
 * Copyright 2014-2016 Mathieu Sarrasin - Iceable Media
 *
 * Sidebar Template
 *
 */


?><ul id="sidebar"><?php
if ( ! dynamic_sidebar( 'sidebar' ) ):
	?><li id="recent" class="widget-container"><?php
		?><h3 class="widget-title"><?php _e( 'Recent Posts', 'blackoot-lite' ); ?></h3><?php
		?><ul><?php wp_get_archives( 'type=postbypost&limit=5' ); ?></ul><?php
	?></li><?php

	?><li id="archives" class="widget-container"><?php
		?><h3 class="widget-title"><?php _e( 'Archives', 'blackoot-lite' ); ?></h3><?php
		?><ul><?php wp_get_archives( 'type=monthly' ); ?></ul><?php
	?></li><?php

	?><li id="meta" class="widget-container"><?php
		?><h3 class="widget-title"><?php _e( 'Meta', 'blackoot-lite' ); ?></h3><?php
			?><ul><?php
				wp_register();
				?><li><?php wp_loginout(); ?></li><?php
				wp_meta();
			?></ul><?php
	?></li><?php
endif;
?></ul>