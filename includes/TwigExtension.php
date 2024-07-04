<?php

use Timber\Timber;
use Twig\TwigFilter;
use Twig\TwigFunction;
use App\Setup;

class TwigExtension {

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

        return $twig;
    }

    public function addToContext($context) {
        $context['footer'] = [
            'logo' => get_field('footer_logo', 'option'),
            'content' => get_field('footer_content', 'option'),
        ];

        $setup = new Setup();
        $context['breadcrumbs'] = $setup->get_breadcrumbs();
    
        return $context;
    }

}
