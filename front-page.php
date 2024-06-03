<?php get_header(); ?>


<!-- Lidhja e Flexible Conntent (Banner) -->
<section class="page">
    <div>
        <?php if (have_rows('flexible_content')): ?>

            <?php while (have_rows('flexible_content')): the_row(); ?>
                <?php if (get_row_layout() == 'banner'): ?>
                 

                    <?php get_template_part('template-parts/content','banner'); ?>
                <?php else: ?>
                    <p>Other layout: <?php the_row_layout(); ?></p>
                <?php endif; ?>
            <?php endwhile; ?>
        <?php else: ?>
            <p>No rows found.</p>
            <?php the_content(); ?>
        <?php endif; ?>
    </div>
</section>

<?php get_footer(); ?>
