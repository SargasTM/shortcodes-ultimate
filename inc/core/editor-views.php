<?php

if ( !current_user_can( 'edit_themes' ) ) {
	wp_die( '<p>' . __( 'You do not have sufficient permissions to edit templates for this site.' ) . '</p>' );
}

// Gets a WP_Theme object for a current theme.
$current_theme = get_stylesheet();
$theme = wp_get_theme( $current_theme );

if ( !$theme->exists() ) {
	wp_die( __( 'The requested theme does not exist.' ) );
}

// Prepare associative array (for add_query_arg).
$query_args = array(
	'file'     => '',
	'location' => '',
);

// Upload directory URL (returns an array).
// $upload_dir     = wp_upload_dir();
// $upload_basedir = untrailingslashit( $upload_dir['basedir'] );

// Init associative array (for add_query_arg).
if ( isset( $_GET['file'] ) ) {
	$query_args['file'] = $_GET['file'];
}
if ( isset( $_GET['location'] ) ) {
	$query_args['location'] = $_GET['location'];
}

$this->form_url = add_query_arg( $query_args, menu_page_url( 'shortcode_templates_editor', 0 ) );

/**
 * Filters the target directories.
 *
 * @since  1.0.0
 * @var    array
 */
// $target_dirs1 = apply_filters( 'cherry_editor_target_dirs', array( SU_PLUGIN_DIR ) );
$target_dirs1 = self::dirs();
$target_dirs2 = get_stylesheet_directory();

$default_files = self::get_files( $target_dirs1 );
$allowed_files = self::get_files( $target_dirs2 );
$allowed_shortcodes = array_keys( $default_files );

$file     = ( isset( $_GET['file'] ) ) ? $_GET['file'] : '';
$location = ( isset( $_GET['location'] ) ) ? $_GET['location'] : '';
$error    = false;

if ( $location == $current_theme ) {
	$abs_file = trailingslashit( WP_CONTENT_DIR ) . 'themes/' . $location;
// } elseif ( $location == basename( $upload_basedir ) ) {
// 	$abs_file = $upload_basedir;
} else {
	$abs_file = trailingslashit( WP_PLUGIN_DIR ) . $location;
}

if ( empty( $file ) ) {
	$file     = self::$dir_name . 'heading/default.tmpl';
	$abs_file = SU_PLUGIN_DIR;
}

if ( isset( $_POST['shortcode'] ) ) {
	// $active     = sanitize_file_name( $_POST['shortcode'] );
	$active     = $_POST['shortcode'];
	$_active    = explode( '/', $active );
	$location   = $_active[0];
	$active_tag = $_active[1];
	$file       = self::$dir_name . "$active_tag/default.tmpl";
	$abs_file   = trailingslashit( WP_PLUGIN_DIR ) . trailingslashit( $_active[0] );

	$new_loc = menu_page_url( 'shortcode_templates_editor', 0 );
	$query_args['file']     = urlencode( $file );
	$query_args['location'] = $location;
	$loc = add_query_arg( $query_args, $new_loc );
	wp_redirect( $loc );
	exit;

} elseif ( isset( $_GET['file'] ) ) {
	$active_tag = basename( dirname( $_GET['file'] ) );
} else {
	reset( $allowed_shortcodes );
	$active_tag = current( $allowed_shortcodes );
}

if ( !empty( $file ) ) {
	$relative_file = $file;
	$file = trailingslashit( $abs_file ) . $relative_file;

	if ( !is_file( $file ) ) {
		$error = true;
	}
}

if ( isset( $_POST['save'] ) ) {
	$action = 'save';
} elseif ( isset( $_POST['copy'] ) ) {
	$action = 'copy';
} else {
	$action = '';
}

