<?php
    /*
        Template Name: optiques
    */
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
    <link rel="stylesheet" href="<?php echo get_template_directory_uri().'/assets/css/optiques/app.css?v='.$assets_version;?>">
</head>
<a href="" id="button"></a>

<body>
    <?php require_once('includes/nav.php') ?>

    <div class="coverHeaderWrapper optiquesHeaderWrapper">

        <img src="<?php echo get_template_directory_uri();?>/assets/images/cover/cover-optiques.jpg" class='slmsqfqsqs coverHeaderImg' />
        <h1 class='under_cover'>Optiques</h1>
    </div>


    <!-- Main Content -->
    <main class="main-content main-content-optique">

        <div class="from-db">
            <!-- Main Content -->
            <main class="main-content" style="margin-top: 40px;">
                <?php foreach ($optiques as $optique): ?>
                    <?php
                        query_posts( array(
                            'post_type' => 'products_cpt',
                            'tax_query' => array( 
                                array( 
                                    'taxonomy'  => 'category',
                                    'field'     => 'slug',
                                    'terms'     => $optique->slug
                                ) 
                            ) 
                        ));

                        $args       = array('child_of' => $optiques[0]->term_id);
                        $categories = get_categories( $args );
                        foreach($categories as $category):
                             if (have_posts()) : ?>
                             <div class="section-pack section bg-gray" style="padding-top:55px;">
                                <div class="section-title container">
                                    <h2>
                                        <?php echo $category->name; ?>
                                    </h2>
                                </div>
                                <?php
                                    $args = array(
                                        'post_type'        => 'products_cpt',
                                        'category'          => $category->cat_ID,
                                        'post_status'      => 'publish',
                                        'suppress_filters' => true 
                                    );
                                    $subcat_posts = get_posts($args); 
                                ?>
                                    <div class="container">
                                        <div class="row">
                                    <?php foreach($subcat_posts as $subcat_post):
                                        $postID = $subcat_post->ID;
                                    ?>
                                                <div class="col-md-4 col-xl-3 col-lg-3 products-item">
                                                    <div class="product-3 mb-3">
                                                        <div class="product-media">
                                                            <a href="<?php echo get_permalink($postID); ?>">
                                                                <img src="<?php echo get_the_post_thumbnail_url($postID); ?>" alt="product">
                                                            </a>
                                                        </div>
                                                        <div class="product-detail d-flex flex-column justify-content-between">
                                                            <div class="product-title">
                                                                <h6>
                                                                    <a href="<?php echo get_permalink($postID); ?>"><?php echo get_the_title($postID); ?></a>
                                                                </h6>
                                                            </div>
                                                            <a  href="javascript:;"
                                                                data-category="<?php echo $category->name; ?>"
                                                                class="btn caestus_add_to_cart"
                                                                data-image="<?php echo get_the_post_thumbnail_url($postID); ?>"
                                                                data-name="<?php echo get_the_title($postID); ?>" 
                                                                data-id="<?php echo $postID; ?>"
                                                                style="background-color: red; color: #FFF"
                                                            >
                                                                AJOUTER AU DEVIS
                                                        </a>
                                                        </div>
                                                    </div>
                                                </div>
                                        <?php endforeach;?>
                                    </div>
                                </div>
                                <?php endif;?>
                            </div>
                            <?php endforeach; ?>
                <?php endforeach; ?>
            </main>

        </div>
    </main>
    <?php require_once('includes/footer.php') ?>
    <?php require_once('includes/scripts.php') ?>
</body>

</html>