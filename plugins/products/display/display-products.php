<?php
// Function to display published products in tabular form
global $wpdb;
$table_name = 'products'; // Correct table name format
$products = $wpdb->get_results( "SELECT * FROM $table_name WHERE status = 'published'" );

ob_start();
?>
<div class="product_table_container">
    <table class="product_table">
        <thead>
            <tr>
                <th>Name</th>
                <th>Description</th>
                <th>Price</th>
                <th>Category</th>
                <th>Stock Quantity</th>
                <th>SKU</th>
                <th>Images</th>
                <th>Attributes</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($products as $product) : ?>
                <tr>
                    <td><?php echo $product->name; ?></td>
                    <td><?php echo $product->description; ?></td>
                    <td><?php echo $product->price; ?></td>
                    <td><?php echo $product->category; ?></td>
                    <td><?php echo $product->stock_quantity; ?></td>
                    <td><?php echo $product->sku; ?></td>
                    <td><?php echo $product->images; ?></td>
                    <td><?php echo $product->attributes; ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
<style>
    /* CSS styles for the product table */
    .product_table_container {
        overflow-x: auto;
    }

    .product_table {
        width: 100%;
        border-collapse: collapse;
    }

    .product_table th, .product_table td {
        padding: 8px;
        border: 1px solid #ddd;
    }

    .product_table th {
        background-color: #f2f2f2;
        text-align: left;
    }
</style>
<?php
echo ob_get_clean();
?>
