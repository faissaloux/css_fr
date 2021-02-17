<?php 

function brands(){
	$result = [];
	$brands = System::brands();
	foreach ($brands as $brand) : 
	$options = System::brand_options($brand->ID);
	$image   = System::get_brand_image($options['brand']);
	$link    = $options['brand_lien'];
	
	$item = [
		'title' => $brand->post_title,
		'image' => $image,
		'url'	=> $link,
	];
	$result[] = $item;
	endforeach;
	return $result;
}

function accessories(){
	$result = [];
	$accessories = System::accessories();
	foreach ($accessories as $accessory) : 
		$options = System::accessory_options($accessory->ID);
		$image   = System::get_accessory_image($options['accessory']);
		$link    = $options['accessory_link'];
		
		$item = [
			'title' => $accessory->post_title,
			'image' => $image,
			'url'	=> $link,
		];
		$result[] = $item;
	endforeach;
	return $result;
}

function prestations(){
	$result = [];
	$prestations = System::prestations();
	foreach ($prestations as $prestation) :
		$thumbnail	= get_the_post_thumbnail_url($prestation->ID);
		$gallery   	= System::get_prestations_image($prestation->ID);
		$link    	= get_permalink($prestation->ID);
		
		$item = [
			'title' 	=> $prestation->post_title,
			'thumbnail'	=> $thumbnail,
			'gallery' 	=> $gallery,
			'url'		=> $link,
		];
		
		$result[] = $item;
	endforeach;
	return $result;
}


function caestus_products($cat_id = false ) {
	return System::products($cat_id);
}



function ajax_products_search($query,$type = false){
	$result = (new caestus_search($query))->result; 
	return ($type == 'json') ? json_encode($result) : $result;
}


function top_header_menu_bootstrap4(){
	   wp_nav_menu([
	     'menu'            => 'nav-bar',
	     'theme_location'  => 'top',
	     'container'       => 'div',
	     'container_id'    => 'bs4navbar',
		 'container_class' => 'collapse navbar-collapse justify-content-center',
	     'menu_id'         => false,
	     'menu_class'      => 'navbar-nav col-sm-12 col-lg-8 col d-flex justify-content-between',
	     'depth'           => 3,
	     'fallback_cb'     => 'bs4navwalker::fallback',
	     'walker'          => new bs4navwalker()
	   ]);
}

function register_my_menus() {
    register_nav_menus(
      array(
		'top' 	=> __( 'Top Menu' ),
		'phone' => __( 'Phone Menu' )
       )
    );
}
add_action( 'init', 'register_my_menus' );


/************************************************************/
/********************* CART HELPERS *************************/
/************************************************************/

function caestus_cart_count(){
	return (new cart())->count();
}

function caestus_cart_items($type = false){
	$result = (new cart())->get_items() ?? [];
	return ($type == 'json') ? json_encode($result,true) : $result;
}

function caestus_add_to_cart($id,$image,$title,$quantity,$category){
	return (new cart())->add_item($id,$image,$title,$quantity,$category);
}

function caestus_remove_item($id,$category){
	return (new cart())->remove_item($id,$category);
}

function caestus_update_item($id,$category,$quantity){
	return (new cart())->update_item($id,$category,$quantity);
}


function send_order($params){
	return (new cart())->send_order($params);
}


/*
	usage : 
	caestus_add_to_cart($id,$image,$title,$quantity,$category);
	caestus_remove_item($id,$category);
	caestus_update_item($id,$category,$quantity);
*/

/************************************************************/
/********************* CART HELPERS *************************/
/************************************************************/



function products_categories(){
	return System::product_categories();
}

function packs_production_categories(){
	return System::packs_production_categories();
}