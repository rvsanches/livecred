<?php get_header(); ?>

<div class="container">

    <?php if( have_posts() ) : while( have_posts() ) : the_post(); ?>

        <h1 class="mt-5 mb-4"><?php the_title(); ?></h1>

        <?php the_content(); ?>

        <?php endwhile; ?>

    <?php else : get_404_template(); endif; ?>

</div>

<?php get_footer(); ?>