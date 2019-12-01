<?php

$host = getenv('IP');
$db = 'schema';
$username = 'root';
$password = 'D3!t31';

function validatePassword($pword) {
    if (strlen($pword) > 8) {
        if(preg_match('/[0-9+]/', $pword)) {
            return $pword;
        } else {
            echo "Invalid password criteria\n";
        }
    } else {
        echo "Invalid password length\n";
        var_dump($pword);
    }
}