<div id="cart">
    <h2>Корзина</h2>

    <?php if ($cart != null): ?>
        <?php foreach ($cart as $item): ?>
            <div class="cart-item">
                <img class="cart-item-image" src="../assets/goods/<?=$item['image']?>" alt="">
                <div class="cart-item-info">
                    <p class="cart-item-name"><?=$item['name']?></p>
                    <div>
                        <div class="cart-item-count">
                            <a href="/cart/?remove&itemid=<?=$item['id']?>">-</a>
                            <span><?=$item['count']?></span>
                            <a href="/cart/?increase&itemid=<?=$item['id']?>">+</a>
                        </div>
                        <p>Итого: <?=$item['price'] * $item['count']?> (1x=<?=$item['price']?>)</p>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
        <a href="/confirm">Оформить заказ</a>
    <?php else: ?>
        <div>Cart is empty</div>
    <?php endif; ?>
</div>