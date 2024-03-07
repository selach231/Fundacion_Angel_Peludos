<?php 

function init_template(){

    add_theme_support( 'post-thumbnails');
    add_theme_support('title-tag');

}


add_action('after_setup_theme','init_template');

function assets(){
    wp_register_style('bootstrap','https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css','','5.2.0','all');

    wp_register_style('montserrat','https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap','','1.0','all');

    wp_register_scriptS('popper','https://cdn.jsdelivr.net/npm/@poppersjs/core@2.11.6/dist/umd/popper.min.js','','2.11.6',true);

    wp_enqueue_scripts('bootstraps','https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.bundle.min.js',array('popper'),'5.2.1',true);

    wp_enqueue_style('estilos',get_template_directory_uri().'/style.css',array('bootstrap','montserrat'),'1.0.0','all');
    
    //Para traer mis propios scripts
    wp_enqueue_script('custom',get_template_directory_uri().'/assets/js/custom.js','','1.0.0',true);
}

add_action('wp_enqueue_scripts','assets');
