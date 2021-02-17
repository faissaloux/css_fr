<?php

add_action('widgets_init', function(){
    register_widget('page_header_widget');
    register_widget('products_listing_widget');
    register_widget('packs_production_listing_widget');
    register_widget('divider_widget');
    register_widget('title_widget');
    register_widget('border_widget');
    register_widget('product_logo_widget');
});

require_once 'widgets/page-header-widget.php';
require_once 'widgets/products-listing-widget.php';
require_once 'widgets/packs-production-listing-widget.php';
require_once 'widgets/divider-widget.php';
require_once 'widgets/title-widget.php';
require_once 'widgets/border-widget.php';
require_once 'widgets/product-logo-widget.php';