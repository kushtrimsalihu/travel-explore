<?php
add_filter('acf/settings/save_json', 'my_acf_json_save_point');
function my_acf_json_save_point($path) {
    $path = get_stylesheet_directory() . '/acf-json';
    return $path;
}

add_filter('acf/settings/load_json', 'my_acf_json_load_point');
function my_acf_json_load_point($paths) {
    unset($paths[0]);
    $paths[] = get_stylesheet_directory() . '/acf-json';
    return $paths;
}

function travel_enqueue_scripts() {
    wp_enqueue_style('theme-style', get_template_directory_uri() . '/dist/css/app.css', array(), filemtime(get_template_directory() . '/dist/css/app.css'), 'all');
    wp_enqueue_script('theme-script', get_template_directory_uri() . '/dist/js/app.js', array(), filemtime(get_template_directory() . '/dist/js/app.js'), true);
}
add_action('wp_enqueue_scripts', 'travel_enqueue_scripts');


// Register navigation menus
register_nav_menus(array(
    'top-menu' => __('Top Menu', 'theme'),
    'footer-menu' => __('Footer Menu', 'theme'),
));

// Add theme support
add_theme_support('menus');
add_theme_support('post-thumbnails');

// Add custom image size
add_image_size('small', 600, 600, false);



// Register 'Alternative Torism' post type
function register_alternative_tourism_cpt() {
    $labels = array(
        'name' => 'Alternative Tourisms',
        'singular_name' => 'Alternative Tourism',
        'menu_name' => 'Alternative Tourisms',
        'name_admin_bar' => 'Alternative Tourism',
        'add_new' => 'Add New',
        'add_new_item' => 'Add New Alternative Tourism',
        'new_item' => 'New Alternative Tourism',
        'edit_item' => 'Edit Alternative Tourism',
        'view_item' => 'View Alternative Tourism',
        'all_items' => 'All Alternative Tourisms',
        'search_items' => 'Search Alternative Tourisms',
        'parent_item_colon' => 'Parent Alternative Tourisms:',
        'not_found' => 'No alternative tourisms found.',
        'not_found_in_trash' => 'No alternative tourisms found in Trash.',
    );

    $args = array(
        'labels' => $labels,
        'public' => true,
        'publicly_queryable' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'query_var' => true,
        'rewrite' => array('slug' => 'alternative-tourism'),
        'capability_type' => 'post',
        'has_archive' => true,
        'hierarchical' => false,
        'menu_position' => null,
        'supports' => array('title', 'editor', 'custom-fields', 'thumbnail'),
        'menu_icon' => 'dashicons-palmtree',
        'show_in_rest' => true,
    );

    register_post_type('alternative_tourism', $args);
}

add_action('init', 'register_alternative_tourism_cpt');

?>
