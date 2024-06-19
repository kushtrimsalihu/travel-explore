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
    }
    public function enqueue_live_search_script() {
        wp_enqueue_script('live-search', get_template_directory_uri() . '/src/js/live-search.js', [], '1.0', true);
        wp_localize_script('live-search', 'live_search_params', [
            'ajax_url' => admin_url('admin-ajax.php'),
        ]);
    }
}
