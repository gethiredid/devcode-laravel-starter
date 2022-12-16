FROM composer AS composer

# copying the source directory and install the dependencies with composer
COPY . /app

# run composer install to install the dependencies
RUN composer install \
  --optimize-autoloader \
  --no-interaction \
  --no-progress
RUN cp .env.example .env
RUN php artisan key:generate

# continue stage build with the desired image and copy the source including the
# dependencies downloaded by composer
FROM trafex/php-nginx
# Configure nginx
COPY docker/nginx.conf /etc/nginx/nginx.conf
USER root
RUN apk add --no-cache php81-tokenizer

USER nobody

EXPOSE 3030

COPY --chown=nobody --from=composer /app /var/www/html
