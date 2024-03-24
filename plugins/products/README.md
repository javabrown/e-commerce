# Products Plugin

## Description
Products Plugin is a WordPress plugin designed to facilitate the creation and display of products for an eCommerce application.

## Features
- Collects products input from e-commerce admins.
- Saves the collected information into the WordPress database "products".
- Provides a shortcode to display the collected contact information on any page or post.

## Directory Structure
The plugin directory structure is as follows:
```
products-plugin/
│
├── create/
│   ├── create-products-form-handler.php
│   ├── create_products_form_template.html
│   └── create-products-form-styles.css
│
├── display/
│   └── display-products-template.php
│
├── product-plugin.php
├── readme.txt
└── create_products_plugin_readme.txt


```

## Creating a Zip File
To create a zip file for distribution, you can use the provided shell script `create_zip.sh`. Follow the instructions below:
1. Make sure you have the necessary permissions to execute the script.
2. Run the script by executing the following command in your terminal:
```bash
   chmod +x products_zip.sh

   ./products_zip.sh
````


## Installation
1. Download the `products-plugin.zip` file.
2. Log in to your WordPress admin dashboard.
3. Navigate to Plugins > Add New.
4. Click on the "Upload Plugin" button and select the `products-plugin.zip` file.
5. Activate the plugin.

## Create Database Table (incase plugin installation did'nt create table manually):
```
CREATE TABLE products (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    description TEXT,
    price DECIMAL(10, 2) NOT NULL,
    category VARCHAR(100),
    stock_quantity INT,
    sku VARCHAR(50),
    images TEXT,
    attributes TEXT,
    status ENUM('published', 'draft') DEFAULT 'draft',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

Sample Data:
-------------
INSERT INTO products (name, description, price, category, stock_quantity, sku, images, attributes, status)
VALUES
    ('Product 1', 'Description of product 1', 29.99, 'Category A', 100, 'SKU001', 'image1.jpg', 'Color: Red, Size: Large', 'published'),
    ('Product 2', 'Description of product 2', 49.99, 'Category B', 50, 'SKU002', 'image2.jpg', 'Color: Blue, Size: Medium', 'published'),
    ('Product 3', 'Description of product 3', 39.99, 'Category A', 75, 'SKU003', 'image3.jpg', 'Color: Green, Size: Small', 'draft');

```

## Shortcodes

### [create_products_form]
- Description: Displays a form for creating new products.
- Usage: Place this shortcode on any page or post where you want to display the product creation form.

### [display_published_products]
- Description: Displays published products in a tabular format.
- Usage: Place this shortcode on any page or post where you want to display the list of published products.

## Usage
1. Create Products:
   - Use the [create_products_form] shortcode to display the product creation form.
   - Fill in the required details such as name, description, price, etc., and submit the form.

2. Display Products:
   - Use the [display_published_products] shortcode to display the list of published products.
   - The products will be displayed in a tabular format with details such as name, description, price, etc.

## Support
For any issues or inquiries, please contact [author name] at [author email].

## Contributing
Contributions are welcome! Feel free to submit bug reports, feature requests, or pull requests on [GitHub repository link].

## License
This plugin is licensed under the [license type]. See the LICENSE file for more details.
