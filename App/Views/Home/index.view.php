<?php
/** @var \Framework\Support\LinkGenerator $link */
?>

<div class="page-heading">
    <div class="container">
        <h1>Vítajte v BookShare</h1>
        <p>Komunitná knižnica – zdieľajte knihy so susedmi a priateľmi</p>
    </div>
</div>

<div class="filter-bar">
    <div class="container">
        <div class="filter-bar-inner">
            <input type="search" placeholder="Hľadaj knihu podľa názvu alebo autora…">
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
        <div class="placeholder-block">
            <p>Placeholder obsahu vybranej stránky</p>
        </div>
    </div>
</main>
