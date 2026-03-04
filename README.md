# Admin Template (PHP MVC)

Panel de administración basado en plantilla **StarAdmin** con backend en **PHP nativo (MVC)**.  
Incluye gestión de usuarios, productos y órdenes con DataTables, AJAX y MySQL.

## Características

- PHP nativo con arquitectura **MVC** (sin frameworks).
- Plantilla **StarAdmin** (Bootstrap 4) para interfaz de administración.
- CRUD de:
  - Usuarios
  - Productos (incluye `valor_unitario`)
  - Órdenes (incluye cálculo de `valor_total = valor_unitario * num_prod`)
- Listados con **DataTables** (server-side):
  - Paginación, búsqueda, exportación (Copy, Excel, CSV).
  - Ordenamiento por columnas (por defecto `num_prod` desc).
- Formularios con envío por **AJAX**:
  - Crear / editar órdenes.
  - Mensajes de éxito/error con SweetAlert.
- Sistema de soft delete (`state`, `deleted_at`).

## Requisitos

- PHP 7.4+ (o superior).
- Servidor web (WAMP/XAMPP, Apache, o `php -S`).
- MySQL / MariaDB.
