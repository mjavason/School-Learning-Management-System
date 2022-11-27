<?php
session_start();
$db_handle = new DBController();


/**
 * Removes unwanted and harmful characters
 * 
 * Takes in a string cleanses and formats it, then returns a clean copy.
 * 
 * @param string $data
 * Any data or variable that may contain characters that needs cleansing.
 * @param string $case
 * [optional]
 * 
 * If set to 'lower' it automatically formats the results to lowercase, if set to 'none' it is left as it is.
 * @return string
 * Returns cleansed string.
 */
function sanitize($data, $case = null)
{
  $result = htmlentities($data, ENT_QUOTES);
  if ($case == 'lower') {
    $result = strtoupper($result);
  } elseif ($case == 'none') {
    //leave it as it is
  } elseif ($case == 'clean') {
    $result = ucwords(strtolower($result));
  } else {
    $result = strtoupper($result);
  }
  return $result;
}

function gotoPage($location)
{
  header('location:' . $location);
  exit();
}


function showSweetAlert($type, $id = null)
{
  switch ($type) {
    case 'success':
      echo '<script>swal({
                //title: "New Course",
                title: "Successful",
                icon: "success",
                button: "Got It!",
              });</script>';
      break;

    case 'course_save_success':
      echo '<script>
            swal({
                //title: "New Course",
                title: "Successful",
                icon: "success",
                button: "Got It!",
            });
        </script>';
      break;

    case 'client_paid_admin_success':
      echo '<script>swal({
                        //title: "Edit Course",
                        title: "Client Payment Confirmed",
                        icon: "success",
                        button: "Got It!",
                      });</script>';
      break;

    case 'course_delete_success':
      echo '<script>swal({
                        //title: "Delete Course",
                        title: "Course Deleted Succesfully",
                        icon: "success",
                        button: "Got It!",
                      });</script>';
      break;

    case 'failure':
      echo '<script>swal({
                title: "Error",
                //title: "Payment confirmation failed",
                icon: "error",
                button: "Got It!",
              });</script>';
      break;

    case 'failure__argument_not_set':
      echo '<script>swal({
                    title: "Error!",
                    text: "Missing compulsory argument",
                    //title: "",
                    icon: "error",
                    button: "Got It!",
                  });</script>';
      break;

    case 'warning':
      break;

    case 'info':
      break;

    case 'advanced':
      echo '<script>swal({
                        text: `Search for a movie. e.g. "La La Land".`,
                        content: "input",
                        button: {
                          text: "Search!",
                          closeModal: false,
                        },
                      })
                      .then(name => {
                        if (!name) throw null;
                       
                        return fetch(`https://itunes.apple.com/search?term=${name}&entity=movie`);
                      })
                      .then(results => {
                        return results.json();
                      })
                      .then(json => {
                        const movie = json.results[0];
                       
                        if (!movie) {
                          return swal("No movie was found!");
                        }
                       
                        const name = movie.trackName;
                        const imageURL = movie.artworkUrl100;
                       
                        swal({
                          title: "Top result:",
                          text: name,
                          icon: imageURL,
                        });
                      })
                      .catch(err => {
                        if (err) {
                          swal("Oh noes!", "The AJAX request failed!", "error");
                        } else {
                          swal.stopLoading();
                          swal.close();
                        }
                      });</script>';
      break;

    case 'getTrueOnButtonClicked':
      echo '<script>swal("Click on either the button or outside the modal.")
            .then((value) => {
              swal(`The returned value is: ${value}`);
            });</script>';

    case 'warnBeforePerformingAction':
      echo '<script>swal({
              title: "Are you sure?",
              text: "Once deleted, you will not be able to recover this imaginary file!",
              icon: "warning",
              buttons: true,
              dangerMode: true,
            })
            .then((willDelete) => {
              if (willDelete) {
                swal("Poof! Your imaginary file has been deleted!", {
                  icon: "success",
                });
              } else {
                swal("Your imaginary file is safe!");
              }
            });</script>';



    default:
      break;
  }
}

function showAlertForOperationDoneOnOtherPage()
{
  //showSweetAlert('success');
  if (isset($_SESSION['alert'])) {
    showSweetAlert($_SESSION['alert']);
    $_SESSION['alert'] = null;
  }
}

