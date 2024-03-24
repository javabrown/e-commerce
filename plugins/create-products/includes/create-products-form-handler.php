<?php
// Function to handle form submission
function create_products_plugin_submit_form() {
    if ( isset( $_POST['name'], $_POST['description'], $_POST['price'] ) ) {
        global $wpdb;
        $table_name =  'products'; // Correct table name format
        $name = sanitize_text_field( $_POST['name'] );
        $description = sanitize_text_field( $_POST['description'] );
        $price = floatval( $_POST['price'] );
        $category = sanitize_text_field( $_POST['category'] );
        $stock_quantity = intval( $_POST['stock_quantity'] );
        $sku = sanitize_text_field( $_POST['sku'] );
        $images = sanitize_text_field( $_POST['images'] );
        $attributes = sanitize_textarea_field( $_POST['attributes'] );
        $status = in_array( $_POST['status'], array( 'published', 'draft' ) ) ? $_POST['status'] : 'draft';

        $wpdb->insert(
            $table_name,
            array(
                'name' => $name,
                'description' => $description,
                'price' => $price,
                'category' => $category,
                'stock_quantity' => $stock_quantity,
                'sku' => $sku,
                'images' => $images,
                'attributes' => $attributes,
                'status' => $status,
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
