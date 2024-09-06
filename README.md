# 🎮 GameApp - Proyecto Laravel

Este proyecto **GameApp** es una aplicación web desarrollada en Laravel, diseñada para gestionar la autenticación de usuarios, categorías, y funcionalidades específicas para la administración de datos de usuarios registrados.

## 📑 Tabla de Contenidos

- [🔧 Requisitos Previos](#-requisitos-previos)
- [📥 Instalación](#-instalación)
- [⚙️ Configuración](#️-configuración)
- [🚀 Uso](#-uso)
- [📂 Estructura del Proyecto](#-estructura-del-proyecto)
- [🤝 Contribuciones](#-contribuciones)
- [📜 Licencia](#-licencia)

## 🔧 Requisitos Previos

Antes de empezar, asegúrate de tener instalados los siguientes programas:

- [PHP](https://www.php.net/downloads) >= 8
- [Composer](https://getcomposer.org/download/)
- [Laravel](https://laravel.com/docs/8.x/installation)
- [MySQL](https://dev.mysql.com/downloads/mysql/)
- [Node.js](https://nodejs.org/en/download/) y npm
- [Git](https://git-scm.com/downloads)

## 📥 Instalación

### Clonar el Repositorio

1. Clona el repositorio desde GitHub:
    ```bash
    git clone https://github.com/JonathanRobinsonAristizabalSoto/gameapp.git
    cd gameapp
    ```

2. Instala las dependencias de PHP usando Composer:
    ```bash
    composer install
    ```

3. Instala las dependencias de Node.js y npm:
    ```bash
    npm install
    ```

## ⚙️ Configuración

### Variables de Entorno

1. Copia el archivo `.env.example` a `.env`:
    ```bash
    cp .env.example .env
    ```

2. Configura los detalles de la base de datos y otros parámetros en el archivo `.env`:

    ```env
    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=nombre_base_de_datos
    DB_USERNAME=tu_usuario
    DB_PASSWORD=tu_contraseña
    ```

3. Genera una clave de la aplicación:
    ```bash
    php artisan key:generate
    ```

4. Ejecuta las migraciones para crear las tablas necesarias:
    ```bash
    php artisan migrate
    ```

5. Compila los recursos de frontend:
    ```bash
    npm run dev
    ```

6. Si deseas generar archivos minificados para producción:
    ```bash
    npm run production
    ```

## 🚀 Uso

### Iniciar el Servidor de Desarrollo

Para iniciar el servidor de desarrollo de Laravel, ejecuta:

```bash
php artisan serve
Cargar Seeders
Si deseas poblar la base de datos con datos de prueba, ejecuta:

bash
Copiar código
php artisan db:seed

📂 Estructura del Proyecto

El proyecto está organizado de la siguiente manera:


gameapp/
├── app/                     # Contiene los controladores, modelos, políticas, etc.
├── bootstrap/                # Contiene la inicialización del framework
├── config/                   # Archivos de configuración
├── database/                 # Migraciones, factories y seeders
├── public/                   # Punto de entrada público (index.php) y assets (CSS, JS)
├── resources/                # Vistas, layouts y archivos de frontend
│   ├── views/                # Plantillas Blade
│   ├── js/                   # Archivos JavaScript
│   ├── sass/                 # Archivos SCSS (CSS preprocesado)
├── routes/                   # Definición de rutas de la aplicación
├── storage/                  # Archivos de caché, logs y sesiones
├── tests/                    # Pruebas automáticas
├── .env                      # Variables de entorno
└── composer.json             # Archivo de dependencias PHP

Principales Vistas
login.blade.php: Vista para la autenticación de usuarios.
register.blade.php: Vista para el registro de usuarios.
home.blade.php: Vista del dashboard de la aplicación.
categories.blade.php: Vista dinámica para la gestión de categorías.

🤝 Contribuciones

Las contribuciones son bienvenidas.

Si deseas contribuir a este proyecto, por favor sigue estos pasos:

Haz un fork del repositorio.
Crea una nueva rama (git checkout -b feature/nueva-caracteristica).
Realiza tus cambios y haz commit (git commit -am 'Añadida nueva característica').
Empuja tus cambios a la rama (git push origin feature/nueva-caracteristica).
Crea un Pull Request en GitHub.

📜 Licencia

Este proyecto está licenciado bajo la Licencia MIT.

Este archivo ahora incluye las secciones solicitadas en detalle. Puedes copiar y pegar directamente el contenido en tu archivo README.md de GitHub para documentar tu proyecto GameApp.
