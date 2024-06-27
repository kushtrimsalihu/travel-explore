<?php
namespace App;

use Timber\Timber;
use Timber\PostQuery;

$context = Timber::context();

$term = get_queried_object();
$term_slug = $term->slug;

$query_args = array(
    'post_type' => 'alternative_tourism',
    'tax_query' => array(
        array(
            'taxonomy' => 'alternative_tourism_category',
            'field'    => 'slug',
            'terms'    => $term_slug,
        ),
    ),
);

$wp_query = new \WP_Query($query_args);

$context['posts'] = new PostQuery($wp_query);

$category_data = array(
    'name' => $term->name,
    'slug' => $term->slug,
    'icon' => get_field('icon', $term), 
    'image' => get_field('image', $term), 
);

$context['current_category'] = $category_data;
$context['title'] = single_term_title('', false);
$context['term_description'] = term_description();

Timber::render('templates/taxonomy-alternative_tourism_category.twig', $context);
