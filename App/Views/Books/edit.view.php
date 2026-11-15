<?php
/** @var \App\Models\Book $book */
/** @var \Framework\Support\LinkGenerator $link */

$formAction = $link->url('books.edit', ['id' => $book->id]);
$submitLabel = 'Uložiť zmeny';
?>

<div class="page-heading">
    <div class="container">
        <h1>Úprava knihy</h1>
        <p><?= htmlspecialchars($book->title) ?></p>
    </div>
</div>

<?php require __DIR__ . DIRECTORY_SEPARATOR . '_form.view.php'; ?>
