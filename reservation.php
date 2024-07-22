<?php
/**
 * Template Name: Reservation 
 */

 use Timber\Timber;

 $context = Timber::context();
 $context['flexible_content'] = get_field('flexible_content');
 

 $context['card_image_url'] = isset($_GET['image']) ? esc_url($_GET['image']) : '';
 $context['card_title'] = isset($_GET['title']) ? sanitize_text_field($_GET['title']) : '';
 $context['card_duration'] = isset($_GET['duration']) ? sanitize_text_field($_GET['duration']) : '';
 $context['card_description'] = isset($_GET['description']) ? wp_kses_post($_GET['description']) : '';
 $context['card_price'] = isset($_GET['price']) ? sanitize_text_field($_GET['price']) : '';
 
 Timber::render('views/templates/reservation.twig', $context);
 
