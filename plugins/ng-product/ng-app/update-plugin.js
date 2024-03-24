const { execSync } = require('child_process');
const fs = require('fs');

const pluginName = 'ng-product-plugin';
const pluginFileName = `${pluginName}.php`;
const pluginFolder = '../wp-ng-plugin';
const destination = `${pluginFolder}/generated-ng-app-dist`;
const pluginFilePath = `${pluginFolder}/${pluginFileName}`;

// Run the Angular build command to generate the dist directory
execSync('npm run build', { encoding: 'utf-8', stdio: 'inherit' });

// Get the filenames of the built JS and CSS files
const distFilenames = fs.readdirSync(destination).filter(file => file.endsWith('.js') || file.endsWith('.css'));

// Read the contents of the plugin PHP file
let pluginFileContents = fs.readFileSync(pluginFilePath, 'utf8');

// Log the plugin file contents
console.log("Plugin file contents:", pluginFileContents);

// Update the file paths in the PHP file with the hashed filenames
distFilenames.forEach(filename => {
    const regex = new RegExp(`(?<=app\\/).*?(?=['"])`, 'g');
    const matches = pluginFileContents.match(regex);

    if (matches) {
        matches.forEach(match => {
            console.log("Match found:", match);
            if (filename.includes(match)) {
                pluginFileContents = pluginFileContents.replace(new RegExp(match, 'g'), filename);
            }
        });
    }
});

// Log the updated plugin file contents
console.log("Updated plugin file contents:", pluginFileContents);

// Write the updated contents back to the plugin PHP file
fs.writeFileSync(pluginFilePath, pluginFileContents);
console.log(`${pluginFileName} updated successfully!`);
