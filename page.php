<?php

use Timber\Timber;
use App\Setup;

$context = Timber::context();
$context['flexible_content'] = get_field('flexible_content'); 
$context['footer'] = [
    'logo' => get_field('footer_logo', 'option'),
    'content' => get_field('footer_content', 'option'),
];

$post_type = Setup::get_post_type_from_flexible_content($context['flexible_content']);

// Fetch posts of the dynamic post type
$context['posts'] = Setup::get_all_posts_by_type($post_type);
$context['post_type'] = $post_type;

Timber::render('base.twig', $context);
