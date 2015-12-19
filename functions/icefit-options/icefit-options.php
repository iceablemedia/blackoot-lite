<?php
/**
 *
 * Blackoot Lite WordPress Theme by Iceable Themes | http://www.iceablethemes.com
 *
 * Copyright 2014 Mathieu Sarrasin - Iceable Media
 *
 * Admin settings Framework
 *
 */

// Custom function to get one single option (returns option's value)
function blackoot_get_option($option) {
	global $blackoot_settings_slug;
	$blackoot_settings = get_option($blackoot_settings_slug);
	$value = "";
	if (is_array($blackoot_settings)) {
		if (array_key_exists($option, $blackoot_settings)) $value = $blackoot_settings[$option];
	}
	return $value;
}

// Adds "Theme option" link under "Appearance" in WP admin panel
function blackoot_settings_add_admin() {
	global $menu;
    $blackoot_option_page = add_theme_page( __('Theme Options', 'blackoot'), __('Theme Options', 'blackoot'), 'edit_theme_options', 'icefit-settings', 'blackoot_settings_page');
	add_action( 'admin_print_scripts-'.$blackoot_option_page, 'blackoot_settings_admin_scripts' );
} add_action('admin_menu', 'blackoot_settings_add_admin');

// Registers and enqueue js and css for settings panel
function blackoot_settings_admin_scripts() {
	$template_directory_uri = get_template_directory_uri();
	wp_register_style( 'blackoot_admin_css', $template_directory_uri .'/functions/icefit-options/style.css');
	wp_enqueue_style( 'blackoot_admin_css' );
	wp_enqueue_script( 'blackoot_admin_js', $template_directory_uri . '/functions/icefit-options/functions.js', array( 'wp-color-picker' ), false, true );
}

// Generates the settings panel's menu
function blackoot_settings_machine_menu($options) {
	$output = "";
	foreach ($options as $arg) {
	
		if ( $arg['type'] == "start_menu" )
		{
			$output .= '<li class="icefit-admin-panel-menu-li"><a class="icefit-admin-panel-menu-link '.$arg['icon'].'" href="#'.$arg['name'].'" id="icefit-admin-panel-menu-'.$arg['id'].'"><span></span>'.$arg['name'].'</a></li>'."\n";
		} 
	}
	return $output;
}

