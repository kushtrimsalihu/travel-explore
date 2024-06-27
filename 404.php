<?php

use Timber\Timber;

$context = Timber::context();
$context['site_url'] = home_url('/'); 

Timber::render('views/templates/errors/404.twig', $context); 