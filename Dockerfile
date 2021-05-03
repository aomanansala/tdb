FROM php:7.4-apache-buster

# Install and enable pecl extensions
RUN pecl install redis-5.1.1 \
#    && pecl install xdebug-2.8.1 \
    && docker-php-ext-enable redis
    # Comment out the below line for additional performance
    # && docker-php-ext-enable xdebug

RUN docker-php-ext-install pdo_mysql

# Copy the source directory into the docker container
COPY ./ /var/www

# ---
# Set some helpful environmental variables
# ---

# Project Root details
ENV PROJECT_ROOT /var/www
ENV APACHE_DOCUMENT_ROOT ${PROJECT_ROOT}/public

# Server details
ENV SERVER_NAME teamdb.com

# Change the document root for PHP
RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/sites-available/*.conf
RUN sed -ri -e 's!/var/www/!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/apache2.conf /etc/apache2/conf-available/*.conf

# Enable the apache2 rewrite module
RUN a2enmod rewrite


# Set approproate permissions for stoage and cache
ENV APACHE_USER www-data
RUN chown -R ${APACHE_USER} ${PROJECT_ROOT}/storage/
RUN chmod -R 777 ${PROJECT_ROOT}/storage -R
RUN chmod -R 777 ${PROJECT_ROOT}/bootstrap/cache -R

# Set the ServerName for the application and expose on port 80
RUN echo "ServerName ${SERVER_NAME}" >> /etc/apache2/apache2.conf
EXPOSE 80
