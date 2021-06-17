<?php

include "../config/config.php";

$url_array = explode('/', $_SERVER['REQUEST_URI']);


if ($url_array[1] == '') {
    $page = 'index';
} else {
    $page = $url_array[1];
}

if ($url_array[2][0] != '?') {
    $action = $url_array[2];
}
else {
    $action = null;
}

$params = getParams($page, $action);


echo render($page, $params);