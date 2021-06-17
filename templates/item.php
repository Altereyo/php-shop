<h2><?=$item['name']?></h2>
<div id="item">
    <img src="../assets/goods/<?=$item['image']?>" alt="">
    <div id="item-description">
        <p><?=$item['about']?></p>
        <div id="item-footer">
            <span id="item-price"><?=$item['price']?>р.</span>
            <a class="buy-item" href="/cart/?add&itemid=<?=$item['id']?>&from=item">Купить</a>
        </div>
    </div>
</div>
<hr class="good-hr">
<h2>Отзывы по товару</h2>
<div class="feedback">
    <?php foreach ($feedback as $comment): ?>
        <div class="comment">
            <div class="comment-header">
                <p class="comment-name"><?=$comment['name']?></p>
                <span class="comment-time"><?=$comment['date']?></span>
            </div>
            <div class="comment-inner">
                <p><?=$comment['comment']?></p>
                <div>
                    <a href="/item/edit/?comment_id=<?=$comment['id']?>&id=<?=$comment['item_id']?>" class="comment-handler comment-edit"></a>
                    <a href="/item/delete/?comment_id=<?=$comment['id']?>&id=<?=$comment['item_id']?>" class="comment-handler comment-delete"></a>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
    <h2>Добавить отзыв</h2>
    <form action="/item/<?=$formValues['formAction']?>/?id=<?=$item['id']?>" method="POST" id="comment-form" enctype="multipart/form-data">
        <input type="text" hidden name="comment_id" value="<?= $formValues['id']?>">
        <input type="text" name="name" placeholder="Имя" value="<?=$formValues['name']?>">
        <textarea name="newComment" cols="30" rows="10"><?=$formValues['comment']?></textarea>
        <button type="submit"><?= $formValues['buttonText']?></button>
    </form>
</div>