// Generate the settings panel's content
function blackoot_settings_machine($options) {
	global $blackoot_settings_slug;
	$blackoot_settings = get_option($blackoot_settings_slug);
	$output = '';
	foreach ($options as $arg) {

		if ( is_array($arg) && is_array($blackoot_settings) ) {
			if ( array_key_exists('id', $arg) ) {
				if ( array_key_exists($arg['id'], $blackoot_settings) ) $val = stripslashes($blackoot_settings[$arg['id']]);
				else $val = '';
			} else { $val = ''; }
		} else { $val = ''; }
		
		if ( $arg['type'] == "start_menu" )
		{
			$output .= '<div class="icefit-admin-panel-content-box" id="icefit-admin-panel-content-'.$arg['id'].'">';
		}			
		elseif ( $arg['type'] == "radio" )
		{
			$output .= '<h3>'. $arg['name'] .'</h3>'."\n";
			if ( $val == "" && $arg['default'] != "") $blackoot_settings[$arg['id']] = $val = $arg['default'];
			$values = $arg['values'];
			$output .= '<div class="radio-group">';
			foreach ($values as $value) {
			$output .= '<input type="radio" name="'.$arg['id'].'" value="'.$value.'" '.checked($value, $val, false).'>'.$value.'<br/>';
			}
			$output .= '</div>';
			$output .= '<label class="desc">'. $arg['desc'] .'</label><br class="clear" />'."\n";
		}		
		elseif ( $arg['type'] == "image" )
		{
			$output .= '<h3>'. $arg['name'] .'</h3>'."\n";
			if ( $val == "" && $arg['default'] != "") $blackoot_settings[$arg['id']] = $val = $arg['default'];
			$output .= '<input class="blackoot_input_img" name="'. $arg['id'] .'" id="'. $arg['id'] .'" type="text" value="'. esc_url($val) .'" />'."\n";
			$output .= '<br class="clear"><label>'. $arg['desc'] .'</label><br class="clear">'."\n";
			$output .= '<input class="blackoot_upload_button" name="'. $arg['id'] .'_upload" id="'. $arg['id'] .'_upload" type="button" value="' . __('Upload Image', 'blackoot') . '">'."\n";
			$output .= '<input class="blackoot_remove_button" name="'. $arg['id'] .'_remove" id="'. $arg['id'] .'_remove" type="button" value="Remove"><br />'."\n";
			$output .= '<img class="blackoot_image_preview" id="'. $arg['id'] .'_preview" src="'.esc_url($val) .'"><br class="clear">'."\n";
		}
		elseif ( $arg['type'] == "gopro" )
		{
			$output .= '<h3>'. $arg['name'] .'</h3>'."\n";
			$output .= '<p>Unleash the full potential of Blackoot by upgrading to Blackoot Pro!</p>';
			$output .= '<p>The Pro version comes with a great set of awesome features:</p>';		
			$output .= '<ul>
							<li>(Lite & Pro) Fully <strong>Responsive Design</strong></li>
							<li>(Lite & Pro) <strong>Translation Ready</strong> (.POT file included)</li>
							<li>(Lite & Pro) <strong>Child Theme</strong> support</li>
							<li>(Lite & Pro) 2 <strong>Widgetized areas</strong> (Sidebar and Footer)</li>
							<li>(Lite & Pro) <strong>Custom background</strong></li>
							<li>(Lite & Pro) <strong>Font Awesome</strong> icons included</li>
							<li>(Lite & Pro) <strong>Breadcrumbs</strong> included</li>
							<li>(Pro Only) <strong>Unlimited sidebars and footers</strong> with different widgets for different pages</li>
							<li>(Pro Only) Quick Setup <strong>Page Templates</strong></li>
							<li>(Pro Only) <strong>Right or Left sidebar or Full Width</strong> template for pages and blog.</li>
							<li>(Pro Only) <strong>Built-in Slider</strong> for <strong>Unlimited Slideshows</strong></li>
							<li>(Pro Only) <strong>Wide</strong> or <strong>Boxed</strong> layout</li>
							<li>(Pro Only) <strong>Portfolio</strong> section</li>
							<li>(Pro Only) <strong>Unlimited colors</strong></li>
							<li>(Pro Only) <strong>650 Webfonts</strong> to choose from</li>
							<li>(Pro Only) <strong>Comprehensive settings panel</strong> with dozens of options</li>
							<li>(Pro Only) <strong>Sticky (fixed) Navbar</strong> when scrolling for enhanced navigation</li>
							<li>(Pro Only) jQuery <strong>"Slide-in" mobile menu</strong> in responsive mode</li>
							<li>(Pro Only) Enhanced <strong>WYSIWYG Layout Builder</strong> in WP Visual Editor</li>
							<li>(Pro Only) <strong>Visual Shortcodes</strong>, fully integrated in WordPress\' Visual editor (no coding!)</li>
							<li>(Pro Only) Powerful <strong>shortcodes</strong> and <strong>custom widgets</strong></li>
							<li>(Pro Only) <strong>Partners and/or Clients\' logos</strong> carousel</li>
							<li>(Pro Only) <strong>Clients\' testimonials</strong> carousel</li>
							<li>(Pro Only) One click setup <strong>AJAX contact form</strong></li>
							<li>(Pro Only) <strong>Google Maps</strong> API v3 integration</li>
							<li>(Pro Only) Built-in <strong>Social Media icons</strong> linking to your social networks pages</li>
							<li>(Pro Only) <strong>Custom CSS</strong> support for even more advanced layout customizations</li>
							<li>(Pro Only) <strong>Pro dedicated support forum</strong> access</li>
							<li><a href="http://www.gnu.org/licenses/" target="_blank">GPL License</a> : Buy once, use as many times as you wish!</li>
							<li><strong>Cross-browsers support</strong>, optimized for IE8+, Firefox, Chrome, Safari and Opera (note: IE7 and older are no longer supported.)</li>
							<li>Lifetime <strong>free updates</strong> and continued support for the <strong>latest WordPress versions</strong></li>
							<li>Currently supports WordPress from 3.5 up to 4.0</strong></li>
							</ul>';
			$output .= '<a href="http://www.iceablethemes.com/shop/blackoot-pro/?utm_source=lite_theme&utm_medium=go_pro&utm_campaign=blackoot_lite" class="button-primary" target="_blank">Learn More and Upgrade Now!</a>';
		}
		elseif ( $arg['type'] == "support_feedback" )
		{
			$output .= '<h3>Get Support</h3>'."\n";
			$output .= '<p>Have a question? Need help?</p>';
			$output .= '<p><a href="http://www.iceablethemes.com/forums/forum/free-support-forum/blackoot-lite/?utm_source=lite_theme&utm_medium=support_forums&utm_campaign=blackoot_lite" target="_blank" class="button-primary">Visit the free Blackoot Lite support forums</a></p>';

			$output .= '<h3>Give Feedback</h3>'."\n";
			$output .= '<p>Like this theme? We\'d love to hear your feedback!</p>';
			$output .= '<p><a href="http://wordpress.org/support/view/theme-reviews/blackoot-lite" target="_blank" class="button-primary">Rate and review Blackoot Lite at WordPress.org</a></p>';

			$output .= '<h3>Get social!</h3>'."\n";
			$output .= '<p>Follow and like IceableThemes!</p>';
			$output .= '<p id="social"></p>';

		}
		elseif ( $arg['type'] == "end_menu" )
		{
			$output .= '</div>';
		}
	}
	return $output;
}

