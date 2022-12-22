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
        margin-top: 7%;
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
        <h1>Edit Course</h1>
        <strong>"The biggest fool is one who cannot learn, even from their own mistakes"<br> ~Orji Michael Chukwuebuka</strong>
    </div>

    <div>
        <form action="functions/editCourse.php" method="POST">
            <div class="p-1 form-control">
                <label>Select Course</label><br>
                <input type="text" placeholder="**CEE123  **Computer Engineering in Nigeria" required>
            </div>
            <br>
            <hr>
            <br>
            <div class="p-1 form-control">
                <label>New Full Course Name</label><br>
                <input type="text" placeholder="**Computer Programming In Nigeria" required>
            </div>
            <div class="p-1 form-control">
                <label>New Course Code</label><br>
                <input type="text" placeholder="**CEE123" required>
            </div>
            <div class="p-1 form-control">
                <label>New Course Department</label><br>
                <input type="text" placeholder="**Computer Engineering" required>
            </div>

            <input type="submit" value="Save">
        </form>
    </div>

   
</body>

</html>