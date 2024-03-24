<?php
//product_modify_functions.php

// Function to display product list and edit form
function products_display_product_edit_list() {
    global $wpdb;

    // Handle edit action
   if (isset($_GET['edit']) && is_numeric($_GET['edit'])) {
        $product_id = intval($_GET['edit']);
        products_display_edit_product_form($product_id);
        return;
    }

    // Get all products from the database
    $products = $wpdb->get_results("SELECT * FROM products");

    // Display product list in tabular view
    echo '<h2>Product List</h2>';
    echo '<table>';
    echo '<tr><th>Name</th><th>Description</th><th>Price</th><th>Edit</th></tr>';

    foreach ($products as $product) {
        echo '<tr>';
        echo '<td>' . $product->name . '</td>';
        echo '<td>' . $product->description . '</td>';
        echo '<td>' . $product->price . '</td>';
        echo '<td><a href="?edit=' . $product->id . '">Edit</a></td>';
        echo '</tr>';
    }

    echo '</table>';
}

// Function to display edit product form
function products_display_edit_product_form($product_id) {
    global $wpdb;
    $product = $wpdb->get_row($wpdb->prepare("SELECT * FROM products WHERE id = %d", $product_id));
    if (!$product) {
        echo "Product not found.";
        return;
    }

    // Display edit form with product details pre-filled
    echo '<h2>Edit Product</h2>';
    echo '<form method="post">';
    echo '<input type="hidden" name="product_id" value="' . $product->id . '">';
    echo '<label>Name:</label> <input type="text" name="name" value="' . $product->name . '"><br>';
    echo '<label>Description:</label> <textarea name="description">' . $product->description . '</textarea><br>';
    echo '<label>Price:</label> <input type="text" name="price" value="' . $product->price . '"><br>';
    echo '<input type="submit" value="Save">';
    echo '</form>';
}

// Handle form submission for updating product
if (isset($_POST['product_id'])) {
    global $wpdb;
    $product_id = intval($_POST['product_id']);
    if (!isset($_POST['name']) || !isset($_POST['description']) || !isset($_POST['price'])) {
        echo "Missing required fields.";
        return;
    }
    $name = sanitize_text_field($_POST['name']);
    $description = sanitize_text_field($_POST['description']);
    $price = floatval($_POST['price']);

    // Update product in the database
    $result = $wpdb->update(
        "products",
        array(
            'name' => $name,
            'description' => $description,
            'price' => $price
        ),
        array('id' => $product_id),
        array('%s', '%s', '%f'),
        array('%d')
    );

    if ($result === false) {
        echo "Failed to update product.";
    } else {
        echo "Product updated successfully.";
    }
}
?>
