# Portal del estudiante

MVP inicial en PHP sin frameworks + Alpine.js + SQLite.

## Objetivo actual

Construir una versión web simple e intuitiva del Excel `Estudio Cualitativo (3).xlsx`, manteniendo su lógica de decisión y cálculo económico.

## Multiempresa y roles

El sistema ahora es multitenant (multiempresa) con autenticacion por sesion y dos roles:

- `admin`: ve todos los estudios de su organizacion.
- `estudiante`: ve y registra solo sus propios estudios.

Documentacion detallada en `MULTITENANT_ROLES.md`.

## Estado visual actual

Se aplico el sistema visual de las guias de `Recursos/Diseño` en dos frentes:

- `app/Views/login.php`: layout premium responsive (columna izquierda de marca + formulario a la derecha).
- `app/Views/home.php`: dashboard interno consistente con la identidad visual del login.
- `public/assets/app.css`: base de estilos unificada para panel interno, tarjetas, inputs y tablas.

### Login (implementado)

- Responsive real (mobile en una columna, desktop en dos columnas).
- Fondo atmosferico en columna izquierda (mesh + overlays de color y blur).
- Formulario con labels flotantes, estados de foco y alerta de error.
- Se elimino el bloque de "Ingresar con Google" por requerimiento.
- Testimonio inferior izquierdo dinamico desde base de datos (uno aleatorio por carga).

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
- `app/StudyRepository.php`: consultas SQL de `qualitative_studies`, `users`, `tenants` y `login_testimonials`.
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

### Tabla adicional de UX en login

Se agrega `login_testimonials` para mostrar un testimonio distinto en cada carga del login:

- `id`
- `author_name`
- `author_role`
- `quote`
- `created_at`

El seeding inicial se hace automaticamente en `StudyRepository::seedDefaults()` cuando la tabla esta vacia.

## Notas operativas (Git en Windows)

- Si la carpeta ya tiene `.git`, en GitKraken se debe usar **Open Existing Repo**, no **Initialize**.
- Si el repositorio se inicializa mal y `HEAD` queda invalido, se corrige con:

```bash
git symbolic-ref HEAD refs/heads/main
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
