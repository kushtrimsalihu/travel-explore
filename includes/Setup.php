<?php

namespace App;
use WP_Query;
use Timber\Timber;

class Setup {
    public function theme_supports() {
        add_theme_support('title-tag');
        add_theme_support('post-thumbnails');
        add_image_size('small', 600, 600, false);
        add_theme_support('html5', [
            'comment-form',
            'comment-list',
            'gallery',
        ]);
        add_theme_support('post-formats', [
            'aside',
            'image',
            'video',
            'quote',
            'link',
            'gallery',
            'audio',
        ]);
        add_theme_support('menus');
    }

    public function register_navigation_menus() {
        register_nav_menus([
            'top-menu' => __('Top Menu', 'theme'),
            'footer-menu' => __('Footer Menu', 'theme'),
            'footer-menu-product' => __('Footer Menu Product', 'theme'),
            'footer-menu-company' => __('Footer Menu Company', 'theme'),
            'footer-menu-legals' => __('Footer Menu Legals', 'theme'),
            'footer-menu-social-media' => __('Footer Menu Social Media', 'theme'),
        ]);
    }

    public function my_acf_json_save_point($path) {
        return get_stylesheet_directory() . '/acf-json';
    }

    public function my_acf_json_load_point($paths) {
        unset($paths[0]);
        $paths[] = get_stylesheet_directory() . '/acf-json';
        return $paths;
    }

    public function live_search_handler() {
        if (!isset($_GET['query'])) {
            wp_die('No query parameter');
        }

        $query = sanitize_text_field($_GET['query']);
        $args = [
            's' => $query,
            'posts_per_page' => 10,
            'post_type' => ['post', 'page', 'alternative_tourism'],
            'post_status' => 'publish',
        ];

        $search_query = new \WP_Query($args);

        if ($search_query->have_posts()) {
            echo '<ul>';
            while ($search_query->have_posts()) {
                $search_query->the_post();
                echo '<li class="search-result-item m-2 flex item-center p-2 gap-5 hover:bg-light-hover">';
                if(get_the_post_thumbnail()){ echo '<div class="search-result-thumbnail w-1/12">' . get_the_post_thumbnail(null, 'full', ['class' => 'w-full']) . '</div>';};
                echo '<div class="search-result-content flex items-center">';
                echo '<a href="' . get_permalink() . '" class="font-roboto font-medium">' . get_the_title() . '</a>';
                echo '</div>';
                echo '</li>';
            }
            echo '</ul>';
        } else {
            echo 'No results found';
        }

        wp_reset_postdata();
        wp_die();
    }

    public function advanced_custom_search($where, $wp_query) {
        global $wpdb;

        if (empty($where)) {
            return $where;
        }

        $terms = $wp_query->query_vars['s'];
        $exploded = explode(' ', $terms);

        if ($exploded === FALSE || count($exploded) == 0) {
            $exploded = [$terms];
        }

        foreach ($exploded as $tag) {
            $where .= " AND (
                ( $wpdb->posts.post_title LIKE '%$tag%' )
                OR ( $wpdb->posts.post_content LIKE '%$tag%' )
            )";
        }

        return $where;
    }
    function remove_max_image_preview($output, $meta_key, $meta_value) {
        if ($meta_key === 'robots' && $meta_value === 'max-image-preview:large') {
            return '';
        }
        return $output;
    }
  
   
    public function acf_load_post_types_choices( $field ) {
             // Reset choices
        $field['choices'] = array();
    
        // Get all post types
        $post_types = get_post_types( array( 'public' => true ), 'objects' );
    
        // Loop through post types and populate choices
        foreach ( $post_types as $post_type ) {
            $field['choices'][ $post_type->name ] = $post_type->label;
        }
    
        return $field;
    }

    public static function get_all_posts_by_type($post_type) {
        $args = [
            'post_type' => $post_type,
            'posts_per_page' => -1,
        ];

        $query = new WP_Query($args);
        $posts = Timber::get_posts($query);

        // Ensure thumbnails are included
        foreach ($posts as $key => $post) {
            $posts[$key]->thumbnail = get_the_post_thumbnail_url($post->ID, 'full');
            $posts[$key]->permalink = get_permalink($post->ID);
            $posts[$key]->author_name = get_the_author_meta('display_name', $post->post_author);
            $posts[$key]->author_image = get_avatar_url(get_the_author_meta('ID', $post->post_author));
            $posts[$key]->ribbon = get_field('ribbon', $post->ID);
            $posts[$key]->author_ribbon = get_field('author_ribbon', 'user_' . $post->post_author);
            $posts[$key]->author_url = get_author_posts_url($post->post_author);
        }

        return $posts;
    }
    
    public static function get_post_type_from_flexible_content($flexible_content) {
        foreach ($flexible_content as $module) {
            if ($module['acf_fc_layout'] === 'cards_module') {
                return $module['cards_module']['post_type_selector'];
            }
        }
        return 'post'; // Default post type if not found
    }
    
}
