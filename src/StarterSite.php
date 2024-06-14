<?php

namespace App;

use Timber\Site;
use Timber\Timber;
use Twig\TwigFunction;


/**
 * Class StarterSite
 */
class StarterSite extends Site {
	
	public function __construct() {
		add_action( 'after_setup_theme', [ $this, 'theme_supports' ]);
		add_action( 'init', [$this, 'register_post_types' ]);
		add_action( 'init', [$this, 'register_taxonomies' ]);
		add_action('wp_enqueue_scripts', [$this, 'travel_enqueue_scripts']);
		add_action('init', [$this, 'register_alternative_tourism_cpt']);
		add_action('init', [$this, 'register_alternative_tourism_taxonomies']);
		add_action('wp_enqueue_scripts',[$this, 'enqueue_live_search_script']);
		add_action('wp_ajax_live_search', [$this, 'live_search_handler']);
		add_action('wp_ajax_nopriv_live_search', [$this, 'live_search_handler']);
		

		add_filter( 'timber/context', [$this, 'add_to_context']);
		add_filter( 'timber/context', [$this, 'home' ]);
		add_filter( 'timber/twig', [$this, 'add_to_twig' ]);
		add_filter( 'timber/twig/environment/options', [$this, 'update_twig_environment_options' ] );
        add_filter('posts_search', [$this, 'advanced_custom_search'], 500, 2);


		

		parent::__construct();
	}
	public function home( $context ) {
        $context['home_url'] = home_url();
        return $context;
    }
// search with ajax
    public function enqueue_live_search_script() {
        wp_enqueue_script('live-search', get_template_directory_uri() . '/src/js/live-search.js', array(), '1.0', true);
        wp_localize_script('live-search', 'live_search_params', array(
            'ajax_url' => admin_url('admin-ajax.php'),
        ));
    }
    public function live_search_handler() {
        if (!isset($_GET['query'])) {
            wp_die('No query parameter');
        }

        $query = sanitize_text_field($_GET['query']);
        $args = array(
            's' => $query,
            'posts_per_page' => 10,
            'post_type' => array('post', 'page','alternative_tourism'), // Add your custom post types here
            'post_status' => 'publish'
        );

        $search_query = new \WP_Query($args);

        if ($search_query->have_posts()) {
            echo '<ul>';
            while ($search_query->have_posts()) {
                $search_query->the_post();
                echo '<li class="search-result-item m-2 flex item-center p-2 gap-5 hover:bg-light-hover">';
                echo '<div class="search-result-thumbnail w-1/12">' . get_the_post_thumbnail(null, 'full', array('class' => 'w-full')) . '</div>';
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
            $exploded = array(0 => $terms);
        }

        return $where;
    }
    
	

	/**
	 * This is where you can register custom post types.
	 */
	public function register_post_types() {

	}
	

	function travel_enqueue_scripts() {
		wp_enqueue_style('theme-style', get_template_directory_uri() . '/assets/css/app.css', array(), filemtime(get_template_directory() . '/assets/css/app.css'), 'all');
		wp_enqueue_script('theme-script', get_template_directory_uri() . '/assets/js/app.js', array(), filemtime(get_template_directory() . '/assets/js/app.js'), true);
	}

	public function register_taxonomies() {

	}

	public function add_to_context( $context ) {
		$context['foo']   = 'bar';
		$context['stuff'] = 'I am a value set in your functions.php file';
		$context['notes'] = 'These values are available everytime you call Timber::context();';
		$context['menu']  = Timber::get_menu();
		$context['site']  = $this;

		return $context;
	}

	public function theme_supports() {
		add_theme_support( 'title-tag' );
		add_theme_support( 'post-thumbnails' );
		add_image_size('small', 600, 600, false);
		add_theme_support(
			'html5',
			array(
				'comment-form',
				'comment-list',
				'gallery',
			)
		);
		add_theme_support(
			'post-formats',
			array(
				'aside',
				'image',
				'video',
				'quote',
				'link',
				'gallery',
				'audio',
			)
		);

		add_theme_support( 'menus' );
	}

	public function add_to_twig( $twig ) {
		$twig->addFunction( new TwigFunction( 'wp_nav_menu', 'wp_nav_menu' ) );

        $twig->addFunction( new TwigFunction('asset', function ($asset) {
            return get_template_directory_uri() . '/' . $asset;
        }));

        $twig->addFunction(new \Twig\TwigFunction('file_exists', function ($path) {
            return file_exists(get_template_directory() . '/' . $path);
        }));


		return $twig;
	}

	function update_twig_environment_options( $options ) {
	    // $options['autoescape'] = true;

	    return $options;
	}

	public function register_navigation_menus() {
        register_nav_menus(array(
            'top-menu' => __('Top Menu', 'theme'),
            'footer-menu' => __('Footer Menu', 'theme'),
            'footer-menu-product' => __('Footer Menu Product', 'theme'),
            'footer-menu-company' => __('Footer Menu Company', 'theme'),
            'footer-menu-legals' => __('Footer Menu Legals', 'theme'),
            'footer-menu-social-media' => __('Footer Menu Social Media', 'theme'),
        ));
    }

	public function my_acf_json_save_point($path) {
        $path = get_stylesheet_directory() . '/acf-json';
        return $path;
    }

    // Add this method to handle ACF JSON load point
    public function my_acf_json_load_point($paths) {
        unset($paths[0]);
        $paths[] = get_stylesheet_directory() . '/acf-json';
        return $paths;
    }

	 // Method to register the 'Alternative Tourism' custom post type
	 public function register_alternative_tourism_cpt() {
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
            'taxonomies' => array('alternative_tourism_category', 'alternative_tourism_tag'),
            'menu_icon' => 'dashicons-palmtree',
            'show_in_rest' => true,
        );

        register_post_type('alternative_tourism', $args);
    }

    // Method to register taxonomies for 'Alternative Tourism' custom post type
    public function register_alternative_tourism_taxonomies() {
        // Categories
        $labels = array(
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
        );

        $args = array(
            'hierarchical' => true,
            'labels' => $labels,
            'show_ui' => true,
            'show_admin_column' => true,
            'query_var' => true,
            'rewrite' => array('slug' => 'tourism-category'),
        );

        register_taxonomy('alternative_tourism_category', array('alternative_tourism'), $args);

        // Tags
        $labels = array(
            'name' => 'Alternative Tourism Tags',
            'singular_name' => 'Alternative Tourism Tag',
            'search_items' => 'Search Alternative Tourism Tags',
            'all_items' => 'All Alternative Tourism Tags',
            'edit_item' => 'Edit Alternative Tourism Tag',
            'update_item' => 'Update Alternative Tourism Tag',
            'add_new_item' => 'Add New Alternative Tourism Tag',
            'new_item_name' => 'New Alternative Tourism Tag Name',
            'menu_name' => 'Alternative Tourism Tags',
        );

        $args = array(
            'hierarchical' => false,
            'labels' => $labels,
            'show_ui' => true,
            'show_admin_column' => true,
            'query_var' => true,
            'rewrite' => array('slug' => 'tourism-tag'),
        );

        register_taxonomy('alternative_tourism_tag', 'alternative_tourism', $args);
    }		
}
