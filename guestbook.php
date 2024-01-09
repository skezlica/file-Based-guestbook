<?php

$error = '';

if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = santilize($_POST['name']);
    $message = santilize($_POST['message']);

    if(empty($name) || empty($message)) {
        $error = 'Name and message are required.';
    } else {
        $name = htmlspecialchars($name);
        $message = htmlspecialchars($name);
    }

    header('location:index.php');
}

function santilize($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}