#!/bin/bash

# Crear archivo .env desde .env.example
cp .env.example .env

# Generar la clave de aplicación
php artisan key:generate

# Crear archivo database.sqlite si no existe
if [ ! -f database/database.sqlite ]; then
    touch database/database.sqlite
    echo "Archivo database.sqlite creado."
fi

echo "Configuración completada."
