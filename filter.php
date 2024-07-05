<?php
$post_id = get_the_ID(); // Corrected variable name to $post_id

$selected_category_ids = get_field('category_filter', $post_id);

$category_data = [];

if ($selected_category_ids) {
    foreach ($selected_category_ids as $category_id) {
        $category = get_category($category_id);
        if ($category) {
            $category_image = get_field('category_image', 'category_' . $category_id); // Corrected the field key
            $posts_in_category = Timber::get_posts([
                'category' => $category_id,
                'post_type' => 'post',
            ]);

            $category_data[] = [
                'category' => $category,
                'image' => $category_image,
                'posts' => $posts_in_category,
            ];
        }
    }
}

$context = Timber::context();
$context['category_filter'] = $category_data;

Timber::render('modules/post_display_settings.twig', $context);
?>
