<?php

function checkNewUser() {
    $newUser = [
        'login' => $_POST['user_name'], 
        'pass' => $_POST['user_pass'],
        'pass_repeat' => $_POST['pass_repeat']
    ];
    $query = "SELECT user_login as login FROM users";
    $dbLogins = sendSelect($query);
    
    $error = '';
    
    if ($newUser['pass'] == '' || ctype_space($newUser['pass'])) $error = 'empty_pass';
    elseif ($newUser['pass'] != $newUser['pass_repeat']) $error = 'wrong_pass_repeat';

    foreach ($dbLogins as $login) {
        if ($newUser['login'] == $login['login']) $error = 'same_login';
        elseif ($newUser['login'] == '' || ctype_space($newUser['login'])) $error = 'empty_login';
    }

    if ($error == '') {
        addNewUser($newUser);
        session_start();
        setcookie('username', $newUser['login'], time() + 60*60*24);
        setcookie('password', $newUser['pass'], time() + 60*60*24);
        header("Location: /");
    }
    else $_POST['login_error'] = $error;
}

function addNewUser($user) {
    $login = $user['login'];
    $pass = password_hash($user['pass'], PASSWORD_DEFAULT);
    $query = "INSERT INTO users(`user_login`, `user_password`, `user_permission`) VALUES ('{$login}', '{$pass}', 'user')";
    sendQuery($query);
}