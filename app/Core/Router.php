<?php

declare(strict_types=1);

namespace App\Core;

use App\Controllers\ErrorController;

final class Router
{
    /**
     * Resuelve la ruta solicitada y ejecuta la acción correspondiente.
     */
    public function dispatch(): void
    {
        $controllerName = $this->resolveControllerName();
        $actionName = $this->resolveActionName();
        $controllerClass = 'App\\Controllers\\' . $controllerName;

        if (!class_exists($controllerClass)) {
            $this->renderNotFound();
            return;
        }

        $controller = new $controllerClass();

        if (!is_callable([$controller, $actionName])) {
            $this->renderNotFound();
            return;
        }

        $controller->{$actionName}();
    }

    private function resolveControllerName(): string
    {
        $controller = (string) ($_GET['controller'] ?? 'clock');
        $controller = preg_replace('/[^a-z0-9_]/i', '', $controller) ?: 'clock';

        return ucfirst(strtolower($controller)) . 'Controller';
    }

    private function resolveActionName(): string
    {
        $action = (string) ($_GET['action'] ?? 'index');
        $action = preg_replace('/[^a-z0-9_]/i', '', $action) ?: 'index';

        return $action;
    }

    private function renderNotFound(): void
    {
        $controller = new ErrorController();
        $controller->notFound();
    }
}