<?php
/**
 *
 * Blackoot Lite WordPress Theme by Iceable Themes | https://www.iceablethemes.com
 *
 * Copyright 2014-2020 Iceable Themes - https://www.iceablethemes.com
 *
 * Main Index
 *
 */

get_header();

get_template_part( 'part-title' );

?>
<div id="main-content" class="container">
	<div id="page-container" class="with-sidebar">
		<?php

		if ( have_posts() ) :
			while ( have_posts() ) :

				the_post();

				?>
				<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

					<h2 class="entry-title">
						<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" rel="bookmark">
							<?php the_title(); ?>
						</a>
					</h2>

					<?php
					/* Post thumbnail (Featured Image) */
					if ( '' !== get_the_post_thumbnail() ) : // As recommended from the WP codex, has_post_thumbnail() is not reliable
						?>
						<div class="thumbnail">
							<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
								<?php
								the_post_thumbnail(
									'post-thumbnail',
									array(
										'class' => 'scale-with-grid',
									)
								);
								?>
							</a>
						</div>
						<?php
					endif;

					/* Post Metadata */
					?>
					<div class="postmetadata">
						<?php

						if ( 'post' === get_post_type() ) :

							/* Meta: Date */
							?>
							<span class="meta-date post-date updated"><i class="fa fa-calendar"></i><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" rel="bookmark">
								<?php
								the_time( get_option( 'date_format' ) );
								?>
							</a></span>
							<?php

							/* Meta: Author */
							$author = sprintf(
								'<a class="fn" href="%1$s" title="%2$s" rel="author">%3$s</a>',
								esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
								// Translators: %s is the author's name
								esc_attr( sprintf( __( 'View all posts by %s', 'blackoot-lite' ), get_the_author() ) ),
								get_the_author()
							);
							?>
							<span class="meta-author author vcard"><i class="fa fa-user"></i>
								<?php echo wp_kses_post( $author ); ?>
							</span>
							<?php

							/* Meta: Category */
							?>
							<div class="meta-category">
								<span class="category-icon" title="<?php esc_attr_e( 'Category', 'blackoot-lite' ); ?>"><i class="fa fa-tag"></i></span>
								<?php
								foreach ( get_the_category() as $category ) :
									echo '<a href="', esc_url( get_category_link( $category->term_id ) ), '">', esc_html( $category->cat_name ), '</a>';
								endforeach;
								?>
							</div>
							<?php

						endif;

						/* Meta: Comments */
						if ( ( comments_open() || '0' !== get_comments_number() ) ) :
							?>
							<span class="meta-comments"><i class="fa fa-comment"></i>
								<?php
								comments_popup_link(
									__( '0 Comment', 'blackoot-lite' ),
									__( '1 Comment', 'blackoot-lite' ),
									__( '% Comments', 'blackoot-lite' ),
									'',
									__( 'Comments Off', 'blackoot-lite' )
								);
								?>
							</span>
							<?php
						endif;

						/* Meta: Tags */
						if ( has_tag() ) :
							the_tags( '<div class="meta-tags"><span class="tags-icon"><i class="fa fa-tags"></i></span>', '', '</div>' );
						endif;

						/* Edit link (only for logged in users allowed to edit post) */
						edit_post_link(
							__( 'Edit', 'blackoot-lite' ),
							'<span class="editlink"><i class="fa fa-pencil"></i>',
							'</span>'
						);

						?>
					</div>
					<?php

					if (
						get_post_format()
						|| post_password_required()
						|| 'content' === get_theme_mod( 'blackoot_blog_index_content' )
					) :
						?>
						<div class="post-content entry-content">
						<?php
						the_content();
					else :
						?>
						<div class="post-content entry-summary">
						<?php
						the_excerpt();
					endif;

					?>
					</div>

				</div>

				<hr />
				<?php

			endwhile;

		else : // If there is no post in the loop

			if ( is_search() ) : // Empty search results

				?>
				<h2><?php esc_html_e( 'Not Found', 'blackoot-lite' ); ?></h2>
				<p>
					<?php
					echo sprintf(
						// Translators: %s is the search term
						esc_html__( 'Your search for "%s" did not return any result.', 'blackoot-lite' ),
						get_search_query()
					);
					?>
					<br />
					<?php esc_html_e( 'Would you like to try another search ?', 'blackoot-lite' ); ?>
				</p>
				<?php
				get_search_form();

			else : // Empty loop (this should never happen!)

				?>
				<h2><?php esc_html_e( 'Not Found', 'blackoot-lite' ); ?></h2>
				<p><?php esc_html_e( 'What you are looking for isn\'t here...', 'blackoot-lite' ); ?></p>
				<?php

			endif;

		endif;

		?>
		<div class="page_nav">
			<?php

			if ( null !== get_next_posts_link() ) :
				?>
				<div class="previous navbutton"><?php next_posts_link( '<i class="fa fa-angle-double-left"></i>' . __( 'Previous Posts', 'blackoot-lite' ) ); ?></div>
				<?php
			endif;

			if ( null !== get_previous_posts_link() ) :
				?>
				<div class="next navbutton"><?php previous_posts_link( __( 'Next Posts', 'blackoot-lite' ) . '<i class="fa fa-angle-double-right"></i>' ); ?></div>
				<?php
			endif;

			?>
		</div>

	</div>

	<div id="sidebar-container">
		<?php get_sidebar( 'sidebar' ); ?>
	</div>

</div>
<?php

get_footer();
