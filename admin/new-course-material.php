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
    <title>AKKHOR | <?= $_SESSION['active_course_code'] ?> Add New Course Material</title>
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
                    <h3>Course Material</h3>
                    <ul>
                        <li>
                            <a href="index">Home</a>
                        </li>
                        <li> <?= $_SESSION['active_course_code'] ?> New Course Material</li>
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
                                        <h3><?= $_SESSION['active_course_code'] ?> New Course Material</h3>
                                    </div>
                                    <div class="dropdown">
                                        <a class="dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-expanded="false">...</a>

                                        <div class="dropdown-menu dropdown-menu-right">
                                            <a class="dropdown-item" href="course-materials"><i class="fas fa-times text-orange-red"></i>Close</a>
                                            <!-- <a class="dropdown-item" href="#"><i class="fas fa-cogs text-dark-pastel-green"></i>Edit</a> -->
                                            <a class="dropdown-item" href="new-course-material"><i class="fas fa-redo-alt text-orange-peel"></i>Refresh</a>
                                        </div>
                                    </div>
                                </div>
                                <form class="new-added-form" method="POST" action="test">
                                    <div class="row">
                                        <div class="col-12-xxxl col-lg-6 col-12 form-group">
                                            <label for="material_title">Material Title</label>
                                            <input class="form-control" placeholder="Calculus & Coordinate Geometry" type="text" name="material_title" id="material_title">
                                        </div>


                                        <div class="col-12-xxxl col-lg-6 col-12 form-group">
                                            <label for="material_link">Material Link (Google Drive)</label>
                                            <input placeholder="https://googledrive.com?file=e9839wrewx" class="form-control" type="text" name="material_link" id="material_link">
                                        </div>

                                        <div class="col-12-xxxl col-lg-6 col-12 form-group">
                                            <label for="material_writer">Material Writer</label>
                                            <input placeholder="Einstein" class="form-control" type="text" name="material_writer" id="material_writer">
                                        </div>
                                        <div class="col-12-xxxl col-lg-6 col-12 form-group">
                                            <label for="material_category">Material Category</label>
                                            <select id="material_category" class="select2">
                                                <option value="">Please Select</option>
                                                <option value="Lecture Note">Lecture Note</option>
                                                <option value="Assignment">Assignment</option>
                                                <option value="Textbook">Textbook</option>
                                                <option value="Site">Site</option>
                                                <option value="Other">Other</option>
                                            </select>
                                        </div>
                                        <div class="col-12-xxxl col-lg-6 col-12 form-group">
                                            <label for="material_description">Material Description</label>
                                            <textarea placeholder="This is the offical material for Computer Engineers; ensure to read it; especially chapter 4 and 8" class="form-control" type="text" name="material_description" id="material_description"></textarea>
                                        </div>
                                    </div>
                                    <div class="mt-3">
                                        <button type="button" onclick="addNewMaterial('functions/createNewCourseMaterial', getInputValuesAndReturnTheirContentAsJson(['material_title', 'material_link', 'material_writer', 'material_category', 'material_description']))" id="save_new_material_button" class="btn-fill-lg btn-gradient-yellow btn-hover-bluedark">Save</button>
                                        <!-- <a href="new-course-material"  onclick="reset()" class="btn-fill-lg bg-blue-dark btn-hover-yellow">Reset</a> -->
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