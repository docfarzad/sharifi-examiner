<!DOCTYPE html><html lang="fa"><head><meta name="robots" content="noindex"><link rel="shortcut icon" href="favicon.png"><title>ثبت نام</title></head><body>
<div style="direction:rtl; font-family: IRANSansWeb-Bold; text-align:center;margin-top:50px;">
<?php



require_once('config.php');
require_once('funcs.php');


$pass = $_POST["password"];
$pass = md5($pass);
$emailed = $_POST["email"];
$user = $_POST["username"];

$user = str_replace(" ", "", $user);
$user = strtolower($user);
$user = mysqli_real_escape_string($con, $user);


$emailed = str_replace(" ", "", $emailed);
$emailed = mysqli_real_escape_string($con, $emailed);


$queryreadyw = "SELECT * from users WHERE username='$user'"; 
$resultreadyw = mysqli_query($con, $queryreadyw); 
$soalsallreadyw = mysqli_num_rows($resultreadyw); 

if($soalsallreadyw == 1){

    echo '<center>اطلاعات درست وارد نشده یا کاربری از قبل با این نام کاربری موجود است. لطفا مجددا <a href="register.php">ثبت نام کنید</a>.</center>';
    exit();
}


$queryreadywf = "INSERT IGNORE INTO users (`username`, `email`, `password`, `excount`) VALUES ('$user', '$emailed', '$pass', '$totalexamsfornewuser')"; 
$resultreadydfw = mysqli_query($con, $queryreadywf); 

?>





ثبت نام با موفقیت انجام شد. حالا میتوانید با نام کاربری و رمز عبور خود <a href="login.php">وارد شوید</a>.

</div>
</body>
</html>.