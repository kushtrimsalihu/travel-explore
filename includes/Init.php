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
        add_action('wp_ajax_live_search', [new Setup(), 'live_search_handler']);
        add_action('wp_ajax_nopriv_live_search', [new Setup(), 'live_search_handler']);
        add_action('template_redirect', [new Setup(), 'setup_404_template_redirect']);
        add_action('save_post', [new Setup(), 'notify_admin_of_pending_post'], 10, 2);
        add_action('manage_user-journey_posts_custom_column', [new Setup(), 'show_author_column'], 10, 2);
        add_action('manage_user_journey_posts_custom_column', [new Setup(), 'custom_column_content'], 10, 2);
        add_action('pre_get_posts', [new Setup(), 'exclude_pending_posts_from_frontend']);
        add_action('admin_menu', [new Setup(), 'custom_registration_menu']);
        add_action('admin_post_nopriv_user_journey_registration',[new Setup(), 'handle_user_registration']);
        add_action('admin_post_user_journey_registration',[new Setup(), 'handle_user_registration']);
        add_action('admin_init', [new Setup(), 'register_prohibited_words_settings']);
        add_action('admin_menu', [new Setup(), 'prohibited_words_settings_page']);
        add_action('admin_menu', [new Setup(), 'remove_menus_for_authors'], 99);
        add_action('wp_set_comment_status', [new Setup(), 'notify_user_on_comment_approval'], 10, 2);

        
        add_shortcode('user_registration_confirmation',[new Setup(), 'user_registration_confirmation_shortcode']);
        add_action('admin_menu', [new Setup(), 'remove_acf_options_page_for_authors'], 100);
        

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
        


        

        remove_action('wp_head', 'print_emoji_detection_script', 7);
        remove_action('wp_print_styles', 'print_emoji_styles');
        
      

        parent::__construct();
    }


}
