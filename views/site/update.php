<div class="div-form">
    <p>Редактирование пользователя</p>
    <h3><?= $message ?? ''; ?></h3>
    <form action="" method="post" enctype="multipart/form-data">
        <input name="csrf_token" type="hidden" value="<?= app()->auth::generateCSRF() ?>"/>
        <label for="login"><input type="text" name="login" placeholder="Логин" value="<?= $users['login'] ?>"></label>
        <label for="group_student">
            <select id="group_student" name="role">
                <?php foreach ($roles as $role) { ?>
                    <option
                            value="<?= $role->id ?>"
                        <?= ($users['role'] === $role->id) ? 'selected' : '' ?>
                    ><?= $role->title ?></option>
                <?php } ?>
            </select>
        </label>
        <label for="img"><input type="file" name="img" value=""></label>
        <button>Редактировать</button>
    </form>
</div>