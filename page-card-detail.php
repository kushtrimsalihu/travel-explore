<?php
/*
Template Name: Card Detail
*/

$context = Timber::context();
$card_id = get_query_var('card_id');

// Kontrollo vlerën e $card_id
if (!$card_id) {
    wp_die('Invalid card ID');
}

$context['card'] = get_card_data($card_id);

// Kontrollo nëse $context['card'] është e vlefshme
if (!$context['card']) {
    wp_die('No card data found for the provided ID');
}

Timber::render('card-detail.twig', $context);
