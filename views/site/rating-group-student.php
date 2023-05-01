<div class="div-form">
    <p>Выставить оценку <?= $students['surname'] . ' ' . $students['name'] ?></p>
    <h3><?= $message ?? ''; ?></h3>
    <form action="" method="post">
        <input name="csrf_token" type="hidden" value="<?= app()->auth::generateCSRF() ?>"/>
        <lable for="id_discipline">
            <select id="id_discipline" name="id_discipline">
                <?php foreach ($group_disciplines as $group_discipline) { ?>
                    <option
                            value="<?= $group_discipline->id_discipline ?>"
                    ><?= $group_discipline->groupDisciplines->title ?></option>
                <?php } ?>
            </select>
        </lable>
        <label for="rating"><input type="number" name="rating" placeholder="Оценка"></label>
        <label for="id_student"><input type="text" name="id_student"
                                       value="<?= $rating_disciplines['id_student'] = $students['id'] ?>"
                                       placeholder="<?= $students['surname'] . ' ' . $students['name'] ?>"
                                       hidden></label>
        <button>Выствить</button>
    </form>
</div>