<?php

class title_widget extends WP_Widget
{
    public function __construct()
    {
        $widget_ops = array(
                'class'         => 'title_widget',
                'description'   => 'title widget'
            );
        parent::__construct('title_widget', 'Title', $widget_ops);
    }
    
    public function form($instance)
    {
        if ( isset( $instance[ 'id' ] ) )
            $id = $instance[ 'id' ];
        else
            $id = '';

        if ( isset( $instance[ 'title' ] ) )
            $title = $instance[ 'title' ];
        else
            $title = 'Default Title';

        if ( isset( $instance[ 'size' ] ) )
            $size = $instance[ 'size' ];
        else
            $size = '45';

        if ( isset( $instance[ 'text-align' ] ) )
            $text_align = $instance[ 'text-align' ];
        else
            $text_align = 'center';
        ?>

        <p>
            <label for="<?php echo $this->get_field_id( 'id' ); ?>"><?php echo 'Title id'; ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id( 'id' ); ?>" name="<?php echo $this->get_field_name( 'id' ); ?>" type="text" value="<?php echo esc_attr( $id ); ?>" />
        </p>
        <p>
            <label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php echo 'Title'; ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
        </p>
        <p>
            <label for="<?php echo $this->get_field_id( 'text-align' ); ?>"><?php echo 'Text align'; ?></label>
            <div style="display: flex;
                        align-items: center;
                        justify-content: space-between;"
            >
                <div>
                    <span>Left</span>
                    <input class="widefat" id="<?php echo $this->get_field_id( 'text-align' ); ?>" <?php echo $text_align == 'left' ? 'checked':''; ?> name="<?php echo $this->get_field_name( 'text-align' ); ?>" type="radio" value="left" />
                </div>
                <div>
                    <span>Center</span>
                    <input class="widefat" id="<?php echo $this->get_field_id( 'text-align' ); ?>" <?php echo $text_align == 'center' ? 'checked':''; ?> name="<?php echo $this->get_field_name( 'text-align' ); ?>" type="radio" value="center" />
                </div>
                <div>
                    <span>Right</span>
                    <input class="widefat" id="<?php echo $this->get_field_id( 'text-align' ); ?>" <?php echo $text_align == 'right' ? 'checked':''; ?> name="<?php echo $this->get_field_name( 'text-align' ); ?>" type="radio" value="right" />
                </div>
            </div>
        </p>
        <p>
            <label for="<?php echo $this->get_field_id( 'size' ); ?>"><?php echo 'Size'; ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id( 'size' ); ?>" name="<?php echo $this->get_field_name( 'size' ); ?>" type="number" value="<?php echo esc_attr( $size ); ?>" />
        </p>
        <?php

    }
    
    public function widget($args, $instance)
    {
        $id = $instance['id'];
        ?>
            <div class="container mt-4" <?php echo !empty($id) ? "id='{$id}'":""; ?>>
                <p class="caestus-page-title" style="font-size: <?php echo $instance['size'].'px'; ?>;text-align: <?php echo $instance[ 'text-align' ] ?>;"><?php echo $instance['title']; ?></p>
            </div>
        <?php

    }
}