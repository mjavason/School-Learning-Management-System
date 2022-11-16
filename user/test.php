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

echo 'hello world';