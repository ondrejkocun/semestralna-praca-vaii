<?php
/** @var \Framework\Auth\AppUser $user */
/** @var \Framework\Support\LinkGenerator $link */
?>

<div class="page-heading">
    <div class="container">
        <div class="page-heading-inner">
            <div>
                <h1>Dostupné knihy</h1>
                <p>Prehľad všetkých kníh zaregistrovaných v komunite</p>
            </div>
            <?php if ($user->isLoggedIn()) { ?>
                <a href="#" class="btn btn-primary">+ Pridať knihu</a>
            <?php } ?>
        </div>
    </div>
</div>

<div class="filter-bar">
    <div class="container">
        <div class="filter-bar-inner">
            <input type="search" placeholder="Vyhľadávanie: názov, autor, ISBN…">
            <select>
                <option value="">Žáner</option>
                <option>Informatika</option>
                <option>Beletria</option>
                <option>Sci-fi a fantasy</option>
                <option>Ekonómia</option>
                <option>Matematika</option>
            </select>
            <select>
                <option value="">Dostupnosť</option>
                <option>Dostupná</option>
                <option>Požičaná</option>
            </select>
            <button class="btn btn-primary">Filtrovať</button>
            <button class="btn btn-ghost">Reset</button>
        </div>
    </div>
</div>

