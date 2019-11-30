<?php
require_once "password.php";
session_start();

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if (!empty($_POST)) {
        if (isset($_POST['email']) and isset($_POST['password'])) {
            try {
                $conn = new PDO("mysql:host=$host;dbname=$db;charset=utf8mb4", $username, $password);

                $stmt = $conn->prepare("SELECT* FROM Users WHERE email = :e");

                $tempEmail = filter_input(INPUT_POST, $_POST['email'], FILTER_SANITIZE_EMAIL);
                $password = validatePassword(filter_input(INPUT_POST, $_POST['password'], FILTER_SANITIZE_STRING));

                $email = filter_var($tempEmail, FILTER_VALIDATE_EMAIL);

                $stmt->bindParam(':e', $email, PDO::PARAM_STR);

                $stmt->execute();

                $user = $stmt->fetch(PDO::FETCH_ASSOC);

                if (password_verify($password, $user['password'])) {
                    $_SESSION['id'] = $user['id'];
                    header("Location:./dashboard.html");
                } else {
                    echo "Invalid username or password";
                }
            } catch (Exception $e) {
                alert($e->getMessage());
            }
        }
    }
}