FROM php:8.0.2-fpm
 
# Set working directory
WORKDIR /var/www/html/

# Copy composer.lock and composer.json into the working directory
COPY composer.lock composer.json /var/www/html/
 

 
# Install dependencies for the operating system software
RUN apt-get update && apt-get install -y \
    build-essential \
    libpng-dev \
    libjpeg62-turbo-dev \
    libfreetype6-dev \
    locales \
    zip \
    jpegoptim optipng pngquant gifsicle \
    vim \
    libzip-dev \
    unzip \
    git \
    libonig-dev \
    curl
 
# Clear cache
RUN apt-get clean && rm -rf /var/lib/apt/lists/*
 
# Install extensions for php
RUN docker-php-ext-install pdo_mysql mbstring zip exif pcntl
RUN docker-php-ext-configure gd --with-freetype --with-jpeg
RUN docker-php-ext-install gd
 
# Install composer (php package manager)
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer
 
# Copy existing application directory contents to the working directory
COPY . /var/www/html
 
# Assign permissions of the working directory to the www-data user
#RUN chown -R www-data:www-data \
#        /var/www/html/storage \
 #       /var/www/html/bootstrap/cache

RUN php artisan cache:clear
RUN php artisan config:cache
RUN chmod 775 /var/www/html/storage/framework/sessions

# Create a system user to run Composer and Artisan commands.
#RUN useradd -G www-data,root -d /home/cfgs2
#RUN mkdir -p /home/cfgs2/.composer  && chown -R cfgs2:cfgs2 /home/cfgs2

#WORKDIR /var/www

#USER cfgs2





# Expose port 9000 and start php-fpm server (for FastCGI Process Manager)
EXPOSE 9000
CMD ["php-fpm"]

