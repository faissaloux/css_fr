<?php

class products_listing_widget extends WP_Widget
{
    public function __construct()
    {
        $widget_ops = array(
                'class'         => 'products_listing_widget',
                'description'   => 'products listing widget',
            );
        parent::__construct('products_listing_widget', 'Products listing', $widget_ops);
    }
    
    public function form($instance)
    {
        if ( isset( $instance[ 'id' ] ) )
            $id = $instance[ 'id' ];
        else
            $id = '';

        if ( isset( $instance[ 'category' ] ) )
            $cat = $instance[ 'category' ];
        else
            $cat = 'Default Category';

        if ( isset( $instance[ 'number' ] ) )
            $number = $instance[ 'number' ];
        else
            $number = 4;

            $categories  = products_categories();
        ?>
        <p>
            <label for="<?php echo $this->get_field_id( 'id' ); ?>"><?php echo 'Category id'; ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id( 'id' ); ?>" name="<?php echo $this->get_field_name( 'id' ); ?>" type="text" value="<?php echo esc_attr( $id ); ?>" />
        </p>
        <p>
            <label for="<?php echo $this->get_field_id( 'category' ); ?>"><?php echo 'Products category'; ?></label>
            <select class="widefat" id="<?php echo $this->get_field_id( 'category' ); ?>" name="<?php echo $this->get_field_name( 'category' ); ?>">
                <?php foreach($categories as $category): ?>
                    <?php $selected = ($category['term_id'] == $cat) ? 'selected' : ' ';  ?>
                    <option  value="<?php echo $category['term_id']; ?>"  <?php echo $selected; ?> ><?php echo $category['name']; ?></option>
                <?php endforeach; ?>
            </select>
        </p>
        <p>
            <label for="<?php echo $this->get_field_id( 'number' ); ?>"><?php echo 'Number'; ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id( 'number' ); ?>" name="<?php echo $this->get_field_name( 'number' ); ?>" type="text" value="<?php echo esc_attr( $number ); ?>" />
        </p>
        <?php

    }
    
    public function widget($args, $instance)
    {
        $id = $instance['id'];
        $cat_id = $instance['category'];
        $limit = $instance['number'];
        $number = 0;

        $products  = caestus_products($cat_id);

        ?>
         <div class="container products-container" <?php echo !empty($id) ? "id='{$id}'":""; ?>>
            <div class="products row">
                    <?php foreach($products as $product):?>
                        <div class="col-md-4 col-xl-3 col-lg-3 products-item">
                                <div class="product-3 mb-3">
                                    <div class="product-media">
                                        <a href="<?php echo $product['link']; ?>">
                                            <img src="<?php echo esc_url($product['image']); ?>" alt="product">
                                        </a>
                                    </div>
                                    <div class="product-detail">
                                        <div class="product-title">
                                            <h6 style="min-height: 75px;">
                                                <a href="<?php echo $product['link']; ?>"><?php echo $product['title']; ?></a>
                                            </h6>
                                        </div>
                                        <a  href="javascript:;"
                                            data-category="<?php echo $product['category']; ?>"
                                            class="btn caestus_add_to_cart w-100"
                                            data-image="<?php echo $product['image']; ?>"
                                            data-name="<?php echo $product['title']; ?>" 
                                            data-id="<?php echo $product['id']; ?>"
                                            style="background-color: red; color: #FFF"
                                        >
                                            AJOUTER AU DEVIS
                                        </a>
                                    </div>
                                </div>
                        </div>
                        <?php $number++; ?>
                        <?php if($number == $limit) break; ?>
                    <?php endforeach; ?>
            </div>
         </div>
        <?php
    }
}