<?php

function getGallery() {
    $query = "SELECT * FROM images ORDER BY popularity DESC";
    return sendSelect($query);
}