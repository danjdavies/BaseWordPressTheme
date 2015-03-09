<?php
/**
 * Twenty Eleven functions and definitions
 *
 * Sets up the theme and provides some helper functions. Some helper functions
 * are used in the theme as custom template tags. Others are attached to action and
 * filter hooks in WordPress to change core functionality.
 *
 * The first function, twentyeleven_setup(), sets up the theme by registering support
 * for various features in WordPress, such as post thumbnails, navigation menus, and the like.
 *
 * When using a child theme (see http://codex.wordpress.org/Theme_Development and
 * http://codex.wordpress.org/Child_Themes), you can override certain functions
 * (those wrapped in a function_exists() call) by defining them first in your child theme's
 * functions.php file. The child theme's functions.php file is included before the parent
 * theme's file, so the child theme functions would be used.
 *
 * Functions that are not pluggable (not wrapped in function_exists()) are instead attached
 * to a filter or action hook. The hook can be removed by using remove_action() or
 * remove_filter() and you can attach your own function to the hook.
 *
 * We can remove the parent theme's hook only after it is attached, which means we need to
 * wait until setting up the child theme:
 *
 * <code>
 * add_action( 'after_setup_theme', 'my_child_theme_setup' );
 * function my_child_theme_setup() {
 *     // We are providing our own filter for excerpt_length (or using the unfiltered value)
 *     remove_filter( 'excerpt_length', 'twentyeleven_excerpt_length' );
 *     ...
 * }
 * </code>
 *
 * For more information on hooks, actions, and filters, see http://codex.wordpress.org/Plugin_API.
 *
 * @package WordPress
 * @subpackage Twenty_Eleven
 * @since Twenty Eleven 1.0
 */

/* Disable the Admin Bar. */
add_filter( 'show_admin_bar', '__return_false' );

function wp_list_categories_remove_title_attributes($output) {
    $output = preg_replace('` title="(.+)"`', '', $output);
    return $output;
}
add_filter('wp_list_categories', 'wp_list_categories_remove_title_attributes');

add_theme_support( 'automatic-feed-links' );

add_theme_support('post-thumbnails');

// Pre-registers some menus ready for use
  register_nav_menus( array(
    'primary' => __( 'Primary Navigation', 'default' ),
    'secondary' => __( 'Secondary Navigation', 'default' ),
    'sectionnav' => __( 'Section Navigation', 'default' ),
    'technicalnav' => __( 'Technical Navigation', 'default' ),
  ) );

  // Filter to hide protected posts
function exclude_protected($where) {
  global $wpdb;
  return $where .= " AND {$wpdb->posts}.post_password = '' ";
}

// Decide where to display them
function exclude_protected_action($query) {
  if( !is_single() && !is_page() && !is_admin() ) {
    add_filter( 'posts_where', 'exclude_protected' );
  }
}

// Widgets

/**
 * Register widgetized areas, including two sidebars and four widget-ready columns in the footer.
 *
 * To override twentyten_widgets_init() in a child theme, remove the action hook and add your own
 * function tied to the init hook.
 *
 * @since Twenty Ten 1.0
 * @uses register_sidebar
 */
