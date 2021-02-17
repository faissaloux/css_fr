<?php if ( ! defined( 'ABSPATH' ) ) { die; } // Cannot access pages directly.
// ===============================================================================================
// -----------------------------------------------------------------------------------------------
// METABOX OPTIONS
// -----------------------------------------------------------------------------------------------
// ===============================================================================================
$options      = array();


// -----------------------------------------
// Brands Metabox Options               -
// -----------------------------------------
$options[]    = array(
  'id'        => 'brand_settings',
  'title'     => 'brand settings',
  'post_type' => 'brands_cpt',
  'context'   => 'normal',
  'priority'  => 'default',
  'sections'  => array(

    array(
      'name'   => 'section_3',
      'fields' => array(

        array(
          'title'     => 'choisir le logo de brand',
          'id'        => 'brand',
          'type'      => 'image',
        ),

        array(
          'id'            => 'brand_lien',
          'type'          => 'text',
          'title'         => 'lien de brand',
          'attributes'    => array(
            'placeholder' => 'le lien du brand'
          )
        ),

      ),
    ),

  ),
);


$options[]    = array(
  'id'        => 'accessory_settings',
  'title'     => 'accessory settings',
  'post_type' => 'accessories_cpt',
  'context'   => 'normal',
  'priority'  => 'default',
  'sections'  => array(

    array(
      'name'   => 'section_6',
      'fields' => array(

        array(
          'title'     => 'choisir l\'image d\'accessoire',
          'id'        => 'accessory',
          'type'      => 'image',
        ),

        array(
          'id'            => 'accessory_link',
          'type'          => 'text',
          'title'         => 'lien d\'accessoire',
          'attributes'    => array(
            'placeholder' => 'le lien d\'accessoire'
          )
        ),

      ),
    ),

  ),
);



$options[]    = array(
  'id'        => 'pack_settings',
  'title'     => 'pack elements',
  'post_type' => 'pack_cpt',
  'context'   => 'normal',
  'priority'  => 'default',
  'sections'  => array(

    array(
      'name'   => 'section_3',
      'fields' => array(
        array(
          'title'     => 'choisir les images de gallery',
          'id'        => 'gallery_pack',
          'type'      => 'gallery',
        ),
        array(
          'title'     => "sub title",
          'id'        => 'sub_title_pack',
          'type'      => 'text',
        ),
       

      ),
    ),

  ),
);

$packsCategories = get_terms( array(
  'taxonomy'  => 'pack_categories', 
  'order'     => 'DESC'
));

$select = [];
$select[null] = 'Pas de pack'; 
foreach($packsCategories as $item){
  $select[$item->term_id] = $item->name; 
}

$options[]    = array(
  'id'        => 'product_tech',
  'title'     => 'fiche technique du produit',
  'post_type' => 'products_cpt',
  'context'   => 'normal',
  'priority'  => 'default',
  'sections'  => array(

    array(
      'name'   => 'section_4',
      'fields' => array(

        array(
          'title'     => 'La fiche technique du produit',
          'id'        => 'tech_product',
          'type'      => 'wysiwyg',
        ),

      ),
    ),

  ),
);

$options[]    = array(
  'id'        => 'product_settings',
  'title'     => 'gallery de produit',
  'post_type' => 'products_cpt',
  'context'   => 'normal',
  'priority'  => 'default',
  'sections'  => array(

    array(
      'name'   => 'section_3',
      'fields' => array(

        array(
          'title'     => 'choisir les images de gallery',
          'id'        => 'gallery_product',
          'type'      => 'gallery',
        ),




        array(
          'title'     => 'choisir le pack a afficher ',
          'id'        => 'pack_products',
          'type'      => 'select',
          'options'     => $select

        ),

       


      ),
    ),

  ),
);


$options[]    = array(
  'id'        => 'prestation_settings',
  'title'     => 'prestation elements',
  'post_type' => 'prestation_cpt',
  'context'   => 'normal',
  'priority'  => 'default',
  'sections'  => array(

    array(
      'name'   => 'section_8',
      'fields' => array(
        array(
          'title'     => 'choisir les images de gallery',
          'id'        => 'gallery_prestation',
          'type'      => 'gallery',
        ),

      ),
    ),

  ),
);



CSFramework_Metabox::instance( $options );
