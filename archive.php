<?php 

namespace App;

use Timber\Timber;

$templates = ['templates/archive.twig', 'templates/page.twig'];

$context = Timber::context();

if (is_tax('alternative_tourism_category')) {
    $context['title'] = single_term_title('', false);
    array_unshift($templates, 'templates/taxonomy-alternative_tourism_category.twig');
    $context['term_description'] = term_description();
} elseif (is_tax('blog_category')) {
    $context['title'] = single_term_title('', false);
    array_unshift($templates, 'templates/taxonomy-blog_category.twig');
    $context['term_description'] = term_description();
}

$context['posts'] = Timber::get_posts();

Timber::render($templates, $context);
