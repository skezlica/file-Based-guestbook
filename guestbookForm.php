<?php

require_once 'GuestbookEntry.php';
require_once 'Guestbook.php';
require_once 'FileHandler.php';

session_start();

$errors = [];

if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = sanitize($_POST['name']);
    $message = sanitize($_POST['message']);

    if(empty($name) || empty($message)) {
        $errors[] = 'Name and message are required.';
    } else {            
        $entry = new GuestbookEntry($name, $message);

        $guestbook = new Guestbook();
        $guestbook->addEntry($entry);

        $fileHandler = new FileHandler('guestbook.txt');
        $fileHandler->appendEntry($entry);
        
        header('location:index.php');
        exit();
    }
}

if (!empty($errors)) {
    $_SESSION['errors'] = $errors;
    header('location:index.php');
    exit();
}

function sanitize($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

