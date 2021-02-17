<?php
    /*
        Template Name: Trepieds-SupportsCamera
    */

    global $theme_setting;
    global $assets_version;
    $firstCategoryClass = empty($theme_setting['supcam-trep-second-category-image']['url'])
                            ?  'col-md-12' : 'col-md-6';
    $secondCategoryClass = empty($theme_setting['supcam-trep-first-category-image']['url'])
                            ?  'col-md-12' : 'col-md-6';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php require_once('includes/head.php') ?>
    <link rel="stylesheet" href="<?php echo get_template_directory_uri().'/assets/css/optiques/app.css?v='.$assets_version;?>">
</head>


<a href="" id="button"></a>

<body>

    <?php require_once('includes/nav.php') ?>


    <div class="container">

    </div>
    <!--end container -->


    <!-- Modal -->
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">

                    <h4 class="modal-title" id="myModalLabel">La duree du travail</h4>
                </div>
                <div class="modal-body">
                    <form id='addtocartForm' action='/ajax1/' Method='POST'>
                        <div class="form-group">
                            <input name="from" type="text" readonly='true' class="datePicker form-control"
                                placeholder="From" required="">
                        </div>
                        <div class="form-group">
                            <input name="to" type="tel" readonly='true' class="datePicker form-control"
                                placeholder="To" />
                        </div>

                        <input type="hidden" name="name" id='CartproductName'>
                        <input type="hidden" name="id" id='CartproductID'>
                        <input type="hidden" name="image" id='CartproductImage'>

                        <button type="submit" class="btn btn-danger btn-block primary-bg">
                            <span class="submitConf">ajouter au panier</span>
                            <span class="submitLoad" style="display: none">يرجى الإنتظار...</span>
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>

    <?php if( !empty( $theme_setting['supcam-trep-header-image']['url'] ) ): ?>
        <div class="coverHeaderWrapper">
            <img src="<?php echo $theme_setting['supcam-trep-header-image']['url']; ?>" class='cover_img coverHeaderImg' />
            <h1 class='under_cover'><?php echo $theme_setting['supcam-trep-header-text']; ?></h1>
        </div>
    <?php endif; ?>

    <!-- Main Content -->
    <main class="main-content">

        <div class="row secondRow trep-supcam-row">
            <?php if( !empty($theme_setting['supcam-trep-first-category-image']['url']) ): ?>
                <div class="<?php echo $firstCategoryClass ?> px-1 show-desktop">
                    <a href="/supports-camera">
                        <div class="boxImageCamera"><img src="<?php echo $theme_setting['supcam-trep-first-category-image']['url']; ?>" />
                            <div class="ghakteb"><?php echo $theme_setting['supcam-trep-first-category-title'];?></div>
                        </div>
                    </a>
                </div>
            <?php endif; ?>
            <?php if( !empty($theme_setting['supcam-trep-first-category-mobile-image']['url']) ): ?>
                <div class="<?php echo $firstCategoryClass ?> px-1 show-mobile">
                    <a href="/supports-camera">
                        <div class="boxImageCamera"><img src="<?php echo $theme_setting['supcam-trep-first-category-mobile-image']['url']; ?>" />
                            <div class="ghakteb"><?php echo $theme_setting['supcam-trep-first-category-title'];?></div>
                        </div>
                    </a>
                </div>
            <?php endif; ?>
            <?php if( !empty($theme_setting['supcam-trep-second-category-image']['url']) ): ?>
                <div class="<?php echo $secondCategoryClass ?> px-1 show-desktop">
                    <a href="/trepieds-2">
                        <div class="boxImageCamera">
                            <img src="<?php echo $theme_setting['supcam-trep-second-category-image']['url']; ?>"
                                class="d-lg-none d-md-none d-sm-none" />
                            <img src="<?php echo $theme_setting['supcam-trep-second-category-image']['url']; ?>" class="d-xs-none" />
                            <div class="ghakteb"><?php echo $theme_setting['supcam-trep-second-category-title'];?></div>
                        </div>
                    </a>
                </div>
            <?php endif; ?>
            <?php if( !empty($theme_setting['supcam-trep-second-category-mobile-image']['url']) ): ?>
                <div class="<?php echo $secondCategoryClass ?> px-1 show-mobile">
                    <a href="/trepieds-2">
                        <div class="boxImageCamera">
                            <img src="<?php echo $theme_setting['supcam-trep-second-category-mobile-image']['url']; ?>"
                                class="d-lg-none d-md-none d-sm-none" />
                            <img src="<?php echo $theme_setting['supcam-trep-second-category-mobile-image']['url']; ?>" class="d-xs-none" />
                            <div class="ghakteb"><?php echo $theme_setting['supcam-trep-second-category-title'];?></div>
                        </div>
                    </a>
                </div>
            <?php endif; ?>

        </div>


    </main>


    <?php require_once('includes/footer.php') ?>
    <?php require_once('includes/scripts.php') ?>
</body>

</html>

</html>