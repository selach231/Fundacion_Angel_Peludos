<?php

//Plugin name:Modo Oscuro
//Description: Activa el modo oscuro en tu theme
//versión: 1.0
//Author: Alexandra Barrera
//Autor URI: https://github.com/Selach231

function estilos_plugin() {

    $estilos_url= plugin_dir_url(__FILE__);
    wp_enqueue_style('modo-oscuro',$estilos_url.'/assets/css/estilos.css','','1.0','all');
}

add_action('wp_emqueue_scripts', 'estilos_plugin');