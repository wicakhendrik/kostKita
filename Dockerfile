# KostKita — PHP + Apache
# Aplikasi ditulis untuk PHP 5/7 (mysqli prosedural); PHP 8.x jalan setelah koneksi.php disesuaikan.
FROM php:8.3-apache

RUN docker-php-ext-install mysqli \
 && cp "$PHP_INI_DIR/php.ini-production" "$PHP_INI_DIR/php.ini"

COPY docker/php-overrides.ini "$PHP_INI_DIR/conf.d/zz-kostkita.ini"

# Larang eksekusi script di folder upload (lihat isi file untuk alasannya)
COPY docker/apache-uploads.conf /etc/apache2/conf-available/kostkita-uploads.conf
RUN a2enconf kostkita-uploads

WORKDIR /var/www/html
COPY . /var/www/html

# assets/img = foto kost, ditulis oleh fitur upload di panel admin
RUN chown -R www-data:www-data /var/www/html/assets/img

EXPOSE 80
