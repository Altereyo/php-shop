<h2>Вход</h2>

<form action="" method="post" class="signForm">
    <input type="checkbox" name="signin" hidden checked>
    <label for="user_name">Имя пользователя</label>
    <input type="text" name="user_name">
    <br>
    <label for="user_pass">Пароль</label>
    <input type="password" name="user_pass">
    <p id="hint">Чтобы увидеть страницу с оформленными заказами, зайдите как admin с паролем 123</p>
    <br>
    <label>
        <input type="checkbox" name="remember_user">
        <span>Запомнить меня</span>
    </label>
    <br>
    <?php if($error): ?>
        <p class="log_error">
            <?php if($error == 'no_such_login'): ?>
                Пользователя с данным логином не существует
            <?php endif; ?>
            <?php if($error == 'empty_login'): ?>
                Введите логин
            <?php endif; ?>
            <?php if($error == 'empty_pass'): ?>
                Введите пароль
            <?php endif; ?>
            <?php if($error == 'wrong_pass'): ?>
                Не верный пароль
            <?php endif; ?>
        </p>
    <?php endif; ?>
    <br>
    <input type="submit" value="Войти">
</form>