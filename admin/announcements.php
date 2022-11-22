<?php
require_once('config/connect.php');
require_once('functions/functions.php');

if (!isset($_SESSION['super_log'])) {
    gotoPage("../index");
}

if (isset($_GET['result_id']) && isset($_GET['course_id']) && isset($_GET['semester']) && isset($_GET['course_credits']) && isset($_GET['set']) && isset($_GET['practical_lecturer_name'])) {
    activateCourse($_GET['course_id'], $_GET['result_id'], calculateStudentLevel($_GET['set']),  $_GET['set'], $_GET['course_credits']);
} elseif (isset($_SESSION['active_course_id'])) {
} else {
    gotoPage('active-courses');
}
?>
<!doctype html>
<html class="no-js" lang="">


<head>
    <title>AKKHOR | <?= $_SESSION['active_course_code'] ?> Course Announcements</title>
    <meta name="description" content="">
    <?php require_once('includes/head.php'); ?>
</head>

<body>
    <!-- Preloader Start Here -->
    <div id="preloader"></div>
    <!-- Preloader End Here -->
    <div id="wrapper" class="wrapper bg-ash">
        <!-- Header Menu Area Start Here -->
        <?php require_once('includes/header.php') ?>
        <!-- Header Menu Area End Here -->
        <!-- Page Area Start Here -->
        <div class="dashboard-page-one">
            <!-- Sidebar Area Start Here -->
            <?php require_once('includes/sidebar.php') ?>
            <!-- Sidebar Area End Here -->
            <div class="dashboard-content-one">
                <!-- Breadcubs Area Start Here -->
                <div class="breadcrumbs-area">
                    <h3><?= $_SESSION['active_course_code'] ?> Course Announcements</h3>
                    <ul>
                        <li>
                            <a href="index">Home</a>
                        </li>
                        <li>Course Announcement</li>
                    </ul>
                </div>
                <!-- Breadcubs Area End Here -->
                <!-- All Subjects Area Start Here -->
                <div class="row">
                    <div class="col-8-xxxl col-12">
                        <div class="card height-auto">
                            <div class="card-body">
                                <div class="heading-layout1">
                                    <div class="item-title">
                                        <h3>All <?= $_SESSION['active_course_code'] ?> Course Announcements</h3>
                                    </div>
                                    <div class="dropdown">
                                        <a class="dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-expanded="false">...</a>

                                        <div class="dropdown-menu dropdown-menu-right">
                                            <a class="dropdown-item" href="new-announcement"><i class="fas fa-plus text-primary"></i>New</a>
                                            <!-- <a class="dropdown-item" href="#"><i class="fas fa-cogs text-dark-pastel-green"></i>Edit</a> -->
                                            <a class="dropdown-item" href="course-announcements"><i class="fas fa-redo-alt text-orange-peel"></i>Refresh</a>
                                        </div>
                                    </div>
                                </div>

                                <div class="table-responsive">
                                    <table class="table display data-table text-nowrap">
                                        <thead>
                                            <tr>
                                                <th>
                                                    <div class="form-chec">
                                                        <!-- <input type="checkbox" class="form-check-input checkAll"> -->
                                                        <label class="form-check-label">ID</label>
                                                    </div>
                                                </th>
                                                <th>Title</th>
                                                <th>Description</th>
                                                <th>Course</th>
                                                <th>Category</th>
                                                <th>Views</th>
                                                <th>Date</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $courseAnnouncements = getCourseAnnouncements($_SESSION['lecturer_id'], $_SESSION['active_course_id'], $_SESSION['active_course_table_id'], $_SESSION['active_course_department_id']);
                                            if ($courseAnnouncements) {
                                                foreach ($courseAnnouncements as $announcement) {
                                            ?>
                                                    <tr>
                                                        <td>#<?= $announcement['id'] ?></td>
                                                        <td><?= htmlentities($announcement['title']) ?></td>
                                                        <td><?= substr(htmlentities($announcement['description']), 0, 25) ?>...</td>
                                                        <td><?= $_SESSION['active_course_name'] ?></td>
                                                        <td><?= htmlentities($announcement['category']) ?></td>
                                                        <td><?= countViewsPerAnnouncement($announcement['viewers']) ?></td>
                                                        <td><?= formatDateFriendlier($announcement['date_created']) ?></td>
                                                        <td>
                                                            <div class="dropdown">
                                                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                                                    <span class="flaticon-more-button-of-three-dots"></span>
                                                                </a>
                                                                <div class="dropdown-menu dropdown-menu-right" x-placement="bottom-end" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(0px, 28px, 0px);" x-out-of-boundaries="">
                                                                    <!-- <a class="dropdown-item" href="edit-course-announcement?announcement_id=<?= $announcement['id'] ?>"><i class="fas fa-cogs text-dark-pastel-green"></i>Edit</a> -->
                                                                    <a class="dropdown-item" onclick="getConfirmation('Are you sure', 'Announcement will be deleted permanently', 'functions/deleteAnnouncement?announcement_id=<?= $announcement['id'] ?>')"><i class="fas fa-trash text-orange-red"></i>Delete</a>
                                                                    <!-- <a class="dropdown-item" href="#"><i class="fas fa-redo-alt text-orange-peel"></i>Refresh</a> -->
                                                                </div>
                                                            </div>
                                                        </td>
                                                    </tr>

                                            <?php }
                                            } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- All Subjects Area End Here -->
                <footer class="footer-wrap-layout1">
                    <?php require_once('includes/footer.php') ?>
                </footer>
            </div>
        </div>
        <!-- Page Area End Here -->
    </div>
    <!-- jquery-->
    <script src="js/jquery-3.3.1.min.js"></script>
    <!-- Plugins js -->
    <script src="js/plugins.js"></script>
    <!-- Popper js -->
    <script src="js/popper.min.js"></script>
    <!-- Bootstrap js -->
    <script src="js/bootstrap.min.js"></script>
    <!-- Select 2 Js -->
    <script src="js/select2.min.js"></script>
    <!-- Scroll Up Js -->
    <script src="js/jquery.scrollUp.min.js"></script>
    <!-- Data Table Js -->
    <script src="js/jquery.dataTables.min.js"></script>
    <!-- Custom Js -->
    <script src="js/main.js"></script>
    <?php require_once('includes/js_imports.php') ?>

</body>


</html>