<?php
require_once('config/connect.php');
require_once('functions/functions.php');

if (!isset($_SESSION['log'])) {
    gotoPage("../index");
}
if (isset($_SESSION['super_log'])) {
    gotoPage("../admin/index");
}
if (isset($_SESSION['ultra_log'])) {
    gotoPage("../super_admin/index");
}
?>
<!DOCTYPE html>

<head>

    <!-- Basic -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>AKKHOR | Course Registration Page</title>

    <meta name="keywords" content="ESUT result school students courses upload" />
    <meta name="description" content="Register Courses For Result Viewing">
    <meta name="author" content="gamma group">

    <?php require_once('includes/head.php') ?>
</head>

<body data-plugin-scroll-spy data-plugin-options="{'target': '#header'}">

    <div class="body">

        <!-- header -->
        <?php require_once('includes/header.php') ?>

        <div role="main" m class="main">
            <br>
            <!-- Registration Form -->
            <form style="min-height: 643px;" id="demo-form" class="contact-form white-popup-block" action="https://www.okler.net/previews/porto/9.8.0/php/contact-form" method="POST">
                <div class="row mt-2">
                    <div class="col-sm-12">
                        <h2 class="font-weight-bold text-center text-7 mb-4">Register Course</h2>
                    </div>
                </div>
                <div class="custom-form-style-1 custom-form-style-1-rounded">
                    <!-- firstname -->
                    <div class="row">
                        <div class="form-group col mb-2">
                            <input onkeyup="simpleAsyncSearch('functions/findCourse', 'course_name'), checkIfAllFormFieldsFilled('sign_up_button',getInputValuesAndReturnTheirContentAsJson(['course_name']))" id="course_name" type="text" name="name" class="form-control" placeholder="COURSE NAME* COURSE CODE*" data-msg-required="Please enter correct course name" required>
                            <div class="" id="line"></div>
                            <!-- line loader end-->
                            <ul id="course_list">
                                <!-- <li data-dialog="somedialog" class="trigger" class="trigger lecturer_item"> <a href="#">Item1</a> </li>
                                                <li class="lecturer_item"><a href="#">Item1</a></li>
                                                <li class="lecturer_item"><a href="#">Item1</a></li>
                                                </li> -->

                            </ul>
                        </div>
                    </div>

                    <!-- submit button -->
                    <div class="row">
                        <div class="form-group col mb-0">
                            <input id="sign_up_button" disabled type="button" onclick="registerCourse('functions/registerCourse', getInputValuesAndReturnTheirContentAsJson((['course_name'])))" class="btn btn-primary btn-outline btn-rounded font-weight-semibold text-center text-4 btn-py-2 w-100 mb-3" value="Register Course" data-loading-text="Loading...">
                        </div>
                    </div>
                </div>

            </form>

        </div>



        <!-- footer		 -->
        <?php require_once('includes/footer.php') ?>


    </div>


    <?php require_once('includes/js_imports.php') ?>

</body>

</html>