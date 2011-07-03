<?php
/**
 * seh functions and definitions
 */

if ( ! function_exists( 'twentyten_setup' ) ):
function twentyten_setup() {

	// This theme styles the visual editor with editor-style.css to match the theme style.
	add_editor_style();

	// Add default posts and comments RSS feed links to head
	add_theme_support( 'automatic-feed-links' );

	// Make theme available for translation
	// Translations can be filed in the /languages/ directory
	load_theme_textdomain( 'seh', TEMPLATEPATH . '/languages' );
	load_theme_textdomain( 'twentyten', TEMPLATEPATH . '/languages' );

	$locale = get_locale();
	$locale_file = TEMPLATEPATH . "/languages/$locale.php";
	if ( is_readable( $locale_file ) )
		require_once( $locale_file );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => __( 'Primary Navigation', 'twentyten' ),
		'frontabout' => __( 'Frontpage Navigation', 'seh' )
	) );
}
endif;

/**
 * AddThis support
 **/

if (! function_exists( 'seh_addthis_buttons' ) ):
function seh_addthis_buttons() {
    echo '<div class="addthis_toolbox addthis_default_style">
        <a class="addthis_button_facebook"></a>
        <a class="addthis_button_twitter"></a>
        <a class="addthis_button_email"></a>
        <a class="addthis_button_google_plusone"></a>
        <a class="addthis_button_preferred_1"></a>
        <a class="addthis_button_preferred_2"></a>
        <a class="addthis_button_compact"></a>
    </div>';
}
endif;

if ( ! function_exists( 'seh_init' ) ):
function seh_init() {
    wp_register_script( 'addthis', 'http://s7.addthis.com/js/250/addthis_widget.js' );
    wp_enqueue_script( 'addthis' );
}
endif;

add_action( 'init', 'seh_init' );

if ( ! function_exists( 'seh_remove_widget_areas' ) ):
function seh_remove_widget_areas() {

	// Unregsiter the widget areas of the Twenty Ten footer
	unregister_sidebar( 'first-footer-widget-area' );
	unregister_sidebar( 'second-footer-widget-area' );
	unregister_sidebar( 'third-footer-widget-area' );
	unregister_sidebar( 'fourth-footer-widget-area' );
}
endif;

add_action( 'widgets_init', 'seh_remove_widget_areas', 11 );

/**
 * Theme options handling
 **/

if ( ! function_exists( 'seh_theme_options_init' ) ):
function seh_theme_options_init() {
    add_settings_section ( 'seh_frontpage', __( 'Front page' ), 'seh_frontpage_callback', 'seh_theme_options' );

    add_settings_field ( 'seh_frontpage_welcome', __( 'Frontpage welcome text', 'seh' ), 'seh_welcome_callback', 'seh_theme_options', 'seh_frontpage' );
    register_setting ( 'seh_theme_options', 'seh_welcome_text' );
}
endif;
add_action( 'admin_init', 'seh_theme_options_init' );

if ( ! function_exists( 'seh_theme_options_add_page' ) ):
function seh_theme_options_add_page() {
	add_theme_page( __( 'Theme Options', 'seh' ), __( 'Theme Options', 'seh' ), 'edit_theme_options', 'seh_theme_options', 'seh_theme_options_do_page' );
}
endif;
add_action( 'admin_menu', 'seh_theme_options_add_page' );

if ( ! function_exists( 'seh_theme_options_do_page' ) ):
function seh_theme_options_do_page() {
    echo '<form method="post" action="options.php">' . "\n";
    settings_fields( 'seh_theme_options' );
    do_settings_sections( 'seh_theme_options' );
    echo '<p class="submit">
<input type="submit" class="button-primary" value="' .  __('Save Changes') . '" />
</p>
</form>
</div>';
}
endif;

if ( ! function_exists( 'seh_frontpage_callback' ) ):
function seh_frontpage_callback() {
    echo sprintf( '<p>%s</p>', __( 'Settings for the static frontpage.' ) );
}
endif;

if ( ! function_exists( 'seh_welcome_callback' ) ):
function seh_welcome_callback() {
    echo '<textarea name="seh_welcome_text" id="seh_frontpage_welcome">' . esc_textarea( get_option( 'seh_welcome_text' ) ) . '</textarea>';
}
endif;

/**
 * Create the options page
 */
