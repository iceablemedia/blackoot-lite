<?php
/**
 *
 * Blackoot Lite WordPress Theme by Iceable Themes | http://www.iceablethemes.com
 *
 * Copyright 2014-2016 Mathieu Sarrasin - Iceable Media
 *
 * Main Index
 *
 */

get_header();

get_template_part( 'part-title' );

?><div id="main-content" class="container"><?php

?><div id="page-container" class="with-sidebar"><?php

		if(have_posts()):
		while(have_posts()) : the_post();

?><div id="post-<?php the_ID(); ?>" <?php post_class(); ?>><?php

	?><h3 class="entry-title"><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" rel="bookmark"><?php
		the_title();
	?></a></h3><?php

	/* Post thumbnail (Featured Image) */
		if ( '' != get_the_post_thumbnail() ) : // As recommended from the WP codex, has_post_thumbnail() is not reliable
		?><div class="thumbnail">
		<a href="<?php echo get_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php
		the_post_thumbnail('post-thumbnail', array('class' => 'scale-with-grid')); ?></a></div><?php
	endif;

	/* Post Metadata */
	?><div class="postmetadata"><?php

	if ( get_post_type() == 'post' ):

		/* Meta: Date */
		?><span class="meta-date post-date updated"><i class="fa fa-calendar"></i><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" rel="bookmark"><?php
			the_time( get_option( 'date_format' ) ); ?>
		</a></span><?php

		/* Meta: Author */
		$author = sprintf( '<a class="fn" href="%1$s" title="%2$s" rel="author">%3$s</a>',
			esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
			esc_attr( sprintf( __( 'View all posts by %s', 'blackoot-lite' ), get_the_author() ) ),
			get_the_author() );
		?><span class="meta-author author vcard"><i class="fa fa-user"></i><?php echo $author; ?></span><?php

		/* Meta: Category */
		?><div class="meta-category"><span class="category-icon" title="<?php _e('Category', 'blackoot-lite'); ?>"><i class="fa fa-tag"></i></span><?php
			foreach((get_the_category()) as $category):
				echo '<a href="', get_category_link($category->term_id ), '">', $category->cat_name, '</a>';
			endforeach;
		?></div><?php

	endif;

	/* Meta: Comments */
	if ( ( comments_open() || get_comments_number()!=0 ) ):
	?><span class="meta-comments"><i class="fa fa-comment"></i><?php
		comments_popup_link( __( '0 Comment', 'blackoot-lite' ), __( '1 Comment', 'blackoot-lite' ), __( '% Comments', 'blackoot-lite' ), '', __('Comments Off', 'blackoot-lite') );
	?></span><?php
	endif;

	/* Meta: Tags */
	if ( has_tag() ):
		the_tags('<div class="meta-tags"><span class="tags-icon"><i class="fa fa-tags"></i></span>', '', '</div>');
	endif;

	/* Edit link (only for logged in users allowed to edit post) */
	edit_post_link(__('Edit', 'blackoot-lite'), '<span class="editlink"><i class="fa fa-pencil"></i>', '</span>');

	 ?></div><?php // End metadata

		?><div class="post-content"><?php
				if ( get_post_format() || post_password_required()
				|| "content" == get_theme_mod('blackoot_blog_index_content') )
						the_content();
					else the_excerpt();
		?></div><?php

		?></div><?php // end div post

		?><hr /><?php

		endwhile;

		else: // If there is no post in the loop

			if ( is_search() ): // Empty search results

			?><h2><?php _e('Not Found', 'blackoot-lite'); ?></h2><?php
			?><p><?php echo sprintf( __('Your search for "%s" did not return any result.', 'blackoot-lite'), get_search_query() ); ?><br /><?php
			_e('Would you like to try another search ?', 'blackoot-lite'); ?></p><?php
			get_search_form();

			else: // Empty loop (this should never happen!)

			?><h2><?php _e('Not Found', 'blackoot-lite'); ?></h2><?php
			?><p><?php _e('What you are looking for isn\'t here...', 'blackoot-lite'); ?></p><?php

			endif;

		endif;

		?><div class="page_nav"><?php

		if ( null != get_next_posts_link() ):
			?><div class="previous navbutton"><?php next_posts_link( '<i class="fa fa-angle-double-left"></i>' . __('Previous Posts', 'blackoot-lite') ); ?></div><?php
			endif;
			if ( null != get_previous_posts_link() ):
			?><div class="next navbutton"><?php previous_posts_link( __('Next Posts', 'blackoot-lite') . '<i class="fa fa-angle-double-right"></i>' ); ?></div><?php
			endif;
		?></div><?php

		?></div><?php // End page container

		?><div id="sidebar-container"><?php
			get_sidebar('sidebar');
		?></div><?php

	?></div><?php //  End main content

get_footer(); ?>