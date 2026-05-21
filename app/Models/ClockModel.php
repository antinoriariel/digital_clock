<?php

declare(strict_types=1);

namespace App\Models;

use DateTimeInterface;

final class ClockModel
{
    private const DAYS = [
        1 => 'Lunes',
        2 => 'Martes',
        3 => 'Miércoles',
        4 => 'Jueves',
        5 => 'Viernes',
        6 => 'Sábado',
        7 => 'Domingo',
    ];

    private const MONTHS = [
        1 => 'enero',
        2 => 'febrero',
        3 => 'marzo',
        4 => 'abril',
        5 => 'mayo',
        6 => 'junio',
        7 => 'julio',
        8 => 'agosto',
        9 => 'septiembre',
        10 => 'octubre',
        11 => 'noviembre',
        12 => 'diciembre',
    ];

    /**
     * Convierte un DateTime en los datos listos para la interfaz.
     */
    public function present(DateTimeInterface $dateTime): array
    {
        $dayNumber = (int) $dateTime->format('N');
        $monthNumber = (int) $dateTime->format('n');

        return [
            'iso' => $dateTime->format(DATE_ATOM),
            'time' => $dateTime->format('H:i:s'),
            'date' => sprintf(
                '%s, %d de %s de %s',
                self::DAYS[$dayNumber] ?? 'Día',
                (int) $dateTime->format('j'),
                self::MONTHS[$monthNumber] ?? 'mes',
                $dateTime->format('Y')
            ),
            'timezone' => $dateTime->getTimezone()->getName(),
            'shortDate' => $dateTime->format('d/m/Y'),
        ];
    }
}