<main class="page-body">
    <div class="container">

        <p class="section-label">Karty kníh</p>

        <div class="books-grid">

            <article class="book-card">
                <div class="book-card-top">
                    <div class="book-cover cover-info">&#128187;</div>
                    <div class="book-meta">
                        <div class="book-title">Čistý kód</div>
                        <div class="book-author">Robert C. Martin</div>
                        <span class="badge badge-available">Dostupná</span>
                    </div>
                </div>
                <div class="book-details">
                    <div class="book-detail-row">ISBN: 978-80-251-2285-3 &middot; 2009</div>
                    <div class="book-detail-row">Vlastník: Jana Nováková &middot; Žáner: Informatika</div>
                    <div class="book-desc">Príručka agilného softvérového remesla. Mierne opotrebovaná väzba.</div>
                </div>
                <div class="book-actions">
                    <a href="#" class="btn btn-ghost btn-sm">Detail</a>
                    <a href="#" class="btn btn-primary btn-sm">Požiadať</a>
                </div>
            </article>

            <article class="book-card">
                <div class="book-card-top">
                    <div class="book-cover cover-info">&#128187;</div>
                    <div class="book-meta">
                        <div class="book-title">Design Patterns</div>
                        <div class="book-author">Gamma, Helm, Johnson, Vlissides</div>
                        <span class="badge badge-borrowed">Požičaná</span>
                    </div>
                </div>
                <div class="book-details">
                    <div class="book-detail-row">ISBN: 978-0-201-63361-0 &middot; 1994</div>
                    <div class="book-detail-row">Vlastník: Jana Nováková &middot; Žáner: Informatika</div>
                    <div class="book-desc">Klasická kniha o návrhových vzoroch v objektovom programovaní.</div>
                </div>
                <div class="book-actions">
                    <a href="#" class="btn btn-ghost btn-sm">Detail</a>
                    <button class="btn btn-ghost btn-sm" disabled style="opacity:0.4;cursor:not-allowed;">Požičaná</button>
                </div>
            </article>

            <article class="book-card">
                <div class="book-card-top">
                    <div class="book-cover cover-fiction">&#128218;</div>
                    <div class="book-meta">
                        <div class="book-title">1984</div>
                        <div class="book-author">George Orwell</div>
                        <span class="badge badge-available">Dostupná</span>
                    </div>
                </div>
                <div class="book-details">
                    <div class="book-detail-row">ISBN: 978-80-8061-791-2 &middot; 2015</div>
                    <div class="book-detail-row">Vlastník: Peter Horváth &middot; Žáner: Beletria</div>
                    <div class="book-desc">Dystopický román, slovenský preklad.</div>
                </div>
                <div class="book-actions">
                    <a href="#" class="btn btn-ghost btn-sm">Detail</a>
                    <a href="#" class="btn btn-primary btn-sm">Požiadať</a>
                </div>
            </article>

            <article class="book-card">
                <div class="book-card-top">
                    <div class="book-cover cover-scifi">&#128302;</div>
                    <div class="book-meta">
                        <div class="book-title">Hobit</div>
                        <div class="book-author">J. R. R. Tolkien</div>
                        <span class="badge badge-pending">Žiadosť čaká</span>
                    </div>
                </div>
                <div class="book-details">
                    <div class="book-detail-row">ISBN: 978-80-556-0147-2 &middot; 2012</div>
                    <div class="book-detail-row">Vlastník: Peter Horváth &middot; Žáner: Sci-fi a fantasy</div>
                    <div class="book-desc">Ilustrované vydanie, vo veľmi dobrom stave.</div>
                </div>
                <div class="book-actions">
                    <a href="#" class="btn btn-ghost btn-sm">Detail</a>
                    <button class="btn btn-ghost btn-sm" disabled style="opacity:0.4;cursor:not-allowed;">Čaká sa</button>
                </div>
            </article>

            <article class="book-card">
                <div class="book-card-top">
                    <div class="book-cover cover-info">&#128187;</div>
                    <div class="book-meta">
                        <div class="book-title">Introduction to Algorithms</div>
                        <div class="book-author">Thomas H. Cormen</div>
                        <span class="badge badge-available">Dostupná</span>
                    </div>
                </div>
                <div class="book-details">
                    <div class="book-detail-row">ISBN: 978-0-262-03384-8 &middot; 2009</div>
                    <div class="book-detail-row">Vlastník: Peter Horváth &middot; Žáner: Informatika</div>
                    <div class="book-desc">Tretie vydanie, v angličtine.</div>
                </div>
                <div class="book-actions">
                    <a href="#" class="btn btn-ghost btn-sm">Detail</a>
                    <a href="#" class="btn btn-primary btn-sm">Požiadať</a>
                </div>
            </article>

            <article class="book-card">
                <div class="book-card-top">
                    <div class="book-cover cover-economy">&#128202;</div>
                    <div class="book-meta">
                        <div class="book-title">Myslenie rýchle a pomalé</div>
                        <div class="book-author">Daniel Kahneman</div>
                        <span class="badge badge-available">Dostupná</span>
                    </div>
                </div>
                <div class="book-details">
                    <div class="book-detail-row">ISBN: 978-80-551-3526-0 &middot; 2013</div>
                    <div class="book-detail-row">Vlastník: Správca &middot; Žáner: Ekonómia</div>
                    <div class="book-desc">O tom, ako sa rozhodujeme.</div>
                </div>
                <div class="book-actions">
                    <a href="#" class="btn btn-ghost btn-sm">Detail</a>
                    <a href="#" class="btn btn-primary btn-sm">Požiadať</a>
                </div>
            </article>

            <article class="book-card">
                <div class="book-card-top">
                    <div class="book-cover cover-scifi">&#128302;</div>
                    <div class="book-meta">
                        <div class="book-title">Spoločenstvo prsteňa</div>
                        <div class="book-author">J. R. R. Tolkien</div>
                        <span class="badge badge-available">Dostupná</span>
                    </div>
                </div>
                <div class="book-details">
                    <div class="book-detail-row">ISBN: 978-80-556-0145-8 &middot; 2012</div>
                    <div class="book-detail-row">Vlastník: Jana Nováková &middot; Žáner: Sci-fi a fantasy</div>
                    <div class="book-desc">Prvý diel trilógie Pán prsteňov.</div>
                </div>
                <div class="book-actions">
                    <a href="#" class="btn btn-ghost btn-sm">Detail</a>
                    <a href="#" class="btn btn-primary btn-sm">Požiadať</a>
                </div>
            </article>

        </div>

        <div class="info-panel">
            <h3>Panel používateľa – moje aktivity</h3>
            <div class="panel-grid">
                <div class="panel-row">
                    <span class="panel-label">Aktívne žiadosti</span>
                    <span class="panel-value">1 (Hobit – čaká na schválenie)</span>
                </div>
                <div class="panel-row">
                    <span class="panel-label">Aktuálne výpožičky</span>
                    <span class="panel-value">0</span>
                </div>
                <div class="panel-row">
                    <span class="panel-label">Vrátené knihy celkom</span>
                    <span class="panel-value">1</span>
                </div>
                <div class="panel-row">
                    <span class="panel-label">Moje knihy v zdieľaní</span>
                    <span class="panel-value">3</span>
                </div>
            </div>
            <p class="admin-note">
                <strong>Správca navyše vidí akcie:</strong>
                upraviť knihu, odstrániť knihu, spravovať autorov a žánre.
            </p>
        </div>

    </div>
</main>
