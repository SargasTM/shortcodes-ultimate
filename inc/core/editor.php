<?php

if ( !class_exists( 'Cherry_Shortcode_Editor' ) ) {

	/**
	 * Shortcode Editor.
	 */
	class Cherry_Shortcode_Editor {

		/**
		 * Slug of the page screen.
		 *
		 * @since 1.0.0
		 * @var   string
		 */
		private $page_screen_hook_suffix = null;

		/**
		 * The URL to which the form should be submitted.
		 *
		 * @since 1.0.0
		 * @var   string
		 */
		private $form_url = null;

		/**
		 * The target folder path.
		 *
		 * @since 1.0.0
		 * @var   string
		 */
		public static $target_dir_path = null;

		/**
		 * The target folder name.
		 *
		 * @since 1.0.0
		 * @var   string
		 */
		public static $dir_name = 'templates/shortcodes/';

		/**
		 * The target folder flag.
		 *
		 * @since 1.0.0
		 * @var   boolean
		 */
		public static $dir_isset = false;

		/**
		 * Sets up needed actions/filters for the class to initialize.
		 *
		 * @since 1.0.0
		 * @param str $target_dir_path A path to the templates directory.
		 */
		public function __construct() {
			self::$target_dir_path = trailingslashit( get_stylesheet_directory() ) . self::$dir_name;

			if ( false === ( $checkdir = $this->checkdir() ) ) {
				add_action( 'admin_notices', array( $this, 'admin_notice' ) );

			} elseif ( true === $checkdir ) {
				self::$dir_isset = $checkdir;

			} else {
				self::$target_dir_path = $checkdir['target_dir_path'];
				self::$dir_isset       = $checkdir['dir_isset'];
			}

			// Enqueue admin-specific stylesheet.
			add_action( 'admin_enqueue_scripts', array( $this, 'enqueue_admin_scripts' ) );

			// Add the options page and menu item.
			add_action( 'admin_menu', array( $this, 'add_admin_menu' ) );
		}

		public function checkdir() {
			$check = false;

			if ( file_exists( self::$target_dir_path ) ) {
				return true;
			}

			$check = $this->mkdir( self::$target_dir_path );

			if ( $check ) {
				return true;
			}

			// // Upload directory URL (returns an array).
			// $upload_dir = wp_upload_dir();
			// $basedir    = trailingslashit( $upload_dir['basedir'] ) . self::$dir_name;

			// if ( file_exists( $basedir ) ) {
			// 	$dir_isset = true;
			// } else {
			// 	$dir_isset = $this->mkdir( $basedir );
			// }

			// if ( !$dir_isset ) {
			// 	return false;
			// }

			// $check = array(
			// 	'target_dir_path' => $basedir,
			// 	'dir_isset'       => $dir_isset,
			// );

			return $check;
		}

		public function mkdir( $target ) {
			$res = wp_mkdir_p( $target );

			if ( self::$target_dir_path != $target ) {
				self::$target_dir_path = $target;
			}

			return $res;
		}

		public function admin_notice() {
			echo '<div class="error"><p>' . __( 'Target directory not exists.', 'su' ) . '</p></div>';
		}

		/**
		 * Retrieve the target directories.
		 *
		 * @since  1.0.0
		 * @return array
		 */
		public static function dirs() {
			// Upload directory URL (returns an array).
			// $upload_dir     = wp_upload_dir();
			// $upload_basedir = untrailingslashit( $upload_dir['basedir'] );

			return apply_filters( 'cherry_editor_target_dirs', array(
					SU_PLUGIN_DIR,
					// $upload_basedir,
					// get_stylesheet_directory(),
				) );
		}

		/**
		 * Check access.
		 *
		 * @since 1.0.0
		 */
		public function access( $form_fields = null ) {
			global $wp_filesystem;

			if ( !$this->filesystem_init( $form_fields ) ) {
				return false; // Stop further processign when request form is displaying.
			}

			// Now $wp_filesystem could be used. Get correct target file.
			self::$target_dir_path = $wp_filesystem->find_folder( self::$target_dir_path );

			if ( !$wp_filesystem->exists( self::$target_dir_path ) ) { // Check for existence.
				return false;
			}

			return true;
		}

		/**
		 * Enqueue admin-specific stylesheet.
		 *
		 * @since 1.0.0
		 */
		public function enqueue_admin_scripts() {

			if ( !isset( $this->page_screen_hook_suffix ) ) {
				return;
			}

			$screen = get_current_screen();
			if ( $this->page_screen_hook_suffix == $screen->id ) {
				wp_enqueue_script( 'admin-script', plugins_url( 'assets/js/editor.js', SU_PLUGIN_FILE ), array( 'jquery', 'quicktags' ), '1.0', true );
				wp_enqueue_style( 'admin-style', plugins_url( 'assets/css/editor.css', SU_PLUGIN_FILE ) );
			}
		}

		/**
		 * Register the administration menu into the WordPress Dashboard menu.
		 *
		 * @since 1.0.0
		 */
		public function add_admin_menu() {
			$this->page_screen_hook_suffix = add_submenu_page(
				'themes.php',
				__( 'Shortcode Templates Editor', 'cherry '),
				__( 'Shortcode Editor', 'cherry '),
				'edit_themes',
				'shortcode_templates_editor',
				array( $this, '_display_admin_page' )
			);
		}

		public function _display_admin_page() {
			require_once 'editor-views.php';
		}

		/**
		 * Return files in the target's directories.
		 *
		 * @param  array|string  $targer_dirs A target directories.
		 * @param  array|string  $types       Optional. Array of extensions to return. Defaults to *.tmpl files.
		 * @param  int           $depth       Optional. How deep to search for files. Defaults to -1 depth is infinite.
		 * @return array                      Array of files
		 */
		public function get_files( $targer_dirs, $types = 'tmpl', $depth = -1 ) {
			$files = array();

			foreach ( (array) $targer_dirs as $dir ) {
				$_files = (array) $this->scandir( $dir, $types, $depth );

				if ( !empty( $_files ) ) {
					$f = $this->set_allowed_data( $_files, basename( $dir ) );
					$files = array_merge_recursive( $files, $f );
				}
			}

			return $files;
		}

		/**
		 * Scans a directory for files of a certain extension.
		 *
		 * @since  1.0.0
		 *
		 * @param  string $path          Absolute path to search.
		 * @param  mixed  $types         Array of extensions to find, string of a single extension, or null for all extensions.
		 * @param  int    $depth         How deep to search for files. Optional, defaults to -1 depth is infinite.
		 * @param  string $relative_path The basename of the absolute path. Used to control the returned path for the found files, particularly when this function recurses to lower depths.
		 * @return [type]                [description]
		 */
		public function scandir( $path, $types, $depth, $relative_path = '' ) {
			if ( !is_dir( $path ) )
				return false;

			$path = untrailingslashit( $path );

			if ( $types ) {
				$types = (array) $types;
				$_types = implode( '|', $types );
			}

			$relative_path = trailingslashit( $relative_path );
			if ( '/' == $relative_path )
				$relative_path = '';

			$results = scandir( $path );
			$files = array();

			foreach ( $results as $result ) :

				if ( '.' == $result[0] ) {
					continue;
				}

				if ( is_dir( $path . '/' . $result ) ) {

					if ( !$depth || 'CVS' == $result ) {
						continue;
					}

					$found = $this->scandir( $path . '/' . $result, $types, $depth - 1 , $relative_path . $result );
					$files = array_merge_recursive( $files, $found );

				} elseif ( !$types || preg_match( '~\.(' . $_types . ')$~', $result ) ) {

					$files[ $relative_path . $result ] = $path . '/' . $result;

				}

			endforeach;

			return $files;
		}

		/**
		 * To prepare allowed data.
		 *
		 * @since  1.0.0
		 *
		 * @param  array  $files
		 * @param  string $dir   Directory name.
		 * @return array
		 */
		public function set_allowed_data( $files, $dir ) {
			$count = 0;
			$_new = array();
			$registered_shortcodes = (array) Su_Data::shortcodes();

			foreach ( $files as $tag => $path ) {

				$shortcode_tag = basename( dirname( $tag ) );

				$_new = array_merge_recursive( $_new, array(
					$shortcode_tag => array(
						$dir => array(
							'item-' . $count => array(
								'dir' => dirname( $tag ),
								'path' => $path,
							)
						)
					)
				) );

				$count++;
			}

			return $_new;
		}

		/**
		 * Initialize Filesystem object.
		 *
		 * @since  1.0.0
		 * @param  array    $fields Form fields.
		 * @return bool|str false on failure, stored text on success
		 */
		public function filesystem_init( $fields = null ) {
			global $wp_filesystem;

			// First attempt to get credentials.
			if ( false === ( $creds = request_filesystem_credentials( $this->form_url, '', false, self::$target_dir_path, $fields ) ) ) {
				/**
				 * If we comes here - we don't have credentials
				 * so the request for them is displaying
				 * no need for further processing.
				 **/
				return false;
			}

			// Now we got some credentials - try to use them.
			if ( !WP_Filesystem( $creds ) ) {

				// Incorrect connection data - ask for credentials again, now with error message.
				request_filesystem_credentials( $this->form_url, $method, true, self::$target_dir_path );

				return false;
			}

			return true; // Filesystem object successfully initiated.
		}


		/**
		 * Perform writing into template.
		 *
		 * @since  1.0.0
		 * @return bool|str - false on failure, stored text on success.
		 */
		public function filesystem_write( $template ) {
			global $wp_filesystem;

			check_admin_referer( 'shortcode_templates_editor_admin' );

			$content     = wp_unslash( $_POST['shortcode-template'] ); // Sanitize the input.
			$form_fields = array( 'shortcode-template' ); // Fields that should be preserved across screens.

			if ( !$this->access( $form_fields ) ) {
				return false;
			}

			// Write into file.
			if ( !$wp_filesystem->put_contents( $template, $content, FS_CHMOD_FILE ) ) {
				return new WP_Error( 'writing_error', 'Error when writing file' ); // Return error object.
			}

			return $template;
		}

		/**
		 * Read template.
		 *
		 * @since  1.0.0
		 * @return bool|str - false on failure, stored text on success.
		 */
		public function filesystem_read( $template ) {
			global $wp_filesystem;

			if ( !$this->access() ) {
				return false;
			}

			$content = '';

			// Read the file.
			if ( $wp_filesystem->exists( $template ) ) : // Check for existence.

				$content = $wp_filesystem->get_contents( $template );

				if ( !$content ) {
					return new WP_Error( 'reading_error', 'Error when reading file' ); // Return error object.
				}

			endif;

			return $content;
		}

		/**
		 * Read template (static).
		 *
		 * @since  1.0.0
		 * @return bool|WP_Error|string - false on failure, stored text on success.
		 */
		public static function get_contents( $template ) {

			if ( !function_exists( 'WP_Filesystem' ) ) {
				include_once( ABSPATH . '/wp-admin/includes/file.php' );
			}

			WP_Filesystem();
			global $wp_filesystem;

			if ( !$wp_filesystem->exists( $template ) ) { // Check for existence.
				return false;
			}

			// Read the file.
			$content = $wp_filesystem->get_contents( $template );

			if ( !$content ) {
				return new WP_Error( 'reading_error', 'Error when reading file' ); // Return error object.
			}

			return $content;
		}

		/**
		 * Get files in a directory.
		 *
		 * @since 1.0.0
		 *
		 * @param  string     $shortcode Shortcode tag name.
		 * @return array|bool            Array of files. False if unable to list directory contents.
		 */
		public static function dirlist( $shortcode ) {

			if ( !function_exists( 'WP_Filesystem' ) ) {
				include_once( ABSPATH . '/wp-admin/includes/file.php' );
			}

			WP_Filesystem();
			global $wp_filesystem;

			// Get all target directories.
			$dirs = self::dirs();
			$dirs[] = get_stylesheet_directory();

			// Prepare arrays.
			$dirlist = array();

			foreach ( $dirs as $d ) :

				$dir = trailingslashit( $d ) . self::$dir_name . $shortcode;

				if ( !file_exists( $dir ) ) {
					continue;
				}

				// Get details for files in a directory.
				$list = $wp_filesystem->dirlist( $dir );

				if ( !$list ) {
					continue;
				}

				// Pluck a certain field out of each object in a list.
				$list = wp_list_pluck( $list, 'name' );

				foreach ( $list as $file_name => $data ) {
					$list[ $file_name ] = $data;
				}

				$dirlist = array_merge_recursive( $dirlist, $list );

			endforeach;

			if ( empty( $dirlist ) ) {
				return false;
			}

			return $dirlist;
		}

		/**
		 * The function for make a copy template.
		 *
		 * @since 1.0.0
		 */
		public function copy( $source, $destination ) {
			global $wp_filesystem, $dirs;

			$copied = false;

			if ( !$this->access() ) {
				return false;
			}

			$destination = trailingslashit( self::$target_dir_path ) . $destination;
			$copied      = $wp_filesystem->copy( $source, $destination );

			return $copied;
		}

		public static function get_template_by_name( $template, $shortcode ) {
			$content = $file = '';
			$subdir  = 'templates/shortcodes/' . $shortcode . '/' . $template;
			$default = SU_PLUGIN_DIR . 'templates/shortcodes/' . $shortcode . '/default.tmpl';

			if ( file_exists( trailingslashit( get_stylesheet_directory() ) . $subdir ) ) {
				$file = trailingslashit( get_stylesheet_directory() ) . $subdir;
			} elseif ( file_exists( SU_PLUGIN_DIR . $subdir ) ) {
				$file = SU_PLUGIN_DIR . $subdir;
			} else {
				$file = $default;
			}

			if ( !empty( $file ) ) {
				$content = self::get_contents( $file );
			}

			return apply_filters( 'cherry_editor_get_template_by_name', $content, $shortcode, $file );
		}
	}

	new Cherry_Shortcode_Editor();
}