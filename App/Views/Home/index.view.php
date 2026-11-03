<?php
/** @var \Framework\Support\LinkGenerator $link */
?>

<div class="page-heading">
    <div class="container">
        <h1>Vitajte v BookShare</h1>
        <p>Komunitná knižnica – zdieľajte knihy so susedmi a priateľmi</p>
    </div>
</div>

<main class="page-body">
    <div class="container">

        <section class="hero">
            <h2>Každá kniha si zaslúži ďalšieho čitateľa</h2>
            <p>
                BookShare prepája ľudí, ktorí majú doma knihy, s tými, ktorí si ich chcú požičať.
                Zaregistrujte svoju knižnicu, požičiavajte ostatným a objavujte tituly vo svojom okolí.
            </p>
            <div class="hero-actions">
                <a href="<?= $link->url('books.index') ?>" class="btn btn-primary">Prehliadať knihy</a>
                <a href="<?= $link->url('authors.index') ?>" class="btn btn-ghost">Zoznam autorov</a>
            </div>
        </section>

        <section>
            <p class="section-label">Ako to funguje</p>
            <div class="steps-grid">
                <article class="step-card">
                    <div class="step-number">1</div>
                    <h3>Pridajte svoje knihy</h3>
                    <p>
                        Zaevidujte knihy, ktoré ste ochotní požičať. Doplňte názov, autora, žáner
                        a krátky popis stavu výtlačku.
                    </p>
                </article>
                <article class="step-card">
                    <div class="step-number">2</div>
                    <h3>Nájdite, čo hľadáte</h3>
                    <p>
                        Prehľadávajte zoznam kníh podľa názvu, autora alebo ISBN a filtrujte
                        podľa žánru a dostupnosti.
                    </p>
                </article>
                <article class="step-card">
                    <div class="step-number">3</div>
                    <h3>Požiadajte o výpožičku</h3>
                    <p>
                        Pošlite žiadosť majiteľovi knihy. Po schválení si knihu prevezmete
                        a po prečítaní vrátite späť.
                    </p>
                </article>
            </div>
        </section>

    </div>
</main>
