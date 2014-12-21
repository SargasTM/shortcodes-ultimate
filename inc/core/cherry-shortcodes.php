<?php
class Su_Shortcodes {
	static $tabs = array();
	static $tab_count = 0;

	public static $foo = array();

	function __construct() {}

	public static function row( $atts = null, $content = null ) {
		$atts = shortcode_atts( array(
			'type'  => 'fixed-width',
			'class' => '',
		), $atts, 'row' );

		do_action( 'cherry_shortcode_row', $atts );

		$container = ( $atts['type'] === 'fixed-width' ) ? 'container' : 'container-fluid';
		$output    = '<div class="' . esc_attr( $container ) . su_ecssc( $atts ) . '"><div class="row">' . do_shortcode( $content ) . '</div></div>';
		$output    = apply_filters( 'cherry_shortcode_output_row', $output, $atts );

		return $output;
	}

	public static function row_inner( $atts = null, $content = null ) {
		$atts = shortcode_atts( array(
			'class' => '',
		), $atts, 'row_inner' );

		do_action( 'cherry_shortcode_row_inner', $atts );

		$output = '<div class="row' . su_ecssc( $atts ) . '">' . do_shortcode( $content ) . '</div>';
		$output = apply_filters( 'cherry_shortcode_output_row_inner', $output, $atts );

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
		), $atts, 'column' );

		do_action( 'cherry_shortcode_col', $atts );

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
		$class .= ( $atts['class'] === '' )         ? '' : ' ' . $atts['class'];

		$output = '<div class="' . trim( esc_attr( $class ) ) . '">' . do_shortcode( $content ) . '</div>';
		$output = apply_filters( 'cherry_shortcode_output_col', $output, $atts );

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
		), $atts, 'column' );

		do_action( 'cherry_shortcode_col_inner', $atts );

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
		$class .= ( $atts['class'] === '' )         ? '' : ' ' . $atts['class'];

		$output = '<div class="' . trim( esc_attr( $class ) ) . '">' . do_shortcode( $content ) . '</div>';
		$output = apply_filters( 'cherry_shortcode_output_col_inner', $output, $atts );

		return $output;
	}

	public static function posts( $atts = null, $content = null ) {
		static $instance = 0, $tax = null;
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
				'ignore_sticky_posts' => 'no',
				'linked_title'        => 'yes',
				'linked_image'        => 'yes',
				'content_type'        => 'part',
				'content_length'      => 55,
				'button_text'         => __( 'read more', 'tm' ),
				'col_xs'              => '12',
				'col_sm'              => '6',
				'col_md'              => '3',
				'col_lg'              => 'none',
				'class'               => '',
				'template'            => 'default.tmpl',
			), $atts, 'posts' );

		do_action( 'cherry_shortcode_posts', $atts );

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
		$template_atts       = sanitize_file_name( $atts['template'] );

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
				&& !empty( $original_atts['tax_' . $count . '_term'] ) ) {

				// Sanitize values.
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

			// Item template.
			// $template = self::get_template_by_name( $template_atts, 'posts' );

			// if ( ( false === $template ) || is_wp_error( $template ) ) {

				$template = '
					<figure class="post-thumbnail">%%IMAGE%%</figure>
					<h4 class="post-title">%%TITLE%%</h4>
					<div class="post-meta">
						Posted on %%DATE%% by %%AUTHOR%% %%COMMENTS%% %%TAXONOMY="category"%%
					</div>
					%%EXCERPT%%
					%%CONTENT%%
					%%BUTTON="btn"%%
					<footer>%%TAXONOMY="post_tag"%%</footer>
					';

				/**
				 * Filters a fallback template.
				 *
				 * @since  1.0.0
				 * @param  string $template  Template's file name.
				 * @var    string $shortcode Shortcode's name.
				 */
				// $template = apply_filters( "cherry_shortcode_posts_fallback_template", $template );
			// }

			$_foo = array();

			while ( $posts_query->have_posts() ) :
				$posts_query->the_post();

				// Prepare a data.
				$tpl        = $template;
				$post_id    = get_the_ID();
				$post_type  = get_post_type( $post_id );
				$permalink  = get_permalink();
				$title_text = get_the_title();
				$title_attr = the_title_attribute( array( 'echo' => false ) );
				$date       = get_the_date();
				$author     = get_the_author();
				$author_url = get_author_posts_url( get_the_author_meta( 'ID' ) );
				$_content   = get_the_content( '' );
				$excerpt    = $thumbnail = $comments = '';
				$taxonomy   = $tax_data = array();

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

				// Taxonomy.
				if ( null === $tax ) {
					preg_match_all( '/TAXONOMY=".+?"/', $tpl, $match, PREG_SET_ORDER );

					if ( is_array( $match ) && !empty( $match ) ) {

						$tax = array();
						foreach ( $match as $m ) {
							$_atts = shortcode_parse_atts( $m[0] );
							$tax[] = $_atts['taxonomy'];
						}
					}
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
				$title_text = apply_filters( 'cherry_shortcodes_title_text', $title_text, $post_id, $atts, 'posts' );
				$title_attr = apply_filters( 'cherry_shortcodes_title_attr', $title_attr, $post_id, $atts, 'posts' );
				$thumbnail  = apply_filters( 'cherry_shortcodes_thumbnail',  $thumbnail,  $post_id, $atts, 'posts' );
				$comments   = apply_filters( 'cherry_shortcodes_comments',   $comments,   $post_id, $atts, 'posts' );
				$tax_data   = apply_filters( 'cherry_shortcodes_taxonomy',   $tax_data,   $post_id, $atts, 'posts' );
				$date       = apply_filters( 'cherry_shortcodes_date',       $date,       $post_id, $atts, 'posts' );
				$author     = apply_filters( 'cherry_shortcodes_author',     $author,     $post_id, $atts, 'posts' );
				$excerpt    = apply_filters( 'cherry_shortcodes_excerpt',    $excerpt,    $post_id, $atts, 'posts' );
				$content    = apply_filters( 'cherry_shortcodes_content',    $content,    $post_id, $atts, 'posts' );
				$permalink  = apply_filters( 'cherry_shortcodes_permalink',  $permalink,  $post_id, $atts, 'posts' );

				// Gets a formatted data.
				$title = $image = '';

				if ( !empty( $title_text ) ) {
					$title = ( $linked_title ) ? sprintf( '<a href="%1$s" title="%2$s" class="%3$s">%4$s</a>', esc_url( $permalink ), esc_attr( $title_attr ), 'post-title-link', esc_attr( $title_text ) ) : sprintf( '%s', esc_attr( $title_text ) );
				}

				if ( !empty( $thumbnail ) ) {
					$image = ( $linked_image ) ? sprintf( '<a href="%1$s" title="%2$s" class="%3$s">%4$s</a>', esc_url( $permalink ), esc_attr( $title_attr ), 'post-thumbnail', $thumbnail ) : sprintf( '%s', $thumbnail );
				}

				$comments = ( !empty( $comments ) ) ? sprintf( '<span class="post-comments-link"><a href="%1$s">%2$s</a></span>', esc_url( get_comments_link() ), $comments ) : '';
				$date     = sprintf( '<time class="post-date" datetime="%1$s">%2$s</time>', esc_attr( get_the_date( 'c' ) ), esc_html( $date ) );
				$author   = sprintf( '<span class="post-author vcard"><a href="%1$s" rel="author">%2$s</a></span>', esc_url( $author_url ), $author );
				$excerpt  = ( !empty( $excerpt ) ) ? sprintf( '<div class="post-excerpt">%s</div>', $excerpt ) : '';
				$content  = ( !empty( $content ) ) ? sprintf( '<div class="post-content">%s</div>', $content ) : '';
				$button   = ( $button_text ) ? sprintf( '<a href="%1$s" class="%2$s">%3$s</a>', esc_url( $permalink ), 'btn btn-default', esc_html__( $button_text, 'tm' ) ) : '';

				if ( $tax ) {
					foreach ( $tax_data as $name => $data ) {
						$taxonomy[ $name ] = sprintf( '<span class="post-tax post-tax-%1$s">%2$s</span>', sanitize_html_class( $name ), join( ' ', $data ) );
					}
				}

				// Prepare array.
				$_foo['title']    = $title;
				$_foo['image']    = $image;
				$_foo['comments'] = $comments;
				$_foo['taxonomy'] = $taxonomy;
				$_foo['date']     = $date;
				$_foo['author']   = $author;
				$_foo['excerpt']  = $excerpt;
				$_foo['content']  = $content;
				$_foo['button']   = $button;

				/**
				 * Filters
				 *
				 * @since 1.0.0
				 * @param array  [varname]  [description]
				 * @param int    $post_id   Post ID.
				 * @param array  $atts      Shortcode attributes.
				 */
				$_foo = apply_filters( 'cherry-shortcode-posts-foo', $_foo, $post_id, $atts );

				// Init a `foo` array.
				self::$foo = $_foo;

				// Perform a regular expression.
				$tpl = preg_replace_callback( "/%%.+?%%/", array( 'Su_Shortcodes', 'replace_callback' ), $tpl );

				// Prepare the CSS classes for item's.
				$item_classes   = array();
				$item_classes[] = 'cherry-posts-item';
				$item_classes[] = $post_type . '-item';
				$item_classes[] = 'item-' . $posts_query->current_post;
				$item_classes[] = ( $posts_query->current_post % 2 ) ? 'even' : 'odd';
				$item_classes['clearfix'] = 'clearfix';

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

				/**
				 * Filters the HTML-wrap with item's content.
				 *
				 * @since 1.0.0
				 * @param string $item         HTML-formatted item's wrapper.
				 * @param int    $current_post Index of the post currently being displayed.
				 * @param array  $atts         Shortcode attributes.
				 * @param int    $post_id      Post ID.
				 */
				$item = apply_filters( 'cherry_shortcode_posts_item', '<div class="%1$s">%2$s</div>', $posts_query->current_post, $atts, $post_id );

				$output .= sprintf( $item, join( ' ', $item_classes ), $tpl );
				$output .= '<!--/.cherry-posts-item-->';

			endwhile;

			// Prepare the CSS classes for list.
			$wrap_classes   = array();
			$wrap_classes[] = 'cherry-posts-list';
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

			/**
			 * Filters the HTML-wrap with list content.
			 *
			 * @since 1.0.0
			 * @param string $wrap HTML-formatted list wrapper.
			 * @param array  $atts Shortcode attributes.
			 */
			$wrap = apply_filters( 'cherry_shortcode_posts_list', '<div id="cherry-posts-list-%1$d" class="%2$s">%3$s</div>', $atts );

			$output = sprintf( $wrap, $instance, join( ' ', $wrap_classes ), $output );
			$output .= '<!--/.cherry-posts-list-->';

		} else {
			echo '<h4>' . __( 'Posts not found', 'su' ) . '</h4>';
		}

		// Reset the query.
		wp_reset_postdata();

		// Reset the `foo`.
		self::reset_foo();

		// Add asset.
		// su_query_asset( 'css', 'su-other-shortcodes' );

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

	public static function replace_callback( $matches ) {

		if ( empty( $matches ) ) {
			return '';
		}

		$key = strtolower( trim( $matches[0], '%%' ) );
		$pos = strpos( $key, '=' );

		if ( false !== $pos ) {
			$_key = explode( '=', $key );
			$key1 = $_key[0];
			$key2 = trim( $_key[1], '"' );

			if ( !isset( self::$foo[ $key1 ] ) ) {
				return '';
			}

			if ( is_array( self::$foo[ $key1 ] ) ) {

				if ( !isset( self::$foo[ $key1 ][ $key2 ] ) ) {
					return '';
				}
				return self::$foo[ $key1 ][ $key2 ];
			}

			return self::$foo[ $key1 ];
		}

		return self::$foo[ $key ];
	}

	public static function reset_foo() {
		self::$foo = array();
	}

	/**
	 * Retrieve a template's file content.
	 *
	 * @since  1.0.0
	 * @param  string $template_name  Template's file name.
	 * @param  string $shortcode      Shortcode's name.
	 * @return string                 Template's content.
	 */
	public static function get_template_by_name( $template_name, $shortcode ) {
		$file    = $content = false;
		$subdir  = 'templates/shortcodes/' . $shortcode . '/' . $template_name;
		$default = SU_PLUGIN_DIR . 'templates/shortcodes/' . $shortcode . '/default.tmpl';

		if ( file_exists( trailingslashit( get_stylesheet_directory() ) . $subdir ) ) {
			$file = trailingslashit( get_stylesheet_directory() ) . $subdir;
		} elseif ( file_exists( SU_PLUGIN_DIR . $subdir ) ) {
			$file = SU_PLUGIN_DIR . $subdir;
		} else {
			$file = $default;
		}

		if ( $file ) {
			$content = self::get_contents( $file );
		}

		return $content;
	}

	/**
	 * Read template.
	 *
	 * @since  1.0.0
	 * @param  string               $file Template's file name.
	 * @return bool|WP_Error|string       false on failure, stored text on success.
	 */
	public static function get_contents( $file ) {

		if ( !function_exists( 'WP_Filesystem' ) ) {
			include_once( ABSPATH . '/wp-admin/includes/file.php' );
		}

		WP_Filesystem();
		global $wp_filesystem;

		if ( !$wp_filesystem->exists( $file ) ) { // Check for existence.
			return false;
		}

		// Read the file.
		$content = $wp_filesystem->get_contents( $file );

		if ( !$content ) {
			return new WP_Error( 'reading_error', 'Error when reading file' ); // Return error object.
		}

		return $content;
	}

}

new Su_Shortcodes;

class Shortcodes_Ultimate_Shortcodes extends Su_Shortcodes {
	function __construct() {
		parent::__construct();
	}
}