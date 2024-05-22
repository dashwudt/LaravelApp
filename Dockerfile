FROM php:8.3-fpm

# Install system dependencies
RUN apt-get update && apt-get install -y \
    libpq-dev \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    zip \
    unzip \
    git \
    curl

# Install PHP extensions
RUN docker-php-ext-install pdo pdo_pgsql pgsql mbstring exif pcntl bcmath gd

# Get latest Composer
COPY --from=composer:latest /usr/bin/composer /usr/local/bin/composer

# Create a group and user
#RUN groupadd -g 1000 laravelgroup && \
#    useradd -u 1000 -ms /bin/bash -g laravelgroup laraveluser

# Set working directory
WORKDIR /var/www




# Add an entrypoint script to the image
#COPY entrypoint.sh /usr/local/bin/
#RUN chmod +x /usr/local/bin/entrypoint.sh

# Copy the application files
COPY . /var/www

# Change the ownership to the non-root user and group
#RUN chown -R laraveluser:laravelgroup /var/www

# Switch to the non-root user
#USER laraveluser

#ENTRYPOINT ["entrypoint.sh"]
CMD ["php-fpm"]
