<?php
    /*
        Template Name: prestation
    */
    global $assets_version;
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php require_once('includes/head.php') ?>
    <link rel="stylesheet" href="<?php echo get_template_directory_uri().'/assets/css/prestation/app.css?v='.$assets_version;?>">
</head>


<a href="" id="button"></a>

<body>
    <?php require_once('includes/nav.php') ?>

    <main class="main-content prestation-page">


        <h2 class='text-center big-t-title'>
            Prestation
        </h2>

        <section class="section prestation-section">
            <div class="container">
                <div class="row">
                <?php foreach($prestations as $prestation): ?>
                    <?php if( !empty($prestation['thumbnail']) ): ?>
                        <div class="col-md-6">
                            <a href="<?php echo $prestation['url']; ?>">
                                <div class="p-5" style="width: 100%; display: inline-block;">
                                    <div class="card border hover-shadow-6">
                                        <div    class="card-body px-5 small_box_done d-flex justify-content-center align-items-center"
                                                style="background: url(<?php echo $prestation['thumbnail']; ?>);
                                                        background-repeat: no-repeat;
                                                        background-size: cover;
                                                    "
                                        >
                                            <p class="prestation-title"><?php echo $prestation['title']; ?></p>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    <?php endif; ?>
                <?php endforeach; ?>
                </div>
            </div>
        </section>

        </div>



    </main>

    <?php require_once('includes/footer.php') ?>
    <?php require_once('includes/scripts.php') ?>
</body>

</html>