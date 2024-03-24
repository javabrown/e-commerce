#!/bin/bash

# Define source and destination directories
SOURCE_DIR="ng-app/dist/ng-app/browser/"
DEST_DIR="$(dirname "$0")/wp-ng-plugin/generated-ng-app-dist/"

# Check if source directory exists
if [ ! -d "$SOURCE_DIR" ]; then
    echo "Error: Source directory '$SOURCE_DIR' does not exist."
    exit 1
fi

# Create destination directory if it doesn't exist
mkdir -p "$DEST_DIR"

# Copy files from source to destination
cp -r "$SOURCE_DIR" "$DEST_DIR"

echo "Angular dist folder copied to $DEST_DIR"
