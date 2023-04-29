<h3><?= app()->auth->user()->login ?? ''; ?></h3>
<?php
if (!app()->auth::check()):
    ?>
    <div class="div-form">
        <p>Вход</p>
        <h3><?= $message ?? ''; ?></h3>
        <form action="" method="post">
            <input name="csrf_token" type="hidden" value="<?= app()->auth::generateCSRF() ?>"/>
            <label><input type="text" name="login" placeholder="Логин"></label>
            <label><input type="password" name="password" placeholder="Пароль"></label>
            <button>Войти</button>
        </form>
    </div>
<?php endif;
