<?php
/**
 *
 * Blackoot Lite WordPress Theme by Iceable Themes | http://www.iceablethemes.com
 *
 * Copyright 2014-2016 Mathieu Sarrasin - Iceable Media
 *
 * Theme's Function
 *
 */

/*
 * Setup and registration functions
 */
function blackoot_setup(){

	/* Translation support
	 * Translations can be added to the /languages directory.
	 * A .pot template file is included to get you started
	 */
	load_theme_textdomain('blackoot-lite', get_template_directory() . '/languages');

	// Content Width
	global $content_width;
	if ( ! isset( $content_width ) ) $content_width = 680;

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
	add_theme_support( 'custom-header',
						array(	'header-text' => false,
								'width' => 1000,
								'height' => 364,
								'flex-height' => true,
								)
					);

	/* Custom background support */
	add_theme_support( 'custom-background',
						array(	'default-color' => '111111',
								'default-image' => get_template_directory_uri() . '/img/zwartevilt.png',
								)
					);

}
add_action('after_setup_theme', 'blackoot_setup');

/* Adjust $content_width depending on the page being displayed */
function blackoot_content_width() {
	global $content_width;
	if ( is_page_template( 'page-full-width.php' ) )
		$content_width = 920;
}
add_action( 'template_redirect', 'blackoot_content_width' );

/*
 * Page title (for WordPress < 4.1 )
 */
if ( ! function_exists( '_wp_render_title_tag' ) ) :
	function blackoot_render_title() {
		?><title><?php wp_title( '|', true, 'right' ); ?></title><?php
	}
	add_action( 'wp_head', 'blackoot_render_title' );
endif;

/*
 * Add a home link to wp_page_menu() ( wp_nav_menu() fallback )
 */
function blackoot_page_menu_args( $args ) {
	if ( ! isset( $args['show_home'] ) )
		$args['show_home'] = true;
	return $args;
}
add_filter( 'wp_page_menu_args', 'blackoot_page_menu_args' );

/*
 * Add parent Class to parent menu items
 */
function blackoot_add_menu_parent_class( $items ) {
	$parents = array();
	foreach ( $items as $item ) {
		if ( $item->menu_item_parent && $item->menu_item_parent > 0 ) {
			$parents[] = $item->menu_item_parent;
		}
	}
	foreach ( $items as $item ) {
		if ( in_array( $item->ID, $parents ) ) {
			$item->classes[] = 'menu-parent-item';
		}
	}
	return $items;
}
add_filter( 'wp_nav_menu_objects', 'blackoot_add_menu_parent_class' );

/*
 * Register Sidebar and Footer widgetized areas
 */
function blackoot_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Default Sidebar', 'blackoot-lite' ),
		'id'            => 'sidebar',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
		)
	);

	register_sidebar( array(
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

	$template_directory_uri = get_template_directory_uri(); // Parent theme URI
	$stylesheet_directory_uri = get_stylesheet_directory_uri(); // Current theme URI
	$stylesheet_directory = get_stylesheet_directory(); // Current theme directory

	$responsive_mode = get_theme_mod('blackoot_responsive_mode');

	if ($responsive_mode != 'off'):
		$stylesheet = '/css/blackoot.min.css';
	else:
		$stylesheet = '/css/blackoot-unresponsive.min.css';
	endif;

	/* Child theme support:
	 * Enqueue child-theme's versions of stylesheet in /css if they exist,
	 * or the parent theme's version otherwise
	 */
	if ( @file_exists( $stylesheet_directory . $stylesheet ) )
		wp_register_style( 'blackoot', $stylesheet_directory_uri . $stylesheet );
	else
		wp_register_style( 'blackoot', $template_directory_uri . $stylesheet );

	// Always enqueue style.css from the current theme
	wp_register_style( 'blackoot-style', $stylesheet_directory_uri . '/style.css');

	wp_enqueue_style( 'blackoot' );
	wp_enqueue_style( 'blackoot-style' );

	// Load font-awesome
	wp_enqueue_style( 'font-awesome', $template_directory_uri . "/css/font-awesome/css/font-awesome.min.css" );

	// Google Webfonts
	if ( !is_user_logged_in() ):
		// Enqueue Open Sans if the current user is not logged in
		// WordPress already adds Open Sans for logged in users
		wp_enqueue_style( 'Open-sans-webfonts', "//fonts.googleapis.com/css?family=Open+Sans:400italic,700italic,400,700&subset=latin,latin-ext", array(), null );
	endif;

	wp_enqueue_style( 'Quicksand-webfonts', "//fonts.googleapis.com/css?family=Quicksand:400italic,700italic,400,700&subset=latin,latin-ext", array(), null );

}
add_action('wp_enqueue_scripts', 'blackoot_styles');

/*
 * Register editor style
 */
function blackoot_editor_styles() {
	add_editor_style('css/editor-style.css');
}
add_action( 'init', 'blackoot_editor_styles' );

/*
 * Enqueue javascripts
 */
function blackoot_scripts() {
	wp_enqueue_script('blackoot', get_template_directory_uri() . '/js/blackoot.min.js', array('jquery','hoverIntent'));
	/* Threaded comments support */
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) )
		wp_enqueue_script( 'comment-reply' );
}
add_action('wp_enqueue_scripts', 'blackoot_scripts');