function validateEmail($email)
{
  global $db_handle;
  //$response = [];
  $result = $db_handle->selectAllWhere('students', 'email', $email);

  return isset($result) && count($result) > 0;
}

function validateLecturerEmail($email)
{
  global $db_handle;
  //$response = [];
  $result = $db_handle->selectAllWhere('lecturers', 'email', $email);

  return isset($result) && count($result) > 0;
}

function validateSuperAdminEmail($email)
{
  global $db_handle;
  //$response = [];
  $result = $db_handle->selectAllWhere('super_admins', 'email', $email);

  return isset($result) && count($result) > 0;
}

function validateStudentRegNumber($reg)
{
  global $db_handle;
  //$response = [];
  $result = $db_handle->selectAllWhere('students', 'reg_no', $reg);

  return isset($result) && count($result) > 0;
}

function confirmUserEmailAndPassword($postemail, $postpassword, $rememberMe)
{
  global $db_handle;
  //$response = [];
  //students first
  $result = $db_handle->selectAllWhereWith2Conditions('students', 'email', $postemail, 'password', sha1($postpassword));
  if (isset($result) && count($result) > 0) {
    foreach ($result as $row) {
      extract($row);
      $_SESSION['user_name'] = ucwords(strtolower($first_name)) . " " . ucwords(strtolower($last_name));
      $_SESSION['first_name'] = $first_name;
      $_SESSION['last_name'] = $last_name;
      $_SESSION['full_name'] = $first_name . ' ' . $last_name;
      $_SESSION['student_id'] = $id;
      $_SESSION['student_email'] = $postemail;
      $_SESSION['student_set'] = $set_year;
      $_SESSION['phone'] = $phone;
      $_SESSION['student_reg'] = $row['reg_no'];

      $_SESSION['log'] = true;


      $announcements = getAllAnnouncementsForStudent($_SESSION['student_reg']);
      $readAnnouncements = getReadOrUnreadAnnouncements($announcements, $_SESSION['student_id']);
      $unreadAnnouncements = getReadOrUnreadAnnouncements($announcements, $_SESSION['student_id'], true);

      $_SESSION['read_announcemts'] = count($readAnnouncements);
      $_SESSION['unread_announcements'] = count($unreadAnnouncements);
      // //This is the line of code for saving cookies AKA remember me

      // if (isset($remember)) {
      if ($rememberMe == true) {
        //Creates a cookie named "user" with the value "John Doe". The cookie will expire after 30 days (86400 * 30). The "/" means that the cookie is available in entire website (otherwise, select the directory you prefer).

        //setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/"); // 86400 = 1 day
        setcookie('client_mail', $postemail, time() + (86400 * 30), "/"); // 86400 = 1 day
        setcookie('client_password', $postpassword, time() + (86400 * 30), "/"); // 86400 = 1 day

      } else {
        if (isset($_COOKIE['mem_log'])) {
          setcookie('mem_log', '');
        }
        setcookie("client_mail",  $_SESSION['user_email'], time() + (10 * 365 * 24 * 60 * 60));
        setcookie("client_pass", '', time() + (10 * 365 * 24 * 60 * 60));
      }
    }
    return $result;
  } else {
    //lecturers next
    $result = $db_handle->selectAllWhereWith2Conditions('lecturers', 'email', $postemail, 'password', sha1($postpassword));
    if (isset($result) && count($result) > 0) {
      foreach ($result as $row) {
        extract($row);
        $_SESSION['user_name'] = ucwords(strtolower($first_name)) . " " . ucwords(strtolower($last_name));
        $_SESSION['first_name'] = $first_name;
        $_SESSION['last_name'] = $last_name;
        $_SESSION['full_name'] = $first_name . ' ' . $last_name;
        $_SESSION['lecturer_id'] = $id;
        $_SESSION['lecturer_email'] = $postemail;
        $_SESSION['lecturer_title'] = $title;
        $_SESSION['phone'] = $phone;
        $_SESSION['lecturer_gender'] = $gender;
        $_SESSION['lecturer_department'] = $department_id;
        $_SESSION['staff_id_number'] = $staff_id_number;
        $_SESSION['date_created'] = $date_created;
        $_SESSION['date_updated'] = $date_updated;

        $_SESSION['super_log'] = true;

        // //This is the line of code for saving cookies AKA remember me

        // if (isset($remember)) {
        if ($rememberMe == true) {
          //Creates a cookie named "user" with the value "John Doe". The cookie will expire after 30 days (86400 * 30). The "/" means that the cookie is available in entire website (otherwise, select the directory you prefer).

          //setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/"); // 86400 = 1 day
          setcookie('client_mail', $postemail, time() + (86400 * 30), "/"); // 86400 = 1 day
          setcookie('client_password', $postpassword, time() + (86400 * 30), "/"); // 86400 = 1 day

        } else {
          if (isset($_COOKIE['mem_log'])) {
            setcookie('mem_log', '');
          }
          setcookie("client_mail",  $_SESSION['user_email'], time() + (10 * 365 * 24 * 60 * 60));
          setcookie("client_pass", '', time() + (10 * 365 * 24 * 60 * 60));
        }
      }
      return $result;
    } else {
      //superAdmins last
      $result = $db_handle->selectAllWhereWith2Conditions('super_admins', 'email', $postemail, 'password', sha1($postpassword));
      if (isset($result) && count($result) > 0) {
        foreach ($result as $row) {
          extract($row);
          $_SESSION['user_name'] = ucwords(strtolower($first_name)) . " " . ucwords(strtolower($last_name));
          $_SESSION['first_name'] = $first_name;
          $_SESSION['last_name'] = $last_name;
          $_SESSION['full_name'] = $first_name . ' ' . $last_name;
          $_SESSION['sadmin_id'] = $id;
          $_SESSION['sadmin_email'] = $postemail;
          $_SESSION['sadmin_authority'] = $authority;
          $_SESSION['phone'] = $phone;

          $_SESSION['ultra_log'] = true;

          // //This is the line of code for saving cookies AKA remember me

          // if (isset($remember)) {
          if ($rememberMe == true) {
            //Creates a cookie named "user" with the value "John Doe". The cookie will expire after 30 days (86400 * 30). The "/" means that the cookie is available in entire website (otherwise, select the directory you prefer).

            //setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/"); // 86400 = 1 day
            setcookie('client_mail', $postemail, time() + (86400 * 30), "/"); // 86400 = 1 day
            setcookie('client_password', $postpassword, time() + (86400 * 30), "/"); // 86400 = 1 day

          } else {
            if (isset($_COOKIE['mem_log'])) {
              setcookie('mem_log', '');
            }
            setcookie("client_mail",  $_SESSION['user_email'], time() + (10 * 365 * 24 * 60 * 60));
            setcookie("client_pass", '', time() + (10 * 365 * 24 * 60 * 60));
          }
        }
        return $result;
      } else {
        return ([['error' => 'Wrong Password']]);
        //return false;
      }
      //return false;
    }
    //return false;
  }
}

