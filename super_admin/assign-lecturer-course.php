<?php
require_once('config/connect.php');
require_once('functions/functions.php');

if (!isset($_SESSION['ultra_log'])) {
    gotoPage("../index");
}

// gotoPage('active-courses');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>#S##@@U@#@P#**E*@#R$@#!@$#@$%#@ AdMin</title>
</head>
<style>
    * {
        text-align: center;
        box-sizing: border-box;
        margin: 0;
    }

    .header {
        margin-bottom: 2rem;
        margin-top: 12%;
    }

    ul {
        list-style: none;
    }

    li {
        margin: 10px;
    }

    .p-1 {
        padding: 10px;
    }

    .form-control input {
        width: 60%;
        text-align: left;
        height: 2rem;
    }
</style>

<body>
    <div class="header">
        <h1>Assign Course To Lecturer</h1>
        <strong>"Perform your task and i shall know you. Perform your task and your genius shall befriend the more."<br> ~Ogwo David Emenike</strong>
    </div>

    <div>
        <form action="functions/assignCourseToLecturer.php" method="POST">
            <div class="p-1 form-control">
                <label>Lecturer Name</label><br>
                <input type="text" placeholder="**Engr Ozor" required>
            </div>
            <div class="p-1 form-control">
                <label>Course</label><br>
                <input type="text" placeholder="**CEE123  **Computer Engineering in Nigeria" required>
            </div>
            <input type="submit" value="Assign">
        </form>
    </div>

</body>

</html>