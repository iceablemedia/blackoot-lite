<?php
/**
 *
 * Blackoot Lite WordPress Theme by Iceable Themes | http://www.iceablethemes.com
 *
 * Copyright 2014-2016 Mathieu Sarrasin - Iceable Media
 *
 * Template Name: Full-width Page Template, No Sidebar
 *
 */

get_header();

get_template_part( 'part-title' );

?><div class="container" id="main-content"><?php

	?><div id="page-container" <?php post_class(); ?>><?php

	if(have_posts()) :
	while(have_posts()) : the_post();

				if ( '' != get_the_post_thumbnail() ):
				?><div class="thumbnail"><?php
					the_post_thumbnail('large', array('class' => 'scale-with-grid'));
				?></a></div><?php
				endif;

				the_content();
				$blackoot_link_pages_args = array(
						'before'           => '<br class="clear" /><div class="paged_nav"><span>' . __('Pages:', 'blackoot-lite') . '</span>',
						'after'            => '</div>',
						'link_before'      => '<span>',
						'link_after'       => '</span>',
						'next_or_number'   => 'number',
						'pagelink'         => '%',
						'echo'             => 1
					);
					wp_link_pages( $blackoot_link_pages_args );
				?><br class="clear" /><?php
				edit_post_link(__('Edit', 'blackoot-lite'), '<div class="postmetadata"><span class="editlink"><i class="fa fa-pencil"></i>', '</span></div>');

				// Display comments section only if comments are open or if there are comments already.
				if ( comments_open() || get_comments_number()!=0 ):
					?><div class="comments"><?php
					comments_template( '', true );
					next_comments_link(); previous_comments_link();
					?></div><?php
				endif;

	endwhile;

	else: // Empty loop (this should never happen!)

		?><h2><?php _e('Not Found', 'blackoot-lite'); ?></h2><?php
		?><p><?php _e('What you are looking for isn\'t here...', 'blackoot-lite'); ?></p><?php

	endif;

	?></div><?php // End page container

?></div><?php

get_footer(); ?>