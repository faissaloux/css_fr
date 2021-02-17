<?php 




// add_action( 'cmb2_admin_init', 'cmb2_sample_metaboxes' );



function cmb2_sample_metaboxes() {

    
    $cmb = new_cmb2_box( array(
        'id'            => 'test_metabox',
        'title'         => __( 'fiche technique', 'cmb2' ),
        'object_types'  => array( 'products_cpt', ), // Post type
        'context'       => 'normal',
        'priority'      => 'high',
        'show_names'    => true, 
    ) );

    $cmb->add_field( array(
        'name'    => 'fiche technique',
        'desc'    => 'fiche technique description',
        'id'      => 'fiche_technique',
        'type'    => 'wysiwyg',
        'object_types'  => array( 'products_cpt', ),

        'options' => array(
            'wpautop' => true,
            'media_buttons' => true,
            'textarea_name' => $editor_id,
            'textarea_rows' => get_option('default_post_edit_rows', 10),
            'tabindex' => '',
            'editor_css' => '',
            'editor_class' => '',
            'teeny' => false,
            'dfw' => false,
            'tinymce' => true,
            'quicktags' => true
    ) ));


}