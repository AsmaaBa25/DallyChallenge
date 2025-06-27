FROM php:8.2-cli

# تثبيت إضافات PHP مطلوبة
RUN apt-get update && apt-get install -y \
    unzip git curl libzip-dev zip libpng-dev libonig-dev libxml2-dev && \
    docker-php-ext-install pdo pdo_mysql zip

# تثبيت Composer
RUN curl -sS https://getcomposer.org/installer | php && mv composer.phar /usr/local/bin/composer

# تعيين مجلد العمل داخل الحاوية
WORKDIR /app

# نسخ ملفات Laravel داخل الحاوية
COPY . .

# تثبيت مكتبات Laravel (تجاهل الخطأ لو فيه vendor ناقص)
RUN composer install || true

# توليد مفتاح التطبيق ومسح الكاش
RUN php artisan config:clear && php artisan key:generate || true

# تشغيل Laravel على البورت 10000
CMD ["php", "artisan", "serve", "--host=0.0.0.0", "--port=10000"]