function getDepartmentId($departmentName)
{

  global $db_handle;

  $result = $db_handle->selectAllWhere('departments', 'department_name', $departmentName);
  if (isset($result)) {
    return $result[0]['id'];
  } else {
    return false;
  }
}

function getCourseInfoFromName($courseName)
{

  global $db_handle;

  $result = $db_handle->selectAllWhere('courses', 'course_name', $courseName);
  if (isset($result)) {
    return $result[0];
  } else {
    return false;
  }
}

function createNewStudent($firstName, $lastName, $gender, $email, $phone, $reg, $departmentId, $password)
{
  global $db_handle;

  $firstName = sanitize($firstName, 'clean');
  $lastName = sanitize($lastName, 'clean');
  $email = sanitize($email);
  $gender = sanitize($gender);
  $phone = sanitize($phone);
  $reg = sanitize($reg);
  //$departmentId = getDepartmentID(sanitize($department));
  $password = sha1($password);


  $query = "INSERT INTO `students` (
  `first_name`,
  `last_name`,	
  `gender`,
  `email`,
  `reg_no`,	
  `phone`,
  `department_id`,	
  `password`) VALUES (
    '$firstName',
    '$lastName',
    '$gender',
    '$email',
    '$reg',
    '$phone',
    $departmentId,
    '$password');";
  return $db_handle->runQueryWithoutResponse($query);
}

