<?php
use Timber\Timber;

$context = Timber::context();

$search_term = isset($_GET['s']) ? sanitize_text_field($_GET['s']) : '';

$search_args = array(
    's' => $search_term,
    'post_type' => array('post', 'page', 'alternative_tourism'),
    'posts_per_page' => -1,
);

$search_results = new WP_Query($search_args);

$processed_results = array(
    'post' => array(),
    'page' => array(),
);
$total_results = 0;

if ($search_results->have_posts()) {
    while ($search_results->have_posts()) {
        $search_results->the_post();

        $post_type = get_post_type();
        $post_data = array(
            'title' => get_the_title(),
            'query'=> $search_term,
            'permalink'=> get_permalink(),
            'thumbnail' => get_the_post_thumbnail(null, 'full', array('class' => 'w-16 h-16')),
            'excerpt' => get_the_excerpt(),
            'post_type' => $post_type,
        );

        if ($post_type === 'alternative_tourism') {
            $processed_results['post'][] = $post_data;
        } else {
            $processed_results[$post_type][] = $post_data;
        }
        $total_results++;
    }
}

wp_reset_postdata();

$context['search_results'] = $processed_results;
$context['total_results'] = $total_results;
$context['search_term'] = $search_term;

Timber::render('views/modules/search.twig', $context);
?>
