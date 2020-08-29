<?php
/**
 *
 * Blackoot Lite WordPress Theme by Iceable Themes | https://www.iceablethemes.com
 *
 * Copyright 2014-2020 Iceable Themes - https://www.iceablethemes.com
 *
 * Customizer functions
 *
 */

class Blackoot_Customizer {

	public static function register( $wp_customize ) {

		// Move default settings "background_color" in the same section as background image settings
		// and rename the section just "Background"
		$wp_customize->get_control( 'background_color' )->section = 'background_image';
		$wp_customize->get_section( 'background_image' )->title = __( 'Background', 'blackoot-lite' );

		// Add new sections
		$wp_customize->add_section(
			'blackoot_logo_settings',
			array(
				'title'      => __( 'Logo', 'blackoot-lite' ),
				'priority'   => 20,
			)
		);

		$wp_customize->add_section(
			'blackoot_blog_settings',
			array(
				'title'      => __( 'Blog Settings', 'blackoot-lite' ),
				'priority'   => 80,
			)
		);

		$wp_customize->add_section(
			'blackoot_misc_settings',
			array(
				'title'      => __( 'Misc', 'blackoot-lite' ),
				'priority'   => 100,
			)
		);

		$wp_customize->add_section(
			'blackoot_more',
			array(
				'title'      => __( 'More', 'blackoot-lite' ),
				'priority'   => 130,
			)
		);

		// Setting and control for Logo
		$wp_customize->add_setting(
			'blackoot_logo',
			array(
				'default'           => '',
				'sanitize_callback' => 'esc_url_raw',
			)
		);

		$wp_customize->add_control(
			new WP_Customize_Image_Control(
				$wp_customize,
				'blackoot_logo',
				array(
					'label'      => __( 'Upload your logo', 'blackoot-lite' ),
					'description' => __( 'If no logo is uploaded, the site title will be displayed instead.', 'blackoot-lite' ),
					'section'    => 'blackoot_logo_settings',
					'settings'   => 'blackoot_logo',
				)
			)
		);

		// Setting and control for blog index content switch
		$wp_customize->add_setting(
			'blackoot_blog_index_content',
			array(
				'default'           => 'excerpt',
				'sanitize_callback' => 'blackoot_sanitize_blog_index_content',
			)
		);

		$wp_customize->add_control(
			new WP_Customize_Control(
				$wp_customize,
				'blackoot_blog_index_content',
				array(
					'label'    => __( 'Blog Index Content', 'blackoot-lite' ),
					'section'  => 'blackoot_blog_settings',
					'settings' => 'blackoot_blog_index_content',
					'type'     => 'radio',
					'choices'  => array(
						'excerpt'  => __( 'Excerpt', 'blackoot-lite' ),
						'content'  => __( 'Full content', 'blackoot-lite' ),
					),
				)
			)
		);

		// Setting and control for responsive mode
		$wp_customize->add_setting(
			'blackoot_responsive_mode' ,
			array(
				'default'           => 'on',
				'sanitize_callback' => 'blackoot_sanitize_on_off',
			)
		);

		$wp_customize->add_control(
			new WP_Customize_Control(
				$wp_customize,
				'blackoot_responsive_mode',
				array(
					'label'    => __( 'Responsive Mode', 'blackoot-lite' ),
					'section'  => 'blackoot_misc_settings',
					'settings' => 'blackoot_responsive_mode',
					'type'     => 'radio',
					'choices'  => array(
						'on'  => __( 'On', 'blackoot-lite' ),
						'off' => __( 'Off', 'blackoot-lite' ),
					),
				)
			)
		);

		// Settings and controls for header image display
		$wp_customize->add_setting(
			'home_header_image',
			array(
				'default'           => 'on',
				'sanitize_callback' => 'blackoot_sanitize_on_off',
			)
		);

		$wp_customize->add_control(
			new WP_Customize_Control(
				$wp_customize,
				'home_header_image',
				array(
					'label'    => __( 'Display header on Homepage', 'blackoot-lite' ),
					'section'  => 'header_image',
					'settings' => 'home_header_image',
					'type'     => 'radio',
					'choices'  => array(
						'on'  => __( 'On', 'blackoot-lite' ),
						'off' => __( 'Off', 'blackoot-lite' ),
					),
				)
			)
		);

		$wp_customize->add_setting(
			'blog_header_image',
			array(
				'default'           => 'on',
				'sanitize_callback' => 'blackoot_sanitize_on_off',
			)
		);

		$wp_customize->add_control(
			new WP_Customize_Control(
				$wp_customize,
				'blog_header_image',
				array(
					'label'    => __( 'Display header on Blog Index', 'blackoot-lite' ),
					'section'  => 'header_image',
					'settings' => 'blog_header_image',
					'type'     => 'radio',
					'choices'  => array(
						'on'  => __( 'On', 'blackoot-lite' ),
						'off' => __( 'Off', 'blackoot-lite' ),
					),
				)
			)
		);

		$wp_customize->add_setting(
			'single_header_image',
			array(
				'default'           => 'on',
				'sanitize_callback' => 'blackoot_sanitize_on_off',
			)
		);

		$wp_customize->add_control(
			new WP_Customize_Control(
				$wp_customize,
				'single_header_image',
				array(
					'label'    => __( 'Display header on Single Posts', 'blackoot-lite' ),
					'section'  => 'header_image',
					'settings' => 'single_header_image',
					'type'     => 'radio',
					'choices'  => array(
						'on'  => __( 'On', 'blackoot-lite' ),
						'off' => __( 'Off', 'blackoot-lite' ),
					),
				)
			)
		);

		$wp_customize->add_setting(
			'pages_header_image',
			array(
				'default'           => 'on',
				'sanitize_callback' => 'blackoot_sanitize_on_off',
			)
		);

		$wp_customize->add_control(
			new WP_Customize_Control(
				$wp_customize,
				'pages_header_image',
				array(
					'label'    => __( 'Display header on Pages', 'blackoot-lite' ),
					'section'  => 'header_image',
					'settings' => 'pages_header_image',
					'type'     => 'radio',
					'choices'  => array(
						'on'  => __( 'On', 'blackoot-lite' ),
						'off' => __( 'Off', 'blackoot-lite' ),
					),
				)
			)
		);

		// Setting and control for Blackoot upgrade message
		$wp_customize->add_setting(
			'blackoot_upgrade',
			array(
				'default'           => 'https://www.iceablethemes.com/shop/blackoot-pro/',
				'sanitize_callback' => 'blackoot_sanitize_button',
			)
		);

		$wp_customize->add_control(
			new Blackoot_Button_Customize_Control(
				$wp_customize,
				'blackoot_upgrade',
				array(
					'label'       => __( 'Get Blackoot Pro', 'blackoot-lite' ),
					'description' => __( 'Unleash the full potential of Blackoot with tons of additional settings, advanced features and premium support.', 'blackoot-lite' ),
					'section'     => 'blackoot_more',
					'settings'    => 'blackoot_upgrade',
					'type'        => 'button',
				)
			)
		);

		// Setting and control for Blackoot support forums message
		$wp_customize->add_setting(
			'blackoot_support',
			array(
				'default'           => 'https://www.iceablethemes.com/forums/forum/free-support-forum/blackoot-lite/',
				'sanitize_callback' => 'blackoot_sanitize_button',
			)
		);

		$wp_customize->add_control(
			new Blackoot_Button_Customize_Control(
				$wp_customize,
				'blackoot_support',
				array(
					'label'       => __( 'Blackoot Lite support forums', 'blackoot-lite' ),
					'description' => __( 'Have a question? Need help?', 'blackoot-lite' ),
					'section'     => 'blackoot_more',
					'settings'    => 'blackoot_support',
					'type'        => 'button',
				)
			)
		);

		// Setting and control for Blackoot feedback message
		$wp_customize->add_setting(
			'blackoot_feedback',
			array(
				'default'           => 'https://wordpress.org/support/view/theme-reviews/blackoot-lite',
				'sanitize_callback' => 'blackoot_sanitize_button',
			)
		);

		$wp_customize->add_control(
			new Blackoot_Button_Customize_Control(
				$wp_customize,
				'blackoot_feedback',
				array(
					'label'       => __( 'Rate Blackoot Lite', 'blackoot-lite' ),
					'description' => __( 'Like this theme? We\'d love to hear your feedback!', 'blackoot-lite' ),
					'section'     => 'blackoot_more',
					'settings'    => 'blackoot_feedback',
					'type'        => 'button',
				)
			)
		);

	}

