<?php

use Timber\Timber;

$context = Timber::context();
Timber::render('views/templates/errors/404.twig', $context); 