<?php

session_start();

if (isset($_SESSION['id'])) {
    if ($_SESSION['email'] === 'admin@bugme.com') {
        header("Location:newUser.html");
    } else {
        header("Location:./newUser.html");
    }
} else {
    header("Location:./login.html");
}
