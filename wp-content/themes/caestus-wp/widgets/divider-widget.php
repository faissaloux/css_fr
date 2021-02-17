<?php

class divider_widget extends WP_Widget
{
    public function __construct()
    {
        $widget_ops = array(
                'class'         => 'divider_widget',
                'description'   => 'Divider widget'
            );
        parent::__construct('divider_widget', 'Divider', $widget_ops);
    }
    
    public function form($instance)
    {
        if ( isset( $instance[ 'height' ] ) )
            $height = $instance[ 'height' ];
        else
            $height = 20;

        ?>
        <p>
            <label for="<?php echo $this->get_field_id( 'height' ); ?>"><?php echo 'Height'; ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id( 'height' ); ?>" name="<?php echo $this->get_field_name( 'height' ); ?>" type="number" value="<?php echo esc_attr( $height ); ?>" />
        </p>
        <?php

    }
    
    public function widget($args, $instance)
    {
        ?>
            <div class="divider-space" style="height: <?php echo $instance['height'].'px' ?>"></div>
        <?php

    }
}