	public static function customize_controls_scripts() {
		wp_enqueue_style(
			'blackoot-customizer-controls-style',
			BLACKOOT_THEME_DIR_URI . '/inc/customizer/css/customizer-controls.css',
			array( 'customize-controls' )
		);

		wp_register_script(
			'blackoot-customizer-section',
			BLACKOOT_THEME_DIR_URI . '/inc/customizer/js/blackoot-customizer-section.js',
			array( 'jquery', 'jquery-ui-core', 'jquery-ui-button', 'customize-controls' ),
			'',
			true
		);

		$blackoot_customizer_section_l10n = array(
			'upgrade_pro' => __( 'Upgrade to Blackoot Pro!', 'blackoot-lite' ),
		);
		wp_localize_script( 'blackoot-customizer-section', 'blackoot_customizer_section_l10n', $blackoot_customizer_section_l10n );
		wp_enqueue_script( 'blackoot-customizer-section' );

	}

}
add_action( 'customize_register' , array( 'Blackoot_Customizer', 'register' ) );
add_action( 'customize_controls_enqueue_scripts', array( 'Blackoot_Customizer', 'customize_controls_scripts' ) );

// Create custom controls for customizer
if ( class_exists( 'WP_Customize_Control' ) ) {
	class Blackoot_Button_Customize_Control extends WP_Customize_Control {
		public $type = 'button';
		public function render_content() {
			?>
			<label>
				<span class="description customize-control-description"><?php echo esc_html( $this->description ); ?></span>
				<a class="button" href="<?php echo esc_url( $this->value() ); ?>" target="_blank"><?php echo esc_html( $this->label ); ?></a>
			</label>
			<?php
		}
	}
}

// Sanitation callback functions
function blackoot_sanitize_blog_index_content( $input ) {

	$choices = array( 'excerpt', 'content' );

	if ( in_array( $input, $choices, true ) ) :
		return $input;
	else :
		return '';
	endif;

}

function blackoot_sanitize_on_off( $input ) {

	$choices = array( 'on', 'off' );

	if ( in_array( $input, $choices, true ) ) :
		return $input;
	else :
		return '';
	endif;

}

function blackoot_sanitize_button( $input ) {
	return '';
}
