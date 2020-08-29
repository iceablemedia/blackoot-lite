<?php
/**
 *
 * Blackoot Lite WordPress Theme by Iceable Themes | https://www.iceablethemes.com
 *
 * Copyright 2014-2020 Iceable Themes - https://www.iceablethemes.com
 *
 * Header Template
 *
 */
?><!DOCTYPE html>
<!--[if lt IE 7 ]><html class="ie ie6" <?php language_attributes(); ?>><![endif]-->
<!--[if IE 7 ]><html class="ie ie7" <?php language_attributes(); ?>><![endif]-->
<!--[if IE 8 ]><html class="ie ie8" <?php language_attributes(); ?>><![endif]-->
<!--[if ( gte IE 9)|!(IE)]><!--><html <?php language_attributes(); ?>><!--<![endif]-->
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
<!--[if IE]><meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"><![endif]-->
<link rel="profile" href="http://gmpg.org/xfn/11" />
<?php if ( is_singular() && pings_open() ) : ?>
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
<?php endif; ?>
<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php
if ( function_exists( 'wp_body_open' ) ) {
	wp_body_open( );
} else {
	do_action( 'wp_body_open' );
}
?>
<div id="main-wrap">
	<div id="header-wrap">
		<div id="tophead-wrap">
			<div class="container">
				<div class="tophead">
					<?php echo get_search_form(); ?>
				</div>
			</div>
		</div>

		<div id="header">
			<div class="container">
				<div id="logo">
					<a href="<?php echo esc_url( home_url() ); ?>" title='<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>' rel='home'>
						<?php
						if ( get_theme_mod( 'blackoot_logo' ) ) :
							?>
							<h1 class="site-title" style="display:none"><?php echo bloginfo( 'name' ); ?></h1>
							<img src="<?php echo esc_url( get_theme_mod( 'blackoot_logo' ) ); ?>" alt="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>">
							<?php
						else :
							?>
							<h1 class="site-title"><?php echo bloginfo( 'name' ); ?></h1>
							<?php
						endif;
						?>
					</a>
				</div>
				<?php

				if ( get_bloginfo( 'description' ) ) :
					?>
					<div id="tagline"><?php bloginfo( 'description' ); ?></div>
					<?php
				endif;

			?>
			</div>
		</div>

		<div id="nav-wrap">
			<div id="navbar" class="container">
				<?php
				wp_nav_menu(
					array(
						'theme_location' => 'primary',
						'items_wrap' => '<ul id="%1$s" class="%2$s sf-menu">%3$s</ul>',
					)
				);
				blackoot_dropdown_nav_menu();
				?>
			</div>
		</div>
	</div>
	<?php

	if ( get_custom_header()->url ) :

		if (
			( is_front_page() && 'off' !== get_theme_mod( 'home_header_image' ) )
			|| ( is_page() && ! is_front_page() && 'off' !== get_theme_mod( 'pages_header_image' ) )
			|| ( is_single() && 'off' !== get_theme_mod( 'single_header_image' ) )
			|| ( ! is_front_page() && ! is_singular() && 'off' !== get_theme_mod( 'blog_header_image' ) )
			|| ( is_404() )
		) :

			?>
			<div id="header-image" class="container">
				<img src="<?php header_image(); ?>" height="<?php echo esc_attr( get_custom_header()->height ); ?>" width="<?php echo esc_attr( get_custom_header()->width ); ?>" alt='' />
			</div>
			<?php

		endif;
	endif;
