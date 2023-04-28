<div class="div-form">
    <p>Создание студента</p>
    <h3><?= $message ?? ''; ?></h3>
    <form action="" method="post">
        <label for="surname"><input type="text" name="surname" placeholder="Фамилия"></label>
        <label for="name"><input type="text" name="name" placeholder="Имя"></label>
        <label for="patronymic"><input type="text" name="patronymic" placeholder="Отчество"></label>
        <label for="gender"><input type="text" name="gender" placeholder="Пол"></label>
        <label for="date_birth"><input type="date" name="date_birth"></label>
        <label for="group_student">
            <select id="group_student" name="group_student">
                <?php foreach ($groups as $group) { ?>
                    <option value="<?= $group->id ?>"><?= $group->number ?></option>
                <?php } ?>
            </select>
        </label>
        <button>Создать</button>
    </form>
</div>