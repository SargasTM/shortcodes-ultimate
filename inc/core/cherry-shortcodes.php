<?php
class Su_Shortcodes {
	static $tabs = array();
	static $tab_count = 0;

	function __construct() {}

	public static function heading( $atts = null, $content = null ) {
		$atts = shortcode_atts( array(
				'style'  => 'default',
				'size'   => 13,
				'align'  => 'center',
				'margin' => '20',
				'class'  => ''
			), $atts, 'heading' );
		su_query_asset( 'css', 'su-content-shortcodes' );
		do_action( 'su/shortcode/heading', $atts );

		// Item template.
		$template = Cherry_Shortcode_Editor::get_template_by_name( $atts['template'], 'heading' );
		$template = str_replace( '%%TITLE%%', do_shortcode( $content ), $template );
		$template = preg_replace( "/%%.+?%%/", '', $template );
		$output = '<div class="su-heading su-heading-style-' . $atts['style'] . ' su-heading-align-' . $atts['align'] . su_ecssc( $atts ) . '" style="font-size:' . intval( $atts['size'] ) . 'px;margin-bottom:' . $atts['margin'] . 'px"><div class="su-heading-inner">' . trim( $template ) . '</div></div>';

		return apply_filters( 'cherry_shortcode_html', $output, $atts, 'heading' );
	}

	public static function row( $atts = null, $content = null ) {
		$atts = shortcode_atts( array(
			'type'  => 'fixed-width',
			'class' => '',
		), $atts, 'row' );

		$container = ( $atts['type'] === 'fixed-width' ) ? 'container' : 'container-fluid';

		return '<div class="' . esc_attr( $container ) . su_ecssc( $atts ) . '"><div class="row">' . do_shortcode( $content ) . '</div></div>';
	}

	public static function row_inner( $atts = null, $content = null ) {
		$atts = shortcode_atts( array(
			'class' => '',
		), $atts, 'row_inner' );

		return '<div class="row' . su_ecssc( $atts ) . '">' . do_shortcode( $content ) . '</div>';
	}

	public static function col( $atts = null, $content = null ) {
		$atts = shortcode_atts( array(
			'size_xs'   => 'none',
			'size_sm'   => 'none',
			'size_md'   => 'none',
			'size_lg'   => 'none',
			'offset_xs' => 'none',
			'offset_sm' => 'none',
			'offset_md' => 'none',
			'offset_lg' => 'none',
			'pull_xs'   => 'none',
			'pull_sm'   => 'none',
			'pull_md'   => 'none',
			'pull_lg'   => 'none',
			'push_xs'   => 'none',
			'push_sm'   => 'none',
			'push_md'   => 'none',
			'push_lg'   => 'none',
			'class'     => 'none',
		), $atts, 'column' );
		$class  = '';
		$class .= ( $atts['size_lg'] === 'none' )   ? '' : ' col-lg-' . $atts['size_lg'];
		$class .= ( $atts['size_md'] === 'none' )   ? '' : ' col-md-' . $atts['size_md'];
		$class .= ( $atts['size_sm'] === 'none' )   ? '' : ' col-sm-' . $atts['size_sm'];
		$class .= ( $atts['size_xs'] === 'none' )   ? '' : ' col-xs-' . $atts['size_xs'];
		$class .= ( $atts['offset_lg'] === 'none' ) ? '' : ' col-lg-offset-' . $atts['offset_lg'];
		$class .= ( $atts['offset_md'] === 'none' ) ? '' : ' col-md-offset-' . $atts['offset_md'];
		$class .= ( $atts['offset_sm'] === 'none' ) ? '' : ' col-sm-offset-' . $atts['offset_sm'];
		$class .= ( $atts['offset_xs'] === 'none' ) ? '' : ' col-xs-offset-' . $atts['offset_xs'];
		$class .= ( $atts['pull_lg'] === 'none' )   ? '' : ' col-lg-pull-' . $atts['pull_lg'];
		$class .= ( $atts['pull_md'] === 'none' )   ? '' : ' col-md-pull-' . $atts['pull_md'];
		$class .= ( $atts['pull_sm'] === 'none' )   ? '' : ' col-sm-pull-' . $atts['pull_sm'];
		$class .= ( $atts['pull_xs'] === 'none' )   ? '' : ' col-xs-pull-' . $atts['pull_xs'];
		$class .= ( $atts['push_lg'] === 'none' )   ? '' : ' col-lg-push-' . $atts['push_lg'];
		$class .= ( $atts['push_md'] === 'none' )   ? '' : ' col-md-push-' . $atts['push_md'];
		$class .= ( $atts['push_sm'] === 'none' )   ? '' : ' col-sm-push-' . $atts['push_sm'];
		$class .= ( $atts['push_xs'] === 'none' )   ? '' : ' col-xs-push-' . $atts['push_xs'];
		$class .= ( $atts['class'] )                ? '' : ' ' . $atts['class'];

		return '<div class="' . trim( esc_attr( $class ) ) . '">' . do_shortcode( $content ) . '</div>';
	}

