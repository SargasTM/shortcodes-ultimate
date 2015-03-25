<?php
class Su_Shortcodes {

	public static $postdata = array();
	public static $tabs = array();
	public static $tab_count = 0;

	function __construct() {}

	public static function button( $atts = null, $content = null ) {
		$atts = shortcode_atts(
			array(
				'text'            => __( 'Read More', 'cherry-shortcodes' ),
				'url'             => '#',
				'style'           => 'primary',
				'size'            => 'medium', // large, medium, small + filter
				'display'         => 'inline', // wide, inline
				'radius'          => 0,
				'centered'        => 'no',
				'fluid'           => 'no',
				'fluid_position'  => 'left',
				'icon'            => '',
				'icon_position'   => 'left',
				'desc'            => '',
				'bg_color'        => '',
				'color'           => '',
				'min_width'       => 0,
				'target'          => '_self',
				'rel'             => '',
				'hover_animation' => 'fade',
				'class'           => '',
			), $atts, 'button'
		);

		// define button attributes array
		$btn_atts = array();

		// Prepare button classes
		$classes   = array();
		$base      = apply_filters( 'cherry_shortcodes_button_base_class', 'cherry-btn', $atts );
		$classes[] = $base;
		$classes[] = $base . '-' . esc_attr( $atts['style'] );
		$classes[] = $base . '-' . esc_attr( $atts['size'] );
		$classes[] = $base . '-' . esc_attr( $atts['display'] );
		$classes[] = $base . '-' . esc_attr( $atts['hover_animation'] );

		if ( 'yes' == esc_attr( $atts['fluid'] ) ) {
			$classes[] = $base . '-' . esc_attr( $atts['fluid_position'] );
		}
		if ( ! empty( $atts['class'] ) ) {
			$classes[] = esc_attr( $atts['class'] );
		}

		// prepare button inline style
		$inline_styles = array();

		if ( 0 != (int)$atts['radius'] ) {
			$inline_styles['border-radius'] = (int)$atts['radius'] . 'px';
		}
		if ( !empty($atts['bg_color']) ) {
			$inline_styles['background-color'] = esc_attr( $atts['bg_color'] );
		}
		if ( !empty($atts['color']) ) {
			$inline_styles['color'] = esc_attr( $atts['color'] );
		}
		if ( 0 != (int)$atts['min_width'] ) {
			$inline_styles['min-width'] = (int)$atts['min_width'] . 'px';
		}

		if ( !empty( $inline_styles ) ) {
			$attr_style = '';
			foreach ( $inline_styles as $property => $value ) {
				$attr_style .= $property . ':' . $value . ';';
			}
			unset( $property, $value );
			$btn_atts['style'] = $attr_style;
		}

		$btn_atts['class'] = implode( ' ', $classes );

		if ( ! empty( $atts['target'] ) && in_array( $atts['target'], array( '_self', '_blank' ) ) ) {
			$btn_atts['target'] = esc_attr( $atts['target'] );
		}

		if ( ! empty( $atts['rel'] ) ) {
			$btn_atts['rel'] = esc_attr( $atts['rel'] );
		}

		$btn_atts['href'] = esc_url( $atts['url'] );

		/**
		 * Filter button attributes before adding to tag
		 *
		 * @param array  $btn_atts  default attributes
		 * @param array  $atts      current shortcode attributes
		 */
		$btn_atts = apply_filters( 'cherry_shortcodes_button_atts', $btn_atts, $atts );

		$btn_atts_string = '';

		if ( ! empty( $btn_atts ) && is_array( $btn_atts ) ) {
			foreach ( $btn_atts as $property => $value ) {
				$btn_atts_string .= ' ' . $property . '="' . esc_attr( $value ) . '"';
			}
		}

		$before = '';
		$after  = '';

		if ( 'yes' == $atts['centered'] ) {
			$custom_wraping = ( ! empty( $atts['class'] ) ) ? esc_attr( $atts['class'] ) . '-wrapper' : '';
			$before         = '<div class="aligncenter ' . $custom_wraping . '">';
			$after          = '</div>';
		}

		if ( 'yes' == $atts['fluid'] ) {
			$custom_wraping = ( ! empty( $atts['class'] ) ) ? esc_attr( $atts['class'] ) . '-wrapper' : '';
			$fluid_position = ( ! empty( $atts['fluid_position'] ) ) ? esc_attr( $atts['fluid_position'] ) : 'left';
			$before         = '<div class="fluid-button-' . $fluid_position . ' ' . $custom_wraping . '">';
			$after          = '</div>';
		}

		// build icon
		$icon = $atts['icon'];
		if ( ! empty( $atts['icon'] ) ) {
			$icon = '<span class="' . $base . '-icon icon-position-' . esc_attr( $atts['icon_position'] ) . '">' .
						esc_attr( $atts['icon'] ) .
					'</span>';
		}

		$btn_text = sanitize_text_field( $atts['text'] );

		$desc_class = ( 'wide' == $atts['display'] ) ? ' desc-wide' : '';
		$desc       = sanitize_text_field( $atts['desc'] );

		$btn_desc = ( ! empty( $desc ) )
						? '<small class="' . $base . '-desc' . $desc_class . '">' . $desc . '</small>'
						: '';

		// build open button element
		$open_el = $before . '<a' . $btn_atts_string . '>';

		// build button content
		$btn_content = $btn_text . $btn_desc;

		$content_wrap_open  = '';
		$content_wrap_close = '';
		if ( in_array( $atts['icon_position'], array( 'left', 'right' ) ) ) {
			$content_wrap_open  = '<span class="' . $base . '-content-wrap">';
			$content_wrap_close = '</span>';
		}

		if ( ! empty( $icon ) && in_array( $atts['icon_position'], array( 'left', 'top' ) ) ) {
			$btn_content = $icon . $content_wrap_open . $btn_content . $content_wrap_close;
		} elseif ( ! empty( $icon ) && in_array( $atts['icon_position'], array( 'right', 'bottom' ) ) ) {
			$btn_content = $content_wrap_open . $btn_content . $content_wrap_close . $icon;
		}

		/**
		 * Filter button content before output
		 *
		 * @param string  $btn_content  default button content
		 * @param array   $atts         current shortcode attributes
		 */
		$btn_content = apply_filters( 'cherry_shortcodes_button_content', $btn_content, $atts );

		// build close button element
		$close_el = '</a>' . $after;

		// build final putput
		$output = $open_el . $btn_content . $close_el;

		return apply_filters( 'cherry_shortcodes_output', $output, $atts, 'button' );
	}

	public static function spacer( $atts = null, $content = null ) {
		$atts = shortcode_atts( array(
			'size'  => '20',
			'class' => ''
		), $atts, 'spacer' );

		$output = '<div class="cherry-spacer' . su_ecssc( $atts ) . '" style="height:' . (string)$atts['size'] . 'px"></div>';

		return apply_filters( 'cherry_shortcodes_output', $output, $atts, 'spacer' );
	}

	public static function clear( $atts = null, $content = null ) {
		$atts = shortcode_atts( array(
			'class' => ''
		), $atts, 'clear' );

		$output = '<div class="cherry-clear' . su_ecssc( $atts ) . '"></div>';

		return apply_filters( 'cherry_shortcodes_output', $output, $atts, 'clear' );
	}

	public static function list_( $atts = null, $content = null ) {
		$atts = shortcode_atts( array(
			'type'  => 'circle',
			'class' => ''
		), $atts, 'list' );

		$output  = '<div class="cherry-list list-type-' . esc_attr( $atts['type'] ) . su_ecssc( $atts ) . '">';
		$output .= do_shortcode( $content );
		$output .= '</div>';

		return apply_filters( 'cherry_shortcodes_output', $output, $atts, 'list' );
	}

	public static function row( $atts = null, $content = null ) {
		$atts = shortcode_atts( array(
			'type'  => 'full-width',
			'class' => '',
		), $atts, 'row' );

		$type = sanitize_key( $atts['type'] );

		$container = ( 'fixed-width' == $type ) ? '<div class="container">%s</div>' : '%s';
		$output    = '<div class="row' . su_ecssc( $atts ) . '">' . do_shortcode( $content ) . '</div>';
		$output    = sprintf( $container, $output );
		$output    = apply_filters( 'cherry_shortcodes_output', $output, $atts, 'row' );

		return $output;
	}

