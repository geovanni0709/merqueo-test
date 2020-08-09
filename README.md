# Código Fuente de Test de Admisión Merqueo

Decidí utilizar un micro framework como Lumen ya que cumplia con todos los requisitos para realizar la pruba y además dejaba un códifo fuente más liviano.
Como sabemos Laravel es un framework orientado al patrón MVC, sin embargo hice algunos ajustes en la estructura de directorios para aplicar la Arquitectura Hexagonal, el cual va muy atado al enfoque de desarrollo de Domain-Driven Design.

Basicamente la arquitectura Hexagonal emplea las siguientes capas:

Aplicación: Casos de Uso de la aplicación.

Dominio: Núcleo de la arquitectura, acá se encuentran las entidades, contratos (interfaces), Objetos de valor (Value object) y Exceptions propias de cada entidad. En esta capa deberían ir los modelos también, Laravel los almacena por default en App, decidí dejarlos de momento así.

Infraestructura: Todo lo que tiene que ver con la infraestructura del proyecto, por ejemplo frameworks, adaptadores de correo, sistema de colas, implementaciones de ORM, en mi caso hago uso del ORM de Laravel Eloquent implementado un contrato por si se desea usar otro ORM como doctrine, principio de inversión de dependencias.

Dejo algunas instrucciones para preparar el entorno donde puedan revisar la API Rest:

# Requerimientos mínimos del servidor web

PHP >= 7.2
OpenSSL PHP Extension
PDO PHP Extension
Mbstring PHP Extension

# Instalar Laravel Lumen

Paso 1: Instalar Laravel
composer global require "laravel/installer"

paso 2: Adicionar compososer al PATH para acceso global y poder digitar comandos desde consola
export PATH="~/.config/composer/vendor/bin:$PATH" (LINUX)

Paso 3 : Instalar los paquetes y sus dependencias
cd merqueo-test
composer install

Paso 4
Configurar la conexión a base de datos en el archivo .env

Paso 5 Crear las tablas
php artisan migrate:install

Paso 6 Crear los datos de prueba
php artisan db:seed

# PRUEBAS
Para ejecutar las pruebas ejecutar el comando ./vendor/bin/phpunit en la consola

Ejecución de las pruebas
./vendor/bin/phpunit

De igual forma adjuento dump de la base de datos.

# ENDPOINTS

Consultar qué productos y qué cantidad puede ser alistada desde el inventario.<br />
dominio/rest/v1/inventory-can-delivery

Consultar los productos que deben ser alistados por transportadores, y a qué transportador le corresponde cada pedido.<br />
dominio/rest/v1/inventory-delivery-provider

Productos menos vendidos el día 1 de marzo.<br />
dominio/rest/v1/worst-selling-products/2019-03-01<br />
Recibo la fecha a consultar.

Dado el Id de un pedido, saber qué productos y qué cantidad pueden ser alistados. Según sistema de inventario y cuáles deben ser abastecidos por los proveedores.<br />
dominio/rest/v1/delivery/order/1<br />
Recibo el ID de orden a consultar.

Calcular el inventario del día 2 de marzo, teniendo en cuenta las pedidos despachados el 1 de marzo.<br />
dominio/rest/v1/inventory/calculate-next-day/2019-03-01<br />
Recibo la fecha anterior a consultar.

Productos más vendidos el día 1 de marzo.<br />
dominio/rest/v1/best-selling-products/2019-03-01<br />
Recibo la fecha a consultar.

