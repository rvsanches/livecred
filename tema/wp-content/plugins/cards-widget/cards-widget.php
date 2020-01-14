<?php
/*
Plugin name: Cards widget
Plugin URI: https://wordpress.org/plugins
Description: Widget que exibe um conteúdo em destaque
Author: Ricardo Sanches
Version: 1.0
Author URI: https://youtube.com/ricardosanches
*/

// registrar o widget
add_action('widgets_init', function() {
    register_widget('Card');
});

class Card extends WP_Widget {
    
    // método construtor da classe
    public function __construct()
    {
        $widget_ops = array(
            'classname' => 'card',
            'description' => 'Exibe o conteúdo em um card'
        );
        // ID, nome e as opções
        parent::__construct('card', 'Card', $widget_ops);

        // adiciona scripts para enviar imagem
        add_action( 'admin_enqueue_scripts', array( $this, 'assets') );
    }

    // método que mostra a saída no front-end
    public function widget($args, $instance)
    {
        echo $args['before_widget'];

        ?>

            <div class="card text-white mb-4">
                <a href="<?php echo esc_html( $instance['link_url'] ); ?>" class="text-white">
                    <img src="<?php echo esc_url( $instance['image'] ); ?>" class="card-img">
                    <div class="card-img-overlay bg-banner-header p-0 m-0 row">
                        <div class="col align-self-end">
                            <!-- esc_html retorna somente string -->
                            <h5 class="mb-0"><?php echo esc_html( $instance['title'] ); ?></h5>
                            <!-- wpautop gera um parágrafo com houver 2 quebras de linha -->
                            <?php echo wpautop( esc_html( $instance['description'] ) ); ?>
                        </div>
                    </div>
                </a>
            </div>

        <?php

        echo $args['after_widget'];
    }

    // método para cadastro no painel admin
    public function form($instance)
    {
        $title = '';
        if (!empty($instance['title']))
        {
            $title = $instance['title'];
        }

        $description = '';
        if (!empty($instance['description']))
        {
            $description = $instance['description'];
        }

        $link_url = '';
        if (!empty($instance['link_url']))
        {
            $link_url = $instance['link_url'];
        }

        $image = '';
        if (!empty($instance['image']))
        {
            $image = $instance['image'];
        }

        ?>

        <p>
            <label for="<?php echo $this->get_field_name( 'image' ); ?>">
                <?php echo 'Imagem de destaque:'; ?>
            </label>
            <input type="text"
                   class="widefat"
                   id="<?php echo $this->get_field_id( 'image' ); ?>"
                   name="<?php echo $this->get_field_name( 'image' ); ?>"
                   value="<?php echo esc_url( $image ); ?>"
            >
            <button class="button button-primary upload_image_button">Enviar imagem</button>
        </p>
        <p>
            <label for="<?php echo $this->get_field_name( 'title' ); ?>">
                <?php echo 'Título:'; ?>
            </label>
            <input type="text"
                   class="widefat"
                   id="<?php echo $this->get_field_id( 'title' ); ?>"
                   name="<?php echo $this->get_field_name( 'title' ); ?>"
                   value="<?php echo esc_attr( $title ); ?>"
            >
        </p>
        <p>
            <label for="<?php echo $this->get_field_name( 'description' ); ?>">
                <?php echo 'Descrição:'; ?>
            </label>
            <textarea type="text"
                   class="widefat"
                   id="<?php echo $this->get_field_id( 'description' ); ?>"
                   name="<?php echo $this->get_field_name( 'description' ); ?>"
            ><?php echo esc_attr( $description ); ?></textarea>
        </p>
        <p>
            <label for="<?php echo $this->get_field_name( 'link_url' ); ?>">
                <?php echo 'Caminho do link:'; ?>
            </label>
            <input type="text"
                   class="widefat"
                   id="<?php echo $this->get_field_id( 'link_url' ); ?>"
                   name="<?php echo $this->get_field_name( 'link_url' ); ?>"
                   value="<?php echo esc_attr( $link_url ); ?>"
            >
        </p>

        <?php
    }

    // método que atualiza o widget
    public function update($new_instance, $old_instance)
    {
        return $new_instance;
    }

    public function assets()
    {
        wp_enqueue_script( 'media-upload' );
        wp_enqueue_media();
        wp_enqueue_script(
            'card-media-upload',
            plugin_dir_url(__FILE__) . 'card-media-upload.js',
            array( 'jquery' )
        );
    }
}