<?php

// Codigo que nos permite mantener el diseño que tiene el tema padre e importar el CSS que contiene los estilos utilizados
function child_theme_assets() {
 
 wp_enqueue_style( 'estilos-padre', //handle para estilos de tema padre
                    get_template_directory_uri() . '/style.css' //get_template_directory_uri() retornara la ubicación del tema padre
                );

 wp_enqueue_style( 'estilos-hijos',
                    get_stylesheet_directory_uri() . '/style.css', //get_stylesheet_directory_uri() retornara la ubicación de la hoja de estilos del child-theme 
                    array('estilos-padre'), //usa como depencia la hoja de estilos del tema padre.
                    '1.0' //Versión de la hoja de estilos 
                    );
}
add_action( 'wp_enqueue_scripts', 'child_theme_assets' );

if ( !function_exists('AddThumbColumn') && function_exists('add_theme_support') ) {
        add_theme_support('post-thumbnails', array( 'post', 'page' ) );
        function AddThumbColumn($cols) {
        $cols['thumbnail'] = __('Thumbnail');
        return $cols;
        }
        function AddThumbValue($column_name, $post_id) {
        $width = (int) 50;
        $height = (int) 50;
        if ( 'thumbnail' == $column_name ) {
        $thumbnail_id = get_post_meta( $post_id, '_thumbnail_id', true );
        $attachments = get_children( array('post_parent' => $post_id, 'post_type' => 'attachment', 'post_mime_type' => 'image') );
        if ($thumbnail_id)
        $thumb = wp_get_attachment_image( $thumbnail_id, array($width, $height), true );
        elseif ($attachments) {
        foreach ( $attachments as $attachment_id => $attachment ) {
        $thumb = wp_get_attachment_image( $attachment_id, array($width, $height), true );
        }
        }
        if ( isset($thumb) && $thumb ) {
        echo $thumb;
        } else {
        echo __('None');
        }
        }
        }
        add_filter( 'manage_posts_columns', 'AddThumbColumn' );
        add_action( 'manage_posts_custom_column', 'AddThumbValue', 10, 2 );
        add_filter( 'manage_pages_columns', 'AddThumbColumn' );
        add_action( 'manage_pages_custom_column', 'AddThumbValue', 10, 2 );
        }