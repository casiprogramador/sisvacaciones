##Sistema de Vacaciones desarrollado en Laravel 5.2

##Instalacion
Para la instalacion primeramente clonar el sistema del repositorio.
git clone https://github.com/pmarce/sisvacaciones.git

ingresar a la carpeta.
cd sisvacaciones

Actualizar dependencias.
composer update

Copiar el archivo de configuracion.
copiar .env_example a .env

Configurar base de datos.

Generamos la llave de seguridad.
$ php artisan key:generate

Creamos el esquema de la base de datos.
$ php artisan migrate

Creamos usuario para el ingreso.
$ php artisan db:seed

Iniciamos el servidor.
$ php aritsan serve
