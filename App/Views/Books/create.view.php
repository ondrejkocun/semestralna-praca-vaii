<?php
/** @var \App\Models\Book $book */
/** @var \Framework\Support\LinkGenerator $link */

$formAction = $link->url('books.create');
$submitLabel = 'Uložiť';
?>

<div class="page-heading">
    <div class="container">
        <h1>Nová kniha</h1>
        <p>Pridajte knihu do komunitnej knižnice</p>
    </div>
</div>

<?php require __DIR__ . DIRECTORY_SEPARATOR . '_form.view.php'; ?>
