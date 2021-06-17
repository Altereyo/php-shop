<?php

function getItem() {
    $id = (int)$_GET['id'];
    $query = "SELECT * FROM goods WHERE id = {$id}";
    $result = sendSelect($query);
    return $result[0];
}