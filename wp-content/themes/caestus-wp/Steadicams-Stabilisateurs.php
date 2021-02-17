<?php
/*
    Template Name: Steadicams-Stabilisateurs
*/
    global $theme_setting;
    global $assets_version;
    $firstCategoryClass = empty($theme_setting['stab-stead-second-category-image']['url'])
                            ?  'col-md-12' : 'col-md-6';
    $secondCategoryClass = empty($theme_setting['stab-stead-first-category-image']['url'])
                            ?  'col-md-12' : 'col-md-6';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php require_once('includes/head.php') ?>
    <link rel="stylesheet" href="<?php echo get_template_directory_uri().'/assets/css/Trepieds-SupportsCamera/app.css?v='.$assets_version;?>">
</head>
<a href="" id="button"></a>

<body>
    <?php require_once('includes/nav.php') ?>

    <?php if( !empty( $theme_setting['stab-stead-header-image']['url'] ) ): ?>
        <div class="coverHeaderWrapper stab-stead-cover-header-wrapper mb-5">
            <img src="<?php echo $theme_setting['stab-stead-header-image']['url']; ?>" class='cover_img coverHeaderImg' />
            <h1 class='under_cover'><?php echo $theme_setting['stab-stead-header-text']; ?></h1>
        </div>
    <?php endif; ?>
    <!-- Main Content -->
    <main class="main-content stab-stead-content">

        <div class="row secondRow std-stab-row">
            <?php if( !empty($theme_setting['stab-stead-first-category-image']['url']) ): ?>
                <div class="<?php echo $firstCategoryClass; ?> px-1">
                    <a href="<?php echo $theme_setting['stab-stead-first-category-link']; ?>">
                        <div class="boxImageCamera">
                            <img src="<?php echo $theme_setting['stab-stead-first-category-image']['url']; ?>"
                                class="d-lg-none d-md-none d-sm-none" />
                            <img src="<?php echo $theme_setting['stab-stead-first-category-image']['url']; ?>" class="d-xs-none" />
                            <?php if( !empty($theme_setting['stab-stead-first-category-title']) ): ?>
                                <div class="ghakteb"><?php echo $theme_setting['stab-stead-first-category-title']; ?></div>
                            <?php endif; ?>
                        </div>
                    </a>
                </div>
            <?php endif; ?>
            <?php if( !empty($theme_setting['stab-stead-second-category-image']['url']) ): ?>
                <div class="<?php echo $secondCategoryClass; ?> px-1">
                    <a href="<?php echo $theme_setting['stab-stead-second-category-link']; ?>">
                        <div class="boxImageCamera">
                            <img src="<?php echo $theme_setting['stab-stead-second-category-image']['url']; ?>"
                                class="d-lg-none d-md-none d-sm-none" />
                            <img src="<?php echo $theme_setting['stab-stead-second-category-image']['url']; ?>" class="d-xs-none" />
                            <?php if( !empty($theme_setting['stab-stead-second-category-title']) ): ?>
                                <div class="ghakteb"><?php echo $theme_setting['stab-stead-second-category-title']; ?></div>
                            <?php endif; ?>
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