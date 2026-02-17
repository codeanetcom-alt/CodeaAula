# PLANS.md — Sistema Académico

## Fase 0 — Bootstrap del proyecto
- [x] Definir lineamientos del repositorio (`AGENTS.md`).
- [x] Definir plan de ejecución por fases (`PLANS.md`).
- [x] Documentar instalación local (`README.md`).
- [ ] Instalar dependencias Laravel 11 (cuando haya acceso a paquetes).

## Fase 1 — Base técnica local (SQLite)
- [ ] Configurar `.env` local (`APP_URL=http://localhost`).
- [ ] Configurar SQLite por defecto (`database/database.sqlite`).
- [ ] Verificar comandos:
  - [ ] `composer install`
  - [ ] `php artisan migrate --seed`
  - [ ] `php artisan serve`

## Fase 2 — Seguridad y autenticación
- [ ] Instalar scaffolding de auth básica (Blade).
- [ ] Ajustar layout con Bootstrap.
- [ ] Validar login/logout local.

## Fase 3 — Roles y permisos
- [ ] Instalar `spatie/laravel-permission`.
- [ ] Publicar configuración y migraciones.
- [ ] Crear roles base: `SuperAdmin`, `Coordinador`.
- [ ] Asignación de roles en seeders.

## Fase 4 — Auditoría
- [ ] Instalar `spatie/laravel-activitylog`.
- [ ] Publicar configuración y migraciones.
- [ ] Registrar eventos básicos (alta/actualización de entidades núcleo).

## Fase 5 — Modelo base académico (sin módulos complejos)
- [ ] Migraciones base (usuarios y catálogos mínimos).
- [ ] Seeders demo para datos iniciales.
- [ ] Policies base para recursos iniciales.

## Fase 6 — Preparación para hosting compartido (MySQL)
- [ ] Confirmar compatibilidad de migraciones con MySQL.
- [ ] Documentar cambio de driver SQLite -> MySQL.
- [ ] Checklist de despliegue básico sin dominio personalizado.

## Fase 7 — QA local y cierre de base
- [ ] Ejecutar pruebas automáticas.
- [ ] Validar flujo completo en entorno local.
- [ ] Congelar base lista para construir módulos futuros.
