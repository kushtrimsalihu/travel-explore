<?php get_header();?>

<?php $random_txt = get_field('random_txt'); ?>

<?php $content_image = get_field('content_image'); ?>

<section class="page">
    <div class="container">


    <h1>dasda</h1>
                <h1><?php the_title();?></h1>
            
                <?php if (have_posts()) : while (have_posts()) : the_post(); ?>

                <?php the_content(); ?>

                <?php endwhile; else: endif; ?>


                <?php echo $random_txt; ?>

                <img src="<?=  $content_image['sizes']['medium']; ?>" alt="<?=  $content_image['alt']; ?>" title="<?= $content_image['title'];?>">
             
              <img src=" <?php // wp_get_attachment_image(get_field('test_image'),'full') ; ?>" alt="">
    </div>
</section>

<?php get_footer();?>

