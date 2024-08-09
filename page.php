<?php

use Timber\Timber;
use App\Setup;

$context = Timber::context();
$context['flexible_content'] = get_field('flexible_content'); 

Timber::render('base.twig', $context);
