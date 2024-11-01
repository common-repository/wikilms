<?php

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly  

/**
 * Register custom post type
 *
 * @link       https://wikilms.com
 * @since      1.0.0
 *
 * @package    Wikilms
 * @subpackage Wikilms/includes
 */

/**
 * Register all actions and filters for the plugin.
 *
 * Maintain a list of all hooks that are registered throughout
 * the plugin, and register them with the WordPress API. Call the
 * run function to execute the list of actions and filters.
 *
 * @package    Wikilms
 * @subpackage Wikilms/includes
 * @author     Devthrow <wikilms@gmail.com>
 */
/**
 *
 * CPT "Course"
 *
 */
class Wikilms_CPT_Course {

    /**
     * Custom Post Type slug.
     * @var string
     */
    private $post_type = 'wl-courses';

    /**
     * Custom taxonomy - category - for post type
     * @var string
     */
    private $taxonomy = 'wl-courses-category';

    /**
     * Instance of class.
     * @var null|Wikilms_CPT_Course
     */
    private static $instance;

    /**
     * Initialization
     *
     * @return Wikilms_CPT_Course
     */
    public static function init() {
        if ( null === self::$instance ) {
            self::$instance = new self;
        }

        return self::$instance;
    }

    private function __construct() {
        add_action( 'init', array( $this, 'register_post_type' ), 0 );
        add_action( 'init', array( $this, 'register_taxonomy' ), 0 );

    }

    public function register_post_type() {
        $labels = array(
            'name'                  => _x( 'Courses', 'Post Type General Name', 'wikilms' ),
            'singular_name'         => _x( 'Course', 'Post Type Singular Name', 'wikilms' ),
            'menu_name'             => __( 'WikiLMS', 'wikilms' ),
            'name_admin_bar'        => __( 'Course', 'wikilms' ),
            'archives'              => __( 'Course Archives', 'wikilms' ),
            'parent_item_colon'     => __( 'Parent Course:', 'wikilms' ),
            'all_items'             => __( 'All Course', 'wikilms' ),
            'add_new_item'          => __( 'Add New Course', 'wikilms' ),
            'add_new'               => __( 'Add New', 'wikilms' ),
            'new_item'              => __( 'New Course', 'wikilms' ),
            'edit_item'             => __( 'Edit Course', 'wikilms' ),
            'update_item'           => __( 'Update Course', 'wikilms' ),
            'view_item'             => __( 'View Course', 'wikilms' ),
            'search_items'          => __( 'Search Course', 'wikilms' ),
            'not_found'             => __( 'Not found', 'wikilms' ),
            'not_found_in_trash'    => __( 'Not found in Trash', 'wikilms' ),
            'featured_image'        => __( 'Featured Image', 'wikilms' ),
            'set_featured_image'    => __( 'Set featured image', 'wikilms' ),
            'remove_featured_image' => __( 'Remove featured image', 'wikilms' ),
            'use_featured_image'    => __( 'Use as featured image', 'wikilms' ),
            'insert_into_item'      => __( 'Insert into course', 'wikilms' ),
            'uploaded_to_this_item' => __( 'Uploaded to this course', 'wikilms' ),
            'items_list'            => __( 'Course list', 'wikilms' ),
            'items_list_navigation' => __( 'Course list navigation', 'wikilms' ),
            'filter_items_list'     => __( 'Filter course list', 'wikilms' ),
        );
        $args = array(
            'label'                 => __( 'Course ', 'wikilms' ),
            'description'           => __( 'Add and manage course information', 'wikilms' ),
            'labels'                => $labels,
            'supports'              => array( 'title', 'editor', 'thumbnail', 'excerpt' ),
            'taxonomies'            => array( ),
            'hierarchical'          => false,
            'public'                => true,
            'show_ui'               => true,
            'show_in_menu'          => true,
            'menu_position'         => 25,
            'menu_icon'             => 'dashicons-welcome-learn-more',
            'show_in_admin_bar'     => true,
            'show_in_nav_menus'     => true,
            'can_export'            => true,
            'has_archive'           => true,
            'exclude_from_search'   => false,
            'publicly_queryable'    => true,
            'capability_type'       => 'page',
            'rewrite'               => array( 'slug' => 'wl-courses' ),
        );

        register_post_type( $this->post_type, $args );
    }

    /**
     *
     * Register Taxonomy
     *
     */

    public function register_taxonomy() {
        $labels = array(
            'name'                       => _x( 'Categories', 'Taxonomy General Name', 'wikilms' ),
            'singular_name'              => _x( 'Category', 'Taxonomy Singular Name', 'wikilms' ),
            'menu_name'                  => __( 'Categories', 'wikilms' ),
            'all_items'                  => __( 'All Items', 'wikilms' ),
            'parent_item'                => __( 'Parent Item', 'wikilms' ),
            'parent_item_colon'          => __( 'Parent Item:', 'wikilms' ),
            'new_item_name'              => __( 'New Item Name', 'wikilms' ),
            'add_new_item'               => __( 'Add New', 'wikilms' ),
            'edit_item'                  => __( 'Edit', 'wikilms' ),
            'update_item'                => __( 'Update', 'wikilms' ),
            'separate_items_with_commas' => __( 'Separate with commas', 'wikilms' ),
            'search_items'               => __( 'Search', 'wikilms' ),
            'add_or_remove_items'        => __( 'Add or remove items', 'wikilms' ),
            'choose_from_most_used'      => __( 'Choose from the most used items', 'wikilms' ),
            'not_found'                  => __( 'Not Found', 'wikilms' )
        );
        $args = array(
            'labels'                     => $labels,
            'hierarchical'               => true,
            'public'                     => true,
            'show_ui'                    => true,
            'show_admin_column'          => true,
            'show_in_nav_menus'          => true,
            'show_tagcloud'              => true,
            'rewrite'                    => array( 'slug' => 'wl-courses-category' ),
        );

        register_taxonomy( $this->taxonomy, $this->post_type, $args );
    }


}

Wikilms_CPT_Course::init();
