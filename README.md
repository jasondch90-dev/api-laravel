# API REST de Productos - Laravel

Este proyecto es una API RESTful desarrollada en Laravel para la gestión de productos (CRUD: Crear, Leer, Actualizar, Eliminar). Incluye una interfaz visual web construida con HTML, Bootstrap y JavaScript (Fetch API) para interactuar con los endpoints de manera amigable.

##  Tecnologías Utilizadas
* **Laravel 13** (Framework PHP)
* **PHP 8.3**
* **SQLite** (Base de datos local)
* **Bootstrap 5** (Diseño de la interfaz visual)
* **JavaScript Nativo** (Conexión del frontend con la API)
* **Thunder Client** (Herramienta para pruebas de API)

##  Proceso de Desarrollo y Pruebas
El desarrollo se llevó a cabo en dos fases:
1. **Pruebas del Backend:** Primero, se construyó y validó toda la lógica de la API (endpoints y validaciones) utilizando **Thunder Client**, enviando peticiones POST, GET, PUT y DELETE para comprobar que las respuestas JSON y los códigos de estado (200, 201, 404, etc.) fueran correctos.
2. **Desarrollo del Frontend:** Una vez que la API estuvo 100% funcional, se creó la interfaz visual para consumirla mediante `fetch`.

## 📋 Requisitos Previos
* PHP >= 8.3
* Composer
* Git

##  Instalación y Uso

1. Clona el repositorio en tu máquina local:
   ```bash
   git clone <PON_AQUI_LA_URL_DE_TU_REPOSITORIO>

   Entra a la carpeta del proyecto:

bash
cd api-laravel
Instala las dependencias de PHP:

bash
composer install
Genera la clave de la aplicación:

bash
php artisan key:generate
Ejecuta las migraciones para crear la base de datos SQLite y la tabla de productos:

bash
php artisan migrate
Inicia el servidor de desarrollo:

bash
php artisan serve
Endpoints de la API
Método	Endpoint	Descripción
GET	/api/productos	Lista todos los productos
POST	/api/productos	Crea un nuevo producto
GET	/api/productos/{id}	Muestra un producto específico
PUT	/api/productos/{id}	Actualiza un producto existente
DELETE	/api/productos/{id}	Elimina un producto
Ejemplo de JSON para enviar en POST/PUT:
json
{
  "nombre": "Laptop Gamer",
  "descripcion": "Laptop con 16GB RAM y 1TB SSD",
  "precio": 1500.50,
  "stock": 10
}
 Interfaz Visual (Frontend)
Para acceder al panel donde puedes gestionar los productos con un diseño amigable, debes tener el servidor encendido y visitar:
http://127.0.0.1:8000/panel-productos

text

**Por qué hacemos esto:**

Al agregar la sección "Proceso de Desarrollo y Pruebas", dejas constancia en tu repositorio de que aplicaste buenas prácticas: no saltaste directo al diseño, sino que primero aseguraste que la API respondiera bien usando herramientas profesionales como Thunder Client.

**Qué debes ver si salió bien:**

El archivo se verá actualizado. (Recuerda que puedes presionar `Ctrl + Shift + V` en VS Code para ver cómo quedará de bonito en GitHub).

**Si no sale bien:**

Si tienes problemas al pegarlo o guardarlo, avísame.

*(Ahora sí, dime **"Listo"** para ejecutar los comandos de Git y subir todo tu proyecto terminado).*
