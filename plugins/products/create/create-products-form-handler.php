<?php
// Function to handle form submission
// create-products-form-handler.php
function create_products_plugin_submit_form() {
    // Check if all mandatory fields are present
    if ( isset( $_POST['name'], $_POST['description'], $_POST['price'] ) ) {
        // Sanitize input values
        $name = sanitize_text_field( $_POST['name'] );
        $description = sanitize_text_field( $_POST['description'] );
        $price = floatval( $_POST['price'] );
        $category = isset( $_POST['category'] ) ? sanitize_text_field( $_POST['category'] ) : '';
        $stock_quantity = isset( $_POST['stock_quantity'] ) ? intval( $_POST['stock_quantity'] ) : 0;
        $sku = isset( $_POST['sku'] ) ? sanitize_text_field( $_POST['sku'] ) : '';
        $images = isset( $_POST['images'] ) ? sanitize_text_field( $_POST['images'] ) : '';
        $attributes = isset( $_POST['attributes'] ) ? sanitize_textarea_field( $_POST['attributes'] ) : '';
        $status = in_array( $_POST['status'], array( 'published', 'draft' ) ) ? $_POST['status'] : 'draft';

        // Create product only if all fields are present
        if ( ! empty( $name ) && ! empty( $description ) && ! empty( $price ) ) {
            global $wpdb;
            $table_name =  'products'; // Correct table name format

            // Insert product into the database
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
            // Handle case where mandatory fields are missing
            // You can redirect to an error page or display a message
            echo 'Error: All mandatory fields are required.';
        }
    } else {
        // Handle case where mandatory fields are missing
        // You can redirect to an error page or display a message
        echo 'Error: All mandatory fields are required.';
    }
}

// Register custom endpoint for form submission
add_action( 'admin_post_create_products_plugin_submit_form', 'create_products_plugin_submit_form' );
add_action( 'admin_post_nopriv_create_products_plugin_submit_form', 'create_products_plugin_submit_form' );
