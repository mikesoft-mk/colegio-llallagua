# Unidad Educativa Llallagua

Aplicación web escolar desarrollada con Laravel 11.

## Base de datos y migraciones

La estructura de la base de datos se versiona en `database/migrations`. Cada cambio de tablas, columnas, índices o relaciones debe crearse como una migración nueva:

```bash
php artisan make:migration descripcion_del_cambio --table=nombre_tabla
```

Nunca se debe modificar una migración que ya haya sido desplegada ni subir respaldos SQL con datos personales al repositorio.

Para preparar una instalación nueva:

```bash
composer install --no-dev --optimize-autoloader
php artisan key:generate
php artisan migrate --seed
```

El seeder solo incorpora los roles base (`Director` y `Profesor`). Los estudiantes, usuarios, cursos y libretas pertenecen a datos operativos y se administran fuera de Git.

## Despliegue

Después de actualizar el código en el hosting, confirma que el archivo `.env` tiene las credenciales correctas y `APP_LOCALE=es`, y ejecuta:

```bash
php artisan migrate --force
php artisan db:seed --class=RolSeeder --force
php artisan optimize:clear
php artisan config:cache
php artisan route:cache
php artisan view:cache
```

Realiza una copia de seguridad antes de una migración que modifique o elimine información. No uses `php artisan migrate:fresh` en producción: elimina todas las tablas.

## Respaldo inicial

El archivo SQL histórico se conserva únicamente como respaldo externo. Puede importarse una vez para recuperar datos existentes, pero los cambios posteriores de esquema deben viajar mediante migraciones.

## Panel administrativo

La barra superior permite buscar docentes, estudiantes y cursos. Los Directores pueden consultar todos los registros; los Profesores solo ven sus propios cursos y los estudiantes inscritos en ellos.

Las notificaciones se almacenan en la base de datos. Un docente recibe un aviso cuando se le asigna un curso o cuando un Director cambia su estado entre activo e inactivo. Al abrir una notificación se marca como leída.