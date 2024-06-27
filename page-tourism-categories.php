<?php
/**
 * Template Name: Tourism Categories
 */

namespace App;

use Timber\Timber;

$context = Timber::context();
$context['title'] = 'Tourism Categories';

$terms = get_terms([
    'taxonomy' => 'alternative_tourism_category',
    'hide_empty' => false,
]);

if (is_wp_error($terms)) {
    echo 'Error retrieving terms: ' . $terms->get_error_message();
    die();
} else {
    $categories = [];

    foreach ($terms as $term) {
        $posts = get_posts([
            'post_type' => 'alternative_tourism',
            'posts_per_page' => -1, 
            'tax_query' => [
                [
                    'taxonomy' => 'alternative_tourism_category',
                    'field'    => 'term_id',
                    'terms'    => $term->term_id,
                ],
            ],
        ]);

        $categories[] = [
            'term' => $term,
            'posts' => $posts,
        ];
    }

    $context['categories'] = $categories;
}

$templates = ['templates/page-tourism-categories.twig'];

Timber::render($templates, $context);
