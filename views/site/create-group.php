<div class="div-form">
    <p>Создание группы</p>
    <h3><?= $message ?? ''; ?></h3>
    <form action="" method="post">
        <input name="csrf_token" type="hidden" value="<?= app()->auth::generateCSRF() ?>"/>
        <label for="number"><input type="text" name="number" placeholder="Номер группы"></label>
        <label for="course"><input type="text" name="course" placeholder="Курс"></label>
        <button>Создать</button>
    </form>
</div>