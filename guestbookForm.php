<?php

require_once 'GuestbookEntry.php';

if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = santilize($_POST['name']);
    $message = santilize($_POST['message']);

    if(empty($name) || empty($message)) {
        echo 'Name and message are required.';
    } else {
        $name = htmlspecialchars($name);
        $message = htmlspecialchars($message);
        $entry = new GuestbookEntry($name, $message);
        echo $entry;
    }
}

function santilize($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}