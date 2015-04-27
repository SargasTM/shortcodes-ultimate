<?php
/**
 * Default filters
 */
add_filter( 'su_tools_get_types',              'cherry_shortcodes_unset_type' );
add_filter( 'su_tools_get_taxonomies',         'cherry_shortcodes_unset_taxonomy' );
add_filter( 'cherry_templater_macros_buttons', 'cherry_templater_add_macros_buttons', 10, 2 );

/**
 * Not use `wptexturize` in content and excerpt.
 * Removed temporary.
 * @link  https://core.trac.wordpress.org/ticket/29557
 */
remove_filter( 'the_content', 'wptexturize' );
remove_filter( 'the_excerpt', 'wptexturize' );


function cherry_shortcodes_unset_type( $types ) {
	unset( $types['nav_menu_item'] );

	return $types;
}

function cherry_shortcodes_unset_taxonomy( $taxes ) {
	unset( $taxes['nav_menu'] );
	unset( $taxes['link_category'] );

	return $taxes;
}

function cherry_templater_add_macros_buttons( $macros_buttons, $shortcode ) {

	if ( 'posts' == $shortcode ) {

		$macros_buttons['date'] = array(
			'id'    => 'cherry_date',
			'value' => 'Date',
			'open'  => '%%DATE="' . get_option( 'date_format' ) . '"%%',
			'close' => '',
			'title' => __( 'Helper information for `Date` macros', 'cherry-shortcodes-templater' ),
		);
		$macros_buttons['author'] = array(
			'id'    => 'cherry_author',
			'value' => 'Author',
			'open'  => '%%AUTHOR%%',
			'close' => '',
			'title' => __( 'Helper information for `Author` macros', 'cherry-shortcodes-templater' ),
		);
		$macros_buttons['comments'] = array(
			'id'    => 'cherry_comments',
			'value' => 'Comments',
			'open'  => '%%COMMENTS%%',
			'close' => '',
			'title' => __( 'Helper information for `Comments` macros', 'cherry-shortcodes-templater' ),
		);
		$macros_buttons['taxonomy'] = array(
			'id'    => 'cherry_taxonomy',
			'value' => 'Taxomomy',
			'open'  => '%%TAXONOMY="category|post_tag|custom_taxonomy"%%',
			'close' => '',
			'title' => __( 'Helper information for `Taxomomy` macros', 'cherry-shortcodes-templater' ),
		);
		$macros_buttons['excerpt'] = array(
			'id'    => 'cherry_excerpt',
			'value' => 'Excerpt',
			'open'  => '%%EXCERPT%%',
			'close' => '',
			'title' => __( 'Helper information for `Excerpt` macros', 'cherry-shortcodes-templater' ),
		);

	} elseif ( 'banner' == $shortcode ) {

		$macros_buttons = array();

		$macros_buttons['image'] = array(
			'id'    => 'cherry_image',
			'value' => 'Image URL',
			'open'  => '%%IMAGE%%',
			'close' => '',
			'title' => __( 'Banner image URL', 'cherry-shortcodes-templater' ),
		);
		$macros_buttons['url'] = array(
			'id'    => 'cherry_url',
			'value' => 'Banner URL',
			'open'  => '%%URL%%',
			'close' => '',
			'title' => __( 'Banner link URL', 'cherry-shortcodes-templater' ),
		);
		$macros_buttons['color'] = array(
			'id'    => 'cherry_color',
			'value' => 'Text color',
			'open'  => '%%COLOR%%',
			'close' => '',
			'title' => __( 'Banner default text color', 'cherry-shortcodes-templater' ),
		);
		$macros_buttons['bg_color'] = array(
			'id'    => 'cherry_bg_color',
			'value' => 'Background color',
			'open'  => '%%BGCOLOR%%',
			'close' => '',
			'title' => __( 'Banner background color', 'cherry-shortcodes-templater' ),
		);
		$macros_buttons['content'] = array(
			'id'    => 'cherry_content',
			'value' => 'Banner text content',
			'open'  => '%%CONTENT%%',
			'close' => '',
			'title' => __( 'Banner content', 'cherry-shortcodes-templater' ),
		);
		$macros_buttons['class'] = array(
			'id'    => 'cherry_class',
			'value' => 'Custom CSS class',
			'open'  => '%%CLASS"%%',
			'close' => '',
			'title' => __( 'Custom CSS class', 'cherry-shortcodes-templater' ),
		);

	} elseif ( 'swiper_carousel' == $shortcode ) {
		$macros_buttons = apply_filters( 'cherry_shortcodes_add_carousel_macros', $macros_buttons );
	}

	return $macros_buttons;
}