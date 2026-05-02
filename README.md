# Portal del estudiante

MVP inicial en PHP sin frameworks + Alpine.js + SQLite.

## Objetivo actual

Construir una versión web simple e intuitiva del Excel `Estudio Cualitativo (3).xlsx`, manteniendo su lógica de decisión y cálculo económico.

## Multiempresa y roles

El sistema ahora es multitenant (multiempresa) con autenticacion por sesion y dos roles:

- `admin`: ve todos los estudios de su organizacion.
- `estudiante`: ve y registra solo sus propios estudios.

Documentacion detallada en `MULTITENANT_ROLES.md`.

## Estructura del proyecto

- `public/index.php`: front-controller mínimo.
- `app/Controllers/HomeController.php`: manejo de request/response y persistencia.
- `app/Views/home.php`: vista principal (formulario + histórico).
- `app/Views/login.php`: vista de ingreso.
- `public/assets/app.css`: estilos de la interfaz.
- `public/assets/app.js`: lógica de cálculo en cliente (Alpine.js).
- `app/config.php`: carga de entorno y configuración unificada de base de datos.
- `app/Database.php`: factory de conexión PDO desacoplada del motor.
- `app/StudyRepository.php`: consultas SQL de la entidad `qualitative_studies`.
- `storage/database/portal.sqlite`: archivo SQLite del MVP.
- `.env.example`: plantilla de configuración.
- `.env`: configuración local activa.

## Ejecutar local

1. Copia `.env.example` a `.env` (opcional, pero recomendado).
2. Inicia servidor:

```bash
php -S localhost:8000 -t public
```

3. Abre `http://localhost:8000`.

## Acceso de prueba inicial

- Administrador:
  - correo: `admin@demo.local`
  - contrasena: `admin123`
- Estudiante:
  - correo: `estudiante@demo.local`
  - contrasena: `estudiante123`

Importante: cambia estas credenciales en cuanto sea posible.

## Configuración de base de datos

Por defecto el proyecto inicia con SQLite:

```env
DB_DRIVER=sqlite
DB_DATABASE=storage/database/portal.sqlite
```

## Cambio futuro de motor (MySQL/PostgreSQL)

La app usa `PDO` y una capa de repositorio (`app/StudyRepository.php`), por lo que migrar de SQLite a MySQL/PostgreSQL no requiere reescribir pantallas:

- Cambias variables (`DB_DRIVER`, `DB_HOST`, `DB_PORT`, `DB_NAME`, `DB_USER`, `DB_PASSWORD`)
- Ajustas SQL puntual si hay diferencias de dialecto
- Mantienes la misma lógica de negocio

## Fórmulas clave replicadas del Excel

- `total_unit_cost = cmv + shipping + platform_cost + ads_cost`
- `estimated_price = total_unit_cost / 0.53`
- `ads_cost = estimated_price * 0.15`
- `net_profit = estimated_price - total_unit_cost`
- `net_margin = net_profit / estimated_price`

En la implementación actual se resuelve de forma algebraica para evitar cálculos circulares.

## Continuidad

Revisa `PROJECT_CONTEXT.md` para retomar el trabajo en nuevas sesiones sin perder el hilo.
