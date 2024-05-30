<?php get_header(); ?>

<?php $title = get_field('page_title'); ?>
<?php $description = get_field('description'); ?>
<?php $other_description = get_field('other_description'); ?>
<?php $my_input = get_field('my_input'); ?>

<?php $content_image = get_field('content_image'); ?>

<?php $picture = $content_image['sizes']['medium'] ;?>

<section class="page">
    <div class="container">


    <?php //  var_dump($content_image); ?>

    <img src="<?php echo $picture ; ?>" alt="">
       
    <h1 class="text-blue-500"><?php the_title(); ?></h1>


        <?php if (have_posts()) : while (have_posts()) : the_post(); ?>

                <?php the_content(); ?>

        <?php endwhile;
        else : endif; ?>

        <?php if ($title) :
            echo $title;
        endif;
        ?>

        <?php if ($description) :
            echo nl2br($description);
        endif;
        ?>

        <?php if ($other_description) :
            echo nl2br($other_description);
        endif; ?>

        <!-- php
            if (have_rows('flexible_content')):
                while (have_rows('flexible_content')): the_row();
                    
                    if (get_row_layout() == 'header'):
                        get_template_part('template-parts/flexible-content', 'header');
                    
                    elseif (get_row_layout() == 'footer'):
                        get_template_part('template-parts/flexible-content', 'footer');
                    
                    
                    endif;
                
                endwhile;
            else:
                
                the_content();
            endif;
        ?> -->
    
    </div>
</section>

<?php get_footer(); ?>

