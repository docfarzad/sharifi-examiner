<?php

require_once('protect-this.php');
echo '<meta name="robots" content="noindex">';
require_once('config.php');
require_once('funcs.php');
$activeuser14b = $_COOKIE['username'];
$tedademteh=fact_ret("users", "username", $activeuser14b, "excount");
$tedademteh = (int)$tedademteh;


$queryreadyw = "SELECT * from soal WHERE azed='n' and user='$activeuser14b'"; 
$resultreadyw = mysqli_query($con, $queryreadyw); 
$soalsallreadyw = mysqli_num_rows($resultreadyw); 


echo '<!DOCTYPE html><html lang="fa"><head><link rel="shortcut icon" href="favicon.png"><title>آزمونیار</title></head><body>';

if($soalsallreadyw == 0){

    echo '<center>شما سوالی  برای آزمون گیری ایجاد نکرده اید</center>';
    exit();
}
if($tedademteh == 0){

    echo '<center>تعداد آزمون های مجاز شما به اتمام رسیده است</center>';
    exit();
}

$testid = generateRandomString(15);

$sqlfhfb = "INSERT IGNORE INTO ongoingexams (`examid`, `user`) VALUES ('$testid', '$activeuser14b')";
$resulfgdfgtb = mysqli_query($con, $sqlfhfb);

	
$sqlh = "UPDATE soal SET azed='$testid' WHERE azed='n' and user='$activeuser14b'";
$resulth = mysqli_query($con, $sqlh);

$tedademtehreduced=$tedademteh-1;
$sqlhdfdb = "UPDATE users SET excount='$tedademtehreduced' WHERE username='$activeuser14b'";
$resultdfdfcvbh = mysqli_query($con, $sqlhdfdb);

echo '<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/css/bootstrap.min.css">';
echo '<link rel="stylesheet" href="style.css">';
echo '<link rel="stylesheet" href="font.css">';

echo '<center><font face="IRANSans">' . 'لینک آزمون' . '<br><br>' . $base_url . '?az=' . $testid . '<br><br><a href="natayej.php">بازگشت</a></font></center>';


mysqli_close($con); 

echo '</body></html>';
?>