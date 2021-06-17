<?php

function getDb() {
    $db = @mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME) or die(mysqli_connect_error());
    return $db;
}

function sendSelect($query) {
    $sendQuery = sendQuery($query, true);
    $results = [];
    while($row = mysqli_fetch_assoc($sendQuery)) {
        array_push($results, $row);
    };
    return $results;
}

function sendQuery($query, $return = false) {
    if ($return = true) {
        return mysqli_query(getDb(), $query);
    }
    else mysqli_query(getDb(), $query);
}