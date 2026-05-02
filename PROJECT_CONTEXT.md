# PROJECT CONTEXT - Portal del estudiante

## Estado actual (MVP funcional)

El proyecto ya tiene una base funcional en `PHP` sin frameworks, `Alpine.js` en frontend y `SQLite` como persistencia inicial.

La pantalla principal permite:

- ingresar producto y puntaje de checklist
- calcular costos/rentabilidad en tiempo real
- guardar evaluación en base de datos
- listar últimos registros guardados

Ahora incluye:

- autenticacion por sesion
- modo multitenant (aislamiento por organizacion)
- roles `admin` y `estudiante`
- login redisenado basado en guias visuales de `Recursos/Diseño`
- dashboard interno adaptado al mismo lenguaje visual
- testimonios dinamicos en login desde SQLite

## Decisiones de arquitectura

1. **Simplicidad primero**
   - Un solo punto de entrada (`public/index.php`)
   - Sin dependencias de framework

2. **Persistencia desacoplada**
   - Conexión encapsulada en `app/Database.php`
   - SQL centralizado en `app/StudyRepository.php`
   - Uso de `PDO` para facilitar migración futura de motor

3. **Configuración externa**
   - Variables de entorno en `.env`
   - Cargador manual en `app/config.php`

4. **Base para escalamiento**
   - Aunque es MVP, ya existe separación por capas (controller / view / assets / config / db / repo)

## Estructura vigente

- `public/index.php`: front-controller.
- `app/Controllers/HomeController.php`: orquesta request, guardado y lectura.
- `app/Views/home.php`: plantilla HTML de la pantalla principal.
- `app/Views/login.php`: plantilla HTML de inicio de sesion.
- `public/assets/app.js`: fórmula y estado reactivo de calculadora.
- `public/assets/app.css`: sistema visual actualizado (auth + dashboard).
- `app/config.php`: lectura de `.env` y armado de configuración de DB.
- `app/Database.php`: conexión PDO.
- `app/StudyRepository.php`: SQL de `qualitative_studies`, `users`, `tenants` y `login_testimonials`.

## Cómo correr el proyecto

```bash
php -S localhost:8000 -t public
```

Luego abrir `http://localhost:8000`.

## Contrato de datos actual

Tabla: `qualitative_studies`

- `id`
- `tenant_id`
- `user_id`
- `product_name`
- `checklist_score`
- `cmv`
- `total_unit_cost`
- `estimated_price`
- `net_profit`
- `net_margin`
- `created_at`

Tabla: `tenants`

- `id`
- `name`
- `created_at`

Tabla: `users`

- `id`
- `tenant_id`
- `name`
- `email`
- `password_hash`
- `role`
- `created_at`

Tabla: `login_testimonials`

- `id`
- `author_name`
- `author_role`
- `quote`
- `created_at`

## Credenciales iniciales de demostracion

- administrador:
  - correo: `admin@demo.local`
  - contrasena: `admin123`
- estudiante:
  - correo: `estudiante@demo.local`
  - contrasena: `estudiante123`

Estas cuentas se crean automaticamente si no existen usuarios.

## Login dinamico y visual

- La vista de login toma como referencia el diseno de `login_acceso_academia`.
- Se removio intencionalmente el bloque de acceso con Google.
- El panel izquierdo conserva fondo atmosferico (mesh/imagen + overlays).
- El testimonio de la parte inferior izquierda ahora viene de BD:
  - el controlador obtiene un testimonio aleatorio en cada carga (`randomLoginTestimonial`).
  - si no hay datos, se usa fallback por defecto en vista.

## Nota de continuidad Git

Durante la sesion se detecto un repo inicializado con `HEAD` invalido (`refs/heads/` vacio).
Correccion aplicada:

- `git symbolic-ref HEAD refs/heads/main`

Resultado: repo utilizable de nuevo desde CLI y GUI.

## Fórmulas de negocio (referencia)

Variables:

- `baseCost = cmv + shipping + platform_cost`
- `ads_cost = estimated_price * 0.15`
- `total_unit_cost = baseCost + ads_cost`
- `estimated_price = total_unit_cost / 0.53`

Resolución sin circularidad:

- `estimated_price = baseCost / (0.53 - 0.15)`
- `ads_cost = estimated_price * 0.15`
- `total_unit_cost = baseCost + ads_cost`
- `net_profit = estimated_price - total_unit_cost`
- `net_margin = net_profit / estimated_price`

## Pendientes prioritarios (siguientes sesiones)

1. Guardar detalle por criterio del checklist, no solo puntaje total.
2. Crear migraciones versionadas (carpeta `database/migrations`).
3. Añadir validación backend más estricta y mensajes de error amigables.
4. Implementar exportación (CSV/Excel/PDF).
5. Panel de administrador para crear usuarios y organizaciones.
6. Endurecer seguridad de autenticación y manejo de contraseñas.

## Guía de migración de base de datos

### Migrar a MySQL

- `.env`
  - `DB_DRIVER=mysql`
  - `DB_HOST=...`
  - `DB_PORT=3306`
  - `DB_NAME=...`
  - `DB_USER=...`
  - `DB_PASSWORD=...`
- Revisar SQL de creación:
  - `INTEGER PRIMARY KEY AUTOINCREMENT` -> `INT AUTO_INCREMENT PRIMARY KEY`
  - `DATETIME DEFAULT CURRENT_TIMESTAMP` (compatible)

### Migrar a PostgreSQL

- `.env`
  - `DB_DRIVER=pgsql`
  - `DB_HOST=...`
  - `DB_PORT=5432`
  - `DB_NAME=...`
  - `DB_USER=...`
  - `DB_PASSWORD=...`
- Revisar SQL de creación:
  - `INTEGER PRIMARY KEY AUTOINCREMENT` -> `SERIAL PRIMARY KEY` o `GENERATED ...`

## Criterios de calidad acordados

- código legible y con responsabilidad clara por archivo
- comentarios solo donde agreguen contexto real
- evitar duplicación de lógica
- mantener fórmulas de negocio trazables al Excel original
- documentar decisiones para continuidad de sesión
