FROM php:8.1-apache

RUN a2enmod rewrite

COPY apache.conf /etc/apache2/sites-available/000-default.conf
COPY php.ini /usr/local/etc/php/conf.d/99-custom.ini

WORKDIR /var/www/html
RUN mkdir /var/www/html/partials
COPY index.php upload_shoppix_images.php ./
COPY partials/header.php /var/www/html/partials/
COPY partials/footer.php /var/www/html/partials/

RUN mkdir uploads && chmod 777 uploads

EXPOSE 80

CMD ["apache2-foreground"]
