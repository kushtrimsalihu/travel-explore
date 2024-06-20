<?php 
namespace App;

use PostType;
use Timber\Site;
use TwigExtension;

class Init extends Site {

    public function __construct() {
        $enqueue = new Enqueue();
        $setup = new Setup();

        add_action('wp_enqueue_scripts', [$enqueue, 'dequeueScripts']);
        add_action('wp_enqueue_scripts', [$enqueue, 'dequeueStyles']);
        add_action('wp_enqueue_scripts', [$enqueue, 'travel_enqueue_scripts']);
        add_action('wp_enqueue_scripts', [$enqueue, 'enqueue_live_search_script']);
        add_action('after_setup_theme', [$setup, 'theme_supports']);
        add_action('init', [$setup, 'register_navigation_menus']);
        add_action('init', [new PostType(), 'register_alternative_tourism_cpt']);
        add_action('init', [new PostType(), 'register_alternative_tourism_taxonomies']);
        add_action('wp_ajax_live_search', [$setup, 'live_search_handler']);
        add_action('wp_ajax_nopriv_live_search', [$setup, 'live_search_handler']);

        add_filter('get_robots', [$setup, 'remove_max_image_preview'], 10, 3);
        add_filter('acf/settings/save_json', [$setup, 'my_acf_json_save_point']);
        add_filter('acf/settings/load_json', [$setup, 'my_acf_json_load_point']);
        add_filter('posts_search', [$setup, 'advanced_custom_search'], 500, 2);
        add_filter('timber/twig', [new TwigExtension(), 'addToTwig']);

        remove_action('wp_head', 'print_emoji_detection_script', 7);
        remove_action('wp_print_styles', 'print_emoji_styles');

        parent::__construct();
    }
}
