# Use the official PHP-FPM image as the base
FROM public.ecr.aws/docker/library/php:fpm
# FROM php:8.2-apache as web


# RUN sed -i 's|http://deb.debian.org|http://ftp.de.debian.org|g' /etc/apt/sources.list

# Define a user variable
ARG user=www-data

# Install system dependencies and PHP extensions
RUN apt-get update && apt-get install -y \
    curl \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    zip unzip libzip-dev \
    nginx \
    && apt-get clean \
    && rm -rf /var/lib/apt/lists/* \
    && docker-php-ext-install intl\
        pdo_mysql \
        mbstring \
        exif \
        pcntl \
        bcmath \
        gd \
        zip

# Install Composer
# COPY --from=public.ecr.aws/composer/composer:latest-bin /usr/bin/composer /usr/bin/composer
COPY --from=public.ecr.aws/composer/composer:latest-bin /composer /usr/bin/composer


# Create a system user for running Composer and Artisan commands
RUN mkdir -p /home/$user/.composer && \
    chown -R $user:$user /home/$user

# Copy Nginx configuration and entrypoint script
COPY ./docker/default.conf /etc/nginx/sites-enabled/default
COPY ./docker/entrypoint.sh /etc/entrypoint.sh

# Make the entrypoint script executable
RUN chmod +x /etc/entrypoint.sh

# Set the working directory
WORKDIR /var/www

# Copy the application code
COPY --chown=www-data:www-data . /var/www

RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache


# Install PHP dependencies
RUN composer update --ignore-platform-req=ext-intl
# RUN composer install --ignore-platform-req=ext-intl

# Expose port 80
EXPOSE 80

# Define the entrypoint
ENTRYPOINT ["/etc/entrypoint.sh"]