switch( $action ) {

	case 'save':
		$new_loc = menu_page_url( 'shortcode_templates_editor', 0 );
		$query_args['file']     = urlencode( $relative_file );
		$query_args['location'] = $location;

		$content = self::filesystem_write( $file );

		if ( $content && !is_wp_error( $content ) ) {
			$query_args = array_merge( $query_args, array( 'updated' => 'true' ) );
		}
		$loc = add_query_arg( $query_args, $new_loc );
		wp_redirect( $loc );
		exit;

	case 'copy':
		self::$dir_isset = wp_mkdir_p( self::$target_dir_path . $active_tag );

		$new_loc                = menu_page_url( 'shortcode_templates_editor', 0 );
		$new_file               = sanitize_file_name( $_POST['new-file'] );
		$query_args['location'] = $location;

		if ( false === $this->copy( $file, $active_tag . '/' . $new_file ) ) {
			$query_args['file'] = urlencode( $relative_file );
		} else {
			$query_args['location'] = $current_theme;
			$query_args['file']     = urlencode( self::$dir_name . $active_tag . '/' . $new_file );
			$query_args             = array_merge( $query_args, array( 'added' => 'true' ) );
		}
		$loc = add_query_arg( $query_args, $new_loc );
		wp_redirect( $loc );
		exit;

	default:

		$content = '';
		if ( !$error ) {
			$content = self::filesystem_read( $file );
		}

		if ( isset( $_GET['updated'] ) ) : ?>
			<div id="message" class="updated"><p><?php _e( 'File edited successfully.' ) ?></p></div>
		<?php endif;

		if ( isset( $_GET['added'] ) ) : ?>
			<div id="message" class="updated"><p><?php _e( 'File added successfully.' ) ?></p></div>
		<?php endif; ?>

		<div class="wrap">
			<h2><?php echo esc_html( get_admin_page_title() ); ?></h2>
			<div class="fileedit-sub">
				<div class="alignleft">
					<?php if ( is_writable( $file ) ) :

						if ( $current_theme == $location ) {
							echo sprintf( __( 'Editing <strong>%s</strong>' ), $file );
						} else {
							echo sprintf( __( 'Browsing <strong>%s</strong>' ), $file );
						}

					endif; ?>
				</div>
				<div class="alignright">
					<form action="" method="post">
						<strong><label for="shortcode"><?php _e( 'Select shortcode:' ); ?></label></strong>
						<select name="shortcode" id="shortcode">

							<?php foreach ( ( array ) Su_Data::shortcodes() as $id => $data ) {

								if ( !isset( $default_files[ $id ] ) ) {
									continue;
								}

								echo "\n\t" . '<option value="' . esc_attr( key( $default_files[ $id ] ) . '/' . $id ) . '" '. selected( $active_tag, $id, false ) .'>' . $data['name'] . '</option>';
							} ?>

						</select>

						<?php submit_button( __( 'Select' ), 'button', 'Submit', false ); ?>

					</form>
				</div>
				<div class="clear"></div>
			</div>

			<div id="templateside">

				<br><hr><br>

				<h3><?php _e( 'Default template', 'su' ); ?></h3>
				<ul>
					<?php foreach ( $default_files[ $active_tag ] as $target => $items ) :

							foreach ( $items as $key => $value ) { ?>

								<li>
									<?php $query_args = array( 'file' => urlencode( $value['dir'] . '/' . basename( $value['path'] ) ), 'location' => $target ); ?>
									<a href="<?php echo add_query_arg( $query_args, menu_page_url( 'shortcode_templates_editor', 0 ) ) ;?>"><?php echo basename( $value['path'] ); ?></a>
								</li>

						<?php }
					endforeach; ?>
				</ul>

			<?php if ( isset( $allowed_files[ $active_tag ] ) ) : // Custom templates. ?>

					<br><hr><br>

					<h3><?php _e( 'Custom templates', 'su' ); ?></h3>
					<ul>
						<?php foreach ( $allowed_files[ $active_tag ] as $target => $items ) :

								foreach ( $items as $key => $value ) { ?>

									<li>
										<?php $query_args = array( 'file' => urlencode( $value['dir'] . '/' . basename( $value['path'] ) ), 'location' => $target ); ?>
										<a href="<?php echo add_query_arg( $query_args, menu_page_url( 'shortcode_templates_editor', 0 ) ) ;?>"><?php echo basename( $value['path'] ); ?></a>

									</li>

								<?php }

						endforeach; ?>
					</ul>

			<?php endif; ?>

			</div>

			<?php if ( $error ) :
				echo '<div class="error"><p>' . __( 'Oops, no such file exists! Double check the name and try again, merci.' ) . '</p></div>';
			else : ?>

				<?php if ( !empty( $file ) ) : ?>

					<form name="editor" id="editor" action="" method="post">
						<input id="current-file" type="hidden" value="<?php echo basename( $file ); ?>">
						<?php wp_nonce_field( 'shortcode_templates_editor_admin' );

							$args = array(
								'wpautop'       => 0,
								'media_buttons' => 0,
								'textarea_name' => 'shortcode-template',
								'textarea_rows' => 15,
								// 'editor_class'  => ( $current_theme == $location ) ? '' : 'disabled',
								'tinymce'       => 0,
								'quicktags'     => array(
									'buttons' => 'shcd_title,shcd_content,shcd_button,shcd_avatar',
								),
							);
							wp_editor( esc_textarea( $content ), 'shortcode-template', $args );

							if ( !self::$dir_isset || !is_writable( $file ) ) { ?>

								<p><em><?php _e( 'You need to make this file writable before you can save your changes. See <a href="http://codex.wordpress.org/Changing_File_Permissions">the Codex</a> for more information.' ); ?></em></p>

							<?php } else{ ?>

								<div class="editor-control-wrap">
									<label for="new-file"><strong><?php _e( 'New filename:', 'cherry' ); ?></strong></label>
									<input type="text" name="new-file" value=".tmpl" id="new-file">
									<span id="file-name-error"><?php _e( 'Please enter a valid filename.', 'cherry' ); ?></span>
									<div class="submit-wrap">

										<?php submit_button( __( 'Make Copy' ), 'secondary', 'copy', false );

										if ( $current_theme == $location ) {
											submit_button( __( 'Save' ), 'primary', 'save', false );
										} ?>

									</div>
								</div>

						<?php } ?>
					</form>
					<div class="clear"></div>

				<?php endif; ?>

			<?php endif; // $error ?>

		</div>

	<?php break;
}