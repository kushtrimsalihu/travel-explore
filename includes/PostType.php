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
        // Register Category taxonomy
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


        // Register Tag taxonomy
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
}