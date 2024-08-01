<?php
/**
 * Template Name: Reservation Page
 */

 use Timber\Timber;

 $context = Timber::context();
 $context['flexible_content'] = get_field('flexible_content');
 
 $context['card_image_url'] = isset($_POST['image']) ? esc_url($_POST['image']) : '';
 $context['card_title'] = isset($_POST['title']) ? sanitize_text_field($_POST['title']) : '';
 $context['card_duration'] = isset($_POST['duration']) ? sanitize_text_field($_POST['duration']) : '';
 $context['card_description'] = isset($_POST['description']) ? wp_kses_post(urldecode($_POST['description'])) : '';
 $context['card_price'] = isset($_POST['price']) ? sanitize_text_field($_POST['price']) : '';
 
 Timber::render('views/templates/reservation.twig', $context);
 
?>
