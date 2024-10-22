<?php
session_start();
include '../admin/connection.php';

if (isset($_POST['register'])) {
    $nama       = $_POST['nama'];
    $email      = $_POST['email'];
    $password   = sha1($_POST['password']);

    $queryRegis = mysqli_query($connection, "INSERT INTO user  (nama, email, password) VALUES ('$nama', '$email', '$password')");
    
    if (!$queryRegis) {
        header('location: ../admin/register.php?error-regis=register-failed');
    } else {
        header('location: ../admin/login.php?succes-register=register-success');
    }
}
