<?php
require_once "password.php";

session_start();

if (isset($_SESSION['id'])) {
    try {
        $conn = new PDO("mysql:host=$host;dbname=$db;charset=utf8mb4", $username, $password);

        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            if (!empty($_POST)) {

                if (isset($_POST['title']) and isset($_POST['description']) and isset($_POST['assignedTo']) and isset($_POST['type']) and isset($_POST['priority'])) {
                    $stmt = $conn->prepare("INSERT INTO Issues VALUES (:i, :l, :d, :t, :p, :s, :a, :b, :c, :u)");

                    $id = 0;    //need to determine a way to generate id
                    $title = filter_input(INPUT_POST, $_POST['title'], FILTER_SANITIZE_STRING);;
                    $description = filter_input(INPUT_POST, $_POST['description'], FILTER_SANITIZE_STRING);
                    $type = filter_input(INPUT_POST, $_POST['type'], FILTER_SANITIZE_STRING);
                    $priority = filter_input(INPUT_POST, $_POST['priority'], FILTER_SANITIZE_STRING);
                    $status = "Open";
                    $assignedTo = filter_input(INPUT_POST, $_POST['assignedTo'], FILTER_SANITIZE_STRING);
                    $createdBy = $_SESSION['id'];
                    $created = date("Y-m-d");
                    $updated = date("Y-m-d");

                    $stmt->bindParam(':i', $id, PDO::PARAM_INT);
                    $stmt->bindParam(':l', $title, PDO::PARAM_STR);
                    $stmt->bindParam(':d', $description, PDO::PARAM_STR);
                    $stmt->bindParam(':t', $type, PDO::PARAM_STR);
                    $stmt->bindParam(':p', $priority, PDO::PARAM_STR);
                    $stmt->bindParam(':s', $status, PDO::PARAM_STR);
                    //Should be stored as user id not name
                    $stmt->bindParam(':a', $assignedTo, PDO::PARAM_STR);
                    //should be stored as user id not name
                    $stmt->bindParam(':b', $createdBy, PDO::PARAM_STR);
                    $stmt->bindParam(':c', $created, PDO::PARAM_STR);
                    $stmt->bindParam(':u', $updated, PDO::PARAM_STR);

                    $stmt->execute();
                }
            }
        }
    } catch (Exception $e) {
        echo $e->getMessage();
    }
} else {
    header("Location:./login.html");
}