/*
 * Remove rel tags in category links (HTML5 invalid)
 */
function blackoot_remove_rel_cat( $text ) {
	$text = str_replace(' rel="category"', "", $text);
	$text = str_replace(' rel="category tag"', "", $text);
	return $text;
}
add_filter( 'the_category', 'blackoot_remove_rel_cat' );

/*
 * Customize "read more" links on index view
 */
function blackoot_excerpt_more( $more ) {
	global $post;
	return '... <div class="read-more navbutton"><a href="'. get_permalink( get_the_ID() ) . '">'. __("Read More", 'blackoot-lite') .'<i class="fa fa-angle-double-right"></i></a></div>';
}
add_filter( 'excerpt_more', 'blackoot_excerpt_more' );

function blackoot_content_more( $more ) {
	global $post;
	return '<div class="read-more navbutton"><a href="'. get_permalink() . '#more-' . $post->ID . '">'. __("Read More", 'blackoot-lite') .'<i class="fa fa-angle-double-right"></i></a></div>';
}
add_filter( 'the_content_more_link', 'blackoot_content_more' );

/*
 * Rewrite and replace wp_trim_excerpt() so it adds a relevant read more link
 * when the <!--more--> or <!--nextpage--> quicktags are used
 * This new function preserves every features and filters from the original wp_trim_excerpt
 */
function blackoot_trim_excerpt($text = '') {
	global $post;
	$raw_excerpt = $text;
	if ( '' == $text ) {
		$text = get_the_content('');
		$text = strip_shortcodes( $text );
		$text = apply_filters('the_content', $text);
		$text = str_replace(']]>', ']]&gt;', $text);
		$excerpt_length = apply_filters('excerpt_length', 55);
		$excerpt_more = apply_filters('excerpt_more', ' ' . '[...]');
		$text = wp_trim_words( $text, $excerpt_length, $excerpt_more );

		/* If the post_content contains a <!--more--> OR a <!--nextpage--> quicktag
		 * AND the more link has not been added already
		 * then we add it now
		 */
		if ( ( preg_match('/<!--more(.*?)?-->/', $post->post_content ) || preg_match('/<!--nextpage-->/', $post->post_content ) ) && strpos($text,$excerpt_more) === false ) {
		 $text .= $excerpt_more;
		}

	}
	return apply_filters('blackoot_trim_excerpt', $text, $raw_excerpt);
}

remove_filter('get_the_excerpt', 'wp_trim_excerpt');
add_filter( 'get_the_excerpt', 'blackoot_trim_excerpt' );

/*
 * Create dropdown menu (used in responsive mode)
 * Requires a custom menu to be set (won't work with fallback menu)
 */
