<?php
/*
Plugin Name: Angular App Plugin
Description: Integrates an Angular app into WordPress.
Version: 1.0
Author: Raja Khan
*/

function load_ng_assets() {
    // Enqueue styles
    wp_enqueue_style( 'ng_styles', plugins_url( 'generated-ng-app-dist/styles-5INURTSO.css', __FILE__ ) );

    // Register and enqueue scripts
    wp_register_script( 'ng_polyfills', plugins_url( 'generated-ng-app-dist/polyfills-RT5I6R6G.js', __FILE__ ), array(), null, true );
    wp_register_script( 'ng_main', plugins_url( 'generated-ng-app-dist/main-AAEY3YAD.js', __FILE__ ), array('ng_polyfills'), null, true );

    // Enqueue scripts
    wp_enqueue_script( 'ng_polyfills' );
    wp_enqueue_script( 'ng_main' );

    // Load Angular app content
    ob_start();
    include plugin_dir_path( __FILE__ ) . 'generated-ng-app-dist/index.html';
    $angular_content = ob_get_clean();

    return $angular_content;
}

function embed_angular_app() {
    $angular_content = load_ng_assets();
    return $angular_content;
}

add_shortcode( 'angular_app', 'embed_angular_app' );
?>
