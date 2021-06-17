<?php

function getCatalog() {
    $query = "SELECT * FROM goods";
    return sendSelect($query);
}