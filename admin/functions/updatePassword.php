<?php
require_once('../config/connect.php');
require_once('functions.php');
//die;

extract($_POST);
$lecturerInfo = getAllLecturerInfo($_SESSION['lecturer_id']);

switch ($_POST) {
    case (!empty($current_password) && !empty($new_password) && !empty($confirm_new_password)):
        if ($lecturerInfo['password'] == sha1($current_password)) {
            if ($new_password == $confirm_new_password) {
                if (updateLecturerPassword($_SESSION['lecturer_id'], $new_password)) {
                    $arrayAssoc = ([['success' => 'Password successfully updated']]);
                    print json_encode($arrayAssoc);
                } else {
                    $arrayAssoc = ([['error' => 'Unknown error occured']]);
                    print json_encode($arrayAssoc);
                }
            } else {
                $arrayAssoc = ([['error' => 'New passwords dont match']]);
                print json_encode($arrayAssoc);
            }
        } else {
            $arrayAssoc = ([['error' => 'Current Password Inaccurate']]);
            print json_encode($arrayAssoc);
        }

        break;
    default:
        $arrayAssoc = ([['error' => 'Items missing. Make sure all fields are filled']]);
        print json_encode($arrayAssoc);

        break;
        //Create new user functionality
}
