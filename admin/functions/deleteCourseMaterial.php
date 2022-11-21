<?php
require_once('../config/connect.php');
require_once('functions.php');
//die;

if (!isset($_GET['material_id'])) {
    gotoPage('../course-materials');
    //print json_encode([['error' => 'Unknown Error Occured']]);
} else {
    extract($_GET);
    switch ($_GET) {
        case (!empty($material_id)):
            if (deleteMaterial($material_id)) {
                gotoPage('../course-materials');
                //print json_encode([['success' => 'Course Material Deleted!']]);
            } else {
                // print json_encode([['error' => 'Database Error!']]);
            }
            break;
        default:
            //print json_encode([['error' => 'Data Missing. Make sure all fields are filled']]);
            break;
    }
}
//['first_name', 'last_name','student_gender', 'student_email', 'student_phone', 'student_reg','student_department', 'password1', 'password2', 'agree']