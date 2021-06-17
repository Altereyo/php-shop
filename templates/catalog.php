<h2>Каталог</h2>
<div class="catalog">
    <?php foreach ($catalog as $item): ?>
        <div class="catalog-item">
            <a href="/item/?id=<?=$item['id']?>">
                <p class="catalog-item-name"><?=$item['name']?></p>
                <img class="catalog-item-image" src="../assets/goods/<?=$item['image']?>" alt="">
            </a>
            <div class="catalog-item-footer">
                <span class="catalog-item-price"><?=$item['price']?>р.</span>
                <a class="buy-catalog-item buy-item" href="/cart/?add&itemid=<?=$item['id']?>&from=catalog">Купить</a>
            </div>
        </div>
    <?php endforeach; ?>
</div>