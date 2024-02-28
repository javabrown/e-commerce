

# Create Products Plugin

## Description
Create Products is a WordPress plugin that allows Defining generic product fields for an e-commerce apps.

## Features
- Collects products input from e-commerce admins.
- Saves the collected information into the WordPress database "products".
- Provides a shortcode to display the collected contact information on any page or post.

## Directory Structure
The plugin directory structure is as follows:
```
create-products-plugin
├── create-products-plugin.php
└── includes
    ├── create_products_form_template.html
    ├── create-products-form-handler.php
    └── shortcode.php

```



## Installation
1. Download the plugin zip file from the [releases](link-to-releases) section.
2. Upload the zip file to your WordPress site via the WordPress admin panel.
3. Activate the plugin.
4. Use the provided shortcode `[display_contacts]` to display the collected contact information on your WordPress site.

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
```

## Contribution
Contributions are welcome! Feel free to submit issues or pull requests.

## License
This project is licensed under the [MIT License](LICENSE).

## Creating a Zip File
To create a zip file for distribution, you can use the provided shell script `create_zip.sh`. Follow the instructions below:
1. Make sure you have the necessary permissions to execute the script.
2. Run the script by executing the following command in your terminal:
   ```bash
   chmod +x create_products_zip.sh

   ./create_products_zip.sh


The script will create a zip file named create-products-plugin.zip containing all the plugin files and directories.


Author
Raja Khan

 
