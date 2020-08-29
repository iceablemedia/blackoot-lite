<?php
/**
 *
 * Blackoot Lite WordPress Theme by Iceable Themes | https://www.iceablethemes.com
 *
 * Copyright 2014-2020 Iceable Themes - https://www.iceablethemes.com
 *
 * Theme's Function
 *
 */

/*
 * Theme constants
 */
define( 'BLACKOOT_THEME_DIR', get_template_directory() );
define( 'BLACKOOT_THEME_DIR_URI', get_template_directory_uri() );
define( 'BLACKOOT_STYLESHEET_DIR', get_stylesheet_directory() );
define( 'BLACKOOT_STYLESHEET_DIR_URI', get_stylesheet_directory_uri() );
$blackoot_the_theme = wp_get_theme();
define( 'BLACKOOT_THEME_VERSION', $blackoot_the_theme->get( 'Version' ) );

/*
 * Setup and registration functions
 */
function blackoot_setup() {

	/* Translation support
	 * Translations can be added to the /languages directory.
	 * A .pot template file is included to get you started
	 */
	load_theme_textdomain( 'blackoot-lite', BLACKOOT_THEME_DIR . '/languages' );

	// Content Width
	global $content_width;
	if ( ! isset( $content_width ) ) :
		$content_width = 680;
	endif;

	/* Feed links support */
	add_theme_support( 'automatic-feed-links' );

	/* Register menus */
	register_nav_menu( 'primary', 'Navigation menu' );
	register_nav_menu( 'footer-menu', 'Footer menu' );

	/* Title tag support */
	add_theme_support( 'title-tag' );

	/* Post Thumbnails Support */
	add_theme_support( 'post-thumbnails' );
	set_post_thumbnail_size( 680, 300, true );

	/* Custom header support */
	add_theme_support(
		'custom-header',
		array(
			'header-text' => false,
			'width'       => 1000,
			'height'      => 364,
			'flex-height' => true,
		)
	);

	/* Custom background support */
	add_theme_support(
		'custom-background',
		array(
			'default-color' => '111111',
			'default-image' => BLACKOOT_THEME_DIR_URI . '/img/zwartevilt.png',
		)
	);

	/* Support HTML5 Search Form */
	add_theme_support( 'html5', array( 'search-form' ) );

}
add_action( 'after_setup_theme', 'blackoot_setup' );

/* Adjust $content_width depending on the page being displayed */
function blackoot_content_width() {

	global $content_width;

	if ( is_page_template( 'page-full-width.php' ) ) :
		$content_width = 920;
	endif;

}
add_action( 'template_redirect', 'blackoot_content_width' );

/*
 * Add a home link to wp_page_menu() ( wp_nav_menu() fallback )
 */
function blackoot_page_menu_args( $args ) {

	if ( ! isset( $args['show_home'] ) ) :
		$args['show_home'] = true;
	endif;

	return $args;

}
add_filter( 'wp_page_menu_args', 'blackoot_page_menu_args' );

/*
 * Register Sidebar and Footer widgetized areas
 */
function blackoot_widgets_init() {

	register_sidebar(
		array(
			'name'          => __( 'Default Sidebar', 'blackoot-lite' ),
			'id'            => 'sidebar',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		)
	);

	register_sidebar(
		array(
			'name'          => __( 'Footer', 'blackoot-lite' ),
			'id'            => 'footer-sidebar',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		)
	);

}
add_action( 'widgets_init', 'blackoot_widgets_init' );

/*
 * Enqueue styles
 */
function blackoot_styles() {

	$responsive_mode = get_theme_mod( 'blackoot_responsive_mode' );

	if ( 'off' !== $responsive_mode ) :
		$stylesheet = '/css/blackoot.min.css';
	else :
		$stylesheet = '/css/blackoot-unresponsive.min.css';
	endif;

	/* Child theme support:
	 * Enqueue child-theme's versions of stylesheet in /css if they exist,
	 * or the parent theme's version otherwise
	 */
	wp_register_style( 'blackoot', get_theme_file_uri( $stylesheet ), array(), BLACKOOT_THEME_VERSION );

	// Enqueue style.css from the current theme
	wp_register_style( 'blackoot-style', get_theme_file_uri( 'style.css' ), array(), BLACKOOT_THEME_VERSION );

	// Load font-awesome
	wp_register_style( 'font-awesome', get_theme_file_uri( 'css/font-awesome/css/font-awesome.min.css' ), array(), BLACKOOT_THEME_VERSION );

	wp_enqueue_style( 'blackoot' );
	wp_enqueue_style( 'blackoot-style' );
	wp_enqueue_style( 'font-awesome' );

	wp_enqueue_style( 'blackoot-webfonts', '//fonts.googleapis.com/css?family=Open+Sans:400italic,700italic,400,700|Quicksand:400italic,700italic,400,700&subset=latin,latin-ext', array(), null );

}
add_action( 'wp_enqueue_scripts', 'blackoot_styles' );

