<?php
/** @var \App\Models\Book[] $books */
/** @var array<int, \App\Models\Genre> $genres */
/** @var array<int, \App\Models\User> $owners */
/** @var array<int, string[]> $authorsByBook */
/** @var int[] $borrowedIds */
/** @var \Framework\Support\LinkGenerator $link */

$cover = static function (?string $genreName): array {
    return match ($genreName) {
        'Informatika' => ['cover-info', '&#128187;'],
        'Beletria' => ['cover-fiction', '&#128218;'],
        'Sci-fi a fantasy' => ['cover-scifi', '&#128302;'],
        'Ekonómia' => ['cover-economy', '&#128202;'],
        'Matematika' => ['cover-math', '&#128208;'],
        default => ['cover-info', '&#128214;'],
    };
};
?>

<div class="page-heading">
    <div class="container">
        <div class="page-heading-inner">
            <div>
                <h1>Knihy</h1>
                <p>Prehľad všetkých kníh zaregistrovaných v komunite</p>
            </div>
            <a href="<?= $link->url('books.create') ?>" class="btn btn-primary">+ Pridať knihu</a>
        </div>
    </div>
</div>

<main class="page-body">
    <div class="container">
        <?php if (empty($books)) { ?>
            <div class="placeholder-block">
                <p>Zatiaľ nie je evidovaná žiadna kniha.</p>
            </div>
        <?php } else { ?>
            <div class="books-grid">
                <?php foreach ($books as $book) {
                    $genreName = isset($genres[$book->genre_id]) ? $genres[$book->genre_id]->name : null;
                    [$coverClass, $coverIcon] = $cover($genreName);
                    $bookAuthors = $authorsByBook[$book->id] ?? [];
                    $isBorrowed = in_array($book->id, $borrowedIds, true);
                    ?>
                    <article class="book-card">
                        <div class="book-card-top">
                            <div class="book-cover <?= $coverClass ?>"><?= $coverIcon ?></div>
                            <div class="book-meta">
                                <div class="book-title"><?= htmlspecialchars($book->title) ?></div>
                                <div class="book-author">
                                    <?= $bookAuthors !== []
                                        ? htmlspecialchars(implode(', ', $bookAuthors))
                                        : '<span class="text-muted">bez autora</span>' ?>
                                </div>
                                <span class="badge <?= $isBorrowed ? 'badge-borrowed' : 'badge-available' ?>">
                                    <?= $isBorrowed ? 'Požičaná' : 'Dostupná' ?>
                                </span>
                            </div>
                        </div>
                        <div class="book-details">
                            <div class="book-detail-row">
                                <?= $book->isbn !== null ? 'ISBN: ' . htmlspecialchars($book->isbn) : 'ISBN neuvedené' ?>
                                <?= $book->year !== null ? ' &middot; ' . (int)$book->year : '' ?>
                            </div>
                            <div class="book-detail-row">
                                Vlastník:
                                <?= isset($owners[$book->owner_id])
                                    ? htmlspecialchars($owners[$book->owner_id]->name)
                                    : 'neznámy' ?>
                                &middot; Žáner:
                                <?= $genreName !== null ? htmlspecialchars($genreName) : 'neuvedený' ?>
                            </div>
                            <?php if ($book->description !== null) { ?>
                                <div class="book-desc"><?= htmlspecialchars($book->description) ?></div>
                            <?php } ?>
                        </div>
                        <div class="book-actions">
                            <a href="<?= $link->url('books.edit', ['id' => $book->id]) ?>"
                               class="btn btn-ghost btn-sm">Upraviť</a>
                            <form method="post" action="<?= $link->url('books.delete') ?>"
                                  onsubmit="return confirm('Naozaj odstrániť knihu <?= htmlspecialchars($book->title) ?>?');">
                                <input type="hidden" name="id" value="<?= $book->id ?>">
                                <button type="submit" class="btn btn-accent btn-sm">Odstrániť</button>
                            </form>
                        </div>
                    </article>
                <?php } ?>
            </div>
            <p class="table-summary">Celkom kníh: <strong><?= count($books) ?></strong></p>
        <?php } ?>
    </div>
</main>
