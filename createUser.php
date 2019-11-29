<?php
$host = getenv('IP');
$db = '';
$username = '';
$password = '';

try {
    $conn = new PDO("mysql:host=$host;dbname=$db;charset=utf8mb4", $username, $password);

    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        if (isset($_POST['firstname']) and isset($_POST['lastname']) and isset($_POST['email']) and isset($_POST['passsword'])) {        //check the variable used for username
            $stmt = $conn -> prepare("INSERT INTO tablename VALUES (:f, :l, :e, :p)");

            $first = filter_input(INPUT_POST, $_POST['firstname'], FILTER_SANITIZE_STRING);
            $last = filter_input(INPUT_POST, $_POST['lastname'], FILTER_SANITIZE_STRING);
            $email = filter_input(INPUT_POST, $_POST['email'], FILTER_SANITIZE_EMAIL);
            $password = validatePassword(filter_input(INPUT_POST, $_POST['firstname'], FILTER_SANITIZE_STRING));

            $email = filter_var($email, FILTER_VALIDATE_EMAIL);
            $hash = password_hash($password, PASSWORD_DEFAULT);

            $stmt -> bindParam(':f', $first, PDO::PARAM_STR);
            $stmt -> bindParam(':l', $last, PDO::PARAM_STR);
            $stmt -> bindParam(':e', $email, PDO::PARAM_STR);
            $stmt -> bindParam(':p', $hash, PDO::PARAM_STR);

            $stmt -> execute();
        }  
    }
} catch (Exception $e) {
    echo $e -> getMessage();
}

function validatePassword($pword) {
    if (strlen($pword) > 8) {
        if(preg_match('/[A-Z+0-9+]/', $pword)) {
            return $pword;
        } else {
            echo "Invalid password";
        }
    } else {
        echo "Invalid password";
    }
}

