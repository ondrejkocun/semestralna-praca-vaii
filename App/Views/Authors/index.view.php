<?php
/** @var \App\Models\Author[] $authors */
/** @var \Framework\Support\LinkGenerator $link */
?>

<div class="page-heading">
    <div class="container">
        <div class="page-heading-inner">
            <div>
                <h1>Autori</h1>
                <p>Evidencia autorov kníh v komunite</p>
            </div>
            <a href="<?= $link->url('authors.create') ?>" class="btn btn-primary">+ Pridať autora</a>
        </div>
    </div>
</div>

<main class="page-body">
    <div class="container">
        <?php if (empty($authors)) { ?>
            <div class="placeholder-block">
                <p>Zatiaľ nie je evidovaný žiadny autor.</p>
            </div>
        <?php } else { ?>
            <table class="data-table">
                <thead>
                <tr>
                    <th>Meno</th>
                    <th>Priezvisko</th>
                    <th>Národnosť</th>
                    <th class="col-actions">Akcie</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($authors as $author) { ?>
                    <tr>
                        <td data-label="Meno"><?= htmlspecialchars($author->first_name) ?></td>
                        <td data-label="Priezvisko"><?= htmlspecialchars($author->last_name) ?></td>
                        <td data-label="Národnosť"><?= $author->nationality !== null
                                ? htmlspecialchars($author->nationality)
                                : '<span class="text-muted">neuvedená</span>' ?></td>
                        <td class="col-actions" data-label="Akcie">
                            <div class="table-actions">
                                <a href="<?= $link->url('authors.edit', ['id' => $author->id]) ?>"
                                   class="btn btn-ghost btn-sm">Upraviť</a>
                                <form method="post" action="<?= $link->url('authors.delete') ?>"
                                      onsubmit="return confirm('Naozaj odstrániť autora <?= htmlspecialchars($author->getFullName()) ?>?');">
                                    <input type="hidden" name="id" value="<?= $author->id ?>">
                                    <button type="submit" class="btn btn-accent btn-sm">Odstrániť</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                <?php } ?>
                </tbody>
            </table>
            <p class="table-summary">Celkom autorov: <strong><?= count($authors) ?></strong></p>
        <?php } ?>
    </div>
</main>
