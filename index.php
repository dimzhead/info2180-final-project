<?php

session_start();

if(!empty($_SESSION['user'])) {
    require_once 'home.php';
} else {
    require_once 'loginUser.php';
}