// Ajax callback function for the "reset" button (resets settings to default)
function blackoot_settings_reset_ajax_callback() {
	if ( ! current_user_can('edit_theme_options') )
		wp_die(__('You do not have permission to edit theme options.', 'blackoot'));
	global $blackoot_settings_slug;
	// Get settings from the database
	$blackoot_settings = get_option($blackoot_settings_slug);
	// Get the settings template
	$options = blackoot_settings_template();
	// Revert all settings to default value
	foreach($options as $arg){
		if ($arg['type'] != 'start_menu' && $arg['type'] != 'end_menu' && isset($arg['default']) ) {
			$blackoot_settings[$arg['id']] = $arg['default'];
		}	
	}
	// Updates settings in the database	
	update_option($blackoot_settings_slug,$blackoot_settings);	
}
add_action('wp_ajax_blackoot_settings_reset_ajax_post_action', 'blackoot_settings_reset_ajax_callback');

// AJAX callback function for the "Save changes" button (updates user's settings in the database)
function blackoot_settings_ajax_callback() {
	if ( ! current_user_can('edit_theme_options') )
		wp_die(__('You do not have permission to edit theme options.', 'blackoot'));
	global $blackoot_settings_slug;
	// Check nonce
	check_ajax_referer('blackoot_settings_ajax_post_action','blackoot_settings_nonce');
	// Get POST data
	$data = $_POST['data'];
	parse_str($data,$input);
	// Get current settings from the database
	$blackoot_settings = get_option($blackoot_settings_slug);
	// Get the settings template
	$options = blackoot_settings_template();

	// Validate input and update all settings according to POST data
	foreach($options as $option_array){

		if (isset($option_array['id']) && $option_array['type'] != 'start_menu' && $option_array['type'] != 'end_menu') {
			$id = $option_array['id'];
			if ($option_array['type'] == "radio" ) {
				if ( in_array( $input[$option_array['id']], $option_array['values']) ) {
					$new_value = $input[$option_array['id']];
				} else {
					$new_value = $option_array['default'];
				}
			} elseif ($option_array['type'] == "image") {
				$new_value = esc_url_raw($input[$option_array['id']]);
			}
			$blackoot_settings[$id] = stripslashes($new_value);
		}

	}

	// Updates settings in the database
	update_option($blackoot_settings_slug,$blackoot_settings);
}
add_action('wp_ajax_blackoot_settings_ajax_post_action', 'blackoot_settings_ajax_callback');

// NOJS fallback for the "Save changes" button
function blackoot_settings_save_nojs() {
	if ( ! current_user_can('edit_theme_options') )
		wp_die(__('You do not have permission to edit theme options.', 'blackoot'));
	global $blackoot_settings_slug;
	// Get POST data
	//	parse_str($_POST,$output);
	// Get current settings from the database
	$blackoot_settings = get_option($blackoot_settings_slug);
	// Get the settings template
	$options = blackoot_settings_template();
	// Updates all settings according to POST data
	foreach($options as $option_array){
	
		if (isset($option_array['id']) && $option_array['type'] != 'start_menu' && $option_array['type'] != 'end_menu') {
			$id = $option_array['id'];
			if ($option_array['type'] == "radio" ) {
				if ( in_array( $_POST[$option_array['id']], $option_array['values']) ) {
					$new_value = $_POST[$option_array['id']];
				} else {
					$new_value = $option_array['default'];
				}
			} elseif ($option_array['type'] == "image") {
				$new_value = esc_url_raw($_POST[$option_array['id']]);
			}
			$blackoot_settings[$id] = stripslashes($new_value);
		}

	}

	// Updates settings in the database
	update_option($blackoot_settings_slug,$blackoot_settings);	
}

