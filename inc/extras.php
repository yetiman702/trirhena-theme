<?php
/**
 * Custom functions that act independently of the theme templates
 *
 * Eventually, some of the functionality here could be replaced by core features
 *
 * @package trirhena_theme
 */

/**
 * Get our wp_nav_menu() fallback, wp_page_menu(), to show a home link. And set the 
 * appropriate classes for the div-container.
 *
 * @param array $args Configuration arguments.
 * @return array
 */
function trirhena_theme_page_menu_args( $args ) {
	$args['show_home'] = false;
	$args['menu_class'] = $args['container_class'];
	return $args;
}
add_filter( 'wp_page_menu_args', 'trirhena_theme_page_menu_args' );

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function trirhena_theme_body_classes( $classes ) {
	// Adds a class of group-blog to blogs with more than 1 published author.
	if ( is_multi_author() ) {
		$classes[] = 'group-blog';
	}

	return $classes;
}
add_filter( 'body_class', 'trirhena_theme_body_classes' );

/**
 * Filters wp_title to print a neat <title> tag based on what is being viewed.
 *
 * @param string $title Default title text for current view.
 * @param string $sep Optional separator.
 * @return string The filtered title.
 */
function trirhena_theme_wp_title( $title, $sep ) {
	if ( is_feed() ) {
		return $title;
	}
	
	global $page, $paged;

	// Add the blog name
	$title .= get_bloginfo( 'name', 'display' );

	// Add the blog description for the home/front page.
	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) ) {
		$title .= " $sep $site_description";
	}

	// Add a page number if necessary:
	if ( $paged >= 2 || $page >= 2 ) {
		$title .= " $sep " . sprintf( __( 'Page %s', 'trirhena_theme' ), max( $paged, $page ) );
	}

	return $title;
}
add_filter( 'wp_title', 'trirhena_theme_wp_title', 10, 2 );

/**
 * Sets the authordata global when viewing an author archive.
 *
 * This provides backwards compatibility with
 * http://core.trac.wordpress.org/changeset/25574
 *
 * It removes the need to call the_post() and rewind_posts() in an author
 * template to print information about the author.
 *
 * @global WP_Query $wp_query WordPress Query object.
 * @return void
 */
function trirhena_theme_setup_author() {
	global $wp_query;

	if ( $wp_query->is_author() && isset( $wp_query->post ) ) {
		$GLOBALS['authordata'] = get_userdata( $wp_query->post->post_author );
	}
}
add_action( 'wp', 'trirhena_theme_setup_author' );


/**
 * Detects if the current query is for the landing page, i.e. no specific page is queried.
 *
 * This is neccesary to make the first site displayed differently when it is queried specifically
 * to when it is queried as the first site.
 */
function trirhena_theme_is_landing_page()
{
	return is_front_page();
}

/**
 * A simple Walker_Nav_Menu extension to omit every markup exept the anchor tags
 *
 * Mostly copied and deleted unnecessary parts of Walker_Nav_Menu functions
 *
 */
class Trirhena_Theme_Nav_Link_Walker extends Walker_Nav_Menu {
	function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {
		$indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';

			$atts = array();
			$atts['title']  = ! empty( $item->attr_title ) ? $item->attr_title : '';
			$atts['target'] = ! empty( $item->target )     ? $item->target     : '';
			$atts['rel']    = ! empty( $item->xfn )        ? $item->xfn        : '';
			$atts['href']   = ! empty( $item->url )        ? $item->url        : '';

			/**
			* Filter the HTML attributes applied to a menu item's <a>.
			*
			* @since 3.6.0
			*
			* @see wp_nav_menu()
			*
			* @param array $atts {
			*     The HTML attributes applied to the menu item's <a>, empty strings are ignored.
			*
			*     @type string $title  Title attribute.
			*     @type string $target Target attribute.
			*     @type string $rel    The rel attribute.
			*     @type string $href   The href attribute.
			* }
			* @param object $item The current menu item.
			* @param array  $args An array of wp_nav_menu() arguments.
			*/
			$atts = apply_filters( 'nav_menu_link_attributes', $atts, $item, $args );

			$attributes = '';
			foreach ( $atts as $attr => $value ) {
				if ( ! empty( $value ) ) {
					$value = ( 'href' === $attr ) ? esc_url( $value ) : esc_attr( $value );
					$attributes .= ' ' . $attr . '="' . $value . '"';
				}
			}

			$item_output = $args->before;
			$item_output .= '<a'. $attributes .'>';
			/** This filter is documented in wp-includes/post-template.php */
			$item_output .= $args->link_before . apply_filters( 'the_title', $item->title, $item->ID ) . $args->link_after;
			$item_output .= '</a>';
			$item_output .= $args->after;

			/**
			* Filter a menu item's starting output.
			*
			* The menu item's starting output only includes $args->before, the opening <a>,
			* the menu item's title, the closing </a>, and $args->after. Currently, there is
			* no filter for modifying the opening and closing <li> for a menu item.
			*
			* @since 3.0.0
			*
			* @see wp_nav_menu()
			*
			* @param string $item_output The menu item's starting HTML output.
			* @param object $item        Menu item data object.
			* @param int    $depth       Depth of menu item. Used for padding.
			* @param array  $args        An array of wp_nav_menu() arguments.
			*/
			$output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
		}

	  /**
	   * Ends the element output, if needed.
	   *
	   * @see Walker::end_el()
	   *
	   * @since 3.0.0
	   *
	   * @param string $output Passed by reference. Used to append additional content.
	   * @param object $item   Page data object. Not used.
	   * @param int    $depth  Depth of page. Not Used.
	   * @param array  $args   An array of arguments. @see wp_nav_menu()
	   */
	  function end_el( &$output, $item, $depth = 0, $args = array() ) {
	  	$output .= "\n";
	  }
	}
