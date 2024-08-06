<?php
use Timber\Timber;

$context = Timber::context();
$context['flexible_content'] = get_field('flexible_content'); 
Timber::render('base.twig', $context);