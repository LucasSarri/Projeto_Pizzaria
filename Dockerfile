FROM php:8.2-apache

# Instala extensões necessárias
RUN docker-php-ext-install mysqli pdo pdo_mysql

# Ativa mod_rewrite (útil se precisar depois)
RUN a2enmod rewrite