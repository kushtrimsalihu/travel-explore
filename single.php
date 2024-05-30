<?php

$location = get_field('location');

$related_post = get_field('related_post');

get_header();

?>
<section class="page">
    <div class="container">

    <h1 class="text-3xl font-bold text-blue-500 underline"><?php the_title(); ?></h1>
          
            <?php foreach ($location as $post): ?>

            <?php setup_postdata($post); ?>
            
            <?php echo the_title(); ?>
            
            <br>
            
            <?php the_field('address'); ?>

        <?php wp_reset_postdata(); endforeach; ?>
        
       <?php echo $related_post->post_title; ?>

    </div>
</section>

<?php get_footer(); ?>