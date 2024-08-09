<?php

class PostType {

    public function register_alternative_tourism_cpt() {
        $labels = [
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
        ];

        $args = [
            'labels' => $labels,
            'public' => true,
            'show_admin_column' => true,
            'publicly_queryable' => true,
            'show_ui' => true,
            'show_in_menu' => true,
            'query_var' => true,
            'rewrite' => ['slug' => 'alternative-tourism'],
            'capability_type' => 'post',
            'has_archive' => true,
            'hierarchical' => false,
            'menu_position' => null,
            'supports' => ['title', 'editor', 'custom-fields', 'thumbnail'],
            'taxonomies' => ['alternative_tourism_category', 'alternative_tourism_tag'],
            'menu_icon' => 'dashicons-palmtree',
            'show_in_rest' => true,
        ];

        register_post_type('alternative_tourism', $args);
    }

    public function register_alternative_tourism_taxonomies() {
        
        $labels = [
            'name' => 'Alternative Tourism Categories',
            'singular_name' => 'Alternative Tourism Category',
            'search_items' => 'Search Alternative Tourism Categories',
            'all_items' => 'All Alternative Tourism Categories',
            'parent_item' => 'Parent Alternative Tourism Category',
            'parent_item_colon' => 'Parent Alternative Tourism Category:',
            'edit_item' => 'Edit Alternative Tourism Category',
            'update_item' => 'Update Alternative Tourism Category',
            'add_new_item' => 'Add New Alternative Tourism Category',
            'new_item_name' => 'New Alternative Tourism Category Name',
            'menu_name' => 'Alternative Tourism Categories',
        ];

        $args_category = [
            'hierarchical' => true,
            'labels' => $labels,
            'show_ui' => true,
            'show_admin_column' => true,
            'query_var' => true,
            'show_in_rest' => true,
            'rewrite' => ['slug' => 'tourism-category'],
        ];
        register_taxonomy('alternative_tourism_category', ['alternative_tourism'], $args_category);


        $labels = [
            'name' => 'Alternative Tourism Tags',
            'singular_name' => 'Alternative Tourism Tag',
            'search_items' => 'Search Alternative Tourism Tags',
            'all_items' => 'All Alternative Tourism Tags',
            'edit_item' => 'Edit Alternative Tourism Tag',
            'update_item' => 'Update Alternative Tourism Tag',
            'add_new_item' => 'Add New Alternative Tourism Tag',
            'new_item_name' => 'New Alternative Tourism Tag Name',
            'menu_name' => 'Alternative Tourism Tags',
        ];

        $args_tag = [
            'hierarchical' => false,
            'labels' => $labels,
            'show_ui' => true,
            'show_in_rest' => true,
            'show_admin_column' => true,
            'query_var' => true,
            'rewrite' => ['slug' => 'tourism-tag'],
        ];
        register_taxonomy('alternative_tourism_tag', ['alternative_tourism'], $args_tag);

    }

    /**
     * Register Blog Custom Post Type
     */
    public function register_blog_post_type() {
        $labels = [
            'name' => 'Blog',
            'singular_name' => 'Blog',
            'menu_name' => 'Blog',
            'name_admin_bar' => 'Blog',
            'add_new' => 'Add New Blog',
            'add_new_item' => 'Add New Blog',
            'new_item' => 'New Blog',
            'edit_item' => 'Edit Blog',
            'view_item' => 'View Blog',
            'all_items' => 'All Blog',
            'search_items' => 'Search Blogs',
            'parent_item_colon' => 'Parent Blog:',
            'not_found' => 'No Blog found.',
            'not_found_in_trash' => 'No Blog found in Trash.',
        ];

        $args = [
            'labels' => $labels,
            'public' => true,
            'show_admin_column' => true,
            'publicly_queryable' => true,
            'show_ui' => true,
            'show_in_menu' => true,
            'query_var' => true,
            'rewrite' => ['slug' => 'blog'],
            'capability_type' => 'post',
            'has_archive' => true,
            'hierarchical' => false,
            'menu_position' => null,
            'supports' => ['title', 'editor', 'custom-fields', 'thumbnail'],
            'taxonomies' => ['blog_category', 'blog_tag'],
            'menu_icon' => 'dashicons-welcome-write-blog',
            'show_in_rest' => true,
        ];

        register_post_type('blog', $args);
    }

