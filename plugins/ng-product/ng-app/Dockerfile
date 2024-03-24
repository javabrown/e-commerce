# Use Nginx as the base image
FROM nginx:alpine

# Copy the built Angular app from the dist/ng-app/browser directory to the Nginx public directory
COPY dist/ng-app/browser /usr/share/nginx/html

# Expose port 80
EXPOSE 80

# Start Nginx
CMD ["nginx", "-g", "daemon off;"]
