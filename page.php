<?php

use Timber\Timber;

$context = Timber::context();
$context['flexible_content'] = get_field('flexible_content'); 
$context['footer'] = [
    'logo' => get_field('footer_logo', 'option'),
    'content' => get_field('footer_content', 'option'),
];

Timber::render('base.twig', $context);