function getCoursesTakenByStudent($regNo)
{
  global $db_handle;
  //$response = [];
  $result = $db_handle->selectAllWhere('students', 'reg_no', $regNo);

  if (isset($result)) {
    $coursesTaken = json_decode($result[0]['courses_taken'], true);
    sort($coursesTaken,);

    return $coursesTaken;
  } else {
    return false;
  }
}

function getStudentLevel($regNo)
{
  $years = 0;
  $coursesTaken = getCoursesTakenByStudent($regNo);

  // foreach ($coursesTaken as $course) {
  //   if ($course['course_level'] > $course) {
  //     $years++;
  //   }
  // }

  for ($i = 0; $i < count($coursesTaken); $i++) {
    if ($coursesTaken[$i]['course_level'] > $years) {
      $years = $coursesTaken[$i]['course_level'];
    }
  }

  return $years;
}

function countCoursesPerYear($coursesTaken, $year)
{
  $count = 0;
  foreach ($coursesTaken as $courseTaken) {
    $courseSessionInfo = getCourseSessionInfo($courseTaken['course_id'], $courseTaken['course_credits']);
    if (!empty($courseSessionInfo)) {
      if ($courseSessionInfo['year'] == $year) {
        $count++;
      }
    }
  }
  return $count;
}

function getCalenderYearPerLevel($coursesTaken, $level)
{
  for ($i = 0; $i < count($coursesTaken); $i++) {
    if ($coursesTaken[$i]['course_level'] == $level) {
      return $coursesTaken[$i]['year_taken'];
    }
  }
}

function getResultsPerCourseTaken($courseTaken, $semester, $year)
{
  //echo $i;
  //echo 1;
  global $db_handle;
  //$response = [];
  if (isset($courseTaken)) {
    $result = $db_handle->selectAllWhereWith4Conditions('results', 'course_id', $courseTaken['course_id'], 'course_credits', $courseTaken['course_credits'], 'year', $year, 'semester', $semester);

    //selectAllWhere('students', 'reg_no', $regNo);
    //echo 2;

    if (isset($result)) {
      // echo 3;
      $courseResultsFull = $result;
      return $courseResultsFull[0];
    } else {
      $result = $db_handle->selectAllWhereWith3Conditions('results', 'course_id', $courseTaken['course_id'], 'year', $year, 'semester', $semester);

      //selectAllWhere('students', 'reg_no', $regNo);
      //echo 2;

      if (isset($result)) {
        // echo 3;
        $courseResultsFull = $result;
        return $courseResultsFull[0];
      } else {
        //echo 4;
        return false;
        //return '<br>No result found for this course';
      }
    }
  }
}

function getCourseInfo($id)
{
  global $db_handle;

  $result = $db_handle->selectAllWhere('courses', 'id', $id);
  if (isset($result)) {
    return $result[0];
  } else {
    return false;
  }
}

function getPersonalResult($results, $regNo)
{
  $resultsObj = json_decode($results, true);
  //$resultsObj = $results;

  foreach ($resultsObj as $result) {
    if ($result['reg_num'] == $regNo) {
      return $result;
    }
  }
  return false;
}

function returnGrade($score)
{
  switch ($score) {
    case ($score < 40):
      return 'F';

    case ($score >= 40 && $score < 50):
      return 'D';

    case ($score >= 50 && $score < 60):
      return 'C';

    case ($score >= 60 && $score < 70):
      return 'B';

    case ($score >= 70):
      return 'A';

    default:
      return 'X';
  }
}






///////////////////////////////////////////////////////////////////////// Borrowed From Admin ///////////////////////////////////////////////////////////////////////////////////////

function calculateStudentLevel($set)
{
  $set = explode('/', $set);
  $year = date('Y');
  $level = 0;
  if (isset($set[0])) {
    $level = ($year - $set[0]);
  }
  createLog('Success', 'calculateStudentLevel');
  if ($level < 1) {
    return 1;
  }
  return ($level);
}

