<h2>Галерея</h2>
<?php foreach ($gallery as $img): ?>
    <div class="smallImage">
        <a class="imgLink" href="/image/?id=<?=$img['id']?>">
            <img src="../assets/small/<?=$img['name']?>" alt="small-image">
        </a>
        <span class="popularity">Просмотры: <?=$img['popularity']?></span>
    </div>
<?php endforeach; ?>

<hr>

<?php if ($message): ?>
    <div id="message-wrapper">
        <span class="message" id="<?=$messageId?>"><?=$message;?></span>
        <a class="exit" id="exitMessage" href="/gallery"></a>
    </div>
<?php endif; ?>

<form action="" method="post" enctype="multipart/form-data" id="addImageForm">
    <input type="file" name="newFile">
    <input type="submit" value="Загрузить файл" name="loadImage">
</form>