// Outputs the settings panel
function blackoot_settings_page(){
	
	wp_enqueue_script('media-upload');
	wp_enqueue_script('thickbox');
	wp_enqueue_style('thickbox');
	global $blackoot_settings_slug;
	global $blackoot_settings_name;

	if (isset( $_POST['reset-no-js'] ) && $_POST['reset-no-js']) {
		blackoot_settings_reset_ajax_callback();
		echo '<div class="updated fade"><p>Settings were reset to default.</p></div>';
	}
	
	if (isset( $_POST['save-no-js'] ) && $_POST['save-no-js']) {
		blackoot_settings_save_nojs();
		echo '<div class="updated fade"><p>Settings updated.</p></div>';
	}

	?>

	<noscript><div id="no-js-warning" class="updated fade"><p><b>Warning:</b> Javascript is either disabled in your browser or broken in your WP installation.<br />
	This is ok, but it is highly recommended to activate javascript for a better experience.<br />
	If javascript is not blocked in your browser then this may be caused by a third party plugin.<br />
	Make sure everything is up to date or try to deactivate some plugins.</p></div></noscript><?php

	/* The automatically generated fallback menu is not responsive.
	 * Add a notice to warn users who did not set a primary menu. */
	if ( !has_nav_menu( 'primary' ) ):
	echo '<div class="update-nag"><p><strong>Blackoot Lite Notice:</strong> you have not set your primary menu yet, and your site is currently using a fallback menu which is not responsive. Please take a minute to <a href="'.admin_url('nav-menus.php').'">set your menu now</a>!</p></div>';
    endif;

	?><div id="icefit-admin-panel" class="no-js">
		<form enctype="multipart/form-data" id="icefitform" method="POST">
			<div id="icefit-admin-panel-header">
				<div id="icon-options-general" class="icon32"><br></div>
				<h3><?php echo $blackoot_settings_name; ?></h3>
			</div>
			<div id="icefit-admin-panel-main">
				<div id="icefit-admin-panel-menu">
					<ul>
						<?php echo blackoot_settings_machine_menu( blackoot_settings_template() ); ?>
					</ul>
				</div>
				<div id="icefit-admin-panel-content">
					<?php echo blackoot_settings_machine( blackoot_settings_template() ); ?>
				</div>
				<div class="clear"></div>
			</div>
			<div id="icefit-admin-panel-footer">
				<div id="icefit-admin-panel-footer-submit">
					<input type="button" class="button" id="icefit-reset-button" name="reset" value="Reset Options" />
					<input type="submit" value="Save all Changes" class="button-primary" id="submit-button" />
					<!-- No-JS Fallback buttons -->
					<noscript>
					<input type="submit" class="button" id="icefit-reset-button-no-js" name="reset-no-js" value="Reset Options" />
					<input type="submit" class="button-primary" id="submit-button-no-js" name="save-no-js" value="Save all Changes" />
					</noscript>
					<!-- End No-JS Fallback buttons -->
					<div id="ajax-result-wrap"><div id="ajax-result"></div></div>
					<?php wp_nonce_field('blackoot_settings_ajax_post_action','blackoot_settings_nonce'); ?>
				</div>
			</div>
		</form>
	</div>
	<script type="text/javascript">
	<?php $options = blackoot_settings_template(); ?>
		
		jQuery(document).ready(function(){

		<?php
			$has_image = false;
			foreach ($options as $arg) {
				if ( $arg['type'] == "image" ) {
					$has_image = true;
		?>
					jQuery(<?php echo "'#".$arg['id']."_upload'"; ?>).click(function() {
					formfield = <?php echo "'#".$arg['id']."'"; ?>;
					tb_show('', 'media-upload.php?type=image&amp;TB_iframe=true');
					return false;
					});
					
					jQuery(<?php echo "'#".$arg['id']."_remove'"; ?>).click(function() {
					formfield = <?php echo "'#".$arg['id']."'"; ?>;
					preview = <?php echo "'#".$arg['id']."_preview'"; ?>;
					jQuery(formfield).val('');
					jQuery(preview).attr("src",<?php echo "'".get_template_directory_uri(). "/functions/icefit-options/img/null.png'"; ?>);
					return false;
					});
					
		<?php	}
			}
			if ($has_image) {
		?>
			window.send_to_editor = function(html) {
				imgurl = jQuery('img',html).attr('src');
				jQuery(formfield).val(imgurl);
				jQuery(formfield+'_preview').attr("src",imgurl);
				tb_remove();
			}
		<?php } ?>
		});
	</script>
	<?php	
}
?>