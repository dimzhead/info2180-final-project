<?php

$host = getenv('IP');
$db = 'schema.sql';
$username = 'root';
$password = '';

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