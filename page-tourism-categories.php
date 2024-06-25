<?php
/**
 * Template Name: Tourism Categories
 */

namespace App;

use Timber\Timber;


ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

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
    $context['categories'] = $terms;
}

$templates = ['templates/page-tourism-categories.twig'];

Timber::render($templates, $context);
