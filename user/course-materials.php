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

    <title>ESUT Result Repo: Course Materials</title>

    <meta name="keywords" content="ESUT result school students courses upload" />
    <meta name="description" content="View course results online">
    <meta name="author" content="gamma group">

    <?php require_once('includes/head.php') ?>
</head>

<body data-plugin-scroll-spy data-plugin-options="{'target': '#header'}">

    <div class="body">

        <!-- header -->
        <?php require_once('includes/header.php') ?>

        <div role="main" class="main">

            <div class="container position-relative py-5" style="min-height: 643px;" id="home">
                <?php require_once('includes/svg_animation.php') ?>
                <div class="row align-items-center py-5 mt-5 p-relative z-index-1">
                    <h1 class="card-title mb-2 font-weight-bold transition-2ms">All Course Materials</h1>

                    <div class="material_head">
                        <?php
                        $materials = getAllMaterialsForStudent($_SESSION['student_reg']);

                        if (!empty($materials)) {
                            foreach ($materials as $material) {
                                $courseInfo = getCourseInfo($material['course_id']);
                                $lecturerInfo = getLecturerInfo($material['lecturer_id']);
                        ?>
                                <div class="materials1 col-md-6 p-1 col-lg-4 appear-animation" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="600">
                                    <div class="materials2 card bg-color-grey card-text-color-hover-light border-0 bg-color-hover-primary transition-2ms box-shadow-1 box-shadow-1-primary box-shadow-1-hover">
                                        <a href="<?= $material['link'] ?>">
                                            <div class="materials3 card-body">
                                                <h4 class="material_title card-title mb-1 text-4 font-weight-bold transition-2ms">
                                                    <?= $material['title'] ?>
                                                    <!-- <span class="badge badge-primary m-1"><i class="fa fa-envelope"></i></span> -->
                                                </h4>
                                                <br>
                                                Category: <span class="material_category"><?= $material['category'] ?></span>
                                                <br>
                                                Course: <span class="material_course"><?= $courseInfo['course_name'] . ' [' . $courseInfo['course_code'] . ']' ?></span>
                                                <br>
                                                Date: <span class="material_date"><?= formatDateFriendlier($material['date_updated']) ?></span>
                                                <br>
                                                By: <span class="material_lecturer"><strong><?= $lecturerInfo['first_name'] . ' ' . $lecturerInfo['last_name'] ?></strong></span>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                        <?php
                            }
                        }
                        ?>


                    </div>
                </div>
            </div>




        </div>

        <!-- footer		 -->
        <?php require_once('includes/footer.php') ?>


    </div>

    <?php require_once('includes/js_imports.php') ?>


</body>

</html>