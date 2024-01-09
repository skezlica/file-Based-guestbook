<?php

require_once 'guestbook.php';

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

    <?php if (!empty($error)) : ?>
        <p style="color: red;"><?php echo $error; ?></p>
    <?php endif; ?>

    <form action="guestbook.php" method="POST">
        <label for="name_id">Name:</label>
        <input type="text" name="name" id="name_id">
        <label for="message_id">Message:</label>
        <input type="text" name="message" id="message_id">
        <button type="submit">Submit</button>
    </form>
</body>
</html>