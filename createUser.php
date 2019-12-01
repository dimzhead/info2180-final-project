<?php
ini_set('display_errors', 'On');
error_reporting(E_ALL);

require_once "password.php";


try {
    $conn = new PDO("mysql:host=$host;dbname=$db;charset=utf8mb4", $username, $password);

    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        if (isset($_POST['firstname']) and isset($_POST['lastname']) and isset($_POST['email']) and isset($_POST['password'])) {        //check the variable used for username
            var_dump($_POST);
            $stmt = $conn -> prepare("INSERT INTO Users (firstname, lastname, password, email, date_joined) VALUES (:f, :l, :e, :p, :d)");

            
            $first = filter_var($_POST['firstname'], FILTER_SANITIZE_STRING);
            $last = filter_var($_POST['lastname'], FILTER_SANITIZE_STRING);
            $tempEmail = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
            $password = validatePassword(filter_var($_POST['password'], FILTER_SANITIZE_STRING));
            $date = date("Y-m-d");

            $email = filter_var($tempEmail, FILTER_VALIDATE_EMAIL);
            $hash = password_hash($password, PASSWORD_DEFAULT);

            $stmt -> bindParam(':f', $first, PDO::PARAM_STR);
            $stmt -> bindParam(':l', $last, PDO::PARAM_STR);
            $stmt -> bindParam(':e', $email, PDO::PARAM_STR);
            $stmt -> bindParam(':p', $hash, PDO::PARAM_STR);
            $stmt -> bindParam(':d', $date, PDO::PARAM_STR);

            $stmt -> execute();
        } else {
            echo "No data in createUser.php";
        } 
    }
} catch (Exception $e) {
    alert($e -> getMessage());
}



