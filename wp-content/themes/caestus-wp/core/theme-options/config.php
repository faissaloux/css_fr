<?php
    /**
     * ReduxFramework Sample Config File
     * For full documentation, please visit: http://docs.reduxframework.com/
     */

    if ( ! class_exists( 'Redux' ) ) {
        return;
    }


    // This is your option name where all the Redux data is stored.
    $opt_name = "theme_setting";

    // This line is only for altering the demo. Can be easily removed.
    $opt_name = apply_filters( 'redux_demo/opt_name', $opt_name );

    /*
     *
     * --> Used within different fields. Simply examples. Search for ACTUAL DECLARATION for field examples
     *
     */

    $sampleHTML = '';
    if ( file_exists( dirname( __FILE__ ) . '/info-html.html' ) ) {
        Redux_Functions::initWpFilesystem();

        global $wp_filesystem;

        $sampleHTML = $wp_filesystem->get_contents( dirname( __FILE__ ) . '/info-html.html' );
    }

    // Background Patterns Reader
    $sample_patterns_path = ReduxFramework::$_dir . '../sample/patterns/';
    $sample_patterns_url  = ReduxFramework::$_url . '../sample/patterns/';
    $sample_patterns      = array();
    
    if ( is_dir( $sample_patterns_path ) ) {

        if ( $sample_patterns_dir = opendir( $sample_patterns_path ) ) {
            $sample_patterns = array();

            while ( ( $sample_patterns_file = readdir( $sample_patterns_dir ) ) !== false ) {

                if ( stristr( $sample_patterns_file, '.png' ) !== false || stristr( $sample_patterns_file, '.jpg' ) !== false ) {
                    $name              = explode( '.', $sample_patterns_file );
                    $name              = str_replace( '.' . end( $name ), '', $sample_patterns_file );
                    $sample_patterns[] = array(
                        'alt' => $name,
                        'img' => $sample_patterns_url . $sample_patterns_file
                    );
                }
            }
        }
    }

    /**
     * ---> SET ARGUMENTS
     * All the possible arguments for Redux.
     * For full documentation on arguments, please refer to: https://github.com/ReduxFramework/ReduxFramework/wiki/Arguments
     * */

    $theme = wp_get_theme(); // For use with some settings. Not necessary.

    $args = array(
        // TYPICAL -> Change these values as you need/desire
        'opt_name'             => $opt_name,
        // This is where your data is stored in the database and also becomes your global variable name.
        'display_name'         => $theme->get( 'Name' ),
        // Name that appears at the top of your panel
        'display_version'      => $theme->get( 'Version' ),
        // Version that appears at the top of your panel
        'menu_type'            => 'menu',
        //Specify if the admin menu should appear or not. Options: menu or submenu (Under appearance only)
        'allow_sub_menu'       => true,
        // Show the sections below the admin menu item or not
        'menu_title'           => __( 'اعدادات القالب', 'caynoon_text' ),
        'page_title'           => __( 'اعدادات القالب', 'caynoon_text' ),
        // You will need to generate a Google API key to use this feature.
        // Please visit: https://developers.google.com/fonts/docs/developer_api#Auth
        'google_api_key'       => '',
        // Set it you want google fonts to update weekly. A google_api_key value is required.
        'google_update_weekly' => false,
        // Must be defined to add google fonts to the typography module
        'async_typography'     => true,
        // Use a asynchronous font on the front end or font string
        //'disable_google_fonts_link' => true,                    // Disable this in case you want to create your own google fonts loader
        'admin_bar'            => false,
        // Show the panel pages on the admin bar
        'admin_bar_icon'       => 'dashicons-portfolio',
        // Choose an icon for the admin bar menu
        'admin_bar_priority'   => 50,
        // Choose an priority for the admin bar menu
        'global_variable'      => '',
        // Set a different name for your global variable other than the opt_name
        'dev_mode'             => false,
        // Show the time the page took to load, etc
        'update_notice'        => true,
        // If dev_mode is enabled, will notify developer of updated versions available in the GitHub Repo
        'customizer'           => true,
        // Enable basic customizer support
        //'open_expanded'     => true,                    // Allow you to start the panel in an expanded way initially.
        //'disable_save_warn' => true,                    // Disable the save warning when a user changes a field

        // OPTIONAL -> Give you extra features
        'page_priority'        => null,
        // Order where the menu appears in the admin area. If there is any conflict, something will not show. Warning.
        'page_parent'          => 'themes.php',
        // For a full list of options, visit: http://codex.wordpress.org/Function_Reference/add_submenu_page#Parameters
        'page_permissions'     => 'manage_options',
        // Permissions needed to access the options panel.
        'menu_icon'            => '',
        // Specify a custom URL to an icon
        'last_tab'             => '',
        // Force your panel to always open to a specific tab (by id)
        'page_icon'            => 'icon-themes',
        // Icon displayed in the admin panel next to your menu_title
        'page_slug'            => '',
        // Page slug used to denote the panel, will be based off page title then menu title then opt_name if not provided
        'save_defaults'        => true,
        // On load save the defaults to DB before user clicks save or not
        'default_show'         => false,
        // If true, shows the default value next to each field that is not the default value.
        'default_mark'         => '',
        // What to print by the field's title if the value shown is default. Suggested: *
        'show_import_export'   => true,
        // Shows the Import/Export panel when not used as a field.

        // CAREFUL -> These options are for advanced use only
        'transient_time'       => 60 * MINUTE_IN_SECONDS,
        'output'               => true,
        // Global shut-off for dynamic CSS output by the framework. Will also disable google fonts output
        'output_tag'           => true,
        // Allows dynamic CSS to be generated for customizer and google fonts, but stops the dynamic CSS from going to the head
        // 'footer_credit'     => '',                   // Disable the footer credit of Redux. Please leave if you can help it.

        // FUTURE -> Not in use yet, but reserved or partially implemented. Use at your own risk.
        'database'             => '',
        // possible: options, theme_mods, theme_mods_expanded, transient. Not fully functional, warning!
        'use_cdn'              => true,
        // If you prefer not to use the CDN for Select2, Ace Editor, and others, you may download the Redux Vendor Support plugin yourself and run locally or embed it in your code.

        // HINTS
        'hints'                => array(
            'icon'          => 'el el-question-sign',
            'icon_position' => 'right',
            'icon_color'    => 'lightgray',
            'icon_size'     => 'normal',
            'tip_style'     => array(
                'color'   => 'red',
                'shadow'  => true,
                'rounded' => false,
                'style'   => '',
            ),
            'tip_position'  => array(
                'my' => 'top left',
                'at' => 'bottom right',
            ),
            'tip_effect'    => array(
                'show' => array(
                    'effect'   => 'slide',
                    'duration' => '500',
                    'event'    => 'mouseover',
                ),
                'hide' => array(
                    'effect'   => 'slide',
                    'duration' => '500',
                    'event'    => 'click mouseleave',
                ),
            ),
        )
    );

    // ADMIN BAR LINKS -> Setup custom links in the admin bar menu as external items.
    $args['admin_bar_links'][] = array(
        'id'    => 'redux-docs',
        'href'  => 'http://docs.reduxframework.com/',
        'title' => __( 'Documentation', 'caynoon_text' ),
    );

    $args['admin_bar_links'][] = array(
        //'id'    => 'redux-support',
        'href'  => 'https://github.com/ReduxFramework/redux-framework/issues',
        'title' => __( 'Support', 'caynoon_text' ),
    );

    $args['admin_bar_links'][] = array(
        'id'    => 'redux-extensions',
        'href'  => 'reduxframework.com/extensions',
        'title' => __( 'Extensions', 'caynoon_text' ),
    );



    Redux::setArgs( $opt_name, $args );

    /*
     * ---> END ARGUMENTS
     */


    /*
     * ---> START HELP TABS
     */

    $tabs = array(
        array(
            'id'      => 'redux-help-tab-1',
            'title'   => __( 'Theme Information 1', 'caynoon_text' ),
            'content' => __( '<p>This is the tab content, HTML is allowed.</p>', 'caynoon_text' )
        ),
        array(
            'id'      => 'redux-help-tab-2',
            'title'   => __( 'Theme Information 2', 'caynoon_text' ),
            'content' => __( '<p>This is the tab content, HTML is allowed.</p>', 'caynoon_text' )
        )
    );
    Redux::setHelpTab( $opt_name, $tabs );

    // Set the help sidebar
    $content = __( '<p>This is the sidebar content, HTML is allowed.</p>', 'caynoon_text' );
    Redux::setHelpSidebar( $opt_name, $content );


    /*
     * <--- END HELP TABS
     */


    /*
     *
     * ---> START SECTIONS
     *
     */

    /*

        As of Redux 3.5+, there is an extensive API. This API can be used in a mix/match mode allowing for

     */

    // -> START Basic Fields
