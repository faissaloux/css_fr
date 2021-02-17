<?php


/*
*
*	usage
*	$result = new caestus_search($query);
*	
	
*
*
*/


class caestus_search {

	public $query;
	public $result;

	public function __construct($query){
		$this->query = $query;
		return $this->search()->clean()->get();
	}

	public function search(){
		global $wpdb;

		$postids = $wpdb->get_col("select ID from $wpdb->posts where post_title LIKE '%".$this->query."%' ");

		$args = array(
			'post__in'		=> !empty($postids) ? $postids : array(0),
			'post_type'		=> 'products_cpt',
			'post_status' 	=> 'publish',
			'orderby'		=> 'title',
			'order'			=> 'asc'
		);
	
		$result = new WP_Query($args);
		$this->result = $result->posts;
		unset($query_args);
		return $this;
	}

	public function clean(){
		$result = [];
		$data = [];
		if(!empty($this->result)){
			foreach ($this->result as $item) {

				$image 		= get_the_post_thumbnail_url($item->ID);
				$link 		= get_permalink($item->ID);
				$firstCat	= get_the_category($item->ID)[0]->name;

				array_push($data, [
					'id'		=> $item->ID,
					'image' 	=> $image,
					'title' 	=> $item->post_title,
					'link'		=> $link,
					'category'	=> $firstCat
				]);
			}
		}else{
			$data = [
				'error' => 'Not found'
			];
		}
				
		$result[] = $data;
		$this->result = $result;
		return $this;
	}

	public function get(){

		return $this->result;
	}


}