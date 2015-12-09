# SRAC
Manual de Instalación

Este documento describe los pasos necesarios para la correcta instalación y funcionamiento de la aplicación

Software Requerido:

php 5.6 o +
composer
PostgreSQL 9.3

Descarga del repositorio
Se debe descargar la aplicación desde el siguiente repositorio:
https://github.com/alvarokb2/SRAC
descomprimir el archivo de extensión .zip en la carpeta pública del servidor web
dirigirse via consola a la carpeta raiz del proyecto
ejecutar el comando: composer update
Crear la base de datos:
Creación de base de datos
crear usuario:
iniciar cliente con el comando: psql -U postgres -h localhost
CREATE USER nombredeusuario PASSWORD 'password';
ALTER ROLE nombredeusuario WITH SUPERUSER; 
crear base de datos:
CREATE DATABASE SRAC WITH OWNER nombredeusuario;
configurar la aplicación para funcionar
modificar archivo .env en la raíz del proyecto


DB_HOST = localhost
DB_DATABASE= SRAC
DB_USERNAME= nombredeusuario
DB_PASSWORD= password


generar tablas en la base de datos:
ejecutar en la raíz del proyecto el comando: php artisan migrate
poblar base de datos de prueba:
ejecutar en la raíz del proyecto el comando: php artisan db:seed



