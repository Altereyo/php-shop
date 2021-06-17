<?php

function authUser() {
    $login = $_POST['user_name'];
    $pass = $_POST['user_pass'];

    $query = "SELECT user_login as login, user_password as hash FROM users";
    $dbUsers = sendSelect($query);

    $error = '';
    $userFound = false;
    $auth = false;

    if ($login == '') $error = 'empty_login';
    else if ($pass == '') $error = 'empty_pass';
    else {
        foreach ($dbUsers as $user) {
            if ($user['login'] == $login) {
                $userFound = true;
                $auth = password_verify($pass, $user['hash']);
                break;
            }
        }
        
        if ($auth == false) {
            $error = $userFound ? 'wrong_pass' : 'no_such_login';
        }
    }

    if ($error == '') {
        session_start();
            setcookie('username', $login, time() + 60*60*24);
            setcookie('password', $pass, time() + 60*60*24);
        header("Location: /");
    }
    else $_POST['login_error'] = $error;
}