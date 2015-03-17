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
				'all'     => __( 'All', 'cherry-shortcodes' ),
				'content' => __( 'Content', 'cherry-shortcodes' ),
				'box'     => __( 'Box', 'cherry-shortcodes' ),
				'media'   => __( 'Media', 'cherry-shortcodes' ),
				'gallery' => __( 'Gallery', 'cherry-shortcodes' ),
				'data'    => __( 'Data', 'cherry-shortcodes' ),
				'other'   => __( 'Other', 'cherry-shortcodes' ),
			) );
	}

	/**
	 * Border styles
	 */
	public static function borders() {
		return apply_filters( 'su/data/borders', array(
				'none'   => __( 'None', 'cherry-shortcodes' ),
				'solid'  => __( 'Solid', 'cherry-shortcodes' ),
				'dotted' => __( 'Dotted', 'cherry-shortcodes' ),
				'dashed' => __( 'Dashed', 'cherry-shortcodes' ),
				'double' => __( 'Double', 'cherry-shortcodes' ),
				'groove' => __( 'Groove', 'cherry-shortcodes' ),
				'ridge'  => __( 'Ridge', 'cherry-shortcodes' )
			) );
	}

	/**
	 * Font-Awesome icons
	 */
	public static function icons() {
		return apply_filters( 'su/data/icons', array( 'adjust', 'adn', 'align-center', 'align-justify', 'align-left', 'align-right', 'ambulance', 'anchor', 'android', 'angle-double-down', 'angle-double-left', 'angle-double-right', 'angle-double-up', 'angle-down', 'angle-left', 'angle-right', 'angle-up', 'apple', 'archive', 'arrow-circle-down', 'arrow-circle-left', 'arrow-circle-o-down', 'arrow-circle-o-left', 'arrow-circle-o-right', 'arrow-circle-o-up', 'arrow-circle-right', 'arrow-circle-up', 'arrow-down', 'arrow-left', 'arrow-right', 'arrow-up', 'arrows', 'arrows-alt', 'arrows-h', 'arrows-v', 'asterisk', 'automobile', 'backward', 'ban', 'bank', 'bar-chart-o', 'barcode', 'bars', 'beer', 'behance', 'behance-square', 'bell', 'bell-o', 'bitbucket', 'bitbucket-square', 'bitcoin', 'bold', 'bolt', 'bomb', 'book', 'bookmark', 'bookmark-o', 'briefcase', 'btc', 'bug', 'building', 'building-o', 'bullhorn', 'bullseye', 'cab', 'calendar', 'calendar-o', 'camera', 'camera-retro', 'car', 'caret-down', 'caret-left', 'caret-right', 'caret-square-o-down', 'caret-square-o-left', 'caret-square-o-right', 'caret-square-o-up', 'caret-up', 'certificate', 'chain', 'chain-broken', 'check', 'check-circle', 'check-circle-o', 'check-square', 'check-square-o', 'chevron-circle-down', 'chevron-circle-left', 'chevron-circle-right', 'chevron-circle-up', 'chevron-down', 'chevron-left', 'chevron-right', 'chevron-up', 'child', 'circle', 'circle-o', 'circle-o-notch', 'circle-thin', 'clipboard', 'clock-o', 'cloud', 'cloud-download', 'cloud-upload', 'cny', 'code', 'code-fork', 'codepen', 'coffee', 'cog', 'cogs', 'columns', 'comment', 'comment-o', 'comments', 'comments-o', 'compass', 'compress', 'copy', 'credit-card', 'crop', 'crosshairs', 'css3', 'cube', 'cubes', 'cut', 'cutlery', 'dashboard', 'database', 'dedent', 'delicious', 'desktop', 'deviantart', 'digg', 'dollar', 'dot-circle-o', 'download', 'dribbble', 'dropbox', 'drupal', 'edit', 'eject', 'ellipsis-h', 'ellipsis-v', 'empire', 'envelope', 'envelope-o', 'envelope-square', 'eraser', 'eur', 'euro', 'exchange', 'exclamation', 'exclamation-circle', 'exclamation-triangle', 'expand', 'external-link', 'external-link-square', 'eye', 'eye-slash', 'facebook', 'facebook-square', 'fast-backward', 'fast-forward', 'fax', 'female', 'fighter-jet', 'file', 'file-archive-o', 'file-audio-o', 'file-code-o', 'file-excel-o', 'file-image-o', 'file-movie-o', 'file-o', 'file-pdf-o', 'file-photo-o', 'file-picture-o', 'file-powerpoint-o', 'file-sound-o', 'file-text', 'file-text-o', 'file-video-o', 'file-word-o', 'file-zip-o', 'files-o', 'film', 'filter', 'fire', 'fire-extinguisher', 'flag', 'flag-checkered', 'flag-o', 'flash', 'flask', 'flickr', 'floppy-o', 'folder', 'folder-o', 'folder-open', 'folder-open-o', 'font', 'forward', 'foursquare', 'frown-o', 'gamepad', 'gavel', 'gbp', 'ge', 'gear', 'gears', 'gift', 'git', 'git-square', 'github', 'github-alt', 'github-square', 'gittip', 'glass', 'globe', 'google', 'google-plus', 'google-plus-square', 'graduation-cap', 'group', 'h-square', 'hacker-news', 'hand-o-down', 'hand-o-left', 'hand-o-right', 'hand-o-up', 'hdd-o', 'header', 'headphones', 'heart', 'heart-o', 'history', 'home', 'hospital-o', 'hcherry-shortcodesl5', 'image', 'inbox', 'indent', 'info', 'info-circle', 'inr', 'instagram', 'institution', 'italic', 'joomla', 'jpy', 'jsfiddle', 'key', 'keyboard-o', 'krw', 'language', 'laptop', 'leaf', 'legal', 'lemon-o', 'level-down', 'level-up', 'life-bouy', 'life-ring', 'life-saver', 'lightbulb-o', 'link', 'linkedin', 'linkedin-square', 'linux', 'list', 'list-alt', 'list-ol', 'list-ul', 'location-arrow', 'lock', 'long-arrow-down', 'long-arrow-left', 'long-arrow-right', 'long-arrow-up', 'magic', 'magnet', 'mail-forward', 'mail-reply', 'mail-reply-all', 'male', 'map-marker', 'maxcdn', 'medkit', 'meh-o', 'microphone', 'microphone-slash', 'minus', 'minus-circle', 'minus-square', 'minus-square-o', 'mobile', 'mobile-phone', 'money', 'moon-o', 'mortar-board', 'music', 'navicon', 'openid', 'outdent', 'pagelines', 'paper-plane', 'paper-plane-o', 'paperclip', 'paragraph', 'paste', 'pause', 'paw', 'pencil', 'pencil-square', 'pencil-square-o', 'phone', 'phone-square', 'photo', 'picture-o', 'pied-piper', 'pied-piper-alt', 'pied-piper-square', 'pinterest', 'pinterest-square', 'plane', 'play', 'play-circle', 'play-circle-o', 'plus', 'plus-circle', 'plus-square', 'plus-square-o', 'power-off', 'print', 'puzzle-piece', 'qq', 'qrcode', 'question', 'question-circle', 'quote-left', 'quote-right', 'ra', 'random', 'rebel', 'recycle', 'reddit', 'reddit-square', 'refresh', 'renren', 'reorder', 'repeat', 'reply', 'reply-all', 'retweet', 'rmb', 'road', 'rocket', 'rotate-left', 'rotate-right', 'rouble', 'rss', 'rss-square', 'rub', 'ruble', 'rupee', 'save', 'scissors', 'search', 'search-minus', 'search-plus', 'send', 'send-o', 'share', 'share-alt', 'share-alt-square', 'share-square', 'share-square-o', 'shield', 'shopping-cart', 'sign-in', 'sign-out', 'signal', 'sitemap', 'skype', 'slack', 'sliders', 'smile-o', 'sort', 'sort-alpha-asc', 'sort-alpha-desc', 'sort-amount-asc', 'sort-amount-desc', 'sort-asc', 'sort-desc', 'sort-down', 'sort-numeric-asc', 'sort-numeric-desc', 'sort-up', 'soundcloud', 'space-shuttle', 'spinner', 'spoon', 'spotify', 'square', 'square-o', 'stack-exchange', 'stack-overflow', 'star', 'star-half', 'star-half-empty', 'star-half-full', 'star-half-o', 'star-o', 'steam', 'steam-square', 'step-backward', 'step-forward', 'stethoscope', 'stop', 'strikethrough', 'stumbleupon', 'stumbleupon-circle', 'subscript', 'suitcase', 'sun-o', 'superscript', 'support', 'table', 'tablet', 'tachometer', 'tag', 'tags', 'tasks', 'taxi', 'tencent-weibo', 'terminal', 'text-height', 'text-width', 'th', 'th-large', 'th-list', 'thumb-tack', 'thumbs-down', 'thumbs-o-down', 'thumbs-o-up', 'thumbs-up', 'ticket', 'times', 'times-circle', 'times-circle-o', 'tint', 'toggle-down', 'toggle-left', 'toggle-right', 'toggle-up', 'trash-o', 'tree', 'trello', 'trophy', 'truck', 'try', 'tumblr', 'tumblr-square', 'turkish-lira', 'twitter', 'twitter-square', 'umbrella', 'underline', 'undo', 'university', 'unlink', 'unlock', 'unlock-alt', 'unsorted', 'upload', 'usd', 'user', 'user-md', 'users', 'video-camera', 'vimeo-square', 'vine', 'vk', 'volume-down', 'volume-off', 'volume-up', 'warning', 'wechat', 'weibo', 'weixin', 'wheelchair', 'windows', 'won', 'wordpress', 'wrench', 'xing', 'xing-square', 'yahoo', 'yen', 'youtube', 'youtube-play', 'youtube-square' ) );
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
					'name'  => __( 'Row', 'cherry-shortcodes' ),
					'type'  => 'wrap',
					'group' => 'box',
					'atts'  => array(
						'class' => array(
							'default' => '',
							'name'    => __( 'Class', 'cherry-shortcodes' ),
							'desc'    => __( 'Extra CSS class', 'cherry-shortcodes' ),
						)
					),
					'content' => __( "[%prefix_col size_md=\"4\"]Column content[/%prefix_col]\n[%prefix_col size_md=\"4\"]Column content[/%prefix_col]\n[%prefix_col size_md=\"4\"]Column content[/%prefix_col]", 'cherry-shortcodes' ),
					'desc'    => __( 'Row for flexible columns', 'cherry-shortcodes' ),
					'icon'    => 'columns',
				),
				// row_inner
				'row_inner' => array(
					'name'  => __( 'Row Inner', 'cherry-shortcodes' ),
					'type'  => 'wrap',
					'group' => 'box',
					'atts'  => array(
						'class' => array(
							'default' => '',
							'name'    => __( 'Class', 'cherry-shortcodes' ),
							'desc'    => __( 'Extra CSS class', 'cherry-shortcodes' ),
						)
					),
					'content' => __( "[%prefix_col_inner size_md=\"4\"]Column content[/%prefix_col_inner]\n[%prefix_col_inner size_md=\"4\"]Column content[/%prefix_col_inner]\n[%prefix_col_inner size_md=\"4\"]Column content[/%prefix_col_inner]", 'cherry-shortcodes' ),
					'desc'    => __( 'Row for flexible columns', 'cherry-shortcodes' ),
					'icon'    => 'columns',
				),
				// col
				'col' => array(
					'name'  => __( 'Column', 'cherry-shortcodes' ),
					'type'  => 'wrap',
					'group' => 'box',
					'atts'  => array(
						'size' => array(
							'type'    => 'responsive',
							'default' => 'none none 6 none',
							'name'    => __( 'Size', 'cherry-shortcodes' ),
							'desc'    => __( 'Select column width.', 'cherry-shortcodes' ),
						),
						'offset' => array(
							'type'    => 'responsive',
							'default' => 'none',
							'name'    => __( 'Offset', 'cherry-shortcodes' ),
							'desc'    => __( 'Select column offset.', 'cherry-shortcodes' ),
						),
						'pull' => array(
							'type'    => 'responsive',
							'default' => 'none',
							'name'    => __( 'Pull', 'cherry-shortcodes' ),
							'desc'    => __( 'Select column pull.', 'cherry-shortcodes' ),
						),
						'push' => array(
							'type'    => 'responsive',
							'default' => 'none',
							'name'    => __( 'Push', 'cherry-shortcodes' ),
							'desc'    => __( 'Select column push.', 'cherry-shortcodes' ),
						),
						'class' => array(
							'default' => '',
							'name'    => __( 'Class', 'cherry-shortcodes' ),
							'desc'    => __( 'Extra CSS class', 'cherry-shortcodes' ),
						)
					),
					'content' => __( 'Column content', 'cherry-shortcodes' ),
					'desc'    => __( 'Flexible and responsive columns', 'cherry-shortcodes' ),
					'note'    => __( 'Did you know that you need to wrap columns with [row] shortcode?', 'cherry-shortcodes' ),
					'icon'    => 'columns',
				),
				// col_inner
				'col_inner' => array(
					'name'  => __( 'Column Inner', 'cherry-shortcodes' ),
					'type'  => 'wrap',
					'group' => 'box',
					'atts'  => array(
						'size' => array(
							'type'    => 'responsive',
							'default' => 'none none 6 none',
							'name'    => __( 'Size', 'cherry-shortcodes' ),
							'desc'    => __( 'Select column width.', 'cherry-shortcodes' ),
						),
						'offset' => array(
							'type'    => 'responsive',
							'default' => 'none',
							'name'    => __( 'Offset', 'cherry-shortcodes' ),
							'desc'    => __( 'Select column offset.', 'cherry-shortcodes' ),
						),
						'pull' => array(
							'type'    => 'responsive',
							'default' => 'none',
							'name'    => __( 'Pull', 'cherry-shortcodes' ),
							'desc'    => __( 'Select column pull.', 'cherry-shortcodes' ),
						),
						'push' => array(
							'type'    => 'responsive',
							'default' => 'none',
							'name'    => __( 'Push', 'cherry-shortcodes' ),
							'desc'    => __( 'Select column push.', 'cherry-shortcodes' ),
						),
						'class' => array(
							'default' => '',
							'name'    => __( 'Class', 'cherry-shortcodes' ),
							'desc'    => __( 'Extra CSS class', 'cherry-shortcodes' ),
						)
					),
					'content' => __( 'Column content', 'cherry-shortcodes' ),
					'desc'    => __( 'Flexible and responsive columns', 'cherry-shortcodes' ),
					'note'    => __( 'Did you know that you need to wrap columns with [row_inner] shortcode?', 'cherry-shortcodes' ),
					'icon'    => 'columns',
				),
				// spacer
				'spacer' => array(
					'name'  => __( 'Spacer', 'cherry-shortcodes' ),
					'type'  => 'single',
					'group' => 'box',
					'atts'  => array(
						'size'  => array(
							'type'    => 'number',
							'min'     => 0,
							'max'     => 300,
							'step'    => 1,
							'default' => 20,
							'name'    => __( 'Size', 'cherry-shortcodes' ),
							'desc'    => __( 'Spacer height', 'cherry-shortcodes' ),
						),
						'class' => array(
							'default' => '',
							'name'    => __( 'Class', 'cherry-shortcodes' ),
							'desc'    => __( 'Extra CSS class', 'cherry-shortcodes' ),
						)
					),
					'desc'    => __( 'Vertical spacer between blocks', 'cherry-shortcodes' ),
					'icon'    => 'arrows-v',
				),
				// spacer
				'clear' => array(
					'name'  => __( 'Clear', 'cherry-shortcodes' ),
					'type'  => 'single',
					'group' => 'box',
					'atts'  => array(
						'class' => array(
							'default' => '',
							'name'    => __( 'Class', 'cherry-shortcodes' ),
							'desc'    => __( 'Extra CSS class', 'cherry-shortcodes' ),
						)
					),
					'desc'    => __( 'Clearing block', 'cherry-shortcodes' ),
					'icon'    => 'eraser',
				),
				'button' => array(
					'name'  => __( 'Button', 'cherry-shortcodes' ),
					'type'  => 'single',
					'group' => 'content',
					'atts'  => array(
						'text' => array(
							'default' => __( 'Read more', 'cherry-shortcodes' ),
							'name'    => __( 'Text', 'cherry-shortcodes' ),
							'desc'    => __( 'Button text', 'cherry-shortcodes' )
						),
						'url' => array(
							'default' => '#',
							'name'    => __( 'Link', 'cherry-shortcodes' ),
							'desc'    => __( 'Button link', 'cherry-shortcodes' )
						),
						'style' => array(
							'type'   => 'select',
							'values' => apply_filters(
								'cherry_shortcodes_button_style_presets',
								array(
									'primary' => __( 'Primary', 'cherry-shortcodes' ),
									'primary-light' => __( 'Primary-light', 'cherry-shortcodes' ),
									'default' => __( 'Default', 'cherry-shortcodes' ),
									'gray' => __( 'Gray', 'cherry-shortcodes' ),
									'success' => __( 'Success', 'cherry-shortcodes' ),
									'info'    => __( 'Info', 'cherry-shortcodes' ),
									'warning' => __( 'Warning', 'cherry-shortcodes' ),
									'danger'  => __( 'Danger', 'cherry-shortcodes' ),
									'link'    => __( 'Link', 'cherry-shortcodes' )
								)
							),
							'default' => 'primary',
							'name'    => __( 'Style', 'cherry-shortcodes' ),
							'desc'    => __( 'Button style preset', 'cherry-shortcodes' )
						),
						'size' => array(
							'type'   => 'select',
							'values' => apply_filters(
								'cherry_shortcodes_button_size_presets',
								array(
									'extra-small' => __( 'Extra Small', 'cherry-shortcodes' ),
									'small'       => __( 'Small', 'cherry-shortcodes' ),
									'medium'      => __( 'Medium', 'cherry-shortcodes' ),
									'large'       => __( 'Large', 'cherry-shortcodes' ),
									'extra-large' => __( 'Extra Large', 'cherry-shortcodes' )
								)
							),
							'default' => 'medium',
							'name'    => __( 'Size', 'cherry-shortcodes' ),
							'desc'    => __( 'Button size preset', 'cherry-shortcodes' )
						),
						'display' => array(
							'type'   => 'select',
							'values' => array(
								'inline' => __( 'Inline', 'cherry-shortcodes' ),
								'wide'   => __( 'Wide', 'cherry-shortcodes' )
							),
							'default' => 'inline',
							'name'    => __( 'Display', 'cherry-shortcodes' ),
							'desc'    => __( 'Button display type', 'cherry-shortcodes' )
						),
						'radius' => array(
							'type' => 'slider',
							'min' => 0,
							'max' => 60,
							'step' => 1,
							'default' => 0,
							'name' => __( 'Border radius', 'cherry-shortcodes' ),
							'desc' => __( 'Button border radius', 'cherry-shortcodes' )
						),
						'centered' => array(
							'type' => 'bool',
							'default' => 'no',
							'name' => __( 'Centered', 'cherry-shortcodes' ),
							'desc' => __( 'Is button centered on the page', 'cherry-shortcodes' )
						),
						'fluid' => array(
							'type' => 'bool',
							'default' => 'no',
							'name' => __( 'Fluid', 'cherry-shortcodes' ),
							'desc' => __( 'Is button fluid', 'cherry-shortcodes' )
						),
						'fluid_position' => array(
							'type'   => 'select',
							'values' => array(
								'left'  => __( 'Left', 'cherry-shortcodes' ),
								'right' => __( 'Right', 'cherry-shortcodes' )
							),
							'default' => 'left',
							'name'    => __( 'Fluid Position', 'cherry-shortcodes' ),
							'desc'    => __( 'Button fluid position', 'cherry-shortcodes' )
						),
						'icon' => array(
							'type' => 'icon',
							'default' => '',
							'name' => __( 'Icon', 'cherry-shortcodes' ),
							'desc' => __( 'You can upload custom icon for this button or pick a built-in icon', 'cherry-shortcodes' )
						),
						'icon_position' => array(
							'type'   => 'select',
							'values' => array(
								'left'   => __( 'Left', 'cherry-shortcodes' ),
								'top'    => __( 'Top', 'cherry-shortcodes' ),
								'right'  => __( 'Right', 'cherry-shortcodes' ),
								'bottom' => __( 'Bottom', 'cherry-shortcodes' ),
							),
							'default' => 'left',
							'name'    => __( 'Icon Position', 'cherry-shortcodes' ),
							'desc'    => __( 'Button icon position', 'cherry-shortcodes' )
						),
						'desc' => array(
							'default' => '',
							'name' => __( 'Description', 'cherry-shortcodes' ),
							'desc' => __( 'Small description under button text.', 'cherry-shortcodes' )
						),
						'bg_color' => array(
							'type'    => 'color',
							'values'  => array(),
							'default' => '#2D89EF',
							'name'    => __( 'Background', 'cherry-shortcodes' ),
							'desc'    => __( 'Button background color', 'cherry-shortcodes' )
						),
						'color' => array(
							'type'    => 'color',
							'values'  => array(),
							'default' => '#FFFFFF',
							'name'    => __( 'Text color', 'cherry-shortcodes' ),
							'desc'    => __( 'Button text color', 'cherry-shortcodes' )
						),
						'min_width' => array(
							'type'    => 'slider',
							'min'     => 0,
							'max'     => 400,
							'step'    => 1,
							'default' => 0,
							'name'    => __( 'Min width', 'cherry-shortcodes' ),
							'desc'    => __( 'Button minimal width', 'cherry-shortcodes' )
						),
						'target' => array(
							'type'   => 'select',
							'values' => array(
								'self'  => __( 'Same tab', 'cherry-shortcodes' ),
								'blank' => __( 'New tab', 'cherry-shortcodes' )
							),
							'default' => 'self',
							'name' => __( 'Target', 'cherry-shortcodes' ),
							'desc' => __( 'Button link target', 'cherry-shortcodes' )
						),
						'rel' => array(
							'default' => '',
							'name' => __( 'Rel attribute', 'cherry-shortcodes' ),
							'desc' => __( 'Here you can add value for the rel attribute.', 'cherry-shortcodes' )
						),
						'hover_animation' => array(
							'type'   => 'select',
							'values' => apply_filters(
								'cherry_shortcodes_button_hover_presets',
								array(
									'fade'  => __( 'Fade', 'cherry-shortcodes' )
								)
							),
							'default' => 'self',
							'name' => __( 'Hover animation', 'cherry-shortcodes' ),
							'desc' => __( 'Button hover aniamtion type', 'cherry-shortcodes' )
						),
						'class' => array(
							'default' => '',
							'name'    => __( 'Class', 'cherry-shortcodes' ),
							'desc'    => __( 'Extra CSS class', 'cherry-shortcodes' )
						)
					),
					'desc'    => __( 'Styled button', 'cherry-shortcodes' ),
					'icon'    => 'heart'
				),
				// list
				/**
				 * @todo Choose way to get bullets for list items from. Without this shortcode doesn't have any sense
				 */
				/*
				'list' => array(
					'name'  => __( 'List', 'cherry-shortcodes' ),
					'type'  => 'wrap',
					'group' => 'box',
					'atts'  => array(
						'type'  => array(
							'type'    => 'select',
							'values' => array(
								'circle'       => __( 'Circle', 'cherry-shortcodes' ),
								'arrow'        => __( 'Arrow', 'cherry-shortcodes' ),
								'double-arrow' => __( 'Double Arrow', 'cherry-shortcodes' ),
							),
							'default' => 'circle',
							'name'    => __( 'Type', 'cherry-shortcodes' ),
							'desc'    => __( 'Select list bullet type', 'cherry-shortcodes' ),
						),
						'class' => array(
							'default' => '',
							'name'    => __( 'Class', 'cherry-shortcodes' ),
							'desc'    => __( 'Extra CSS class', 'cherry-shortcodes' ),
						)
					),
					'content'  => sprintf( '<ul><li>%s</li></ul>', __( 'List Item', 'cherry-shortcodes' ) ),
					'desc'     => __( 'List', 'cherry-shortcodes' ),
					'icon'     => 'list-ul',
					'function' => array( 'Su_Shortcodes', 'list_' )
				),*/
				'swiper_carousel' => array(
					'name'  => __( 'Swiper carousel', 'cherry-shortcodes' ),
					'type'  => 'single',
					'group' => 'gallery',
					'desc' => __( 'Custom posts query with customizable template', 'cherry-shortcodes' ),
					'icon' => 'photo',
					'atts'  => array(
						'posts_per_page' => array(
							'type'    => 'number',
							'min'     => -1,
							'max'     => 10000,
							'step'    => 1,
							'default' => get_option( 'posts_per_page' ),
							'name'    => __( 'Posts per page', 'cherry-shortcodes' ),
							'desc'    => __( 'Specify number of posts that you want to show. Enter -1 to get all posts', 'cherry-shortcodes' ),
						),
						'post_type' => array(
							'type'     => 'select',
							'multiple' => true,
							'values'   => Su_Tools::get_types(),
							'default'  => 'post',
							'name'     => __( 'Post types', 'cherry-shortcodes' ),
							'desc'     => __( 'Select post types. Hold Ctrl key to select multiple post types', 'cherry-shortcodes' ),
						),
						'taxonomy' => array(
							'type'    => 'select',
							'values'  => Su_Tools::get_taxonomies(),
							'default' => 'category',
							'name'    => __( 'Taxonomy', 'cherry-shortcodes' ),
							'desc'    => __( 'Select taxonomy to show posts from', 'cherry-shortcodes' ),
						),
						'tax_term' => array(
							'type'     => 'select',
							'multiple' => true,
							'values'   => Su_Tools::get_terms( 'category' ),
							'default'  => '',
							'name'     => __( 'Terms', 'cherry-shortcodes' ),
							'desc'     => __( 'Select terms to show posts from', 'cherry-shortcodes' ),
						),
						'tax_operator' => array(
							'type'    => 'select',
							'values'  => array( 'IN', 'NOT IN', 'AND' ),
							'default' => 'IN',
							'name'    => __( 'Taxonomy term operator', 'cherry-shortcodes' ),
							'desc'    => __( 'IN - posts that have any of selected categories terms<br/>NOT IN - posts that is does not have any of selected terms<br/>AND - posts that have all selected terms', 'cherry-shortcodes' ),
						),
						'author' => array(
							'default' => '',
							'name'    => __( 'Authors', 'cherry-shortcodes' ),
							'desc'    => __( 'Enter here comma-separated list of author\'s IDs. Example: 1,7,18', 'cherry-shortcodes' ),
						),
						'offset' => array(
							'type'    => 'number',
							'min'     => 0,
							'max'     => 10000,
							'step'    => 1,
							'default' => 0,
							'name'    => __( 'Offset', 'cherry-shortcodes' ),
							'desc'    => __( 'Specify offset to start posts loop not from first post', 'cherry-shortcodes' ),
						),
						'order' => array(
							'type'   => 'select',
							'values' => array(
								'desc' => __( 'Descending', 'cherry-shortcodes' ),
								'asc'  => __( 'Ascending', 'cherry-shortcodes' ),
							),
							'default' => 'DESC',
							'name'    => __( 'Order', 'cherry-shortcodes' ),
							'desc'    => __( 'Posts order', 'cherry-shortcodes' ),
						),
						'orderby' => array(
							'type'   => 'select',
							'values' => array(
								'none'          => __( 'None', 'cherry-shortcodes' ),
								'id'            => __( 'Post ID', 'cherry-shortcodes' ),
								'author'        => __( 'Post author', 'cherry-shortcodes' ),
								'title'         => __( 'Post title', 'cherry-shortcodes' ),
								'name'          => __( 'Post slug', 'cherry-shortcodes' ),
								'date'          => __( 'Date', 'cherry-shortcodes' ),
								'modified'      => __( 'Last modified date', 'cherry-shortcodes' ),
								'parent'        => __( 'Post parent', 'cherry-shortcodes' ),
								'rand'          => __( 'Random', 'cherry-shortcodes' ),
								'comment_count' => __( 'Comments number', 'cherry-shortcodes' ),
								'menu_order'    => __( 'Menu order', 'cherry-shortcodes' ),
							),
							'default' => 'date',
							'name'    => __( 'Order by', 'cherry-shortcodes' ),
							'desc'    => __( 'Order posts by', 'cherry-shortcodes' ),
						),
						'post_parent' => array(
							'default' => '',
							'name'    => __( 'Post parent', 'cherry-shortcodes' ),
							'desc'    => __( 'Show childrens of entered post (enter post ID)', 'cherry-shortcodes' ),
						),
						'post_status' => array(
							'type'   => 'select',
							'values' => array(
								'publish'    => __( 'Published', 'cherry-shortcodes' ),
								'pending'    => __( 'Pending', 'cherry-shortcodes' ),
								'draft'      => __( 'Draft', 'cherry-shortcodes' ),
								'auto-draft' => __( 'Auto-draft', 'cherry-shortcodes' ),
								'future'     => __( 'Future post', 'cherry-shortcodes' ),
								'private'    => __( 'Private post', 'cherry-shortcodes' ),
								'inherit'    => __( 'Inherit', 'cherry-shortcodes' ),
								'trash'      => __( 'Trashed', 'cherry-shortcodes' ),
								'any'        => __( 'Any', 'cherry-shortcodes' ),
							),
							'default' => 'publish',
							'name'    => __( 'Post status', 'cherry-shortcodes' ),
							'desc'    => __( 'Show only posts with selected status', 'cherry-shortcodes' ),
						),
						'ignore_sticky_posts' => array(
							'type'    => 'bool',
							'default' => 'no',
							'name'    => __( 'Ignore sticky', 'cherry-shortcodes' ),
							'desc'    => __( 'Select Yes to ignore posts that is sticked', 'cherry-shortcodes' ),
						),
						'linked_title' => array(
							'type'    => 'bool',
							'default' => 'yes',
							'name'    => __( 'Linked title', 'cherry-shortcodes' ),
							'desc'    => __( 'Linked title description', 'cherry-shortcodes' ),
						),
						'linked_image' => array(
							'type'    => 'bool',
							'default' => 'yes',
							'name'    => __( 'Linked featured image', 'cherry-shortcodes' ),
							'desc'    => __( 'Linked featured image description', 'cherry-shortcodes' ),
						),
						'content_type' => array(
							'type' => 'select',
							'values' => array(
								'part'    => __( 'Part of content', 'cherry-shortcodes' ),
								'full'    => __( 'Full content', 'cherry-shortcodes' ),
							),
							'default' => 'part',
							'name'    => __( 'Post content', 'cherry-shortcodes' ),
							'desc'    => __( 'Choose to display an teaser, part or full content (http://codex.wordpress.org/Excerpt#Excerpt.2C_automatic_excerpt.2C_and_teaser)', 'cherry-shortcodes' ),
						),
						'content_length' => array(
							'type'    => 'number',
							'min'     => 1,
							'max'     => 10000,
							'step'    => 1,
							'default' => 55,
							'name'    => __( 'Content Length', 'cherry-shortcodes' ),
							'desc'    => __( 'Insert the number of words you want to show in the post content.', 'cherry-shortcodes' ),
						),
						'button_text' => array(
							'default' => __( 'read more', 'cherry-shortcodes' ),
							'name'    => __( 'Button text', 'cherry-shortcodes' ),
							'desc'    => __( 'Button text description', 'cherry-shortcodes' ),
						),
						'class' => array(
							'default' => '',
							'name'    => __( 'Class', 'cherry-shortcodes' ),
							'desc'    => __( 'Extra CSS class', 'cherry-shortcodes' ),
						),
						'template' => array(
							'type'   => 'select',
							'values' => array(
								'default.tmpl' => 'default.tmpl',
							),
							'default' => 'default.tmpl',
							'name'    => __( 'Template', 'cherry-shortcodes' ),
							'desc'    => __( 'Shortcode template', 'cherry-shortcodes' ),
						),
						'crop_image' => array(
							'type'    => 'bool',
							'default' => 'no',
							'name'    => __( 'Using cropped image', 'cherry-shortcodes' ),
							'desc'    => __( 'Slider Loop Mode', 'cherry-shortcodes' ),
						),
						'crop_width' => array(
							'type'    => 'number',
							'min'     => 10,
							'max'     => 10000,
							'step'    => 1,
							'default' => 540,
							'name'    => __( 'Cropping image width', 'cherry-shortcodes' ),
							'desc'    => __( 'Width value(px)' ),
						),
						'crop_height' => array(
							'type'    => 'number',
							'min'     => 10,
							'max'     => 10000,
							'step'    => 1,
							'default' => 320,
							'name'    => __( 'Cropping image width', 'cherry-shortcodes' ),
							'desc'    => __( 'Width value(px)' ),
						),
						'slides_per_view' => array(
							'type'    => 'slider',
							'min'     => 1,
							'max'     => 25,
							'step'    => 1,
							'default' => 3,
							'name'    => __( 'Number slides per view', 'cherry-shortcodes' ),
							'desc'    => __( 'Specify number of slides per view', 'cherry-shortcodes' ),
						),
						'slides_per_column' => array(
							'type'    => 'slider',
							'min'     => 1,
							'max'     => 5,
							'step'    => 1,
							'default' => 1,
							'name'    => __( 'Multi Row Slides Layout', 'cherry-shortcodes' ),
							'desc'    => __( 'Multi Row Slides Layout', 'cherry-shortcodes' ),
						),
						'space_between_slides' => array(
							'type'    => 'slider',
							'min'     => 0,
							'max'     => 500,
							'step'    => 1,
							'default' => 10,
							'name'    => __( 'Space Between Slides', 'cherry-shortcodes' ),
							'desc'    => __( 'With difine space between slides(px)', 'cherry-shortcodes' ),
						),
						'swiper_duration_speed' => array(
							'type'    => 'slider',
							'min'     => 0,
							'max'     => 10000,
							'step'    => 100,
							'default' => 300,
							'name'    => __( 'Duration of transition', 'cherry-shortcodes' ),
							'desc'    => __( 'Duration of transition between slides (ms)', 'cherry-shortcodes' ),
						),
						'swiper_loop' => array(
							'type'    => 'bool',
							'default' => 'yes',
							'name'    => __( 'Slider Infinite Loop', 'cherry-shortcodes' ),
							'desc'    => __( 'Slider Loop Mode', 'cherry-shortcodes' ),
						),
						'swiper_free_mode' => array(
							'type'    => 'bool',
							'default' => 'no',
							'name'    => __( 'Free Mode sliding', 'cherry-shortcodes' ),
							'desc'    => __( 'No fixed positions for slides', 'cherry-shortcodes' ),
						),
						'swiper_grab_cursor' => array(
							'type'    => 'bool',
							'default' => 'no',
							'name'    => __( 'Grab Cusor', 'cherry-shortcodes' ),
							'desc'    => __( 'Using Grab Cusor for slider', 'cherry-shortcodes' ),
						),
						'swiper_mouse_wheel' => array(
							'type'    => 'bool',
							'default' => 'no',
							'name'    => __( 'Mousewheel Control', 'cherry-shortcodes' ),
							'desc'    => __( 'Mousewheel control mode', 'cherry-shortcodes' ),
						),
						'swiper_centered_slide' => array(
							'type'    => 'bool',
							'default' => 'no',
							'name'    => __( 'Centered Slides', 'cherry-shortcodes' ),
							'desc'    => __( 'Centered slides mode', 'cherry-shortcodes' ),
						),
						'swiper_effect' => array(
							'type'   => 'select',
							'values' => array(
								'slide'     => __( 'Slide', 'cherry-shortcodes' ),
								'fade'      => __( 'Fade', 'cherry-shortcodes' ),
								'cube'      => __( 'Cube', 'cherry-shortcodes' ),
								'coverflow' => __( 'Coverflow', 'cherry-shortcodes' ),
							),
							'default' => 'slide',
							'name'    => __( 'Effect Layout', 'cherry-shortcodes' ),
							'desc'    => __( 'Could be "slide", "fade", "cube" or "coverflow" effect', 'cherry-shortcodes' ),
						),
						'swiper_pagination' => array(
							'type'    => 'bool',
							'default' => 'yes',
							'name'    => __( 'Slider pagination', 'cherry-shortcodes' ),
							'desc'    => __( 'Displaying slider pagination', 'cherry-shortcodes' ),
						),
						'swiper_navigation' => array(
							'type'    => 'bool',
							'default' => 'yes',
							'name'    => __( 'Slider navigation', 'cherry-shortcodes' ),
							'desc'    => __( 'Displaying slider navigation', 'cherry-shortcodes' ),
						),
					)
				),
				// posts
				'posts' => array(
					'name'  => __( 'Posts', 'cherry-shortcodes' ),
					'type'  => 'single',
					'group' => 'other',
					'atts'  => array(
						'id' => array(
							'default' => '',
							'name'    => __( 'Post ID\'s', 'cherry-shortcodes' ),
							'desc'    => __( 'Enter comma separated ID\'s of the posts that you want to show', 'cherry-shortcodes' ),
						),
						'posts_per_page' => array(
							'type'    => 'number',
							'min'     => -1,
							'max'     => 10000,
							'step'    => 1,
							'default' => get_option( 'posts_per_page' ),
							'name'    => __( 'Posts per page', 'cherry-shortcodes' ),
							'desc'    => __( 'Specify number of posts that you want to show. Enter -1 to get all posts', 'cherry-shortcodes' ),
						),
						'post_type' => array(
							'type'     => 'select',
							'multiple' => true,
							'values'   => Su_Tools::get_types(),
							'default'  => 'post',
							'name'     => __( 'Post types', 'cherry-shortcodes' ),
							'desc'     => __( 'Select post types. Hold Ctrl key to select multiple post types', 'cherry-shortcodes' ),
						),
						'taxonomy' => array(
							'type'    => 'select',
							'values'  => Su_Tools::get_taxonomies(),
							'default' => 'category',
							'name'    => __( 'Taxonomy', 'cherry-shortcodes' ),
							'desc'    => __( 'Select taxonomy to show posts from', 'cherry-shortcodes' ),
						),
						'tax_term' => array(
							'type'     => 'select',
							'multiple' => true,
							'values'   => Su_Tools::get_terms( 'category' ),
							'default'  => '',
							'name'     => __( 'Terms', 'cherry-shortcodes' ),
							'desc'     => __( 'Select terms to show posts from', 'cherry-shortcodes' ),
						),
						'tax_operator' => array(
							'type'    => 'select',
							'values'  => array( 'IN', 'NOT IN', 'AND' ),
							'default' => 'IN',
							'name'    => __( 'Taxonomy term operator', 'cherry-shortcodes' ),
							'desc'    => __( 'IN - posts that have any of selected categories terms<br/>NOT IN - posts that is does not have any of selected terms<br/>AND - posts that have all selected terms', 'cherry-shortcodes' ),
						),
						'author' => array(
							'default' => '',
							'name'    => __( 'Authors', 'cherry-shortcodes' ),
							'desc'    => __( 'Enter here comma-separated list of author\'s IDs. Example: 1,7,18', 'cherry-shortcodes' ),
						),
						'offset' => array(
							'type'    => 'number',
							'min'     => 0,
							'max'     => 10000,
							'step'    => 1,
							'default' => 0,
							'name'    => __( 'Offset', 'cherry-shortcodes' ),
							'desc'    => __( 'Specify offset to start posts loop not from first post', 'cherry-shortcodes' ),
						),
						'order' => array(
							'type'   => 'select',
							'values' => array(
								'desc' => __( 'Descending', 'cherry-shortcodes' ),
								'asc'  => __( 'Ascending', 'cherry-shortcodes' ),
							),
							'default' => 'DESC',
							'name'    => __( 'Order', 'cherry-shortcodes' ),
							'desc'    => __( 'Posts order', 'cherry-shortcodes' ),
						),
						'orderby' => array(
							'type'   => 'select',
							'values' => array(
								'none'          => __( 'None', 'cherry-shortcodes' ),
								'id'            => __( 'Post ID', 'cherry-shortcodes' ),
								'author'        => __( 'Post author', 'cherry-shortcodes' ),
								'title'         => __( 'Post title', 'cherry-shortcodes' ),
								'name'          => __( 'Post slug', 'cherry-shortcodes' ),
								'date'          => __( 'Date', 'cherry-shortcodes' ),
								'modified'      => __( 'Last modified date', 'cherry-shortcodes' ),
								'parent'        => __( 'Post parent', 'cherry-shortcodes' ),
								'rand'          => __( 'Random', 'cherry-shortcodes' ),
								'comment_count' => __( 'Comments number', 'cherry-shortcodes' ),
								'menu_order'    => __( 'Menu order', 'cherry-shortcodes' ),
							),
							'default' => 'date',
							'name'    => __( 'Order by', 'cherry-shortcodes' ),
							'desc'    => __( 'Order posts by', 'cherry-shortcodes' ),
						),
						'post_parent' => array(
							'default' => '',
							'name'    => __( 'Post parent', 'cherry-shortcodes' ),
							'desc'    => __( 'Show childrens of entered post (enter post ID)', 'cherry-shortcodes' ),
						),
						'post_status' => array(
							'type'   => 'select',
							'values' => array(
								'publish'    => __( 'Published', 'cherry-shortcodes' ),
								'pending'    => __( 'Pending', 'cherry-shortcodes' ),
								'draft'      => __( 'Draft', 'cherry-shortcodes' ),
								'auto-draft' => __( 'Auto-draft', 'cherry-shortcodes' ),
								'future'     => __( 'Future post', 'cherry-shortcodes' ),
								'private'    => __( 'Private post', 'cherry-shortcodes' ),
								'inherit'    => __( 'Inherit', 'cherry-shortcodes' ),
								'trash'      => __( 'Trashed', 'cherry-shortcodes' ),
								'any'        => __( 'Any', 'cherry-shortcodes' ),
							),
							'default' => 'publish',
							'name'    => __( 'Post status', 'cherry-shortcodes' ),
							'desc'    => __( 'Show only posts with selected status', 'cherry-shortcodes' ),
						),
						'ignore_sticky_posts' => array(
							'type'    => 'bool',
							'default' => 'no',
							'name'    => __( 'Ignore sticky', 'cherry-shortcodes' ),
							'desc'    => __( 'Select Yes to ignore posts that is sticked', 'cherry-shortcodes' ),
						),
						'linked_title' => array(
							'type'    => 'bool',
							'default' => 'yes',
							'name'    => __( 'Linked title', 'cherry-shortcodes' ),
							'desc'    => __( 'Linked title description', 'cherry-shortcodes' ),
						),
						'linked_image' => array(
							'type'    => 'bool',
							'default' => 'yes',
							'name'    => __( 'Linked featured image', 'cherry-shortcodes' ),
							'desc'    => __( 'Linked featured image description', 'cherry-shortcodes' ),
						),
						'content_type' => array(
							'type' => 'select',
							'values' => array(
								'part'    => __( 'Part of content', 'cherry-shortcodes' ),
								'full'    => __( 'Full content', 'cherry-shortcodes' ),
							),
							'default' => 'part',
							'name'    => __( 'Post content', 'cherry-shortcodes' ),
							'desc'    => __( 'Choose to display an teaser, part or full content (http://codex.wordpress.org/Excerpt#Excerpt.2C_automatic_excerpt.2C_and_teaser)', 'cherry-shortcodes' ),
						),
						'content_length' => array(
							'type'    => 'number',
							'min'     => 1,
							'max'     => 10000,
							'step'    => 1,
							'default' => 55,
							'name'    => __( 'Content Length', 'cherry-shortcodes' ),
							'desc'    => __( 'Insert the number of words you want to show in the post content.', 'cherry-shortcodes' ),
						),
						'button_text' => array(
							'default' => __( 'read more', 'cherry-shortcodes' ),
							'name'    => __( 'Button text', 'cherry-shortcodes' ),
							'desc'    => __( 'Button text description', 'cherry-shortcodes' ),
						),
						'col' => array(
							'type'    => 'responsive',
							'default' => '12 6 3 none',
							'name'    => __( 'Column class', 'cherry-shortcodes' ),
							'desc'    => __( 'Column class for each items.', 'cherry-shortcodes' ),
						),
						'class' => array(
							'default' => '',
							'name'    => __( 'Class', 'cherry-shortcodes' ),
							'desc'    => __( 'Extra CSS class', 'cherry-shortcodes' ),
						),
						'template' => array(
							'type'   => 'select',
							'values' => array(
								'default.tmpl' => 'default.tmpl',
							),
							'default' => 'default.tmpl',
							'name'    => __( 'Template', 'cherry-shortcodes' ),
							'desc'    => __( 'Shortcode template', 'cherry-shortcodes' ),
						),
					),
					'desc' => __( 'Custom posts query with customizable template', 'cherry-shortcodes' ),
					'icon' => 'th-list',
				),
				// tabs
				'tabs' => array(
					'name' => __( 'Tabs', 'cherry-shortcodes' ),
					'type' => 'wrap',
					'group' => 'box',
					'atts' => array(
						'style' => array(
							'type' => 'select',
							'values' => array(
								'default' => __( 'Default', 'cherry-shortcodes' )
							),
							'default' => 'default',
							'name' => __( 'Style', 'cherry-shortcodes' ),
							'desc' => __( 'Choose style for this tabs', 'cherry-shortcodes' )
						),
						'active' => array(
							'type' => 'number',
							'min' => 1,
							'max' => 100,
							'step' => 1,
							'default' => 1,
							'name' => __( 'Active tab', 'cherry-shortcodes' ),
							'desc' => __( 'Select which tab is open by default', 'cherry-shortcodes' )
						),
						'vertical' => array(
							'type' => 'bool',
							'default' => 'no',
							'name' => __( 'Vertical', 'cherry-shortcodes' ),
							'desc' => __( 'Show tabs vertically', 'cherry-shortcodes' )
						),
						'class' => array(
							'default' => '',
							'name' => __( 'Class', 'cherry-shortcodes' ),
							'desc' => __( 'Extra CSS class', 'cherry-shortcodes' )
						)
					),
					'content' => __( "[%prefix_tab title=\"Title 1\"]Content 1[/%prefix_tab]\n[%prefix_tab title=\"Title 2\"]Content 2[/%prefix_tab]\n[%prefix_tab title=\"Title 3\"]Content 3[/%prefix_tab]", 'su' ),
					'desc' => __( 'Tabs container', 'cherry-shortcodes' ),
					'example' => 'tabs',
					'icon' => 'list-alt'
				),
				// tab
				'tab' => array(
					'name' => __( 'Tab', 'cherry-shortcodes' ),
					'type' => 'wrap',
					'group' => 'box',
					'atts' => array(
						'title' => array(
							'default' => __( 'Tab name', 'cherry-shortcodes' ),
							'name' => __( 'Title', 'cherry-shortcodes' ),
							'desc' => __( 'Enter tab name', 'cherry-shortcodes' )
						),
						'disabled' => array(
							'type' => 'bool',
							'default' => 'no',
							'name' => __( 'Disabled', 'cherry-shortcodes' ),
							'desc' => __( 'Is this tab disabled', 'cherry-shortcodes' )
						),
						'anchor' => array(
							'default' => '',
							'name' => __( 'Anchor', 'cherry-shortcodes' ),
							'desc' => __( 'You can use unique anchor for this tab to access it with hash in page url. For example: type here <b%value>Hello</b> and then use url like http://example.com/page-url#Hello. This tab will be activated and scrolled in', 'su' )
						),
						'url' => array(
							'default' => '',
							'name' => __( 'URL', 'cherry-shortcodes' ),
							'desc' => __( 'You can link this tab to any webpage. Enter here full URL to switch this tab into link', 'cherry-shortcodes' )
						),
						'target' => array(
							'type' => 'select',
							'values' => array(
								'self'  => __( 'Open link in same window/tab', 'cherry-shortcodes' ),
								'blank' => __( 'Open link in new window/tab', 'cherry-shortcodes' )
							),
							'default' => 'blank',
							'name' => __( 'Link target', 'cherry-shortcodes' ),
							'desc' => __( 'Choose how to open the custom tab link', 'cherry-shortcodes' )
						),
						'class' => array(
							'default' => '',
							'name' => __( 'Class', 'cherry-shortcodes' ),
							'desc' => __( 'Extra CSS class', 'cherry-shortcodes' )
						)
					),
					'content' => __( 'Tab content', 'cherry-shortcodes' ),
					'desc' => __( 'Single tab', 'cherry-shortcodes' ),
					'note' => __( 'Did you know that you need to wrap single tabs with [tabs] shortcode?', 'cherry-shortcodes' ),
					'example' => 'tabs',
					'icon' => 'list-alt'
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