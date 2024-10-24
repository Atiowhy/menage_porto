<?php
include 'admin/connection.php';
$getSettingData = mysqli_query($connection, "SELECT * FROM general_setting ORDER BY id DESC");
$dataSetting = mysqli_fetch_assoc($getSettingData);
?>

<nav class="navbar navbar-expand-lg bg-white navbar-light shadow sticky-top p-0">
    <a href="index.html" class="navbar-brand d-flex gap-2 align-items-center px-4 px-lg-5">
        <img src="admin/upload/<?php echo $dataSetting['logo'] ?>" alt="" width="50" class="rounded-circle object-fill">
        <span class="text-info fs-3">AtioWahyu</span>
    </a>
    <button type="button" class="navbar-toggler me-4" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarCollapse">
        <div class="navbar-nav ms-auto p-4 p-lg-0">
            <a href="index.php?home" class="nav-item nav-link <?php echo isset($_GET['home']) ? 'active' : '' ?>">Home</a>
            <a href="about.php?about" class="nav-item nav-link <?php echo isset($_GET['about']) ? 'active' : '' ?>">About</a>
            <a href="#" class="nav-item nav-link">Project</a>
            <div class="nav-item dropdown">
                <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Skilss</a>
                <div class="dropdown-menu fade-down m-0">
                    <a href="team.html" class="dropdown-item">Backend Developer</a>
                    <a href="testimonial.html" class="dropdown-item">Frontend Developer</a>
                    <a href="404.html" class="dropdown-item">Mobile Developer</a>
                </div>
            </div>
            <a href="contact.php?contact" class="nav-item nav-link <?php echo isset($_GET['contact']) ? 'active' : '' ?>">Contact</a>
        </div>
        <a href="" class="btn btn-primary py-4 px-lg-5 d-none d-lg-block">Download Resume<i class="fa fa-arrow-right ms-3"></i></a>
    </div>
</nav>