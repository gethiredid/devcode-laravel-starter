FROM php:8.2-alpine

# Get latest Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Set working directory
WORKDIR /app

COPY . .
RUN composer install
RUN cp .env.example .env
RUN php artisan key:generate

EXPOSE 3030

CMD [ "php", "artisan", "serve" , "--host", "0.0.0.0", "--port", "3030"]