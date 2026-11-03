<?php
/** @var \App\Models\Author $author */
/** @var string|null $error */
/** @var \Framework\Support\LinkGenerator $link */
?>

<div class="page-heading">
    <div class="container">
        <h1>Úprava autora</h1>
        <p><?= htmlspecialchars($author->getFullName()) ?></p>
    </div>
</div>

<main class="page-body">
    <div class="container">
        <div class="form-card">
            <?php if ($error !== null) { ?>
                <p class="alert alert-error"><?= htmlspecialchars($error) ?></p>
            <?php } ?>

            <form method="post" action="<?= $link->url('authors.edit', ['id' => $author->id]) ?>">
                <div class="form-group">
                    <label for="first_name">Meno *</label>
                    <input type="text" id="first_name" name="first_name" class="form-control"
                           value="<?= htmlspecialchars($author->first_name) ?>" maxlength="100" required autofocus>
                </div>
                <div class="form-group">
                    <label for="last_name">Priezvisko *</label>
                    <input type="text" id="last_name" name="last_name" class="form-control"
                           value="<?= htmlspecialchars($author->last_name) ?>" maxlength="100" required>
                </div>
                <div class="form-group">
                    <label for="nationality">Národnosť</label>
                    <input type="text" id="nationality" name="nationality" class="form-control"
                           value="<?= htmlspecialchars((string)$author->nationality) ?>" maxlength="100"
                           placeholder="napr. Britská">
                </div>
                <div class="form-actions">
                    <button type="submit" class="btn btn-primary">Uložiť zmeny</button>
                    <a href="<?= $link->url('authors.index') ?>" class="btn btn-ghost">Zrušiť</a>
                </div>
            </form>
        </div>
    </div>
</main>
