<?php
require_once('../config/connect.php');
require_once('functions.php');
//die;

extract($_POST);
$email = sanitize($email, 'none');

switch ($_POST) {
    case (!empty($first_name) && !empty($last_name) && !empty($gender) && !empty($email) && !empty($phone) && !empty($department) && !empty($title) && !empty($staff_id_number)):
        if ($email != $_SESSION['lecturer_email'] && !validateEmail($email)) {
            $departmentId = getDepartmentId($department);
            if ($departmentId) {
                if (updateLecturerProfile($_SESSION['lecturer_id'], $first_name, $last_name, $gender, $email, $phone, $departmentId, $title, $staff_id_number)) {
                    $arrayAssoc = ([['success' => 'Profile successfully updated']]);
                    print json_encode($arrayAssoc);
                } else {
                    $arrayAssoc = ([['error' => 'Unknown error occured']]);
                    print json_encode($arrayAssoc);
                }
            } else {
                $arrayAssoc = ([['error' => 'School Department not found']]);
                print json_encode($arrayAssoc);
            }
        } else {

            if ($email == $_SESSION['lecturer_email']) {
                $departmentId = getDepartmentId($department);
                if ($departmentId) {
                    if (updateLecturerProfile($_SESSION['lecturer_id'], $first_name, $last_name, $gender, $email, $phone, $departmentId, $title, $staff_id_number)) {
                        $arrayAssoc = ([['success' => 'Profile successfully updated']]);
                        print json_encode($arrayAssoc);
                    } else {
                        $arrayAssoc = ([['error' => 'Unknown error occured']]);
                        print json_encode($arrayAssoc);
                    }
                } else {
                    $arrayAssoc = ([['error' => 'School Department not found']]);
                    print json_encode($arrayAssoc);
                }
            } else {

                $arrayAssoc = ([['error' => 'Unable to edit email. User already exists']]);
                print json_encode($arrayAssoc);
            }
        }

        break;
    default:
        $arrayAssoc = ([['error' => 'Items missing. Make sure all fields are filled']]);
        print json_encode($arrayAssoc);

        break;
        //Create new user functionality
}
