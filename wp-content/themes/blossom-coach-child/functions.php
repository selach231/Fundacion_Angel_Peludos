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

function auto_featured_image() {
    global $post;
   if (!has_post_thumbnail($post->ID)) {
    $attached_image = get_children( "post_parent=$post->ID&amp;post_type=attachment&amp;post_mime_type=image&amp;numberposts=1" );
   if ($attached_image) {
   foreach ($attached_image as $attachment_id => $attachment) {
   set_post_thumbnail($post->ID, $attachment_id);
   }
   }
   }
   }
   add_action('the_post', 'auto_featured_image');
   add_action('save_post', 'auto_featured_image');
   add_action('draft_to_publish', 'auto_featured_image');
   add_action('new_to_publish', 'auto_featured_image');
   add_action('pending_to_publish', 'auto_featured_image');
   add_action('future_to_publish', 'auto_featured_image');

   add_filter( 'wp_insert_post_data', function ( $data, $postarr ) {
    $post_id       = $postarr['ID'];
    $post_status     = $data['post_status'];
    $original_post_status = $postarr['original_post_status'];
    if ( $post_id && 'publish' === $post_status && 'publish' !== $original_post_status ) {
    $post_type = get_post_type( $post_id );
    if ( post_type_supports( $post_type, 'thumbnail' ) && ! has_post_thumbnail( $post_id ) ) {
    $data['post_status'] = 'draft';
    }
    }
    return $data;
    }, 10, 2 );
    add_action( 'admin_notices', function () {
    $post = get_post();
    if ( 'publish' !== get_post_status( $post->ID ) && ! has_post_thumbnail( $post->ID ) ) { ?>
    <div id="message" class="error">
    <p>
    <strong><?php _e( 'Porfavor agrega una imagen destacada o una imagen en el contexto de la entrada. Esta Noticia no podrá publicarse hasta que no agregues una imagen' ); ?></strong>
    </p>
    </div>
    <?php
    }
    } );

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