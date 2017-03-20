<?php
/**
 * Internationalization helper.
 *
 * @package     Kirki
 * @category    Core
 * @author      Aristeides Stathopoulos
 * @copyright   Copyright (c) 2016, Aristeides Stathopoulos
 * @license     http://opensource.org/licenses/https://opensource.org/licenses/MIT
 * @since       1.0
 */

if ( ! class_exists( 'Kirki_l10n' ) ) {

	/**
	 * Handles translations
	 */
	class Kirki_l10n {

		/**
		 * The plugin textdomain
		 *
		 * @access protected
		 * @var string
		 */
		protected $textdomain = 'kirki';

		/**
		 * The class constructor.
		 * Adds actions & filters to handle the rest of the methods.
		 *
		 * @access public
		 */
		public function __construct() {

			add_action( 'plugins_loaded', array( $this, 'load_textdomain' ) );

		}

		/**
		 * Load the plugin textdomain
		 *
		 * @access public
		 */
		public function load_textdomain() {

			if ( null !== $this->get_path() ) {
				load_textdomain( $this->textdomain, $this->get_path() );
			}
			load_plugin_textdomain( $this->textdomain, false, Kirki::$path . '/languages' );

		}

		/**
		 * Gets the path to a translation file.
		 *
		 * @access protected
		 * @return string Absolute path to the translation file.
		 */
		protected function get_path() {
			$path_found = false;
			$found_path = null;
			foreach ( $this->get_paths() as $path ) {
				if ( $path_found ) {
					continue;
				}
				$path = wp_normalize_path( $path );
				if ( file_exists( $path ) ) {
					$path_found = true;
					$found_path = $path;
				}
			}

			return $found_path;

		}

		/**
		 * Returns an array of paths where translation files may be located.
		 *
		 * @access protected
		 * @return array
		 */
		protected function get_paths() {

			return array(
				WP_LANG_DIR . '/' . $this->textdomain . '-' . get_locale() . '.mo',
				Kirki::$path . '/languages/' . $this->textdomain . '-' . get_locale() . '.mo',
			);

		}

		/**
		 * Shortcut method to get the translation strings
		 *
		 * @static
		 * @access public
		 * @param string $config_id The config ID. See Kirki_Config.
		 * @return array
		 */
		public static function get_strings( $config_id = 'global' ) {

			$translation_strings = array(
				'background-color'      => esc_attr__( 'Background Color', 'ember' ),
				'background-image'      => esc_attr__( 'Background Image', 'ember' ),
				'no-repeat'             => esc_attr__( 'No Repeat', 'ember' ),
				'repeat-all'            => esc_attr__( 'Repeat All', 'ember' ),
				'repeat-x'              => esc_attr__( 'Repeat Horizontally', 'ember' ),
				'repeat-y'              => esc_attr__( 'Repeat Vertically', 'ember' ),
				'inherit'               => esc_attr__( 'Inherit', 'ember' ),
				'background-repeat'     => esc_attr__( 'Background Repeat', 'ember' ),
				'cover'                 => esc_attr__( 'Cover', 'ember' ),
				'contain'               => esc_attr__( 'Contain', 'ember' ),
				'background-size'       => esc_attr__( 'Background Size', 'ember' ),
				'fixed'                 => esc_attr__( 'Fixed', 'ember' ),
				'scroll'                => esc_attr__( 'Scroll', 'ember' ),
				'background-attachment' => esc_attr__( 'Background Attachment', 'ember' ),
				'left-top'              => esc_attr__( 'Left Top', 'ember' ),
				'left-center'           => esc_attr__( 'Left Center', 'ember' ),
				'left-bottom'           => esc_attr__( 'Left Bottom', 'ember' ),
				'right-top'             => esc_attr__( 'Right Top', 'ember' ),
				'right-center'          => esc_attr__( 'Right Center', 'ember' ),
				'right-bottom'          => esc_attr__( 'Right Bottom', 'ember' ),
				'center-top'            => esc_attr__( 'Center Top', 'ember' ),
				'center-center'         => esc_attr__( 'Center Center', 'ember' ),
				'center-bottom'         => esc_attr__( 'Center Bottom', 'ember' ),
				'background-position'   => esc_attr__( 'Background Position', 'ember' ),
				'background-opacity'    => esc_attr__( 'Background Opacity', 'ember' ),
				'on'                    => esc_attr__( 'ON', 'ember' ),
				'off'                   => esc_attr__( 'OFF', 'ember' ),
				'all'                   => esc_attr__( 'All', 'ember' ),
				'cyrillic'              => esc_attr__( 'Cyrillic', 'ember' ),
				'cyrillic-ext'          => esc_attr__( 'Cyrillic Extended', 'ember' ),
				'devanagari'            => esc_attr__( 'Devanagari', 'ember' ),
				'greek'                 => esc_attr__( 'Greek', 'ember' ),
				'greek-ext'             => esc_attr__( 'Greek Extended', 'ember' ),
				'khmer'                 => esc_attr__( 'Khmer', 'ember' ),
				'latin'                 => esc_attr__( 'Latin', 'ember' ),
				'latin-ext'             => esc_attr__( 'Latin Extended', 'ember' ),
				'vietnamese'            => esc_attr__( 'Vietnamese', 'ember' ),
				'hebrew'                => esc_attr__( 'Hebrew', 'ember' ),
				'arabic'                => esc_attr__( 'Arabic', 'ember' ),
				'bengali'               => esc_attr__( 'Bengali', 'ember' ),
				'gujarati'              => esc_attr__( 'Gujarati', 'ember' ),
				'tamil'                 => esc_attr__( 'Tamil', 'ember' ),
				'telugu'                => esc_attr__( 'Telugu', 'ember' ),
				'thai'                  => esc_attr__( 'Thai', 'ember' ),
				'serif'                 => _x( 'Serif', 'font style', 'ember' ),
				'sans-serif'            => _x( 'Sans Serif', 'font style', 'ember' ),
				'monospace'             => _x( 'Monospace', 'font style', 'ember' ),
				'font-family'           => esc_attr__( 'Font Family', 'ember' ),
				'font-size'             => esc_attr__( 'Font Size', 'ember' ),
				'font-weight'           => esc_attr__( 'Font Weight', 'ember' ),
				'line-height'           => esc_attr__( 'Line Height', 'ember' ),
				'font-style'            => esc_attr__( 'Font Style', 'ember' ),
				'letter-spacing'        => esc_attr__( 'Letter Spacing', 'ember' ),
				'top'                   => esc_attr__( 'Top', 'ember' ),
				'bottom'                => esc_attr__( 'Bottom', 'ember' ),
				'left'                  => esc_attr__( 'Left', 'ember' ),
				'right'                 => esc_attr__( 'Right', 'ember' ),
				'center'                => esc_attr__( 'Center', 'ember' ),
				'justify'               => esc_attr__( 'Justify', 'ember' ),
				'color'                 => esc_attr__( 'Color', 'ember' ),
				'add-image'             => esc_attr__( 'Add Image', 'ember' ),
				'change-image'          => esc_attr__( 'Change Image', 'ember' ),
				'no-image-selected'     => esc_attr__( 'No Image Selected', 'ember' ),
				'add-file'              => esc_attr__( 'Add File', 'ember' ),
				'change-file'           => esc_attr__( 'Change File', 'ember' ),
				'no-file-selected'      => esc_attr__( 'No File Selected', 'ember' ),
				'remove'                => esc_attr__( 'Remove', 'ember' ),
				'select-font-family'    => esc_attr__( 'Select a font-family', 'ember' ),
				'variant'               => esc_attr__( 'Variant', 'ember' ),
				'subsets'               => esc_attr__( 'Subset', 'ember' ),
				'size'                  => esc_attr__( 'Size', 'ember' ),
				'height'                => esc_attr__( 'Height', 'ember' ),
				'spacing'               => esc_attr__( 'Spacing', 'ember' ),
				'ultra-light'           => esc_attr__( 'Ultra-Light 100', 'ember' ),
				'ultra-light-italic'    => esc_attr__( 'Ultra-Light 100 Italic', 'ember' ),
				'light'                 => esc_attr__( 'Light 200', 'ember' ),
				'light-italic'          => esc_attr__( 'Light 200 Italic', 'ember' ),
				'book'                  => esc_attr__( 'Book 300', 'ember' ),
				'book-italic'           => esc_attr__( 'Book 300 Italic', 'ember' ),
				'regular'               => esc_attr__( 'Normal 400', 'ember' ),
				'italic'                => esc_attr__( 'Normal 400 Italic', 'ember' ),
				'medium'                => esc_attr__( 'Medium 500', 'ember' ),
				'medium-italic'         => esc_attr__( 'Medium 500 Italic', 'ember' ),
				'semi-bold'             => esc_attr__( 'Semi-Bold 600', 'ember' ),
				'semi-bold-italic'      => esc_attr__( 'Semi-Bold 600 Italic', 'ember' ),
				'bold'                  => esc_attr__( 'Bold 700', 'ember' ),
				'bold-italic'           => esc_attr__( 'Bold 700 Italic', 'ember' ),
				'extra-bold'            => esc_attr__( 'Extra-Bold 800', 'ember' ),
				'extra-bold-italic'     => esc_attr__( 'Extra-Bold 800 Italic', 'ember' ),
				'ultra-bold'            => esc_attr__( 'Ultra-Bold 900', 'ember' ),
				'ultra-bold-italic'     => esc_attr__( 'Ultra-Bold 900 Italic', 'ember' ),
				'invalid-value'         => esc_attr__( 'Invalid Value', 'ember' ),
				'add-new'           	=> esc_attr__( 'Add new', 'ember' ),
				'row'           		=> esc_attr__( 'row', 'ember' ),
				'limit-rows'            => esc_attr__( 'Limit: %s rows', 'ember' ),
				'open-section'          => esc_attr__( 'Press return or enter to open this section', 'ember' ),
				'back'                  => esc_attr__( 'Back', 'ember' ),
				'reset-with-icon'       => sprintf( esc_attr__( '%s Reset', 'ember' ), '<span class="dashicons dashicons-image-rotate"></span>' ),
				'text-align'            => esc_attr__( 'Text Align', 'ember' ),
				'text-transform'        => esc_attr__( 'Text Transform', 'ember' ),
				'none'                  => esc_attr__( 'None', 'ember' ),
				'capitalize'            => esc_attr__( 'Capitalize', 'ember' ),
				'uppercase'             => esc_attr__( 'Uppercase', 'ember' ),
				'lowercase'             => esc_attr__( 'Lowercase', 'ember' ),
				'initial'               => esc_attr__( 'Initial', 'ember' ),
				'select-page'           => esc_attr__( 'Select a Page', 'ember' ),
				'open-editor'           => esc_attr__( 'Open Editor', 'ember' ),
				'close-editor'          => esc_attr__( 'Close Editor', 'ember' ),
				'switch-editor'         => esc_attr__( 'Switch Editor', 'ember' ),
				'hex-value'             => esc_attr__( 'Hex Value', 'ember' ),
			);

			// Apply global changes from the kirki/config filter.
			// This is generally to be avoided.
			// It is ONLY provided here for backwards-compatibility reasons.
			// Please use the kirki/{$config_id}/l10n filter instead.
			$config = apply_filters( 'kirki/config', array() );
			if ( isset( $config['i18n'] ) ) {
				$translation_strings = wp_parse_args( $config['i18n'], $translation_strings );
			}

			// Apply l10n changes using the kirki/{$config_id}/l10n filter.
			return apply_filters( 'kirki/' . $config_id . '/l10n', $translation_strings );

		}
	}
}
