FROM vivifyideas/php-fpm-production-docker-alpine

# Install mysql client
RUN apk update && apk add mysql-client

# Set working directory
WORKDIR /app

# Copy all files to container
COPY . /app

# Copy custom.ini

# Install dependencies
RUN composer install --no-dev --no-scripts

# Chown storage and boostrap cache as www-data user/group
RUN chown -R www-data:www-data \
    /app/storage \
    /app/bootstrap/cache \
    /app/public
