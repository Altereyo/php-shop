<?php if ($isAdmin == true): ?>
    <h2>Здравствуйте, администратор</h2>
    <p>Все заказы пользователей:</p>

    <div class="admin-orders">
        <div class="accordion" id="accordionExample">
            <?php foreach($orders as $order): ?>
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingOne">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse<?= $order['id']?>" aria-expanded="false" aria-controls="collapse<?= $order['id']?>">
                            <p class="order-phone"><?=$order['phone'] ?></p>
                        </button>
                    </h2>
                    <div id="collapse<?= $order['id']?>" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            <?php foreach ($order['goods'] as $good): ?>
                                <div class="conf-order">
                                    <div class="conf-item">
                                        <span class="conf-item-name"><?=$good['good_name']?></span>
                                        <span class="conf-item-count"><?=$good['good_price']?>x<?=$good['good_count']?></span>
                                        <span class="conf-item-totalprice"><?=$good['good_totalprice']?></span>
                                    </div>
                                    <hr class="conf-hr">
                                </div>
                                <!-- <?=$good['good_id']?>:
                                <?=$good['good_count']?> -->
                            <?php endforeach; ?>
                            <p id="order-totalprice">Итого: <?=$order['totalprice']?></p>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
<?php else: ?>
    <h2>Доступ запрещён</h2>
<?php endif; ?>