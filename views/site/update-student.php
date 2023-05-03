<div class="div-form">
    <p>Редактирование студента</p>
    <h3><?= $message ?? ''; ?></h3>
    <form action="" method="post">
        <input name="csrf_token" type="hidden" value="<?= app()->auth::generateCSRF() ?>"/>
        <label for="surname"><input type="text" name="surname" placeholder="Фамилия"
                                    value="<?= $students['surname'] ?>"></label>
        <label for="name"><input type="text" name="name" placeholder="Имя" value="<?= $students['name'] ?>"></label>
        <label for="patronymic"><input type="text" name="patronymic" placeholder="Отчество"
                                       value="<?= $students['patronymic'] ?>"></label>
        <label for="gender"><input type="text" name="gender" placeholder="Пол"
                                   value="<?= $students['gender'] ?>"></label>
        <label for="date_birth"><input type="date" name="date_birth" value="<?= $students['date_birth'] ?>"></label>
        <label for="group_student">
            <select id="group_student" name="group_student">
                <?php foreach ($groups as $group) { ?>
                    <option
                            value="<?= $group->id ?>"
                        <?= ($students['group_student'] === $group->id) ? 'selected' : '' ?>
                    ><?= $group->number ?></option>
                <?php } ?>
            </select>
        </label>
        <button>Редактировать</button>
    </form>
</div>