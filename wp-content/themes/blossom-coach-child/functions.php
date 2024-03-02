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

