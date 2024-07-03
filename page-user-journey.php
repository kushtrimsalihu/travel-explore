<?php
/*
Template Name: User Journey
*/

$context = Timber::context();
$context['posts'] = Timber::get_posts(array(
    'post_type' => 'user_journey',
));

Timber::render('views/templates/page-user-journey.twig', $context);
