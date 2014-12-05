<?php
/**
 * Class for managing plugin data
 */
class Su_Data {

	/**
	 * Constructor
	 */
	function __construct() {}

	/**
	 * Shortcode groups
	 */
	public static function groups() {
		return apply_filters( 'su/data/groups', array(
				'all'     => __( 'All', 'tm' ),
				'content' => __( 'Content', 'tm' ),
				'box'     => __( 'Box', 'tm' ),
				'media'   => __( 'Media', 'tm' ),
				'gallery' => __( 'Gallery', 'tm' ),
				'data'    => __( 'Data', 'tm' ),
				'other'   => __( 'Other', 'tm' ),
			) );
	}

	/**
	 * Border styles
	 */
	public static function borders() {
		return apply_filters( 'su/data/borders', array(
				'none'   => __( 'None', 'tm' ),
				'solid'  => __( 'Solid', 'tm' ),
				'dotted' => __( 'Dotted', 'tm' ),
				'dashed' => __( 'Dashed', 'tm' ),
				'double' => __( 'Double', 'tm' ),
				'groove' => __( 'Groove', 'tm' ),
				'ridge'  => __( 'Ridge', 'tm' )
			) );
	}

	/**
	 * Font-Awesome icons
	 */
	public static function icons() {
		return apply_filters( 'su/data/icons', array( 'adjust', 'adn', 'align-center', 'align-justify', 'align-left', 'align-right', 'ambulance', 'anchor', 'android', 'angle-double-down', 'angle-double-left', 'angle-double-right', 'angle-double-up', 'angle-down', 'angle-left', 'angle-right', 'angle-up', 'apple', 'archive', 'arrow-circle-down', 'arrow-circle-left', 'arrow-circle-o-down', 'arrow-circle-o-left', 'arrow-circle-o-right', 'arrow-circle-o-up', 'arrow-circle-right', 'arrow-circle-up', 'arrow-down', 'arrow-left', 'arrow-right', 'arrow-up', 'arrows', 'arrows-alt', 'arrows-h', 'arrows-v', 'asterisk', 'automobile', 'backward', 'ban', 'bank', 'bar-chart-o', 'barcode', 'bars', 'beer', 'behance', 'behance-square', 'bell', 'bell-o', 'bitbucket', 'bitbucket-square', 'bitcoin', 'bold', 'bolt', 'bomb', 'book', 'bookmark', 'bookmark-o', 'briefcase', 'btc', 'bug', 'building', 'building-o', 'bullhorn', 'bullseye', 'cab', 'calendar', 'calendar-o', 'camera', 'camera-retro', 'car', 'caret-down', 'caret-left', 'caret-right', 'caret-square-o-down', 'caret-square-o-left', 'caret-square-o-right', 'caret-square-o-up', 'caret-up', 'certificate', 'chain', 'chain-broken', 'check', 'check-circle', 'check-circle-o', 'check-square', 'check-square-o', 'chevron-circle-down', 'chevron-circle-left', 'chevron-circle-right', 'chevron-circle-up', 'chevron-down', 'chevron-left', 'chevron-right', 'chevron-up', 'child', 'circle', 'circle-o', 'circle-o-notch', 'circle-thin', 'clipboard', 'clock-o', 'cloud', 'cloud-download', 'cloud-upload', 'cny', 'code', 'code-fork', 'codepen', 'coffee', 'cog', 'cogs', 'columns', 'comment', 'comment-o', 'comments', 'comments-o', 'compass', 'compress', 'copy', 'credit-card', 'crop', 'crosshairs', 'css3', 'cube', 'cubes', 'cut', 'cutlery', 'dashboard', 'database', 'dedent', 'delicious', 'desktop', 'deviantart', 'digg', 'dollar', 'dot-circle-o', 'download', 'dribbble', 'dropbox', 'drupal', 'edit', 'eject', 'ellipsis-h', 'ellipsis-v', 'empire', 'envelope', 'envelope-o', 'envelope-square', 'eraser', 'eur', 'euro', 'exchange', 'exclamation', 'exclamation-circle', 'exclamation-triangle', 'expand', 'external-link', 'external-link-square', 'eye', 'eye-slash', 'facebook', 'facebook-square', 'fast-backward', 'fast-forward', 'fax', 'female', 'fighter-jet', 'file', 'file-archive-o', 'file-audio-o', 'file-code-o', 'file-excel-o', 'file-image-o', 'file-movie-o', 'file-o', 'file-pdf-o', 'file-photo-o', 'file-picture-o', 'file-powerpoint-o', 'file-sound-o', 'file-text', 'file-text-o', 'file-video-o', 'file-word-o', 'file-zip-o', 'files-o', 'film', 'filter', 'fire', 'fire-extinguisher', 'flag', 'flag-checkered', 'flag-o', 'flash', 'flask', 'flickr', 'floppy-o', 'folder', 'folder-o', 'folder-open', 'folder-open-o', 'font', 'forward', 'foursquare', 'frown-o', 'gamepad', 'gavel', 'gbp', 'ge', 'gear', 'gears', 'gift', 'git', 'git-square', 'github', 'github-alt', 'github-square', 'gittip', 'glass', 'globe', 'google', 'google-plus', 'google-plus-square', 'graduation-cap', 'group', 'h-square', 'hacker-news', 'hand-o-down', 'hand-o-left', 'hand-o-right', 'hand-o-up', 'hdd-o', 'header', 'headphones', 'heart', 'heart-o', 'history', 'home', 'hospital-o', 'html5', 'image', 'inbox', 'indent', 'info', 'info-circle', 'inr', 'instagram', 'institution', 'italic', 'joomla', 'jpy', 'jsfiddle', 'key', 'keyboard-o', 'krw', 'language', 'laptop', 'leaf', 'legal', 'lemon-o', 'level-down', 'level-up', 'life-bouy', 'life-ring', 'life-saver', 'lightbulb-o', 'link', 'linkedin', 'linkedin-square', 'linux', 'list', 'list-alt', 'list-ol', 'list-ul', 'location-arrow', 'lock', 'long-arrow-down', 'long-arrow-left', 'long-arrow-right', 'long-arrow-up', 'magic', 'magnet', 'mail-forward', 'mail-reply', 'mail-reply-all', 'male', 'map-marker', 'maxcdn', 'medkit', 'meh-o', 'microphone', 'microphone-slash', 'minus', 'minus-circle', 'minus-square', 'minus-square-o', 'mobile', 'mobile-phone', 'money', 'moon-o', 'mortar-board', 'music', 'navicon', 'openid', 'outdent', 'pagelines', 'paper-plane', 'paper-plane-o', 'paperclip', 'paragraph', 'paste', 'pause', 'paw', 'pencil', 'pencil-square', 'pencil-square-o', 'phone', 'phone-square', 'photo', 'picture-o', 'pied-piper', 'pied-piper-alt', 'pied-piper-square', 'pinterest', 'pinterest-square', 'plane', 'play', 'play-circle', 'play-circle-o', 'plus', 'plus-circle', 'plus-square', 'plus-square-o', 'power-off', 'print', 'puzzle-piece', 'qq', 'qrcode', 'question', 'question-circle', 'quote-left', 'quote-right', 'ra', 'random', 'rebel', 'recycle', 'reddit', 'reddit-square', 'refresh', 'renren', 'reorder', 'repeat', 'reply', 'reply-all', 'retweet', 'rmb', 'road', 'rocket', 'rotate-left', 'rotate-right', 'rouble', 'rss', 'rss-square', 'rub', 'ruble', 'rupee', 'save', 'scissors', 'search', 'search-minus', 'search-plus', 'send', 'send-o', 'share', 'share-alt', 'share-alt-square', 'share-square', 'share-square-o', 'shield', 'shopping-cart', 'sign-in', 'sign-out', 'signal', 'sitemap', 'skype', 'slack', 'sliders', 'smile-o', 'sort', 'sort-alpha-asc', 'sort-alpha-desc', 'sort-amount-asc', 'sort-amount-desc', 'sort-asc', 'sort-desc', 'sort-down', 'sort-numeric-asc', 'sort-numeric-desc', 'sort-up', 'soundcloud', 'space-shuttle', 'spinner', 'spoon', 'spotify', 'square', 'square-o', 'stack-exchange', 'stack-overflow', 'star', 'star-half', 'star-half-empty', 'star-half-full', 'star-half-o', 'star-o', 'steam', 'steam-square', 'step-backward', 'step-forward', 'stethoscope', 'stop', 'strikethrough', 'stumbleupon', 'stumbleupon-circle', 'subscript', 'suitcase', 'sun-o', 'superscript', 'support', 'table', 'tablet', 'tachometer', 'tag', 'tags', 'tasks', 'taxi', 'tencent-weibo', 'terminal', 'text-height', 'text-width', 'th', 'th-large', 'th-list', 'thumb-tack', 'thumbs-down', 'thumbs-o-down', 'thumbs-o-up', 'thumbs-up', 'ticket', 'times', 'times-circle', 'times-circle-o', 'tint', 'toggle-down', 'toggle-left', 'toggle-right', 'toggle-up', 'trash-o', 'tree', 'trello', 'trophy', 'truck', 'try', 'tumblr', 'tumblr-square', 'turkish-lira', 'twitter', 'twitter-square', 'umbrella', 'underline', 'undo', 'university', 'unlink', 'unlock', 'unlock-alt', 'unsorted', 'upload', 'usd', 'user', 'user-md', 'users', 'video-camera', 'vimeo-square', 'vine', 'vk', 'volume-down', 'volume-off', 'volume-up', 'warning', 'wechat', 'weibo', 'weixin', 'wheelchair', 'windows', 'won', 'wordpress', 'wrench', 'xing', 'xing-square', 'yahoo', 'yen', 'youtube', 'youtube-play', 'youtube-square' ) );
	}

