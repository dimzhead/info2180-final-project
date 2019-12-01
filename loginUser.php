<?php

ini_set('display_errors', 'On');
error_reporting(E_ALL);

require_once "password.php";
session_start();

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if (!empty($_POST)) {
        if (!empty($_POST['email']) and !empty($_POST['password'])) {
            $useremail = $_POST['email'];
            $userPassword = $_POST['password'];
            try {
                $conn = new PDO("mysql:host=$host;dbname=$db;charset=utf8mb4", $username, $password);

                $stmt = $conn->prepare("SELECT IF ((SELECT 'password' FROM 'Users' WHERE 'email' = ':e') = MD5($userPassword),'true','false')");

                $useremail = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
                
                $userPassword = validatePassword(filter_var($_POST['password'], FILTER_SANITIZE_STRING));

                $email = filter_var($useremail, FILTER_VALIDATE_EMAIL);

                $stmt->bindParam(':e', $email, PDO::PARAM_STR);

                $stmt->execute();

                $response = $stmt->fetch(PDO::FETCH_ASSOC);
                
                echo $response;
                // if($email === "admin@bugme.com" and $userPassword = 'password123') {
                //     echo "ok";
                //     $_SESSION['id'] = $user['id'];
                //     $_SESSION['email'] = $user['email'];
                // } else {
                //     if (password_verify($userPassword, $user['password'])) {
                //         echo "ok";
                //         $_SESSION['id'] = $user['id'];
                //         $_SESSION['email'] = $user['email'];
                //         //header("Location:./dashboard.html");
                //     } else {
                //         echo "Invalid username or password. loginUser.php\n";
                //         echo $user['password'];
                //         echo "\n";
                //         echo password_hash($userPassword, PASSWORD_DEFAULT);
                //     }
                // }
                
            } catch (Exception $e) {
                echo "Cannot loginUser.php\n";
                echo $e->getMessage();
            }
        }
    }
}
