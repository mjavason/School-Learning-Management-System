<?php
require_once('../config/connect.php');
require_once('functions.php');
//die;

extract($_POST);
switch ($_POST) {
    case (isset($course_name)):
        # code...
        $courseInfo = getCourseInfoFromName($course_name);
        $coursesTaken = getCoursesTakenByStudent($_SESSION['student_reg']);
        if ($courseInfo) {
            $resultSlashSessionInfo = checkIfCourseSessionExistsAndReturnInfo($courseInfo['id']);
            if ($resultSlashSessionInfo) {
                if (!doesCourseRegistrationHaveDuplicate($_SESSION['student_reg'], $resultSlashSessionInfo['id'])) {
                    if (addNewCourseToStudent($courseInfo['id'], $resultSlashSessionInfo['id'], $resultSlashSessionInfo['course_credits'], $resultSlashSessionInfo['set_year'], $_SESSION['student_reg'])) {
                        print json_encode([['success' => 'Course registered successfully']]);
                    } else {
                        print json_encode([['error' => 'Unknown DB error occured']]);
                    }
                } else {
                    print json_encode([['error' => 'Course registration already exists']]);
                }
            } else {
                print json_encode([['error' => 'Course session, not found. Try again later']]);
            }
        } else {
            print json_encode([['error' => 'Course not found']]);
        }
        break;

        default:
        print json_encode([['error' => 'Bad Guy! This shouldnt be possible, but you didnt enter the course name']]);
}
//['first_name', 'last_name','student_gender', 'student_email', 'student_phone', 'student_reg','student_department', 'password1', 'password2', 'agree']