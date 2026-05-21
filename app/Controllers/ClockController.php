<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Core\Config;
use App\Core\Controller;
use App\Models\ClockModel;
use DateTimeImmutable;
use DateTimeZone;

/**
 * Controlador principal del reloj digital.
 *
 * Su responsabilidad es preparar la información que consumirá la vista
 * principal y mantener la lógica de presentación fuera de la capa visual.
 */
final class ClockController extends Controller
{
    /**
     * Muestra la pantalla principal del reloj digital.
     */
    public function index(): void
    {
        $clockModel = new ClockModel();
        $currentDateTime = $this->currentDateTime();

        $this->render('clock/index', [
            'pageTitle' => (string) Config::get('app.name', 'Reloj Digital'),
            'brandName' => (string) Config::get('app.name', 'Reloj Digital'),
            'subtitle' => (string) Config::get('app.subtitle', ''),
            'clockData' => $clockModel->present($currentDateTime),
        ]);
    }

    /**
     * Construye la fecha y la hora actual usando la zona horaria configurada.
     */
    private function currentDateTime(): DateTimeImmutable
    {
        $timezone = new DateTimeZone((string) Config::get('app.timezone', 'UTC'));

        return new DateTimeImmutable('now', $timezone);
    }
}