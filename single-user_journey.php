<?php
$context = Timber::context();
$post = Timber::get_post();
$context['post'] = $post;

$image_id = get_post_thumbnail_id($post->ID);
if ($image_id) {
    $image_src = wp_get_attachment_image_src($image_id, 'full');
    $context['featured_image'] = $image_src[0];
};

$author_id = $post->post_author;
$context['profile_image'] = get_avatar_url($author_id);
$context['current_user_id'] = get_current_user_id();
$context['post_author_id'] = get_post_field('post_author', get_the_ID());

$context['description'] = get_field('description', $post->ID);
$context['title'] = get_field('title', $post->ID);
$context['author_image'] = get_field('author_image', $post->ID);
$context['gallery'] = get_field('gallery', $post->ID);


$args = array(
    'post_type' => 'user_journey',
    'posts_per_page' => 4,
    'post__not_in' => array($post->ID),
    'orderby' => 'date',
    'order' => 'DESC',
);

$context['post'] = $post;
$context['latest_posts'] = Timber::get_posts($args);

Timber::render('views/templates/single-user_journey.twig', $context);
