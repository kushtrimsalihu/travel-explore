<?php

function theme_enqueue_styles() {
    wp_enqueue_style('tailwindcss', get_template_directory_uri() . '/assets/css/app.css', array(), '1.0.0', 'all');
}
add_action('wp_enqueue_scripts', 'theme_enqueue_styles');


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
