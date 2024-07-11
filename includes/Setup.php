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
                echo '<li class="search-result-item m-2 flex item-center p-2 gap-5 hover:bg-light-hover cursor-pointer" onclick="window.location.href=\'' .  get_permalink() . '\'">';
                if(get_the_post_thumbnail()){ echo '<div class="search-result-thumbnail w-1/12">' . get_the_post_thumbnail(null, 'full', ['class' => 'w-full h-8']) . '</div>';};
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

        $field['choices'] = array();
    
        $post_types = get_post_types( array( 'public' => true ), 'objects' );
    
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
        return 'post'; 
    }

    function setup_404_template_redirect() {
        if (is_404()) {
            $context = Timber::context();
            $context['site_url'] = home_url('/');
            Timber::render('views/templates/errors/404.twig', $context);
            exit();
        }
    }

    public function add_to_context($context) {
        $context['alternative_tourism_categories'] = $this->get_alternative_tourism_categories();
        return $context;
    }

    private function get_alternative_tourism_categories() {
        $categories = Timber::get_terms([
            'taxonomy' => 'alternative_tourism_category',
            'hide_empty' => false,
        ]);
    
        return $categories;
    }

    
    public function get_breadcrumbs() {
        global $post;
        $breadcrumbs = [];
    
        if (!is_front_page()) {
            $home_url = home_url('/');
            $breadcrumbs[] = [
                'title' => 'Home',
                'url' => $home_url
            ];
        }

        if (is_search()) {
            $breadcrumbs[] = [
                'title' => 'Search Results',
                'url' => ''
            ];
        } elseif (is_singular()) {
            $post_type = get_post_type_object(get_post_type());
            if ($post_type && !in_array($post_type->name, ['post', 'page'])) {
                $breadcrumbs[] = [
                    'title' => $post_type->labels->name,
                    'url' => get_post_type_archive_link($post_type->name)
                ];
            }
    
            $breadcrumbs[] = [
                'title' => get_the_title(),
                'url' => get_permalink()
            ];
        } elseif (is_tax()) {
            if (is_tax('alternative_tourism_category')) {
                $term = get_queried_object();
                $tourism_page_url = '';
        
                $tourism_page = get_page_by_path('tourism-category');
                if ($tourism_page) {
                    $tourism_page_url = get_permalink($tourism_page);
                }
        
                $breadcrumbs[] = [
                    'title' => 'Tourism Categories',
                    'url' => $tourism_page_url
                ];
        
                $breadcrumbs[] = [
                    'title' => $term->name,
                    'url' => get_term_link($term->term_id)
                ];
            }  else{
            $term = get_queried_object();
            if ($term) {
                $taxonomy = get_taxonomy($term->taxonomy);
                if ($taxonomy) {
                    $breadcrumbs[] = [
                        'title' => $taxonomy->labels->name,
                        'url' => get_term_link($term->term_id)
                    ];
                }
    
                $breadcrumbs[] = [
                    'title' => $term->name,
                    'url' => get_term_link($term->term_id)
                ];
            }}
        } elseif (is_page()) {
            $breadcrumbs[] = [
                'title' => get_the_title(),
                'url' => get_permalink()
            ];
        } elseif (is_home()) {
            $breadcrumbs[] = [
                'title' => single_post_title('', false),
                'url' => get_permalink()
            ];
        } elseif (is_archive()) {
            if (is_post_type_archive()) {
                $post_type = get_queried_object();
                $breadcrumbs[] = [
                    'title' => post_type_archive_title('', false),
                    'url' => get_post_type_archive_link($post_type->name)
                ];
            } elseif (is_category() || is_tag() || is_tax()) {
                $term = get_queried_object();
                $breadcrumbs[] = [
                    'title' => single_term_title('', false),
                    'url' => get_term_link($term)
                ];
            }
        }
    
        return $breadcrumbs;
    }

    public static function get_latest_posts($selected_post_type) {
        $post_types = get_post_types(['public' => true], 'names');
        $latest_posts = [];
    
        if (in_array($selected_post_type, $post_types)) {
            $args = [
                'post_type' => $selected_post_type,
                'posts_per_page' => 6,
                'post_status' => 'publish',
            ];
    
            $query = new \WP_Query($args);
            $posts = $query->posts;
    
            foreach ($posts as $post) {
                $post->post_thumbnail_url = get_the_post_thumbnail_url($post->ID);
                
            }
    
            $latest_posts[$selected_post_type] = $posts;
        }
    
        return $latest_posts;
    }

    public function get_categories_and_posts() {
        $modules = get_field('flexible_content');
        $all_modules_categories_and_posts = [];
    
        if ($modules) {
            foreach ($modules as $module) {
                if ($module['acf_fc_layout'] === 'post_display_settings') {
                    switch ($module['display_mode']) {
                        case 'filter_by_category':
                            $categories_and_posts = [];
                            $category_items = $module['category_filter'] ?? [];
                            foreach ($category_items as $category_id) {
                                $category_name = get_term($category_id)->name;
                                $posts = get_posts([
                                    'post_type' => 'alternative_tourism', 
                                    'tax_query' => [
                                        [
                                            'taxonomy' => 'alternative_tourism_category',
                                            'field'    => 'term_id',
                                            'terms'    => $category_id,
                                        ],
                                    ],
                                ]);
    
                                $post_data = [];
                                foreach ($posts as $post) {
                                    $thumbnail_id = get_post_thumbnail_id($post->ID);
                                    $flexible_content = get_field('flexible_content', $post->ID);
                                    $post_data[] = [
                                        'post' => $post,
                                        'image' => get_the_post_thumbnail_url($post->ID, 'thumbnail'),
                                        'image_alt' => get_post_meta($thumbnail_id, '_wp_attachment_image_alt', true),
                                        'image_title' => get_the_title($thumbnail_id),
                                        'flexible_content' => $flexible_content,
                                    ];
                                }
                                
                                $categories_and_posts[] = [
                                    'category' => $category_name,
                                    'posts' => $post_data,
                                ];
                            }
                            $all_modules_categories_and_posts[] = [
                                'module' => $module,
                                'categories_and_posts' => $categories_and_posts
                            ];
                            break;
                        default:
                            break;
                    }
                }
            }
        }
        
        return $all_modules_categories_and_posts;
    }
    
    public function exclude_pending_posts_from_frontend($query) {
        if (!is_admin() && $query->is_main_query()) {
            $query->set('post_status', 'publish');
        }
    }
    

    public function set_pending_status_for_user_posts($data, $postarr) {
        if (!current_user_can('administrator')) {
            $data['post_status'] = 'pending';
        }
        return $data;
    }

    public function notify_admin_of_pending_post($post_id, $post) {
        if ($post->post_status == 'pending' && !current_user_can('administrator')) {
            $admin_email = get_option('admin_email');
            $subject = 'New Pending Post Submission';
            $message = 'A new post titled "' . $post->post_title . '" has been submitted and is pending approval.';
            wp_mail($admin_email, $subject, $message);
        }
    }

    public function restrict_publish_to_admins($data, $postarr) {
        if ($data['post_status'] == 'publish' && !current_user_can('administrator')) {

            $data['post_status'] = 'pending';
        }
        return $data;
    }

    public function add_author_column($columns) {
        if (current_user_can('administrator')) {
            $columns['post_author'] = 'Author';
        }
        return $columns;
    }

    public function show_author_column($column_name, $post_id) {
        if ($column_name == 'post_author') {
            $post = get_post($post_id);
            $author_id = $post->post_author;
            $author_name = get_the_author_meta('display_name', $author_id);
            echo $author_name;
        }
    }

    public function add_custom_columns($columns) {
        if (current_user_can('administrator')) {
            $columns['author'] = __('Author');
        }
        return $columns;
    }

    public function custom_column_content($column_name, $post_id) {
        if ($column_name == 'author' && current_user_can('administrator')) {
            $author = get_the_author_meta('display_name', get_post_field('post_author', $post_id));
            echo esc_html($author);
        }
    }


    
}
