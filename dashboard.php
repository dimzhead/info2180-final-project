<?php

require_once 'password.php';
session_start();

if (isset($_SESSION['id'])) {
    try {
        $pdo = new PDO("mysql:host=$host;dbname=$db;charset=utf8mb4", $username, $password);
        $stmt = $pdo->query("SELECT* FROM Issues JOIN Users ON Issues.assigned_to = Users.id");
        $rows = $stmt->fetchAll(PDO::FETCH_ASSOC); 

        include 'view.dashboard.php';
    } catch (Exception $e) {
        alert($e->getMessage());
    }
} else {
    header("Location:./login.html");
}
