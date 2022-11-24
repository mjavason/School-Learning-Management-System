<?php
require_once('config/connect.php');
require_once('functions/functions.php');
echo '<pre>';

//echo (getDepartmentId('Computer Engineering'));
//print_r(getCoursesTakenByStudent(2017030180311));
//print_r(getStudentLevel(2017030180311));

//$coursesTaken = getCoursesTakenByStudent($_SESSION['student_reg']);

//print_r(getCourseInfo(1));

//$courseResults = getResultsPerCourseTaken($coursesTaken, 1);
//$courseInfo = getCourseInfo(($courseResults['course_id']));
//print_r($courseResults);

// $studentLevel = calculateStudentLevel(2017030180311);
// $coursesTaken = getCoursesTakenByStudent(2017030180311);
// for ($i = 0; $i < count($coursesTaken); $i++) {
//     $courseResults = getResultsPerCourseTaken($coursesTaken, $i, getCourseSessionSemester($coursesTaken['course_id']));
//     if ($courseResults) {
//         $courseInfo = getCourseInfo($courseResults['course_id']);
//         $personalResult = getPersonalResult($courseResults['results'], $_SESSION['student_reg']);
//         if($personalResult != false){
//             print_r($personalResult);
//             echo ($personalResult);
//         }else{
//             echo 'no result found';
//         }
//     }
// }

//echo (calculateStudentLevel('2017/2018'));



// $_GET['year'] = 2018;
// $studentLevel = calculateStudentLevel($_SESSION['student_set']);
// $coursesTaken = getCoursesTakenByStudent($_SESSION['student_reg']);

// //loop through two semesters
// for ($h = 1; $h <= 2; $h++) {

//     //loop through each course taken by the student
//     for ($i = 0; $i < count($coursesTaken); $i++) {

//         //for each of the courses taken by the student get the result sheet
//         $courseResults = getResultsPerCourseTaken($coursesTaken[$i], $h, $_GET['year']);
//         if ($courseResults) {
//             $courseInfo = getCourseInfo($courseResults['course_id']);

//             //Search through the result sheet for this particular student's result and get their corresponding incourse and exam values
//             $personalResult = getPersonalResult($courseResults['results'], $_SESSION['student_reg']);
//             if ($personalResult) {
//                 echo ('level' . $i);
//                 echo '<br>';
//                 echo 'course code' . $courseInfo['course_code'];
//                 echo '<br>';

//                 echo 'Incourse:';
//                 if (isset($personalResult['incourse'])) {
//                     $incourse = compileIncourse($personalResult['incourse']);
//                     echo $incourse;
//                 } else {
//                     $incourse = 0;
//                     echo $incourse;
//                 }
//                 echo '<br>';
//                 echo 'Exam:';
//                 if (isset($personalResult['exam'])) {
//                     $exam = compileExam($personalResult['exam']);
//                     echo $exam;
//                 } else {
//                     $exam = 0;
//                     echo $exam;
//                 }

//                 echo '<br>';
//                 echo 'Grade:';
//                 echo returnGrade($incourse + $exam);
//             }
//         }
//     }
//     echo '<br>';
//     echo '<br>';
//     echo '<br>';
//     echo '<br>';
//     echo '<br>';
//     echo '<br>';
//     echo '<br>';
//     echo '<br>';
//     echo '<br>';
//     echo '<br>';
// }

// echo calculateGPAPerYear(2018, '2017030180311');

$studentLevel = calculateStudentLevel($_SESSION['student_set']);
$coursesTaken = getCoursesTakenByStudent($_SESSION['student_reg']);
$studentStarterYear = date('Y') - $studentLevel;
for ($i = $studentStarterYear; $i <= date('Y'); $i++) {
    $year = $i;

    echo ($i.': '. countCoursesPerYear($coursesTaken, $year));
    echo '<br>';
    // countCoursesPerYear($coursesTaken, $year);
}
