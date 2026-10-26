<?php

/** @var string $contentHTML */
/** @var \Framework\Auth\AppUser $user */
/** @var \Framework\Support\LinkGenerator $link */

$currentController = strtolower($_GET['c'] ?? 'home');
$currentAction     = strtolower($_GET['a'] ?? 'index');
?>
<!DOCTYPE html>
<html lang="sk">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= htmlspecialchars(App\Configuration::APP_NAME) ?></title>
    <link rel="apple-touch-icon" sizes="180x180" href="<?= $link->asset('favicons/apple-touch-icon.png') ?>">
    <link rel="icon" type="image/png" sizes="32x32" href="<?= $link->asset('favicons/favicon-32x32.png') ?>">
    <link rel="icon" type="image/png" sizes="16x16" href="<?= $link->asset('favicons/favicon-16x16.png') ?>">
    <link rel="manifest" href="<?= $link->asset('favicons/site.webmanifest') ?>">
    <link rel="shortcut icon" href="<?= $link->asset('favicons/favicon.ico') ?>">
    <link rel="stylesheet" href="<?= $link->asset('css/styl.css') ?>">
</head>
<body>

<header class="site-header">
    <div class="container">
        <div class="header-inner">
            <a href="<?= $link->url('home.index') ?>" class="logo">
                <span class="logo-icon">&#128218;</span>
                BookShare
            </a>
            <nav class="main-nav">
                <ul class="nav-list">
                    <li><a href="<?= $link->url('home.index') ?>"
                           class="nav-link <?= $currentController === 'home' && $currentAction === 'index' ? 'active' : '' ?>">Domov</a></li>
                    <li><a href="<?= $link->url('books.index') ?>"
                           class="nav-link <?= $currentController === 'books' ? 'active' : '' ?>">Knihy</a></li>
                    <li><a href="#" class="nav-link">Moje knihy</a></li>
                    <li><a href="#" class="nav-link">V&#253;po&#382;i&#269;ky</a></li>
                    <li><a href="#" class="nav-link">Autori</a></li>
                    <li><a href="<?= $link->url('home.contact') ?>"
                           class="nav-link <?= $currentController === 'home' && $currentAction === 'contact' ? 'active' : '' ?>">Kontakt</a></li>
                </ul>
                <div class="nav-actions">
                    <?php if ($user->isLoggedIn()) { ?>
                        <span class="nav-username"><?= htmlspecialchars($user->getName()) ?></span>
                        <a href="<?= $link->url('auth.logout') ?>" class="btn btn-outline-light btn-sm">Odhl&#225;si&#357; sa</a>
                    <?php } else { ?>
                        <a href="<?= htmlspecialchars(App\Configuration::LOGIN_URL) ?>" class="btn btn-outline-light btn-sm">Prihl&#225;si&#357; sa</a>
                        <a href="#" class="btn btn-primary btn-sm">Registrova&#357;</a>
                    <?php } ?>
                </div>
            </nav>
        </div>
    </div>
</header>

<?= $contentHTML ?>

<footer class="site-footer">
    <div class="container">
        <div class="footer-grid">
            <div>
                <div class="footer-brand">
                    <span>&#128218;</span> BookShare
                </div>
                <p class="footer-desc">
                    Komunit&#225;rna platforma na zdie&#318;anie kn&#237;h medzi registrovan&#253;mi pou&#382;&#237;vate&#318;mi.
                    Po&#382;i&#269;aj knihu od suseda, objavuj nov&#233; tituly a buduj lok&#225;lnu &#269;itate&#318;sk&#250; komunitu.
                </p>
            </div>
            <div class="footer-section">
                <h4>Navig&#225;cia</h4>
                <ul class="footer-links">
                    <li><a href="<?= $link->url('home.index') ?>">Domov</a></li>
                    <li><a href="<?= $link->url('books.index') ?>">Zoznam kn&#237;h</a></li>
                    <li><a href="#">Autori</a></li>
                    <li><a href="<?= $link->url('home.contact') ?>">Kontakt</a></li>
                </ul>
            </div>
            <div class="footer-section">
                <h4>Inform&#225;cie</h4>
                <ul class="footer-links">
                    <li><a href="#">Ako to funguje</a></li>
                    <li><a href="#">Podmienky pou&#382;itia</a></li>
                    <li><a href="#">Ochrana s&#250;kromia</a></li>
                    <li><a href="<?= $link->url('home.contact') ?>">Kontaktujte n&#225;s</a></li>
                </ul>
            </div>
        </div>
        <div class="footer-bottom">
            &copy; <?= date('Y') ?> BookShare &ndash; semestri&#225;lna pr&#225;ca VAII
        </div>
    </div>
</footer>

</body>
</html>