//$cats = get_categories( array( 'orderby' => 'ID', 'hide_empty'=>0 ) );
//$hadik = [];
//foreach($cats as $cat){
//    $hadik[$cat->cat_ID] = $cat->name;
//}
//
//$arfonts = [];
//foreach($fonts as $font){
//    $arfonts[$font['name']] = $font['name'];
//}




Redux::setSection( $opt_name, array(
        'title'      => __( 'General Settings', 'caynoon_text' ),
        'id'         => 'general-settings',
        'subsection' => false,
        'fields'     => array(
                array(
                    'id'       => 'site-title',
                    'type'     => 'text',
                    'title'    => __( 'site title', 'caynoon_text' ),
                    'desc'     => __( 'Please insert site title', 'caynoon_text' ),
                    'default'  => 'site title',
                ),  
                
                array(
                    'id'       => 'site-description',
                    'type'     => 'textarea',
                    'title'    => __( 'site description', 'caynoon_text' ),
                    'desc'     => __( 'Please insert site description', 'caynoon_text' ),
                    'default'  => 'site description',
                ),  

                array(
                    'id'       => 'site-keywords',
                    'type'     => 'textarea',
                    'title'    => __( 'site keywords', 'caynoon_text' ),
                    'desc'     => __( 'Please insert site keywords', 'caynoon_text' ),
                    'default'  => 'site keywords',
                ),  

                array(
                    'id'       => 'selector-color',
                    'type'     => 'color',
                    'title'    => __( 'Selector color', 'caynoon_text' ),
                    'desc'     => __( 'Please choose selector color', 'caynoon_text' ),
                    'default'  => '#dc3d3d',
                ),    
                array(
                    'id'       => 'scroll-color',
                    'type'     => 'color',
                    'title'    => __( 'Scroll color', 'caynoon_text' ),
                    'desc'     => __( 'Please choose scroll color', 'caynoon_text' ),
                    'default'  => '#dc3d3d',
                ),
                array(
                    'id'       => 'product-title-hover-color',
                    'type'     => 'color',
                    'title'    => __( 'Product title hover color', 'caynoon_text' ),
                    'default'  => '#000',
                ),
                array(
                    'id'       => 'logo-url',
                    'type'     => 'media',
                    'url'      => true,
                    'title'    => __( 'Logo', 'caynoon_text' ),
                    'compiler' => 'true',
                    'subtitle' => __( 'Please Choose your logo', 'caynoon_text' ),
                    'default'  => array( 'url' => get_template_directory_uri().'/core/assets/images/logo.png' ),
                ),
                array(
                        'id'       => 'favicon-url',
                        'type'     => 'media',
                        'url'      => true,
                        'title'    => __( 'Favicon', 'caynoon_text' ),
                        'compiler' => 'true',
                        'subtitle' => __( 'Please choose the Favicon', 'caynoon_text' ),
                        'default'  => array( 'url' => get_template_directory_uri().'/core/assets/images/fav.png' )
                ),

     ),
 ) );

 Redux::setSection( $opt_name, array(
    'title'      => __( 'Header Section', 'caynoon_text' ),
    'id'         => 'header-section',
    'icon'      => 'el el-lines',
    'subsection' => false,
    'fields'     => array(
            array(
                'id'       => 'header-background',
                'type'     => 'color',
                'title'    => __( 'Background color', 'caynoon_text' ),
                'desc'     => __( 'Please insert header color', 'caynoon_text' ),
                'default'  => '#000',
            ), 
            array(
                'id'       => 'header-menu-color',
                'type'     => 'color',
                'title'    => __( 'Menu color', 'caynoon_text' ),
                'desc'     => __( 'Please insert menu color', 'caynoon_text' ),
                'default'  => '#FFF',
            ), 
            array(
                'id'       => 'header-cart-background',
                'type'     => 'color',
                'title'    => __( 'Cart color', 'caynoon_text' ),
                'desc'     => __( 'Please insert cart color', 'caynoon_text' ),
                'default'  => '#DC3D3D',
            ), 
 ),
) );

