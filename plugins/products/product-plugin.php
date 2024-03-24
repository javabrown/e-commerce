<?php
/*
Plugin Name: Products Plugin
Description: A Plugin to Define Products for an Ecommerce application.
Version: 1.0
Author: Raja Khan
*/

// Include necessary files
require_once plugin_dir_path( __FILE__ ) . 'create/create-products-form-handler.php';
require_once plugin_dir_path( __FILE__ ) . 'update_product/product_modify_functions.php'; // Include product_modify_functions.php

// Function to display the contact form
function create_products_plugin_display_form() {
    ob_start();
    // Include the HTML template file
    include plugin_dir_path( __FILE__ ) . 'create/create_products_form_template.html';
    return ob_get_clean();
}

// Register shortcode for displaying the contact form only for admins
add_shortcode( 'create_products_form', 'create_products_plugin_display_form' );

// Function to enqueue CSS file for form styles
function create_products_plugin_enqueue_styles() {
    wp_enqueue_style( 'create-products-form-styles', plugin_dir_url( __FILE__ ) . 'create/create-products-form-styles.css' );
}
add_action( 'wp_enqueue_scripts', 'create_products_plugin_enqueue_styles' );

// Shortcode for displaying published products
function display_published_products_shortcode() {
    ob_start();
    include plugin_dir_path( __FILE__ ) . 'display/display-products.php';
    return ob_get_clean();
}
add_shortcode( 'display_published_products', 'display_published_products_shortcode' );

// Shortcode for displaying product edit list
add_shortcode('product_edit_list', 'products_display_product_edit_list');

?>
