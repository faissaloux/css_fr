<?php
    /**
     * Template Name: search
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
    <div class="container">
        <div class="search-result-page py-5">
            <h2><?php echo $theme_setting['search-text']; ?>: <span><?php echo '\''.strtoupper($_GET['q']).'\''; ?></span></h2>
            <div class="row">
                <?php if( !isset(($search_result[0]['error']))): ?>
                    <?php foreach($search_result[0] as $result): ?>
                        <div class="col-md-4 col-xl-3 col-lg-3 products-item">
                            <div class="product-3 mb-3">
                                <div class="product-media">
                                    <a href="<?php echo $result['link']; ?>">
                                        <img src="<?php echo esc_url($result['image']); ?>" alt="product">
                                    </a>
                                </div>
                                <div class="product-detail">
                                    <div class="product-title">
                                        <h6 style="min-height: 75px;">
                                            <a href="<?php echo $result['link']; ?>"><?php echo $result['title']; ?></a>
                                        </h6>
                                    </div>
                                    <a  href="javascript:;"
                                        data-category="<?php echo $result['category']; ?>"
                                        class="btn caestus_add_to_cart w-100"
                                        data-image="<?php echo $result['image']; ?>"
                                        data-name="<?php echo $result['title']; ?>" 
                                        data-id="<?php echo $result['id']; ?>"
                                        style="background-color: red; color: #FFF"
                                    >
                                        AJOUTER AU DEVIS
                                    </a>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php else: ?>
                    <div class="col-md-4 col-sm-12">
                        <div class="error">
                            <p><?php echo $search_result[0]['error']; ?></p>
                        </div>
                    </div>
                <?php endif ?>
            </div>
        </div>
    </div>
    <?php require_once 'includes/footer.php'; ?>
    <?php require_once 'includes/scripts.php'; ?>
</body>

</html>