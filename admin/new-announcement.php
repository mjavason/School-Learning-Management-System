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
    <title>AKKHOR | <?= $_SESSION['active_course_code'] ?> New Announcement</title>
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
                    <h3>Announcements</h3>
                    <ul>
                        <li>
                            <a href="index">Home</a>
                        </li>
                        <li> <?= $_SESSION['active_course_code'] ?> Course Announcement</li>
                    </ul>
                </div>
                <!-- Breadcubs Area End Here -->
                <div class="row">
                    <!-- Exam Grade Add Area Start Here -->
                    <div class="col-4-xxxl col-12">
                        <div class="card height-auto">
                            <div class="card-body">
                                <div class="heading-layout1">
                                    <div class="item-title">
                                        <h3>New <?= $_SESSION['active_course_code'] ?> Announcement</h3>
                                    </div>
                                    <div class="dropdown">
                                        <a class="dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-expanded="false">...</a>

                                        <div class="dropdown-menu dropdown-menu-right">
                                            <a class="dropdown-item" href="announcements"><i class="fas fa-times text-orange-red"></i>Close</a>
                                            <!-- <a class="dropdown-item" href="#"><i class="fas fa-cogs text-dark-pastel-green"></i>Edit</a> -->
                                            <a class="dropdown-item" href="new-announcement"><i class="fas fa-redo-alt text-orange-peel"></i>Refresh</a>
                                        </div>
                                    </div>
                                </div>
                                <form class="new-added-form" method="POST" action="test">
                                    <div class="row">
                                        <div class="col-12-xxxl col-lg-6 col-12 form-group">
                                            <label for="announcement_title">Title</label>
                                            <input class="form-control" placeholder="Exam Well Wishes" type="text" name="announcement_title" id="announcement_title">
                                        </div>

                                        <div class="col-12-xxxl col-lg-6 col-12 form-group">
                                            <label for="announcement_category">Category</label>
                                            <select id="announcement_category" class="select2">
                                                <option value="">Please Select</option>
                                                <option value="Class/Lecture">Class/Lecture</option>
                                                <option value="Assignment">Assignment</option>
                                                <option value="Quiz">Quiz</option>
                                                <option value="Exam">Exam</option>
                                                <option value="Schedule">Schedule</option>
                                                <option value="Course Material">Course Material</option>
                                                <option value="Course Outline">Course Outline</option>
                                                <option value="Course Lists">Course Lists</option>
                                                <option value="Class Lists">Class Lists</option>
                                                <option value="Other">Other</option>
                                            </select>
                                        </div>

                                        <div class="col-12-xxxl col-lg-12 col-12 form-group">
                                            <label for="announcement_description">Announcement Body</label>
                                            <textarea placeholder="Your final exams will begin on 29/11/22. I am confident we have covered all that needs to be covered. I wish you all success!" class="form-control" type="text" name="announcement_description" id="announcement_description"></textarea>
                                        </div>
                                    </div>
                                    <div class="mt-3">
                                        <button type="button" onclick="sendCourseAnnouncement('functions/makeCourseAnnouncement', getInputValuesAndReturnTheirContentAsJson(['announcement_title', 'announcement_category', 'announcement_description']))" id="save_new_announcement_button" class="btn-fill-lg btn-gradient-yellow btn-hover-bluedark">Send</button>
                                        <!-- <a href="new-course-announcement"  onclick="reset()" class="btn-fill-lg bg-blue-dark btn-hover-yellow">Reset</a> -->
                                    </div>
                                </form>
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
    <!-- Date Picker Js -->
    <script src="js/datepicker.min.js"></script>
    <!-- Custom Js -->
    <script src="js/main.js"></script>
    <?php require_once('includes/js_imports.php') ?>

</body>

</html>