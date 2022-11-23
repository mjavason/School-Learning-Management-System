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

    <title>ESUT Result Repo: Cumulative Grade Point Average</title>

    <meta name="keywords" content="ESUT result school students courses upload" />
    <meta name="description" content="View course results online">
    <meta name="author" content="gamma group">

    <?php require_once('includes/head.php') ?>

    <!-- Admin Extension Specific Page Vendor CSS -->
    <link rel="stylesheet" href="../porto-admin/edge/vendor/morris/morris.css" />
    <link rel="stylesheet" href="../porto-admin/edge/vendor/chartist/chartist.min.css" />

    <!-- Admin Extension CSS -->
    <link rel="stylesheet" href="../porto-admin/edge/css/theme-admin-extension.css">

    <!-- Admin Extension Skin CSS -->
    <link rel="stylesheet" href="../porto-admin/edge/css/skins/extension.css">
</head>

<body data-plugin-scroll-spy data-plugin-options="{'target': '#header'}">

    <div class="body">

        <!-- header -->
        <?php require_once('includes/header.php') ?>

        <div role="main" class="main">
            <div class="container position-relative py-5" style="" id="home">
                <div class="row align-items-center py-5 mt-5 p-relative z-index-1">
                    <h1 class="card-title mb-2 font-weight-bold transition-2ms">CGPA Round Up <a href="#" class="btn btn-primary btn-with-arrow mb-2" href="#">Download<span><i class="fas fa-download"></i></span></a></h1>
                    <div class="col-lg-6">
                        <section class="card card-admin">
                            <header class="card-header">
                                <div class="card-actions">
                                    <a href="#" class="card-action card-action-toggle" data-card-toggle=""></a>
                                    <a href="#" class="card-action card-action-dismiss" data-card-dismiss=""></a>
                                </div>

                                <h2 class="card-title">Cumulative GPA Performance</h2>
                                <p class="card-subtitle">These are your performances through the years</p>
                            </header>
                            <div class="card-body" style="display: block;">

                                <!-- Flot: Bars -->
                                <div class="chart chart-md" id="flotBars" style="padding: 0px; position: relative;"><canvas class="flot-base" style="direction: ltr; position: absolute; left: 0px; top: 0px; width: 452px; height: 350px;" width="452" height="350"></canvas>
                                    <div class="flot-text" style="position: absolute; inset: 0px; font-size: smaller; color: rgb(84, 84, 84);">
                                        <div class="flot-x-axis flot-x1-axis xAxis x1Axis" style="position: absolute; inset: 0px;">
                                            <div style="position: absolute; max-width: 40px; top: 323px; left: 34px; text-align: center;" class="flot-tick-label tickLabel">Jan</div>
                                            <div style="position: absolute; max-width: 40px; top: 323px; left: 68px; text-align: center;" class="flot-tick-label tickLabel">Feb</div>
                                            <div style="position: absolute; max-width: 40px; top: 323px; left: 104px; text-align: center;" class="flot-tick-label tickLabel">Mar</div>
                                            <div style="position: absolute; max-width: 40px; top: 323px; left: 139px; text-align: center;" class="flot-tick-label tickLabel">Apr</div>
                                            <div style="position: absolute; max-width: 40px; top: 323px; left: 173px; text-align: center;" class="flot-tick-label tickLabel">May</div>
                                            <div style="position: absolute; max-width: 40px; top: 323px; left: 208px; text-align: center;" class="flot-tick-label tickLabel">Jun</div>
                                            <div style="position: absolute; max-width: 40px; top: 323px; left: 245px; text-align: center;" class="flot-tick-label tickLabel">Jul</div>
                                            <div style="position: absolute; max-width: 40px; top: 323px; left: 277px; text-align: center;" class="flot-tick-label tickLabel">Aug</div>
                                            <div style="position: absolute; max-width: 40px; top: 323px; left: 312px; text-align: center;" class="flot-tick-label tickLabel">Sep</div>
                                            <div style="position: absolute; max-width: 40px; top: 323px; left: 348px; text-align: center;" class="flot-tick-label tickLabel">Oct</div>
                                            <div style="position: absolute; max-width: 40px; top: 323px; left: 382px; text-align: center;" class="flot-tick-label tickLabel">Nov</div>
                                            <div style="position: absolute; max-width: 40px; top: 323px; left: 416px; text-align: center;" class="flot-tick-label tickLabel">Dec</div>
                                        </div>
                                        <div class="flot-y-axis flot-y1-axis yAxis y1Axis" style="position: absolute; inset: 0px;">
                                            <div style="position: absolute; top: 295px; left: 8px; text-align: right;" class="flot-tick-label tickLabel">0</div>
                                            <div style="position: absolute; top: 236px; left: 1px; text-align: right;" class="flot-tick-label tickLabel">1.0</div>
                                            <div style="position: absolute; top: 177px; left: 1px; text-align: right;" class="flot-tick-label tickLabel">2.0</div>
                                            <div style="position: absolute; top: 118px; left: 1px; text-align: right;" class="flot-tick-label tickLabel">3.0</div>
                                            <div style="position: absolute; top: 59px; left: 1px; text-align: right;" class="flot-tick-label tickLabel">4.0</div>
                                            <div style="position: absolute; top: 0px; left: 1px; text-align: right;" class="flot-tick-label tickLabel">5.0</div>
                                        </div>
                                    </div><canvas class="flot-overlay" style="direction: ltr; position: absolute; left: 0px; top: 0px; width: 452px; height: 350px;" width="452" height="350"></canvas>
                                </div>
                                <script type="text/javascript">
                                    var flotBarsData = [
                                        ["Jan", 2.8],
                                        ["Feb", 4.2],
                                        ["Mar", 2.5],
                                        ["Apr", 2.3],
                                        ["May", 3.7],
                                        ["Jun", 3.3],
                                        ["Jul", 1.8],
                                        ["Aug", 1.4],
                                        ["Sep", 1.8],
                                        ["Oct", 1.5],
                                        ["Nov", 4.0],
                                        ["Dec", 4.7]
                                    ];

                                    // See: js/examples/examples.charts.js for more settings.
                                </script>

                            </div>
                        </section>
                    </div>
                    <div class="col-lg-6">
                        <section class="card card-admin">
                            <header class="card-header">
                                <div class="card-actions">
                                    <a href="#" class="card-action card-action-toggle" data-card-toggle=""></a>
                                    <a href="#" class="card-action card-action-dismiss" data-card-dismiss=""></a>
                                </div>

                                <h2 class="card-title">Grade Average Chart</h2>
                                <p class="card-subtitle">These are the total number of occurences for A, B, C, D and F</p>
                            </header>
                            <div class="card-body" style="display: block;">

                                <!-- Flot: Pie -->
                                <div class="chart chart-md" id="flotPie" style="padding: 0px; position: relative;"><canvas class="flot-base" style="direction: ltr; position: absolute; left: 0px; top: 0px; width: 452px; height: 350px;" width="452" height="350"></canvas><canvas class="flot-overlay" style="direction: ltr; position: absolute; left: 0px; top: 0px; width: 452px; height: 350px;" width="452" height="350"></canvas>
                                    <span class="pieLabel" id="pieLabel0" style="position: absolute; top: 196px; left: 356.217px;">
                                        <div style="font-size:x-small;text-align:center;padding:2px;color:#0088cc;">A<br>40%</div>
                                    </span>
                                    <span class="pieLabel" id="pieLabel1" style="position: absolute; top: 240px; left: 76.9417px;">
                                        <div style="font-size:x-small;text-align:center;padding:2px;color:#2baab1;">B<br>10%</div>
                                    </span>
                                    <span class="pieLabel" id="pieLabel2" style="position: absolute; top: 122px; left: 48.875px;">
                                        <div style="font-size:x-small;text-align:center;padding:2px;color:#734ba9;">C<br>20%</div>
                                    </span>
                                    <span class="pieLabel" id="pieLabel3" style="position: absolute; top: 6px; left: 132.675px;">
                                        <div style="font-size:x-small;text-align:center;padding:2px;color:#E36159;">D<br>15%</div>
                                    </span>
                                    <span class="pieLabel" id="pieLabel4" style="position: absolute; top: 6px; left: 132.675px;">
                                        <div style="font-size:x-small;text-align:center;padding:2px;color:#E36159;">F<br>15%</div>
                                    </span>
                                </div>
                                <script type="text/javascript">
                                    var flotPieData = [{
                                            label: "A",
                                            data: [
                                                [1, 40]
                                            ],
                                            color: '#2baab1'

                                        }, {
                                            label: "B",
                                            data: [
                                                [1, 10]
                                            ],
                                            color: '#0088cc'
                                        }, {
                                            label: "C",
                                            data: [
                                                [1, 20]
                                            ],
                                            color: '#734ba9'
                                        }, {
                                            label: "D",
                                            data: [
                                                [1, 15]
                                            ],
                                            color: '#E36159'
                                        },
                                        {
                                            label: "F",
                                            data: [
                                                [1, 15]
                                            ],
                                            color: 'red'
                                        }
                                    ];

                                    // See: js/examples/examples.charts.js for more settings.
                                </script>

                            </div>
                        </section>
                    </div>
                </div>
            </div>

            <div class="container position-relative py-5" style="min-height: 643px;" id="home">
                <?php require_once('includes/svg_animation.php') ?>
                <div class="row align-items-center py-5 mt-5 p-relative z-index-1">
                    <h1 class="card-title mb-2 font-weight-bold transition-2ms">CGPA Per Year <a href="#" class="btn btn-primary btn-with-arrow mb-2" href="#">Download<span><i class="fas fa-download"></i></span></a></h1>

                    <?php
                    $studentLevel = calculateStudentLevel($_SESSION['student_set']);
                    $coursesTaken = getCoursesTakenByStudent($_SESSION['student_reg']);

                    for ($i = 0; $i < $studentLevel; $i++) {
                        $year = date('Y') - $studentLevel + $i + 1;
                    ?>
                        <div class="col-md-6 p-1 col-lg-4 appear-animation" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="600">
                            <div class="card bg-color-grey card-text-color-hover-light border-0 bg-color-hover-primary transition-2ms box-shadow-1 box-shadow-1-primary box-shadow-1-hover">
                                <a href="courses?year=<?php echo $year; ?>&level=<?= $i + 1 ?>">
                                    <div class="card-body">
                                        <h4 class="card-title mb-1 text-4 font-weight-bold transition-2ms">
                                            Year <?php echo $i + 1; ?> (<?php echo ($year) ?>)
                                        </h4>
                                        GPA: <?= countCoursesPerYear($coursesTaken, $year) ?>
                                    </div>
                                </a>
                            </div>
                        </div>
                    <?php } ?>

                </div>
            </div>




        </div>

        <!-- footer		 -->
        <?php require_once('includes/footer.php') ?>


    </div>

    <?php require_once('includes/js_imports.php') ?>

    <!-- Admin Extension -->
    <script src="../porto-admin/edge/js/theme.admin.extension.js"></script>

    <!-- Admin Extension Examples -->
    <script src="../porto-admin/edge/vendor/jquery.easy-pie-chart/jquery.easypiechart.js"></script>
    <script src="../porto-admin/edge/vendor/flot/jquery.flot.js"></script>
    <script src="../porto-admin/edge/vendor/flot.tooltip/jquery.flot.tooltip.js"></script>
    <script src="../porto-admin/edge/vendor/flot/jquery.flot.pie.js"></script>
    <script src="../porto-admin/edge/vendor/flot/jquery.flot.categories.js"></script>
    <script src="../porto-admin/edge/vendor/flot/jquery.flot.resize.js"></script>
    <script src="../porto-admin/edge/vendor/jquery-sparkline/jquery.sparkline.js"></script>
    <script src="../porto-admin/edge/vendor/raphael/raphael.js"></script>
    <script src="../porto-admin/edge/vendor/morris/morris.js"></script>
    <script src="../porto-admin/edge/vendor/gauge/gauge.js"></script>
    <script src="../porto-admin/edge/vendor/snap.svg/snap.svg.js"></script>
    <script src="../porto-admin/edge/vendor/liquid-meter/liquid.meter.js"></script>
    <script src="../porto-admin/edge/vendor/chartist/chartist.js"></script>

    <!-- Admin Extension Examples -->
    <script src="../porto-admin/edge/js/examples/examples.charts.js"></script>

    <style>
        #ChartistCSSAnimation .ct-series.ct-series-a .ct-line {
            fill: none;
            stroke-width: 4px;
            stroke-dasharray: 5px;
            -webkit-animation: dashoffset 1s linear infinite;
            -moz-animation: dashoffset 1s linear infinite;
            animation: dashoffset 1s linear infinite;
        }

        #ChartistCSSAnimation .ct-series.ct-series-b .ct-point {
            -webkit-animation: bouncing-stroke 0.5s ease infinite;
            -moz-animation: bouncing-stroke 0.5s ease infinite;
            animation: bouncing-stroke 0.5s ease infinite;
        }

        #ChartistCSSAnimation .ct-series.ct-series-b .ct-line {
            fill: none;
            stroke-width: 3px;
        }

        #ChartistCSSAnimation .ct-series.ct-series-c .ct-point {
            -webkit-animation: exploding-stroke 1s ease-out infinite;
            -moz-animation: exploding-stroke 1s ease-out infinite;
            animation: exploding-stroke 1s ease-out infinite;
        }

        #ChartistCSSAnimation .ct-series.ct-series-c .ct-line {
            fill: none;
            stroke-width: 2px;
            stroke-dasharray: 40px 3px;
        }

        /* Chartist Skin */
        .ct-chart .tooltip {
            background: #0088cc;
        }

        .ct-chart .tooltip:after {
            border-top-color: #0088cc;
        }

        .ct-chart .ct-series.ct-series-a .ct-bar,
        .ct-chart .ct-series.ct-series-a .ct-line,
        .ct-chart .ct-series.ct-series-a .ct-point,
        .ct-chart .ct-series.ct-series-a .ct-slice.ct-donut {
            stroke: #0088cc;
        }

        .ct-chart .ct-series.ct-series-a .ct-area,
        .ct-chart .ct-series.ct-series-a .ct-slice:not(.ct-donut) {
            fill: #0088cc;
        }

        .ct-chart .ct-series.ct-series-b .ct-bar,
        .ct-chart .ct-series.ct-series-b .ct-line,
        .ct-chart .ct-series.ct-series-b .ct-point,
        .ct-chart .ct-series.ct-series-b .ct-slice.ct-donut {
            stroke: #005580;
        }

        .ct-chart .ct-series.ct-series-b .ct-area,
        .ct-chart .ct-series.ct-series-b .ct-slice:not(.ct-donut) {
            fill: #005580;
        }

        .ct-chart .ct-series.ct-series-i .ct-bar,
        .ct-chart .ct-series.ct-series-i .ct-line,
        .ct-chart .ct-series.ct-series-i .ct-point,
        .ct-chart .ct-series.ct-series-i .ct-slice.ct-donut {
            stroke: #005580;
        }

        .ct-chart .ct-series.ct-series-i .ct-area,
        .ct-chart .ct-series.ct-series-i .ct-slice:not(.ct-donut) {
            fill: #005580;
        }

        .ct-chart .ct-series.ct-series-j .ct-bar,
        .ct-chart .ct-series.ct-series-j .ct-line,
        .ct-chart .ct-series.ct-series-j .ct-point,
        .ct-chart .ct-series.ct-series-j .ct-slice.ct-donut {
            stroke: #1ab2ff;
        }

        .ct-chart .ct-series.ct-series-j .ct-area,
        .ct-chart .ct-series.ct-series-j .ct-slice:not(.ct-donut) {
            fill: #1ab2ff;
        }

        .ct-chart .ct-series.ct-series-n .ct-bar,
        .ct-chart .ct-series.ct-series-n .ct-line,
        .ct-chart .ct-series.ct-series-n .ct-point,
        .ct-chart .ct-series.ct-series-n .ct-slice.ct-donut {
            stroke: #00111a;
        }

        .ct-chart .ct-series.ct-series-n .ct-area,
        .ct-chart .ct-series.ct-series-n .ct-slice:not(.ct-donut) {
            fill: #00111a;
        }

        .ct-chart .ct-series.ct-series-o .ct-bar,
        .ct-chart .ct-series.ct-series-o .ct-line,
        .ct-chart .ct-series.ct-series-o .ct-point,
        .ct-chart .ct-series.ct-series-o .ct-slice.ct-donut {
            stroke: #80d4ff;
        }

        .ct-chart .ct-series.ct-series-o .ct-area,
        .ct-chart .ct-series.ct-series-o .ct-slice:not(.ct-donut) {
            fill: #80d4ff;
        }

        @-webkit-keyframes dashoffset {
            0% {
                stroke-dashoffset: 0px;
            }

            100% {
                stroke-dashoffset: -20px;
            }

            ;
        }

        @-moz-keyframes dashoffset {
            0% {
                stroke-dashoffset: 0px;
            }

            100% {
                stroke-dashoffset: -20px;
            }

            ;
        }

        @keyframes dashoffset {
            0% {
                stroke-dashoffset: 0px;
            }

            100% {
                stroke-dashoffset: -20px;
            }

            ;
        }

        @-webkit-keyframes bouncing-stroke {
            0% {
                stroke-width: 5px;
            }

            50% {
                stroke-width: 10px;
            }

            100% {
                stroke-width: 5px;
            }

            ;
        }

        @-moz-keyframes bouncing-stroke {
            0% {
                stroke-width: 5px;
            }

            50% {
                stroke-width: 10px;
            }

            100% {
                stroke-width: 5px;
            }

            ;
        }

        @keyframes bouncing-stroke {
            0% {
                stroke-width: 5px;
            }

            50% {
                stroke-width: 10px;
            }

            100% {
                stroke-width: 5px;
            }

            ;
        }

        @-webkit-keyframes exploding-stroke {
            0% {
                stroke-width: 2px;
                opacity: 1;
            }

            100% {
                stroke-width: 20px;
                opacity: 0;
            }

            ;
        }

        @-moz-keyframes exploding-stroke {
            0% {
                stroke-width: 2px;
                opacity: 1;
            }

            100% {
                stroke-width: 20px;
                opacity: 0;
            }

            ;
        }

        @keyframes exploding-stroke {
            0% {
                stroke-width: 2px;
                opacity: 1;
            }

            100% {
                stroke-width: 20px;
                opacity: 0;
            }

            ;
        }
    </style>


</body>

</html>