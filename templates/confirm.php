<h2>Ваш заказ</h2>

<div class="conf-order">
    <?php foreach ($order as $item): ?>
        <div class="conf-item">
            <span class="conf-item-name"><?=$item['item_name']?></span>
            <span class="conf-item-count"><?=$item['item_price']?>x<?=$item['item_count']?></span>
            <span class="conf-item-totalprice"><?=$item['item_totalprice']?></span>
        </div>
        <hr class="conf-hr">
    <?php endforeach; ?>
    <p id="order-totalprice">Итого: <?=$order_totalprice?></p>
</div>
<form action="/confirm" method="post" class="confirm">
    <h2>Подтверждение заказа</h2>
    <input type="tel" name="userphone" id="tel">
    <input type="submit" value="Заказать">
</form>