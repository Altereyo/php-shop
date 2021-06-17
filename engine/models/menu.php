<?php

function countCartItems() {
    $session_id = $_COOKIE['PHPSESSID'];
    $query = "SELECT good_count as count FROM cart WHERE session_id='{$session_id}'";
    $order = sendSelect($query);
    $count = 0;
    foreach ($order as $item) {
        $count += $item['count'];
    }
    return $count;
}