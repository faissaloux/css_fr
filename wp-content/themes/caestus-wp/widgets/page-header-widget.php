<?php

class page_header_widget extends WP_Widget
{
    public function __construct()
    {
        $widget_ops = array(
                'class'         => 'page_header_widget',
                'description'   => 'Page header widget'
            );
        parent::__construct('page_header_widget', 'Header de la page', $widget_ops);
    }
    
    public function form($instance)
    {
        if ( isset( $instance[ 'title' ] ) )
            $title = $instance[ 'title' ];
        else
            $title = 'Page header';
        
        if ( isset( $instance[ 'height' ] ) )
            $height = $instance[ 'height' ];
        else
            $height = 400;

        ?>
        <p>
            <label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php echo 'Title'; ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
        </p>
        <p>
            <label for="<?php echo $this->get_field_id( 'height' ); ?>"><?php echo 'Height'; ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id( 'height' ); ?>" name="<?php echo $this->get_field_name( 'height' ); ?>" type="number" value="<?php echo esc_attr( $height ); ?>" />
        </p>
        <p class="header-image-container toClone">
            <label for="<?php echo $this->get_field_id('header_image'); ?>">Header image</label><br />
            <img class="header_image" src="<?php if(!empty($instance['header_image'])){echo $instance['header_image'];} ?>" style="margin:0;padding:0;max-width:100px;float:left;display:inline-block" />
            <input type="text" class="widefat header_image_url" name="<?php echo $this->get_field_name('header_image'); ?>" id="<?php echo $this->get_field_id('header_image'); ?>" value="<?php echo $instance['header_image']; ?>">
            <input type="button" value="<?php echo 'Upload Image'; ?>" class="button header_image_upload" id="header_image_uploader"/>
        </p>
        <?php

    }
    
    public function widget($args, $instance)
    {
        ?>
        <div class="hero-container custom-page-hero" style="height: <?php echo $instance['height'].'px' ?>; overflow: hidden; position: relative; margin-top: -40px;">
            <img src="<?php echo esc_url($instance['header_image']); ?>" style="height: 100%; width: 100%; object-fit: cover;" class='hero-image' />
            <h1 class='hero-text'><?php echo $instance['title']; ?></h1>
        </div>
        <?php

    }
}