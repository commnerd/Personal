# Laravel Docker Setup

This project includes a self-contained Dockerfile that runs a Laravel application with SQLite database without requiring a `.env` file.

## Features

- **Self-contained**: No external dependencies or `.env` file required
- **SQLite Database**: Uses SQLite for data persistence
- **PHP 8.2**: Latest PHP version with Apache
- **Node.js**: For building frontend assets
- **Production Ready**: Optimized for production deployment

## Quick Start

### Build and Run

```bash
# Make the build script executable (if not already done)
chmod +x docker-build.sh

# Build and run the container
./docker-build.sh
```

The application will be available at `http://localhost:8080`

### Manual Docker Commands

```bash
# Build the Docker image
docker build -t laravel-app .

# Run the container
docker run -d --name laravel-container -p 8080:80 laravel-app

# View logs
docker logs laravel-container

# Stop the container
docker stop laravel-container

# Remove the container
docker rm laravel-container
```

## Configuration

The Dockerfile automatically configures the following:

- **Database**: SQLite at `/var/www/html/database/database.sqlite`
- **Environment**: Production mode
- **Debug**: Disabled
- **Cache**: File-based caching
- **Sessions**: File-based sessions
- **Mail**: Log driver (emails logged to files)

## Database

The SQLite database is automatically created and migrations are run during the build process. The database file is stored in the container at `/var/www/html/database/database.sqlite`.

## File Structure

```
Dockerfile          # Main Docker configuration
.dockerignore       # Files to exclude from Docker build
docker-build.sh     # Build and run script
DOCKER.md          # This documentation
```

## Customization

To modify the configuration, edit the `.env` file creation section in the Dockerfile:

```dockerfile
# Create a .env file with hardcoded values for Docker
RUN echo 'APP_NAME="Your App Name"\n\
APP_ENV=production\n\
# ... other configuration
' > /var/www/html/.env
```

## Troubleshooting

### Container won't start
- Check logs: `docker logs laravel-container`
- Ensure port 8080 is available
- Verify the build completed successfully

### Database issues
- The SQLite database is created automatically
- Check file permissions if you encounter issues
- Ensure the database directory is writable

### Asset compilation issues
- Node.js dependencies are installed during build
- Assets are compiled during the build process
- Check the build logs for any npm errors

## Production Deployment

For production deployment, consider:

1. **Security**: Update the `APP_KEY` in the Dockerfile
2. **Performance**: Enable OPcache and other PHP optimizations
3. **Monitoring**: Add health checks and logging
4. **Scaling**: Use a load balancer for multiple containers
5. **Database**: Consider using an external database for production

## Environment Variables

The following environment variables are set in the container:

- `APP_NAME`: Laravel App
- `APP_ENV`: production
- `APP_DEBUG`: false
- `APP_URL`: http://localhost
- `DB_CONNECTION`: sqlite
- `DB_DATABASE`: /var/www/html/database/database.sqlite
- `CACHE_DRIVER`: file
- `SESSION_DRIVER`: file
- `QUEUE_CONNECTION`: sync
