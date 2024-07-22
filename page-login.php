<?php
/**
 * Template Name: Login Page
 */

use Timber\Timber;

$context = Timber::context();

if (is_user_logged_in()) {
    wp_redirect(admin_url('edit.php?post_type=user_journey'));
    exit;
}

if (isset($_GET['login']) && $_GET['login'] == 'failed') {
    $context['login_failed'] = 'Invalid username or password. Please try again!';
}

if (isset($_GET['message']) && $_GET['message'] == 'login_required') {
    $context['login_required'] = 'You must be logged in to make a reservation.';
}

Timber::render('views/templates/login.twig', $context);
