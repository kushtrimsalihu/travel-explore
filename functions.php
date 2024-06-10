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




function enqueue_live_search_script() {
    wp_enqueue_script('live-search', get_template_directory_uri() . '/src/js/live-search.js', array(), '1.0', true);
    wp_localize_script('live-search', 'live_search_params', array(
        'ajax_url' => admin_url('admin-ajax.php'),
    ));
}
add_action('wp_enqueue_scripts', 'enqueue_live_search_script');

function live_search_handler() {
    if (!isset($_GET['query'])) {
        wp_die('No query parameter');
    }

    $query = sanitize_text_field($_GET['query']);
    $args = array(
        's' => $query,
        'posts_per_page' => 10,
    );

    $search_query = new WP_Query($args);

    if ($search_query->have_posts()) {
        echo '<ul>';
        while ($search_query->have_posts()) {
            $search_query->the_post();
            $has_banner = false;
            $banner_content = '';

            if (have_rows('flexible_content')) {
                while (have_rows('flexible_content')) {
                    the_row();
                    if (get_row_layout() == 'banner') {
                        $banner_title = get_sub_field('title');
                        $banner_image = get_sub_field('image');
                        $banner_description = get_sub_field('description');
    
                        $banner_description = trim($banner_description);
                        $banner_description = htmlspecialchars($banner_description, ENT_QUOTES, 'UTF-8');
                        $banner_description = strip_tags($banner_description);

    
                        if (stripos($banner_title, $query) !== false || stripos($banner_description, $query) !== false) {
                            $has_banner = true;
                            $banner_content .= '<li class="search-result-item flex gap-5 m-3">';
                            $banner_content .= '<div class="search-result-thumbnail w-2/6"><img src="' . esc_url($banner_image['url']) . '" alt="' . esc_attr($banner_image['alt']) . '" style="height: 100px;"></div>';
                            $banner_content .= '<div class="search-result-content w-4/6">';
                            $banner_content .= '<a href="' . get_permalink() . '" class="font-roboto font-medium">' . esc_html($banner_title) . '</a>';
                            $banner_content .= '<p class="font-roboto">' . esc_html($banner_description) . '</p>';
                            $banner_content .= '</div>';
                            $banner_content .= '</li>';
                        }
                    }
                }
            }

            if ($has_banner) {
                echo $banner_content;
            } else {
                $post_description = get_the_excerpt();
                echo '<li class="search-result-item flex item-center gap-5 m-3">';
                echo '<div class="search-result-thumbnail w-2/6">' . get_the_post_thumbnail(null, 'full', array('style' => 'height: 100px;')) . '</div>';
                echo '<div class="search-result-content w-4/6">';
                echo '<a href="' . get_permalink() . '" class="font-roboto font-medium text-xl">' . get_the_title() . '</a>';
                echo '<p class="font-roboto">' . esc_html($post_description) . '</p>';
                echo '</div>';
                echo '</li>';
            }
        }
        echo '</ul>';
    } else {
        echo 'No results found';
    }

    wp_reset_postdata();
    wp_die();
}
add_action('wp_ajax_live_search', 'live_search_handler');
add_action('wp_ajax_nopriv_live_search', 'live_search_handler');

function list_searcheable_acf() {
    return array('flexible_content');
} 

function advanced_custom_search($where, &$wp_query) {
    global $wpdb;

    if (empty($where)) {
        return $where;
    }

    $terms = $wp_query->query_vars['s'];
    $exploded = explode(' ', $terms);

    if ($exploded === FALSE || count($exploded) == 0) {
        $exploded = array(0 => $terms);
    }

    $where = '';
    $list_searcheable_acf = list_searcheable_acf();

    foreach ($exploded as $tag) {
        $where .= "
            AND (
                (wp_posts.post_title LIKE '%$tag%')
                OR (wp_posts.post_content LIKE '%$tag%')
                OR EXISTS (
                    SELECT * FROM wp_postmeta
                    WHERE post_id = wp_posts.ID
                    AND (";
        foreach ($list_searcheable_acf as $searcheable_acf) {
            if ($searcheable_acf == $list_searcheable_acf[0]) {
                $where .= " (meta_key LIKE '%" . $searcheable_acf . "%' AND meta_value LIKE '%$tag%') ";
            } else {
                $where .= " OR (meta_key LIKE '%" . $searcheable_acf . "%' AND meta_value LIKE '%$tag%') ";
            }
        }
        $where .= ")
                )
                OR EXISTS (
                    SELECT * FROM wp_comments
                    WHERE comment_post_ID = wp_posts.ID
                    AND comment_content LIKE '%$tag%'
                )
                OR EXISTS (
                    SELECT * FROM wp_terms
                    INNER JOIN wp_term_taxonomy
                    ON wp_term_taxonomy.term_id = wp_terms.term_id
                    INNER JOIN wp_term_relationships
                    ON wp_term_relationships.term_taxonomy_id = wp_term_taxonomy.term_taxonomy_id
                    WHERE (
                        taxonomy = 'post_tag'
                        OR taxonomy = 'category'
                        OR taxonomy = 'myCustomTax'
                    )
                    AND object_id = wp_posts.ID
                    AND wp_terms.name LIKE '%$tag%'
                )
            )";
    }

    return $where;
}

add_filter('posts_search', 'advanced_custom_search', 500, 2);