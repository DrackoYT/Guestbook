<?php

require_once 'db.php';
global $pdo;

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Guestbook</title>
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="style.css">
    </head>
    <body>

    <div class="gb_title_section">
        <h1 class="gb_title">Guestbook</h1>
    </div>

    <div class="gb_form_section">
        <form action="submit.php" method="post" class="gb_form">
            <label class="name_label" for="name_input">Put your name here</label>
            <input type="text" id="name_input" name="name_input">

            <label for="message_text" >Write your message</label>
            <textarea name="message_text" id="message_text" cols="30" rows="10"></textarea>

            <button name="submit_button" value="send" class="gb_submit_button" type="submit">Submit message</button>
        </form>

    </div>
    <div class="show_send-form">
        <h2 class="send-form_tittle">Previous Entries</h2>
    <?php

    $sql_array = $pdo->prepare("SELECT * FROM messages ORDER BY created_at DESC");
    $sql_array->execute();

    $messages = $sql_array->fetchAll(PDO::FETCH_ASSOC);

    foreach ($messages as $message) {?>


            <div class="show_content-form">
                <div class="content-form_titles">
                    <h4>NAME</h4>
                    <h4>MESSAGE</h4>
                    <h4>DATE</h4>
                </div>
                <div class="content_form">
                    <p class="show_name"> <?=htmlspecialchars($message['name']);?></p>

                    <p class="show_message"> <?=htmlspecialchars($message['message']); ?> </p>

                    <p class="show_date"> <?=htmlspecialchars($message['created_at']); ?> </p>
                </div>

            </div>
    <?php } ?>
    </div>

    <script src="script.js"></script>
    </body>


</html>