	public static function row_inner( $atts = null, $content = null ) {
		$atts = shortcode_atts( array(
			'type'  => 'full-width',
			'class' => '',
		), $atts, 'row_inner' );

		$type = sanitize_key( $atts['type'] );

		$container = ( 'fixed-width' == $type ) ? '<div class="container">%s</div>' : '%s';
		$output    = '<div class="row' . su_ecssc( $atts ) . '">' . do_shortcode( $content ) . '</div>';
		$output    = sprintf( $container, $output );
		$output    = apply_filters( 'cherry_shortcodes_output', $output, $atts, 'row_inner' );

		return $output;
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
			'class'     => '',
		), $atts, 'col' );

		$class  = '';
		$class .= ( 'none' == $atts['size_lg'] )   ? '' : ' col-lg-' . sanitize_key( $atts['size_lg'] );
		$class .= ( 'none' == $atts['size_md'] )   ? '' : ' col-md-' . sanitize_key( $atts['size_md'] );
		$class .= ( 'none' == $atts['size_sm'] )   ? '' : ' col-sm-' . sanitize_key( $atts['size_sm'] );
		$class .= ( 'none' == $atts['size_xs'] )   ? '' : ' col-xs-' . sanitize_key( $atts['size_xs'] );
		$class .= ( 'none' == $atts['offset_lg'] ) ? '' : ' col-lg-offset-' . sanitize_key( $atts['offset_lg'] );
		$class .= ( 'none' == $atts['offset_md'] ) ? '' : ' col-md-offset-' . sanitize_key( $atts['offset_md'] );
		$class .= ( 'none' == $atts['offset_sm'] ) ? '' : ' col-sm-offset-' . sanitize_key( $atts['offset_sm'] );
		$class .= ( 'none' == $atts['offset_xs'] ) ? '' : ' col-xs-offset-' . sanitize_key( $atts['offset_xs'] );
		$class .= ( 'none' == $atts['pull_lg']  )  ? '' : ' col-lg-pull-' . sanitize_key( $atts['pull_lg'] );
		$class .= ( 'none' == $atts['pull_md']  )  ? '' : ' col-md-pull-' . sanitize_key( $atts['pull_md'] );
		$class .= ( 'none' == $atts['pull_sm']  )  ? '' : ' col-sm-pull-' . sanitize_key( $atts['pull_sm'] );
		$class .= ( 'none' == $atts['pull_xs']  )  ? '' : ' col-xs-pull-' . sanitize_key( $atts['pull_xs'] );
		$class .= ( 'none' == $atts['push_lg']  )  ? '' : ' col-lg-push-' . sanitize_key( $atts['push_lg'] );
		$class .= ( 'none' == $atts['push_md']  )  ? '' : ' col-md-push-' . sanitize_key( $atts['push_md'] );
		$class .= ( 'none' == $atts['push_sm']  )  ? '' : ' col-sm-push-' . sanitize_key( $atts['push_sm'] );
		$class .= ( 'none' == $atts['push_xs']  )  ? '' : ' col-xs-push-' . sanitize_key( $atts['push_xs'] );

		$output = '<div class="' . trim( esc_attr( $class ) ) . su_ecssc( $atts ) . '">' . do_shortcode( $content ) . '</div>';
		$output = apply_filters( 'cherry_shortcodes_output', $output, $atts, 'col' );

		return $output;
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
			'class'     => '',
		), $atts, 'col_inner' );

		$class  = '';
		$class .= ( 'none' == $atts['size_lg'] )   ? '' : ' col-lg-' . sanitize_key( $atts['size_lg'] );
		$class .= ( 'none' == $atts['size_md'] )   ? '' : ' col-md-' . sanitize_key( $atts['size_md'] );
		$class .= ( 'none' == $atts['size_sm'] )   ? '' : ' col-sm-' . sanitize_key( $atts['size_sm'] );
		$class .= ( 'none' == $atts['size_xs'] )   ? '' : ' col-xs-' . sanitize_key( $atts['size_xs'] );
		$class .= ( 'none' == $atts['offset_lg'] ) ? '' : ' col-lg-offset-' . sanitize_key( $atts['offset_lg'] );
		$class .= ( 'none' == $atts['offset_md'] ) ? '' : ' col-md-offset-' . sanitize_key( $atts['offset_md'] );
		$class .= ( 'none' == $atts['offset_sm'] ) ? '' : ' col-sm-offset-' . sanitize_key( $atts['offset_sm'] );
		$class .= ( 'none' == $atts['offset_xs'] ) ? '' : ' col-xs-offset-' . sanitize_key( $atts['offset_xs'] );
		$class .= ( 'none' == $atts['pull_lg']  )  ? '' : ' col-lg-pull-' . sanitize_key( $atts['pull_lg'] );
		$class .= ( 'none' == $atts['pull_md']  )  ? '' : ' col-md-pull-' . sanitize_key( $atts['pull_md'] );
		$class .= ( 'none' == $atts['pull_sm']  )  ? '' : ' col-sm-pull-' . sanitize_key( $atts['pull_sm'] );
		$class .= ( 'none' == $atts['pull_xs']  )  ? '' : ' col-xs-pull-' . sanitize_key( $atts['pull_xs'] );
		$class .= ( 'none' == $atts['push_lg']  )  ? '' : ' col-lg-push-' . sanitize_key( $atts['push_lg'] );
		$class .= ( 'none' == $atts['push_md']  )  ? '' : ' col-md-push-' . sanitize_key( $atts['push_md'] );
		$class .= ( 'none' == $atts['push_sm']  )  ? '' : ' col-sm-push-' . sanitize_key( $atts['push_sm'] );
		$class .= ( 'none' == $atts['push_xs']  )  ? '' : ' col-xs-push-' . sanitize_key( $atts['push_xs'] );

		$output = '<div class="' . trim( esc_attr( $class ) ) . su_ecssc( $atts ) . '">' . do_shortcode( $content ) . '</div>';
		$output = apply_filters( 'cherry_shortcodes_output', $output, $atts, 'col_inner' );

		return $output;
	}

	public static function posts( $atts = null, $content = null ) {
		static $instance = 0;
		$instance++;

		// Parse attributes.
		$atts = shortcode_atts( array(
				'id'                  => false,
				'posts_per_page'      => get_option( 'posts_per_page' ),
				'post_type'           => 'post',
				'taxonomy'            => 'category',
				'tax_term'            => false,
				'tax_operator'        => 'IN',
				'author'              => '',
				'offset'              => 0,
				'order'               => 'DESC',
				'orderby'             => 'date',
				'post_parent'         => false,
				'post_status'         => 'publish',
				'ignore_sticky_posts' => 'yes',
				'linked_title'        => 'yes',
				'linked_image'        => 'yes',
				'content_type'        => 'part',
				'content_length'      => 55,
				'button_text'         => __( 'read more', 'su' ),
				'col_xs'              => '12',
				'col_sm'              => '6',
				'col_md'              => '3',
				'col_lg'              => 'none',
				'class'               => '',
				'template'            => 'default.tmpl',
			), $atts, 'posts' );

		$original_atts = $atts;

		$id                  = $atts['id'];
		$posts_per_page      = intval( $atts['posts_per_page'] );
		$post_type           = sanitize_text_field( $atts['post_type'] );
		$post_type           = explode( ',', $post_type );
		$taxonomy            = sanitize_key( $atts['taxonomy'] );
		$tax_term            = sanitize_text_field( $atts['tax_term'] );
		$tax_operator        = $atts['tax_operator'];
		$author              = sanitize_text_field( $atts['author'] );
		$offset              = intval( $atts['offset'] );
		$order               = sanitize_key( $atts['order'] );
		$orderby             = sanitize_key( $atts['orderby'] );
		$post_parent         = $atts['post_parent'];
		$post_status         = $atts['post_status'];
		$ignore_sticky_posts = ( bool ) ( $atts['ignore_sticky_posts'] === 'yes' ) ? true : false;
		$linked_title        = ( bool ) ( $atts['linked_title'] === 'yes' ) ? true : false;
		$linked_image        = ( bool ) ( $atts['linked_image'] === 'yes' ) ? true : false;
		$content_type        = sanitize_key( $atts['content_type'] );
		$content_length      = intval( $atts['content_length'] );
		$button_text         = sanitize_text_field( $atts['button_text'] );
		$col_xs              = sanitize_key( $atts['col_xs'] );
		$col_sm              = sanitize_key( $atts['col_sm'] );
		$col_md              = sanitize_key( $atts['col_md'] );
		$col_lg              = sanitize_key( $atts['col_lg'] );
		$template_name       = sanitize_file_name( $atts['template'] );

		// Set up initial query for post.
		$args = array(
			'category_name'  => '',
			'order'          => $order,
			'orderby'        => $orderby,
			'post_type'      => $post_type,
			'posts_per_page' => $posts_per_page,
		);

		// Ignore Sticky Posts.
		if ( $ignore_sticky_posts ) {
			$args['ignore_sticky_posts'] = true;
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

		// If taxonomy attributes, create a taxonomy query.
		if ( !empty( $taxonomy ) && !empty( $tax_term ) ) {

			// Term string to array.
			$tax_term = explode( ',', $tax_term );

			// Validate operator.
			if ( !in_array( $tax_operator, array( 'IN', 'NOT IN', 'AND' ) ) ) {
				$tax_operator = 'IN';
			}
			$tax_args = array( 'tax_query' => array( array(
						'taxonomy' => $taxonomy,
						'field'    => ( is_numeric( $tax_term[0] ) ) ? 'id' : 'slug',
						'terms'    => $tax_term,
						'operator' => $tax_operator ) ) );

			// Check for multiple taxonomy queries.
			$count = 2;
			$more_tax_queries = false;

			while ( isset( $original_atts['taxonomy_' . $count] )
				&& !empty( $original_atts['taxonomy_' . $count] )
				&& isset( $original_atts['tax_' . $count . '_term'] )
				&& !empty( $original_atts['tax_' . $count . '_term'] )
				) {

				// Sanitize values.
				$more_tax_queries = true;
				$taxonomy         = sanitize_key( $original_atts['taxonomy_' . $count] );
				$terms            = explode( ', ', sanitize_text_field( $original_atts['tax_' . $count . '_term'] ) );
				$tax_operator     = isset( $original_atts['tax_' . $count . '_operator'] ) ? $original_atts['tax_' . $count . '_operator'] : 'IN';
				$tax_operator     = in_array( $tax_operator, array( 'IN', 'NOT IN', 'AND' ) ) ? $tax_operator : 'IN';
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

				if ( isset( $original_atts['tax_relation'] )
					&& in_array( $original_atts['tax_relation'], array( 'AND', 'OR' ) )
					) {
					$tax_relation = $original_atts['tax_relation'];
				}

				$args['tax_query']['relation'] = $tax_relation;

			endif;

			$args = array_merge( $args, $tax_args );
		}

		// If post parent attribute, set up parent.
		if ( $post_parent ) {
			if ( 'current' == $post_parent ) {
				global $post;
				$post_parent = $post->ID;
			}
			$args['post_parent'] = intval( $post_parent );
		}

		// Exclude current post/page (fix aborting).
		if ( in_array( get_post_type(), (array) $post_type ) && ( 'full' === $content_type ) ) {
			$args['post__not_in'] = array( get_the_ID() );
		}

		/**
		 * Filter the array of arguments for query.
		 *
		 * @since 1.0.0
		 * @param array $args Query arguments.
		 * @param array $atts Shortcode attributes.
		 */
		$args = apply_filters( 'cherry_shortcode_posts_query_args', $args, $atts );

		// Query posts.
		$posts_query = new WP_Query( $args );

		// Prepare string for outputing.
		$output = '';

		if ( $posts_query->have_posts() ) {

			// Item template's file.
			$template_file = self::get_template_path( $template_name, 'posts' );

			if ( false == $template_file ) {
				return '<h4>' . __( 'Template file (*.tmpl) not found', 'tm' ) . '</h4>';
			}

			ob_start();
			require( $template_file );
			$template = ob_get_contents();
			ob_end_clean();

			// Temp array for post data.
			$_postdata = array();

			// Date format.
			$date_format = get_option( 'date_format' );
			preg_match_all( '/DATE=".+?"/', $template, $match, PREG_SET_ORDER );

			if ( is_array( $match ) && !empty( $match ) ) {
				$_atts       = shortcode_parse_atts( $match[0][0] );
				$date_format = $_atts['date'];
			}

			// Taxonomy.
			$tax = array();
			preg_match_all( '/TAXONOMY=".+?"/', $template, $match, PREG_SET_ORDER );

			if ( is_array( $match ) && !empty( $match ) ) {
				foreach ( $match as $m ) {
					$_atts = shortcode_parse_atts( $m[0] );
					$tax[] = $_atts['taxonomy'];
				}
			}

			// Button classes.
			$btn_classes = '';
			preg_match_all( '/BUTTON=".+?"/', $template, $match, PREG_SET_ORDER );

			if ( is_array( $match ) && !empty( $match ) ) {
				$_atts       = shortcode_parse_atts( $match[0][0] );
				$btn_classes = $_atts['button'];
			}

			while ( $posts_query->have_posts() ) :
				$posts_query->the_post();

				// Prepare a data.
				$tpl        = $template;
				$post_id    = get_the_ID();
				$post_type  = get_post_type( $post_id );
				$permalink  = get_permalink();
				$title_text = get_the_title();
				$title_attr = the_title_attribute( array( 'echo' => false ) );
				$author     = get_the_author();
				$author_url = get_author_posts_url( get_the_author_meta( 'ID' ) );
				$date       = get_the_date( $date_format );
				$_content   = get_the_content( '' );
				$excerpt    = $thumbnail = $comments = $taxonomy = '';
				$tax_data   = array();

				// Excerpt.
				if ( post_type_supports( $post_type, 'excerpt' ) ) {
					$excerpt = has_excerpt( $post_id ) ? apply_filters( 'the_excerpt', get_the_excerpt() ) : '';
				}

				// Thumbnail.
				if ( post_type_supports( $post_type, 'thumbnail' ) ) {
					$thumbnail = has_post_thumbnail( $post_id ) ? get_the_post_thumbnail( $post_id ) : '';
				}

				// Comments.
				if ( post_type_supports( $post_type, 'comments' ) ) {
					$comments = ( comments_open() || get_comments_number() ) ? get_comments_number() : '';
				}

				// Content.
				if ( 'part' == $content_type ) {
					/* wp_trim_excerpt analog */
					$content = strip_shortcodes( $_content );
					$content = apply_filters( 'the_content', $content );
					$content = str_replace( ']]>', ']]&gt;', $content );
					$content = wp_trim_words( $content, $content_length, '' );
				} else {
					$content = apply_filters( 'the_content', $_content );
				}

				// Terms.
				if ( $tax ) {

					foreach ( $tax as $t ) :
						$terms = wp_get_post_terms( $post_id, $t );

						if ( !empty( $terms ) && !is_wp_error( $terms ) ) {
							foreach ( $terms as $term ) {
								$tax_data[ $t ][ $term->slug ] = '<a href="' . get_term_link( $term->slug, $t ) . '">' . $term->name . '</a>';
							}
						}
					endforeach;
				}

				// Apply a filters.
				$title_text  = apply_filters( 'cherry_shortcodes_title_text',  $title_text,  $post_id, $atts, 'posts' );
				$title_attr  = apply_filters( 'cherry_shortcodes_title_attr',  $title_attr,  $post_id, $atts, 'posts' );
				$thumbnail   = apply_filters( 'cherry_shortcodes_thumbnail',   $thumbnail,   $post_id, $atts, 'posts' );
				$comments    = apply_filters( 'cherry_shortcodes_comments',    $comments,    $post_id, $atts, 'posts' );
				$tax_data    = apply_filters( 'cherry_shortcodes_taxonomy',    $tax_data,    $post_id, $atts, 'posts' );
				$date        = apply_filters( 'cherry_shortcodes_date',        $date,        $post_id, $atts, 'posts' );
				$author      = apply_filters( 'cherry_shortcodes_author',      $author,      $post_id, $atts, 'posts' );
				$excerpt     = apply_filters( 'cherry_shortcodes_excerpt',     $excerpt,     $post_id, $atts, 'posts' );
				$content     = apply_filters( 'cherry_shortcodes_content',     $content,     $post_id, $atts, 'posts' );
				$permalink   = apply_filters( 'cherry_shortcodes_permalink',   $permalink,   $post_id, $atts, 'posts' );
				$btn_classes = apply_filters( 'cherry_shortcodes_btn_classes', $btn_classes, $post_id, $atts, 'posts' );

				// Gets a formatted data.
				$title = $image = '';

				if ( !empty( $title_text ) ) {
					$title = ( $linked_title ) ?
					sprintf( '<a href="%1$s" title="%2$s" class="%3$s">%4$s</a>',
						esc_url( $permalink ),
						esc_attr( $title_attr ),
						'post-title-link',
						esc_attr( $title_text )
					) : sprintf( '%s', esc_attr( $title_text ) );
				}

				if ( !empty( $thumbnail ) ) {
					$image = ( $linked_image ) ?
					sprintf( '<a href="%1$s" title="%2$s" class="%3$s">%4$s</a>',
						esc_url( $permalink ),
						esc_attr( $title_attr ),
						'post-thumbnail',
						$thumbnail
					) : sprintf( '%s', $thumbnail );
				}

				$comments = ( !empty( $comments ) ) ?
					sprintf( '<span class="post-comments-link"><a href="%1$s">%2$s</a></span>',
						esc_url( get_comments_link() ),
						$comments
					) : '';

				$date = sprintf( '<time class="post-date" datetime="%1$s">%2$s</time>',
					esc_attr( get_the_date( 'c' ) ),
					$date
				);

				$author = sprintf( '<span class="post-author vcard"><a href="%1$s" rel="author">%2$s</a></span>', esc_url( $author_url ),
					$author
				);

				$excerpt = ( !empty( $excerpt ) ) ? sprintf( '<div class="post-excerpt">%s</div>', $excerpt ) : '';
				$content = ( !empty( $content ) ) ? sprintf( '<div class="post-content">%s</div>', $content ) : '';

				$button = ( $button_text ) ?
					sprintf(
						'<a href="%1$s" class="%2$s">%3$s</a>',
						esc_url( $permalink ),
						esc_attr( $btn_classes ),
						apply_filters( 'cherry_shortcodes_translate', $button_text, 'posts_button_text' )
					) : '';

				if ( $tax ) {
					$taxonomy = array();
					foreach ( $tax_data as $name => $data ) {
						$taxonomy[ $name ] = sprintf(
							'<span class="post-tax post-tax-%1$s">%2$s</span>',
							sanitize_html_class( $name ),
							join( ' ', $data )
						);
					}
				}

				// Prepare a current post data array.
				$_postdata = compact( 'title', 'image', 'comments', 'taxonomy', 'date', 'author', 'excerpt', 'content', 'button' );

				/**
				 * Filters the array with a current post data.
				 *
				 * @since 1.0.0
				 * @param array  $_postdata Array with a current post data.
				 * @param int    $post_id   Post ID.
				 * @param array  $atts      Shortcode attributes.
				 */
				$_postdata = apply_filters( 'cherry-shortcode-posts-postdata', $_postdata, $post_id, $atts );

				// Init a `postdata` array.
				self::$postdata = $_postdata;

				// Perform a regular expression.
				$tpl = preg_replace_callback( "/%%.+?%%/", array( 'Su_Shortcodes', 'replace_callback' ), $tpl );

				// Prepare the CSS classes for item's.
				$item_classes   = array();
				$item_classes[] = 'cherry-posts-item';
				$item_classes[] = $post_type . '-item';
				$item_classes[] = 'item-' . $posts_query->current_post;
				$item_classes[] = ( $posts_query->current_post % 2 ) ? 'even' : 'odd';

				if ( 'none' !== $col_xs ) {
					$item_classes['col-xs'] = 'col-xs-' . intval( $col_xs );
				}

				if ( 'none' !== $col_sm ) {
					$item_classes['col-sm'] = 'col-sm-' . intval( $col_sm );
				}

				if ( 'none' !== $col_md ) {
					$item_classes['col-md'] = 'col-md-' . intval( $col_md );
				}

				if ( 'none' !== $col_lg ) {
					$item_classes['col-lg'] = 'col-lg-' . intval( $col_lg );
				}

				/**
				 * Filters the CSS classes for item's.
				 *
				 * @since 1.0.0
				 * @param array $item_classes An array of classes.
				 * @param array $atts         Shortcode attributes.
				 * @param int   $post_id      Post ID.
				 */
				$item_classes = apply_filters( 'cherry_shortcode_posts_item_classes', $item_classes, $atts, $post_id );
				$item_classes = array_unique( $item_classes );
				$item_classes = array_map( 'sanitize_html_class', $item_classes );

				/**
				 * Filters the HTML-wrap with item's content.
				 *
				 * @since 1.0.0
				 * @param string $item         HTML-formatted item's wrapper.
				 * @param int    $current_post Index of the post currently being displayed.
				 * @param array  $atts         Shortcode attributes.
				 * @param int    $post_id      Post ID.
				 */
				$item = apply_filters(
					'cherry_shortcode_posts_item',
					'<div class="%1$s"><div class="inner clearfix">%2$s</div></div>',
					$posts_query->current_post,
					$atts,
					$post_id
				);

				$output .= sprintf( $item, join( ' ', $item_classes ), $tpl );
				$output .= '<!--/.cherry-posts-item-->';

			endwhile;

			// Prepare the CSS classes for list.
			$wrap_classes        = array();
			$wrap_classes[]      = 'cherry-posts-list';
			$wrap_classes['row'] = 'row';

			if ( $atts['class'] ) {
				$wrap_classes[] = esc_attr( $atts['class'] );
			}

			/**
			 * Filters the CSS classes for list.
			 *
			 * @since 1.0.0
			 * @param array $wrap_classes An array of classes.
			 * @param array $atts         Shortcode attributes.
			 */
			$wrap_classes = apply_filters( 'cherry_shortcode_posts_list_classes', $wrap_classes, $atts );
			$wrap_classes = array_unique( $wrap_classes );
			$wrap_classes = array_map( 'sanitize_html_class', $wrap_classes );

			/**
			 * Filters the HTML-wrap with list content.
			 *
			 * @since 1.0.0
			 * @param string $wrap HTML-formatted list wrapper.
			 * @param array  $atts Shortcode attributes.
			 */
			$wrap = apply_filters(
				'cherry_shortcode_posts_list',
				'<div id="cherry-posts-list-%1$d" class="%2$s">%3$s</div>',
				$atts
			);

			$output = sprintf( $wrap, $instance, join( ' ', $wrap_classes ), $output );
			$output .= '<!--/.cherry-posts-list-->';

		} else {
			echo '<h4>' . __( 'Posts not found', 'su' ) . '</h4>';
		}

		// Reset the query.
		wp_reset_postdata();

		// Reset the `postdata`.
		self::$postdata = array();

		/**
		 * Filters $output before return.
		 *
		 * @since 1.0.0
		 * @param string $output
		 * @param array  $atts
		 * @param string $shortcode
		 */
		$output = apply_filters( 'cherry_shortcodes_output', $output, $atts, 'posts' );

		return $output;
	}

	public static function swiper_carousel( $atts = null, $content = null ) {
		su_query_asset( 'js', 'swiper' );
		su_query_asset( 'js', 'cherry-shortcodes' );

		static $instance = 0;
		$instance++;

		// Parse attributes.
		$atts = shortcode_atts( array(
			'id'					=> false,
			'posts_per_page'		=> get_option( 'posts_per_page' ),
			'post_type'				=> 'post',
			'taxonomy'				=> 'category',
			'tax_term'				=> false,
			'tax_operator'			=> 'IN',
			'author'				=> '',
			'offset'				=> 0,
			'order'					=> 'DESC',
			'orderby'				=> 'date',
			'post_parent'			=> false,
			'post_status'			=> 'publish',
			'ignore_sticky_posts'	=> 'no',
			'linked_title'			=> 'yes',
			'linked_image'			=> 'yes',
			'content_type'			=> 'part',
			'content_length'		=> 55,
			'button_text'			=> __( 'read more', 'su' ),
			'class'					=> '',
			'template'				=> 'default.tmpl',
			'crop_image'			=> 'no',
			'crop_width'			=> 540,
			'crop_height'			=> 320,
			'slides_per_view'		=> 3,
			'slides_per_column'		=> 1,
			'space_between_slides'	=> 10,
			'swiper_duration_speed'	=> 300,
			'swiper_loop'			=> 'yes',
			'swiper_free_mode'		=> 'no',
			'swiper_grab_cursor'	=> 'yes',
			'swiper_mouse_wheel'	=> 'no',
			'swiper_centered_slide'	=> 'no',
			'swiper_effect'			=> 'slide',
			'swiper_pagination'		=> 'yes',
			'swiper_navigation'		=> 'yes',
		), $atts, 'swiper_carousel' );

		$id							= $atts['id'];
		$posts_per_page				= intval( $atts['posts_per_page'] );
		$post_type					= sanitize_text_field( $atts['post_type'] );
		$post_type					= explode( ',', $post_type );
		$taxonomy					= sanitize_key( $atts['taxonomy'] );
		$tax_term					= sanitize_text_field( $atts['tax_term'] );
		$tax_operator				= $atts['tax_operator'];
		$author						= sanitize_text_field( $atts['author'] );
		$offset						= intval( $atts['offset'] );
		$order						= sanitize_key( $atts['order'] );
		$orderby					= sanitize_key( $atts['orderby'] );
		$post_parent				= $atts['post_parent'];
		$post_status				= $atts['post_status'];
		$ignore_sticky_posts		= ( bool ) ( $atts['ignore_sticky_posts'] === 'yes' ) ? true : false;
		$linked_title				= ( bool ) ( $atts['linked_title'] === 'yes' ) ? true : false;
		$linked_image				= ( bool ) ( $atts['linked_image'] === 'yes' ) ? true : false;
		$content_type				= sanitize_key( $atts['content_type'] );
		$content_length				= intval( $atts['content_length'] );
		$button_text				= sanitize_text_field( $atts['button_text'] );
		$template_name				= sanitize_file_name( $atts['template'] );
		$crop_image					= ( bool ) ( $atts['crop_image'] === 'yes' ) ? true : false;
		$crop_width					= intval( $atts['crop_width'] );
		$crop_height				= intval( $atts['crop_height'] );
		$slides_per_view			= intval( $atts['slides_per_view'] );
		$slides_per_column			= intval( $atts['slides_per_column'] );
		$space_between_slides		= intval( $atts['space_between_slides'] );
		$swiper_duration_speed		= intval( $atts['swiper_duration_speed'] );
		$swiper_loop				= ( bool ) ( $atts['swiper_loop'] === 'yes' ) ? true : false;
		$swiper_free_mode			= ( bool ) ( $atts['swiper_free_mode'] === 'yes' ) ? true : false;
		$swiper_grab_cursor			= ( bool ) ( $atts['swiper_grab_cursor'] === 'yes' ) ? true : false;
		$swiper_mouse_wheel			= ( bool ) ( $atts['swiper_mouse_wheel'] === 'yes' ) ? true : false;
		$swiper_centered_slide		= ( bool ) ( $atts['swiper_centered_slide'] === 'yes' ) ? true : false;
		$swiper_effect				= sanitize_text_field( $atts['swiper_effect'] );
		$swiper_pagination			= ( bool ) ( $atts['swiper_pagination'] === 'yes' ) ? true : false;
		$swiper_navigation			= ( bool ) ( $atts['swiper_navigation'] === 'yes' ) ? true : false;

		// Set up initial query for post.
		$args = array(
			'category_name'  => '',
			'order'          => $order,
			'orderby'        => $orderby,
			'post_type'      => $post_type,
			'posts_per_page' => $posts_per_page,
		);

		// Ignore Sticky Posts.
		if ( $ignore_sticky_posts ) {
			$args['ignore_sticky_posts'] = true;
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

		// If taxonomy attributes, create a taxonomy query.
		if ( !empty( $taxonomy ) && !empty( $tax_term ) ) {

			// Term string to array.
			$tax_term = explode( ',', $tax_term );

			// Validate operator.
			if ( !in_array( $tax_operator, array( 'IN', 'NOT IN', 'AND' ) ) ) {
				$tax_operator = 'IN';
			}
			$tax_args = array( 'tax_query' => array( array(
						'taxonomy' => $taxonomy,
						'field'    => ( is_numeric( $tax_term[0] ) ) ? 'id' : 'slug',
						'terms'    => $tax_term,
						'operator' => $tax_operator ) ) );

			// Check for multiple taxonomy queries.
			$count = 2;
			$more_tax_queries = false;

			while ( isset( $original_atts['taxonomy_' . $count] )
				&& !empty( $original_atts['taxonomy_' . $count] )
				&& isset( $original_atts['tax_' . $count . '_term'] )
				&& !empty( $original_atts['tax_' . $count . '_term'] )
				) {

				// Sanitize values.
				$more_tax_queries = true;
				$taxonomy         = sanitize_key( $original_atts['taxonomy_' . $count] );
				$terms            = explode( ', ', sanitize_text_field( $original_atts['tax_' . $count . '_term'] ) );
				$tax_operator     = isset( $original_atts['tax_' . $count . '_operator'] ) ? $original_atts['tax_' . $count . '_operator'] : 'IN';
				$tax_operator     = in_array( $tax_operator, array( 'IN', 'NOT IN', 'AND' ) ) ? $tax_operator : 'IN';
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

				if ( isset( $original_atts['tax_relation'] )
					&& in_array( $original_atts['tax_relation'], array( 'AND', 'OR' ) )
					) {
					$tax_relation = $original_atts['tax_relation'];
				}

				$args['tax_query']['relation'] = $tax_relation;

			endif;

			$args = array_merge( $args, $tax_args );
		}

		// If post parent attribute, set up parent.
		if ( $post_parent ) {
			if ( 'current' == $post_parent ) {
				global $post;
				$post_parent = $post->ID;
			}
			$args['post_parent'] = intval( $post_parent );
		}

		// Exclude current post/page (fix aborting).
		if ( in_array( get_post_type(), (array) $post_type ) && ( 'full' === $content_type ) ) {
			$args['post__not_in'] = array( get_the_ID() );
		}

		/**
		 * Filter the array of arguments for query.
		 *
		 * @since 1.0.0
		 * @param array $args Query arguments.
		 * @param array $atts Shortcode attributes.
		 */
		$args = apply_filters( 'cherry_shortcode_swiper_carousel_query_args', $args, $atts );

		// Query posts.
		$posts_query = new WP_Query( $args );

		// Prepare string for outputing.
		$output = '';

		if ( $posts_query->have_posts() ) {

			// Item template's file.
			$template_file = self::get_template_path( $template_name, 'swiper_carousel' );

			if ( false == $template_file ) {
				return '<h4>' . __( 'Template file (*.tmpl) not found', 'tm' ) . '</h4>';
			}

			ob_start();
			require( $template_file );
			$template = ob_get_contents();
			ob_end_clean();

			// Temp array for post data.
			$_postdata = array();

			// Date format.
			$date_format = get_option( 'date_format' );
			preg_match_all( '/DATE=".+?"/', $template, $match, PREG_SET_ORDER );

			if ( is_array( $match ) && !empty( $match ) ) {
				$_atts       = shortcode_parse_atts( $match[0][0] );
				$date_format = $_atts['date'];
			}

			// Taxonomy.
			$tax = array();
			preg_match_all( '/TAXONOMY=".+?"/', $template, $match, PREG_SET_ORDER );

			if ( is_array( $match ) && !empty( $match ) ) {
				foreach ( $match as $m ) {
					$_atts = shortcode_parse_atts( $m[0] );
					$tax[] = $_atts['taxonomy'];
				}
			}

			// Button classes.
			$btn_classes = '';
			preg_match_all( '/BUTTON=".+?"/', $template, $match, PREG_SET_ORDER );

			if ( is_array( $match ) && !empty( $match ) ) {
				$_atts       = shortcode_parse_atts( $match[0][0] );
				$btn_classes = $_atts['button'];
			}

			while ( $posts_query->have_posts() ) :
				$posts_query->the_post();

				// Prepare a data.
				$tpl        = $template;
				$post_id    = get_the_ID();
				$post_type  = get_post_type( $post_id );
				$permalink  = get_permalink();
				$title_text = get_the_title();
				$title_attr = the_title_attribute( array( 'echo' => false ) );
				$author     = get_the_author();
				$author_url = get_author_posts_url( get_the_author_meta( 'ID' ) );
				$date       = get_the_date( $date_format );
				$_content   = get_the_content( '' );
				$excerpt    = $thumbnail = $comments = $taxonomy = '';
				$tax_data   = array();


			// Excerpt.
			if ( post_type_supports( $post_type, 'excerpt' ) ) {
				$excerpt = has_excerpt( $post_id ) ? apply_filters( 'the_excerpt', get_the_excerpt() ) : '';
			}

			// Thumbnail.
			if ( post_type_supports( $post_type, 'thumbnail' ) ) {
				if( $crop_image ){
					$img_url = wp_get_attachment_url( get_post_thumbnail_id() ,'full'); //get img URL
					$thumbnail = self::get_crop_image( $img_url, $crop_width, $crop_height );
				}else{
					$thumbnail = has_post_thumbnail( $post_id ) ? get_the_post_thumbnail( $post_id, 'large' ) : '';
				}
			}

			// Comments.
			if ( post_type_supports( $post_type, 'comments' ) ) {
				$comments = ( comments_open() || get_comments_number() ) ? get_comments_number() : '';
			}

			// Content.
			if ( 'part' == $content_type ) {
				/* wp_trim_excerpt analog */
				$content = strip_shortcodes( $_content );
				$content = apply_filters( 'the_content', $content );
				$content = str_replace( ']]>', ']]&gt;', $content );
				$content = wp_trim_words( $content, $content_length, '' );
			} else {
				$content = apply_filters( 'the_content', $_content );
			}

			// Terms.
			if ( $tax ) {

				foreach ( $tax as $t ) :
					$terms = wp_get_post_terms( $post_id, $t );

					if ( !empty( $terms ) && !is_wp_error( $terms ) ) {
						foreach ( $terms as $term ) {
							$tax_data[ $t ][ $term->slug ] = '<a href="' . get_term_link( $term->slug, $t ) . '">' . $term->name . '</a>';
						}
					}
				endforeach;
			}

			// Apply a filters.
			$title_text  = apply_filters( 'cherry_shortcodes_title_text',  $title_text,  $post_id, $atts, 'swiper_carousel' );
			$title_attr  = apply_filters( 'cherry_shortcodes_title_attr',  $title_attr,  $post_id, $atts, 'swiper_carousel' );
			$thumbnail   = apply_filters( 'cherry_shortcodes_thumbnail',   $thumbnail,   $post_id, $atts, 'swiper_carousel' );
			$comments    = apply_filters( 'cherry_shortcodes_comments',    $comments,    $post_id, $atts, 'swiper_carousel' );
			$tax_data    = apply_filters( 'cherry_shortcodes_taxonomy',    $tax_data,    $post_id, $atts, 'swiper_carousel' );
			$date        = apply_filters( 'cherry_shortcodes_date',        $date,        $post_id, $atts, 'swiper_carousel' );
			$author      = apply_filters( 'cherry_shortcodes_author',      $author,      $post_id, $atts, 'swiper_carousel' );
			$excerpt     = apply_filters( 'cherry_shortcodes_excerpt',     $excerpt,     $post_id, $atts, 'swiper_carousel' );
			$content     = apply_filters( 'cherry_shortcodes_content',     $content,     $post_id, $atts, 'swiper_carousel' );
			$permalink   = apply_filters( 'cherry_shortcodes_permalink',   $permalink,   $post_id, $atts, 'swiper_carousel' );
			$btn_classes = apply_filters( 'cherry_shortcodes_btn_classes', $btn_classes, $post_id, $atts, 'swiper_carousel' );

			// Gets a formatted data.
			$title = $image = '';

			if ( !empty( $title_text ) ) {
				$title = ( $linked_title ) ?
				sprintf( '<a href="%1$s" title="%2$s" class="%3$s">%4$s</a>',
					esc_url( $permalink ),
					esc_attr( $title_attr ),
					'post-title-link',
					esc_attr( $title_text )
				) : sprintf( '%s', esc_attr( $title_text ) );
			}

			if ( !empty( $thumbnail ) ) {
				$image = ( $linked_image ) ?
				sprintf( '<a href="%1$s" title="%2$s" class="%3$s">%4$s</a>',
					esc_url( $permalink ),
					esc_attr( $title_attr ),
					'post-thumbnail',
					$thumbnail
				) : sprintf( '%s', $thumbnail );
			}

			$comments = ( !empty( $comments ) ) ?
				sprintf( '<span class="post-comments-link"><a href="%1$s">%2$s</a></span>',
					esc_url( get_comments_link() ),
					$comments
				) : '';

			$date = sprintf( '<time class="post-date" datetime="%1$s">%2$s</time>',
				esc_attr( get_the_date( 'c' ) ),
				$date
			);

			$author = sprintf( '<span class="post-author vcard"><a href="%1$s" rel="author">%2$s</a></span>', esc_url( $author_url ),
				$author
			);

			$excerpt = ( !empty( $excerpt ) ) ? sprintf( '<div class="post-excerpt">%s</div>', $excerpt ) : '';
			$content = ( !empty( $content ) ) ? sprintf( '<div class="post-content">%s</div>', $content ) : '';

			$button = ( $button_text ) ?
				sprintf(
					'<a href="%1$s" class="%2$s">%3$s</a>',
					esc_url( $permalink ),
					esc_attr( $btn_classes ),
					apply_filters( 'cherry_shortcodes_translate', $button_text, 'posts_button_text' )
				) : '';

			if ( $tax ) {
				$taxonomy = array();
				foreach ( $tax_data as $name => $data ) {
					$taxonomy[ $name ] = sprintf(
						'<span class="post-tax post-tax-%1$s">%2$s</span>',
						sanitize_html_class( $name ),
						join( ' ', $data )
					);
				}
			}

			// Prepare a current post data array.
			$_postdata['title']    = $title;
			$_postdata['image']    = $image;
			$_postdata['comments'] = $comments;
			$_postdata['taxonomy'] = $taxonomy;
			$_postdata['date']     = $date;
			$_postdata['author']   = $author;
			$_postdata['excerpt']  = $excerpt;
			$_postdata['content']  = $content;
			$_postdata['button']   = $button;

			/**
			 * Filters the array with a current post data.
			 *
			 * @since 1.0.0
			 * @param array  $_postdata Array with a current post data.
			 * @param int    $post_id   Post ID.
			 * @param array  $atts      Shortcode attributes.
			 */
			$_postdata = apply_filters( 'cherry-shortcode-swiper-carousel-postdata', $_postdata, $post_id, $atts );

			// Init a `postdata` array.
			self::$postdata = $_postdata;

			// Perform a regular expression.
			$tpl = preg_replace_callback( "/%%.+?%%/", array( 'Su_Shortcodes', 'replace_callback' ), $tpl );

			// Prepare the CSS classes for item's.
			$item_classes   = array();
			$item_classes[] = 'cherry-swiper-carousel-slide';
			$item_classes[] = 'swiper-slide';
			$item_classes[] = $post_type . '-item';
			$item_classes[] = 'item-' . $posts_query->current_post;
			$item_classes[] = ( $posts_query->current_post % 2 ) ? 'even' : 'odd';

			/**
			 * Filters the CSS classes for item's.
			 *
			 * @since 1.0.0
			 * @param array $item_classes An array of classes.
			 * @param array $atts         Shortcode attributes.
			 * @param int   $post_id      Post ID.
			 */
			$item_classes = apply_filters( 'cherry_shortcode_swiper_carousel_item_classes', $item_classes, $atts, $post_id );
			$item_classes = array_unique( $item_classes );
			$item_classes = array_map( 'sanitize_html_class', $item_classes );

			/**
				 * Filters the HTML-wrap with item's content.
				 *
				 * @since 1.0.0
				 * @param string $item         HTML-formatted item's wrapper.
				 * @param int    $current_post Index of the post currently being displayed.
				 * @param array  $atts         Shortcode attributes.
				 * @param int    $post_id      Post ID.
				 */
				$item = apply_filters(
					'cherry_shortcode_swiper_carousel_slide',
					'<article class="%1$s"><div class="inner clearfix">%2$s</div></article>',
					$posts_query->current_post,
					$atts,
					$post_id
				);

				$output .= sprintf( $item, join( ' ', $item_classes ), $tpl );
				$output .= '<!--/.cherry-swiper-carousel-item-->';

			endwhile;
			// Prepare the CSS classes for list.
			$wrap_classes        = array();
			$wrap_classes[]      = 'cherry-swiper-carousel';
			$wrap_classes[]      = 'swiper-container';

			if ( $atts['class'] ) {
				$wrap_classes[] = esc_attr( $atts['class'] );
			}

			/**
			 * Filters the CSS classes for list.
			 *
			 * @since 1.0.0
			 * @param array $wrap_classes An array of classes.
			 * @param array $atts         Shortcode attributes.
			 */
			$wrap_classes = apply_filters( 'cherry_shortcode_posts_list_classes', $wrap_classes, $atts );
			$wrap_classes = array_unique( $wrap_classes );
			$wrap_classes = array_map( 'sanitize_html_class', $wrap_classes );

			$swiper_navigation = true;
			$swiper_pagination = true;

			$data_attr_line = '';
			$data_attr_line .= 'data-slides-per-view="' . $slides_per_view . '"';
			$data_attr_line .= 'data-slides-per-column="' . $slides_per_column . '"';
			$data_attr_line .= 'data-space-between-slides="' . $space_between_slides . '"';
			$data_attr_line .= 'data-duration-speed="' . $swiper_duration_speed . '"';
			$data_attr_line .= 'data-swiper-loop="' . $swiper_loop . '"';
			$data_attr_line .= 'data-free-mode="' . $swiper_free_mode . '"';
			$data_attr_line .= 'data-grab-cursor="' . $swiper_grab_cursor . '"';
			$data_attr_line .= 'data-mouse-wheel="' . $swiper_mouse_wheel . '"';
			$data_attr_line .= 'data-centered-slide="' . $swiper_centered_slide . '"';
			$data_attr_line .= 'data-swiper-effect="' . $swiper_effect . '"';

			$swiper_pagination_html = '<div class="swiper-pagination"></div>';
			$swiper_navigation_html =  '<div class="swiper-button-next"></div><div class="swiper-button-prev"></div>';

			/**
			 * Filters the HTML-wrap with list content.
			 *
			 * @since 1.0.0
			 * @param string $wrap HTML-formatted list wrapper.
			 * @param array  $atts Shortcode attributes.
			 */
			$wrap = apply_filters(
				'cherry_shortcode_swiper_carousel_list',
				'<section id="cherry-swiper-carousel-%1$d" class="%2$s" %3$s><div class="swiper-wrapper">%4$s</div>%5$s %6$s</section>',
				$atts
			);
			$output = sprintf( $wrap, $instance, join( ' ', $wrap_classes ), $data_attr_line, $output, $swiper_navigation_html, $swiper_pagination_html );
			$output .= '<!--/.cherry-swiper-carousel-list-->';

		}else {
			echo '<h4>' . __( 'Posts not found', 'su' ) . '</h4>';
		}

		// Reset the query.
		wp_reset_postdata();

		// Reset the `postdata`.
		self::$postdata = array();
		/**
		 * Filters $output before return.
		 *
		 * @since 1.0.0
		 * @param string $output
		 * @param array  $atts
		 * @param string $shortcode
		 */
		$output = apply_filters( 'cherry_shortcodes_output', $output, $atts, 'swiper_carousel' );

		return $output;
	}

	public static function tabs( $atts = null, $content = null ) {
		$atts = shortcode_atts( array(
				'active'   => 1,
				'vertical' => 'no',
				'style'    => 'default', // 3.x
				'class'    => ''
			), $atts, 'tabs' );
		if ( $atts['style'] === '3' ) $atts['vertical'] = 'yes';
		do_shortcode( $content );
		$return = '';
		$tabs = $panes = array();

		if ( is_array( self::$tabs ) ) {
			if ( self::$tab_count < $atts['active'] ) $atts['active'] = self::$tab_count;
			foreach ( self::$tabs as $tab ) {
				$tabs[] = '<span class="' . su_ecssc( $tab ) . $tab['disabled'] . '"' . $tab['anchor'] . $tab['url'] . $tab['target'] . '>' . su_scattr( $tab['title'] ) . '</span>';
				$panes[] = '<div class="cherry-tabs-pane cherry-clearfix' . su_ecssc( $tab ) . '">' . $tab['content'] . '</div>';
			}
			$atts['vertical'] = ( $atts['vertical'] === 'yes' ) ? ' cherry-tabs-vertical' : '';
			$return = '<div class="cherry-tabs cherry-tabs-style-' . $atts['style'] . $atts['vertical'] . su_ecssc( $atts ) . '" data-active="' . (string) $atts['active'] . '"><div class="cherry-tabs-nav">' . implode( '', $tabs ) . '</div><div class="cherry-tabs-panes">' . implode( "\n", $panes ) . '</div></div>';
		}
		// Reset tabs
		self::$tabs = array();
		self::$tab_count = 0;

		su_query_asset( 'js', 'jquery' );
		su_query_asset( 'js', 'cherry-shortcodes' );

		do_action( 'su/shortcode/tabs', $atts );
		return $return;
	}

	public static function tab( $atts = null, $content = null ) {
		$atts = shortcode_atts( array(
				'title'    => __( 'Tab title', 'cherry-shortcodes' ),
				'disabled' => 'no',
				'anchor'   => '',
				'url'      => '',
				'target'   => 'blank',
				'class'    => ''
			), $atts, 'tab' );
		$x = self::$tab_count;
		self::$tabs[$x] = array(
			'title'    => $atts['title'],
			'content'  => do_shortcode( $content ),
			'disabled' => ( $atts['disabled'] === 'yes' ) ? ' cherry-tabs-disabled' : '',
			'anchor'   => ( $atts['anchor'] ) ? ' data-anchor="' . str_replace( array( ' ', '#' ), '', sanitize_text_field( $atts['anchor'] ) ) . '"' : '',
			'url'      => ' data-url="' . $atts['url'] . '"',
			'target'   => ' data-target="' . $atts['target'] . '"',
			'class'    => $atts['class']
		);
		self::$tab_count++;
		do_action( 'su/shortcode/tab', $atts );
	}

	public static function spoiler( $atts = null, $content = null ) {
		$atts = shortcode_atts( array(
				'title'  => __( 'Spoiler title', 'cherry-shortcodes' ),
				'open'   => 'no',
				'style'  => 'default',
				'icon'   => 'plus',
				'anchor' => '',
				'class'  => ''
			), $atts, 'spoiler' );
		$atts['style'] = str_replace( array( '1', '2' ), array( 'default', 'fancy' ), $atts['style'] );
		$atts['anchor'] = ( $atts['anchor'] ) ? ' data-anchor="' . str_replace( array( ' ', '#' ), '', sanitize_text_field( $atts['anchor'] ) ) . '"' : '';
		if ( $atts['open'] !== 'yes' ) $atts['class'] .= ' cherry-spoiler-closed';
		su_query_asset( 'css', 'font-awesome' );
		su_query_asset( 'js', 'jquery' );
		su_query_asset( 'js', 'cherry-shortcodes' );
		do_action( 'su/shortcode/spoiler', $atts );
		return '<div class="cherry-spoiler cherry-spoiler-style-' . $atts['style'] . ' cherry-spoiler-icon-' . $atts['icon'] . su_ecssc( $atts ) . '"' . $atts['anchor'] . '><div class="cherry-spoiler-title"><span class="cherry-spoiler-icon"></span>' . su_scattr( $atts['title'] ) . '</div><div class="cherry-spoiler-content cherry-clearfix" style="display:none">' . su_do_shortcode( $content, 's' ) . '</div></div>';
	}

	public static function accordion( $atts = null, $content = null ) {
		$atts = shortcode_atts( array( 'class' => '' ), $atts, 'accordion' );
		do_action( 'su/shortcode/accordion', $atts );
		return '<div class="cherry-accordion' . su_ecssc( $atts ) . '">' . do_shortcode( $content ) . '</div>';
	}

	public static function google_map( $atts = null, $content = null ) {
		// Parse attributes.
		$atts = shortcode_atts( array(
			'geo_address'		=> '',
			'lat_value'			=> '41.850033',
			'lng_value'			=> '-87.6500523',
			'zoom_value'		=> '4',
			'scroll_wheel'		=> 'no',
			'map_style'			=> 'blue-water',
			'map_height'		=> '400',
			'pan_control'		=> 'yes',
			'zoom_control'		=> 'yes',
			'map_draggable'		=> 'yes',
			'map_marker'		=> '',
			'custom_class'		=> '',
		), $atts, 'google_map' );

		do_action( 'cherry_shortcode_google_map', $atts );

		$random_id        = rand();
		$addr             = sanitize_text_field( $atts['geo_address'] );
		$lat_value        = floatval( $atts['lat_value'] );
		$lng_value        = floatval( $atts['lng_value'] );
		$zoom_value       = floatval( $atts['zoom_value'] );
		$scroll_wheel     = ( bool ) ( $atts['scroll_wheel'] === 'yes' ) ? true : false;
		$map_style        = sanitize_text_field( $atts['map_style'] );
		$custom_class     = sanitize_text_field( $atts['custom_class'] );
		$map_height       = intval( $atts['map_height'] );
		$pan_control      = ( bool ) ( $atts['pan_control'] === 'yes' ) ? true : false;
		$zoom_control     = ( bool ) ( $atts['zoom_control'] === 'yes' ) ? true : false;
		$map_draggable    = ( bool ) ( $atts['map_draggable'] === 'yes' ) ? true : false;
		$map_marker       = sanitize_text_field( $atts['map_marker'] );
		$marker_desc      = do_shortcode( $content );
		$style            = self::get_map_style_json( $map_style );

		if( '' !== $addr ){
			$geo_position = self::google_geocoding( $addr );
			$lat_value    = floatval( $geo_position['lat'] );
			$lng_value    = floatval( $geo_position['lng'] );
		}

		$map_marker_attachment_id = self::get_attachment_id_from_src( $map_marker );
		if( isset($map_marker_attachment_id) ){
			$map_marker = wp_get_attachment_image_src( $map_marker_attachment_id );
			$map_marker = json_encode($map_marker);
		}

		$data_attr_line = '';
			$data_attr_line .= 'data-map-id="google-map-' . $random_id . '"';
			$data_attr_line .= 'data-lat-value="' . $lat_value . '"';
			$data_attr_line .= 'data-lng-value="' . $lng_value . '"';
			$data_attr_line .= 'data-zoom-value="' . $zoom_value . '"';
			$data_attr_line .= 'data-scroll-wheel="' . $scroll_wheel . '"';
			$data_attr_line .= 'data-pan-control="' . $pan_control . '"';
			$data_attr_line .= 'data-zoom-control="' . $zoom_control . '"';
			$data_attr_line .= 'data-map-draggable="' . $map_draggable . '"';
			$data_attr_line .= "data-map-marker='" . $map_marker . "'";
			$data_attr_line .= "data-map-style='" . $style . "'";

		$html = '<div class="google-map-container '.$custom_class.'" style="height:' . $map_height . 'px;" ' . $data_attr_line . '>';
			$html .= '<div id="google-map-' . $random_id . '" class="google-map"></div>';
			$html .= '<div class="marker-desc">' . $marker_desc . '</div>';
		$html .= '</div>';

		su_query_asset( 'js', 'googlemapapis' );
		su_query_asset( 'js', 'google-map' );
		su_query_asset( 'js', 'cherry-shortcodes' );
		do_action( 'su/shortcode/google_map', $atts );
		return $html;
	}

	public static function paralax_image( $atts = null, $content = null ) {
		// Parse attributes.
		$atts = shortcode_atts( array(
			'bg_image'			=> '',
			'speed'				=> '1.5',
			'invert'			=> 'no',
			'custom_class'		=> '',
		), $atts, 'paralax_image' );

		do_action( 'cherry_shortcode_paralax', $atts );

		$bg_image			= sanitize_text_field( $atts['bg_image'] );
		$speed				= floatval( $atts['speed'] );
		$invert				= ( bool ) ( $atts['invert'] === 'yes' ) ? true : false;
		$custom_class		= sanitize_text_field( $atts['bg_image'] );

		if ( !$bg_image ) {
			return;
		}

		$html = '<section class="parallax-box image-parallax-box ' . esc_attr( $custom_class ) . '" >';
			$html .= '<div class="parallax-content">' . do_shortcode( $content ) . '<div class="clear"></div></div>';
			$html .= '<div class="parallax-bg" data-parallax-type="image" data-img-url="'. $bg_image .'" data-speed="' . $speed . '" data-invert="' . $invert . '" ></div>';
		$html .= '</section>';

		su_query_asset( 'js', 'device' );
		su_query_asset( 'js', 'cherry-parallax' );

		do_action( 'su/shortcode/paralax_image', $atts );
		return $html;
	}

	public static function paralax_html_video( $atts = null, $content = null ) {
		// Parse attributes.
		$atts = shortcode_atts( array(
			'poster'			=> '',
			'mp4'				=> '',
			'webm'				=> '',
			'ogv'				=> '',
			'speed'				=> '1.5',
			'invert'			=> 'no',
			'custom_class'		=> '',
		), $atts, 'paralax_html_video' );

		do_action( 'cherry_shortcode_paralax', $atts );

		$poster			= sanitize_text_field( $atts['poster'] );
		$mp4			= sanitize_text_field( $atts['mp4'] );
		$webm			= sanitize_text_field( $atts['webm'] );
		$ogv			= sanitize_text_field( $atts['ogv'] );
		$speed			= floatval( $atts['speed'] );
		$invert			= ( bool ) ( $atts['invert'] === 'yes' ) ? true : false;
		$custom_class	= sanitize_text_field( $atts['bg_image'] );

		if ( !$bg_image ) {
			return;
		}

		$html = '<section class="parallax-box image-parallax-box ' . esc_attr( $custom_class ) . '" >';
			$html .= '<div class="parallax-content">' . do_shortcode( $content ) . '<div class="clear"></div></div>';
			$html .= '<div class="parallax-bg" data-parallax-type="image" data-img-url="'. $bg_image .'" data-speed="' . $speed . '" data-invert="' . $invert . '" ></div>';
		$html .= '</section>';

		su_query_asset( 'js', 'device' );
		su_query_asset( 'js', 'cherry-parallax' );

		do_action( 'su/shortcode/paralax_html_video', $atts );
		return $html;
	}

	public static function get_map_style_json( $map_style ){
		$theme_path       = get_stylesheet_directory().'/assets/googlemap/';
		$plugin_path      = SU_PLUGIN_DIR .'/assets/googlemap/';

		$map_style_path = $theme_path . $map_style . '.json';
		if ( file_exists( $map_style_path ) ) {
			$style = file_get_contents( $map_style_path );
			return $style;
		}

		$map_style_path = $plugin_path . $map_style . '.json';
		if ( file_exists( $map_style_path ) ) {
			$style = file_get_contents( $map_style_path );
			return $style;
		}

		return '';
	}

	public static function google_geocoding( $addr ){
		$cache_key = md5( $addr );

		$return = get_transient( $cache_key );

		if( $return ){
			return $return;
		}

		$url = "http://maps.googleapis.com/maps/api/geocode/json?sensor=false&address=".urlencode($addr);
		$response = wp_remote_get($url);
		if (! $response){
			return false;
		}

		$json_arr = json_decode($response['body'], TRUE);

		if ($json_arr["status"] != "OK")
			return false;

		$result = $json_arr["results"][0];
		$return = array(
			"addr" => $addr,
			"faddr" => $result["formatted_address"],
			"lat" => $result["geometry"]["location"]["lat"],
			"lng" => $result["geometry"]["location"]["lng"]
		);

		set_transient( $cache_key, $return, 10 );
		return $return;
	}

	/**
	 * Get cropped image.
	 *
	 * @since  1.0.0
	 * @param  string|int|int|string|string $args image url, cropped width value, cropped height value, custom class name, image alt name.
	 * @return string(HTML-formatted).
	 */
	public static function get_crop_image( $img_url = '', $width = 100, $height = 100, $custom_class = "", $alt_value="" ) {
		$attachment_id = self::get_attachment_id_from_src( $img_url );

		// check if $attachment_id exist
		if($attachment_id == null){
			return false;
		}

		$image = '';
		//resize & crop img
		$croped_image_url = aq_resize( $img_url, $width, $height, true );
		// get $pathinfo
		$pathinfo = pathinfo( $croped_image_url );
		//get $attachment metadata
		$attachment_metadata = wp_get_attachment_metadata( $attachment_id );
		// create new custom size
		$attachment_metadata['sizes']['croped-image-' . $width . '-' . $height] = array(
			'file'			=> $pathinfo['basename'],
			'width'			=> $width,
			'height'		=> $height,
			'mime-type'		=> get_post_mime_type($attachment_id)
		);
		// wp update attachment metadata
		if( wp_update_attachment_metadata( $attachment_id, $attachment_metadata ) ){

		}
		$ratio_value = $height / $width;
		$image .= '<img class="wp-post-image croped-image ' . $custom_class . '" data-ratio="' . $ratio_value . '" width="' . $width . '" height="' . $height .'" src="' . $croped_image_url . '" alt="'. $alt_value .'">';
		return $image;
	}

	public static function get_attachment_id_from_src ( $image_src ) {
		global $wpdb;
		$query = "SELECT ID FROM {$wpdb->posts} WHERE guid='$image_src'";
		$id = $wpdb->get_var($query);
		return $id;
	}

	/**
	 * Callback-function for `preg_replace_callback`.
	 *
	 * @since  1.0.0
	 * @param  array|null $matches
	 * @return string
	 */
	public static function replace_callback( $matches ) {

		if ( !is_array( $matches ) ) {
			return '';
		}

		if ( empty( $matches ) ) {
			return '';
		}

		$key = strtolower( trim( $matches[0], '%%' ) );
		$pos = strpos( $key, '=' );

		if ( false !== $pos ) {
			$_key = explode( '=', $key );
			$key1 = $_key[0];
			$key2 = trim( $_key[1], '"' );

			if ( !isset( self::$postdata[ $key1 ] ) ) {
				return '';
			}

			if ( is_array( self::$postdata[ $key1 ] ) ) {

				if ( !isset( self::$postdata[ $key1 ][ $key2 ] ) ) {
					return '';
				}
				return self::$postdata[ $key1 ][ $key2 ];
			}

			return self::$postdata[ $key1 ];
		}

		return self::$postdata[ $key ];
	}

	/**
	 * Retrieve a template's file path.
	 *
	 * @since  1.0.0
	 * @param  string $template_name Template's file name.
	 * @param  string $shortcode     Shortcode's name.
	 * @return bool|string           Path to template file.
	 */
	public static function get_template_path( $template_name, $shortcode ) {
		$path       = false;
		$default    = SU_PLUGIN_DIR . 'templates/shortcodes/' . $shortcode . '/default.tmpl';
		$subdir     = 'templates/shortcodes/' . $shortcode . '/' . $template_name;
		$upload_dir = wp_upload_dir();
		$upload_dir = trailingslashit( $upload_dir['basedir'] );

		if ( file_exists( $upload_dir . $subdir ) ) {
			$path = $upload_dir . $subdir;
		} elseif ( file_exists( SU_PLUGIN_DIR . $subdir ) ) {
			$path = SU_PLUGIN_DIR . $subdir;
		} elseif ( file_exists( $default ) ) {
			$path = $default;
		}

		$path = apply_filters( 'cherry_shortcodes_get_template_path', $path, $template_name, $shortcode );

		return $path;
	}
}

new Su_Shortcodes;