function createLog($title, $description)
{
  global $db_handle;

  $title = sanitize($title, 'clean');
  $description = sanitize($description, 'none');

  $query = "INSERT INTO `log` (
    `log_title`,
    `log_description`
         ) VALUES (
    '$title', 
    '$description'
         )";
  return $db_handle->runQueryWithoutResponse($query);
}

function getCourseSessionInfo($courseId, $credits)
{
  global $db_handle;
  //$response = [];
  $result = $db_handle->selectAllWhereWith2Conditions('results', 'course_id', $courseId, 'course_credits', $credits);

  if (isset($result)) {
    return $result[0];
  } else {
    return false;
  }
}

function compileIncourse($incourseArray)
{
  $scoretotal = 0;
  $absoluteTotal = 0;
  if (isset($incourseArray)) {
    foreach ($incourseArray as $incourse) {
      $absoluteTotal += $incourse['total'];
      $scoretotal += $incourse['score'];
    }
  } else {
    return 0;
  }
  return ceil(30 * ((($scoretotal / $absoluteTotal) * 100) / 100));
}

function compileExam($examArray)
{
  $scoretotal = 0;
  $absoluteTotal = 0;
  if (isset($examArray)) {
    foreach ($examArray as $exam) {
      $absoluteTotal += $exam['total'];
      $scoretotal += $exam['score'];
    }
  } else {
    return 0;
  }

  return ceil(70 * ((($scoretotal / $absoluteTotal) * 100) / 100));
}

function calculateScoreByGrade($grade, $creditLoad)
{
  switch ($grade) {
    case 'A':
      return (5 * $creditLoad);

    case 'B':
      return (4 * $creditLoad);

    case 'C':
      return (3 * $creditLoad);

    case 'D':
      return (2 * $creditLoad);

    default:
      return 0;
  }
}

function calculateGPAPerYear($year, $studentReg)
{
  $totalCredits = 0;
  $totalScoreByGrade = 0;
  // $year = 2018;
  $coursesTaken = getCoursesTakenByStudent($studentReg);

  //loop through two semesters
  for ($h = 1; $h <= 2; $h++) {

    //loop through each course taken by the student
    for ($i = 0; $i < count($coursesTaken); $i++) {
      $incourse = 0;
      $exam = 0;
      //for each of the courses taken by the student get the result sheet
      $courseResults = getResultsPerCourseTaken($coursesTaken[$i], $h, $year);
      if ($courseResults) {
        $courseInfo = getCourseInfo($courseResults['course_id']);

        //Search through the result sheet for this particular student's result and get their corresponding incourse and exam values
        $personalResult = getPersonalResult($courseResults['results'], $studentReg);
        if ($personalResult) {

          //get incourse
          if (isset($personalResult['incourse'])) {
            $incourse = compileIncourse($personalResult['incourse']);
          } else {
            $incourse = 0;
          }

          //get exam
          if (isset($personalResult['exam'])) {
            $exam = compileExam($personalResult['exam']);
          } else {
            $exam = 0;
          }

          //get grade for total of incourse and exam(A, B, C, D, F)
          $grade = returnGrade($incourse + $exam);

          //get score per grade [ 5(A) * 3(credit load) ]
          $totalScoreByGrade += calculateScoreByGrade($grade, $courseResults['course_credits']);
          $totalCredits += $courseResults['course_credits'];
        }
      }
    }
  }

  if ($totalScoreByGrade == 0 && $totalCredits == 0) {
    return 0;
  }
  return round(($totalScoreByGrade / $totalCredits), 2);

  // try {
  //   return round(($totalScoreByGrade / $totalCredits), 2);
  // } catch (DivisionByZeroError) {
  //   return 0;
  // }


}

