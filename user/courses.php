<?php
require_once('config/connect.php');
require_once('functions/functions.php');

if (!isset($_SESSION['log'])) {
    gotoPage("index");
}
if (isset($_SESSION['super_log'])) {
    gotoPage("../admin/index");
}
if (isset($_SESSION['ultra_log'])) {
    gotoPage("../super_admin/index");
}
if (!isset($_GET['year'])) {
    gotoPage('dashboard');
}
?>
<!DOCTYPE html>

<head>
    <!-- Basic -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>ESUT Result Repo</title>

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
                    <h1 class="card-title mb-2 font-weight-bold transition-2ms">Year <?= $_GET['level'] ?> Courses and Grades <a href="#" class="btn btn-primary btn-with-arrow mb-2" href="#">Download<span><i class="fas fa-download"></i></span></a></h1>



                    <div class="row">
                        <div class="col">

                            <div class="tabs tabs-bottom tabs-center tabs-simple">
                                <ul class="nav nav-tabs">
                                    <li class="nav-item">
                                        <a class="nav-link active" href="#firstSemester" data-bs-toggle="tab">First Semester</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="#secondSemester" data-bs-toggle="tab">Second Semester</a>
                                    </li>
                                </ul>



                                <div class="tab-content">
                                    <div class="tab-pane active" id="firstSemester">
                                        <!-- First Semester Start -->
                                        <div id="first" role="main" class="main mt-5">

                                            <section class="page-header page-header-modern bg-color-light-scale-1 page-header-lg">
                                                <div class="container">
                                                    <div class="row">
                                                        <div class="col-md-12 align-self-center p-static order-2 text-center">
                                                            <h1 class="font-weight-bold text-dark">First Semester</h1>
                                                        </div>
                                                        <div class="col-md-12 align-self-center order-1">
                                                            <ul class="breadcrumb d-block text-center">
                                                                <li><a href="index">Dashboard</a></li>
                                                                <li class="active">Year <?= $_GET['level'] ?> Courses</li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </section>

                                            <div class="container pt-3 pb-2">

                                                <!-- <div class="row">
                                                    <form action="post">
                                                        <input placeholder="*CEE121 **COMPUTER ENGINEERING" class="form-control" type="text" name="course" id="course">
                                                    </form>
                                                </div> -->
                                                <div class="row">

                                                    <div class="course_head row align-items-center py-5 p-relative z-index-1">

                                                        <?php
                                                        $studentLevel = calculateStudentLevel($_SESSION['student_set']);
                                                        $coursesTaken = getCoursesTakenByStudent($_SESSION['student_reg']);
                                                        for ($i = 0; $i < count($coursesTaken); $i++) {
                                                            $courseResults = getResultsPerCourseTaken($coursesTaken[$i], 1, $_GET['year']);
                                                            if ($courseResults) {
                                                                $courseInfo = getCourseInfo($courseResults['course_id']);
                                                                $personalResult = getPersonalResult($courseResults['results'], $_SESSION['student_reg']);
                                                                if ($personalResult) {
                                                        ?>
                                                                    <div class="courses1 col-md-6 p-1 col-lg-4 appear-animation" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="600">
                                                                        <div class="courses2 card bg-color-grey card-text-color-hover-light border-0 bg-color-hover-primary transition-2ms box-shadow-1 box-shadow-1-primary box-shadow-1-hover">
                                                                            <!-- <a href="courses?level=<?php echo $i; ?>"> -->
                                                                            <div class="courses3 card-body">
                                                                                <h4 class="course_name card-title mb-1 text-4 font-weight-bold transition-2ms">
                                                                                    <?php echo $courseInfo['course_name']; ?> <span class="course_code">(<?php echo $courseInfo['course_code']; ?>)</span>
                                                                                </h4>
                                                                                <?php ?>
                                                                                Incourse: <?php
                                                                                            if (isset($personalResult['incourse'])) {
                                                                                                $incourse = compileIncourse($personalResult['incourse']);
                                                                                                echo $incourse;
                                                                                            } else {
                                                                                                $incourse = 0;
                                                                                                echo $incourse;
                                                                                            } ?>
                                                                                <br>
                                                                                Exam: <?php if (isset($personalResult['exam'])) {
                                                                                            $exam = compileExam($personalResult['exam']);
                                                                                            echo $exam;
                                                                                        } else {
                                                                                            $exam = 0;
                                                                                            echo $exam;
                                                                                        }
                                                                                        ?>
                                                                                <?php  ?>
                                                                                <br>
                                                                                Grade: <?php echo returnGrade($incourse + $exam); ?>
                                                                            </div>
                                                                            <!-- </a> -->
                                                                        </div>
                                                                    </div>
                                                        <?php }
                                                            }
                                                        } ?>

                                                    </div>

                                                </div>

                                            </div>

                                        </div>
                                        <!-- First Semester End -->
                                    </div>




                                    <div class="tab-pane" id="secondSemester">
                                        <!-- Second Semester Start -->
                                        <div id="second" role="main" class="main mt-5">

                                            <section class="page-header page-header-modern bg-color-light-scale-1 page-header-lg">
                                                <div class="container">
                                                    <div class="row">
                                                        <div class="col-md-12 align-self-center p-static order-2 text-center">
                                                            <h1 class="font-weight-bold text-dark">Second Semester</h1>
                                                        </div>
                                                        <div class="col-md-12 align-self-center order-1">
                                                            <ul class="breadcrumb d-block text-center">
                                                                <li><a href="index">Dashboard</a></li>
                                                                <li class="active">Year <?= $_GET['level'] ?> Courses</li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </section>

                                            <div class="container pt-3 pb-2">

                                                <div class="row pt-2">

                                                    <div class="course_head2 row align-items-center py-5 p-relative z-index-1">

                                                        <?php
                                                        $studentLevel = calculateStudentLevel($_SESSION['student_set']);
                                                        $coursesTaken = getCoursesTakenByStudent($_SESSION['student_reg']);
                                                        for ($i = 0; $i < count($coursesTaken); $i++) {
                                                            $courseResults = getResultsPerCourseTaken($coursesTaken[$i], 2, $_GET['year']);
                                                            if ($courseResults) {
                                                                $courseInfo = getCourseInfo($courseResults['course_id']);
                                                                $personalResult = getPersonalResult($courseResults['results'], $_SESSION['student_reg']);
                                                                if ($personalResult) {
                                                        ?>
                                                                    <div class="courses1 col-md-6 p-1 col-lg-4 appear-animation" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="600">
                                                                        <div class="courses2 card bg-color-grey card-text-color-hover-light border-0 bg-color-hover-primary transition-2ms box-shadow-1 box-shadow-1-primary box-shadow-1-hover">
                                                                            <!-- <a href="courses?level=<?php echo $i; ?>"> -->
                                                                            <div class="courses3 card-body">
                                                                                <h4 class="course_name card-title mb-1 text-4 font-weight-bold transition-2ms">
                                                                                    <?php echo $courseInfo['course_name']; ?> <span class="course_code">(<?php echo $courseInfo['course_code']; ?>)</span>
                                                                                </h4>
                                                                                <?php ?>
                                                                                Incourse: <?php
                                                                                            if (isset($personalResult['incourse'])) {
                                                                                                $incourse = compileIncourse($personalResult['incourse']);
                                                                                                echo $incourse;
                                                                                            } else {
                                                                                                $incourse = 0;
                                                                                                echo $incourse;
                                                                                            } ?>
                                                                                <br>
                                                                                Exam: <?php if (isset($personalResult['exam'])) {
                                                                                            $exam = compileExam($personalResult['exam']);
                                                                                            echo $exam;
                                                                                        } else {
                                                                                            $exam = 0;
                                                                                            echo $exam;
                                                                                        }
                                                                                        ?>
                                                                                <?php  ?>
                                                                                <br>
                                                                                Grade: <?php echo returnGrade($incourse + $exam); ?>
                                                                            </div>
                                                                            <!-- </a> -->
                                                                        </div>
                                                                    </div>
                                                        <?php }
                                                            }
                                                        } ?>

                                                    </div>
                                                </div>

                                            </div>

                                        </div>
                                        <!-- second semester end -->
                                    </div>




                                </div>
                            </div>
                        </div>
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
<!-- Chart and Overview -->
<!-- <div id="first" role="main" class="main mt-5">

                        <section class="page-header page-header-modern bg-color-light-scale-1 page-header-lg">
                            <div class="container">
                                <div class="row">
                                    <div class="col-md-12 align-self-center p-static order-2 text-center">
                                        <h1 class="font-weight-bold text-dark">First Semester</h1>
                                    </div>
                                    <div class="col-md-12 align-self-center order-1">
                                        <ul class="breadcrumb d-block text-center">
                                            <li><a href="#">Dashboard</a></li>
                                            <li class="active">Year <?= $_GET['level'] ?> Courses</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </section>

                        <div class="container pt-3 pb-2">

                            <div class="row pt-2">

                                <div class="col">

                                    <h2 class="font-weight-normal text-7 mb-2"><strong class="font-weight-extra-bold">Full</strong> Width Page</h2>
                                    <p class="lead">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur pellentesque neque eget diam posuere porta. Quisque ut nulla at nunc <a href="#">vehicula</a> lacinia. Proin adipiscing porta tellus, ut feugiat nibh adipiscing sit amet. In eu justo a felis faucibus ornare vel id metus. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; In eu libero ligula.</p>
                                    <img class="float-start img-fluid" width="300" height="211" src="img/device.png" alt="Device">
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur pellentesque neque eget diam posuere porta. Quisque ut nulla at nunc <a href="#">vehicula</a> lacinia. Proin adipiscing porta tellus, ut feugiat nibh adipiscing sit amet. In eu justo a felis faucibus ornare vel id metus. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; In eu libero ligula. Fusce eget metus lorem, ac viverra leo. Nullam convallis, arcu vel pellentesque sodales, nisi est varius diam, ac ultrices sem ante quis sem. Proin ultricies volutpat sapien, nec scelerisque ligula mollis lobortis.</p>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur pellentesque neque eget diam posuere porta. Quisque ut nulla at nunc <a href="#">vehicula</a> lacinia. Proin adipiscing porta tellus, ut feugiat nibh adipiscing sit amet. In eu justo a felis faucibus ornare vel id metus. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; In eu libero ligula. Fusce eget metus lorem, ac viverra leo. Nullam convallis, arcu vel pellentesque sodales, nisi est varius diam, ac ultrices sem ante quis sem. Proin ultricies volutpat sapien, nec scelerisque ligula mollis lobortis.</p>
                                    <p>Curabitur pellentesque neque eget diam posuere porta. Quisque ut nulla at nunc vehicula lacinia. Proin adipiscing porta tellus, ut feugiat nibh adipiscing sit amet. In eu justo a felis faucibus ornare vel id metus. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; In eu libero ligula. Fusce eget metus lorem, ac viverra leo. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; In eu libero ligula. Fusce eget metus lorem, ac viverra leo. Vestibulum ante ipsum primis in faucibus orci.</p>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur pellentesque neque eget diam posuere porta. Quisque ut nulla at nunc <a href="#">vehicula</a> lacinia. Proin adipiscing porta tellus, ut feugiat nibh adipiscing sit amet. In eu justo a felis faucibus ornare vel id metus. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; In eu libero ligula. Fusce eget metus lorem, ac viverra leo. Nullam convallis, arcu vel pellentesque sodales, nisi est varius diam, ac ultrices sem ante quis sem. Proin ultricies volutpat sapien, nec scelerisque ligula mollis lobortis.</p>
                                    <p class="m-0">Curabitur pellentesque neque eget diam posuere porta. Quisque ut nulla at nunc vehicula lacinia. Proin adipiscing porta tellus, ut feugiat nibh adipiscing sit amet. In eu justo a felis faucibus ornare vel id metus. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; In eu libero ligula. Fusce eget metus lorem, ac viverra leo. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; In eu libero ligula. Fusce eget metus lorem, ac viverra leo. Vestibulum ante ipsum primis in faucibus orci.</p>

                                </div>

                            </div>

                        </div>

                    </div> -->
<!-- Chart and Overview start -->
<!-- Semester Bar -->
<!-- <aside class="nav-secondary pt-2 pb-0" id="navSecondary" data-plugin-sticky data-plugin-options="{'minWidth': 991, 'padding': {'top': 71}}">
                        <div class="container">
                            <div class="row">
                                <div class="col">
                                    <div class="tabs tabs-bottom tabs-center tabs-simple m-0">
                                        <ul class="nav nav-tabs nav-fill m-0">
                                            <li class="nav-item m-0"><a class="nav-link" data-hash data-hash-offset="0" data-hash-offset-lg="150" href="#first">First Semester</a></li>
                                            <li class="nav-item m-0"><a class="nav-link" data-hash data-hash-offset="0" data-hash-offset-lg="150" href="#second">Second Semester</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </aside> -->
<!-- Semester Bar End -->