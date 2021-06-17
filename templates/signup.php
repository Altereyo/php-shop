<h2>Регистрация</h2>

<form action="" method="post" class="signForm" enctype="multipart/form-data">
    <input type="checkbox" name="signup" hidden checked>
    <label for="user_name">Имя пользователя</label>
    <input type="text" name="user_name">
    <br>
    <label for="user_pass">Пароль</label>
    <input type="password" name="user_pass">
    <br>
    <label for="pass_repeat">Повторите пароль</label>
    <input type="password" name="pass_repeat">
    <br>
    <label>
        <input type="checkbox" name="remember_user">
        <span>Запомнить меня</span>
    </label>
    <br>
    <?php if($error): ?>
        <p class="log_error">
            <?php if($error == 'same_login'): ?>
                Пользователь с данным логином уже существует
            <?php endif; ?>
            <?php if($error == 'empty_login'): ?>
                Введите логин
            <?php endif; ?>
            <?php if($error == 'empty_pass'): ?>
                Введите пароль
            <?php endif; ?>
            <?php if($error == 'wrong_pass_repeat'): ?>
                Пароли должны совпадать
            <?php endif; ?>
        </p>
    <?php endif; ?>
    <br>
    <input type="submit" value="Зарегистрироваться">
</form>