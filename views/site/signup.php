<div class="div-form">
    <p>Регистрация нового пользователя</p>
    <h3><?= $message ?? ''; ?></h3>
    <form action="" method="post">
        <label for="login"><input type="text" name="login" placeholder="Логин"></label>
        <label for="password"><input type="password" name="password" placeholder="Пароль"></label>
        <label for="role">
            <select id="role" name="role">
                <option value="1">Администратор</option>
                <option value="2">Пользователь</option>
            </select>
        </label>
        <button>Зарегистрировать</button>
    </form>
</div>
