<?php

/** @var string|null $message */
/** @var \Framework\Support\LinkGenerator $link */
/** @var \Framework\Support\View $view */

$view->setLayout('auth');
?>

<div class="auth-card">
    <div class="auth-logo">
        <span>&#128218;</span> BookShare
    </div>
    <h2 class="auth-title">Prihlásenie</h2>

    <?php if (!empty($message)) { ?>
        <p class="auth-error"><?= htmlspecialchars($message) ?></p>
    <?php } ?>

    <form method="post" action="<?= $link->url('auth.login') ?>">
        <div class="form-group">
            <label for="username">Používateľské meno</label>
            <input type="text" id="username" name="username" class="form-control"
                   placeholder="Zadajte meno" required autofocus>
        </div>
        <div class="form-group">
            <label for="password">Heslo</label>
            <input type="password" id="password" name="password" class="form-control"
                   placeholder="Zadajte heslo" required>
        </div>
        <button type="submit" name="submit" class="btn btn-primary btn-block">Prihlásiť sa</button>
    </form>

    <p class="auth-footer">
        <a href="<?= $link->url('home.index') ?>">&#8592; Späť na domovskú stránku</a>
    </p>
</div>
