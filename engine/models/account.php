<?php

function getUsername() {
    if (isset($_COOKIE['username'])) {
        return $_COOKIE['username'];
    }
    else if (isset($_SESSION['username'])) {
        return $_SESSION['username'];
    }
    else {
        return 'Гость';
    }
}

function isAccountEntered() {
    if (isset($_COOKIE['username']) || isset($_SESSION['username'])) {
        return true;
    }
    else {
        return false;
    }
}

function logout() {
    session_start();
    setcookie('username', "", time()-3600, "/");
    setcookie('password', "", time()-3600, "/");
    session_regenerate_id();
    header("Location: /");
}