<?php

function confirmOrder() {
    $phone = $_POST['userphone'];
    $session_id = $_COOKIE['PHPSESSID'];
    $query = "INSERT INTO `orders`(`phone`, `session_id`) VALUES ('{$phone}', '{$session_id}')";
    sendQuery($query);
    session_start();
    session_regenerate_id();
    header("Location: /ordersuccess");
}

function getOrder() {
    $session_id = $_COOKIE['PHPSESSID'];
    $query = "SELECT goods.name as item_name, goods.price as item_price, cart.good_count as item_count FROM cart, goods WHERE cart.good_id=goods.id AND session_id='{$session_id}'";
    $order = sendSelect($query);
    $order_totalprice = 0;

    // высчитываем итоговую стоимость каждого товара
    foreach ($order as $item) {
        $item_totalprice = $item['item_price'] * $item['item_count'];
        $order_totalprice += $item_totalprice;
        $order[array_search($item, $order)] += ['item_totalprice' => $item_totalprice];
    }

    $order = ['cart' => $order, 'order_totalprice' => $order_totalprice];
    return $order;
}

function getCartPrice() {
    $order_totalprice = 0;
}