<?php
/*
Template Name: Register Page
*/

$context = Timber::context();
if ($errors = get_transient('user_journey_registration_errors')) {
    $context['errors'] = $errors;
    delete_transient('user_journey_registration_errors');
}

if ($message = get_transient('user_journey_registration_message')) {
    $context['message'] = $message;
    delete_transient('user_journey_registration_message');
}

$context['user_journey_registration_nonce'] = wp_nonce_field('user_journey_registration_nonce', 'user_journey_registration_nonce_field', true, false);
Timber::render('views/templates/register.twig', $context);
