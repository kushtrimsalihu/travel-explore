<?php get_header(); ?>

<div class="content-area max-w-7xl mx-auto py-8">
    <main class="site-main" role="main">
        <?php if (have_posts()) : ?>
            <header class="page-header mb-6">
                <h1 class="page-title text-3xl font-bold">Alternative Tourisms</h1>
            </header>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                <?php while (have_posts()) : the_post(); ?>
                    <article id="post-<?php the_ID(); ?>" <?php post_class('bg-white shadow-md rounded-lg overflow-hidden'); ?>>
                        <header class="entry-header">
                            <?php if (has_post_thumbnail()) : ?>
                                <a href="<?php the_permalink(); ?>" class="block">
                                    <?php the_post_thumbnail('full', array('class' => 'w-full h-48 object-cover')); ?>
                                </a>
                            <?php endif; ?>
                            <h2 class="entry-title text-xl font-semibold p-4"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                        </header>
                        <div class="entry-content p-4">
                            <?php the_excerpt(); ?>
                        </div>
                    </article>
                <?php endwhile; ?>
            </div>
            <?php the_posts_navigation(); ?>
        <?php else : ?>
            <p class="text-center">No Alternative Tourisms found.</p>
        <?php endif; ?>
    </main>
</div>

<?php get_sidebar(); ?>
<?php get_footer(); ?>
