# AGENTS.md

## Reglas del proyecto
- Proyecto: **Sistema Académico**.
- Objetivo actual: base técnica inicial lista para desarrollo por fases.
- Mantener arquitectura simple, legible y orientada a mantenimiento en hosting compartido.

## Entorno (local-first)
- Este proyecto se desarrolla y prueba **100% en local**.
- `APP_URL` por defecto: `http://localhost`.
- Base de datos por defecto: **SQLite** (`database/database.sqlite`).
- No usar configuraciones de dominio personalizadas en esta fase.

## Base de datos
- Priorizar SQLite en entorno local.
- Mantener compatibilidad con MySQL para despliegue posterior:
  - usar tipos de columna estándar de Laravel,
  - evitar SQL específico de motor,
  - mantener índices y llaves foráneas portables.

## Stack obligatorio
- Laravel 11
- PHP 8.2+
- Blade + Bootstrap
- `spatie/laravel-permission`
- `spatie/laravel-activitylog`

## Alcance inicial (fase base)
- Configuración base del proyecto.
- Autenticación básica.
- Roles base: `SuperAdmin`, `Coordinador`.
- Migraciones base.
- Seeders demo.

## Fuera de alcance por ahora
- Módulo de exámenes.
- Módulo de certificados.
- Cualquier lógica académica avanzada.

## Convenciones
- Servicios en `app/Services`.
- Form Requests en `app/Http/Requests`.
- Policies en `app/Policies`.
- Seguir convención PSR-12 y estilo Laravel.
