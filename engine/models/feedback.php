<?php

function getComments() {
    $id = (int)$_GET['id'];
    $query = "SELECT * FROM feedback WHERE item_id = {$id} ORDER BY date";
    $result = sendSelect($query);
    return $result;
}

function getForm($action) {
    return $action == null ? getDefaultForm() : handleComment($action);
}

function getDefaultForm() {
    return [
        'buttonText' => 'Отправить',
        'formAction' => 'add'
    ];
}

function handleComment($action) {
    $itemId = (int)$_GET['id'];
    $commentId = (int)$_GET['comment_id'];

    switch ($action) {
        case 'add':
            addComment($itemId);
            break;
        case 'edit':
            return editingComment($commentId);
        case 'delete':
            deleteComment($commentId);
            break;
        case 'save':
            saveComment();
            break;
    }
    header("Location: /item/?id={$itemId}");
    return getDefaultForm();
}

function addComment ($itemId) {
    $name = strip_tags(htmlspecialchars(mysqli_real_escape_string(getDb(), $_POST['name'])));
    $comment = strip_tags(htmlspecialchars(mysqli_real_escape_string(getDb(), $_POST['newComment'])));

    $query = "INSERT INTO feedback (name, comment, item_id) VALUES ('{$name}','{$comment}',{$itemId})";
    sendQuery($query);
}

function editingComment ($commentId) {
    $query = "SELECT * FROM feedback WHERE id={$commentId}";
    $edit = sendSelect($query)[0];

    return [
        'id' => $edit['id'], 
        'name' => $edit['name'], 
        'comment' => $edit['comment'], 
        'buttonText' => 'Сохранить',
        'formAction' => 'save'
    ];
}

function deleteComment ($commentId) {    
    $query = "DELETE FROM feedback WHERE id = {$commentId}";
    sendQuery($query);
}

function saveComment () {
    $commentId = strip_tags(htmlspecialchars(mysqli_real_escape_string(getDb(), $_POST['comment_id'])));
    $name = strip_tags(htmlspecialchars(mysqli_real_escape_string(getDb(), $_POST['name'])));
    $comment = strip_tags(htmlspecialchars(mysqli_real_escape_string(getDb(), $_POST['newComment'])));
    
    $query = "UPDATE feedback SET name='{$name}', comment='{$comment}' WHERE id={$commentId}";
    sendQuery($query);
}