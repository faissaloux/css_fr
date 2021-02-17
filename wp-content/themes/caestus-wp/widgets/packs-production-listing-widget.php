<?php

class packs_production_listing_widget extends WP_Widget
{
    public function __construct()
    {
        $widget_ops = array(
                'class'         => 'packs_production_listing_widget',
                'description'   => 'packs production listing widget',
            );
        parent::__construct('packs_production_listing_widget', 'Packs production listing', $widget_ops);
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

            $categories  = packs_production_categories();
        ?>

        <p>     
            <label for="<?php echo $this->get_field_id( 'id' ); ?>"><?php echo 'Pack id'; ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id( 'id' ); ?>" name="<?php echo $this->get_field_name( 'id' ); ?>" type="text" value="<?php echo esc_attr( $id ); ?>" />
        </p>
        <p>
            <label for="<?php echo $this->get_field_id( 'category' ); ?>"><?php echo 'Products category'; ?></label>
            <select class="widefat" id="<?php echo $this->get_field_id( 'category' ); ?>" name="<?php echo $this->get_field_name( 'category' ); ?>">
                <?php foreach($categories as $category): ?>
                    <?php $selected = ($category['term_id'] == $cat) ? 'selected' : ' ';  ?>
                    <option  value="<?php echo $category['term_id']; ?>" <?php echo $selected; ?>><?php echo $category['name']; ?></option>
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

        $args = array( 'post_type' => 'pack_cpt', 'posts_per_page' => 10 );
        $the_query = new WP_Query( $args ); 

        $packsCategories = get_terms( array(
            'taxonomy'  => 'pack_categories', 
            'order'     => 'DESC'
        ));

        ?>
         <div class="container products-container my-0" <?php echo !empty($id) ? "id='{$id}'":""; ?>>
            <div class="products row">
            <?php foreach ($packsCategories as $category): ?>
                <?php
                    query_posts( array(
                        'post_type' => 'pack_cpt',
                        'tax_query' => array( 
                            array( 
                                'taxonomy'  => 'pack_categories',
                                'field'     => 'slug',
                                'terms'     => $category->slug,
                            ) 
                        ) 
                    ));
                ?>
                <?php if (have_posts()) : ?>
                    <?php if( $category->term_id == $cat_id ): ?>
                        <div class="section-pack section py-0">
                            <div class="section-title container">
                                <h2 class="category-title"><?php echo $category->name; ?></h2>
                            </div>
                            <div class="container">
                                <div class="row">
                                    <?php while (have_posts()) : the_post(); ?>
                                        <div class="col-md-6">
                                            <a href="<?php echo get_permalink(); ?>">
                                                <div class="p-5" style="width: 100%; display: inline-block;">
                                                    <div class="card border hover-shadow-6">
                                                        <div class="card-body px-5 small_box_done"
                                                                style="background: url(<?php echo get_the_post_thumbnail_url(); ?>);
                                                                        background-repeat: no-repeat;
                                                                        background-size: cover;
                                                                    "
                                                        >
                                                            <div class="row">
                                                                <div class="col-auto mr-auto">
                                                                    <h6><strong><?php echo System::pack_subtitle($id); ?></strong></h6>
                                                                </div>
                                                                <div class="col-auto">
                                                                </div>
                                                            </div>
                                                            <p class="pack-title"><?php the_title(); ?></p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                        <?php $number++; ?>
                                        <?php if($number == $limit) break; ?>
                                    <?php endwhile; ?>
                                </div>
                            </div>
                        </div>
                    <?php endif; ?>
                <?php endif; ?>
            <?php endforeach; ?>
            </div>
         </div>
        <?php
    }
}