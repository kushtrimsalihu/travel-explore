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

// Register 'Team Members' post type
function my_first_post_type() {
    $args = array(
        'labels' => array(
            'name' => 'Team Members',
            'singular_name' => 'Team Member',
        ),
        'supports' => array(
            'title',
            'editor',
            'excerpt',
            'thumbnail',
            'revisions',
        ),
        'hierarchical' => false,
        'public' => true,
        'menu_icon' => 'dashicons-businessperson',
        'has_archive' => true,
    );
    register_post_type('team_member', $args);
}
add_action('init', 'my_first_post_type');

// Register 'Locations' post type
function my_second_post_type() {
    $args = array(
        'labels' => array(
            'name' => 'Locations',
            'singular_name' => 'Location',
        ),
        'supports' => array(
            'title',
            'editor',
            'excerpt',
            'thumbnail',
            'revisions',
        ),
        'hierarchical' => false,
        'public' => true,
        'menu_icon' => 'dashicons-location',
        'has_archive' => true,
    );
    register_post_type('location', $args);
}
add_action('init', 'my_second_post_type');

?>
