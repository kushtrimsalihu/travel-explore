<?php get_header(); ?>

<div class="content-area max-w-7xl mx-auto py-8">
    <main class="site-main" role="main">
        <?php if (have_posts()) : ?>
            <?php while (have_posts()) : the_post(); ?>
                <article id="post-<?php the_ID(); ?>" <?php post_class('bg-white shadow-md rounded-lg p-6 mb-6'); ?>>
                    <header class="entry-header mb-4">
                        <?php if (has_post_thumbnail()) : ?>
                            <div class="mb-4">
                                <?php the_post_thumbnail('full', array('class' => 'w-full h-auto rounded')); ?>
                            </div>
                        <?php endif; ?>
                        <h1 class="entry-title text-3xl font-bold"><?php the_title(); ?></h1>
                    </header>
                    <div class="entry-content space-y-4">
                        <?php the_content(); ?>
                    </div>
                </article>
            <?php endwhile; ?>
            <?php the_posts_navigation(); ?>
        <?php else : ?>
            <p class="text-center">No posts found.</p>
        <?php endif; ?>
    </main>
</div>

<?php get_sidebar(); ?>
<?php get_footer(); ?>
