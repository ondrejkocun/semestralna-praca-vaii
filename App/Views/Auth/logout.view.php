<?php

/** @var \Framework\Support\LinkGenerator $link */
/** @var \Framework\Support\View $view */

$view->setLayout('auth');
?>

<div class="auth-card">
    <div class="auth-logo">
        <span>&#128218;</span> BookShare
    </div>
    <h2 class="auth-title">Odhlásenie</h2>
    <p style="text-align:center;color:var(--muted);margin-bottom:24px;">Boli ste úspešne odhlásení.</p>
    <a href="<?= htmlspecialchars(App\Configuration::LOGIN_URL) ?>" class="btn btn-primary btn-block">Prihlásiť sa znova</a>
    <p class="auth-footer">
        <a href="<?= $link->url('home.index') ?>">&#8592; Domovská stránka</a>
    </p>
</div>
