<?php

function getCart() {
    if (!isset($_COOKIE['PHPSESSID'])) return null;

    $session_id = $_COOKIE['PHPSESSID'];
    $query = "SELECT goods.id as id, goods.name as name, goods.price as price, goods.image as image, cart.good_count as count FROM cart, goods WHERE cart.good_id=goods.id AND session_id='{$session_id}'";
    $cart = sendSelect($query);
    return $cart;
}

function addItemToCart() {
    $cartItem = getCartItemData();

    // если товар уже добавлялся в этой сессии, увеличиваем его количество в корзине
    if ($cartItem['count'] > 0) {
        $cartItem['count']++;
        $query = "UPDATE cart SET good_count='{$cartItem['count']}' WHERE session_id='{$cartItem['session_id']}' AND good_id='{$cartItem['id']}'";
        sendQuery($query);
    }
    // если нет - добавляем товар в корзину с количеством 1
    else {
        $query = "INSERT INTO cart (session_id, good_id, good_count) VALUES ('{$cartItem['session_id']}', '{$cartItem['id']}', 1)";
        sendQuery($query);
    }

    // возвращаемся на страницу, с которой добавляли
    switch ($_GET['from']) {
        case 'item':
            header("Location: /item/?id={$cartItem['id']}");
            break;
        case 'catalog':
            header("Location: /catalog");
            break;
    }
}

function removeCartItem() {
    $cartItem = getCartItemData();
    
    if ($cartItem['count'] == 1) {
        $query = "DELETE FROM cart WHERE session_id='{$cartItem['session_id']}' AND good_id={$cartItem['id']}";
        sendQuery($query);
    }
    else {
        $cartItem['count']--;
        $query = "UPDATE cart SET good_count={$cartItem['count']} WHERE session_id='{$cartItem['session_id']}' AND good_id='{$cartItem['id']}'";
        sendQuery($query);
    }

    header("Location: /cart/");
}

function increaseCartItem() {
    $cartItem = getCartItemData();

    $cartItem['count']++;
    $query = "UPDATE cart SET good_count='{$cartItem['count']}' WHERE session_id='{$cartItem['session_id']}' AND good_id='{$cartItem['id']}'";
    sendQuery($query);

    header("Location: /cart/");
}

function getCartItemData() {
    $session_id = getSessId();
    $good_id = (int)$_GET['itemid'];
    $query = "SELECT good_count FROM cart WHERE session_id = '{$session_id}' AND good_id = '{$good_id}'";
    $good_count = sendSelect($query)[0]['good_count'];

    $itemData = [
        'session_id' => (string)$session_id,
        'id' => (int)$good_id,
        'count' => (int)$good_count
    ];

    return $itemData;
}