function getGradePercentageOccurencePerStudent($studentReg)
{
  $totalAs = 0;
  $totalBs = 0;
  $totalCs = 0;
  $totalDs = 0;
  $totalFs = 0;

  // $year = 2018;
  $coursesTaken = getCoursesTakenByStudent($studentReg);
  $studentLevel = calculateStudentLevel($_SESSION['student_set']);
  $studentStarterYear = date('Y') - $studentLevel;

  for ($g = $studentStarterYear; $g <= date('Y'); $g++) {
    $year = $g;
    //loop through two semesters
    for ($h = 1; $h <= 2; $h++) {

      //loop through each course taken by the student
      for ($i = 0; $i < count($coursesTaken); $i++) {
        $incourse = 0;
        $exam = 0;
        //for each of the courses taken by the student get the result sheet
        $courseResults = getResultsPerCourseTaken($coursesTaken[$i], $h, $year);
        if ($courseResults) {
          $courseInfo = getCourseInfo($courseResults['course_id']);

          //Search through the result sheet for this particular student's result and get their corresponding incourse and exam values
          $personalResult = getPersonalResult($courseResults['results'], $studentReg);
          if ($personalResult) {

            //get incourse
            if (isset($personalResult['incourse'])) {
              $incourse = compileIncourse($personalResult['incourse']);
            } else {
              $incourse = 0;
            }

            //get exam
            if (isset($personalResult['exam'])) {
              $exam = compileExam($personalResult['exam']);
            } else {
              $exam = 0;
            }

            //get grade for total of incourse and exam(A, B, C, D, F)
            $grade = returnGrade($incourse + $exam);
            switch ($grade) {
              case 'A':
                $totalAs++;
                break;

              case 'B':
                $totalBs++;
                break;

              case 'C':
                $totalCs++;
                break;

              case 'D':
                $totalDs++;
                break;

              case 'F':
                $totalFs++;
                break;

              default:
                break;
            }
          }
        }
      }
    }
  }

  $total = $totalAs + $totalBs + $totalCs + $totalDs + $totalFs;
  $results = array(['A' => $totalAs, 'B' => $totalBs, 'C' => $totalCs, 'D' => $totalDs, 'F' => $totalFs, 'total' => $total]);
  return $results;

  // try {
  //   return round(($totalScoreByGrade / $totalCredits), 2);
  // } catch (DivisionByZeroError) {
  //   return 0;
  // }


}

function getGPAPerStudent($studentReg)
{
  $numberOfYears = 0;
  $totalGP = 0;
  $studentLevel = calculateStudentLevel($_SESSION['student_set']);
  $coursesTaken = getCoursesTakenByStudent($_SESSION['student_reg']);
  $studentStarterYear = date('Y') - $studentLevel;
  for ($i = $studentStarterYear; $i < date('Y'); $i++) {
    $year = $i;

    // echo ($i . ': ' . countCoursesPerYear($coursesTaken, $year));
    // echo '<br>';
    // countCoursesPerYear($coursesTaken, $year);
    if (countCoursesPerYear($coursesTaken, $year) > 0) {
      $numberOfYears++;
      $totalGP += calculateGPAPerYear($year, $studentReg);
    }
  }
  if ($totalGP == 0 || $numberOfYears == 0) {
    return 0;
  }
  return round(($totalGP / $numberOfYears), 2);
}

//This function has a flaw. If the same course has multiple sessions, the one created last will be the one assigneed to the student... This is confusing in it of itself because one course shouldnt have a session for different sets... It's just a scenario that could happen.
function checkIfCourseSessionExistsAndReturnInfo($courseId)
{
  global $db_handle;
  //$response = [];
  $result = $db_handle->selectAllWhereWith2Conditions('results', 'course_id', $courseId, 'inactive', 0);

  if (isset($result)) {
    return $result[0];
  } else {
    return false;
  }
}

function addNewCourseToStudent($courseId, $resultId, $credits, $resultSet, $studentReg)
{
  $entry = array('course_id' => $courseId, 'course_credits' => $credits, 'course_set' => $resultSet, 'result_id' => $resultId);
  $coursesTaken = getCoursesTakenByStudent($studentReg);

  array_push($coursesTaken, $entry);
  $coursesTaken = json_encode($coursesTaken);

  global $db_handle;
  //$response = [];
  $result = $db_handle->updateSingleColumnWhere1Condition('students', 'courses_taken', $coursesTaken, 'reg_no', $studentReg);

  return $result;
}

