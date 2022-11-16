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
    h1 {
        text-align: center;
        margin-top: 22%;
    }
    a{
        display: block;
    }

    h1 a{
        font-size: 1.2rem;
    }
</style>

<body>

    <h1>Welcome To The Matrix <a href="functions/logout.php">Leave</a></h1>
   
</body>

</html>