    public function blog_category() {
        $labels = [
            'name' => 'Blog Categories',
            'singular_name' => 'Blog Category',
            'search_items' => 'Search Blog Categories',
            'all_items' => 'All Blog Categories',
            'parent_item' => 'Parent Blog Category',
            'parent_item_colon' => 'Parent Blog Category:',
            'edit_item' => 'Edit Blog Category',
            'update_item' => 'Update Blog Category',
            'add_new_item' => 'Add New Blog Category',
            'new_item_name' => 'New Blog Category Name',
            'menu_name' => 'Blog Categories',
        ];

        $args_category = [
            'hierarchical' => true,
            'labels' => $labels,
            'show_ui' => true,
            'show_admin_column' => true,
            'query_var' => true,
            'show_in_rest' => true,
            'rewrite' => ['slug' => 'blog-category'],
        ];
        register_taxonomy('blog_category', ['blog'], $args_category);


        $labels = [
            'name' => 'Blog Tags',
            'singular_name' => 'Blog Tag',
            'search_items' => 'Search Blog Tags',
            'all_items' => 'All Blog Tags',
            'edit_item' => 'Edit Blog Tag',
            'update_item' => 'Update Blog Tag',
            'add_new_item' => 'Add Blog Tag',
            'new_item_name' => 'New Blog Tag Name',
            'menu_name' => 'Blog Tags',
        ];

        $args_tag = [
            'hierarchical' => false,
            'labels' => $labels,
            'show_ui' => true,
            'show_in_rest' => true,
            'show_admin_column' => true,
            'query_var' => true,
            'rewrite' => ['slug' => 'blog-tag'],
        ];
        register_taxonomy('blog_tag', ['blog'], $args_tag);

    }


    function register_user_journey_post_type() {
        $labels = array(
            'name'                  => _x('User Journeys', 'Post type general name', 'textdomain'),
            'singular_name'         => _x('User Journey', 'Post type singular name', 'textdomain'),
            'menu_name'             => _x('User Journeys', 'Admin Menu text', 'textdomain'),
            'name_admin_bar'        => _x('User Journey', 'Add New on Toolbar', 'textdomain'),
            'add_new'               => __('Add New', 'textdomain'),
            'add_new_item'          => __('Add New User Journey', 'textdomain'),
            'new_item'              => __('New User Journey', 'textdomain'),
            'edit_item'             => __('Edit User Journey', 'textdomain'),
            'view_item'             => __('View User Journey', 'textdomain'),
            'all_items'             => __('All User Journeys', 'textdomain'),
            'search_items'          => __('Search User Journeys', 'textdomain'),
            'parent_item_colon'     => __('Parent User Journeys:', 'textdomain'),
            'not_found'             => __('No user journeys found.', 'textdomain'),
            'not_found_in_trash'    => __('No user journeys found in Trash.', 'textdomain'),
            'featured_image'        => _x('User Journey Cover Image', 'Overrides the “Featured Image” phrase for this post type. Added in 4.3', 'textdomain'),
            'set_featured_image'    => _x('Set cover image', 'Overrides the “Set featured image” phrase for this post type. Added in 4.3', 'textdomain'),
            'remove_featured_image' => _x('Remove cover image', 'Overrides the “Remove featured image” phrase for this post type. Added in 4.3', 'textdomain'),
            'use_featured_image'    => _x('Use as cover image', 'Overrides the “Use as featured image” phrase for this post type. Added in 4.3', 'textdomain'),
            'archives'              => _x('User Journey archives', 'The post type archive label used in nav menus. Default “Post Archives”. Added in 4.4', 'textdomain'),
            'insert_into_item'      => _x('Insert into user journey', 'Overrides the “Insert into post”/”Insert into page” phrase (used when inserting media into a post). Added in 4.4', 'textdomain'),
            'uploaded_to_this_item' => _x('Uploaded to this user journey', 'Overrides the “Uploaded to this post”/”Uploaded to this page” phrase (used when viewing media attached to a post). Added in 4.4', 'textdomain'),
            'filter_items_list'     => _x('Filter user journeys list', 'Screen reader text for the filter links heading on the post type listing screen. Default “Filter posts list”/”Filter pages list”. Added in 4.4', 'textdomain'),
            'items_list_navigation' => _x('User journeys list navigation', 'Screen reader text for the pagination heading on the post type listing screen. Default “Posts list navigation”/”Pages list navigation”. Added in 4.4', 'textdomain'),
            'items_list'            => _x('User journeys list', 'Screen reader text for the items list heading on the post type listing screen. Default “Posts list”/”Pages list”. Added in 4.4', 'textdomain'),
        );
    
        $args = array(
            'labels'             => $labels,
            'public'             => true,
            'publicly_queryable' => true,
            'show_ui'            => true,
            'show_in_menu'       => true,
            'query_var'          => true,
            'rewrite'            => array('slug' => 'user-journey'),
            'capability_type'    => 'post',
            'has_archive'        => true,
            'hierarchical'       => false,
            'menu_position'      => null,
            'supports'           => array('title', 'thumbnail', 'comments'),
            'menu_icon' => 'dashicons-format-chat',
        );
    
        register_post_type('user_journey', $args);
    }
    
