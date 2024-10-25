<?php
include '../admin/connection.php';

// ambil data
$querySearchDataSetting = mysqli_query($connection, "SELECT * FROM general_setting ORDER BY id DESC");
// tampung data untuk di tampilkan
$rowSetting = mysqli_fetch_assoc($querySearchDataSetting);
// add user
if (isset($_POST['save'])) {
    $website_name   = $_POST['website_name'];
    $website_link   = $_POST['website_link'];
    $website_phone  = $_POST['website_phone'];
    $website_email  = $_POST['website_email'];
    $website_address  = $_POST['website_address'];
    $id             = $_POST['id'];

    // mencari data di dalam table pengaturan, jika ada datanya di update, jika kosong di insert
    if (mysqli_num_rows($querySearchDataSetting)) {
        if (!empty($_FILES['foto']['name'])) {
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
                // unlink() => fungsinya untuk mendelete file
                unlink($upload . $rowSetting['logo']);

                $queryUpdateSetting = mysqli_query($connection, "UPDATE general_setting SET website_name = '$website_name', website_link = '$website_link', website_phone = '$website_phone', website_email =  '$website_email', website_address = '$website_address', logo = '$nameFile' WHERE id = '$id' ");
            }
        } else {
            $queryUpdateSetting = mysqli_query($connection, "UPDATE general_setting SET website_name = '$website_name', website_link = '$website_link', website_phone = '$website_phone', website_email =  '$website_email', website_address = '$website_address' WHERE id = '$id' ");
        }
    } else {
        // $_FILES => ngambil nilai dari input type file
        if (!empty($_FILES['foto']['name'])) {
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

                $queryAddUser = mysqli_query($connection, "INSERT INTO general_setting (website_name, website_link, website_phone, website_email, website_address, foto) VALUES ('$website_name', '$website_link', '$website_phone', '$website_email', '$website_address', '$nameFile')");
            }
        } else {
            $queryAddUser = mysqli_query($connection, "INSERT INTO general_setting (website_name, website_link, website_phone) VALUES ('$website_name', '$website_link', '$website_phone')");
        }
    }
    header('location: ../admin/web-setting.php?success-add=add-user-success');
}
