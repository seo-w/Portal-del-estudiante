# MULTITENANT Y ROLES

## Objetivo

Aislar datos por organizacion y controlar acceso por perfil de usuario.

## Modelo implementado

- `tenants`: organizaciones.
- `users`: usuarios pertenecientes a una organizacion.
- `qualitative_studies`: estudios asociados a `tenant_id` y `user_id`.

## Roles

- `admin`
  - Puede ver todos los estudios de su organizacion.
  - Puede crear nuevos estudios.
- `estudiante`
  - Solo puede ver estudios creados por el mismo usuario.
  - Puede crear nuevos estudios.

## Reglas de aislamiento

1. Ningun usuario ve datos de otra organizacion.
2. Si el usuario es estudiante, ademas se filtra por su propio identificador.
3. Todo estudio nuevo se guarda con:
   - `tenant_id` del usuario autenticado
   - `user_id` del usuario autenticado

## Flujo de autenticacion

1. Usuario ingresa correo y contrasena.
2. Se valida hash de contrasena.
3. Se guarda sesion con:
   - identificador de usuario
   - identificador de organizacion
   - nombre
   - correo
   - rol
   - nombre de organizacion
4. Cierre de sesion limpia datos y cookie.

## Credenciales de arranque

Si la tabla de usuarios esta vacia, el sistema crea:

- Administrador demo
  - correo: `admin@demo.local`
  - contrasena: `admin123`
- Estudiante demo
  - correo: `estudiante@demo.local`
  - contrasena: `estudiante123`

## Archivos clave

- `app/StudyRepository.php`: tablas, seeding, consultas por rol y organizacion.
- `app/Controllers/HomeController.php`: login, logout, sesion, guardado.
- `app/Views/login.php`: formulario de ingreso.
- `app/Views/home.php`: barra de sesion y listado con responsable.

## Siguientes mejoras recomendadas

1. Gestion de usuarios desde interfaz de administrador.
2. Permitir multiples organizaciones reales (alta y seleccion).
3. Politica de contrasenas y cambio de clave.
4. Recuperacion de acceso.
5. Registro de auditoria por acciones sensibles.
