<?php


require_once('auth.php');


	$redirect_after_login = 'tarrah.php';
	$remember_password = strtotime('+30 days'); // 30 days

	if (passwcheck($_POST['username'], md5($_POST['password']))=="true") {
		setcookie("password", md5($_POST['password']), $remember_password);
		setcookie("username", strtolower($_POST['username']), $remember_password);
		header('Location: ' . $redirect_after_login);
		exit;
	}
?>

<!DOCTYPE html>
<html>
<head>

<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-D18WG7GGNX"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-D18WG7GGNX');
</script>

	<title>ورود مدیران</title>
	<meta name="robots" content="noindex">
	<link rel="stylesheet" href="font.css">
	<link rel="shortcut icon" href="favicon.png">
</head>
<body>
<?php
 
if($_GET["idintern"]!=null){

	$df_one="رمز عبور";
	$df_two=$_GET["idintern"];
	$df_three='hidden';
	$df_four=' نام کاربری: ' . $_GET["idintern"] . '<br><br>';

}else{

	$df_one="اطلاعات کاربری";
	$df_two=null;
	$df_three='text';
	$df_four=null;


}
 
?>


	<div style="direction:rtl; font-family: IRANSansWeb-Bold; text-align:center;margin-top:50px;">
		لطفا با <?php echo $df_one; ?> خود وارد شوید.
		<br><br><form method="POST">
		<input type="<?php echo $df_three; ?>" value="<?php echo $df_two; ?>" name="username" spellcheck="false" style="font-family: IRANSansWeb-Bold;" placeholder="نام کاربری" required><br><br>
		<?php echo $df_four; ?>
		<input type="password" spellcheck="false" name="password" style="font-family: IRANSansWeb-Bold;" placeholder="رمز عبور" required><br>
		<br><button style="font-size: 16px; font-family: IRANSansWeb-Bold;" type="submit">ورود</button>
		<br><hr><center><p style="font-family: IRANSansWeb-Bold; color:red; text-decoration: none;"><a href="register.php">رایگان ثبت نام کنید</a></p></center><hr>
		</form>
	</div>


</body>
</html>
<?php echo $dfgdgg; ?>
