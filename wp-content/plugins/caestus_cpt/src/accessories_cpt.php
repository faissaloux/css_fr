<?php

add_action( 'init', 'accessories_post_type' );
function accessories_post_type() {
    $labels = array(
        'name' => __('Accessories', 'cpt-bootstrap-carousel'),
        'singular_name' => __('Accessory', 'cpt-bootstrap-carousel'),
        'add_new' => __('Add New', 'cpt-bootstrap-carousel'),
        'add_new_item' => __('Add New Accessory', 'cpt-bootstrap-carousel'),
        'edit_item' => __('Edit Accessory', 'cpt-bootstrap-carousel'),
        'new_item' => __('New Accessory', 'cpt-bootstrap-carousel'),
        'view_item' => __('View Accessory', 'cpt-bootstrap-carousel'),
        'search_items' => __('Search Accessory', 'cpt-bootstrap-carousel'),
        'not_found' => __('No Accessory', 'cpt-bootstrap-carousel'),
        'not_found_in_trash' => __('No Accessory found in Trash', 'cpt-bootstrap-carousel'),
        'parent_item_colon' => '',
        'menu_name' => __('Accessories', 'cpt-bootstrap-carousel')
    );
    $args = array(
        'labels'                => $labels,
        'public'                => true,
        'exclude_from_search'   => true,
        'publicly_queryable'    => false,
        'show_ui'               => true,
        'show_in_menu'          => true,
        'query_var'             => true,
        'rewrite'               => true,
        'capability_type'       => 'page',
        'has_archive'           => true,
        'hierarchical'          => false,
        'menu_position'         => 21,
        'menu_icon'             => 'dashicons-schedule',
        'supports'              => array('title')
    );
    register_post_type('accessories_cpt', $args);
}
