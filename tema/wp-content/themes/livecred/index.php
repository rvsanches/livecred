<?php get_header(); ?>

<div class="card border-0 text-white text-center">
    <img src="assets/banner-1.png" class="card-img banner-header" alt="Imagem de duas mãos segurando um tênis">
    <div class="card-img-overlay bg-banner-header p-0 m-0 row">
        <div class="col align-self-end">
            <p class="mb-0 lead">Empréstimo pessoal</p>
            <h1 class="mb-4">A solução para quem pensa no futuro</h1>
            <p>
                <a href="#" class="btn btn-lg btn-lc-orange mb-3">Saiba mais</a>
            </p>
        </div>
    </div>
</div>

<div class="container">
    <div class="row my-5 pt-5">
        <div class="col-xl-4 col-lg-6">
            <img src="assets/news-1.png" class="img-fluid mb-3" alt="Imagem 1">
            <h5>
                <a href="#">Empréstimo Consignado</a>
            </h5>
            <p>As melhores taxas e condições para você que deseja realizar todos os seus sonhos na melhor fase vida.
            </p>
            <p>
                <a href="#" class="btn btn-lc-orange">Saiba mais</a>
            </p>
        </div>

        <div class="col-xl-4 col-lg-6 mt-3 mt-lg-0">
            <img src="assets/news-1.png" class="img-fluid mb-3" alt="Imagem 1">
            <h5>
                <a href="#">Empréstimo Consignado</a>
            </h5>
            <p>As melhores taxas e condições para você que deseja realizar todos os seus sonhos na melhor fase vida.
            </p>
            <p>
                <a href="#" class="btn btn-lc-orange">Saiba mais</a>
            </p>
        </div>

        <div class="col-xl-4 col-12 mt-3 mt-xl-0">
            <div class="card">

                <ul class="list-group list-group-flush">
                    <li class="list-group-item border-0">
                        <h5>
                            <a href="#">Empréstimo Consignado</a>
                        </h5>
                        <p class="mb-0">As melhores taxas e condições para você que deseja realizar todos.</p>
                    </li>
                    <li class="list-group-item border-0">
                        <h5>
                            <a href="#">Empréstimo Consignado</a>
                        </h5>
                        <p class="mb-0">As melhores taxas e condições para você que deseja realizar todos.</p>
                    </li>
                    <li class="list-group-item border-0">
                        <h5>
                            <a href="#">Empréstimo Consignado</a>
                        </h5>
                        <p class="mb-0">As melhores taxas e condições para você que deseja realizar todos.</p>
                    </li>
                    <li class="list-group-item border-0">
                        <h5>
                            <a href="#">Empréstimo Consignado</a>
                        </h5>
                        <p class="mb-0">As melhores taxas e condições para você que deseja realizar todos.</p>
                    </li>
                </ul>

            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-8 col-12">

            <h5 class="border-bottom pb-2"><i class="fas fa-newspaper"></i> Novidades</h5>

            <?php if( have_posts() ) : while( have_posts() ) : the_post(); ?>

                    <?php get_template_part('content', get_post_format()); ?>
                
                <?php endwhile; ?>
            
            <?php else : ?>

                <p class="lead">Nenhuma publicação encontrada</p>

            <?php endif; ?>

            <div class="mt-4 mb-5 d-flex justify-content-between">
                <?php next_posts_link('Mais antigos'); ?>
                <?php previous_posts_link('Mais novos'); ?>
            </div>

        </div>

        <?php get_sidebar(); ?>
    </div>

</div>

<div class="bg-lc-gray py-5 mt-5">
    <div class="container">
        <div class="row">

            <?php
                $args = array(
                    'post_type' => 'depoimentos',
                    'posts_per_page' => 2
                );
                $the_query = new WP_Query( $args );
            ?>

            <?php if ( $the_query->have_posts() ) : 
                while ( $the_query->have_posts() ) :
                $the_query->the_post(); ?>

                    <div class="col-md-6 col-sm-12 mb-4 mb-md-0">
                        <div class="card border-card-footer">
                            <div class="card-body">
                                <?php the_content(); ?>
                            </div>
                        </div>
                    </div>

                <?php endwhile; ?>
            <?php else : ?>

                <div class="col-12">
                
                    <p class="lead">
                        Nenhum depoimento encontrado
                    </p>

                </div>

            <?php endif; ?>
      
        </div>
    </div>
</div>

<?php get_footer(); ?>