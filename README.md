# Reloj Digital en PHP

Aplicación web simple de reloj digital desarrollada enteramente en PHP puro, sin framework y sin base de datos. El objetivo es mostrar la hora actual de forma clara, ligera y fácil de desplegar en cualquier servidor con soporte para PHP.

## Características

- Desarrollado solo con PHP.
- Sin frameworks ni dependencias externas.
- Sin base de datos.
- Interfaz simple y ligera.
- Fácil de instalar y ejecutar.
- Ideal para aprender PHP básico o como base para un proyecto más grande.

## Requisitos

- PHP 8.0 o superior.
- Un servidor web como Apache, Nginx o el servidor integrado de PHP.

## Instalación

1. Clona o descarga el proyecto en tu computadora.
2. Copia los archivos en la carpeta pública de tu servidor web.
3. Asegúrate de que PHP esté habilitado.

## Uso

Si usas el servidor integrado de PHP, puedes iniciar el proyecto con:

```bash
php -S localhost:8000
```

Después abre tu navegador en:

```text
http://localhost:8000
```

## Estructura sugerida

```text
digital_clock/
├─ index.php
├─ assets/
│  ├─ css/
│  └─ js/
└─ README.md
```

## Notas

- El reloj obtiene la hora del servidor o del navegador, según cómo esté implementado el proyecto.
- Al no usar base de datos, no hay persistencia de datos ni configuración adicional.

## Licencia

Proyecto de uso libre para fines educativos o personales.