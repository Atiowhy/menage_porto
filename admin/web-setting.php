<?php
session_start();
include "../controller/action-setting.php";


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
                                    <div class="card-header fs-1">Website Settings</div>

                                    <div class="card-body">
                                        <?php if (isset($_GET['success-delete'])): ?>
                                            <div id="alert" class="alert alert-success" role="alert">Deleted Success</div>
                                        <?php endif; ?>
                                        <form action='../controller/action-setting.php' method="POST" enctype="multipart/form-data">
                                            <input type="hidden" name="id" class="form-control" value="<?php echo isset($rowSetting['id']) ? $rowSetting['id'] : '' ?>">
                                            <div class="mb-3 row">
                                                <div class="col-sm-6">
                                                    <label for="" class="form-label">Website Name</label>
                                                    <input type="text" name="website_name" class="form-control" placeholder="Input Your Website Name" value="<?php echo isset($rowSetting['website_name']) ? $rowSetting['website_name'] : '' ?>" required>

                                                </div>
                                                <div class="col-sm-6">
                                                    <label for="" class="form-label">Website URL</label>
                                                    <input type="url" name="website_link" class="form-control" placeholder="Input your website link" value="<?php echo isset($rowSetting['website_link']) ? ($rowSetting['website_link']) : '' ?>" required>
                                                </div>
                                            </div>
                                            <div class="mb-3 row">
                                                <div class="col-sm-6">
                                                    <label for="" class="form-label">Website Phone</label>
                                                    <input type="text" class="form-control" name="website_phone" placeholder="Input your website phone" value="<?php echo isset($rowSetting['website_phone']) ? $rowSetting['website_phone'] : '' ?>">
                                                </div>
                                                <div class="col-sm-6">
                                                    <label for="" class="form-label">Website Email</label>
                                                    <input type="text" class="form-control" name="website_email" placeholder="Input your website phone" value="<?php echo isset($rowSetting['website_email']) ? $rowSetting['website_email'] : '' ?>">
                                                </div>
                                            </div>
                                            <div class="mb-3 row">
                                                <div class="col-sm-6">
                                                    <label for="" class="form-label">Website Address</label>
                                                    <input type="text" class="form-control" name="website_address" placeholder="Input your website phone" value="<?php echo isset($rowSetting['website_address']) ? $rowSetting['website_address'] : '' ?>">
                                                </div>

                                            </div>
                                            <div class="mb-3 row">
                                                <div class="col-sm-12">
                                                    <label for="" class="form-label">Image</label>
                                                    <input type="file" class="form-control" name="foto">
                                                </div>
                                            </div>
                                            <div class="mb-3 row">
                                                <div class="col-sm-2">
                                                    <button class="btn btn-primary w-100" name="<?php echo isset($_GET['edit']) ? 'changes' : 'save' ?>" type="submit"><?php echo isset($_GET['edit']) ? '
                                                    Edit' : '
                                                    Add' ?></button>
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