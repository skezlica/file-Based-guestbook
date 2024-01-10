<?php

require_once 'GuestbookEntry.php';

if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $message = $_POST['message'];

    $entry = new GuestbookEntry($name, $message);
    echo $entry;
}