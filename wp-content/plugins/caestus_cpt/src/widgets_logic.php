<?php



// dynamically add some widget zones for pages using some templates
add_action('sidebar_admin_setup', 'wpse_76601_actionSidebarAdminSetup');

/**
* handle action sidebar_admin_setup to check for dynamically created sidebars
* and make sure they're registered
*/
function wpse_76601_actionSidebarAdminSetup() {
    global $post;
    global $wp_registered_sidebars;

    // find all pages that use template with dynamic widget zone
    $query = new WP_Query(array(
        'meta_key' => '_wp_page_template',
        'meta_value' => 'page-caestus.php',
        'post_type' => 'page',
        'nopaging' => true,
        'orderby' => 'title',
        'order' => 'ASC',
    ));

    while ($query->have_posts()) {
        $query->the_post();

        $id = "wpse-{$post->ID}-aside";

        // register any that aren't already registered
        if (!isset($wp_registered_sidebars[$id])) {
            register_sidebar( array(
                'name' => $post->post_title . ' - caestus page',
                'id' => $id,
                'description' => $post->post_title . ' page builder ',
            ) );
        }
    }
    wp_reset_postdata();
}