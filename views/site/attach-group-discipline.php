<div class="div-form">
    <p>Прикепить к группе <?= $groups['number'] ?> дисциплину <?= $disciplines['title'] ?></p>
    <h3><?= $message ?? ''; ?></h3>
    <form action="" method="post">
        <input name="csrf_token" type="hidden" value="<?= app()->auth::generateCSRF() ?>"/>
        <label for="id_group"><input type="text" name="id_group" placeholder="<?= $groups['number'] ?>"
                                     value="<?= $groups['id'] ?>" hidden=""></label>
        <label for="id_discipline"><input type="text" name="id_discipline" placeholder="<?= $disciplines['title'] ?>"
                                          value="<?= $disciplines['id'] ?>" hidden=""></label>
        <button>Прикрепить</button>
    </form>
</div>