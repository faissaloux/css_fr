<?php 

/** 
 * system::product_gallery()
 */
class System
{

    public static function pack_subtitle($id){
        return get_post_meta($id,'pack_settings')[0]['sub_title_pack'];
    }
    

    public static function pack_gallery($id){
        $gallery = get_post_meta($id,'pack_settings')[0]['gallery_pack'];
        $gallery = explode(',', $gallery);
        $images = [];
        if(count($gallery) > 0 ){
            foreach ($gallery as $image) {
                if($image != '' or !empty($image)){
                 $images[] = wp_get_attachment_image_url($image,'full');
                }
            }
        }
        return $images;
    }


    public static function product_gallery($id){
        $gallery = get_post_meta($id,'product_settings')[0]['gallery_product'];
        $gallery = explode(',', $gallery);
        $images = [];
        if(count($gallery) > 0 ){
            foreach ($gallery as $image) {
                if($image != '' or !empty($image)){
                 $images[] = wp_get_attachment_image_url($image,'full');
                }
            }
        }
        return $images;
    }

    public static function product_tech($id){
        $tech = get_post_meta($id,'product_tech')[0]['tech_product'];
        return $tech;
    }
    
    public static function brands(){
        $args = array(
            'numberposts' => -1,
            'post_type'        => 'brands_cpt',
            'post_status'      => 'publish',
            'suppress_filters' => true 
        );
        return get_posts( $args ); 
    }

    public static function accessories(){
        $args = array(
            'numberposts'       => -1,
            'post_type'         => 'accessories_cpt',
            'post_status'       => 'publish',
            'suppress_filters'  => true 
        );
        return get_posts( $args ); 
    }

    public static function prestations(){
        $args = array(
            'numberposts'       => -1,
            'post_type'         => 'prestation_cpt',
            'post_status'       => 'publish',
            'suppress_filters'  => true 
        );
        return get_posts( $args ); 
    }

    public static function get_prestations_image($id){
        $gallery = get_post_meta($id,'prestation_settings')[0]['gallery_prestation'];
        $gallery = explode(',', $gallery);
        $images = [];
        if(count($gallery) > 0 ){
            foreach ($gallery as $image) {
                if($image != '' or !empty($image)){
                 $images[] = wp_get_attachment_image_url($image,'full');
                }
            }
        }
        return $images;
    }

    public static function packs($id){
        $pack = get_post_meta($id,'product_settings')[0]['pack_products'];
        return $pack;
    }

    public static function packs_options(){
        return get_post_meta ('product_settings' )[0]; 
    }

    public static function prestations_options($id){
        return get_post_meta ($id, 'prestation_settings' )[0];
    }

    public static function accessory_options($id){
        return get_post_meta ($id, 'accessory_settings' )[0]; 
    }

    public static function get_accessory_image($id){
        return wp_get_attachment_image_src ($id ,'full')[0]; 
    }

    public static function products($cat_id = false){
        $query_args = array(  'posts_per_page' => '-1', 'post_type' => 'products_cpt' );

        if(!is_null($cat_id)){
            $query_args['offset'] = 0;
            $query_args['cat'] = $cat_id;
        }

        $results = new WP_Query( $query_args );
        $results = $results->posts;

        $return = [];

        foreach ($results as $item) {

            $gallery = get_post_meta($item->ID,'product_settings')[0]['gallery'];
            $gallery = explode(',', $gallery);

            $images = [];
            if(count($gallery) > 0 ){
                foreach ($gallery as $image) {
                    if($image != '' or !empty($image)){
                     $images[] = wp_get_attachment_image_url($image,'full');
                    }
                }
            }
           
            $thumbnail = get_the_post_thumbnail_url($item->ID);
            $link = get_permalink($item->ID);

            $fiche_technique = get_post_meta($item->ID,'fiche_technique')[0];

            $categories = get_the_category($item->ID); 
            $cat_name = $categories[0]->cat_name;

            
            $data = [
                'id' => $item->ID,
                'image' => $thumbnail,
                'title' => $item->post_title,
                'link'  => $link,
                'content'  => $item->post_content,
                'gallery'  => $images,
                'fiche_technique' => $fiche_technique,
                'category' => $cat_name
            ];
            
            $return[] = $data;
        }

        return $return;
    }



    public static function product_categories(){
         $args = array(
               'taxonomy' => 'category',
                'hide_empty'               => 0,
                'hierarchical'             => 1,
               'post_type' => 'products_cpt',
           );

         $cats = get_categories($args);

         $return = [];

         foreach ($cats as $cat) {
            $item = [
                'term_id' => $cat->term_id,
                'name' => $cat->name,
                'slug' => $cat->slug,
                'cat_ID' => $cat->cat_ID,
            ];
            $return[] = $item;
         }
         return $return;
    }

    public static function packs_production_categories(){
        $args = array(
              'taxonomy' => 'pack_categories',
               'hide_empty'               => 0,
               'hierarchical'             => 1,
              'post_type' => 'pack_cpt',
          );

        $cats = get_categories($args);

        $return = [];

        foreach ($cats as $cat) {
           $item = [
               'term_id' => $cat->term_id,
               'name' => $cat->name,
               'slug' => $cat->slug,
               'cat_ID' => $cat->cat_ID,
           ];
           $return[] = $item;
        }
        return $return;
   }


    public static function brand_options($id){
        return get_post_meta ($id, 'brand_settings' )[0]; 
    }

    public static function get_brand_image($id){
        return wp_get_attachment_image_src ($id ,'full')[0]; 
    }


    public static function sliders(){
        $args = array(
            'numberposts' => 6,
            'post_type'        => 'slider_cpt',
            'post_status'      => 'publish',
            'suppress_filters' => true 
        );
        return get_posts( $args ); 
    }


    public static function slider_options($id){
        return get_post_meta ($id, 'slider_settings' )[0]; 
    }




}
