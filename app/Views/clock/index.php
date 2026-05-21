<?php

$clockTime = htmlspecialchars((string) ($clockData['time'] ?? '00:00:00'), ENT_QUOTES, 'UTF-8');
$clockDate = htmlspecialchars((string) ($clockData['date'] ?? ''), ENT_QUOTES, 'UTF-8');
$clockTimezone = htmlspecialchars((string) ($clockData['timezone'] ?? 'UTC'), ENT_QUOTES, 'UTF-8');
$clockIso = htmlspecialchars((string) ($clockData['iso'] ?? ''), ENT_QUOTES, 'UTF-8');
$brandName = htmlspecialchars((string) ($brandName ?? 'Reloj Digital'), ENT_QUOTES, 'UTF-8');
$subtitle = htmlspecialchars((string) ($subtitle ?? ''), ENT_QUOTES, 'UTF-8');

?>
<section class="hero-panel p-4 p-md-5 shadow-lg" data-clock data-clock-iso="<?= $clockIso ?>">
    <div class="row align-items-center g-4">
        <div class="col-lg-7">
            <div class="d-flex flex-wrap gap-2 mb-3">
                <span class="badge rounded-pill text-bg-primary">PHP puro</span>
                <span class="badge rounded-pill text-bg-dark border border-secondary">MVC</span>
                <span class="badge rounded-pill text-bg-success">Sin base de datos</span>
            </div>

            <p class="text-uppercase small fw-semibold text-info letter-space-md mb-2">Reloj digital en tiempo real</p>
            <h1 class="display-5 fw-bold mb-3"><?= $brandName ?></h1>
            <p class="lead text-white-50 mb-4"><?= $subtitle ?></p>

            <div class="clock-face" aria-label="Reloj digital principal" data-clock-timezone-id="<?= $clockTimezone ?>">
                <div class="clock-time" data-clock-time aria-live="polite"><?= $clockTime ?></div>
                <div class="clock-date mt-3" data-clock-date><?= $clockDate ?></div>
                <div class="clock-meta mt-3">
                    <span>Zona horaria: <strong data-clock-timezone><?= $clockTimezone ?></strong></span>
                    <span>Actualización automática cada segundo</span>
                </div>
            </div>
        </div>

        <div class="col-lg-5">
            <div class="info-panel h-100">
                <h2 class="h5 fw-bold mb-3">Resumen de la implementación</h2>
                <ul class="feature-list list-unstyled mb-0">
                    <li>Front visual construido con Bootstrap 5.</li>
                    <li>Estructura MVC con controlador, modelo y vistas.</li>
                    <li>Hora inicial generada en PHP y sincronizada en el navegador.</li>
                    <li>Proyecto sin framework backend ni base de datos.</li>
                    <li>Diseñado para ser ligero, claro y fácil de extender.</li>
                </ul>
            </div>
        </div>
    </div>
</section>