	/**
	 * Animate.css animations
	 */
	public static function animations() {
		return apply_filters( 'su/data/animations', array( 'flash', 'bounce', 'shake', 'tada', 'swing', 'wobble', 'pulse', 'flip', 'flipInX', 'flipOutX', 'flipInY', 'flipOutY', 'fadeIn', 'fadeInUp', 'fadeInDown', 'fadeInLeft', 'fadeInRight', 'fadeInUpBig', 'fadeInDownBig', 'fadeInLeftBig', 'fadeInRightBig', 'fadeOut', 'fadeOutUp', 'fadeOutDown', 'fadeOutLeft', 'fadeOutRight', 'fadeOutUpBig', 'fadeOutDownBig', 'fadeOutLeftBig', 'fadeOutRightBig', 'slideInDown', 'slideInLeft', 'slideInRight', 'slideOutUp', 'slideOutLeft', 'slideOutRight', 'bounceIn', 'bounceInDown', 'bounceInUp', 'bounceInLeft', 'bounceInRight', 'bounceOut', 'bounceOutDown', 'bounceOutUp', 'bounceOutLeft', 'bounceOutRight', 'rotateIn', 'rotateInDownLeft', 'rotateInDownRight', 'rotateInUpLeft', 'rotateInUpRight', 'rotateOut', 'rotateOutDownLeft', 'rotateOutDownRight', 'rotateOutUpLeft', 'rotateOutUpRight', 'lightSpeedIn', 'lightSpeedOut', 'hinge', 'rollIn', 'rollOut' ) );
	}

