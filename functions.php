<?php

// Enqueuing
function load_css()
{

    wp_register_style('bootstrap', get_template_directory_uri() . '/assets', [], 1, 'all');
    wp_enqueue_style('bootstrap');

    wp_register_style('main', get_template_directory_uri() . '/assets', [], 1, 'all');
    wp_enqueue_style('main');

}
add_action('wp_enqueue_scripts', 'load_css');

function load_js()
{
    wp_enqueue_script('jquery');

    wp_register_script('bootstrap', get_template_directory_uri() . '/js/bootstrap.min.js', ['jquery'], 1, true);
    wp_enqueue_script('bootstrap');
}
add_action('wp_enqueue_scripts', 'load_js');


// Nav Menus
register_nav_menus( array(
    'top-menu' => __( 'Top Menu', 'theme' ),
    'footer-menu' => __( 'Footer Menu', 'theme' ),
) );

// Theme Support
add_theme_support('menus');
add_theme_support( 'post-thumbnails' );

// Image Sizes
add_image_size('small', 600, 600, false);


function my_first_post_type(){

    $args = array(
        'labels'=> array(
            'name'=>'Team Members',
            'singluar_name'=>'Team Member'
        ),
        'supports' => array(
			'title',
			'editor',
			'excerpt',
			'thumbnail',
			'revisions',
		),
        'hierarchical' => false,
        'public'=>true,
        'menu_icon'=>'dashicons-businessperson',
        'has_archive'=>true,
        'supports'=>array('title','editor','thumbnail')
    );
    register_post_type('Team member',$args);
}
add_action('init','my_first_post_type');

function my_second_post_type(){

    $args = array(
        'labels'=> array(
            'name'=>'Locations',
            'singluar_name'=>'Location'
        ),
        'supports' => array(
			'title',
			'editor',
			'excerpt',
			'thumbnail',
			'revisions',
		),
        'hierarchical' => false,
        'public'=>true,
        'menu_icon'   => 'dashicons-location',
        'has_archive'=>true,
        'supports'=>array('title','editor','thumbnail')
    );
    register_post_type('Location',$args);
}
add_action('init','my_second_post_type');