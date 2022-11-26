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

    <title>ESUT Result Repo: Announcements</title>

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
                    <h1 class="card-title mb-2 font-weight-bold transition-2ms">View All Announcements</h1>

                    <?php
                    $announcements = getAllAnnouncementsForStudent($_SESSION['student_reg']);
                    $readAnnouncements = getReadOrUnreadAnnouncements($announcements, $_SESSION['student_id']);
                    $unreadAnnouncements = getReadOrUnreadAnnouncements($announcements, $_SESSION['student_id'], true);

                    foreach ($unreadAnnouncements as $uAnnouncement) {
                        $courseInfo = getCourseInfo($uAnnouncement['course_id'])
                    ?>
                        <div class="col-md-6 p-1 col-lg-4 appear-animation" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="600">
                            <div class="card bg-color-grey card-text-color-hover-light border-0 bg-color-hover-primary transition-2ms box-shadow-1 box-shadow-1-primary box-shadow-1-hover">
                                <a onclick="toggleFullMessage('functions/toggleFullMessage?announcement_id=<?= $uAnnouncement['id'] ?>', '<?= $uAnnouncement['title'] ?>')">
                                    <div class="card-body">
                                        <h4 class="card-title mb-1 text-4 font-weight-bold transition-2ms">
                                            <?= substr($uAnnouncement['title'], 0, 25) ?><span class="badge badge-primary m-1"><i class="fa fa-envelope"></i></span>
                                        </h4>
                                        <br>
                                        Category: <?= $uAnnouncement['category'] ?>
                                        <br>
                                        Course: <?= $courseInfo['course_name'] . ' [' . $courseInfo['course_code'] . ']' ?>
                                        <br>
                                        Date: <?= formatDateFriendlier($uAnnouncement['date_updated']) ?>
                                    </div>
                                </a>
                            </div>
                        </div>
                    <?php
                    }
                    ?>

                    <?php


                    foreach ($readAnnouncements as $rAnnouncement) {
                        $courseInfo = getCourseInfo($rAnnouncement['course_id'])
                    ?>
                        <div onclick="toggleFullMessage('functions/toggleFullMessage?announcement_id=<?= $rAnnouncement['id'] ?>', '<?= $rAnnouncement['title'] ?>')" class="col-md-6 p-1 col-lg-4 appear-animation" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="600">
                            <div class="card bg-color-grey card-text-color-hover-light border-0 bg-color-hover-primary transition-2ms box-shadow-1 box-shadow-1-primary box-shadow-1-hover">
                                <a onclick="toggleFullMessage('functions/toggleFullMessage?announcement_id=<?= $rAnnouncement['id'] ?>', '<?= $rAnnouncement['title'] ?>')">
                                    <div class="card-body">
                                        <h4 class="card-title mb-1 text-4 font-weight-bold transition-2ms">
                                            <?= substr($rAnnouncement['title'], 0, 25) ?>
                                        </h4>
                                        <br>
                                        Category: <?= $rAnnouncement['category'] ?>
                                        <br>
                                        Course: <?= $courseInfo['course_name'] . ' [' . $courseInfo['course_code'] . ']' ?>
                                        <br>
                                        Date: <?= formatDateFriendlier($rAnnouncement['date_updated']) ?>
                                    </div>
                                </a>
                            </div>
                        </div>
                    <?php
                    }
                    ?>



                </div>
            </div>




        </div>

        <!-- footer		 -->
        <?php require_once('includes/footer.php') ?>


    </div>

    <?php require_once('includes/js_imports.php') ?>


</body>

</html>