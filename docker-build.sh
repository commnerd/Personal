#!/bin/bash

# Build script for Laravel Docker container
# This script builds and runs the Laravel application in a Docker container

set -e

echo "Building Laravel Docker container..."

# Build the Docker image
docker build -t laravel-app .

echo "Docker image built successfully!"

# Run the container
echo "Starting Laravel application..."
docker run -d \
  --name laravel-container \
  -p 8080:80 \
  laravel-app

echo "Laravel application is running at http://localhost:8080"
echo ""
echo "To view logs: docker logs laravel-container"
echo "To stop the container: docker stop laravel-container"
echo "To remove the container: docker rm laravel-container"
