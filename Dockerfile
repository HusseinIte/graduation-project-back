# Use an official PHP runtime as a parent image
FROM php:8.2-fpm

# Set the working directory to /var/www
WORKDIR /var/www

# Install dependencies
RUN apt-get update && apt-get install -y \
    git \
    curl \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    zip \
    unzip

# Install PHP extensions
RUN docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd

# Install composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Copy the code into the container
COPY . .

# Install dependencies
RUN composer install --prefer-dist --no-interaction

# Set permissions
RUN chown -R www-data:www-data storage bootstrap/cache

# Run the Laravel application
CMD php artisan serve --host=0.0.0.0 --port=8080
