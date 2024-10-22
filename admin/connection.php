<?php
$hostName = 'localhost';
$userName = 'root';
$password = '';
$dbName = 'angkatan3_compro';

$connection = mysqli_connect($hostName, $userName, $password, $dbName);

if (!$connection) {
    die("Connection failed: " . mysqli_connect_error());
} else {
    // echo 'Database Connected ...';
}
