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
        if ($post->post_status == 'pending' && $post->post_type == 'user_journey' && !current_user_can('administrator')) {
            $admin_email = get_option('admin_email');
            $subject = 'New Pending User Journey Submission';
            $message = 'A new user journey titled "' . $post->post_title . '" has been submitted and is pending approval.';
            $html_message = '<html><body>';
            $html_message .= '<p>A new user journey titled "<strong>' . $post->post_title . '</strong>" has been submitted and is pending approval.</p>';
            $html_message .= '</body></html>';
            
            $headers = [
                'From: Notification <noreply@yoursite.com>',
                'Content-Type: text/html; charset=UTF-8'
            ];
    
            wp_mail($admin_email, $subject, $html_message, $headers);
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
    private function is_strong_password($password) {
        return preg_match('/[A-Z]/', $password) && 
               preg_match('/[0-9]/', $password) && 
               strlen($password) >= 8;
    }

    public function handle_user_registration($dummy_param) {
        $password = $_POST['password']; 

        if (!$this->is_strong_password($password)) {
            set_transient('user_journey_registration_message', ['type' => 'error', 'message' => 'Fjalëkalimi duhet të jetë të paktën 8 karaktere i gjatë dhe të përmbajë të paktën një shkronjë të madhe dhe një numër.'], 30);
            wp_redirect($_POST['_wp_http_referer']);
            exit;
        }

        if (!isset($_POST['user_journey_registration_nonce_field']) || !wp_verify_nonce($_POST['user_journey_registration_nonce_field'], 'user_journey_registration_nonce')) {
            set_transient('user_journey_registration_message', ['type' => 'error', 'message' => 'Verifikimi i nonce dështoi'], 30);
            wp_redirect($_POST['_wp_http_referer']);
            exit;
        }

        $username = isset($_POST['username']) ? sanitize_text_field($_POST['username']) : '';
        $first_name = isset($_POST['first_name']) ? sanitize_text_field($_POST['first_name']) : '';
        $last_name = isset($_POST['last_name']) ? sanitize_text_field($_POST['last_name']) : '';
        $email = isset($_POST['email']) ? sanitize_email($_POST['email']) : '';
        $phone_number = isset($_POST['phone']) ? sanitize_text_field($_POST['phone']) : '';
        $profile_image_id = isset($_POST['profile_image']) ? intval($_POST['profile_image']) : 0;
        $password = isset($_POST['password']) ? $_POST['password'] : '';
        $verify_password = isset($_POST['verify_password']) ? $_POST['verify_password'] : '';

        if (!is_email($email)) {
            set_transient('user_journey_registration_message', ['type' => 'error', 'message' => 'Invalid email address'], 30);
            wp_redirect($_POST['_wp_http_referer']);
            exit;
        }

        if (empty($username)) {
            set_transient('user_journey_registration_message', ['type' => 'error', 'message' => 'Username is required'], 30);
            wp_redirect($_POST['_wp_http_referer']);
            exit;
        }

        if (!validate_username($username)) {
            set_transient('user_journey_registration_message', ['type' => 'error', 'message' => 'Invalid username format'], 30);
            wp_redirect($_POST['_wp_http_referer']);
            exit;
        }

        if (email_exists($email)) {
            set_transient('user_journey_registration_message', ['type' => 'error', 'message' => 'Email address is already in use'], 30);
            wp_redirect($_POST['_wp_http_referer']);
            exit;
        }

    if (!$this->is_strong_password($password)) {
        set_transient('user_journey_registration_message', ['type' => 'error', 'message' => 'Password must be at least 8 characters long and contain at least one uppercase letter and one number.'], 30);
        wp_redirect($_POST['_wp_http_referer']);
        exit;
    }

        if ($password !== $verify_password) {
            set_transient('user_journey_registration_message', ['type' => 'error', 'message' => 'Passwords do not match'], 30);
            wp_redirect($_POST['_wp_http_referer']);
            exit;
        }

        $userdata = [
            'user_login' => $username,
            'user_pass' => $password,
            'first_name' => $first_name,
            'last_name' => $last_name,
            'user_email' => $email,
            'meta_input' => [
                'phone_number' => $phone_number,
                'profile_image' => $profile_image_id,
            ],
        ];

        $user_id = wp_insert_user($userdata);

        if (is_wp_error($user_id)) {
            set_transient('user_journey_registration_message', ['type' => 'error', 'message' => $user_id->get_error_message()], 30);
            wp_redirect($_POST['_wp_http_referer']);
            exit;
        }

        $activation_code = wp_generate_password(20, false);
        update_user_meta($user_id, 'activation_code', $activation_code);

    $subject = 'Confirmation of registration on our site';
    $message = 'Please click on the following link to confirm your registration: ' . add_query_arg(['key' => $activation_code, 'user' => $user_id], home_url('/'));

    $html_message = '<html><body>';
    $html_message .= '<p>Please click on the following link to confirm your registration:</p>';
    $html_message .= '<p><a href="' . add_query_arg(['key' => $activation_code, 'user' => $user_id], home_url('/')) . '">Confirm registration</a></p>';

    $html_message .= '</body></html>';


        $headers = [
            'From: Notification <noreply@yoursite.com>',
            'Content-Type: text/html; charset=UTF-8'
        ];

        wp_mail($email, $subject, $html_message, $headers);

        set_transient('user_journey_registration_message', ['type' => 'success', 'message' => 'Registration successful! Check your email to confirm registration.'], 30);

        wp_redirect($_POST['_wp_http_referer']);
        exit;
    }

    public function redirect_after_registration_confirmation() {
        if (strpos($_SERVER['REQUEST_URI'], home_url('/')) !== false && isset($_GET['key']) && isset($_GET['user'])) {
            $key = sanitize_text_field($_GET['key']);
            $user_id = intval($_GET['user']);

            $stored_activation_code = get_user_meta($user_id, 'activation_code', true);

            if ($stored_activation_code && $key === $stored_activation_code) {
                update_user_meta($user_id, 'activation_code', ''); 
                wp_redirect(home_url('/profile')); 
                exit;
            }
        }
    }

    public function restrict_user_journey_posts_to_own($query) {
        if (!is_admin() || !$query->is_main_query()) {
            return;
        }
    
        global $pagenow;
        $post_type = isset($_GET['post_type']) ? $_GET['post_type'] : '';
    
        if ($pagenow == 'edit.php' && $post_type == 'user_journey' && !current_user_can('administrator')) {
            $query->set('author', get_current_user_id());
        }
    }

    public function register_prohibited_words_settings() {
        add_option('prohibited_words', "spam\ninsult\nracism");
        register_setting('default', 'prohibited_words');
    }

    public function prohibited_words_settings_page() {
        add_menu_page(
            'Prohibited Words',
            'Prohibited Words',
            'manage_options',
            'prohibited-words',
            array($this, 'prohibited_words_settings_page_html')
        );
    }

    public function prohibited_words_settings_page_html() {
        if (!current_user_can('manage_options')) {
            return;
        }
        ?>
        <div class="wrap">
            <h1>Prohibited Words</h1>
            <form method="post" action="options.php">
                <?php
                settings_fields('default');
                do_settings_sections('default');
                ?>
                <textarea name="prohibited_words" rows="10" cols="50"><?php echo esc_textarea(get_option('prohibited_words')); ?></textarea>
                <?php submit_button(); ?>
            </form>
        </div>
        <?php
    }
    public static function increment_user_violations($user_id) {
        $violations = get_user_meta($user_id, 'prohibited_word_violations', true);
        $violations = $violations ? $violations + 1 : 1;
        update_user_meta($user_id, 'prohibited_word_violations', $violations);
        return $violations;
    }

    public static function send_admin_notification($user_id) {
        $user_info = get_userdata($user_id);
        $admin_email = get_option('admin_email');
        $subject = 'User Exceeded Prohibited Words Usage';
        $message = 'User ' . $user_info->user_login . ' has used prohibited words more than 5 times.';
        wp_mail($admin_email, $subject, $message);
    }

    public static function filter_prohibited_words($content) {
        $prohibited_words = get_option('prohibited_words', '');
        $prohibited_words_array = array_map('trim', explode("\n", $prohibited_words));
        foreach ($prohibited_words_array as $word) {
            if (stripos($content, $word) !== false) {
                error_log("Prohibited word detected: " . $word);
                return false;
            }
        }
        return true;
    }


    public static function check_prohibited_words($data, $postarr) {
        if ($data['post_type'] == 'user_journey') {
            $user_id = get_current_user_id();
           
            if (!self::filter_prohibited_words($data['post_title'])) {
                $violations = self::increment_user_violations($user_id);
                if ($violations > 5) {
                    self::send_admin_notification($user_id);
                }
                wp_die('Your post title contains prohibited words and cannot be submitted.');
            }
     
            $description = isset($postarr['acf']['field_6683b353ee36f']) ? $postarr['acf']['field_6683b353ee36f'] : ''; 
            if (!self::filter_prohibited_words($description)) {
                $violations = self::increment_user_violations($user_id);
                if ($violations > 5) {
                    self::send_admin_notification($user_id);
                }
                wp_die('Your description contains prohibited words and cannot be submitted.');
            }
        }
        return $data;
    }

    function show_only_user_comments($clauses, $wp_comment_query) {
        if (is_admin() && !current_user_can('administrator')) {
            global $wpdb;
            $clauses['where'] .= " AND {$wpdb->comments}.user_id = " . get_current_user_id();
        }
        return $clauses;
    }

    function notify_user_on_comment_approval($comment_id) {
        $comment = get_comment($comment_id);
        
        // Only send email if the comment is approved
        if ($comment->comment_approved == 1) {
            $user_email = $comment->comment_author_email;
            $subject = "Your comment has been approved";
            $message = "Hi " . $comment->comment_author . ",\n\nYour comment on the post \"" . get_the_title($comment->comment_post_ID) . "\" has been approved.\n\nThank you for your contribution!\n\nBest regards,\nYour Website Team";
            $headers = 'From: Your Website <no-reply@yourwebsite.com>' . "\r\n";
            
            wp_mail($user_email, $subject, $message, $headers);
        }
    }
    

    
    function remove_menus_for_authors() {
        if (current_user_can('author')) {
            remove_menu_page('index.php');                   
            remove_menu_page('edit.php');                    
            remove_menu_page('upload.php');                  
            remove_menu_page('edit-comments.php');           
            remove_menu_page('edit.php?post_type=page');     
            remove_menu_page('tools.php');                   
            remove_menu_page('edit.php?post_type=blog');     
            remove_menu_page('edit.php?post_type=alternative_tourism');
            
        }
    }

    function remove_acf_options_page_for_authors() {
        if (current_user_can('author')) {
            remove_menu_page('travel-explore-settings');
        }
    }

    function custom_login_errors() {
        
        $referrer = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : '';

        if (!empty($referrer) && !strstr($referrer,'wp-login') && !strstr($referrer,'wp-admin')) {
            if (isset($_REQUEST['log']) && isset($_REQUEST['pwd'])) {
                $user = wp_authenticate($_REQUEST['log'], $_REQUEST['pwd']);
                if (is_wp_error($user)) {
                    wp_redirect($referrer . '?login=failed');
                    exit;
                }
            }
        }
    }
    

    function set_approver_name_on_publish($new_status, $old_status, $post) {
        if ('publish' === $new_status && 'publish' !== $old_status && $post->post_type === 'user_journey' && current_user_can('administrator')) {
            $current_user = wp_get_current_user();
            update_post_meta($post->ID, 'approved_by_name', $current_user->display_name);
        }
    }
    function add_approved_by_to_post_row_actions($actions, $post) {
        if ('user_journey' === $post->post_type && current_user_can('administrator')) {
            $approver_name = get_post_meta($post->ID, 'approved_by_name', true);
            if (!empty($approver_name)) {
                $actions['approved_by'] = 'Approved by: ' . esc_html($approver_name);
            }
        }
        return $actions;
    }

    public function get_users_with_more_than_50_approved_posts() {
        global $wpdb;
    
        $users_query = new \WP_User_Query([
            'role__not_in' => 'Administrator',
            'number' => -1,
        ]);
    
        $users = $users_query->get_results();
        $filtered_users = [];
    
        foreach ($users as $user) {
            $post_count = $wpdb->get_var($wpdb->prepare("
                SELECT COUNT(*)
                FROM $wpdb->posts p
                INNER JOIN $wpdb->postmeta pm ON p.ID = pm.post_id
                WHERE p.post_author = %d
                AND p.post_status = 'publish'
                AND pm.meta_key = 'approved_by_name'
            ", $user->ID));
           
    
            if ($post_count >= 10) {
                $filtered_users[] = [
                    'ID' => $user->ID,
                    'user_login' => $user->user_login,
                    'display_name' => $user->user_nicename,
                    'post_count' => $post_count,
                ];
            }
            
        }
    
        return $filtered_users;
    }
    
    public function display_users_with_more_than_50_approved_posts() {
        if (!current_user_can('administrator')) {
            wp_die('You do not have sufficient permissions to access this page.');
        }
    
        $users = $this->get_users_with_more_than_50_approved_posts();
    
        if (empty($users)) {
            echo '<p>No users found with more than 50 approved posts.</p>';
            return;
        }
    
        echo '<h2>Users with More Than 50 Approved Posts</h2>';
        echo '<table class="widefat fixed" cellspacing="0">';
        echo '<thead><tr><th>Username</th><th>User Name</th><th>Post Count</th><th>Reward</th></tr></thead>';
        echo '<tbody>';
    
        foreach ($users as $user) {
            echo '<tr>';
            echo '<td>' . esc_html($user['user_login']) . '</td>';
            echo '<td>' . esc_html($user['display_name']) . '</td>';
            echo '<td>' . esc_html($user['post_count']) . '</td>';
            echo '<td>This user has won a free random travel trip.</td>';
            echo '</tr>';
        }
        
    
        echo '</tbody>';
        echo '</table>';
    }
    
    public function add_users_with_more_than_50_approved_posts_menu() {
        $icon_url = get_template_directory_uri() . '/assets/images/user-shield.svg';
    
    
        add_menu_page(
            'Users with More Than 50 Approved Posts',
            'Users 50+ Approved Posts',
            'manage_options',
            'users-50-approved-posts',
            [$this, 'display_users_with_more_than_50_approved_posts'],
            $icon_url
        );
    }
    function handle_reservation_submission() {
        if (!is_user_logged_in()) {
            wp_redirect(home_url('/login') . '?message=login_required'); 
            exit;
        }
    
        if (isset($_POST['name'], $_POST['email'], $_POST['phone'], $_POST['date'], $_POST['persons'], $_POST['comments'], $_POST['card_price'], $_POST['card_title'], $_POST['total_price']))  {
            $current_user = wp_get_current_user();
    
            $postarr = [
                'post_title'   => sanitize_text_field($_POST['name']), 
                'post_content' => sanitize_textarea_field($_POST['comments']), 
                'post_status'  => 'pending', 
                'post_type'    => 'reservation', 
                'post_author'  => $current_user->ID, 
                'meta_input'   => [ 
                    'name'               => sanitize_text_field($_POST['name']),
                    'email'              => sanitize_email($_POST['email']), 
                    'phone'              => sanitize_text_field($_POST['phone']), 
                    'reservation_date'   => sanitize_text_field($_POST['date']), 
                    'persons'            => intval($_POST['persons']), 
                    'reservation_status' => 'pending', 
                    'notes'              => sanitize_text_field($_POST['comments']), 
                    'price'              => sanitize_text_field($_POST['card_price']), 
                    'total_price'        => sanitize_text_field($_POST['total_price']),
                    'reservation_type'   => sanitize_text_field($_POST['card_title'])
                    ]
            ];
    
            $post_id = wp_insert_post($postarr);
    
            if ($post_id !== 0) {
                wp_redirect(home_url()); 
                exit;
            }
        }
        wp_redirect(home_url('/error'));
        exit;
    }
    
    function show_own_reservations($query) {
        if (!current_user_can('administrator') && $query->is_main_query() && is_admin() && $query->get('post_type') == 'reservation') {
            $query->set('author', get_current_user_id());
        }
    }
    
    function restrict_reservation_management() {
        if (is_admin() && !current_user_can('administrator') && !defined('DOING_AJAX')) {
            global $pagenow;
            $restricted_pages = [
                'edit.php?post_type=reservation',
                'post.php?post_type=reservation',
                'post-new.php?post_type=reservation'
            ];
    
            if (in_array($pagenow, $restricted_pages)) {
                wp_redirect(admin_url());
                exit;
            }
        }
    }
    
    function set_custom_reservation_columns($columns) {
        $new_columns = [
            'cb' => $columns['cb'],
            'title' => __('Name'),
            'reservation_type' => __('Type of Reservation'),
            'reservation_code' => __('Reservation Code'), // Add this line
            'reservation_date' => __('Reservation Date'),
            'email' => __('Email'),
            'phone' => __('Phone'),
            'status' => __('Status'),
            'persons' => __('Number of Persons'),
            'total_price' => __('Total Price'),
            'notes' => __('Notes'),
            'username' => __('User'),
            'report' => __('Report'), 
            'date' => $columns['date']
        ];
        return $new_columns;
    }
    
    
    function custom_reservation_column_content($column, $post_id) {
        switch ($column) {
            case 'reservation_type':
                echo esc_html(get_post_meta($post_id, 'reservation_type', true));  
                break;
            case 'report':
                    $reservation_code = get_post_meta($post_id, 'reservation_code', true);
                    $pdf_path = wp_upload_dir()['basedir'] . "/reservation-report-{$reservation_code}.pdf";
                    if (file_exists($pdf_path)) {
                        $pdf_url = wp_upload_dir()['baseurl'] . "/reservation-report-{$reservation_code}.pdf";
                        echo '<a href="' . esc_url($pdf_url) . '" target="_blank">View Report</a>';
                } else {
                        echo '';
                }
                break;
            case 'reservation_date':
                $date = get_post_meta($post_id, 'reservation_date', true);
                if ($date) {
                    echo esc_html(date_i18n(get_option('date_format'), strtotime($date)));
                }
                break;
            case 'email':
                echo esc_html(get_post_meta($post_id, 'email', true));
                break;
            case 'phone':
                echo esc_html(get_post_meta($post_id, 'phone', true));
                break;
            case 'status':
                $current_status = get_post_meta($post_id, 'reservation_status', true);
                if ($current_status) {
                    echo esc_html($current_status); 
                } else {
                    echo __('pending', 'textdomain'); 
                }
                break;
            case 'persons':
                echo esc_html(get_post_meta($post_id, 'persons', true)); 
                break;
            case 'total_price':
                    $total_price = get_post_meta($post_id, 'total_price', true);  
                    if (!empty($total_price)) {
                        echo esc_html($total_price); 
                    } else {
                        echo __('No Price', 'textdomain'); 
                    }
                    break;
            case 'notes':
                        $notes = esc_html(get_post_meta($post_id, 'notes', true));
                        echo wp_trim_words($notes, 4, '...'); 
                        break;
            case 'username':
                $post = get_post($post_id);
                $user = get_userdata($post->post_author);
                echo esc_html($user->user_login);
                break;
            case 'reservation_code':
                echo esc_html(get_post_meta($post_id, 'reservation_code', true)); 
            break;
        }
    }
    
    function customize_reservation_row_actions($actions, $post) {
        if ($post->post_type == 'reservation') {
            if (!current_user_can('administrator')) {
                unset($actions['edit']);
                unset($actions['inline hide-if-no-js']);
                unset($actions['trash']);
                unset($actions['view']);
            }
        }
        return $actions;
    }
    
    function send_admin_new_reservation_notification($post_id, $post, $update) {
        if ($post->post_type != 'reservation' || $update) {
            return;
        }
    
        $admin_email = get_option('admin_email');
        $subject = 'New Reservation Submitted';
        $message = sprintf(
            "A new reservation has been submitted.\n\nName: %s\nEmail: %s\nPhone: %s\nDate: %s\nComments: %s\n\nPlease review and manage the reservation in the admin panel.",
            sanitize_text_field($post->post_title),
            sanitize_email(get_post_meta($post_id, 'email', true)),
            sanitize_text_field(get_post_meta($post_id, 'phone', true)),
            sanitize_text_field(get_post_meta($post_id, 'reservation_date', true)),
            sanitize_textarea_field($post->post_content)
        );
    
        $html_message = '<html><body>';
        $html_message .= '<p>A new reservation has been submitted.</p>';
        $html_message .= '<p><strong>Name:</strong> ' . sanitize_text_field($post->post_title) . '</p>';
        $html_message .= '<p><strong>Email:</strong> ' . sanitize_email(get_post_meta($post_id, 'email', true)) . '</p>';
        $html_message .= '<p><strong>Phone:</strong> ' . sanitize_text_field(get_post_meta($post_id, 'phone', true)) . '</p>';
        $html_message .= '<p><strong>Date:</strong> ' . sanitize_text_field(get_post_meta($post_id, 'reservation_date', true)) . '</p>';
        $html_message .= '<p><strong>Comments:</strong> ' . sanitize_textarea_field($post->post_content) . '</p>';
        $html_message .= '<p>Please review and manage the reservation in the admin panel.</p>';
        $html_message .= '</body></html>';
    
        $headers = [
            'From: Notification <noreply@yoursite.com>',
            'Content-Type: text/html; charset=UTF-8'
        ];
    
        wp_mail($admin_email, $subject, $html_message, $headers);
    }
    
    public function notify_user_of_reservation_status_change($post_id, $post, $update) {
        if ($post->post_type != 'reservation' || !$update) {
            return;
        }

        $new_status = get_post_meta($post_id, 'reservation_status', true);
        $old_status = get_post_meta($post_id, '_previous_reservation_status', true);

        if ($new_status == $old_status) {
            return;
        }

        update_post_meta($post_id, '_previous_reservation_status', $new_status);

        $user_email = sanitize_email(get_post_meta($post_id, 'email', true));
        $pdf_path = $this->generate_reservation_report_pdf($post_id);

        if ($new_status == 'approved') {
            $subject = 'Your Reservation Has Been Approved';
            $message = '<html><body>';
            $message .= '<p>Your reservation has been approved. Please find the attached report.</p>';
            $message .= '<p>Thank you for choosing our service!</p>';
            $message .= '</body></html>';

            $headers = [
                'From: Notification <noreply@yoursite.com>',
                'Content-Type: text/html; charset=UTF-8'
            ];

            $attachments = [$pdf_path];
            wp_mail($user_email, $subject, $message, $headers, $attachments);
        } elseif ($new_status == 'rejected') {
            $subject = 'Your Reservation Has Been Rejected';
            $message = '<html><body>';
            $message .= '<p>We regret to inform you that your reservation has been rejected.</p>';
            $message .= '<p>Please contact us for more details.</p>';
            $message .= '</body></html>';
    
            $headers = [
                'From: Notification <noreply@yoursite.com>',
                'Content-Type: text/html; charset=UTF-8'
            ];
            wp_mail($user_email, $subject, $message, $headers);
    
            wp_trash_post($post_id);
    
            wp_redirect(admin_url('edit.php?post_type=reservation'));
            exit; 
        } else {
            return; 
        }
    }

    
    function check_user_posts_count() {
        function notify_user_of_prize($user_id) {
            $user = get_userdata($user_id);
            $user_email_sent = get_user_meta($user_id, 'user_email_sent_for_50_posts', true);
    
            if ($user && !empty($user->user_email) && !$user_email_sent) {
                $to = $user->user_email;
                $subject = 'Congratulations! You Won a Free Trip!';
                $message = "
                    Dear {$user->display_name},
    
                    Congratulations! You’ve won a free trip for reaching 50 posts on your user journey.
    
                    This is our way of saying thank you for your dedication and amazing contributions.
    
                    For more details about your prize, please contact us.
    
                    Best regards,
                    Travel Explore Team
                ";
    
                $headers = array('Content-Type: text/plain; charset=UTF-8');
    
                wp_mail($to, $subject, $message, $headers);
                update_user_meta($user_id, 'user_email_sent_for_50_posts', true);
            }
        }

        function notify_admin_of_user_prize($user_id) {
            $user = get_userdata($user_id);
            $admin_email = get_option('admin_email');
            $admin_notification_sent = get_user_meta($user_id, 'admin_notification_sent_for_50_posts', true);
    
            if ($user && !empty($admin_email) && !$admin_notification_sent) {
                $to = $admin_email;
                $subject = 'User Achievement Notification';
                $message = "
                    Hello Admin,
    
                    User {$user->display_name} has reached 50 posts on their user journey.
    
                    This user has achieved a milestone and won a free trip.
    
                    Best regards,
                    Travel Explore
                ";
    
                $headers = array('Content-Type: text/plain; charset=UTF-8');
    
                wp_mail($to, $subject, $message, $headers);
                update_user_meta($user_id, 'admin_notification_sent_for_50_posts', true);
            }
        }
    
        if (is_user_logged_in()) {
            $current_user = wp_get_current_user();
    
            if (!in_array('administrator', $current_user->roles)) {
                $post_count_query = new WP_Query([
                    'author' => $current_user->ID,
                    'post_type' => 'user_journey',
                    'post_status' => 'publish',
                    'posts_per_page' => -1,
                    'fields' => 'ids',
                ]);
                $post_count = $post_count_query->found_posts;
    
                $user_email_sent = get_user_meta($current_user->ID, 'user_email_sent_for_50_posts', true);
                $admin_notification_sent = get_user_meta($current_user->ID, 'admin_notification_sent_for_50_posts', true);
    
                session_start();
                $contact_us_clicked = $_SESSION['contact_us_clicked'] ?? false;
    
                if ($post_count >= 10) {
                    notify_user_of_prize($current_user->ID);
                    notify_admin_of_user_prize($current_user->ID);
                    if (!$contact_us_clicked) {
                        echo '<script>window.ShowPopup = true;</script>';
                    }
                } 
                elseif ($post_count >= 1 && $post_count < 10 && is_archive('user-journey')) {
                    echo '<script>window.showEncouragementNotification = true;</script>';
                } 
                else {
                    echo '<script>window.ShowPopup = false;</script>';
                    echo '<script>window.showEncouragementNotification = false;</script>';
                }
            }
        }
    }

    function handle_contact_us_click() {
        if (isset($_POST['contact_us_clicked']) && $_POST['contact_us_clicked'] == '1') {
            session_start();
            $_SESSION['contact_us_clicked'] = true;
            wp_redirect(home_url('/contact-us'));
            exit;
        }
    }
    
    
    private function generate_numeric_code($length = 4) {
        $characters = '0123456789';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }

    public function generate_unique_reservation_code($post_id, $post, $update) {
        if ($post->post_type == 'reservation' && !$update) {
            $unique_code = 'RES_' . $this->generate_numeric_code(4); 
            update_post_meta($post_id, 'reservation_code', $unique_code);
        }
    }

    public function generate_reservation_report_pdf($reservation_id) {
        $reservation = get_post($reservation_id);
        $meta = get_post_meta($reservation_id);
        
       
        if (!isset($meta['reservation_code'][0])) {
            return false; 
        }
        
        $reservation_code = $meta['reservation_code'][0];
    
        $mpdf = new \Mpdf\Mpdf([
            'margin_left' => 10,
            'margin_right' => 10,
            'margin_top' => 10,
            'margin_bottom' => 10,
        ]);
    
        $mpdf->SetCreator('Travel Explore');
        $mpdf->SetAuthor('Travel Explore');
        $mpdf->SetTitle('Reservation Report');
        $mpdf->SetSubject('Reservation Report');
        $mpdf->SetKeywords('mPDF, PDF, reservation, report');
    
        $mpdf->AddPage();
    
        $background_image = get_template_directory() . '/assets/images/report.jpg';
        $mpdf->Image($background_image, 0, 0, 210, 100, 'jpg', '', true, false);
    
        
        $html = "
            <div style='text-align: center; margin-top: 10mm;'>
                <h2 style='font-size: 24px;'>Reservation Report</h2>
                <p style='font-size: 18px;'>Reservation Code: {$reservation_code}</p>
                <table style='width: 100%; font-size: 16px; margin-top: 20px; border-spacing: 0 10px;'>
                    <tr>
                        <td style='text-align: left; width: 50%;'><strong>Name:</strong> {$reservation->post_title}</td>
                        <td style='text-align: left; width: 50%;'><strong>Reservation Type:</strong> {$meta['reservation_type'][0]}</td>
                    </tr>
                    <tr>
                        <td style='text-align: left; width: 50%;'><strong>Number of People:</strong> {$meta['persons'][0]}</td>
                        <td style='text-align: left; width: 50%;'><strong>Price:</strong> {$meta['total_price'][0]} €</td>
                    </tr>
                    <tr>
                        <td style='text-align: left; width: 50%;'><strong>Email:</strong> {$meta['email'][0]}</td>
                        <td style='width: 50%;'></td>
                    </tr>
                    <tr>
                        <td colspan='2' style='text-align: left;'><strong>Comments:</strong> {$reservation->post_content}</td>
                    </tr>
                </table>
            </div>
        ";
    
        $mpdf->WriteHTML($html);
    
        $logo = get_template_directory() . '/assets/images/logo.png';
        $mpdf->SetY(-30); 
        $mpdf->Image($logo, 160, 250, 40, 20, 'png', '', true, false);
        $mpdf->WriteHTML("<div style='text-align: left; font-size: 12px; margin-bottom: 10mm;'>Your safety is our top priority. Stay safe and travel smart with Travel Explore.</div>");
    
        $pdf_path = wp_upload_dir()['basedir'] . "/reservation-report-{$reservation_code}.pdf";
        $mpdf->Output($pdf_path, 'F');
    
        return $pdf_path;
    }

    function admin_favicon() {
        echo '<link rel="icon" href="' . get_template_directory_uri() . '/assets/images/favicon.ico" type="image/x-icon">';
    }

    public function fetch_city_data() {
        if (isset($_GET['city_name'])) {
            $city_name = sanitize_text_field($_GET['city_name']);
            $api_url = 'https://api.api-ninjas.com/v1/city?name=' . urlencode($city_name) . '&limit=5'; 
            $api_key = 'rMrgvRZCueKvp5NfE5d5tfH66CoveYdtDjSKLROs'; 
    
            $response = wp_remote_get($api_url, array(
                'headers' => array(
                    'X-Api-Key' => $api_key
                )
            ));
    
            if (is_wp_error($response)) {
                wp_send_json_error('Error fetching data from the API');
            } else {
                $body = wp_remote_retrieve_body($response);
                $data = json_decode($body, true);
    
                $cities = array();
                foreach ($data as $city) {
                    if (isset($city['name']) && isset($city['country'])) {
                        $cities[] = array(
                            'name' => $city['name'],
                            'country' => $city['country']
                        );
                    }
                }
    
                wp_send_json_success($cities);
            }
        } else {
            wp_send_json_error('City name not provided');
        }
    }
}



    

    
    


