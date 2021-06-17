<?php

function getOrders() {
    $query = "SELECT * FROM orders";
    $orders = sendSelect($query);
    $query = "SELECT * FROM cart";
    $cart = sendSelect($query);
    $query = "SELECT id as good_id, name as good_name, price as good_price FROM goods";
    $goods = sendSelect($query);

    foreach ($orders as &$order) {
        $order['goods'] = [];
        $order['totalprice'] = 0;

        // собираем заказы из оформленных заказов + корзин по id сессии каждого юзера
        foreach ($cart as $cartItem) {
            if ($order['session_id'] == $cartItem['session_id']) {
                array_push($order['goods'], [
                    'good_id' => $cartItem['good_id'],
                    'good_count' => $cartItem['good_count']
                ]);
            }
        }

        // добавляем информацию по каждому товару в заказе
        foreach ($order['goods'] as &$orderGood) {
            foreach ($goods as $good) {
                if ($good['good_id'] == $orderGood['good_id']) {
                    $orderGood['good_price'] =  $good['good_price'];
                    $orderGood['good_name'] =  $good['good_name'];
                    $orderGood['good_totalprice'] = $orderGood['good_count'] * $good['good_price'];
                }
            }
            // высчитываем итоговую стоимость корзины для каждого юзера
            $order['totalprice'] += $orderGood['good_totalprice'];
        }
    }
    
    return $orders;
}

function isAdmin() {
    $login = $_COOKIE['username'];
    $password = $_COOKIE['password'];
    if ($login == 'admin' && $password == '123') {
        return true;
    }
    else return false;
}