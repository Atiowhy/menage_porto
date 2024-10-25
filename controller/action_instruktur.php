<?php
include '../admin/connection.php';

// get data user
$queryDataInstruktur = mysqli_query($connection, "SELECT * FROM instruktur ORDER BY id DESC LIMIT 4");

if (!$queryDataInstruktur) {
    echo 'Data Not Found';
}

// query get data limit


// add user
if (isset($_POST['add-instruktur'])) {
    $nama_instruktur = $_POST['nama_instruktur'];
    $bidang = $_POST['bidang'];

    // $_FILES => ngambil nilai dari input type file
    if (!empty($_FILES['foto']['name'])) {
        $nameFile = $_FILES['foto']['name'];
        $image_size = $_FILES['foto']['size'];

        // extention file
        $ext = array('png', 'jpg', 'jpeg', 'jfif', 'webp');
        $extImg = pathinfo($nameFile, PATHINFO_EXTENSION);

        // jika ext tidak ada yg terdaftar
        if (!in_array($extImg, $ext)) {
            echo 'ext tidak ditemukan';
            die;
        } else {
            $upload = "../admin/upload/";
            // pindahkan gambar dari tmp folder ke folder yg kita buat
            move_uploaded_file($_FILES['foto']['tmp_name'], $upload . $nameFile);

            $queryAddInstruktur = mysqli_query($connection, "INSERT INTO instruktur (nama_instruktur, bidang, foto) VALUES ('$nama_instruktur', '$bidang', '$nameFile')");
        }
    } else {
        $queryAddInstruktur = mysqli_query($connection, "INSERT INTO instruktur (nama_instruktur, bidang) VALUES ('$nama_instruktur', '$bidang')");
    }
    header('location: ../admin/instruktur.php?success-add=add-user-success');
}

// delete user
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];

    $queryDeleteInstruktur =  mysqli_query($connection, "DELETE FROM instruktur WHERE id = '$id'");
    if (!$queryDeleteInstruktur) {
        header('location: ../admin/instruktur.php?failed-delete=delete-failed');
    } else {
        header('location: ../admin/instruktur.php?success-delete=delete-success');
    }
}

$id = isset($_GET['id']) ? $_GET['id'] : '';
// get data edit
$idEdit = isset($_GET['edit']) ? $_GET['edit'] : '';
if (isset($_GET['edit'])) {
    $queryGetEdit = mysqli_query($connection, "SELECT * FROM instruktur WHERE id = '$idEdit'");
    $itemEditInstruktur = mysqli_fetch_assoc($queryGetEdit);
};

// edit user
if (isset($_POST['edit-instruktur'])) {
    $nama_instruktur = $_POST['nama_instruktur'];
    $bidang = $_POST['bidang'];
    // $id = $_POST['id'];

    // jika user ingin memasukkan gambar
    if (!empty($_FILES['foto']['name'])) {
        $nameFile = $_FILES['foto']['name'];
        $image_size = $_FILES['foto']['size'];

        // extention file
        $ext = array('png', 'jpg', 'jpeg', 'jfif', 'webp');
        $extImg = pathinfo($nameFile, PATHINFO_EXTENSION);

        if (!in_array($extImg, $ext)) {
            echo "Extention not found";
            die;
        } else {
            unlink('../admin/upload' . $itemEditInstruktur['foto']);
            move_uploaded_file($_FILES['foto']['tmp_name'], '../admin/upload/' . $nameFile);

            // query update
            $editDataUser = mysqli_query($connection, "UPDATE instruktur SET nama_instruktur='$nama_instruktur',  bidang='$bidang', foto='$nameFile' WHERE id='$id'");
        }
    } else {
        // jika user tidak ingin memasukkan gambar
        $editDataUser = mysqli_query($connection, "UPDATE instruktur SET nama_instruktur='$nama_instruktur',  bidang='$bidang' WHERE id='$id'");
    }
    // print_r($editDataUser);
    // die;
    header('location:  ../admin/instruktur.php?success');
}
