<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Core\Config;
use App\Core\Controller;

/**
 * Controlador de errores de la aplicación.
 *
 * Mantiene una respuesta visual consistente cuando la ruta o la acción
 * solicitada no existen dentro del enrutador MVC.
 */
final class ErrorController extends Controller
{
    /**
     * Renderiza la pantalla 404.
     */
    public function notFound(): void
    {
        $this->render('errors/404', [
            'pageTitle' => '404 - Página no encontrada',
            'brandName' => (string) Config::get('app.name', 'Reloj Digital'),
            'headline' => 'Ruta no encontrada',
            'message' => 'La dirección solicitada no existe o ya no está disponible.',
        ], 'layouts/main', 404);
    }
}