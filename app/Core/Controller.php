<?php

declare(strict_types=1);

namespace App\Core;

use RuntimeException;

/**
 * Base de todos los controladores de la aplicación.
 *
 * Proporciona el método común de renderizado para mantener la lógica de vistas
 * fuera de cada controlador concreto.
 */
abstract class Controller
{
    /**
     * Renderiza una vista dentro de un layout compartido.
     */
    protected function render(string $view, array $data = [], string $layout = 'layouts/main', int $statusCode = 200): void
    {
        http_response_code($statusCode);

        $viewFile = APP_PATH . '/Views/' . $view . '.php';
        $layoutFile = APP_PATH . '/Views/' . $layout . '.php';

        if (!is_file($viewFile)) {
            throw new RuntimeException(sprintf('Vista no encontrada: %s', $view));
        }

        if (!is_file($layoutFile)) {
            throw new RuntimeException(sprintf('Layout no encontrado: %s', $layout));
        }

        extract($data, EXTR_SKIP);

        ob_start();
        require $viewFile;
        $content = (string) ob_get_clean();
        require $layoutFile;
    }
}