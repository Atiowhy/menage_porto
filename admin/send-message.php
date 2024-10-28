<?php
session_start();
include "../controller/action-contact.php";
?>

<!DOCTYPE html>
<html
    lang="en"
    class="light-style layout-menu-fixed"
    dir="ltr"
    data-theme="theme-default"
    data-assets-path="../assets/"
    data-template="vertical-menu-template-free">

<head>
    <meta charset="utf-8" />
    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />
    <title>Dashboard - Analytics | Sneat - Bootstrap 5 HTML Admin Template - Pro</title>
    <meta name="description" content="" />
    <?php include 'inc/head.php' ?>
</head>
<!-- <style>
    * {
        background-color: black;
    }
</style> -->

<body>
    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar">
        <div class="layout-container">
            <!-- Menu -->
            <?php include 'inc/sideBar.php' ?>
            <!-- / Menu -->

            <!-- Layout container -->
            <div class="layout-page">
                <!-- Navbar -->
                <?php include 'inc/navbar.php' ?>
                <!-- / Navbar -->
                <!-- Content wrapper -->
                <div class="content-wrapper">
                    <!-- Content -->
                    <div class="container-xxl flex-grow-1 container-p-y">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="card">
                                    <div class="card-header fs-1">Send Message</div>
                                    <ul>

                                        <li style="list-style: none" class="d-flex gap-2">
                                            <span>Nama : </span>
                                            <span><?php echo $rowContact['nama'] ?></span>
                                        </li>
                                        <li style="list-style: none" class="d-flex gap-2">
                                            <span>Email : </span>
                                            <span><?php echo $rowContact['email'] ?></span>
                                        </li>
                                        <li style="list-style: none" class="d-flex gap-2">

                                            <span>Subject : </span>
                                            <span><?php echo $rowContact['subject'] ?></span>
                                        </li>
                                        <li style="list-style: none" class="d-flex gap-2">

                                            <span>Message : </span>
                                            <span><?php echo $rowContact['message'] ?></span>
                                        </li>

                                    </ul>
                                    <div class="card-body">
                                        <?php if (isset($_GET['success-delete'])): ?>
                                            <div id="alert" class="alert alert-success" role="alert">Deleted Success</div>
                                        <?php endif; ?>
                                        <form action='../controller/action-contact.php?id=<?php echo isset($_GET['pesanId']) ? $rowContact['id'] : ''; ?>' method="POST" enctype="multipart/form-data">
                                            <div class="mb-3 row">
                                                <div class="col-sm-6">
                                                    <label for="" class="form-label">Email</label>
                                                    <input type="email" name="email" class="form-control" placeholder="Input Your Name" value="" required>
                                                </div>
                                                <div class="col-sm-6">
                                                    <label for="" class="form-label">Subject</label>
                                                    <input type="text" name="subject" class="form-control" placeholder="Input Your Email" value="" required>
                                                </div>
                                                <div class="col-sm-6">
                                                    <label for="" class="form-label">Message</label>
                                                    <textarea type="text" name="message" class="form-control" placeholder="Input Your Email">
                                                                                                                                                 </textarea>
                                                </div>
                                            </div>

                                            <div class="mb-3 row">
                                                <div class="col-sm-2">
                                                    <button class="btn btn-primary w-100" name="send" type="submit">Send</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>


                    </div>
                    <!-- Footer -->
                    <?php include 'inc/footer.php' ?>
                    <!-- / Footer -->
                    <div class="content-backdrop fade"></div>
                </div>
                <!-- Content wrapper -->
            </div>
            <!-- / Layout page -->
        </div>

        <!-- Overlay -->
        <div class="layout-overlay layout-menu-toggle"></div>
    </div>
    <!-- / Layout wrapper -->


    <?php include 'inc/js.php' ?>
</body>

</html>