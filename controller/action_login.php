<?php
session_start();
include '../admin/connection.php';

if (isset($_POST['login'])) {
    $email      = $_POST['email'];
    $password   = sha1($_POST['password']);

    $queryLogin = mysqli_query($connection, "SELECT * FROM user WHERE email='$email'");

    if (mysqli_num_rows($queryLogin) > 0) {
        $rowUserLogin = mysqli_fetch_assoc($queryLogin);
        if ($password == $rowUserLogin['password']) {
            header('location: ../admin/index.php?success=login-success');
        } else {
            header('location: ../admin/login.php?error=password-doesnt-match');
        }
    } else {
        header('location:  ../admin/login.php?error-email=email-doesnt-exist');
    }
};
