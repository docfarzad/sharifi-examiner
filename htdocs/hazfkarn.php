<?php

require_once('protect-this.php');
echo '<head><title>پاکسازی کارنامه ها</title></head><meta name="robots" content="noindex">';
require_once('config.php');

$activeuser14b = $_COOKIE['username'];
$sqlfhfb = "update exams set scope='out' where scope='in' and user='$activeuser14b'";
$resulfgdfgtb = mysqli_query($con, $sqlfhfb);

echo '<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/css/bootstrap.min.css">';
echo '<link rel="stylesheet" href="style.css">';
echo '<link rel="stylesheet" href="font.css">';

echo '<center><font face="IRANSans">فهرست پاک شد و همه کارنامه ها آرشیو شدند<br><br><a href="natayej.php">بازگشت</a></font></center>';


mysqli_close($con); 


?>
