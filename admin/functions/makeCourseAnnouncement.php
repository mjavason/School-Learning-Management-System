<?php
require_once('../config/connect.php');
require_once('functions.php');
//die;

if (!isset($_POST)) {
    print json_encode([['error' => 'Unknown Error Occured']]);
} else {
    extract($_POST);
    switch ($_POST) {
        case (!empty($announcement_title) &&
            !empty($announcement_category) &&
            !empty($announcement_description)):


            if (createNewCourseAnnouncement($announcement_title, $announcement_description, $announcement_category, $_SESSION['lecturer_id'], $_SESSION['active_course_id'],  $_SESSION['active_course_table_id'])) {
                print json_encode([['success' => 'Course Announcement Sent!']]);
            } else {
                print json_encode([['error' => 'Database Error!']]);
            }
            break;
        default:
            print json_encode([['error' => 'Data Missing. Make sure all fields are filled']]);
            break;
    }
}
//['first_name', 'last_name','student_gender', 'student_email', 'student_phone', 'student_reg','student_department', 'password1', 'password2', 'agree']