<?php

require_once('protect-this.php');
require_once('config.php');
require_once('funcs.php');

$activeuser14b = $_COOKIE['username'];


$base_url_withgetstrf=$base_url . '?az=';

$new_str=$_POST['copyid'];
$new_str = str_replace($base_url_withgetstrf, '', $new_str);
$new_stfinal = str_replace(' ', '', $new_str);



$checkerforreal=fact_ret("ongoingexams", "examid", $new_stfinal, "user");



if(($checkerforreal==null) || ($checkerforreal="")){

echo '<center>آزمون وجود ندارد <br><br><a href="tarrah.php">بازگشت</a></center>';
exit();

}



$sqlbf = "SELECT * FROM soal where azed='$new_stfinal'";
$resulftb = mysqli_query($con, $sqlbf);
while($rowfd = mysqli_fetch_assoc($resulftb)){

$smatn=$rowfd["matn"];

$contentqm=mysqli_real_escape_string($con, $smatn); 

$sqldf = "INSERT INTO soal (`matn`, `user`) VALUES ('$contentqm', '$activeuser14b')";
$resultdf=mysqli_query($con, $sqldf);
$questionid = $con->insert_id;

$smatnid=$rowfd["id"];
$sqlbfn = "SELECT * FROM gozineha where soal='$smatnid'";
$resulftbn = mysqli_query($con, $sqlbfn);
while($rowfdfd = mysqli_fetch_assoc($resulftbn)){

$smatddfn=$rowfdfd["matn"];
$contentqg=mysqli_real_escape_string($con, $smatddfn); 

$dorosti=$rowfdfd["dorosti"];

$sqlff = "INSERT INTO gozineha (`soal`,`matn`,`dorosti`) VALUES ('$questionid','$contentqg','$dorosti')";
$resultdfh=mysqli_query($con, $sqlff);

}
        
}








header("Location: tarrah.php");

?>