Redux::setSection( $opt_name, array(
    'title'      => __( 'Mobile menu Section', 'caynoon_text' ),
    'id'         => 'mobile-menu-section',
    'icon'      => 'el el-lines',
    'subsection' => false,
    'fields'     => array(
            array(
                'id'       => 'mobile-menu-header-background',
                'type'     => 'color',
                'title'    => __( 'Mobile menu header background', 'caynoon_text' ),
                'default'  => '#f3f3f3',
            ), 
            array(
                'id'       => 'mobile-menu-header-text-color',
                'type'     => 'color',
                'title'    => __( 'Mobile menu header text color', 'caynoon_text' ),
                'default'  => '#000000',
            ), 
            array(
                'id'       => 'mobile-menu-header-arrow-color',
                'type'     => 'color',
                'title'    => __( 'Mobile menu header arrow color', 'caynoon_text' ),
                'default'  => '#000000',
            ), 
            array(
                'id'       => 'mobile-menu-panel-background',
                'type'     => 'color',
                'title'    => __( 'Mobile menu panel background', 'caynoon_text' ),
                'default'  => '#f3f3f3',
            ), 
            array(
                'id'       => 'mobile-menu-panel-text-color',
                'type'     => 'color',
                'title'    => __( 'Mobile menu panel text color', 'caynoon_text' ),
                'default'  => '#777',
            ), 
            array(
                'id'       => 'mobile-menu-panel-arrow-color',
                'type'     => 'color',
                'title'    => __( 'Mobile menu panel arrow color', 'caynoon_text' ),
                'default'  => '#000000',
            ), 
 ),
) );

 Redux::setSection( $opt_name, array(
    'title'      => __( 'Home page', 'caynoon_text' ),
    'id'         => 'home-page',
    'icon'       => 'el el-picture',
    'subsection' => false,
    'fields'     => array(
            array(
                'id'       => 'slider',
                'type'     => 'gallery',
                'title'    => __( 'Slider', 'caynoon_text' ),
                'desc'     => __( 'Please insert slider images', 'caynoon_text' )
            ),
            array(
                'id'       => 'slider-mobile',
                'type'     => 'gallery',
                'title'    => __( 'Mobile slider', 'caynoon_text' ),
                'desc'     => __( 'Please insert mobile slider images', 'caynoon_text' )
            ),
            array(
                'id'       => 'slider-desktop-height',
                'type'     => 'text',
                'title'    => __( 'Slider desktop height', 'caynoon_text' ),
                'desc'     => __( 'Please insert slider desktop height', 'caynoon_text' ),
                'default'  => 400,
            ),
            array(
                'id'       => 'slider-mobile-height',
                'type'     => 'text',
                'title'    => __( 'Slider mobile height', 'caynoon_text' ),
                'desc'     => __( 'Please insert slider mobile height', 'caynoon_text' ),
                'default'  => 200,
            ),
            array(
                'id'       => 'packs-header-picture',
                'type'     => 'media',
                'title'    => __( 'Packs header picture', 'caynoon_text' ),
                'desc'     => __( 'Please select packs header picture', 'caynoon_text' )
            ),
            array(
                'id'       => 'packs-header-picture-height',
                'type'     => 'text',
                'title'    => __( 'Packs header picture height', 'caynoon_text' ),
                'desc'     => __( 'Please insert packs header picture height', 'caynoon_text' )
            ),
            array(
                'id'       => 'image1',
                'type'     => 'media',
                'url'      => true,
                'title'    => __( 'Image 1', 'caynoon_text' ),
                'compiler' => 'true',
            ),

            array(
                'id'       => 'image1-title',
                'type'     => 'text',
                'title'    => __( 'Image 1 title', 'caynoon_text' ),
                'desc'     => __( 'Please insert image title', 'caynoon_text' ),
                'default'  => 'PACKS PRODUCTION',
            ),
            array(
                'id'       => 'image1-url',
                'type'     => 'text',
                'title'    => __( 'Image 1 URL', 'caynoon_text' ),
                'desc'     => __( 'Please insert image url', 'caynoon_text' ),
                'default'  => 'image URL',
            ),
            array(
                'id'       => 'image1-mobile',
                'type'     => 'media',
                'url'      => true,
                'title'    => __( 'Image 1 mobile', 'caynoon_text' ),
                'compiler' => 'true',
            ),
            array(
                'id'       => 'image1-mobile-title',
                'type'     => 'text',
                'title'    => __( 'Image 1 mobile title', 'caynoon_text' ),
                'desc'     => __( 'Please insert image title', 'caynoon_text' ),
                'default'  => 'PACKS PRODUCTION',
            ),
            array(
                'id'       => 'image1-mobile-url',
                'type'     => 'text',
                'title'    => __( 'Image 1 mobile URL', 'caynoon_text' ),
                'desc'     => __( 'Please insert image url', 'caynoon_text' ),
                'default'  => 'image URL',
            ),
            array(
                'id'       => 'image2',
                'type'     => 'media',
                'url'      => true,
                'title'    => __( 'Image 2', 'caynoon_text' ),
                'compiler' => 'true',
            ),

            array(
                'id'       => 'image2-title',
                'type'     => 'text',
                'title'    => __( 'Image 2 title', 'caynoon_text' ),
                'desc'     => __( 'Please insert image title', 'caynoon_text' ),
                'default'  => 'CAMERAS',
            ),

            array(
                'id'       => 'image2-url',
                'type'     => 'text',
                'title'    => __( 'Image 2 URL', 'caynoon_text' ),
                'desc'     => __( 'Please insert image url', 'caynoon_text' ),
                'default'  => 'image URL',
            ), 


            array(
                'id'       => 'image2-mobile',
                'type'     => 'media',
                'url'      => true,
                'title'    => __( 'Image 2 mobile', 'caynoon_text' ),
                'compiler' => 'true',
            ),

            array(
                'id'       => 'image2-mobile-title',
                'type'     => 'text',
                'title'    => __( 'Image 2 mobile title', 'caynoon_text' ),
                'desc'     => __( 'Please insert image title', 'caynoon_text' ),
                'default'  => 'CAMERAS',
            ),

            array(
                'id'       => 'image2-mobile-url',
                'type'     => 'text',
                'title'    => __( 'Image 2 mobile URL', 'caynoon_text' ),
                'desc'     => __( 'Please insert image url', 'caynoon_text' ),
                'default'  => 'image URL',
            ), 

            array(
                'id'       => 'image3',
                'type'     => 'media',
                'url'      => true,
                'title'    => __( 'Image 3', 'caynoon_text' ),
                'compiler' => 'true',
            ),

            array(
                'id'       => 'image3-title',
                'type'     => 'text',
                'title'    => __( 'Image 3 title', 'caynoon_text' ),
                'desc'     => __( 'Please insert image title', 'caynoon_text' ),
                'default'  => 'OPTIQUES',
            ),

            array(
                'id'       => 'image3-url',
                'type'     => 'text',
                'title'    => __( 'Image 3 URL', 'caynoon_text' ),
                'desc'     => __( 'Please insert image url', 'caynoon_text' ),
                'default'  => 'image URL',
            ),

            array(
                'id'       => 'image3-mobile',
                'type'     => 'media',
                'url'      => true,
                'title'    => __( 'Image 3 mobile', 'caynoon_text' ),
                'compiler' => 'true',
            ),

            array(
                'id'       => 'image3-mobile-title',
                'type'     => 'text',
                'title'    => __( 'Image 3 mobile title', 'caynoon_text' ),
                'desc'     => __( 'Please insert image title', 'caynoon_text' ),
                'default'  => 'OPTIQUES',
            ),

            array(
                'id'       => 'image3-mobile-url',
                'type'     => 'text',
                'title'    => __( 'Image 3 mobile URL', 'caynoon_text' ),
                'desc'     => __( 'Please insert image url', 'caynoon_text' ),
                'default'  => 'image URL',
            ), 
            
            array(
                'id'       => 'image4',
                'type'     => 'media',
                'url'      => true,
                'title'    => __( 'Image 4', 'caynoon_text' ),
                'compiler' => 'true',
            ),

            array(
                'id'       => 'image4-title',
                'type'     => 'text',
                'title'    => __( 'Image 4 title', 'caynoon_text' ),
                'desc'     => __( 'Please insert image title', 'caynoon_text' ),
                'default'  => 'STABILISATEURS - STEADICAMS',
            ),

            array(
                'id'       => 'image4-url',
                'type'     => 'text',
                'title'    => __( 'Image 4 URL', 'caynoon_text' ),
                'desc'     => __( 'Please insert image url', 'caynoon_text' ),
                'default'  => 'image URL',
            ), 

            array(
                'id'       => 'image4-mobile',
                'type'     => 'media',
                'url'      => true,
                'title'    => __( 'Image 4 mobile', 'caynoon_text' ),
                'compiler' => 'true',
            ),

            array(
                'id'       => 'image4-mobile-title',
                'type'     => 'text',
                'title'    => __( 'Image 4 mobile title', 'caynoon_text' ),
                'desc'     => __( 'Please insert image title', 'caynoon_text' ),
                'default'  => 'STABILISATEURS - STEADICAMS',
            ),

            array(
                'id'       => 'image4-mobile-url',
                'type'     => 'text',
                'title'    => __( 'Image 4 mobile URL', 'caynoon_text' ),
                'desc'     => __( 'Please insert image url', 'caynoon_text' ),
                'default'  => 'image URL',
            ), 

            array(
                'id'       => 'image5',
                'type'     => 'media',
                'url'      => true,
                'title'    => __( 'Image 5', 'caynoon_text' ),
                'compiler' => 'true',
            ),

            array(
                'id'       => 'image5-title',
                'type'     => 'text',
                'title'    => __( 'Image 5 title', 'caynoon_text' ),
                'desc'     => __( 'Please insert image title', 'caynoon_text' ),
                'default'  => 'SUPPORTS CAMERA - TREPIEDS',
            ),

            array(
                'id'       => 'image5-url',
                'type'     => 'text',
                'title'    => __( 'Image 5 URL', 'caynoon_text' ),
                'desc'     => __( 'Please insert image url', 'caynoon_text' ),
                'default'  => 'image URL',
            ), 

            array(
                'id'       => 'image5-mobile',
                'type'     => 'media',
                'url'      => true,
                'title'    => __( 'Image 5 mobile', 'caynoon_text' ),
                'compiler' => 'true',
            ),

            array(
                'id'       => 'image5-mobile-title',
                'type'     => 'text',
                'title'    => __( 'Image 5 mobile title', 'caynoon_text' ),
                'desc'     => __( 'Please insert image title', 'caynoon_text' ),
                'default'  => 'SUPPORTS CAMERA - TREPIEDS',
            ),

            array(
                'id'       => 'image5-mobile-url',
                'type'     => 'text',
                'title'    => __( 'Image 5 mobile URL', 'caynoon_text' ),
                'desc'     => __( 'Please insert image url', 'caynoon_text' ),
                'default'  => 'image URL',
            ), 

            array(
                'id'       => 'image6',
                'type'     => 'media',
                'url'      => true,
                'title'    => __( 'Image 6', 'caynoon_text' ),
                'compiler' => 'true',
            ),

            array(
                'id'       => 'image6-title',
                'type'     => 'text',
                'title'    => __( 'Image 6 title', 'caynoon_text' ),
                'desc'     => __( 'Please insert image title', 'caynoon_text' ),
                'default'  => 'ACCESSOIRES',
            ),

            array(
                'id'       => 'image6-url',
                'type'     => 'text',
                'title'    => __( 'Image 6 URL', 'caynoon_text' ),
                'desc'     => __( 'Please insert image url', 'caynoon_text' ),
                'default'  => 'image URL',
            ), 

            array(
                'id'       => 'image6-mobile',
                'type'     => 'media',
                'url'      => true,
                'title'    => __( 'Image 6 mobile', 'caynoon_text' ),
                'compiler' => 'true',
            ),

            array(
                'id'       => 'image6-mobile-title',
                'type'     => 'text',
                'title'    => __( 'Image 6 mobile title', 'caynoon_text' ),
                'desc'     => __( 'Please insert image title', 'caynoon_text' ),
                'default'  => 'ACCESSOIRES',
            ),

            array(
                'id'       => 'image6-mobile-url',
                'type'     => 'text',
                'title'    => __( 'Image 6 mobile URL', 'caynoon_text' ),
                'desc'     => __( 'Please insert image url', 'caynoon_text' ),
                'default'  => 'image URL',
            ), 
 ),
) );

