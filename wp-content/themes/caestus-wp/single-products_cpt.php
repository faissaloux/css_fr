<?php
    global $theme_setting;
    global $assets_version;
?>
<!DOCTYPE html>
<html lang="en">

    <head>
        <?php require_once 'includes/head.php'; ?>
        <link rel="stylesheet" href="<?php echo get_template_directory_uri().'/assets/css/app.css?v='.$assets_version;?>">
    </head>
    <a href="javascript:;" id="button" style="background-color: <?php echo $theme_setting['top-arrow-color'] ?>"></a>

    <body>
        <div id="my-page">
            <?php require_once 'includes/nav.php'; ?>
            <?php require_once 'includes/product.php'; ?>
            <?php require_once 'includes/footer.php'; ?>
            <?php require_once 'includes/scripts.php'; ?>
        </div>
    </body>

    </html>