    function register_reservation_post_type() {
        $labels = array(
            'name'                  => _x('Reservations', 'Post type general name', 'textdomain'),
            'singular_name'         => _x('Reservation', 'Post type singular name', 'textdomain'),
            'menu_name'             => _x('Reservations', 'Admin Menu text', 'textdomain'),
            'name_admin_bar'        => _x('Reservation', 'Add New on Toolbar', 'textdomain'),
            'add_new'               => __('Add New', 'textdomain'),
            'add_new_item'          => __('Add New Reservation', 'textdomain'),
            'new_item'              => __('New Reservation', 'textdomain'),
            'edit_item'             => __('Edit Reservation', 'textdomain'),
            'view_item'             => __('View Reservation', 'textdomain'),
            'all_items'             => __('All Reservations', 'textdomain'),
            'search_items'          => __('Search Reservations', 'textdomain'),
            'parent_item_colon'     => __('Parent Reservations:', 'textdomain'),
            'not_found'             => __('No reservations found.', 'textdomain'),
            'not_found_in_trash'    => __('No reservations found in Trash.', 'textdomain'),
            'featured_image'        => _x('Reservation Cover Image', 'Overrides the “Featured Image” phrase for this post type. Added in 4.3', 'textdomain'),
            'set_featured_image'    => _x('Set cover image', 'Overrides the “Set featured image” phrase for this post type. Added in 4.3', 'textdomain'),
            'remove_featured_image' => _x('Remove cover image', 'Overrides the “Remove featured image” phrase for this post type. Added in 4.3', 'textdomain'),
            'use_featured_image'    => _x('Use as cover image', 'Overrides the “Use as featured image” phrase for this post type. Added in 4.3', 'textdomain'),
            'archives'              => _x('Reservation archives', 'The post type archive label used in nav menus. Default “Post Archives”. Added in 4.4', 'textdomain'),
            'insert_into_item'      => _x('Insert into reservation', 'Overrides the “Insert into post”/”Insert into page” phrase (used when inserting media into a post). Added in 4.4', 'textdomain'),
            'uploaded_to_this_item' => _x('Uploaded to this reservation', 'Overrides the “Uploaded to this post”/”Uploaded to this page” phrase (used when viewing media attached to a post). Added in 4.4', 'textdomain'),
            'filter_items_list'     => _x('Filter reservations list', 'Screen reader text for the filter links heading on the post type listing screen. Default “Filter posts list”/”Filter pages list”. Added in 4.4', 'textdomain'),
            'items_list_navigation' => _x('Reservations list navigation', 'Screen reader text for the pagination heading on the post type listing screen. Default “Posts list navigation”/”Pages list navigation”. Added in 4.4', 'textdomain'),
            'items_list'            => _x('Reservations list', 'Screen reader text for the items list heading on the post type listing screen. Default “Posts list”/”Pages list”. Added in 4.4', 'textdomain'),
        );
    
        $args = array(
            'labels'             => $labels,
            'public'             => true,
            'publicly_queryable' => true,
            'show_ui'            => true,
            'show_in_menu'       => true,
            'query_var'          => true,
            'rewrite'            => array('slug' => 'reservation'),
            'capability_type'    => 'post',
            'has_archive'        => true,
            'hierarchical'       => false,
            'menu_position'      => null,
            'supports'           => array('title', 'editor', 'custom-fields'),
            'menu_icon'          => 'dashicons-calendar-alt',
        );
    
        register_post_type('reservation', $args);
    }
    
}