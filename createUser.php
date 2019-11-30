<?php
require_once "password.php";


try {
    $conn = new PDO("mysql:host=$host;dbname=$db;charset=utf8mb4", $username, $password);

    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        if (isset($_POST['firstname']) and isset($_POST['lastname']) and isset($_POST['email']) and isset($_POST['passsword'])) {        //check the variable used for username
            $stmt = $conn -> prepare("INSERT INTO Users VALUES (:i, :f, :l, :e, :p, :d)");

            $id = 0;
            $first = filter_input(INPUT_POST, $_POST['firstname'], FILTER_SANITIZE_STRING);
            $last = filter_input(INPUT_POST, $_POST['lastname'], FILTER_SANITIZE_STRING);
            $tempEmail = filter_input(INPUT_POST, $_POST['email'], FILTER_SANITIZE_EMAIL);
            $password = validatePassword(filter_input(INPUT_POST, $_POST['password'], FILTER_SANITIZE_STRING));
            $date = date("Y-m-d");

            $email = filter_var($tempEmail, FILTER_VALIDATE_EMAIL);
            $hash = password_hash($password, PASSWORD_DEFAULT);

            $stmt -> bindParam(':i', $id, PDO::PARAM_STR);
            $stmt -> bindParam(':f', $first, PDO::PARAM_STR);
            $stmt -> bindParam(':l', $last, PDO::PARAM_STR);
            $stmt -> bindParam(':e', $email, PDO::PARAM_STR);
            $stmt -> bindParam(':p', $hash, PDO::PARAM_STR);
            $stmt -> bindParam(':d', $date, PDO::PARAM_STR);

            $stmt -> execute();
        }  
    }
} catch (Exception $e) {
    alert($e -> getMessage());
}