function twentyten_widgets_init() {
  // Area 1, located at the top of the sidebar.
  register_sidebar( array(
    'name' => __( 'Primary Widget Area', 'twentyten' ),
    'id' => 'primary-widget-area',
    'description' => __( 'The primary widget area', 'twentyten' ),
    'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
    'after_widget' => '</li>',
    'before_title' => '<h3 class="widget-title">',
    'after_title' => '</h3>',
  ) );

  // Area 2, located below the Primary Widget Area in the sidebar. Empty by default.
  register_sidebar( array(
    'name' => __( 'Secondary Widget Area', 'twentyten' ),
    'id' => 'secondary-widget-area',
    'description' => __( 'The secondary widget area', 'twentyten' ),
    'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
    'after_widget' => '</li>',
    'before_title' => '<h3 class="widget-title">',
    'after_title' => '</h3>',
  ) );

  // Area 3, located in the footer. Empty by default.
  register_sidebar( array(
    'name' => __( 'First Footer Widget Area', 'twentyten' ),
    'id' => 'first-footer-widget-area',
    'description' => __( 'The first footer widget area', 'twentyten' ),
    'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
    'after_widget' => '</li>',
    'before_title' => '<h3 class="widget-title">',
    'after_title' => '</h3>',
  ) );

  // Area 4, located in the footer. Empty by default.
  register_sidebar( array(
    'name' => __( 'Second Footer Widget Area', 'twentyten' ),
    'id' => 'second-footer-widget-area',
    'description' => __( 'The second footer widget area', 'twentyten' ),
    'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
    'after_widget' => '</li>',
    'before_title' => '<h3 class="widget-title">',
    'after_title' => '</h3>',
  ) );

  // Area 5, located in the footer. Empty by default.
  register_sidebar( array(
    'name' => __( 'Third Footer Widget Area', 'twentyten' ),
    'id' => 'third-footer-widget-area',
    'description' => __( 'The third footer widget area', 'twentyten' ),
    'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
    'after_widget' => '</li>',
    'before_title' => '<h3 class="widget-title">',
    'after_title' => '</h3>',
  ) );

  // Area 6, located in the footer. Empty by default.
  register_sidebar( array(
    'name' => __( 'Fourth Footer Widget Area', 'twentyten' ),
    'id' => 'fourth-footer-widget-area',
    'description' => __( 'The fourth footer widget area', 'twentyten' ),
    'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
    'after_widget' => '</li>',
    'before_title' => '<h3 class="widget-title">',
    'after_title' => '</h3>',
  ) );
}
/** Register sidebars by running twentyten_widgets_init() on the widgets_init hook. */
add_action( 'widgets_init', 'twentyten_widgets_init' );

// Action to queue the filter at the right time
add_action('pre_get_posts', 'exclude_protected_action');

add_filter( 'wp_default_scripts', 'remove_jquery_migrate' );

function remove_jquery_migrate( &$scripts)
{
    if(!is_admin())
    {
        $scripts->remove( 'jquery');
        $scripts->add( 'jquery', false, array( 'jquery-core' ), '1.10.2' );
    }
}

// clear default wordpress gallery stuff
add_filter( 'use_default_gallery_style', '__return_false' );


// Custom Post Types

/*function codex_custom_init() {

  register_post_type(
    'nameofcustompost', array(
      'labels' => array('name' => __( 'Custom Posts' ), 'singular_name' => __( 'Custom Post' ) ),
      'public' => true,
      'has_archive' => true,
      'supports' => array('title', 'editor', 'thumbnail')
    )
  );

}
add_action( 'init', 'codex_custom_init' );*/


/*function custom_post_customposts() {

  register_post_type( 'custom-post',
    array('labels' => array(
      'name' => __('Custom Post', 'post type general name'),
      'singular_name' => __('Custom Post', 'post type singular name'),
      'add_new' => __('Add New', 'Custom Post'),
      'add_new_item' => __('Add New Custom Post'),
      'edit' => __( 'Edit' ),
      'edit_item' => __('Edit Custom Post'),
      'new_item' => __('New Custom Post'),
      'view_item' => __('View Custom Post'),
      'search_items' => __('Search Custom Post'),
      'not_found' =>  __('Nothing found in the Database.'),
      'not_found_in_trash' => __('Nothing found in Trash'),
      'parent_item_colon' => ''
      ),
      'description' => __( 'This is the example custom post type' ),
      'public' => true,
      'publicly_queryable' => true,
      'exclude_from_search' => false,
      'show_ui' => true,
      'query_var' => true,
      'rewrite' => array('slug' => 'custom-post'),
      'has_archive' => true,
      'capability_type' => 'post',
      'hierarchical' => true,
      'supports' => array( 'title', 'editor', 'thumbnail', 'comments')
    )
  );
}

  add_action( 'init', 'custom_post_customposts');

    register_taxonomy( 'custom-post-category',
      array('custom-post'),
      array('hierarchical' => true,
        'labels' => array(
          'name' => __( 'Custom Post Categories' ),
          'singular_name' => __( 'Custom Post Category' ),
          'search_items' =>  __( 'Search Custom PostCategories' ),
          'all_items' => __( 'All Custom Post Categories' ),
          'parent_item' => __( 'Parent Custom Post Category' ),
          'parent_item_colon' => __( 'Parent Custom PostCategory:' ),
          'edit_item' => __( 'Edit Custom Post Category' ),
          'update_item' => __( 'Update Custom Post Category' ),
          'add_new_item' => __( 'Add New Custom Post Category' ),
          'new_item_name' => __( 'New Team Custom Post Name' )
        ),
        'show_ui' => true,
        'query_var' => true,
      )
    );*/

?>