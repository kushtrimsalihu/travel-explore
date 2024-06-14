<?php

use Timber\Timber;

$context = Timber::context();

$context['flexible_content'] = get_field('flexible_content');

Timber::render('partials/head.twig', $context);

Timber::render('partials/HeaderNavigation.twig', $context);

Timber::render('templates/page.twig', $context);

Timber::render('partials/footer.twig', $context);

wp_footer();