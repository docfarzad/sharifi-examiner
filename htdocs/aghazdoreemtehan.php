<?php

require_once('protect-this.php');
echo '<meta name="robots" content="noindex">';
require_once('config.php');



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
<link rel="shortcut icon" href="favicon.png">
<link rel="stylesheet" href="font.css">
<title>آغاز مجدد دوره امتحان</title>
</head>
<body>




<?php



$kerler=$_GET["id"];

$sql = "update ongoingexams set vaziats='going' where examid='$kerler'";
$result=mysqli_query($con, $sql);




echo '<a href="natayej.php">امکان دادن امتحان برای دانش آموزان از این لحظه مجددا فعال شد. - بازگشت</a>';


mysqli_close($con);


?>









<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.1/umd/popper.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/js/bootstrap.min.js"></script>
</body>
</html>
