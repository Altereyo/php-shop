<?php

function getImageInfo($col) {
    $id = (int)$_GET['id'];
    $query = "SELECT {$col} FROM images WHERE id = {$id}";
    $result = sendSelect($query);
    return $result[0][$col];
}

function updatePopularity () {
    $id = (int)$_GET['id'];
    $query = "UPDATE images SET popularity=popularity+1 WHERE id={$id}";
    sendQuery($query);
}