Redux::setSection( $opt_name, array(
        'title'     => __( 'Stabilisateurs - Steadicams', 'caynoon_text' ),
        'id'        => 'stabilisateurs-steadicams',
        'icon'      => 'el el-lines',
        'fields'    => array(
                array(
                    'id'       => 'stab-stead-header-image',
                    'type'     => 'media',
                    'title'    => __( 'Header image', 'caynoon_text' )
                ), 
                array(
                    'id'       => 'stab-stead-header-text',
                    'type'     => 'text',
                    'title'    => __( 'Header text', 'caynoon_text' ),
                    'default'  => 'Steadicams / Stabilisateurs'
                ),
                array(
                    'id'       => 'stab-stead-first-category-image',
                    'type'     => 'media',
                    'title'    => __( 'First category image', 'caynoon_text' ),
                ),
                array(
                    'id'       => 'stab-stead-first-category-title',
                    'type'     => 'text',
                    'title'    => __( 'First category title', 'caynoon_text' ),
                    'default'  => 'Steadicams'
                ),
                array(
                    'id'       => 'stab-stead-first-category-link',
                    'type'     => 'text',
                    'title'    => __( 'First category link', 'caynoon_text' ),
                    'default'  => '/category/location/stabilisateurs-steadicam/steadicam'
                ),
                array(
                    'id'       => 'stab-stead-second-category-image',
                    'type'     => 'media',
                    'title'    => __( 'second category image', 'caynoon_text' ),
                ),
                array(
                    'id'       => 'stab-stead-second-category-title',
                    'type'     => 'text',
                    'title'    => __( 'second category title', 'caynoon_text' ),
                    'default'  => 'Stabilisateurs'
                ),
                array(
                    'id'       => 'stab-stead-second-category-link',
                    'type'     => 'text',
                    'title'    => __( 'Second category link', 'caynoon_text' ),
                    'default'  => '/category/location/stabilisateurs-steadicam'
                ),
        )
) );