/*
 * Register editor style
 */
function blackoot_editor_styles() {
	add_editor_style( 'css/editor-style.css' );
}
add_action( 'init', 'blackoot_editor_styles' );

/*
 * Enqueue javascripts
 */
function blackoot_scripts() {

	wp_enqueue_script( 'blackoot', get_theme_file_uri( '/js/blackoot.min.js' ), array( 'jquery', 'hoverIntent' ), BLACKOOT_THEME_VERSION );
	// Loads HTML5 JavaScript file to add support for HTML5 elements for IE < 9.
	wp_enqueue_script( 'html5shiv', get_theme_file_uri( '/js/html5.js' ), array(), BLACKOOT_THEME_VERSION );

	// Add conditional for HTML5Shiv to only load for IE < 9
	wp_script_add_data( 'html5shiv', 'conditional', 'lt IE 9' );

	/* Threaded comments support */
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) :
		wp_enqueue_script( 'comment-reply' );
	endif;

}
add_action( 'wp_enqueue_scripts', 'blackoot_scripts' );

/*
 * Remove rel tags in category links (HTML5 invalid)
 */
function blackoot_remove_rel_cat( $text ) {

	$text = str_replace( ' rel="category"', '', $text );
	$text = str_replace( ' rel="category tag"', ' rel="tag"', $text );

	return $text;

}
add_filter( 'the_category', 'blackoot_remove_rel_cat' );

/*
 * Customize "Read More" links on index view
 */
function blackoot_excerpt_more( $more ) {

	return '... <div class="read-more navbutton"><a href="' . get_permalink( get_the_ID() ) . '">' . __( 'Read More', 'blackoot-lite' ) . '<i class="fa fa-angle-double-right"></i></a></div>';

}
add_filter( 'excerpt_more', 'blackoot_excerpt_more' );

function blackoot_content_more( $more ) {

	global $post;

	return '<div class="read-more navbutton"><a href="' . get_permalink() . '#more-' . $post->ID . '">' . __( 'Read More', 'blackoot-lite' ) . '<i class="fa fa-angle-double-right"></i></a></div>';

}
add_filter( 'the_content_more_link', 'blackoot_content_more' );

/*
 * Rewrite and replace wp_trim_excerpt() so it adds a relevant read more link
 * when the <!--more--> or <!--nextpage--> quicktags are used
 * This new function preserves every features and filters from the original wp_trim_excerpt
 */
function blackoot_trim_excerpt( $text = '' ) {

	global $post;
	$raw_excerpt = $text;

	if ( '' === $text ) :

		$text = get_the_content( '' );
		$text = strip_shortcodes( $text );
		$text = apply_filters( 'the_content', $text );
		$text = str_replace( ']]>', ']]&gt;', $text );
		$excerpt_length = apply_filters( 'excerpt_length', 55 );
		$excerpt_more = apply_filters( 'excerpt_more', ' [&hellip;]' );
		$text = wp_trim_words( $text, $excerpt_length, $excerpt_more );

		/* If the post_content contains a <!--more--> OR a <!--nextpage--> quicktag
		 * AND the more link has not been added already
		 * then we add it now
		 */
		if ( ( preg_match( '/<!--more(.*?)?-->/', $post->post_content ) || preg_match( '/<!--nextpage-->/', $post->post_content ) ) && strpos( $text, $excerpt_more ) === false ) :
			$text .= $excerpt_more;
		endif;

	else : // Manual excerpt is set

		$excerpt_more = apply_filters( 'excerpt_more', ' [&hellip;]' );
		$text .= $excerpt_more;

	endif;

	return apply_filters( 'blackoot_trim_excerpt', $text, $raw_excerpt );

}
remove_filter( 'get_the_excerpt', 'wp_trim_excerpt' );
add_filter( 'get_the_excerpt', 'blackoot_trim_excerpt' );

/*
 * Create dropdown menu (used in responsive mode)
 * Requires a custom menu to be set (won't work with fallback menu)
 */
