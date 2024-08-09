<?php
namespace App;

use PostType;
use Timber\Site;
use TwigExtension;


class Init extends Site {

    public function __construct() {
        $enqueue = new Enqueue();
        add_action('wp_enqueue_scripts', [$enqueue, 'dequeueScripts']);
        add_action('wp_enqueue_scripts', [$enqueue, 'dequeueStyles']);
        add_action('wp_enqueue_scripts', [$enqueue, 'travel_enqueue_scripts']);
        add_action('wp_enqueue_scripts', [$enqueue, 'enqueue_live_search_script']);
        add_action('wp_enqueue_scripts', [$enqueue, 'swiper_scripts']);


        add_action('wp_enqueue_scripts', [new Enqueue(), 'dequeueScripts' ]);
        add_action('wp_enqueue_scripts', [new Enqueue(), 'dequeueStyles' ]);
        add_action('wp_enqueue_scripts', [new Enqueue(), 'travel_enqueue_scripts']);
        add_action('wp_enqueue_scripts', [new Enqueue(), 'enqueue_live_search_script']);
        add_action('wp_enqueue_scripts', [new Enqueue(),'swiper_scripts']);
        add_action('wp_enqueue_scripts', [new Enqueue(),'enqueue_fancybox']);
        add_action('after_setup_theme', [new Setup(), 'theme_supports']);
        add_action('init', [new Setup(), 'register_navigation_menus']);
        add_action('init', [new PostType(), 'register_alternative_tourism_cpt']);
        add_action('init', [new PostType(), 'register_blog_post_type']);
        add_action('init', [new PostType(), 'blog_category']);
        add_action('init', [new PostType(), 'register_alternative_tourism_taxonomies']);
        add_action('init', [new PostType(), 'register_user_journey_post_type']);
        add_action('init', [new PostType(), 'register_reservation_post_type']);
        add_action('wp_ajax_live_search', [new Setup(), 'live_search_handler']);
        add_action('wp_ajax_nopriv_live_search', [new Setup(), 'live_search_handler']);
        add_action('template_redirect', [new Setup(), 'setup_404_template_redirect']);
        add_action('save_post', [new Setup(), 'notify_admin_of_pending_post'], 10, 2);
        add_action('manage_user-journey_posts_custom_column', [new Setup(), 'show_author_column'], 10, 2);
        add_action('manage_user_journey_posts_custom_column', [new Setup(), 'custom_column_content'], 10, 2);
        add_action('pre_get_posts', [new Setup(), 'exclude_pending_posts_from_frontend']);
        add_action('admin_post_nopriv_user_journey_registration',[new Setup(), 'handle_user_registration']);
        add_action('admin_post_user_journey_registration',[new Setup(), 'handle_user_registration']);
        add_action('admin_init', [new Setup(), 'register_prohibited_words_settings']);
        add_action('admin_menu', [new Setup(), 'prohibited_words_settings_page']);
        add_action('admin_menu', [new Setup(), 'remove_menus_for_authors'], 99);
        add_action('wp_set_comment_status', [new Setup(), 'notify_user_on_comment_approval'], 10, 2);
        add_action('admin_post_nopriv_submit_reservation', [new Setup(),'handle_reservation_submission']);
        add_action('admin_post_submit_reservation', [new Setup(),'handle_reservation_submission']);
        add_action('pre_get_posts', [new Setup(),'show_own_reservations']);
        add_action('manage_reservation_posts_custom_column', [new Setup(),'custom_reservation_column_content'], 10, 2);
        add_action('admin_init', [new Setup(),'restrict_reservation_management']);
        add_action('wp_insert_post', [new Setup(),'send_admin_new_reservation_notification'], 10, 3);
        add_action('init', [new Setup(), 'handle_contact_us_click']);
        add_action('wp_insert_post', [new Setup(), 'generate_unique_reservation_code'], 10, 3);
        add_action('wp_ajax_nopriv_fetch_city_data', [new Setup(),'fetch_city_data']);
        add_action('wp_ajax_fetch_city_data', [new Setup(),'fetch_city_data']);

        add_action('admin_menu', [new Setup(), 'remove_acf_options_page_for_authors'], 100);
        add_action('wp_authenticate', [new Setup(), 'custom_login_errors'], 1);
        add_action('transition_post_status', [new Setup(),'set_approver_name_on_publish'], 10, 3);
        add_action('admin_menu', [new Setup(), 'add_users_with_more_than_50_approved_posts_menu']);
        add_action('save_post', [new Setup(),'notify_user_of_reservation_status_change'], 10, 3);
        add_action('wp_footer', [new Setup(), 'check_user_posts_count']);
        add_action('admin_head', [new Setup(), 'admin_favicon']);
        add_action('login_head', [new Setup(), 'admin_favicon']);

        add_filter('get_robots', [new Setup(), 'remove_max_image_preview'], 10, 3);
        add_filter('acf/settings/save_json', [new Setup(), 'my_acf_json_save_point']);
        add_filter('acf/settings/load_json', [new Setup(), 'my_acf_json_load_point']);
        add_filter('posts_search', [new Setup(), 'advanced_custom_search'], 500, 2);
        add_filter('timber/twig', [new TwigExtension(), 'addToTwig']);
        add_filter('acf/load_field/key=field_667605c8ad53a', [new Setup(), 'acf_load_post_types_choices']);
        add_filter('timber/context', [new TwigExtension, 'addToContext']);
        add_filter('timber/context', [new Setup(), 'add_to_context']);
        add_filter('acf/fields/relationship/query', [new Setup(),'filter_acf_relationship_query'], 10, 3);
        add_filter('wp_insert_post_data', [new Setup(), 'set_pending_status_for_user_posts'], 10, 2);
        add_filter('manage_user-journey_posts_columns', [new Setup(), 'add_author_column']);
        add_filter('manage_user_journey_posts_columns', [new Setup(), 'add_custom_columns']);
        add_filter('pre_get_posts', [new Setup(), 'restrict_user_journey_posts_to_own']);
        add_filter('acf/fields/relationship/query', [new Setup(), 'filter_acf_relationship_query'], 10, 3);
        add_filter('acf/fields/relationship/query', [new Setup(),'filter_acf_relationship_query'], 10, 3);
        add_filter('wp_insert_post_data', [new Setup(), 'set_pending_status_for_user_posts'], 10, 2);
        add_filter('manage_user-journey_posts_columns', [new Setup(), 'add_author_column']);
        add_filter('manage_user_journey_posts_columns', [new Setup(), 'add_custom_columns']);
        add_filter('wp_insert_post_data', [Setup::class, 'check_prohibited_words'], 10, 2);
        add_filter('comments_clauses', [new Setup(), 'show_only_user_comments'], 10, 2);
        add_filter('post_row_actions', [new Setup(), 'add_approved_by_to_post_row_actions'], 10, 2);
        add_filter('post_row_actions', [new Setup(),'customize_reservation_row_actions'], 10, 2);
        add_filter('manage_reservation_posts_columns', [new Setup(),'set_custom_reservation_columns']);

        add_shortcode('user_registration_confirmation',[new Setup(), 'user_registration_confirmation_shortcode']);

        remove_action('wp_head', 'print_emoji_detection_script', 7);
        remove_action('wp_print_styles', 'print_emoji_styles');
        
      

        parent::__construct();
    }


}
