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

register_nav_menus( array(
    'topo'   =>  __('Menu no topo', 'livecred'),
    'rodape' =>  __('Menu no rodapé', 'livecred')
));