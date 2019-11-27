<?php if( is_single() ) : ?>

    <div class="row">
        <div class="col-8 mb-5">

            <h1 class="mt-5 mb-4"><?php the_title(); ?></h1>

            <?php the_post_thumbnail('post-thumbnail', array('class' => 'img-fluid')); ?>

            <p class="text-muted mt-3">
                <i class="far fa-clock"></i> <small>Publicado em: <?php echo get_the_date('d/m/y'); ?></small>
            </p>

            <?php the_content(); ?>

        </div>
    </div>

<?php else : ?>

    <div class="row mt-4">
        <div class="col-md-6 col-sm-12">
            <a href="<?php the_permalink(); ?>">
                <?php the_post_thumbnail('post-thumbnail', array('class' => 'img-fluid')); ?>
            </a>
        </div>
        <div class="col-md-6 col-sm-12 mt-3 mt-md-0">
            <p>
                <span class="badge badge-lc-gray">
                    <?php the_category(', '); ?>
                </span>
            </p>
            <h5>
                <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
            </h5>
            <?php the_excerpt(); ?>
            <p class="text-muted mt-3">
                <i class="far fa-clock"></i> <small>Publicado em: <?php echo get_the_date('d/m/y'); ?></small>
            </p>
        </div>
    </div>

<?php endif; ?>

                