Redux::setSection( $opt_name, array(
    'title'     => __( 'Pack production', 'caynoon_text' ),
    'id'        => 'pack-production',
    'icon'      => 'el el-lines',
    'fields'    => array(
            array(
                'id'       => 'pack-prod-header-image',
                'type'     => 'media',
                'title'    => __( 'Header image', 'caynoon_text' )
            ), 
            array(
                'id'       => 'pack-prod-header-text',
                'type'     => 'text',
                'title'    => __( 'Header text', 'caynoon_text' ),
                'default'  => 'Pack production'
            ),
            array(
                'id'       => 'pack-prod-first-category-image',
                'type'     => 'media',
                'title'    => __( 'First category image', 'caynoon_text' ),
            ),
            array(
                'id'       => 'pack-prod-first-category-title',
                'type'     => 'text',
                'title'    => __( 'First category title', 'caynoon_text' ),
            ),
            array(
                'id'       => 'pack-prod-first-category-link',
                'type'     => 'text',
                'title'    => __( 'First category link', 'caynoon_text' ),
            ),
            array(
                'id'       => 'pack-prod-second-category-image',
                'type'     => 'media',
                'title'    => __( 'second category image', 'caynoon_text' ),
            ),
            array(
                'id'       => 'pack-prod-second-category-title',
                'type'     => 'text',
                'title'    => __( 'second category title', 'caynoon_text' ),
            ),
            array(
                'id'       => 'pack-prod-second-category-link',
                'type'     => 'text',
                'title'    => __( 'Second category link', 'caynoon_text' ),
            ),
    )
) );

    Redux::setSection( $opt_name, array(
        'title'     => __( 'Supports camera - trepieds', 'caynoon_text' ),
        'id'        => 'supports-camera-trepieds',
        'icon'      => 'el el-lines',
        'fields'    => array(
                array(
                    'id'       => 'supcam-trep-header-image',
                    'type'     => 'media',
                    'title'    => __( 'Header image', 'caynoon_text' )
                ), 
                array(
                    'id'       => 'supcam-trep-header-text',
                    'type'     => 'text',
                    'title'    => __( 'Header text', 'caynoon_text' ),
                    'default'  => 'Support Caméra / Trépieds'
                ),
                array(
                    'id'       => 'supcam-trep-first-category-image',
                    'type'     => 'media',
                    'title'    => __( 'First category image', 'caynoon_text' ),
                ),
                array(
                    'id'       => 'supcam-trep-first-category-title',
                    'type'     => 'text',
                    'title'    => __( 'First category title', 'caynoon_text' ),
                    'default'  => 'Supports Caméra'
                ),
                array(
                    'id'       => 'supcam-trep-first-category-link',
                    'type'     => 'text',
                    'title'    => __( 'First category link', 'caynoon_text' )
                ),
                array(
                    'id'       => 'supcam-trep-first-category-mobile-image',
                    'type'     => 'media',
                    'title'    => __( 'First category mobile image', 'caynoon_text' ),
                ),
                array(
                    'id'       => 'supcam-trep-first-category-mobile-title',
                    'type'     => 'text',
                    'title'    => __( 'First category mobile title', 'caynoon_text' ),
                    'default'  => 'Supports Caméra'
                ),
                array(
                    'id'       => 'supcam-trep-first-category-mobile-link',
                    'type'     => 'text',
                    'title'    => __( 'First category mobile link', 'caynoon_text' ),
                ),
                array(
                    'id'       => 'supcam-trep-second-category-image',
                    'type'     => 'media',
                    'title'    => __( 'second category image', 'caynoon_text' )
                ),
                array(
                    'id'       => 'supcam-trep-second-category-title',
                    'type'     => 'text',
                    'title'    => __( 'second category title', 'caynoon_text' ),
                    'default'  => 'Trépieds'
                ),
                array(
                    'id'       => 'supcam-trep-second-category-link',
                    'type'     => 'text',
                    'title'    => __( 'Second category link', 'caynoon_text' ),
                ),
                array(
                    'id'       => 'supcam-trep-second-category-mobile-image',
                    'type'     => 'media',
                    'title'    => __( 'second category mobile image', 'caynoon_text' )
                ),
                array(
                    'id'       => 'supcam-trep-second-category-mobile-title',
                    'type'     => 'text',
                    'title'    => __( 'second category mobile title', 'caynoon_text' ),
                    'default'  => 'Trépieds'
                ),
                array(
                    'id'       => 'supcam-trep-second-category-mobile-link',
                    'type'     => 'text',
                    'title'    => __( 'Second category mobile link', 'caynoon_text' )
                ),
        )
    ) );

    Redux::setSection( $opt_name, array(
        'title'     => __( 'Accessories', 'caynoon_text' ),
        'id'        => 'accessories',
        'icon'      => 'el el-lines',
        'fields'    => array(
                array(
                    'id'       => 'accessories-header-image',
                    'type'     => 'media',
                    'title'    => __( 'Header image', 'caynoon_text' )
                ), 
                array(
                    'id'       => 'accessories-header-text',
                    'type'     => 'text',
                    'title'    => __( 'Header text', 'caynoon_text' ),
                    'default'  => 'Accessoires'
                ),
        )
    ) );

    Redux::setSection( $opt_name, array(
        'title'     => __( 'Cart categories', 'caynoon_text' ),
        'id'        => 'cart-categories',
        'icon'      => 'el el-lines',
        'fields'    => array(
            array(
                'id'       => 'pack-production-category',
                'type'     => 'text',
                'title'    => __( 'Pack production category', 'caynoon_text' ),
                'default'  => 'pack'
            ),
            array(
                'id'       => 'prestation-category',
                'type'     => 'text',
                'title'    => __( 'Prestation category', 'caynoon_text' ),
                'default'  => 'prestation'
            ),
        )
    ) );

    Redux::setSection( $opt_name, array(
        'title'     => __( 'Search', 'caynoon_text' ),
        'id'        => 'search',
        'icon'      => 'el el-lines',
        'fields'    => array(
            array(
                'id'       => 'search-title',
                'type'     => 'text',
                'title'    => __( 'Mobile search title', 'caynoon_text' ),
                'default'  => 'Recherche'
            ),
            array(
                'id'       => 'search-button-text',
                'type'     => 'text',
                'title'    => __( 'Search button text', 'caynoon_text' ),
                'default'  => 'C\'est partie'
            ),
            array(
                'id'       => 'search-text',
                'type'     => 'text',
                'title'    => __( 'Search text', 'caynoon_text' ),
                'default'  => 'Résultats de recherche pour'
            ),
        )
    ) );

    Redux::setSection( $opt_name, array(
        'title'     => __( 'Footer Section', 'caynoon_text' ),
        'id'        => 'footer-section',
        'icon'      => 'el el-lines',
        'fields'    => array(
                array(
                    'id'       => 'footer-color',
                    'type'     => 'color',
                    'title'    => __( 'Footer color', 'caynoon_text' ),
                    'default'  => '#000'

                ),   
                
                array(
                    'id'       => 'top-arrow-color',
                    'type'     => 'color',
                    'title'    => __( 'Go top arrow', 'caynoon_text' ),
                    'default'  => '#dc3d3d'
                ),
                array(
                    'id'       => 'social-media-background',
                    'type'     => 'color',
                    'title'    => __( 'Social media background', 'caynoon_text' ),
                    'default'  => '#dc3d3d'
                ),
                array(
                    'id'       => 'footer-about-title',
                    'type'     => 'text',
                    'title'    => __( 'About title', 'caynoon_text' ),
                    'default'  => 'À propos'
                ),
                array(
                    'id'       => 'footer-about',
                    'type'     => 'editor',
                    'title'    => __( 'About', 'caynoon_text' ),
                    'default'  => 'Caestus Studios vous accompagne et vous propose les meilleurs conseils et solutions pour vos productions cinématographiques et audiovisuelles avec des possibilités de livraison à travers tout le Maroc.'
                ),
                array(
                    'id'       => 'footer-contact-title',
                    'type'     => 'text',
                    'title'    => __( 'Contact title', 'caynoon_text' ),
                    'default'  => 'Nous contacter'
                ),
                array(
                    'id'       => 'footer-phone',
                    'type'     => 'text',
                    'title'    => __( 'Phone', 'caynoon_text' ),
                    'default'  => '+212 (0) 5 28 23 37 75'
                ), 
                array(
                    'id'       => 'footer-email',
                    'type'     => 'text',
                    'title'    => __( 'Email', 'caynoon_text' ),
                    'default'  => 'contact@caestus.ma'
                ), 
                array(
                    'id'       => 'footer-address',
                    'type'     => 'text',
                    'title'    => __( 'Address', 'caynoon_text' ),
                    'default'  => 'Angle avenue Moukawama et avenue Kadi Ayad. Résidence Yasmine Bloc A 8ème Etage N°95 80000, Agadir , Maroc'
                ),
                array(
                    'id'       => 'footer-social-media-title',
                    'type'     => 'text',
                    'title'    => __( 'Social media title', 'caynoon_text' ),
                    'default'  => 'Nous suivre'
                ),
                
                array(
                    'id'       => 'footer-copy-rights',
                    'type'     => 'text',
                    'title'    => __( 'Footer Copyrights', 'caynoon_text' ),
                    'default'  => '2018 (c) All rights reserved ',
                ),  
        )
    ) );







    Redux::setSection( $opt_name, array(
        'title'            => __( 'Social Media Links', 'caynoon_text' ),
        'id'               => 'basic',
        'customizer_width' => '400px',
        'icon'             => 'el el-link',
        'fields'     => array(
                array(
                    'id'       => 'facebook',
                    'type'     => 'text',
                    'title'    => __( 'Facebook Account', 'caynoon_text' ),
                    'default'  => 'http://www.facebook.com'

                ),   
                array(
                    'id'       => 'twitter',
                    'type'     => 'text',
                    'title'    => __( 'twitter Account', 'caynoon_text' ),
                    'default'  => 'http://www.twitter.com'
                ),
                array(
                    'id'       => 'linkedin',
                    'type'     => 'text',
                    'title'    => __( 'linkedin Account', 'caynoon_text' ),
                    'default'  => 'http://www.linkedin.com'
                ),        
                array(
                    'id'       => 'pinterest',
                    'type'     => 'text',
                    'title'    => __( 'pinterest Account', 'caynoon_text' ),
                    'default'  => 'http://www.pinitrest.com'
                ),
                array(
                    'id'       => 'instagram',
                    'type'     => 'text',
                    'title'    => __( 'instagram Account', 'caynoon_text' ),
                    'default'  => 'http://www.instagram.com'
        
                ),        
                array(
                    'id'       => 'googleplus',
                    'type'     => 'text',
                    'title'    => __( 'googleplus Account', 'caynoon_text' ),
                    'default'  => 'http://www.google.com'
                ),  
                array(
                    'id'       => 'youtube',
                    'type'     => 'text',
                    'title'    => __( 'youtube Account', 'caynoon_text' ),
                    'default'  => 'http://www.youtube.com'
                ),  
                array(
                    'id'       => 'soundcloud',
                    'type'     => 'text',
                    'title'    => __( 'soundcloud Account', 'caynoon_text' ),
                    'default'  => 'http://www.youtube.com'
                ),             
        )
    ) );



  










  
  

    /*
     * <--- END SECTIONS
     */


    /*
     *
     * YOU MUST PREFIX THE FUNCTIONS BELOW AND ACTION FUNCTION CALLS OR ANY OTHER CONFIG MAY OVERRIDE YOUR CODE.
     *
     */

    /*
    *
    * --> Action hook examples
    *
    */

    // If Redux is running as a plugin, this will remove the demo notice and links
    //add_action( 'redux/loaded', 'remove_demo' );

    // Function to test the compiler hook and demo CSS output.
    // Above 10 is a priority, but 2 in necessary to include the dynamically generated CSS to be sent to the function.
    //add_filter('redux/options/' . $opt_name . '/compiler', 'compiler_action', 10, 3);

    // Change the arguments after they've been declared, but before the panel is created
    //add_filter('redux/options/' . $opt_name . '/args', 'change_arguments' );

    // Change the default value of a field after it's been set, but before it's been useds
    //add_filter('redux/options/' . $opt_name . '/defaults', 'change_defaults' );

    // Dynamically add a section. Can be also used to modify sections/fields
    //add_filter('redux/options/' . $opt_name . '/sections', 'dynamic_section');

    /**
     * This is a test function that will let you see when the compiler hook occurs.
     * It only runs if a field    set with compiler=>true is changed.
     * */
    if ( ! function_exists( 'compiler_action' ) ) {
        function compiler_action( $options, $css, $changed_values ) {
            echo '<h1>The compiler hook has run!</h1>';
            echo "<pre>";
            print_r( $changed_values ); // Values that have changed since the last save
            echo "</pre>";
            //print_r($options); //Option values
            //print_r($css); // Compiler selector CSS values  compiler => array( CSS SELECTORS )
        }
    }

    /**
     * Custom function for the callback validation referenced above
     * */
    if ( ! function_exists( 'redux_validate_callback_function' ) ) {
        function redux_validate_callback_function( $field, $value, $existing_value ) {
            $error   = false;
            $warning = false;

            //do your validation
            if ( $value == 1 ) {
                $error = true;
                $value = $existing_value;
            } elseif ( $value == 2 ) {
                $warning = true;
                $value   = $existing_value;
            }

            $return['value'] = $value;

            if ( $error == true ) {
                $field['msg']    = 'your custom error message';
                $return['error'] = $field;
            }

            if ( $warning == true ) {
                $field['msg']      = 'your custom warning message';
                $return['warning'] = $field;
            }

            return $return;
        }
    }

    /**
     * Custom function for the callback referenced above
     */
    if ( ! function_exists( 'redux_my_custom_field' ) ) {
        function redux_my_custom_field( $field, $value ) {
            print_r( $field );
            echo '<br/>';
            print_r( $value );
        }
    }

    /**
     * Custom function for filtering the sections array. Good for child themes to override or add to the sections.
     * Simply include this function in the child themes functions.php file.
     * NOTE: the defined constants for URLs, and directories will NOT be available at this point in a child theme,
     * so you must use get_template_directory_uri() if you want to use any of the built in icons
     * */
    if ( ! function_exists( 'dynamic_section' ) ) {
        function dynamic_section( $sections ) {
            //$sections = array();
            $sections[] = array(
                'title'  => __( 'Section via hook', 'caynoon_text' ),
                'desc'   => __( '<p class="description">This is a section created by adding a filter to the sections array. Can be used by child themes to add/remove sections from the options.</p>', 'caynoon_text' ),
                'icon'   => 'el el-paper-clip',
                // Leave this as a blank section, no options just some intro text set above.
                'fields' => array()
            );

            return $sections;
        }
    }

    /**
     * Filter hook for filtering the args. Good for child themes to override or add to the args array. Can also be used in other functions.
     * */
    if ( ! function_exists( 'change_arguments' ) ) {
        function change_arguments( $args ) {
            //$args['dev_mode'] = true;

            return $args;
        }
    }

    /**
     * Filter hook for filtering the default value of any given field. Very useful in development mode.
     * */
    if ( ! function_exists( 'change_defaults' ) ) {
        function change_defaults( $defaults ) {
            $defaults['str_replace'] = 'Testing filter hook!';

            return $defaults;
        }
    }

    /**
     * Removes the demo link and the notice of integrated demo from the redux-framework plugin
     */
    if ( ! function_exists( 'remove_demo' ) ) {
        function remove_demo() {
            // Used to hide the demo mode link from the plugin page. Only used when Redux is a plugin.
            if ( class_exists( 'ReduxFrameworkPlugin' ) ) {
                remove_filter( 'plugin_row_meta', array(
                    ReduxFrameworkPlugin::instance(),
                    'plugin_metalinks'
                ), null, 2 );

                // Used to hide the activation notice informing users of the demo panel. Only used when Redux is a plugin.
                remove_action( 'admin_notices', array( ReduxFrameworkPlugin::instance(), 'admin_notices' ) );
            }
        }
    }

