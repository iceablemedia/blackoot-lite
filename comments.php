<?php
/**
 *
 * Blackoot Lite WordPress Theme by Iceable Themes | https://www.iceablethemes.com
 *
 * Copyright 2014-2017 Mathieu Sarrasin - Iceable Media
 *
 * Comments template
 *
 */

if ( post_password_required() ) {
	?>
	<p class="nocomments"><?php esc_html_e( 'This post is password protected. Enter the password to view comments.', 'blackoot-lite' ); ?></p>
	<?php
	return;
}

if ( have_comments() ) :

	?>
	<h3 id="comments">
		<?php
		printf(
			// Translators: %1$s is the number of comments, %2$s is the post title
			esc_html( _n( '%1$s Response to %2$s', '%1$s Responses to %2$s', get_comments_number(), 'blackoot-lite' ) ),
			esc_html( number_format_i18n( get_comments_number() ) ),
			get_the_title()
		);
		?>
	</h3>

	<ol class="commentlist">
		<?php
		wp_list_comments(
			array(
				'avatar_size' => 64,
			)
		);
		?>
	</ol>
	<?php

	if ( blackoot_page_has_comments_nav() ) :
		?>
		<div class="comments_nav">
		<?php
		if ( blackoot_page_has_previous_comments_link() ) :
			?>
			<div class="previous navbutton">
				<?php previous_comments_link( '<i class="fa fa-angle-double-left"></i>' . __( 'Older comments', 'blackoot-lite' ) ); ?>
			</div>
			<?php
		endif;

		if ( blackoot_page_has_next_comments_link() ) :
			?>
			<div class="next navbutton">
				<?php next_comments_link( __( 'Newer comments', 'blackoot-lite' ) . '<i class="fa fa-angle-double-right"></i>' ); ?>
			</div>
			<?php
		endif;
	?>
	</div>
	<?php
	endif;

else : // If there are no comments yet

	if ( ! comments_open() ) : // If comments are closed
		?>
		<p class="nocomments"><?php esc_html_e( 'Comments are closed.', 'blackoot-lite' ); ?></p>
		<?php
	endif;

endif;

if ( comments_open() ) :
	comment_form();
endif;