	/**
	 * Examples section
	 */
	public static function examples() {
		return apply_filters( 'su/data/examples', array(
				'basic' => array(
					'title' => __( 'Basic examples', 'su' ),
					'items' => array(
						array(
							'name' => __( 'Accordions, spoilers, different styles, anchors', 'su' ),
							'id'   => 'spoilers',
							'code' => plugin_dir_path( SU_PLUGIN_FILE ) . '/inc/examples/spoilers.example',
							'icon' => 'tasks'
						),
						array(
							'name' => __( 'Tabs, vertical tabs, tab anchors', 'su' ),
							'id'   => 'tabs',
							'code' => plugin_dir_path( SU_PLUGIN_FILE ) . '/inc/examples/tabs.example',
							'icon' => 'folder'
						),
						array(
							'name' => __( 'Column layouts', 'su' ),
							'id'   => 'columns',
							'code' => plugin_dir_path( SU_PLUGIN_FILE ) . '/inc/examples/columns.example',
							'icon' => 'th-large'
						),
						array(
							'name' => __( 'Media elements, YouTube, Vimeo, Screenr and self-hosted videos, audio player', 'su' ),
							'id'   => 'media',
							'code' => plugin_dir_path( SU_PLUGIN_FILE ) . '/inc/examples/media.example',
							'icon' => 'play-circle'
						),
						array(
							'name' => __( 'Unlimited buttons', 'su' ),
							'id'   => 'buttons',
							'code' => plugin_dir_path( SU_PLUGIN_FILE ) . '/inc/examples/buttons.example',
							'icon' => 'heart'
						),
						array(
							'name' => __( 'Animations', 'su' ),
							'id'   => 'animations',
							'code' => plugin_dir_path( SU_PLUGIN_FILE ) . '/inc/examples/animations.example',
							'icon' => 'bolt'
						),
					)
				),
				'advanced' => array(
					'title' => __( 'Advanced examples', 'su' ),
					'items' => array(
						array(
							'name' => __( 'Interacting with posts shortcode', 'su' ),
							'id' => 'posts',
							'code' => plugin_dir_path( SU_PLUGIN_FILE ) . '/inc/examples/posts.example',
							'icon' => 'list'
						),
						array(
							'name' => __( 'Nested shortcodes, shortcodes inside of attributes', 'su' ),
							'id' => 'nested',
							'code' => plugin_dir_path( SU_PLUGIN_FILE ) . '/inc/examples/nested.example',
							'icon' => 'indent'
						),
					)
				),
			) );
	}

