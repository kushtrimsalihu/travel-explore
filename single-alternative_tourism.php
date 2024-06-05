<?php get_header(); ?>

<?php
while ( have_posts() ) : the_post();
?>
    
    <div class="content">
        <?php the_content(); ?>
    </div>
    
        <?php if ( have_rows( 'flexible_content' ) ) : ?>
            <?php while ( have_rows( 'flexible_content' ) ) : the_row(); ?>
                
                <?php if (get_row_layout() == 'banner'): ?>

                    <?php get_template_part('template-parts/Banner'); ?>

                <?php elseif (get_row_layout()=='cards'): ?>

                    <?php get_template_part('template-parts/Cards'); ?>

                <?php else: ?>
                    <p>Other layout: <?php the_row_layout(); ?></p>
                <?php endif; ?>

            <?php endwhile; ?>
        <?php else: ?>
            <p>No rows found.</p>
        <?php endif; ?>

    <div class="featured-image">
        <?php if ( has_post_thumbnail() ) {
            the_post_thumbnail();
        } ?>
    </div>
<?php endwhile; ?>

<?php get_footer(); ?>