	public static function col_inner( $atts = null, $content = null ) {
		$atts = shortcode_atts( array(
			'size_xs'   => 'none',
			'size_sm'   => 'none',
			'size_md'   => 'none',
			'size_lg'   => 'none',
			'offset_xs' => 'none',
			'offset_sm' => 'none',
			'offset_md' => 'none',
			'offset_lg' => 'none',
			'pull_xs'   => 'none',
			'pull_sm'   => 'none',
			'pull_md'   => 'none',
			'pull_lg'   => 'none',
			'push_xs'   => 'none',
			'push_sm'   => 'none',
			'push_md'   => 'none',
			'push_lg'   => 'none',
			'class'     => 'none',
		), $atts, 'column' );
		$class  = '';
		$class .= ( $atts['size_lg'] === 'none' )   ? '' : ' col-lg-' . $atts['size_lg'];
		$class .= ( $atts['size_md'] === 'none' )   ? '' : ' col-md-' . $atts['size_md'];
		$class .= ( $atts['size_sm'] === 'none' )   ? '' : ' col-sm-' . $atts['size_sm'];
		$class .= ( $atts['size_xs'] === 'none' )   ? '' : ' col-xs-' . $atts['size_xs'];
		$class .= ( $atts['offset_lg'] === 'none' ) ? '' : ' col-lg-offset-' . $atts['offset_lg'];
		$class .= ( $atts['offset_md'] === 'none' ) ? '' : ' col-md-offset-' . $atts['offset_md'];
		$class .= ( $atts['offset_sm'] === 'none' ) ? '' : ' col-sm-offset-' . $atts['offset_sm'];
		$class .= ( $atts['offset_xs'] === 'none' ) ? '' : ' col-xs-offset-' . $atts['offset_xs'];
		$class .= ( $atts['pull_lg'] === 'none' )   ? '' : ' col-lg-pull-' . $atts['pull_lg'];
		$class .= ( $atts['pull_md'] === 'none' )   ? '' : ' col-md-pull-' . $atts['pull_md'];
		$class .= ( $atts['pull_sm'] === 'none' )   ? '' : ' col-sm-pull-' . $atts['pull_sm'];
		$class .= ( $atts['pull_xs'] === 'none' )   ? '' : ' col-xs-pull-' . $atts['pull_xs'];
		$class .= ( $atts['push_lg'] === 'none' )   ? '' : ' col-lg-push-' . $atts['push_lg'];
		$class .= ( $atts['push_md'] === 'none' )   ? '' : ' col-md-push-' . $atts['push_md'];
		$class .= ( $atts['push_sm'] === 'none' )   ? '' : ' col-sm-push-' . $atts['push_sm'];
		$class .= ( $atts['push_xs'] === 'none' )   ? '' : ' col-xs-push-' . $atts['push_xs'];
		$class .= ( $atts['class'] )                ? '' : ' ' . $atts['class'];

		return '<div class="' . trim( esc_attr( $class ) ) . '">' . do_shortcode( $content ) . '</div>';
	}

