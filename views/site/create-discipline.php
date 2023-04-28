<div class="div-form">
    <p>Создать дисциплину</p>
    <h3><?= $message ?? ''; ?></h3>
    <form action="" method="post">
        <label for="title"><input type="text" name="title" placeholder="Название" value="<?= $disciplines['title'] ?>"></label>
        <label for="semester"><input type="text" name="semester" placeholder="Семестр"
                                     value="<?= $disciplines['semester'] ?>"></label>
        <label for="hours"><input type="text" name="hours" placeholder="Часы"
                                  value="<?= $disciplines['hours'] ?>"></label>
        <label for="control">
            <select id="control" name="control">
                <?php foreach ($controls as $control) { ?>
                    <option value="<?= $control->id ?>"><?= $control->title ?></option>
                <?php } ?>
            </select>
        </label>
        <button>Создать</button>
    </form>
</div>