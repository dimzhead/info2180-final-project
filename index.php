<?php

session_start();

if(isset($_SESSION['user'])) {
    header("Location:./dashboard.html");
} else {
    header("Location:./login.html");
}