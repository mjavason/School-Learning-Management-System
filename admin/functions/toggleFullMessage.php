<?php
require_once('../config/connect.php');
require_once('functions.php');
//die;

if (!isset($_GET['announcement_id'])) {
    //print json_encode([['error' => 'Unknown Error Occured']]);
} else {
    extract($_GET);
    switch ($_GET) {
        case (!empty($announcement_id)):
            $announcementInfo = getAnnouncementInfo($announcement_id);
            if ($announcementInfo) {
                echo htmlentities($announcementInfo['description']);
            } else {
                echo 'error';
                //print json_encode([['error' => 'DB Error Occured']]);
            }
            break;
        default:
            //print json_encode([['error' => 'Data Missing']]);
            break;
    }
}
//['first_name', 'last_name','student_gender', 'student_email', 'student_phone', 'student_reg','student_department', 'password1', 'password2', 'agree']