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

	<title>ثبت نام مدرس جدید</title>
	<meta name="robots" content="noindex">
	<link rel="stylesheet" href="font.css">
	<link rel="shortcut icon" href="favicon.png">
</head>
<body>



	<div style="direction:rtl; font-family: IRANSansWeb-Bold; text-align:center;margin-top:50px;">
		لطفا با اطلاعات خود ثبت نام کنید.
		<br>تنها استفاده از حروف و اعداد انگلیسی مجاز است. استفاده از فاصله مجاز نیست.<br><br>
		
		<form method="POST" action="finalized.php">
		<input type="text" name="username" spellcheck="false" pattern="[a-zA-Z0-9]+" style="font-family: IRANSansWeb-Bold;" placeholder="نام کاربری" required><br><br>

		<input type="password" name="password" spellcheck="false" pattern="[a-zA-Z0-9]+" style="font-family: IRANSansWeb-Bold;" placeholder="رمز عبور" required><br>
		<br><input type="email" name="email" spellcheck="false" style="font-family: IRANSansWeb-Bold;" placeholder="آدرس ایمیل" required><br>
		<br><button style="font-size: 16px; font-family: IRANSansWeb-Bold;" type="submit">ثبت نام</button>
		</form>
	</div>


</body>
</html>
