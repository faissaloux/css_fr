<?php



add_action( 'init', 'cptbc_post_type' );
function cptbc_post_type() {
    $labels = array(
        'name' => __('Brand Images', 'cpt-bootstrap-carousel'),
        'singular_name' => __('Brand Image', 'cpt-bootstrap-carousel'),
        'add_new' => __('Add New', 'cpt-bootstrap-carousel'),
        'add_new_item' => __('Add New Brand Image', 'cpt-bootstrap-carousel'),
        'edit_item' => __('Edit Brand Image', 'cpt-bootstrap-carousel'),
        'new_item' => __('New Brand Image', 'cpt-bootstrap-carousel'),
        'view_item' => __('View Brand Image', 'cpt-bootstrap-carousel'),
        'search_items' => __('Search Brand Images', 'cpt-bootstrap-carousel'),
        'not_found' => __('No Brand Image', 'cpt-bootstrap-carousel'),
        'not_found_in_trash' => __('No Brand Images found in Trash', 'cpt-bootstrap-carousel'),
        'parent_item_colon' => '',
        'menu_name' => __('Brands', 'cpt-bootstrap-carousel')
    );
    $args = array(
        'labels' => $labels,
        'public' => true,
        'exclude_from_search' => true,
        'publicly_queryable' => false,
        'show_ui' => true,
        'show_in_menu' => true,
        'query_var' => true,
        'rewrite' => true,
        'capability_type' => 'page',
        'has_archive' => true,
        'hierarchical' => false,
        'menu_position' => 21,
        'menu_icon' => 'dashicons-schedule',
        'supports' => array('title')
    );
    register_post_type('brands_cpt', $args);
}
