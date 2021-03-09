<?php

require_once('protect-this.php');
echo '<meta name="robots" content="noindex">';
require_once('config.php');
require_once('funcs.php');

?>
<!DOCTYPE html>
<html lang="fa">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
<link rel="stylesheet" href="style.css">
<link rel="stylesheet" href="font.css">
<title>آزمونیار  </title>
</head>
<body>




<?php



$kerler=$_GET["id"];

$activeuser14b = $_COOKIE['username'];
$qownerreal=fact_ret("soal", "id", $kerler, "user");

if($activeuser14b != $qownerreal){

    echo '<center>شما صاحب این سوال نیستید</center>';
    exit();
}

$sql = "delete from soal where id='$kerler'";
$result=mysqli_query($con, $sql);

$sqlf = "delete from gozineha where soal='$kerler'";
$resultf=mysqli_query($con, $sqlf);


echo '<a href="tarrah.php">سوال -حذف شد. - بازگشت</a>';


mysqli_close($con);


?>









<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.1/umd/popper.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/js/bootstrap.min.js"></script>
</body>
</html>