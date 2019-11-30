<?php

require_once 'password.php';
session_start();

try {
    $pdo = new PDO("mysql:host=$host;dbname=$db;charset=utf8mb4", $username, $password);
    $stmt = $pdo -> query("SELECT* FROM Issues");
    $rows = $stmt -> fetchAll(PDO::FETCH_ASSOC);

    include 'view.dashboard.php';

} catch (Exception $e) {
    echo $e -> getMessage();
}
