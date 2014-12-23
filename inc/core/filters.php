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
		);
		$macros_buttons['author'] = array(
			'id'    => 'cherry_author',
			'value' => 'Author',
			'open'  => '%%AUTHOR%%',
			'close' => '',
		);
		$macros_buttons['comments'] = array(
			'id'    => 'cherry_comments',
			'value' => 'Comments',
			'open'  => '%%COMMENTS%%',
			'close' => '',
		);
		$macros_buttons['taxonomy'] = array(
			'id'    => 'cherry_taxonomy',
			'value' => 'Taxomomy',
			'open'  => '%%TAXONOMY="category|post_tag|custom_taxonomy"%%',
			'close' => '',
		);
		$macros_buttons['excerpt'] = array(
			'id'    => 'cherry_excerpt',
			'value' => 'Excerpt',
			'open'  => '%%EXCERPT%%',
			'close' => '',
		);
	}

	return $macros_buttons;
}