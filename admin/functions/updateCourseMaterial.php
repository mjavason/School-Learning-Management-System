<?php
require_once('../config/connect.php');
require_once('functions.php');
//die;

if (!isset($_POST) || !isset($_GET['material_id'])) {
    print json_encode([['error' => 'Unknown Error Occured']]);
} else {
    extract($_POST);
    switch ($_POST) {
        case (!empty($material_title) &&
            !empty($material_link) &&
            !empty($material_category) &&
            !empty($material_description) &&
            !empty($material_writer)):


            if (updateCourseMaterial($material_title, $material_description, $material_link, $material_writer, $material_category, $_SESSION['lecturer_id'], $_SESSION['active_course_id'],  $_SESSION['active_course_table_id'], $_GET['material_id'])) {
                print json_encode([['success' => 'Course Material Updated!']]);
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