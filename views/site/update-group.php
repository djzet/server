<div class="div-form">
    <p>Редактирование студента</p>
    <h3><?= $message ?? ''; ?></h3>
    <form action="" method="post">
        <label for="surname"><input type="text" name="number" placeholder="Номер группы" value="<?= $groups['number']?>"></label>
        <label for="name"><input type="text" name="course" placeholder="Курс" value="<?= $groups['course']?>"></label>
        <button>Редактировать</button>
    </form>
</div>