function blackoot_dropdown_nav_menu() {

	$menu_name = 'primary';
	$locations = get_nav_menu_locations();

	if ( ( $locations ) && isset( $locations[ $menu_name ] ) ) :

		$menu = wp_get_nav_menu_object( $locations[ $menu_name ] );

		if ( $menu ) :

			$menu_items = wp_get_nav_menu_items( $menu->term_id );
			$menu_list  = '<select id="dropdown-menu">';
			$menu_list .= '<option value="">Menu</option>';

			foreach ( (array) $menu_items as $key => $menu_item ) :

				$title = $menu_item->title;
				$url = $menu_item->url;
				if ( $menu_item->menu_item_parent && $menu_item->menu_item_parent > 0 ) :
					$menu_list .= '<option value="' . esc_url( $url ) . '"> &raquo; ' . esc_html( $title ) . '</option>';
				else :
					$menu_list .= '<option value="' . esc_url( $url ) . '">' . esc_html( $title ) . '</option>';
				endif;

			endforeach;

			$menu_list .= '</select>';

			// $menu_list is now ready to output
			echo $menu_list; // WPCS: XSS ok.

		endif;

	endif;

}

/*
 * Article Nav (Previous/Next post, for use in single.php)
 */
function blackoot_article_nav() {

	if ( '' !== get_adjacent_post( false, '', false ) || '' !== get_adjacent_post( false, '', true ) ) :

		echo '<div class="article_nav">';

		if ( '' !== get_adjacent_post( false, '', false ) ) : // Is there a previous post?
			echo '<div class="next navbutton">',
				next_post_link( '%link', __( 'Next Post', 'blackoot-lite' ) . '<i class="fa fa-angle-double-right"></i>' ),
				'</div>';
		endif;

		if ( '' !== get_adjacent_post( false, '', true ) ) : // Is there a next post?
			echo '<div class="previous navbutton">',
				previous_post_link( '%link', '<i class="fa fa-angle-double-left"></i>' . __( 'Previous Post', 'blackoot-lite' ) ),
				'</div>';
		endif;

		echo '<br class="clear" /></div>';

	endif;

}

/*
 * Find whether post page needs comments pagination links (used in comments.php)
 */
function blackoot_page_has_comments_nav() {
	global $wp_query;
	return ($wp_query->max_num_comment_pages > 1);
}

function blackoot_page_has_next_comments_link() {
	global $wp_query;
	$max_cpage = $wp_query->max_num_comment_pages;
	$cpage = get_query_var( 'cpage' );
	return ( $max_cpage > $cpage );
}

function blackoot_page_has_previous_comments_link() {
	$cpage = get_query_var( 'cpage' );
	return ($cpage > 1);
}

/*
 * Find whether attachement page needs navigation links (used in single.php)
 */
function blackoot_adjacent_image_link( $prev = true ) {

	global $post;
	$the_post = get_post( $post );
	$attachments = array_values(
		get_children(
			'post_parent=' . $the_post->post_parent . '&post_type=attachment&post_mime_type=image&orderby="menu_order ASC, ID ASC"'
		)
	);

	foreach ( $attachments as $k => $attachment ) :

		if ( $attachment->ID === $post->ID ) :
			break;
		endif;

		$k = $prev ? $k - 1 : $k + 1;

	endforeach;

	if ( isset( $attachments[ $k ] ) ) :
		return true;
	else :
		return false;
	endif;

}

/*
 * Generate breadcrumbs
 */
function blackoot_breadcrumbs() {

	global $post;

	if ( ! is_front_page() ) :

		echo '<a href="', esc_url( home_url() ), '">', esc_html__( 'Home', 'blackoot-lite' ), '</a><span class="separator"> / </span>';

		if ( is_home() ) :

			$page_for_posts = get_option( 'page_for_posts' );
			echo get_the_title( $page_for_posts );

		elseif ( is_single() ) :

			// Use categories as breadcrumbs for single posts
			the_category( '<span class="separator"> / </span>' );
			echo '<span class="separator"> / </span>', get_the_title();

		elseif ( is_page() ) :

			$output = '';
			if ( $post->post_parent ) :
				$anc = get_post_ancestors( $post->ID );
				foreach ( $anc as $ancestor ) :
					$title_attribute_args = array(
						'echo' => false,
						'post' => $ancestor,
					);
					$output = '<a href="' . esc_url( get_permalink( $ancestor ) ) . '" title="' . the_title_attribute( $title_attribute_args ) . '">' . get_the_title( $ancestor ) . '</a><span class="separator"> / </span>' . $output;
				endforeach;
				echo wp_kses_post( $output );
			endif;
			the_title();

		elseif ( is_archive() ) :

			the_archive_title();

		elseif ( is_search() ) :

			esc_html_e( 'Search Results', 'blackoot-lite' );

		elseif ( is_404() ) :

			esc_html_e( '404 Error', 'blackoot-lite' );

		endif;

	endif;

}

/*
 * Customizer
 */
require_once 'inc/customizer/customizer.php';