function doesCourseRegistrationHaveDuplicate($studentReg, $newCourseSessionId)
{
  $courseTaken = getCoursesTakenByStudent($studentReg);
  foreach ($courseTaken as $course) {
    if (isset($course['result_id'])) {
      if ($course['result_id'] == $newCourseSessionId) {
        return true;
      }
    }
  }

  return false;
}

function getAllAnnouncementsForStudent($studentReg)
{
  $coursesTaken = getCoursesTakenByStudent($studentReg);
  $allAnnouncementsForAllStudentCourses = [];

  global $db_handle;
  //$response = [];
  foreach ($coursesTaken as $course) {
    if (isset($course['result_id']) && isset($course['course_id']))
      $result = $db_handle->selectAllWhereWith2Conditions('announcements', 'result_id', $course['result_id'], 'course_id', $course['course_id']);
    if ($result) {
      foreach ($result as $announcement) {
        array_push($allAnnouncementsForAllStudentCourses, $announcement);
      }
    }
  }
  return $allAnnouncementsForAllStudentCourses;
}

function getReadOrUnreadAnnouncements($allAnnouncements, $studentId, $unread = null)
{
  $readAnnouncements = [];
  $unreadAnnouncements = [];

  foreach ($allAnnouncements as $announcement) {
    // echo '>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>1';
    // echo '<br>';
    if (!empty($announcement['viewers'])) {
      // echo '>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>2';
      // echo '<br>';
      $views = json_decode($announcement['viewers'], true);
      if (hasStudentViewed($studentId, $views)) {
        // echo '>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>3';
        // echo '<br>';
        array_push($readAnnouncements, $announcement);
      } else {
        // echo '>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>3.2';
        // echo '<br>';
        array_push($unreadAnnouncements, $announcement);
      }
    } else {
      // echo '>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>4';
      // echo '<br>';
      array_push($unreadAnnouncements, $announcement);
    }
  }

  if ($unread) {
    return $unreadAnnouncements;
  } else {
    return $readAnnouncements;
  }
}

function hasStudentViewed($studentId, $viewArray)
{
  // print_r($viewArray);
  if (!empty($viewArray) && isset($viewArray[0])) {
    foreach ($viewArray as $view) {
      if (isset($view['id'])) {
        if ($view['id'] == $studentId) {
          return true;
        }
      } else {
        return false;
      }
    }
  }

  return false;
}

function formatDateFriendlier($date, $format = null)
{
  if (isset($format)) {
    return date($format, strtotime($date));
  }
  return date('d', strtotime($date)) . '-' . date('M', strtotime($date)) . '-' . date('Y', strtotime($date));
}

function getAnnouncementInfo($id)
{
  global $db_handle;
  //$response = [];
  $result = $db_handle->selectAllWhere('announcements', 'id', $id);

  if (isset($result)) {
    // //createLog('Success', 'getStudentName');
    return ($result[0]);
  } else {
    // //createLog('Failed', 'getStudentName');
    return false;
  }
}

function getLecturerInfo($id)
{
  global $db_handle;
  //$response = [];
  $result = $db_handle->selectAllWhere('lecturers', 'id', $id);

  if (isset($result)) {
    // //createLog('Success', 'getStudentName');
    return ($result[0]);
  } else {
    // //createLog('Failed', 'getStudentName');
    return false;
  }
}

function markAnnouncementRead($announcement_id, $updatedViewers)
{
  $updatedViewers = json_encode($updatedViewers);

  global $db_handle;
  //$response = [];
  $result = $db_handle->updateSingleColumnWhere1Condition('announcements', 'viewers', $updatedViewers, 'id', $announcement_id);
  if ($result) {
    $announcements = getAllAnnouncementsForStudent($_SESSION['student_reg']);
    $readAnnouncements = getReadOrUnreadAnnouncements($announcements, $_SESSION['student_id']);
    $unreadAnnouncements = getReadOrUnreadAnnouncements($announcements, $_SESSION['student_id'], true);

    $_SESSION['read_announcemts'] = count($readAnnouncements);
    $_SESSION['unread_announcements'] = count($unreadAnnouncements);
  }
  return $result;
}
