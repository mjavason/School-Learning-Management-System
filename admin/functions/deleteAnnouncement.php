<?php
require_once('../config/connect.php');
require_once('functions.php');
//die;

if (!isset($_GET['announcement_id'])) {
    gotoPage('../announcements');
    //print json_encode([['error' => 'Unknown Error Occured']]);
} else {
    extract($_GET);
    switch ($_GET) {
        case (!empty($announcement_id)):
            if (deleteAnnouncement($announcement_id)) {
                gotoPage('../announcements');
                //print json_encode([['success' => 'Course announcement Deleted!']]);
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