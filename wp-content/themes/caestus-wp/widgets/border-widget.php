<?php

class border_widget extends WP_Widget
{
    public function __construct()
    {
        $widget_ops = array(
                'class'         => 'border_widget',
                'description'   => 'Border widget'
            );
        parent::__construct('border_widget', 'Border', $widget_ops);
    }
    
    public function form($instance)
    {
        if ( isset( $instance[ 'height' ] ) )
            $height = $instance[ 'height' ];
        else
            $height = 2;
        
        if ( isset( $instance[ 'color' ] ) )
            $color = $instance[ 'color' ];
        else
            $color = '#EDEDED';

        ?>
        <p>
            <label for="<?php echo $this->get_field_id( 'height' ); ?>">
                <?php echo 'Height'; ?>
            </label>
            <input  class="widefat"
                    id="<?php echo $this->get_field_id( 'height' ); ?>"
                    name="<?php echo $this->get_field_name( 'height' ); ?>"
                    type="number"
                    value="<?php echo esc_attr( $height ); ?>"
            />

            <label for="<?php echo $this->get_field_id( 'color' ); ?>">
                <?php echo 'Color'; ?>
            </label>
            <input  class="widefat"
                    id="<?php echo $this->get_field_id( 'color' ); ?>"
                    name="<?php echo $this->get_field_name( 'color' ); ?>"
                    type="color"
                    value="<?php echo esc_attr( $color ); ?>"
            />
        </p>
        <?php

    }
    
    public function widget($args, $instance)
    {
        ?>
            <div class="container">
                <div class="border-div" style="height: <?php echo $instance['height'].'px'; ?>; background-color: <?php echo $instance['color'];  ?>;"></div>
            </div>
        <?php

    }
}