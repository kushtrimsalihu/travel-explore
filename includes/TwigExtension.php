<?php

use Timber\Timber;
use Twig\TwigFilter;
use Twig\TwigFunction;
use App\Setup;

class TwigExtension {
    protected $setup;

    public function __construct() {
        $this->setup = new Setup();
    }

    public function addToTwig($twig)
    {
        $twig->addFunction(new TwigFunction("dd", function ($item) {
            return dd($item);
        }));
        
        $twig->addFunction(new TwigFunction('wp_nav_menu', 'wp_nav_menu'));

        $twig->addFunction(new TwigFunction('asset', function ($asset) {
            return get_template_directory_uri() . '/' . $asset;
        }));

        $twig->addFunction(new TwigFunction('file_exists', function ($path) {
            return file_exists(get_template_directory() . '/' . $path);
        }));

        $twig->addFunction(new TwigFunction('home_url', function () {
            return home_url();
        }));

        $twig->addFunction(new TwigFunction('get_term_link', function ($term) {
            return get_term_link($term);
        }));

        $twig->addFunction(new TwigFunction('get_posts_by_type', function ($post_type) {
            return Setup::get_all_posts_by_type($post_type);
        }));

        $twig->addFunction(new TwigFunction('get_latest_posts', function ($selected_post_type) {
            return Setup::get_latest_posts($selected_post_type);
        }));
        $twig->addFunction(new TwigFunction('get_categories_and_posts', [$this->setup, 'get_categories_and_posts']));

        $twig->addFunction(new Twig\TwigFunction('do_shortcode', function($content) {
            return do_shortcode($content);
        }));

        return $twig;
    }

    public function addToContext($context) {
        $context['footer'] = [
            'logo' => get_field('footer_logo', 'option'),
            'content' => get_field('footer_content', 'option'),
        ];

        $setup = new Setup();
        $context['breadcrumbs'] = $setup->get_breadcrumbs();
        $context['category_filter'] = $setup->get_categories_and_posts(); 
    
        return $context;
    }
}
