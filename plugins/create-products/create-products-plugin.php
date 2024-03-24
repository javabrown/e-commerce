<?php
/*
Plugin Name: Create Product Plugin
Description: A Plugin to Define Products for an Ecommerce application.
Version: 1.0
Author: Raja Khan
*/

// Include necessary files
require_once plugin_dir_path( __FILE__ ) . 'includes/create-products-form-handler.php';

// Function to display the contact form
function create_products_plugin_display_form() {
    ob_start();

    // Include the HTML template file
    include plugin_dir_path( __FILE__ ) . 'includes/create_products_form_template.html';

    return ob_get_clean();
}

// Register shortcode for displaying the contact form only for admins
add_shortcode( 'create_products_form', 'create_products_plugin_display_form' );

// Function to enqueue CSS file for form styles
function create_products_plugin_enqueue_styles() {
    wp_enqueue_style( 'create-products-form-styles', plugin_dir_url( __FILE__ ) . 'includes/create-products-form-styles.css' );
}
add_action( 'wp_enqueue_scripts', 'create_products_plugin_enqueue_styles' );
