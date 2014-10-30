jQuery(window).load(function(){
	var editor   = jQuery('#wp-shortcode-template-editor-container'),
		new_file = jQuery('#new-file'),
		copy     = jQuery('#copy'),
		current  = jQuery('#current-file').val();

	/* Adding Quicktag buttons to the editor WordPress
	 * - Button HTML ID (required)
	 * - Button display, value="" attribute (required)
	 * - Opening Tag (required)
	 * - Closing Tag (required)
	 * - Access key, accesskey="" attribute for the button (optional)
	 * - Title, title="" attribute (optional)
	 * - Priority/position on bar, 1-9 = first, 11-19 = second, 21-29 = third, etc. (optional)
	 */
	QTags.addButton( 'shcd_title', 'Title', "%%TITLE%% ", '', 't', 'Title' );
	QTags.addButton( 'shcd_content', 'Content', '%%CONTENT%% ', '', 'c', 'Content' );
	QTags.addButton( 'shcd_button', 'Button', '%%BUTTON%% ', '', 'b', 'Button' );
	QTags.addButton( 'shcd_avatar', 'Image', '%%AVATAR%% ', '', 'i', 'Image' );
	QTags.addButton( 'shcd_author', 'Author', '%%AUTHOR%% ', '', 'a', 'Author' );

	if ('default.tmpl' === current) {
		jQuery('#wp-shortcode-template-editor-container')
			.find('input,textarea')
			.attr('disabled', true);
	}

	new_file.keyup(function(){
		jQuery('#file-name-error').hide();
	});

	copy.on('click', function(){
		var filename = new_file.val();
		filenameCheck = /([0-9a-z_-]+[\.][0-9a-z_-]{1,4})$/.test(filename);

		if ( filenameCheck == false ){
			jQuery('#file-name-error').show();
			return false;
		}
		// copy_shortcode_tmpl(current.val(), new_file.val());
	});
});

// (function(){
	/* Adding Quicktag buttons to the editor WordPress
	 * - Button HTML ID (required)
	 * - Button display, value="" attribute (required)
	 * - Opening Tag (required)
	 * - Closing Tag (required)
	 * - Access key, accesskey="" attribute for the button (optional)
	 * - Title, title="" attribute (optional)
	 * - Priority/position on bar, 1-9 = first, 11-19 = second, 21-29 = third, etc. (optional)
	 */
// 	QTags.addButton( 'shcd_title', 'Title', "%%TITLE%% ", '', 't', 'Title' );
// 	QTags.addButton( 'shcd_content', 'Content', '%%CONTENT%% ', '', 'c', 'Content' );
// 	QTags.addButton( 'shcd_button', 'Button', '%%BUTTON%% ', '', 'b', 'Button' );
// 	QTags.addButton( 'shcd_avatar', 'Image', '%%AVATAR%% ', '', 'i', 'Image' );
// 	QTags.addButton( 'shcd_author', 'Author', '%%AUTHOR%% ', '', 'a', 'Author' );
// })();