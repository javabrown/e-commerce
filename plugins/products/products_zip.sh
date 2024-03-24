#!/bin/bash

# Define the plugin directory name
PLUGIN_DIR="products"

# Define the name of the zip file
ZIP_FILE="${PLUGIN_DIR}.zip"

# Create the zip file
echo "Creating zip file..."
zip -r "${ZIP_FILE}" ./*

# Check if zip file creation was successful
if [ $? -eq 0 ]; then
  echo "Zip file created successfully: ${ZIP_FILE}"
else
  echo "Error: Failed to create zip file."
fi
