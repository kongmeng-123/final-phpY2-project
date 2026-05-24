FROM php:8.2-apache

# ติดตั้ง PDO MySQL Extension
RUN docker-php-ext-install pdo pdo_mysql

# เปิดการใช้งาน mod_rewrite ของ Apache (เผื่อไว้สำหรับทำพวก Clean URL)
RUN a2enmod rewrite