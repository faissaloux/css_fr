<?php
    global $theme_setting;
?>

<style>
    .mm-navbar {
        --mm-color-background: <?php echo $theme_setting['mobile-menu-header-background']; ?>;
        --mm-color-text-dimmed: <?php echo $theme_setting['mobile-menu-header-text-color']; ?>;
        --mm-color-button: <?php echo $theme_setting['mobile-menu-header-arrow-color']; ?>;
    }
        
    .mm-panel {
        --mm-color-background: <?php echo $theme_setting['mobile-menu-panel-background']; ?>;
        --mm-color-button: <?php echo $theme_setting['mobile-menu-panel-arrow-color']; ?>;
    }
    .mm-listview .mm-listitem a{
        color: <?php echo $theme_setting['mobile-menu-panel-text-color']; ?>;
    }
</style>

<!-- Navbar -->
<nav class="navbar nav-custom navbar-expand-md top-nav" style="background-color: <?php echo $theme_setting['header-background'] ?>;">

    <div class="container">
        <a href="#my-menu" class="show-mobile show-menu col-3"><i class="fas fa-bars"></i></a>
        <a class="navbar-brand col-sm-2 col-md-2 px-0" href="<?php echo get_home_url() ?>"><img src="<?php echo the_logo(); ?>" alt=""></a>	
        
        <section class="col-lg-6 navbar-mobile monstriat">
            <?php echo get_desktop_menu($menus); ?>
        </section>

        <div class="col-4 col-md-3 col-lg-3 text-right lbotonat d-flex justify-content-end align-items-center">
            <div class="ui-dialog ui-widget ui-widget-content ui-corner-all ui-front ox-dialog ox-slideout ox-slideout-top active ox-slideout-active" tabindex="-1" role="dialog" aria-describedby="ui-id-1" style="display: none;">
            <div class="block block-content block-content-slideout ui-dialog-content ui-widget-content ox-modal-content" data-move-mobile="search.slideout" data-move-sticky="search.slideout" style="display: block;" data-role="OXmodal" id="ui-id-1">
		<div class="header__search-wrapper ox-move-item ox-move-item-search.slideout">
			<div class="ox-overlay-close-btn"><span></span></div>
            <form class="form minisearch" id="search_mini_form" action="/search" method="get">
                <div class="field search">
                    <div class="control">
                        <div class="flashing-cursor"></div>
                        <input id="search" type="text" name="q" value="" class="input-text js-input-focus searchMobile" maxlength="128" role="combobox" aria-haspopup="false" aria-autocomplete="both" autocomplete="off" aria-expanded="false">
                        <div class="label animated-text--masked" for="search" data-role="minisearch-label">
                            <div class="wrap">
                                <span class="inner"><?php echo $theme_setting['search-title']; ?></span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="actions">
                    <button title="Go" class="action search searchMobile" aria-label="Search">
                        <span class="search-icon-wrapper"><svg data-name="search-icon-small 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 15 15"><rect x="11.73223" y="10.52513" width="2" height="4.41421" transform="translate(-5.27386 12.73223) rotate(-45)"></rect><path d="M7,0a7,7,0,1,0,7,7A7,7,0,0,0,7,0ZM7,12a5,5,0,1,1,5-5A5,5,0,0,1,7,12Z"></path></svg></span><span><?php echo $theme_setting['search-button-text']; ?></span>
                    </button>
                </div>
            </form>
		</div></div></div>
            <a class="btn btn-xs down-search d-flex show-mobile" href='javascript:;' data-toggle="offcanvas"
                data-target="#offcanvas-search">
                <span class="ti-search"></span>
            </a>
            <div class="search-input-container" id="search-input-cont">
                <input type="text" name="" placeholder="Search" class="home_search">
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
            <a class="btn btn-xs d-flex show-desktop" id="show-search-desktop" href='javascript:;' data-toggle="offcanvas"
                data-target="#offcanvas-search">
                <span class="ti-search"></span>
            </a>

            <div class="carter">
                <a class="btn btn-xs" id="cart" style="background-color: <?php echo $theme_setting['header-cart-background'] ?>" href="<?php echo get_home_url().'/cart'; ?>">
                    <span id="products-in-cart">0</span>
                    <span class="icon-document"></span>
                </a>
            </div>
            <a  class="btn btn-xs show-desktop"
                href="https://www.google.com/maps/place/Caestus+Studios/@30.4178535,-9.5778858,18z/data=!3m1!4b1!4m5!3m4!1s0xdb3b7845137f05f:0x8033f371297be0dc!8m2!3d30.4178512!4d-9.5767888"
                target="_blank"
            >
                <span class="ti-location-pin"></span>
            </a>
            <a href="/">
                <span class="lang-switcher">EN</span>
            </a>
        </div>
    </div>
</nav>		
            



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