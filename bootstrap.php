<?php

declare(strict_types=1);

use App\Core\Config;

define('BASE_PATH', __DIR__);
define('APP_PATH', BASE_PATH . '/app');
define('CONFIG_PATH', BASE_PATH . '/config');

spl_autoload_register(static function (string $class): void {
    $prefix = 'App\\';
    $prefixLength = strlen($prefix);

    if (strncmp($class, $prefix, $prefixLength) !== 0) {
        return;
    }

    $relativeClass = substr($class, $prefixLength);
    $filePath = APP_PATH . '/' . str_replace('\\', '/', $relativeClass) . '.php';

    if (is_file($filePath)) {
        require $filePath;
    }
});

Config::load(require CONFIG_PATH . '/app.php');

date_default_timezone_set((string) Config::get('app.timezone', 'UTC'));