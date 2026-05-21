# Reloj Digital Estático

Sitio estático hecho solo con HTML, CSS, JavaScript y fuentes locales. No usa PHP, no usa backend y está listo para publicarse en GitHub Pages.

## Qué incluye

- `index.html` como entrada principal.
- `assets/css/app.css` con los estilos del reloj.
- `assets/js/clock.js` con el reloj en tiempo real y el movimiento tipo DVD.
- `assets/fonts/` con la fuente digital local.

## Funcionalidad

- Muestra la hora actual.
- Muestra la fecha completa en español.
- Usa la zona horaria del navegador.
- Mueve el bloque por toda la pantalla con rebote en los bordes.
- No requiere instalación de servidor ni base de datos.

## Estructura

```text
digital_clock/
├─ index.html
├─ assets/
│  ├─ css/app.css
│  ├─ js/clock.js
│  └─ fonts/
│     └─ Digital Display.woff
└─ README.md
```

## Uso local

Abre `index.html` en tu navegador o sirve la carpeta con cualquier servidor estático.

## Publicación en GitHub Pages

1. Sube este repositorio a GitHub.
2. Activa GitHub Pages desde la rama principal.
3. Usa la raíz del repositorio como origen.

## Notas

- El reloj se alimenta solo de JavaScript.
- La fuente digital se carga desde archivos locales, sin dependencias externas.