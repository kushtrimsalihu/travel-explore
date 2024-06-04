<?php get_header(); ?>

<?php
// Sanitize and store the search query
$search_term = isset($_GET['s']) ? sanitize_text_field($_GET['s']) : '';

// Build the search arguments based on user input
$search_args = array(
    's' => $search_term, // Use sanitized search query
    'post_type' => 'any',
);

// Allow customization of post types to be searched (optional)
if (isset($_GET['post_type'])) {
    $search_args['post_type'] = sanitize_text_field($_GET['post_type']); // Sanitize post type
}

// Execute the search query
$search_results = new WP_Query($search_args);
?>

<div class="container">
    <?php if ($search_results->have_posts()) : ?>
        <div class="search-results">
            <?php while ($search_results->have_posts()) : $search_results->the_post(); ?>
                <div class="search-result-item">
                    <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                    <div class="search-result-excerpt">
                        <?php the_excerpt(); ?>
                    </div>
                </div>
            <?php endwhile; ?>
        </div>
    <?php else : ?>
        <div class="no-results">
            <h2><?php _e('Nuk u gjetën rezultate', 'textdomain'); ?></h2>
        </div>
    <?php endif; ?>

    <?php wp_reset_postdata(); // Reset post data ?>
</div>

<?php get_footer(); ?>
