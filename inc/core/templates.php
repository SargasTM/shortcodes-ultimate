<?php

if ( !class_exists( 'Cherry_Shortcode_Templates' ) ) {

	/**
	 * Shortcode Templates.
	 */
	class Cherry_Shortcode_Templates {

		/**
		 * Sets up needed actions/filters for the class to initialize.
		 *
		 * @since 4.9.2
		 * @param str $target_dir_path A path to the templates directory.
		 */
		public function __construct() {
			add_action( 'init', array( $this, 'shortcode_atts' ), 20 );

			// Filters a shortcodes data and add new attribute.
			add_filter( 'su/data/shortcodes', array( $this, 'add_template_atts' ), 20 );
		}

		public function shortcode_atts() {
			// Prepare compatibility mode prefix
			$prefix = su_cmpt();

			// Loop through shortcodes
			foreach ( ( array ) Su_Data::shortcodes() as $tag => $data ) {

				if ( shortcode_exists( $prefix . $tag ) ) {

					/**
					 * Filter a shortcode's default attributes.
					 *
					 * @param array $out   The output array of shortcode attributes.
					 * @param array $pairs The supported attributes and their defaults.
					 * @param array $atts  The user defined shortcode attributes.
					 */
					add_filter( "shortcode_atts_$tag", function( $out, $pairs, $atts ) {

						if ( isset( $atts['template'] ) ) {
							$out['template'] = $atts['template'];
						} else {
							$out['template'] = 'default.tmpl';
						}

						return $out;
					}, 10, 3 );
				}
			}
		}

		/**
		 * Adds 'template' attribure.
		 *
		 * @since 4.9.2
		 */
		public function add_template_atts( $shortcodes ) {
			$shortcode = ( !empty( $_REQUEST['shortcode'] ) ) ? sanitize_key( $_REQUEST['shortcode'] ) : '';

			if ( empty( $shortcode ) ) {
				return $shortcodes;
			}

			// Get templates.
			$templates = Cherry_Shortcode_Editor::dirlist( $shortcode );

			if ( !$templates || empty( $templates ) ) {
				return $shortcodes;
			}

			// Add new atts - template.
			$shortcodes[ $shortcode ]['atts']['template'] = array(
				'type'    => 'select',
				'values'  => $templates,
				'default' => 'default.tmpl',
				'name'    => __( 'Template', 'su' ),
				'desc'    => __( 'Shortcode template', 'su' ),
			);

			// add_action( "su/shortcode/$shortcode", array( $this, 'bar' ) );

			return $shortcodes;
		}

	}

	new Cherry_Shortcode_Templates();
}