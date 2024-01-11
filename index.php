<?php 

require_once 'FileHandler.php';

$filehandler = new FileHandler('guestbook.txt');

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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

    <form action="guestbookForm.php" method="POST">
        <label for="name_id">Name:</label>
        <input type="text" name="name" id="name_id">
        <label for="message_id">Message:</label>
        <input type="text" name="message" id="message_id">
        <button type="submit">Send</button>
    </form>

    <div class="guestbook">
        <?php 
        
        $filehandler->readEntries();
        
        ?>
    </div>
</body>
</html>