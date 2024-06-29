<?php
/**
 * Template Name: Tourism Categories
 */

namespace App;

use Timber\Timber;
use Timber\Post;

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
        $image_url = get_field('image', $term); 

        $categories[] = [
            'term' => $term,
            'term' => [
                'name' => $term->name,
                'description' => $term->description,
                'link' => get_term_link($term),
                'image' => $image_url,
            ]
        ];
    }

    $context['categories'] = $categories;
}

$templates = ['templates/page-tourism-categories.twig'];

Timber::render($templates, $context);
