<?php
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
    <div id="my-page">
        <?php require_once 'includes/nav.php' ?>
        <div class="page-not-found">
            <div class="page-not-found-code d-flex justify-content-center align-items-center">
                <span>4</span>
                <div class="img-container">
                    <img src="<?php echo get_template_directory_uri();?>/assets/images/404/404.png" />
                </div>
                <span>4</span>
            </div>
            <p class="page-not-found-text">Page non trouvée!</p>
        </div>
        <?php require_once 'includes/footer.php'; ?>
        <?php require_once 'includes/scripts.php'; ?>
    </div>
</body>

</html>