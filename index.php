<?php

session_start();

if (isset($_SESSION['id'])) {
    if ($_SESSION['email'] === 'admin@bugme.com') {
        header("Location:newUser.html");
        //header("Location:./issuesAll.html");    //testing redirect
    } else {
        header("Location:./issuesAll.html");
    }
} else {
    header("Location:./login.html");
}
