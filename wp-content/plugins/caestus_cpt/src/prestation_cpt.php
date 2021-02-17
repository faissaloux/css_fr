<?php

function register_prestation() {

    $labels = array(
        'name' => __('Prestations', 'cpt-bootstrap-carousel'),
        'singular_name' => __('Prestation', 'cpt-bootstrap-carousel'),
        'add_new' => __('Add New', 'cpt-bootstrap-carousel'),
        'add_new_item' => __('Add New prestation', 'cpt-bootstrap-carousel'),
        'edit_item' => __('Edit prestation', 'cpt-bootstrap-carousel'),
        'new_item' => __('New prestation', 'cpt-bootstrap-carousel'),
        'view_item' => __('View prestation', 'cpt-bootstrap-carousel'),
        'search_items' => __('Search prestation', 'cpt-bootstrap-carousel'),
        'not_found' => __('No prestation', 'cpt-bootstrap-carousel'),
        'not_found_in_trash' => __('No prestation found in Trash', 'cpt-bootstrap-carousel'),
        'parent_item_colon' => '',
        'menu_name' => __('Prestations', 'cpt-bootstrap-carousel')
    );
    $args = array(
        'label'                 => $labels,
        'labels'                => $labels,
        'hierarchical'          => false,
        'public'                => true,
        'show_ui'               => true,
        'show_in_menu'          => true,
        'menu_position'         => 8,
        'show_in_admin_bar'     => true,
        'show_in_nav_menus'     => true,
        'can_export'            => true,
        'has_archive'           => true,
        'exclude_from_search'   => false,
        'publicly_queryable'    => true,
        'capability_type'       => 'post',
        'supports'              => ['title',
                                    'editor',
                                    'thumbnail'] ,
                                    
);
register_post_type( 'prestation_cpt', $args );
} add_action( 'init', 'register_prestation', 0 );


