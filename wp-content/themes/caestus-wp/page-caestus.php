<?php

/*
    Template Name: caestus
*/

$sidebar = '';
function template_widgetsInit() {
    global $post;
    global $sidebar;
    global $assets_version;
    $sidebar = "wpse-{$post->ID}-aside";

    register_sidebar( array(
        'name'  => $post->post_title ,
        'id'    => "wpse-{$post->ID}-aside",
    ) );
}
template_widgetsInit();
define( 'HOME_DIR', get_template_directory(). '/templates/home');

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <?php require_once('includes/head.php') ?>
    <link rel="stylesheet" href="<?php echo get_template_directory_uri().'/assets/css/app.css?v='.$assets_version;?>">
</head>
<a href="javascript:;" id="button" style="background-color: <?php echo $theme_setting['top-arrow-color'] ?>"></a>

<body>
    <?php require_once 'includes/nav.php' ?>

    <div class="caestus-page">
        <?php if ( is_active_sidebar( $sidebar ) ) : ?>
            <?php dynamic_sidebar( $sidebar ); ?>
        <?php endif; ?>
    </div>


    <?php require_once('includes/footer.php') ?>
    <?php require_once('includes/scripts.php') ?>
</body>

</html>