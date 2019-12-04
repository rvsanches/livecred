<?php

// Executa as funções que precisam de suporte do tema
function lc_theme_support() {
    // Cria a tag de título do site
    add_theme_support('title-tag');

    // Suporte para logotipo personalizado
    add_theme_support('custom-logo');

    // Registra o Custom Navigation Walker
    require_once get_template_directory() . '/class-wp-bootstrap-navwalker.php';
}
add_action('after_setup_theme', 'lc_theme_support');

if (!function_exists('wp_render_title_tag')) {
    function lc_render_title() {
        ?> <title><?php wp_title('|', true, 'right'); ?> <?php bloginfo('name'); ?></title> <?php
    }
    add_action('wp_head', 'lc_render_title');
}

// Registra os menus no tema
register_nav_menus( array(
    'topo'   =>  __('Menu no topo', 'livecred'),
    'rodape' =>  __('Menu no rodapé', 'livecred')
));

// Definir o tamanho das miniaturas
add_theme_support( 'post-thumbnails' );
set_post_thumbnail_size( 1280, 720, true );


// Definir o tamanho do resumo
add_filter( 'excerpt_length', function($length) {
    return 12;
});

// Definir o estilo da paginação
add_filter('next_posts_link_attributes', 'posts_link_attributes');
add_filter('previous_posts_link_attributes', 'posts_link_attributes');

function posts_link_attributes() {
    return 'class="btn btn-lc-orange"';
}

register_sidebar(
    array(
        'name' => 'Busca',
        'id' => 'busca',
        'before_widget' => '<div class="card bg-lc-gray border-0 mb-4"><div class="card-body">',
        'after_widget' => '</div></div>',
        'before_title' => '<h5>',
        'afte_title' => '</h5>'
));