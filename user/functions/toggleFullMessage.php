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
            $viewers = json_decode($announcementInfo['viewers'], true);
            if (empty($viewers)) {
                $viewers = [];
            }
            if ($announcementInfo) {
                if (!empty($viewers)) {
                    if (!hasStudentViewed($_SESSION['student_id'], $viewers)) {
                        $newViewer = array('id' => $_SESSION['student_id']);
                        array_push($viewers, $newViewer);
                        markAnnouncementRead($announcementInfo['id'], $viewers);
                    }
                }
                echo html_entity_decode($announcementInfo['description']);
                // echo $announcementInfo['description'];
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