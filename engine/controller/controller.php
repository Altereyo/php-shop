<?php

function getParams($page, $action) {
    $params['cart_count'] = countCartItems();
    $params['name'] = getUsername();
    $params['auth'] = isAccountEntered();
    $params['isAdmin'] = isAdmin();
    

    switch ($page) {
        case 'index':
            $params['name'] = getUsername();
            break;

        case 'adminpanel':
            $params['orders'] = getOrders();
            break;

        case 'catalog':
            $params['catalog'] = getCatalog();
            break;
    
        case 'item':
            $params['formValues'] = getForm($action);
            $params['item'] = getItem();
            $params['feedback'] = getComments();
            break;
            
        case 'cart':
            if (isset($_GET['add'])) addItemToCart();
            if (isset($_GET['remove'])) removeCartItem();
            if (isset($_GET['increase'])) increaseCartItem();
            $params['cart'] = getCart();
            break;
        
        case 'confirm':
            if (isset($_POST['userphone'])) confirmOrder();
            $order = getOrder();
            $params['order'] = $order['cart'];
            $params['order_totalprice'] = $order['order_totalprice'];
            break;

        case 'gallery':
            if (!empty($_FILES)) upload();
            $params['gallery'] = getGallery();
            $params['message'] = uploadStatus();
            $params['messageId'] = uploadMessageId();
            break;
            
        case 'image':
            updatePopularity();
            $params['name'] = getImageInfo('name');
            $params['popularity'] = getImageInfo('popularity');
            break;
    
        case 'calculator':
            $params['calcData'] = getCalculator();
            break;

        case 'signin':
            if (isset($_POST['signin'])) authUser();
            if (!empty($_POST['login_error'])) $params['error'] = $_POST['login_error'];
            break;
        
        case 'signup':
            if (isset($_POST['signup'])) checkNewUser();
            if (!empty($_POST['login_error'])) $params['error'] = $_POST['login_error'];
            break;

        case 'logout':
            logout();
            break;

    }
    return $params;
}