function theme_options_do_page() {
	global $select_options, $radio_options;

	if ( ! isset( $_REQUEST['settings-updated'] ) )
		$_REQUEST['settings-updated'] = false;

	?>
	<div class="wrap">
		<?php screen_icon(); echo "<h2>" . get_current_theme() . __( ' Theme Options', 'sampletheme' ) . "</h2>"; ?>

		<?php if ( false !== $_REQUEST['settings-updated'] ) : ?>
		<div class="updated fade"><p><strong><?php _e( 'Options saved', 'sampletheme' ); ?></strong></p></div>
		<?php endif; ?>

		<form method="post" action="options.php">
			<?php settings_fields( 'sample_options' ); ?>
			<?php $options = get_option( 'sample_theme_options' ); ?>

			<table class="form-table">

				<?php
				/**
				 * A sample checkbox option
				 */
				?>
				<tr valign="top"><th scope="row"><?php _e( 'A checkbox', 'sampletheme' ); ?></th>
					<td>
						<input id="sample_theme_options[option1]" name="sample_theme_options[option1]" type="checkbox" value="1" <?php checked( '1', $options['option1'] ); ?> />
						<label class="description" for="sample_theme_options[option1]"><?php _e( 'Sample checkbox', 'sampletheme' ); ?></label>
					</td>
				</tr>

				<?php
				/**
				 * A sample text input option
				 */
				?>
				<tr valign="top"><th scope="row"><?php _e( 'Some text', 'sampletheme' ); ?></th>
					<td>
						<input id="sample_theme_options[sometext]" class="regular-text" type="text" name="sample_theme_options[sometext]" value="<?php esc_attr_e( $options['sometext'] ); ?>" />
						<label class="description" for="sample_theme_options[sometext]"><?php _e( 'Sample text input', 'sampletheme' ); ?></label>
					</td>
				</tr>

				<?php
				/**
				 * A sample select input option
				 */
				?>
				<tr valign="top"><th scope="row"><?php _e( 'Select input', 'sampletheme' ); ?></th>
					<td>
						<select name="sample_theme_options[selectinput]">
							<?php
								$selected = $options['selectinput'];
								$p = '';
								$r = '';

								foreach ( $select_options as $option ) {
									$label = $option['label'];
									if ( $selected == $option['value'] ) // Make default first in list
										$p = "\n\t<option style=\"padding-right: 10px;\" selected='selected' value='" . esc_attr( $option['value'] ) . "'>$label</option>";
									else
										$r .= "\n\t<option style=\"padding-right: 10px;\" value='" . esc_attr( $option['value'] ) . "'>$label</option>";
								}
								echo $p . $r;
							?>
						</select>
						<label class="description" for="sample_theme_options[selectinput]"><?php _e( 'Sample select input', 'sampletheme' ); ?></label>
					</td>
				</tr>

				<?php
				/**
				 * A sample of radio buttons
				 */
				?>
				<tr valign="top"><th scope="row"><?php _e( 'Radio buttons', 'sampletheme' ); ?></th>
					<td>
						<fieldset><legend class="screen-reader-text"><span><?php _e( 'Radio buttons', 'sampletheme' ); ?></span></legend>
						<?php
							if ( ! isset( $checked ) )
								$checked = '';
							foreach ( $radio_options as $option ) {
								$radio_setting = $options['radioinput'];

								if ( '' != $radio_setting ) {
									if ( $options['radioinput'] == $option['value'] ) {
										$checked = "checked=\"checked\"";
									} else {
										$checked = '';
									}
								}
								?>
								<label class="description"><input type="radio" name="sample_theme_options[radioinput]" value="<?php esc_attr_e( $option['value'] ); ?>" <?php echo $checked; ?> /> <?php echo $option['label']; ?></label><br />
								<?php
							}
						?>
						</fieldset>
					</td>
				</tr>

				<?php
				/**
				 * A sample textarea option
				 */
				?>
				<tr valign="top"><th scope="row"><?php _e( 'A textbox', 'sampletheme' ); ?></th>
					<td>
						<textarea id="sample_theme_options[sometextarea]" class="large-text" cols="50" rows="10" name="sample_theme_options[sometextarea]"><?php echo esc_textarea( $options['sometextarea'] ); ?></textarea>
						<label class="description" for="sample_theme_options[sometextarea]"><?php _e( 'Sample text box', 'sampletheme' ); ?></label>
					</td>
				</tr>
			</table>

			<p class="submit">
				<input type="submit" class="button-primary" value="<?php _e( 'Save Options', 'sampletheme' ); ?>" />
			</p>
		</form>
	</div>
	<?php
}

/**
 * Sanitize and validate input. Accepts an array, return a sanitized array.
 */
function theme_options_validate( $input ) {
	global $select_options, $radio_options;

	// Our checkbox value is either 0 or 1
	if ( ! isset( $input['option1'] ) )
		$input['option1'] = null;
	$input['option1'] = ( $input['option1'] == 1 ? 1 : 0 );

	// Say our text option must be safe text with no HTML tags
	$input['sometext'] = wp_filter_nohtml_kses( $input['sometext'] );

	// Our select option must actually be in our array of select options
	if ( ! array_key_exists( $input['selectinput'], $select_options ) )
		$input['selectinput'] = null;

	// Our radio option must actually be in our array of radio options
	if ( ! isset( $input['radioinput'] ) )
		$input['radioinput'] = null;
	if ( ! array_key_exists( $input['radioinput'], $radio_options ) )
		$input['radioinput'] = null;

	// Say our textarea option must be safe text with the allowed tags for posts
	$input['sometextarea'] = wp_filter_post_kses( $input['sometextarea'] );

	return $input;
}

if ( ! function_exists( 'twentyten_posted_on' ) ) :
/**
 * Prints HTML with meta information for the current post-date/time and author.
 *
 * Based on the original function taken from Twenty Ten
 */
function twentyten_posted_on() {
	printf('<a href="%1$s" title="%2$s" rel="bookmark"><time class="entry-date updated" pubdate itemprop="datePublished" datetime="%3$s">%4$s, %5$s</time></a> %6$s %7$s',
			get_permalink(),
			get_the_title(),
			get_the_time('c'),
			get_the_date(),
			esc_attr( get_the_time() ),
			__('by', 'seh'),
		    sprintf( '<span class="author vcard" itemprop="author" itemscope itemtype="http://schema.org/Person"><a class="url fn n" href="%1$s" title="%2$s">%3$s</a></span>',
			    get_author_posts_url( get_the_author_meta( 'ID' ) ),
			    sprintf( esc_attr__( 'View all posts by %s', 'twentyten' ), get_the_author() ),
			    sprintf( '<span itemprop="name">%s</span>', get_the_author() )
		    )
		);
}
endif;

if ( ! function_exists( 'seh_frontpage_text' ) ):
function seh_frontpage_text () {
    echo get_option( 'seh_welcome_text' );
}
endif;
?>
