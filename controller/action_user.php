<?php
include '../admin/connection.php';

// get data user
$queryDataUser = mysqli_query($connection, "SELECT * FROM user");
if (!$queryDataUser) {
    echo 'Data Not Found';
}

// add user
if (isset($_POST['add-user'])) {
    $nama = $_POST['nama'];
    $email = $_POST['email'];
    $password = sha1($_POST['password']);

    // $_FILES => ngambil nilai dari input type file
    if (isset($_FILES['foto']['name'])) {
        $nameFile = $_FILES['foto']['name'];
        $image_size = $_FILES['foto']['size'];

        // extention file
        $ext = array('png', 'jpg', 'jpeg', 'jfif', 'WebP');
        $extImg = pathinfo($nameFile, PATHINFO_EXTENSION);

        // jika ext tidak ada yg terdaftar
        if (!in_array($extImg, $ext)) {
            echo 'ext tidak ditemukan';
            die;
        } else {
            $upload = "../admin/upload/";
            // pindahkan gambar dari tmp folder ke folder yg kita buat
            move_uploaded_file($_FILES['foto']['tmp_name'], $upload . $nameFile);

            $queryAddUser = mysqli_query($connection, "INSERT INTO user (nama, email, password, foto) VALUES ('$nama', '$email', '$password', '$nameFile')");
        }
    } else {
        $queryAddUser = mysqli_query($connection, "INSERT INTO user (nama, email, password) VALUES ('$nama', '$email', '$password')");
    }
    header('location: ../admin/user.php?success-add=add-user-success');
}

// delete user
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];

    $queryDeleteUser =  mysqli_query($connection, "DELETE FROM user WHERE id = '$id'");
    if (!$queryDeleteUser) {
        header('location: ../admin/user.php?failed-delete=delete-failed');
    } else {
        header('location: ../admin/user.php?success-delete=delete-success');
    }
}

$id = isset($_GET['id']) ? $_GET['id'] : '';
// get data edit
$idEdit = isset($_GET['edit']) ? $_GET['edit'] : '';
if (isset($_GET['edit'])) {
    $queryGetEdit = mysqli_query($connection, "SELECT * FROM user WHERE id = '$idEdit'");
    $itemEditUser = mysqli_fetch_assoc($queryGetEdit);
};

// edit user
if (isset($_POST['edit-user'])) {
    // print_r($idEdit);
    // die;
    $nama = $_POST['nama'];
    $email = $_POST['email'];
    // $id = $_POST['id'];

    // jika password diisi
    if ($_POST['password']) {
        $password = $_POST['password'];
    } else {
        $password = $itemEditUser['password'];
    }

    $editDataUser = mysqli_query($connection, "UPDATE user SET nama='$nama',  email='$email', password='$password' WHERE id='$id'");
    // print_r($editDataUser);
    // die;
    header('location:  ../admin/user.php?success-edit=edit-user-success');
}
