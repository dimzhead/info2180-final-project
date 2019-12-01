<?php

require_once "password.php";

try {
    $conn = new PDO("mysql:host=$host;dbname=$db;charset=utf8mb4", $username, $password);
    $stmt = $conn->query("SELECT * FROM Users");
    $users = $stmt->fetchAll(PDO::FETCH_ASSOC);

    include "view.Users.php";
} catch (Exception $e) { }
