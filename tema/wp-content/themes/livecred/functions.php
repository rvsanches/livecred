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
add_filter('excerpt_more', function($more) {
    return '...';
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
        'after_title' => '</h5>'
));

register_sidebar(
    array(
        'name' => 'Cards',
        'id' => 'cards',
        'before_widget' => '',
        'after_widget' => '',
        'before_title' => '',
        'after_title' => ''
));

function lc_cpt() {

    // Informar os textos da interface
    $labels = array(
        'name'              => _x('Depoimentos', 'Depoimentos dos clientes', 'livecred'),
        'singular_name'     => _x('Depoimento', 'Depoimento do cliente', 'livecred'),
        'menu_name'         => __('Depoimentos', 'livecred'),
        'all_items'         => __('Todos os depoimentos', 'livecred'),
        'view_item'         => __('Ver depoimento', 'livecred'),
        'add_new_item'      => __('Adicionar depoimento', 'livecred'),
        'add_new'           => __('Adicionar novo', 'livecred'),
        'edit_item'         => __('Eitar depoimento', 'livecred'),
        'update_item'       => __('Atualizar depoimento', 'livecred'),
        'search_items'      => __('Buscar depoimento', 'livecred'),
        'not_found'         => __('Não encontrado', 'livecred'),
        'not_fund_in_trash' => __('Não encontrado no lixo', 'livecred')
    );

    // Informar as opções
    $args = array(
        'label'               => __('depoimentos', 'livecred'),
        'description'         => __('Depoimentos dos clientes', 'livecred'),
        'labels'              => $labels,
        'supports'            => array('title', 'editor'),
        'hierarchical'        => false,
        'public'              => true,
        'show_ui'             => true,
        'show_in_menu'        => true,
        'show_in_nav_menus'   => true,
        'show_in_admin_bar'   => true,
        'menu_position'       => 5,
        'menu_icon'           => 'dashicons-format-aside',
        'can_export'          => true,
        'has_archive'         => true,
        'exclude_from_search' => true,
        'publicy_queryable'   => true,
        'capability_type'     => 'post'
    );

    register_post_type('depoimentos', $args);
}

add_action('init', 'lc_cpt', 0);