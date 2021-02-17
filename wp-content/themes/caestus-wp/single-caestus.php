<?php
    /*
        Template Name: blog
    */

    define( 'HOME_DIR', get_template_directory(). '/templates/home');
    global $theme_setting;
    global $assets_version;
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
    <?php require_once 'includes/article.php'; ?>
    <?php require_once 'includes/footer.php'; ?>
    <?php require_once 'includes/scripts.php'; ?>
</body>

</html>