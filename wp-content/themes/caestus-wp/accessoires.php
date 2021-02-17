<?php
    /*
        Template Name: accessoires
    */
    global $theme_setting;
    global $assets_version;
?>

<style>
    .products-item .product-title h6:after{
        background-color: <?php echo $theme_setting['product-title-hover-color'] ?> !important;
    }
</style>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php require_once('includes/head.php') ?>
    <link rel="stylesheet" href="<?php echo get_template_directory_uri().'/assets/css/cameralist/app.css?v='.$assets_version;?>">
</head>
<a href="" id="button"></a>

<body>
    <?php require_once('includes/nav.php') ?>

    <?php if( !empty($theme_setting['accessories-header-image']) ): ?>
        <div class="coverHeaderWrapper">
            <img src="<?php echo $theme_setting['accessories-header-image']['url']; ?>" class='coverHeaderImg' />
            <h1 class='under_cover'><?php echo $theme_setting['accessories-header-text']; ?></h1>
        </div>
    <?php endif; ?>
    <!-- Main Content -->
    <main class="main-content accessories-content">
        <div class="accessories-container">
            <div class="row secondRow accessories-secondRow">
                <?php foreach($accessories as $accessory): ?>
                    <?php if( !empty( $accessory['image'] ) ): ?>
                        <div class="col-lg-3 col-md-6 col-sm-12 mb-4 products-item">
                            <a href="<?php echo $accessory['url']; ?>">
                                <div class="boxImageCamera" style="padding: 5px;">
                                    <img src="<?php echo $accessory['image']; ?>" />
                                    <div class="ghakteb product-title"><?php echo $accessory['title']; ?></div>
                                </div>
                            </a>
                        </div>
                    <?php endif; ?>
                <?php endforeach; ?>
            </div>
        </div>
    </main>
    
    <?php require_once('includes/footer.php') ?>
    <?php require_once('includes/scripts.php') ?>
</body>

</html>