<?php
    global $theme_setting;
?>

<style>
    .carousel-item.active {
        height: <?php echo $theme_setting['slider-desktop-height'].'px'; ?> !important;
    }

    @media(max-width: 600px){
        .carousel-item.active{
            height: <?php echo $theme_setting['slider-mobile-height'].'px'; ?> !important;
        }
    }
</style>

    <?php if(!empty(the_slider()[0])): ?>
        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                    <?php $i = 0; foreach(the_slider() as $slider){ ?>
                            <li data-target="#carouselExampleIndicators" data-slide-to="<?php echo $i; ?>" class="<?php if($i==0): echo 'active'; endif  ?>"></li>
                    <?php
                        $i++;
                    } ?>
            </ol>
            <div class="carousel-inner">
                    <?php $i = 0; foreach(the_slider() as $slider){
                        ?>
                            <div class="carousel-item <?php if($i==0): echo 'active'; endif  ?>">
                                <img class="d-block w-100 d-lg-none d-md-none d-sm-none"
                                    src="<?php echo $slider;?>">
                                <img class="d-block w-100 d-xs-none" src="<?php echo $slider;?>">
                            </div>
                        <?php
                        $i++;
                    } ?>
            </div>
        </div>
    <?php endif; ?>

<div class="search-section dnone-xs">
    <div class="row align-items-center h-100">
        <div class="col-md-12 mx-auto text-center">
        </div>
        <div class="col-md-5 mx-auto text-center search-desktop">
            <form class="rounded" action="/search" method="get">
                <div class="row justify-content-center">
                    <div class="col-6 col-md-12">
                        <div class="input-group" id="search-input-cont">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="ti-search mt-1"></i></span>
                            </div>
                            <input id='searchInput' name='q' type="text" class="form-control home_search"
                                placeholder="Recherche">
                        </div>
                        <div id='ajaxSearch' class="search home_search_results" style='display: none;'>
                            <div class="search-loading">
                                <div class="loadingcopong" style='display:none;'>
                                    <img src="<?php echo get_template_directory_uri();?>/assets/images/Loading/loading.gif"/> Chargement ...
                                </div>
                            </div>
                            <div class="search-result">
                                <div class="no-reuslt" style='display:none;'></div>
                                <ul>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-auto ">
                    <button style='display:none;' class="btn btn-lg btn-primary searchBtn" type="submit"><span
                            class="ti-search"></span></button>
                </div>
        </div>
        </form>
    </div>
</div>
</div>