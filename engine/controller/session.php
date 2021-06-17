<?php

function getSessId() {
    $session_id = session_id();
    if (empty($session_id)) {
        session_start();
        $session_id = session_id();
    }
    return $session_id;
}