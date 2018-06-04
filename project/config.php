<?php

$servername = 'localhost';
$username = 'root';
$password = '';
$database_name = 'user';

$mysqli = mysqli_connect($servername, $username, $password, $database_name);

if (!$mysqli) {
    die("connection failed:" .$mysqli->connect_error);
}
?>