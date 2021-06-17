<div id="account">
    <?php if ($auth == true): ?>
        <p>Здравствуйте, <?= $name; ?></p>
        <a id="signout" href="/logout">Выйти</a>
    
    <?php elseif ($auth == false): ?>
        <a id="signup" href="/signup">Зарегистрироваться</a>
        <a id="signin" href="/signin">Войти</a>
    <?php endif; ?>
</div>