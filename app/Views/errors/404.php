<?php

$headline = htmlspecialchars((string) ($headline ?? 'Página no encontrada'), ENT_QUOTES, 'UTF-8');
$message = htmlspecialchars((string) ($message ?? 'La ruta solicitada no existe.'), ENT_QUOTES, 'UTF-8');

?>
<section class="hero-panel p-4 p-md-5 shadow-lg">
    <div class="row justify-content-center">
        <div class="col-lg-8 text-center">
            <span class="badge rounded-pill text-bg-danger mb-3">404</span>
            <h1 class="display-6 fw-bold mb-3"><?= $headline ?></h1>
            <p class="lead text-white-50 mb-4"><?= $message ?></p>
            <a class="btn btn-light btn-lg px-4" href="/">Volver al inicio</a>
        </div>
    </div>
</section>