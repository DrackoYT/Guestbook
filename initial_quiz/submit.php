<?php

require_once __DIR__ . '/db.php';
global $pdo;

if (isset($_POST['name_input']) && isset($_POST['message_text'])) {
    $name = trim($_POST['name_input']);
    $message = trim($_POST ['message_text']);

    // Fer net de posibles atacs de SQL INJECTION
    $name = htmlspecialchars($name, ENT_QUOTES, 'UTF-8');
    $message = htmlspecialchars($message, ENT_QUOTES, 'UTF-8');

    if($name !== "" && $message !== ""){

        $sql = "INSERT INTO messages (name, message) VALUES (?, ?)";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$name, $message]);
    }

    echo "ok";

    exit;

}

