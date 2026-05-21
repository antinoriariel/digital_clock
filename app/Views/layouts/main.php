<?php

$applicationName = (string) \App\Core\Config::get('app.name', 'Reloj Digital');
$bootstrapCss = (string) \App\Core\Config::get('ui.bootstrap_css', 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css');
$bootstrapJs = (string) \App\Core\Config::get('ui.bootstrap_js', 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js');

?><!doctype html>
<html lang="es" data-bs-theme="dark">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Reloj digital MVC en PHP puro con Bootstrap 5">
    <meta name="theme-color" content="#020617">
    <title><?= htmlspecialchars((string) ($pageTitle ?? $applicationName), ENT_QUOTES, 'UTF-8') ?></title>
    <link href="<?= htmlspecialchars($bootstrapCss, ENT_QUOTES, 'UTF-8') ?>" rel="stylesheet">
    <link href="/assets/css/app.css" rel="stylesheet">
</head>
<body class="app-body">
    <header class="pt-4">
        <div class="container">
            <nav class="navbar navbar-blur px-3 px-md-4 py-3">
                <div>
                    <div class="small text-uppercase text-info fw-semibold letter-space-md mb-1">MVC en PHP puro</div>
                    <span class="navbar-brand mb-0 h1 text-white"><?= htmlspecialchars($applicationName, ENT_QUOTES, 'UTF-8') ?></span>
                </div>
                <span class="badge rounded-pill text-bg-success glow-pill">Bootstrap 5</span>
            </nav>
        </div>
    </header>

    <main class="app-shell">
        <div class="container py-4">
            <?= $content ?>
        </div>
    </main>

    <footer class="pb-4">
        <div class="container">
            <div class="text-center text-white-50 small">
                <?= htmlspecialchars((string) \App\Core\Config::get('app.subtitle', ''), ENT_QUOTES, 'UTF-8') ?>
            </div>
        </div>
    </footer>

    <script src="<?= htmlspecialchars($bootstrapJs, ENT_QUOTES, 'UTF-8') ?>"></script>
    <script src="/assets/js/clock.js"></script>
</body>
</html>