<div class="bg-lc-dark py-5">
    <div class="container">
        <div class="row">
            <div class="col text-center text-white">
                <p class="mb-0">Não perca as novidades</p>
                <h3 class="mb-4">Inscreva-se em nossa newsletter</h3>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-xl-4 col-md-6 col-10">
                <form>
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Ex: nome@email.com">
                        <div class="input-group-append">
                            <button class="btn btn-lc-orange" type="button">
                                Ok
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-xl-3 col-lg-4 col-md-6 col-8">

                <?php 
                    
                    $lc_custom_logo = get_theme_mod('custom_logo');
                    $logo = wp_get_attachment_image_src($lc_custom_logo, 'full');

                    if(has_custom_logo()) {
                    echo '<img src="' . esc_url($logo[0]) . '" class="img-fluid my-5" alt="Logotipo LiveCred">'; 
                    } else {
                        echo '<h1 class="m-0">' . get_bloginfo('name'). '</h1>';
                        echo '<p class="m-0">' . get_bloginfo('description'). '</p>';
                    }

                ?>
                
            </div>
        </div>

        <div class="row">

                <?php
                    wp_nav_menu( array(
                        'theme_location'    => 'rodape',
                        'depth'             => 2,
                        'container'         => 'div',
                        'container_class'   => 'col-12 mb-5',
                        'menu_class'        => 'nav justify-content-center',
                        'fallback_cb'       => 'WP_Bootstrap_Navwalker::fallback',
                        'walker'            => new WP_Bootstrap_Navwalker(),
                    ) );
                ?>

        </div>

        <div class="row">
            <div class="col text-center text-white">
                <ul class="list-inline mb-0">
                    <li class="list-inline-item mr-3">
                        <i class="fas fa-phone"></i>
                        (11) 3256-7896
                    </li>
                    <li class="list-inline-item mr-3">
                        <i class="fab fa-whatsapp"></i>
                        (11) 98714-1234
                    </li>
                    <li class="list-inline-item mr-3">
                        <i class="fas fa-inbox"></i>
                        contato@livecred.com.br
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div> 

<?php wp_footer(); ?>

<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="<?php bloginfo('template_url'); ?>/js/jquery.js"></script>
<script src="<?php bloginfo('template_url'); ?>/js/popper.js"></script>
<script src="<?php bloginfo('template_url'); ?>/js/bootstrap.js"></script>
</body>

</html>