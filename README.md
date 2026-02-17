# Sistema Académico

Base inicial para un sistema académico en **Laravel 11** con enfoque **local-first**, usando **SQLite** por defecto y preparado para migrar a **MySQL** en hosting compartido.

## Stack
- PHP 8.2+
- Laravel 11
- Blade + Bootstrap
- SQLite (por defecto)
- spatie/laravel-permission
- spatie/laravel-activitylog
- maatwebsite/excel

## Estructura recomendada
Ya se dejó preparada la estructura base para crecimiento del dominio:

- `app/Services`
- `app/Http/Requests`
- `app/Policies`

## Módulo actual: Gestión de Alumnos (Fase 2)
Incluye:
- CRUD completo de alumnos.
- Validación robusta con Form Requests.
- Búsqueda por DNI.
- Historial académico relacionado (base creada).
- Importación masiva CSV/XLSX.
- Evita duplicados por DNI (en formulario e importación).
- Proveedor RENIEC desacoplado con implementación mock.
- Log de actividad para crear/editar/eliminar alumnos.

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

## Importación masiva de alumnos (CSV/XLSX)
Desde el panel `Alumnos` puedes subir archivos `.csv`, `.xls` o `.xlsx`.

### Encabezados esperados
El archivo debe tener estos nombres de columnas:

- `dni`
- `nombres`
- `apellidos`
- `correo`
- `telefono`
- `programa`
- `nivel`

### Reglas de importación
- El DNI es obligatorio.
- Si un DNI ya existe, el alumno **se actualiza** (no se duplica).
- Se validan formato de correo y longitudes máximas por campo.

Ejemplo CSV:

```csv
dni,nombres,apellidos,correo,telefono,programa,nivel
12345678,Ana,Lopez,ana@example.com,999888777,Ingeniería,3
87654321,Carlos,Perez,carlos@example.com,988777666,Derecho,1
```

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
