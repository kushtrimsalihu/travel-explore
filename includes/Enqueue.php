<?php

namespace App;

class Enqueue {

    public function dequeueScripts() {
        if (is_admin()) {
            return;
        }

        wp_dequeue_script('jquery');
        wp_deregister_script('jquery');

        wp_dequeue_script('wp-embed');
        wp_deregister_script('wp-embed');

        wp_dequeue_script('wp-emoji-release');
        wp_deregister_script('wp-emoji-release');
    }

    public function dequeueStyles() {
        wp_dequeue_style('wp-block-library');
        wp_deregister_style('wp-block-library');
        wp_dequeue_style('classic-theme-styles-inline-css');
        wp_dequeue_style('global-styles-inline-css');
    }

    public function travel_enqueue_scripts() {
        wp_enqueue_style('theme-style', get_template_directory_uri() . '/dist/css/app.css', [], filemtime(get_template_directory() . '/dist/css/app.css'), 'all');
        wp_enqueue_script('theme-script', get_template_directory_uri() . '/dist/js/app.js', [], filemtime(get_template_directory() . '/dist/js/app.js'), true);
        
        wp_enqueue_script('jquery');

        wp_enqueue_style('leaflet-css', 'https://unpkg.com/leaflet@1.7.1/dist/leaflet.css', [], '1.7.1', 'all');
        wp_enqueue_script('leaflet-js', 'https://unpkg.com/leaflet@1.7.1/dist/leaflet.js', [], '1.7.1', true);
    
        wp_enqueue_style('leaflet-routing-machine-css', 'https://unpkg.com/leaflet-routing-machine@3.2.12/dist/leaflet-routing-machine.css');
        wp_enqueue_script('leaflet-routing-machine-js', 'https://unpkg.com/leaflet-routing-machine@3.2.12/dist/leaflet-routing-machine.js', array('leaflet-js'), null, true);
    
        wp_localize_script('theme-script', 'ajaxurl', array('url' => admin_url('admin-ajax.php')));

    }

    public function swiper_scripts() {
        wp_enqueue_style('swiper-css', get_template_directory_uri() . '/node_modules/swiper/swiper-bundle.min.css', [], null, 'all');
        wp_enqueue_script('swiper-js', get_template_directory_uri() . '/node_modules/swiper/swiper-bundle.min.js', [], null, true);
        wp_enqueue_script('carousel', get_template_directory_uri() . '/dist/js/carousel.js', ['swiper-js'], filemtime(get_template_directory() . '/dist/js/carousel.js'), true);
    }

    public function enqueue_live_search_script() {
        wp_enqueue_script('live-search', get_template_directory_uri() . '/src/js/live-search.js', [], '1.0', true);
        wp_localize_script('live-search', 'live_search_params', [
            'ajax_url' => admin_url('admin-ajax.php'),
        ]);
    }

    function enqueue_fancybox() {
        wp_enqueue_style('fancybox', get_template_directory_uri() . '/node_modules/@fancyapps/fancybox/dist/jquery.fancybox.min.css', array(), '3.5.7');

        wp_enqueue_script('jquery', get_template_directory_uri() . '/node_modules/jquery/dist/jquery.min.js', array(), '3.7.1', true);

        wp_enqueue_script('custom-fancybox', get_template_directory_uri() . '/src/js/custom-fancybox.js', array('fancybox'), '1.0.0', true);

        wp_enqueue_script('fancybox', get_template_directory_uri() . '/node_modules/@fancyapps/fancybox/dist/jquery.fancybox.min.js', array('jquery'), '3.5.7', true);

    }


    
}
