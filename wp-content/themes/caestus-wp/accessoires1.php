<?php
    /*
        Template Name: accessoires1
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
    <main class="main-content">
    <section class="category-items bg-gray">
        <div class="container">
            <div class="row">
                <?php foreach($accessories as $accessory): ?>
                    <?php if( !empty( $accessory['image'] ) ): ?>
                        <div class="col-md-4 col-xl-3 col-lg-3 products-item">
                            <div class="product-3 mb-3">
                                <div class="product-media">
                                    <a href="<?php echo $accessory['url']; ?>">
                                        <img src="<?php echo $accessory['image']; ?>" alt="product">
                                    </a>
                                </div>
                                <div    class="product-detail d-flex flex-column justify-content-between"
                                        style="height: 70px; border-top: 1px #CCC solid;">
                                    <div class="product-title">
                                        <h6>
                                            <a href="<?php echo $accessory['url']; ?>"><?php echo $accessory['title']; ?></a>
                                        </h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endif; ?>
                <?php endforeach; ?>
            </div>
        </div>
    </section>
    </main>
    
    <?php require_once('includes/footer.php') ?>
    <?php require_once('includes/scripts.php') ?>
</body>

</html>