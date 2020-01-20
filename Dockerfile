FROM php:7-apache

RUN apt-get update\
    && apt-get install -y netcat curl

COPY apache_config/000-default.conf /etc/apache2/sites-available/000-default.conf
RUN a2enmod rewrite

COPY src /var/www/public/
RUN chown -R www-data:www-data /var/www/public

# Smarty configuration
RUN mkdir /usr/local/lib/php/Smarty
COPY smarty-3.1.34/libs/ /usr/local/lib/php/Smarty/

WORKDIR /var/www
RUN mkdir smarty\
    && mkdir smarty/templates\
    && mkdir smarty/templates_c\
    && mkdir smarty/cache\
    && mkdir smarty/configs\
    && chmod 755 smarty/templates_c\
    && chmod 775 smarty/cache
COPY templates /var/www/smarty/templates
RUN chown -R www-data:www-data smarty

EXPOSE 80

CMD ["apache2-foreground"]

