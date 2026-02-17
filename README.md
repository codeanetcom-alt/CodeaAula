# Sistema Académico

Base inicial para un sistema académico en **Laravel 11** con enfoque **local-first**, usando **SQLite** por defecto y preparado para migrar a **MySQL** en hosting compartido.

## Stack
- PHP 8.2+
- Laravel 11
- Blade + Bootstrap
- SQLite (por defecto)
- spatie/laravel-permission
- spatie/laravel-activitylog

## Estructura recomendada
Ya se dejó preparada la estructura base para crecimiento del dominio:

- `app/Services`
- `app/Http/Requests`
- `app/Policies`

## Instalación local (paso a paso)
> Requiere acceso a repositorios Composer para completar la instalación de Laravel y paquetes.

1. Instalar dependencias:
   ```bash
   composer install
   ```

2. Crear archivo de entorno y clave de aplicación:
   ```bash
   cp .env.example .env
   php artisan key:generate
   ```

3. Configurar entorno local en `.env`:
   ```env
   APP_NAME="Sistema Academico"
   APP_ENV=local
   APP_DEBUG=true
   APP_URL=http://localhost

   DB_CONNECTION=sqlite
   # DB_HOST=127.0.0.1
   # DB_PORT=3306
   # DB_DATABASE=laravel
   # DB_USERNAME=root
   # DB_PASSWORD=
   ```

4. Crear archivo SQLite:
   ```bash
   mkdir -p database
   touch database/database.sqlite
   ```

5. Ejecutar migraciones + seeders:
   ```bash
   php artisan migrate --seed
   ```

6. Levantar servidor local:
   ```bash
   php artisan serve
   ```

7. Abrir en navegador:
   - http://localhost:8000

## Compatibilidad con MySQL (futuro hosting)
Cuando se despliegue en hosting compartido:

1. Cambiar `.env`:
   ```env
   DB_CONNECTION=mysql
   DB_HOST=127.0.0.1
   DB_PORT=3306
   DB_DATABASE=nombre_bd
   DB_USERNAME=usuario_bd
   DB_PASSWORD=clave_bd
   ```
2. Ejecutar:
   ```bash
   php artisan config:clear
   php artisan migrate --seed
   ```

## Alcance de esta base
Incluye únicamente:
- Configuración inicial del proyecto.
- Base para auth.
- Roles base previstos: `SuperAdmin`, `Coordinador`.
- Migraciones y seeders base planeados.

No incluye todavía:
- Módulo de exámenes.
- Módulo de certificados.