	/**
	 * Shortcodes
	 */
	public static function shortcodes( $shortcode = false ) {
		$shortcodes = apply_filters( 'su/data/shortcodes', array(
				// row
				'row' => array(
					'name'  => __( 'Row', 'tm' ),
					'type'  => 'wrap',
					'group' => 'box',
					'atts'  => array(
						'type' => array(
							'type'   => 'select',
							'values' => array(
								'fixed-width' => __( 'Fixed Width', 'tm' ),
								'full-width'  => __( 'Full Width', 'tm' ),
							),
							'default' => 'fixed-width',
							'name'    => __( 'Type', 'tm' ),
							'desc'    => __( 'Type width', 'tm' ),
						),
						'class' => array(
							'default' => '',
							'name'    => __( 'Class', 'tm' ),
							'desc'    => __( 'Extra CSS class', 'tm' ),
						)
					),
					'content' => __( "[%prefix_col size_md=\"4\"]Column content[/%prefix_col]\n[%prefix_col size_md=\"4\"]Column content[/%prefix_col]\n[%prefix_col size_md=\"4\"]Column content[/%prefix_col]", 'tm' ),
					'desc'    => __( 'Row for flexible columns', 'tm' ),
					'icon'    => 'columns',
				),
				// row_inner
				'row_inner' => array(
					'name'  => __( 'Row Inner', 'tm' ),
					'type'  => 'wrap',
					'group' => 'box',
					'atts'  => array(
						'class' => array(
							'default' => '',
							'name'    => __( 'Class', 'tm' ),
							'desc'    => __( 'Extra CSS class', 'tm' ),
						)
					),
					'content' => __( "[%prefix_col_inner size_md=\"4\"]Column content[/%prefix_col_inner]\n[%prefix_col_inner size_md=\"4\"]Column content[/%prefix_col_inner]\n[%prefix_col_inner size_md=\"4\"]Column content[/%prefix_col_inner]", 'tm' ),
					'desc'    => __( 'Row for flexible columns', 'tm' ),
					'icon'    => 'columns',
				),
				// col
				'col' => array(
					'name'  => __( 'Column', 'tm' ),
					'type'  => 'wrap',
					'group' => 'box',
					'atts'  => array(
						'size' => array(
							'type'    => 'responsive',
							'default' => 'none none 6 none',
							'name'    => __( 'Size', 'tm' ),
							'desc'    => __( 'Select column width.', 'tm' ),
						),
						'offset' => array(
							'type'    => 'responsive',
							'default' => 'none',
							'name'    => __( 'Offset', 'tm' ),
							'desc'    => __( 'Select column offset.', 'tm' ),
						),
						'pull' => array(
							'type'    => 'responsive',
							'default' => 'none',
							'name'    => __( 'Pull', 'tm' ),
							'desc'    => __( 'Select column pull.', 'tm' ),
						),
						'push' => array(
							'type'    => 'responsive',
							'default' => 'none',
							'name'    => __( 'Push', 'tm' ),
							'desc'    => __( 'Select column push.', 'tm' ),
						),
						'class' => array(
							'default' => '',
							'name'    => __( 'Class', 'tm' ),
							'desc'    => __( 'Extra CSS class', 'tm' ),
						)
					),
					'content' => __( 'Column content', 'tm' ),
					'desc'    => __( 'Flexible and responsive columns', 'tm' ),
					'note'    => __( 'Did you know that you need to wrap columns with [row] shortcode?', 'tm' ),
					'icon'    => 'columns',
				),
				// col_inner
				'col_inner' => array(
					'name'  => __( 'Column Inner', 'tm' ),
					'type'  => 'wrap',
					'group' => 'box',
					'atts'  => array(
						'size' => array(
							'type'    => 'responsive',
							'default' => 'none none 6 none',
							'name'    => __( 'Size', 'tm' ),
							'desc'    => __( 'Select column width.', 'tm' ),
						),
						'offset' => array(
							'type'    => 'responsive',
							'default' => 'none',
							'name'    => __( 'Offset', 'tm' ),
							'desc'    => __( 'Select column offset.', 'tm' ),
						),
						'pull' => array(
							'type'    => 'responsive',
							'default' => 'none',
							'name'    => __( 'Pull', 'tm' ),
							'desc'    => __( 'Select column pull.', 'tm' ),
						),
						'push' => array(
							'type'    => 'responsive',
							'default' => 'none',
							'name'    => __( 'Push', 'tm' ),
							'desc'    => __( 'Select column push.', 'tm' ),
						),
						'class' => array(
							'default' => '',
							'name'    => __( 'Class', 'tm' ),
							'desc'    => __( 'Extra CSS class', 'tm' ),
						)
					),
					'content' => __( 'Column content', 'tm' ),
					'desc'    => __( 'Flexible and responsive columns', 'tm' ),
					'note'    => __( 'Did you know that you need to wrap columns with [row_inner] shortcode?', 'tm' ),
					'icon'    => 'columns',
				),
				// posts
				'posts' => array(
					'name'  => __( 'Posts', 'su' ),
					'type'  => 'single',
					'group' => 'other',
					'atts'  => array(
						'id' => array(
							'default' => '',
							'name'    => __( 'Post ID\'s', 'su' ),
							'desc'    => __( 'Enter comma separated ID\'s of the posts that you want to show', 'su' ),
						),
						'posts_per_page' => array(
							'type'    => 'number',
							'min'     => -1,
							'max'     => 10000,
							'step'    => 1,
							'default' => get_option( 'posts_per_page' ),
							'name'    => __( 'Posts per page', 'su' ),
							'desc'    => __( 'Specify number of posts that you want to show. Enter -1 to get all posts', 'su' ),
						),
						'post_type' => array(
							'type'     => 'select',
							'multiple' => true,
							'values'   => Su_Tools::get_types(),
							'default'  => 'post',
							'name'     => __( 'Post types', 'su' ),
							'desc'     => __( 'Select post types. Hold Ctrl key to select multiple post types', 'su' ),
						),
						'taxonomy' => array(
							'type'    => 'select',
							'values'  => Su_Tools::get_taxonomies(),
							'default' => 'category',
							'name'    => __( 'Taxonomy', 'su' ),
							'desc'    => __( 'Select taxonomy to show posts from', 'su' ),
						),
						'tax_term' => array(
							'type'     => 'select',
							'multiple' => true,
							'values'   => Su_Tools::get_terms( 'category' ),
							'default'  => '',
							'name'     => __( 'Terms', 'su' ),
							'desc'     => __( 'Select terms to show posts from', 'su' ),
						),
						'tax_operator' => array(
							'type'    => 'select',
							'values'  => array( 'IN', 'NOT IN', 'AND' ),
							'default' => 'IN',
							'name'    => __( 'Taxonomy term operator', 'su' ),
							'desc'    => __( 'IN - posts that have any of selected categories terms<br/>NOT IN - posts that is does not have any of selected terms<br/>AND - posts that have all selected terms', 'su' ),
						),
						// 'author' => array(
						// 	'type' => 'select',
						// 	'multiple' => true,
						// 	'values' => Su_Tools::get_users(),
						// 	'default' => 'default',
						// 	'name' => __( 'Authors', 'su' ),
						// 	'desc' => __( 'Choose the authors whose posts you want to show. Enter here comma-separated list of users (IDs). Example: 1,7,18', 'su' )
						// ),
						'author' => array(
							'default' => '',
							'name'    => __( 'Authors', 'su' ),
							'desc'    => __( 'Enter here comma-separated list of author\'s IDs. Example: 1,7,18', 'su' ),
						),
						'meta_key' => array(
							'default' => '',
							'name'    => __( 'Meta key', 'su' ),
							'desc'    => __( 'Enter meta key name to show posts that have this key', 'su' ),
						),
						'offset' => array(
							'type'    => 'number',
							'min'     => 0,
							'max'     => 10000,
							'step'    => 1,
							'default' => 0,
							'name'    => __( 'Offset', 'su' ),
							'desc'    => __( 'Specify offset to start posts loop not from first post', 'su' ),
						),
						'order' => array(
							'type'   => 'select',
							'values' => array(
								'desc' => __( 'Descending', 'su' ),
								'asc'  => __( 'Ascending', 'su' ),
							),
							'default' => 'DESC',
							'name'    => __( 'Order', 'su' ),
							'desc'    => __( 'Posts order', 'su' ),
						),
						'orderby' => array(
							'type'   => 'select',
							'values' => array(
								'none'          => __( 'None', 'su' ),
								'id'            => __( 'Post ID', 'su' ),
								'author'        => __( 'Post author', 'su' ),
								'title'         => __( 'Post title', 'su' ),
								'name'          => __( 'Post slug', 'su' ),
								'date'          => __( 'Date', 'su' ),
								'modified'      => __( 'Last modified date', 'su' ),
								'parent'        => __( 'Post parent', 'su' ),
								'rand'          => __( 'Random', 'su' ),
								'comment_count' => __( 'Comments number', 'su' ),
								'menu_order'    => __( 'Menu order', 'su' ),
								'meta_value'    => __( 'Meta key values', 'su' ),
							),
							'default' => 'date',
							'name'    => __( 'Order by', 'su' ),
							'desc'    => __( 'Order posts by', 'su' ),
						),
						'post_parent' => array(
							'default' => '',
							'name'    => __( 'Post parent', 'su' ),
							'desc'    => __( 'Show childrens of entered post (enter post ID)', 'su' ),
						),
						'post_status' => array(
							'type'   => 'select',
							'values' => array(
								'publish'    => __( 'Published', 'su' ),
								'pending'    => __( 'Pending', 'su' ),
								'draft'      => __( 'Draft', 'su' ),
								'auto-draft' => __( 'Auto-draft', 'su' ),
								'future'     => __( 'Future post', 'su' ),
								'private'    => __( 'Private post', 'su' ),
								'inherit'    => __( 'Inherit', 'su' ),
								'trash'      => __( 'Trashed', 'su' ),
								'any'        => __( 'Any', 'su' ),
							),
							'default' => 'publish',
							'name'    => __( 'Post status', 'su' ),
							'desc'    => __( 'Show only posts with selected status', 'su' ),
						),
						'ignore_sticky_posts' => array(
							'type'    => 'bool',
							'default' => 'no',
							'name'    => __( 'Ignore sticky', 'su' ),
							'desc'    => __( 'Select Yes to ignore posts that is sticked', 'su' ),
						),
						'template' => array(
							'type'   => 'select',
							'values' => array(
								'default.tmpl' => 'default.tmpl',
							),
							'default' => 'default.tmpl',
							'name'    => __( 'Template', 'su' ),
							'desc'    => __( 'Shortcode template', 'su' ),
						),
					),
					'desc' => __( 'Custom posts query with customizable template', 'su' ),
					'icon' => 'th-list',
				),
			) );

		// Return result.
		return ( is_string( $shortcode ) ) ? $shortcodes[sanitize_text_field( $shortcode )] : $shortcodes;
	}
}

class Shortcodes_Ultimate_Data extends Su_Data {
	function __construct() {
		parent::__construct();
	}
}