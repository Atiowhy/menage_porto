<?php
include '../admin/connection.php';

// get data
$queryGetData = mysqli_query($connection, "SELECT * FROM contact WHERE deleted_at IS NULL");
// $dataContact = mysqli_fetch_assoc($queryGetData);

// get detail

// $id = isset($_GET['pesanId']) ? $_GET['id'] : '';
// $selectContact = mysqli_query($connection, "SELECT * FROM contact WHERE id = '$id'");
// $rowContact = mysqli_fetch_assoc($selectContact);
if (isset($_GET['pesanId'])) {
    $id = $_GET['pesanId'];
    $selectContact = mysqli_query($connection, "SELECT * FROM contact WHERE id = '$id'");
    $rowContact = mysqli_fetch_assoc($selectContact);
}

// insert contact
// if (isset($_POST['send'])) {
//     // $nama = mysqli_real_escape_string($connection, $_POST['nama']);
//     $email = htmlspecialchars($_POST['email']);
//     $subject = htmlspecialchars($_POST['subject']);
//     $message = htmlspecialchars($_POST['message']);

//     // handel error email
//     $email = mysqli_query($connection, "SELECT email FROM contact WHERE email = '$email'");
//     if (mysqli_num_rows($email) > 0) {
//         header('location: ../contact.php?error-email');
//     }

//     $insertContact = mysqli_query($connection, "INSERT INTO contact (nama, email, subject, message) VALUES ('$nama', '$email', '$subject', '$message')");
//     if ($insertContact) {
//         header('location: ../contact.php?insert-success');
//     }
// }

// send message
if (isset($_POST['send'])) {
    // $nama = $_POST['nama'];
    $email = $_POST['email'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];
    // $sendMessage = $_POST['message'];

    $headers = "From: atiowahyudi02@gmail.com" . "\r\n" .
        "Reply-To: atiowahyudi02@gmail.com" . "\r\n" .
        "Content-Type: text/plain; charset=UTF8" . "\r\n" .
        "MIME-Version: 1.0" . "\r\n";

    // print_r($headers);
    // die;

    if (mail($email, $subject, $message, $headers)) {
        echo "Email sent successfully";
        header('location: ../admin/contact-admin.php?success');
    } else {
        echo "Email sending failed";
        header('location: ../admin/contact-admin.php?failed');
    }
}

// delete data
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];

    // query delete
    $deleteContact = mysqli_query($connection, "UPDATE contact SET deleted_at = NOW() WHERE id = '$id'");
    header('location: ../admin/contact-admin.php');
}