	public static function posts( $atts = null, $content = null ) {
		// Prepare error var
		$error = null;

		// Parse attributes
		$atts = shortcode_atts( array(
				'template'            => 'templates/default-loop.php',
				'id'                  => false,
				'posts_per_page'      => get_option( 'posts_per_page' ),
				'post_type'           => 'post',
				'taxonomy'            => 'category',
				'tax_term'            => false,
				'tax_operator'        => 'IN',
				'author'              => '',
				'tag'                 => '',
				'meta_key'            => '',
				'offset'              => 0,
				'order'               => 'DESC',
				'orderby'             => 'date',
				'post_parent'         => false,
				'post_status'         => 'publish',
				'ignore_sticky_posts' => 'no',
			), $atts, 'posts' );

		$original_atts = $atts;

		$author              = sanitize_text_field( $atts['author'] );
		$id                  = $atts['id']; // Sanitized later as an array of integers
		$ignore_sticky_posts = ( bool ) ( $atts['ignore_sticky_posts'] === 'yes' ) ? true : false;
		$meta_key            = sanitize_text_field( $atts['meta_key'] );
		$offset              = intval( $atts['offset'] );
		$order               = sanitize_key( $atts['order'] );
		$orderby             = sanitize_key( $atts['orderby'] );
		$post_parent         = $atts['post_parent'];
		$post_status         = $atts['post_status'];
		$post_type           = sanitize_text_field( $atts['post_type'] );
		$posts_per_page      = intval( $atts['posts_per_page'] );
		$tag                 = sanitize_text_field( $atts['tag'] );
		$tax_operator        = $atts['tax_operator'];
		$tax_term            = sanitize_text_field( $atts['tax_term'] );
		$taxonomy            = sanitize_key( $atts['taxonomy'] );

		// Set up initial query for post.
		$args = array(
			'category_name'  => '',
			'order'          => $order,
			'orderby'        => $orderby,
			'post_type'      => explode( ',', $post_type ),
			'posts_per_page' => $posts_per_page,
			'tag'            => $tag,
		);

		// Ignore Sticky Posts
		if ( $ignore_sticky_posts ) {
			$args['ignore_sticky_posts'] = true;
		}

		// Meta key (for ordering)
		if ( !empty( $meta_key ) ) {
			$args['meta_key'] = $meta_key;
		}

		// If Post IDs
		if ( $id ) {
			$posts_in = array_map( 'intval', explode( ',', $id ) );
			$args['post__in'] = $posts_in;
		}

		// Post Author
		if ( !empty( $author ) ) {
			$args['author'] = $author;
		}

		// Offset
		if ( !empty( $offset ) ) {
			$args['offset'] = $offset;
		}

		// Post Status
		$post_status = explode( ', ', $post_status );
		$validated   = array();
		$available   = array( 'publish', 'pending', 'draft', 'auto-draft', 'future', 'private', 'inherit', 'trash', 'any' );

		foreach ( $post_status as $unvalidated ) {
			if ( in_array( $unvalidated, $available ) ) {
				$validated[] = $unvalidated;
			}
		}
		if ( !empty( $validated ) ) {
			$args['post_status'] = $validated;
		}

		// If taxonomy attributes, create a taxonomy query
		if ( !empty( $taxonomy ) && !empty( $tax_term ) ) {

			// Term string to array
			$tax_term = explode( ',', $tax_term );

			// Validate operator
			if ( !in_array( $tax_operator, array( 'IN', 'NOT IN', 'AND' ) ) ) {
				$tax_operator = 'IN';
			}
			$tax_args = array( 'tax_query' => array( array(
						'taxonomy' => $taxonomy,
						'field'    => ( is_numeric( $tax_term[0] ) ) ? 'id' : 'slug',
						'terms'    => $tax_term,
						'operator' => $tax_operator ) ) );

			// Check for multiple taxonomy queries
			$count = 2;
			$more_tax_queries = false;

			while ( isset( $original_atts['taxonomy_' . $count] )
				&& !empty( $original_atts['taxonomy_' . $count] )
				&& isset( $original_atts['tax_' . $count . '_term'] )
				&& !empty( $original_atts['tax_' . $count . '_term'] ) ) {

				// Sanitize values
				$more_tax_queries        = true;
				$taxonomy                = sanitize_key( $original_atts['taxonomy_' . $count] );
				$terms                   = explode( ', ', sanitize_text_field( $original_atts['tax_' . $count . '_term'] ) );
				$tax_operator            = isset( $original_atts['tax_' . $count . '_operator'] ) ? $original_atts['tax_' . $count . '_operator'] : 'IN';
				$tax_operator            = in_array( $tax_operator, array( 'IN', 'NOT IN', 'AND' ) ) ? $tax_operator : 'IN';
				$tax_args['tax_query'][] = array(
					'taxonomy' => $taxonomy,
					'field'    => 'slug',
					'terms'    => $terms,
					'operator' => $tax_operator,
				);
				$count++;
			}

			if ( $more_tax_queries ) :

				$tax_relation = 'AND';
				if ( isset( $original_atts['tax_relation'] ) && in_array( $original_atts['tax_relation'], array( 'AND', 'OR' ) ) ) {
					$tax_relation = $original_atts['tax_relation'];
				}
				$args['tax_query']['relation'] = $tax_relation;

			endif;

			$args = array_merge( $args, $tax_args );
		}

		// If post parent attribute, set up parent
		if ( $post_parent ) {
			if ( 'current' == $post_parent ) {
				global $post;
				$post_parent = $post->ID;
			}
			$args['post_parent'] = intval( $post_parent );
		}

		// Save original posts
		global $posts;
		$original_posts = $posts;

		// Query posts
		$posts = new WP_Query( $args );

		// Buffer output
		ob_start();

		// Search for template in stylesheet directory
		if ( file_exists( STYLESHEETPATH . '/' . $atts['template'] ) ) {
			load_template( STYLESHEETPATH . '/' . $atts['template'], false );
		}
		// Search for template in theme directory
		elseif ( file_exists( TEMPLATEPATH . '/' . $atts['template'] ) ) {
			load_template( TEMPLATEPATH . '/' . $atts['template'], false );
		}
		// Search for template in plugin directory
		elseif ( path_join( dirname( SU_PLUGIN_FILE ), $atts['template'] ) ) {
			load_template( path_join( dirname( SU_PLUGIN_FILE ), $atts['template'] ), false );
		}
		// Template not found
		else {
			echo Su_Tools::error( __FUNCTION__, __( 'template not found', 'su' ) );
		}

		$output = ob_get_contents();
		ob_end_clean();

		// Return original posts
		$posts = $original_posts;

		// Reset the query
		wp_reset_postdata();
		su_query_asset( 'css', 'su-other-shortcodes' );

		return $output;
	}

}

new Su_Shortcodes;

class Shortcodes_Ultimate_Shortcodes extends Su_Shortcodes {
	function __construct() {
		parent::__construct();
	}
}