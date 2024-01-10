<?php

require_once 'GuestbookEntry.php';
require_once 'Guestbook.php';

session_start();

if (!isset($_SESSION['guestbook'])) {
    $_SESSION['guestbook'] = new Guestbook();
}
$guestbook = $_SESSION['guestbook'];

if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = santilize($_POST['name']);
    $message = santilize($_POST['message']);

    if(empty($name) || empty($message)) {
        echo 'Name and message are required.';
    } else {
        $name = htmlspecialchars($name);
        $message = htmlspecialchars($message);
        
        $entry = new GuestbookEntry($name, $message);

        $guestbook->addEntry($entry);
    }
}

function santilize($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}