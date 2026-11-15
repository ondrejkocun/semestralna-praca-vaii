<?php
/**
 * Spoločný formulár pre pridanie a úpravu knihy.
 * Očakáva premenné: $book, $error, $selectedAuthors, $allAuthors, $genres, $owners,
 *                   $formAction, $submitLabel
 *
 * @var \App\Models\Book $book
 * @var string|null $error
 * @var int[] $selectedAuthors
 * @var \App\Models\Author[] $allAuthors
 * @var \App\Models\Genre[] $genres
 * @var \App\Models\User[] $owners
 * @var string $formAction
 * @var string $submitLabel
 * @var \Framework\Support\LinkGenerator $link
 */
?>

<main class="page-body">
    <div class="container">
        <div class="form-card form-card-wide">
            <?php if ($error !== null) { ?>
                <p class="alert alert-error"><?= htmlspecialchars($error) ?></p>
            <?php } ?>

            <form method="post" action="<?= $formAction ?>">
                <div class="form-group">
                    <label for="title">Názov *</label>
                    <input type="text" id="title" name="title" class="form-control"
                           value="<?= htmlspecialchars($book->title) ?>" maxlength="200" required autofocus>
                </div>

                <div class="form-row">
                    <div class="form-group">
                        <label for="owner_id">Vlastník *</label>
                        <select id="owner_id" name="owner_id" class="form-control" required>
                            <option value="">— vyberte —</option>
                            <?php foreach ($owners as $owner) { ?>
                                <option value="<?= $owner->id ?>"
                                    <?= $book->owner_id === $owner->id ? 'selected' : '' ?>>
                                    <?= htmlspecialchars($owner->name) ?>
                                </option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="genre_id">Žáner</label>
                        <select id="genre_id" name="genre_id" class="form-control">
                            <option value="">— neuvedený —</option>
                            <?php foreach ($genres as $genre) { ?>
                                <option value="<?= $genre->id ?>"
                                    <?= $book->genre_id === $genre->id ? 'selected' : '' ?>>
                                    <?= htmlspecialchars($genre->name) ?>
                                </option>
                            <?php } ?>
                        </select>
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group">
                        <label for="isbn">ISBN</label>
                        <input type="text" id="isbn" name="isbn" class="form-control"
                               value="<?= htmlspecialchars((string)$book->isbn) ?>" maxlength="17"
                               placeholder="napr. 978-80-251-2285-3">
                    </div>
                    <div class="form-group">
                        <label for="year">Rok vydania</label>
                        <input type="number" id="year" name="year" class="form-control"
                               value="<?= $book->year !== null ? (int)$book->year : '' ?>"
                               min="1400" max="2100" placeholder="napr. 2009">
                    </div>
                </div>

                <div class="form-group">
                    <label for="description">Popis</label>
                    <textarea id="description" name="description" class="form-control" rows="3"
                              placeholder="Stav výtlačku, vydanie, poznámky…"><?= htmlspecialchars((string)$book->description) ?></textarea>
                </div>

                <fieldset class="form-group">
                    <legend>Autori</legend>
                    <?php if (empty($allAuthors)) { ?>
                        <p class="text-muted">
                            Zatiaľ nie je evidovaný žiadny autor.
                            <a href="<?= $link->url('authors.create') ?>">Pridajte autora</a>.
                        </p>
                    <?php } else { ?>
                        <div class="checkbox-grid">
                            <?php foreach ($allAuthors as $author) { ?>
                                <label class="checkbox-item">
                                    <input type="checkbox" name="author_ids[]" value="<?= $author->id ?>"
                                        <?= in_array((int)$author->id, $selectedAuthors, true) ? 'checked' : '' ?>>
                                    <span><?= htmlspecialchars($author->getFullName()) ?></span>
                                </label>
                            <?php } ?>
                        </div>
                    <?php } ?>
                </fieldset>

                <div class="form-actions">
                    <button type="submit" class="btn btn-primary"><?= htmlspecialchars($submitLabel) ?></button>
                    <a href="<?= $link->url('books.index') ?>" class="btn btn-ghost">Zrušiť</a>
                </div>
            </form>
        </div>
    </div>
</main>
