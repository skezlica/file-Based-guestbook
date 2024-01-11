<?php 

require_once 'GuestbookEntry.php';
require_once 'FileHandler.php';

$filehandler = new FileHandler('guestbook.txt');
$entries = $filehandler->readEntries();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>File-Based Guestbook</title>
</head>
<body>
    <h1>File-Based Guestbook</h1>

    <div class="errors">
    <?php

    session_start();

    if (isset($_SESSION['errors']) && !empty($_SESSION['errors'])) {
        foreach ($_SESSION['errors'] as $error) {
            echo $error . '<br>';
        }

        unset($_SESSION['errors']);
    }

    ?>
    </div>
    <div class="guestbook-form">
        <form action="guestbookForm.php" method="POST">
            <label for="name_id">Name:</label>
            <input type="text" name="name" id="name_id">
            <label for="message_id">Message:</label>
            <input type="text" name="message" id="message_id">
            <button type="submit">Send</button>
         </form>
    </div>
    

    <div class="guestbook">
    <?php

    foreach ($entries as $entry) {
        echo '<div class="entry">';
        echo '<strong>' . $entry->getName() . '</strong><br>';
        echo '<p>' . $entry->getMessage() . '</p>';
        echo '<small>' . $entry->formatTimestamp() . '</small>';
        echo '</div>';
    }

    ?>
    </div>
</body>
</html>