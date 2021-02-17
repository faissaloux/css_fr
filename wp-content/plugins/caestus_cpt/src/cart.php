<?php 


class cart {



	public function __construct(){

		// add_action( 'init', array( $this, 'register_session_new') );
		$this->register_session_new();

	}

	public function register_session_new(){
	    if( ! session_id() ) {
	       session_start();
	    }
	}

	public function get_items(){
		if(isset($_SESSION['cart_caestus'])){
			return $_SESSION['cart_caestus'];
		}
	}

	public function add_item($id,$image,$title,$quantity,$category){

		$item = [
			'id' => $id,
			'image' => $image,
			'title' => $title,
			'quantity' => $quantity,
			'category' => $category
		];

		return $_SESSION['cart_caestus'][$category][$id] = $item;
	}

	public function update_item($id,$category,$quantity){
		if(isset($_SESSION['cart_caestus'][$category][$id])){
			$_SESSION['cart_caestus'][$category][$id]['quantity'] = $quantity;
			return true;
		}
		return false;
	}

	public function remove_item($id,$category){
		if(isset($_SESSION['cart_caestus'][$category][$id])){
			unset($_SESSION['cart_caestus'][$category][$id]);
			if(empty($_SESSION['cart_caestus'][$category])){
				unset($_SESSION['cart_caestus'][$category]);
			}
			return true;
		}
		return false;
	}


	public function send_order($params){


	}


	public function count(){
		$count = 0;
		foreach ($_SESSION['cart_caestus'] as $category) {
			foreach($category as $item){
				$count += $item['quantity'];
			}
		}
		return $count;
	}

}




new cart();