<?php

$location = get_field('location');

$related_post = get_field('related_post');

get_header();

?>
<section class="page">
    <div class="container">

        <h2><?php the_title(); ?></h2>
          
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