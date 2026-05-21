<?php

declare(strict_types=1);

require dirname(__DIR__) . '/bootstrap.php';

$router = new \App\Core\Router();
$router->dispatch();