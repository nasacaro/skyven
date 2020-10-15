<?php
/**
 * Create A Simple Theme Options Panel
 *
 */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

// Start Class
if ( ! class_exists( 'WPEX_Theme_Options' ) ) {

	class WPEX_Theme_Options {

		/**
		 * Start things up
		 *
		 * @since 1.0.0
		 */
		public function __construct() {

			// We only need to register the admin panel on the back-end
			if ( is_admin() ) {
				add_action( 'admin_menu', array( 'WPEX_Theme_Options', 'add_admin_menu' ) );
				add_action( 'admin_init', array( 'WPEX_Theme_Options', 'register_settings' ) );
			}

		}

		/**
		 * Returns all theme options
		 *
		 * @since 1.0.0
		 */
		public static function get_theme_options() {
			return get_option( 'theme_options' );
		}

		/**
		 * Returns single theme option
		 *
		 * @since 1.0.0
		 */
		public static function get_theme_option( $id ) {
			$options = self::get_theme_options();
			if ( isset( $options[$id] ) ) {
				return $options[$id];
			}
        }

		/**
		 * Add sub menu page
		 *
		 * @since 1.0.0
		 */
		// public static function add_admin_menu() {
		// 	add_menu_page(
		// 		esc_html__( 'Theme Settings', 'text-domain' ),
		// 		esc_html__( 'Theme Settings', 'text-domain' ),
		// 		'manage_options',
		// 		'theme-settings',
		// 		array( 'WPEX_Theme_Options', 'create_admin_page' )
		// 	);
		// }

		/**
		 * Register a setting and its sanitization callback.
		 *
		 * We are only registering 1 setting so we can store all options in a single option as
		 * an array. You could, however, register a new setting for each option
		 *
		 * @since 1.0.0
		 */
		public static function register_settings() {
			register_setting( 'theme_options', 'theme_options', array( 'WPEX_Theme_Options', 'sanitize' ) );
		}

		/**
		 * Sanitization callback
		 *
		 * @since 1.0.0
		 */
		public static function sanitize( $options ) {

			// If we have options lets sanitize them
			if ( $options ) {

				// Input
				if ( ! empty( $options['copyright_text'] ) ) {
					$options['copyright_text'] = sanitize_text_field( $options['copyright_text'] );
				} else {
					unset( $options['copyright_text'] ); // Remove from options if empty
                }
                // Footer text
				if ( ! empty( $options['footer_text'] ) ) {
					$options['footer_text'] = sanitize_text_field( $options['footer_text'] );
				} else {
					unset( $options['footer_text'] ); // Remove from options if empty
				}

				// File
				if ( ! empty( $options['footer_logo'] ) ) {
					$options['footer_logo'] = sanitize_text_field( $options['select_example'] );
				}

			}

			// Return sanitized options
			return $options;

		}

		/**
		 * Settings page output
		 *
		 * @since 1.0.0
		 */
		public static function create_admin_page() { ?>

			<div class="wrap">

				<h1><?php esc_html_e( 'Theme Options', 'text-domain' ); ?></h1>

				<form method="post" action="options.php">

					<?php settings_fields( 'theme_options' ); ?>

                    <h1> Footer Section </h1>
                    <hr>

					<table class="form-table wpex-custom-admin-login-table">

						<?php // Copyright Text?>
						<tr valign="top">
							<th scope="row"><?php esc_html_e( 'Copyright Text', 'text-domain' ); ?></th>
							<td>
								<?php $value = self::get_theme_option( 'copyright_text' ); ?>
                                <textarea rows="2" cols="50" name="theme_options[copyright_text]"><?php echo esc_attr( $value ); ?></textarea>
							</td>
						</tr>
                        <?php // Footer Logo?>
                        <tr valign="top">
							<th scope="row"><?php esc_html_e( 'Footer Logo', 'text-domain' ); ?></th>
							<td>
								<?php $value = self::get_theme_option( 'footer_logo' ); ?>
                                <input type="file" name="theme_options[footer_logo]" value="<?php echo esc_attr( $value ); ?>">
							</td>
						</tr>
                        <?php // Footer Text?>
                        <tr valign="top">
							<th scope="row"><?php esc_html_e( 'Footer Text', 'text-domain' ); ?></th>
							<td>
								<?php $value = self::get_theme_option( 'footer_text' ); ?>
                                <textarea rows="2" cols="50" name="theme_options[footer_text]"><?php echo esc_attr( $value ); ?></textarea>
							</td>
						</tr>

					</table>

					<?php submit_button(); ?>

				</form>

			</div><!-- .wrap -->
		<?php }

	}
}
new WPEX_Theme_Options();

// Helper function to use in your theme to return a theme option value
function myprefix_get_theme_option( $id = '' ) {
	return WPEX_Theme_Options::get_theme_option( $id );
}