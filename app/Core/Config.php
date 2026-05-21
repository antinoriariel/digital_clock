<?php

declare(strict_types=1);

namespace App\Core;

/**
 * Contenedor de configuración de la aplicación.
 *
 * Permite centralizar los valores globales para que controladores, modelos y
 * vistas accedan a ellos sin duplicar constantes o arrays dispersos.
 */
final class Config
{
    private static array $items = [];

    /**
     * Carga la configuración completa en memoria.
     */
    public static function load(array $items): void
    {
        self::$items = $items;
    }

    /**
     * Devuelve un valor usando notación con puntos para claves anidadas.
     */
    public static function get(string $key, mixed $default = null): mixed
    {
        $value = self::$items;

        foreach (explode('.', $key) as $segment) {
            if (!is_array($value) || !array_key_exists($segment, $value)) {
                return $default;
            }

            $value = $value[$segment];
        }

        return $value;
    }
}