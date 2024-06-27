<?php
/*
Template Name: Contact Us
*/
namespace App;

use Timber\Timber;

$templates = ['templates/contact-us.twig'];
$title = 'Contact Us';

$context = Timber::context();

$context['title'] = $title;


$context['site'] = [
    'address' => get_field('address'),
    'phone' => get_field('phone'),
    'email' => get_field('email'),
    'business_hours_weekdays' => get_field('business_hours_weekdays'), 
    'business_hours_weekend' => get_field('business_hours_weekend')    
];


$context['latitude'] = get_field('latitude');
$context['longitude'] = get_field('longitude');

Timber::render($templates, $context);
