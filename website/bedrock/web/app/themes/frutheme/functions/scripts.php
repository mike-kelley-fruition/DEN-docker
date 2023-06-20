<?php 

/**
 * Enqueue scripts and styles.
 */
function frubase_scripts() {
    wp_enqueue_style( 'main.css', get_template_directory_uri() . '/dist/assets/main.js/style.css' );
    wp_enqueue_script( 'main.js', get_template_directory_uri() . '/dist/assets/main.js/main.js', array('jquery'), '', false );
    wp_enqueue_script( 'WOW.js', get_template_directory_uri() . '/assets/js/WOW.js', array('jquery'), '', false );
}
add_action( 'wp_enqueue_scripts', 'frubase_scripts' );


function my_login_stylesheet() {
    wp_enqueue_style( 'custom-login', get_stylesheet_directory_uri() . '/assets/css/style-login.css' );
}
add_action( 'login_enqueue_scripts', 'my_login_stylesheet' );

