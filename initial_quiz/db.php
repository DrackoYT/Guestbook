<?php

$HOST = "localhost";
$DATABASE = "sc_guestbook";
$USER = "root";
$PASSWORD = "";

try {
    $pdo = new PDO("mysql:host=$HOST;dbname=$DATABASE", $USER, $PASSWORD);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}