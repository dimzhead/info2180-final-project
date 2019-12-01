<?php

require_once 'password.php';
session_start();

if (isset($_SESSION['id'])) {
    try {
        $pdo = new PDO("mysql:host=$host;dbname=$db;charset=utf8mb4", $username, $password);
        $stmt = $pdo->query("SELECT * FROM Issues");
        $rows = $stmt->fetchAll(PDO::FETCH_ASSOC); 
        echo $rows;
        // include 'view.dashboard.php';
    } catch (Exception $e) {
        alert($e->getMessage());
    }
} else {
    header("Location:./login.html");
}
