# Reloj Digital MVC en PHP

Aplicación web de reloj digital desarrollada en PHP puro, sin framework backend y sin base de datos. La interfaz visual está construida con Bootstrap 5 y una capa ligera de estilos propios. El proyecto usa una arquitectura MVC clásica con front controller, controlador principal, modelo de formato y vistas compartidas.

## Tecnologías

- PHP 8.0 o superior.
- MVC sin framework backend.
- Bootstrap 5 vía CDN.
- JavaScript nativo para mantener el reloj en tiempo real.
- Sin base de datos.

## Funcionalidad

- Muestra la hora actual en formato digital.
- Presenta la fecha completa en español.
- Indica la zona horaria configurada en la aplicación.
- Mantiene la hora actualizada sin recargar la página.
- Incluye una pantalla 404 dentro del mismo flujo MVC.

## Arquitectura MVC

La aplicación se organiza de esta forma:

1. `public/index.php` actúa como front controller.
2. `bootstrap.php` carga el autoloader y la configuración global.
3. `App\Core\Router` resuelve el controlador y la acción.
4. `App\Controllers\ClockController` prepara la pantalla principal.
5. `App\Models\ClockModel` formatea fecha, hora y zona horaria.
6. `App\Controllers\ErrorController` muestra la vista 404.
7. `App\Views\layouts\main.php` define el layout compartido con Bootstrap.

## Estructura del proyecto

```text
digital_clock/
├─ app/
│  ├─ Controllers/
│  │  ├─ ClockController.php
│  │  └─ ErrorController.php
│  ├─ Core/
│  │  ├─ Config.php
│  │  ├─ Controller.php
│  │  └─ Router.php
│  ├─ Models/
│  │  └─ ClockModel.php
│  └─ Views/
│     ├─ clock/index.php
│     ├─ errors/404.php
│     └─ layouts/main.php
├─ config/app.php
├─ public/
│  ├─ assets/
│  │  ├─ css/app.css
│  │  └─ js/clock.js
│  └─ index.php
├─ bootstrap.php
└─ README.md
```

## Requisitos

- PHP 8.0 o superior.
- Un servidor web como Apache o Nginx.
- O el servidor integrado de PHP para pruebas locales.

## Instalación

1. Descarga o clona el proyecto.
2. Configura `public/` como directorio público de tu servidor.
3. Verifica que PHP esté habilitado.
4. Opcionalmente ajusta la zona horaria en `config/app.php`.

## Ejecución local

Desde la raíz del proyecto puedes levantar el servidor integrado con:

```bash
php -S localhost:8000 -t public
```

Luego abre en el navegador:

```text
http://localhost:8000
```

## Configuración

El archivo `config/app.php` concentra los valores principales de la aplicación:

- `app.name`: nombre visible del proyecto.
- `app.subtitle`: texto descriptivo del encabezado.
- `app.timezone`: zona horaria usada para generar la hora inicial.
- `ui.bootstrap_css`: hoja de estilos de Bootstrap 5.
- `ui.bootstrap_js`: bundle JavaScript de Bootstrap 5.

Si deseas mostrar otra zona horaria, cambia `app.timezone` por un identificador válido de PHP, por ejemplo `America/Mexico_City` o `Europe/Madrid`.

## Flujo de la aplicación

1. El navegador solicita `public/index.php`.
2. `bootstrap.php` carga el autoloader y la configuración.
3. `Router` selecciona el controlador y la acción por defecto.
4. `ClockController` obtiene la hora actual y prepara los datos de la vista.
5. `ClockModel` formatea la fecha y la hora.
6. La vista se renderiza dentro del layout compartido.
7. `clock.js` mantiene el reloj activo en el navegador.

## Controladores

### ClockController

- `index()`: muestra la pantalla principal del reloj y envía a la vista los datos iniciales.
- `currentDateTime()`: construye la fecha y hora usando la zona horaria configurada.

### ErrorController

- `notFound()`: renderiza la vista 404 cuando la ruta o la acción no existen.

## Vistas

- `layouts/main.php`: layout principal con Bootstrap, cabecera y carga de recursos.
- `clock/index.php`: pantalla principal del reloj digital.
- `errors/404.php`: respuesta visual cuando una ruta no se encuentra.

## Estilos y front-end

La presentación combina Bootstrap 5 con `public/assets/css/app.css` para construir una interfaz oscura, moderna y clara en móviles y escritorio. El archivo `public/assets/js/clock.js` se encarga de refrescar la hora sin recargar la página.

## Notas técnicas

- No se usa base de datos, así que no hay persistencia de datos.
- No se usa Composer ni ningún framework backend.
- El proyecto está preparado para extenderse con nuevas rutas, vistas o controladores.

## Licencia

Proyecto de uso libre para fines educativos o personales.