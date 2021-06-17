<?php

function upload() {
    // проверка на тип файла
    if ($_FILES["newFile"]["type"] != "image/jpeg" && $_FILES["newFile"]["type"] != "image/png") {
        header("Location: /gallery/?message=error_mime");
        die();
    }
    // проверка на размер файла
    elseif ($_FILES["myfile"]["size"] > (1024*1024*50)) {
        header("Location: /gallery/?message=error_size");
        exit;
    }
    
    $path = ASSETS_DIR . "/big/" . $_FILES["newFile"]["name"];
    
    if (move_uploaded_file($_FILES["newFile"]["tmp_name"], $path)) {
        header("Location: /gallery/?message=resolve");
        
        $image = new SimpleImage();
        $image->load($path);
        $image->resizeToWidth(150);
        $image->save(ASSETS_DIR . "/small/" . $_FILES["newFile"]["name"]);
        
        $query = "INSERT INTO images (name) VALUES ('{$_FILES["newFile"]["name"]}')";
        sendQuery($query);

        die();
    } else {
        header("Location: /gallery/?message=reject");
        die();
    }
}

function uploadStatus() {
    switch ($_GET['message']) {
        case 'resolve':
            return 'File has been uploaded successfully';
        case 'reject':
            return 'Error: Cannot save uploaded file';
        case 'error_size':
            return 'You cannot upload images larger than 75mb';
        case 'error_mime':
            return 'You can upload only images in .jpeg or .png. Go away, hackers!';
    }
}

function uploadMessageId() {
    return $_GET["message"] == 'resolve' ? 'resolveMsg' : 'errorMsg';
}