# SRAC
#Manual de Instalación

Este documento describe los pasos necesarios para la correcta instalación y funcionamiento de la aplicación<br>

#Software Requerido:

php 5.6 o +<br>
composer<br>
PostgreSQL 9.3<br>

#1 Descarga del repositorio
Se debe descargar la aplicación desde el siguiente repositorio:<br>
https://github.com/alvarokb2/SRAC<br>
descomprimir el archivo de extensión .zip en la carpeta pública del servidor web<br>
dirigirse via consola a la carpeta raiz del proyecto<br>
ejecutar el comando: composer update<br>
#2 Crear la base de datos:
Creación de base de datos<br>
#crear usuario:
iniciar cliente con el comando: psql -U postgres -h localhost<br>
CREATE USER nombredeusuario PASSWORD 'password';<br>
ALTER ROLE nombredeusuario WITH SUPERUSER; <br>
#crear base de datos:
CREATE DATABASE SRAC WITH OWNER nombredeusuario;<br>
#configurar la aplicación para funcionar
modificar archivo .env en la raíz del proyecto<br>

DB_HOST = localhost <br>
DB_DATABASE= SRAC<br>
DB_USERNAME= nombredeusuario<br>
DB_PASSWORD= password<br>

#generar tablas en la base de datos:
ejecutar en la raíz del proyecto el comando: php artisan migrate<br>
#poblar base de datos de prueba:
ejecutar en la raíz del proyecto el comando: php artisan db:seed<br>



