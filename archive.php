<?php

namespace App;

use Timber\Timber;

$context = Timber::context();
$context['posts'] = Timber::get_posts();
$templates = ['templates/archive.twig', 'templates/page.twig'];

if (is_post_type_archive('alternative_tourism')) {
    $context['title'] = post_type_archive_title('', false);
    $context['flexible_content'] = get_field('flexible_content'); 
    array_unshift($templates, 'templates/alt-tourism/archive-alternative-tourism.twig');
} elseif (is_tax('alternative_tourism_category')) {
    $context['title'] = single_term_title('', false);
    array_unshift($templates, 'templates/taxonomy-alternative_tourism_category.twig');
    $context['term_description'] = term_description();
} elseif (is_tax('blog_category')) {
    $context['title'] = single_term_title('', false);
    array_unshift($templates, 'templates/taxonomy-blog_category.twig');
    $context['term_description'] = term_description();
} elseif (is_post_type_archive('user_journey')) {
    $context['title'] = post_type_archive_title('', false);
    array_unshift($templates, 'templates/archive-user_journey.twig');
}

Timber::render($templates, $context);
