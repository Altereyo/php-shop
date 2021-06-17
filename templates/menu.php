<nav>
    <a href="/">Главная</a>
    <a href="/catalog">Каталог</a>
    <a href="/gallery">Галерея</a>
    <a href="/calculator">Калькулятор</a>
    <a href="/cart">Корзина (<?=$cart_count?>)</a>
    <?php if ($isAdmin): ?>
        <a href="/adminpanel">Заказы</a>
    <?php else:?>
        <a href="/adminfaq">Вы ещё не админ?</a>
    <?php endif;?>
</nav>