function blackoot_dropdown_nav_menu() {
	$menu_name = 'primary';
	if ( ( $locations = get_nav_menu_locations() ) && isset( $locations[ $menu_name ] ) ) {
		if ($menu = wp_get_nav_menu_object( $locations[ $menu_name ] ) ) {
		$menu_items = wp_get_nav_menu_items($menu->term_id);
		$menu_list = '<select id="dropdown-menu">';
		$menu_list .= '<option value="">Menu</option>';
		foreach ( (array) $menu_items as $key => $menu_item ) {
			$title = $menu_item->title;
			$url = $menu_item->url;
			if ( $menu_item->menu_item_parent && $menu_item->menu_item_parent > 0 ):
				$menu_list .= '<option value="' . $url . '"> &raquo; ' . $title . '</option>';
			else:
				$menu_list .= '<option value="' . $url . '">' . $title . '</option>';
			endif;
		}
		$menu_list .= '</select>';
   		// $menu_list now ready to output
   		echo $menu_list;
		}
    }
}

/*
 * Article Nav (Previous/Next post, for use in single.php)
 */
function blackoot_article_nav(){

	if ("" != get_adjacent_post( false, "", false ) || "" != get_adjacent_post( false, "", true ) ):

		echo '<div class="article_nav">';

		if ("" != get_adjacent_post( false, "", false ) ): // Is there a previous post?
			echo '<div class="next navbutton">',
				next_post_link('%link', __('Next Post', 'blackoot-lite') . '<i class="fa fa-angle-double-right"></i>' ),
				'</div>';
		endif;

		if ("" != get_adjacent_post( false, "", true ) ): // Is there a next post?
			echo '<div class="previous navbutton">',
				previous_post_link('%link', '<i class="fa fa-angle-double-left"></i>' . __('Previous Post', 'blackoot-lite') ),
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
function blackoot_adjacent_image_link($prev = true) {
    global $post;
    $post = get_post($post);
    $attachments = array_values(get_children("post_parent=$post->post_parent&post_type=attachment&post_mime_type=image&orderby=\"menu_order ASC, ID ASC\""));

    foreach ( $attachments as $k => $attachment )
        if ( $attachment->ID == $post->ID )
            break;

    $k = $prev ? $k - 1 : $k + 1;

    if ( isset($attachments[$k]) )
        return true;
	else
		return false;
}

/*
 * Generate breadcrumbs
 */

function blackoot_breadcrumbs() {
	global $post, $blackoot_options;

	$sep = $blackoot_options['breadcrumbs_sep'];
	if (!$sep) $sep = '/';

	if (!is_front_page()):

		echo '<a href="', esc_url(home_url()), '">', __('Home', 'blackoot-lite'), '</a><span class="separator"> ', $sep, ' </span>';

		if (is_home()):

			$page_for_posts = get_option('page_for_posts');
			echo get_the_title($page_for_posts);

		elseif (is_single()):

			// Use categories as breadcrumbs for single posts
			the_category('<span class="separator"> '.$sep.' </span>');
			echo '<span class="separator"> '.$sep.' </span>', get_the_title();

		elseif (is_page()):
			if($post->post_parent):
				$anc = get_post_ancestors( $post->ID );
				$output = '';
				foreach ( $anc as $ancestor ):
					$output = '<a href="'.esc_url(get_permalink($ancestor)).'" title="' . the_title_attribute( array( 'echo' => false, 'post' => $ancestor ) ).'">' . get_the_title($ancestor) . '</a><span class="separator"> '.$sep.' </span>' . $output;
				endforeach;
				echo $output;
			endif;
			the_title();

		elseif (is_category()): single_cat_title();
		elseif (is_tag()): single_tag_title();
		elseif (is_day()): _e('Daily Archives', 'blackoot-lite');
		elseif (is_month()): _e('Monthly Archives', 'blackoot-lite');
		elseif (is_year()): _e('Yearly Archives', 'blackoot-lite');
		elseif (is_author()): _e('Author Archives', 'blackoot-lite');
		elseif (isset($_GET['paged']) && !empty($_GET['paged'])): _e('Blog Archives', 'blackoot-lite');
		elseif (is_search()): echo __('Search Results', 'blackoot-lite');
		elseif (is_404()): echo __('404 Error', 'blackoot-lite');

		endif;
	endif;
}

/*
 * Customizer
 */

require_once 'inc/customizer/customizer.php';

?>
