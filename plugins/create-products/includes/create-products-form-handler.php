<?php
// create-products-form-handler.php

 
// Function to display the contact form
function create_products_plugin_display_form() {
    ob_start();
 
    // Include the HTML template file
    include 'create_products_form_template.html';
 
    return ob_get_clean();
}

// Register shortcode for displaying the contact form only for admins
add_shortcode( 'create_products_form', 'create_products_plugin_display_form' );

 
// Function to handle form submission
function create_products_plugin_submit_form() {
    if ( isset( $_POST['name'], $_POST['address'], $_POST['phone'] ) ) {
        global $wpdb;
        $table_name =  'products'; // Correct table name format
        $name = sanitize_text_field( $_POST['name'] );
        $address = sanitize_text_field( $_POST['address'] );
        $phone = sanitize_text_field( $_POST['phone'] );
        $wpdb->insert(
            $table_name,
            array(
                'name' => $name,
                'address' => $address,
                'phone' => $phone,
            )
        );
        // Redirect back to the page where the form was submitted
        wp_redirect( $_SERVER['HTTP_REFERER'] );
        exit;
    } else {
        // Handle form validation errors or other issues
        // You can redirect to an error page or display a message
    }
}

// Register custom endpoint for form submission
add_action( 'admin_post_create_products_plugin_submit_form', 'create_products_plugin_submit_form' );
add_action( 'admin_post_nopriv_create_products_plugin_submit_form', 'create_products_plugin_submit_form' );


// Function to enqueue CSS file for form styles
function create_products_plugin_enqueue_styles() {
    wp_enqueue_style( 'create-products-form-styles', plugin_dir_url( __FILE__ ) . 'create-products-form-styles.css' );
}
add_action( 'wp_enqueue_scripts', 'create_products_plugin_enqueue_styles' );
