<?php
$context = Timber::context();
$post = Timber::get_post();
$context['post'] = $post;

$image_id = get_post_thumbnail_id($post->ID);
if ($image_id) {
    $image_src = wp_get_attachment_image_src($image_id, 'full');
    $context['featured_image'] = $image_src[0];
};

$context['description'] = get_field('description', $post->ID);
$context['title'] = get_field('title', $post->ID);
$context['author_image'] = get_field('author_image', $post->ID);
$context['gallery'] = get_field('gallery', $post->ID);

Timber::render('views/templates/single-user_journey.twig', $context);
