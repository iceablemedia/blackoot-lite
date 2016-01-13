<?php
/**
 *
 * Blackoot Lite WordPress Theme by Iceable Themes | http://www.iceablethemes.com
 *
 * Copyright 2014-2016 Mathieu Sarrasin - Iceable Media
 *
 * Single Post Template
 *
 */

get_header();
get_template_part( 'part-title' );

?><div class="container" id="main-content"><?php

	?><div id="page-container" class="with-sidebar"><?php

	if(have_posts()):
	while(have_posts()) : the_post();

		?><div id="post-<?php the_ID(); ?>" <?php post_class("single-post"); ?>><?php

		/* Post Metadata */
		?><div class="postmetadata"><?php

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

		/* Post thumbnail (Featured Image) */
		if ( '' != get_the_post_thumbnail() ) : // As recommended from the WP codex, has_post_thumbnail() is not reliable
			?><div class="thumbnail"><?php
			the_post_thumbnail('full', array('class' => 'scale-with-grid'));
			?></div><?php
		endif;

		?><div class="post-contents"><?php

			the_content();
			?><div class="clear"></div><?php
			$args = array(
				'before'           => '<br class="clear" /><div class="paged_nav"><span>' . __('Pages:', 'blackoot-lite') . '</span>',
				'after'            => '</div>',
				'link_before'      => '<span>',
				'link_after'       => '</span>',
				'next_or_number'   => 'number',
				'nextpagelink'     => __('Next page', 'blackoot-lite'),
				'previouspagelink' => __('Previous page', 'blackoot-lite'),
				'pagelink'         => '%',
				'echo'             => 1
			);
			wp_link_pages( $args );

		?></div><br class="clear" /></div><?php // end div post

		blackoot_article_nav();

		// Display comments section only if comments are open or if there are comments already.
		if ( comments_open() || get_comments_number()!=0 ):
			?><hr /><div class="comments"><?php
				comments_template( '', true );
			?></div><?php // end comment section

			blackoot_article_nav();
		endif;

	endwhile;

	else: // Empty loop (this should never happen!)

		?><h2><?php _e('Not Found', 'blackoot-lite'); ?></h2>
		<p><?php _e('What you are looking for isn\'t here...', 'blackoot-lite'); ?></p><?php

	endif;

	?></div><?php // End page container

		?><div id="sidebar-container"><?php
			get_sidebar();
		?></div><?php // End sidebar column

	?></div><?php

get_footer(); ?>