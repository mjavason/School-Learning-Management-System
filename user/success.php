<?php
require_once('config/connect.php');
require_once('functions/functions.php');

if (!isset($_GET['reference'])) {
    gotoPage('index.php');
} else {
    if (!createPaymentReference($_SESSION['student_id'], "Department Fees", $_GET['reference'])) {
        gotoPage('index.php');
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Successful!!!</title>
</head>
<style>
    body {
        margin-top: 10%;
        text-align: center;
    }
</style>

<body>
    <h1>Payment Successful!!!</h1>
    <p><strong>Reference ID: </strong><?= $_GET['reference'] ?></p>
    <p>Copy reference ID to present for confirmation.</p>
    <br>
    <a href="index">Go Home</a>
</body>

</html>