<?php 


require_once('config.php');
require_once('auth.php');
require_once('funcs.php');

////// Start of Visitor Detection //////
function farsikonnumb($number){
	
$farsi['0']="۰";
$farsi['1']="۱";
$farsi['2']="۲";
$farsi['3']="۳";
$farsi['4']="۴";
$farsi['5']="۵";
$farsi['6']="۶";
$farsi['7']="۷";
$farsi['8']="۸";
$farsi['9']="۹";
	
$farsi[' ']=" ";
$farsi['-']="-";
	
$numstr=strval($number);
$numstr=str_split($numstr);


foreach ($numstr as $digi) {
	$locar .= $farsi[$digi];
}
	
return $locar;
	
}

////// Start of Visitor Detection //////

function getUserIpAddr(){
	if(!empty($_SERVER['HTTP_CLIENT_IP'])){
		//ip from share internet
		$ip = $_SERVER['HTTP_CLIENT_IP'];
	}elseif(!empty($_SERVER['HTTP_X_FORWARDED_FOR'])){
		//ip pass from proxy
		$ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
	}else{
		$ip = $_SERVER['REMOTE_ADDR'];
	}
	return $ip;
}


if(!isset($_COOKIE['visitoridip'])) {
	$visuniid = generateRandomString(25);
	setcookie('visitoridip', $visuniid, 2147483647);
}else{
	
	$visuniid=$_COOKIE['visitoridip'];
	
}

////// End of Visitor Detection //////

?>
<!DOCTYPE html>
<html lang="fa">
<head>

<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-D18WG7GGNX"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-D18WG7GGNX');
</script>

<script>
function validateForm() {
	var x = document.forms["testedexam"]["namkh"].value;
	var h = x.length;
	if (h < 4) {
		alert("نام معتبر نیست. نام و نام خانوادگی را کامل، و بدون حروف اضافی وارد نمایید.");
		return false;
	}
}
</script>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
<link rel="shortcut icon" href="favicon.png">
<link rel="stylesheet" href="font.css">

<style>
	


	body {
		padding: 2%;
	}



	input, textarea {

		background-color : #B6EAFF; 
		direction: ltr;
		width: 80%; 
		font-size: 15pt;

	}




	hr{
			height: 3px;
			background-color: #FFFFFF;

		}
		
		img {
			max-width: 100%;
			height: auto;
		}
</style>

<title>آزمونیار شریفی</title>
</head>
<body>

<span dir='rtl'>


<?php



if(($_GET["az"]!=null) && ($_GET["az"]!="n")){



$shenaz=$_GET["az"];


$sqlsc = "SELECT * FROM ongoingexams where examid='$shenaz' and vaziats='going'";
$resultsc = mysqli_query($con, $sqlsc);
$row_strsc = mysqli_num_rows($resultsc);

if($row_strsc <> 0){ $starternumbers='strv'; }


if(($starternumbers=='strv') || (passwcheck($_COOKIE['username'], $_COOKIE['password'])=="true")){
	

	$sqlb = "SELECT * FROM soal where azed='$shenaz'";
	$resultb = mysqli_query($con, $sqlb);
	$row_cnt = mysqli_num_rows($resultb);

	if($row_cnt <> 0){ 
		$telm=0;
		
		echo '<form action="tamam.php" method="post" name="testedexam" onsubmit="return validateForm()">';
		if(passwcheck($_COOKIE['username'], $_COOKIE['password'])=="true"){

			echo "<center><font face='IRANSansWeb-Bold' color='black'>";
			echo "وضعیت آزمون: " . "</font>";
			if($starternumbers=='strv'){
				$colorforfonte='green';
				$vazertf="در حال برگزاری";
			}else{
				$colorforfonte='red';
				$vazertf="پایان یافته";
			}
			echo "<font face='IRANSansWeb-Bold' color='" . $colorforfonte . "'>";
			echo $vazertf . "</font>";
			echo '<br><br><a style="font-family: IRANSansWeb-Bold;" href="natayej.php">بازگشت</a></center><br><hr><br>';

		}
		echo '<br><center><a href="https://me.refinedview.com/?p=62"><font color="661ea6" face="IRANSansWeb-Bold">طراحی از فرزاد عباس‌پور</font></a></center><br><hr><br>';
		echo '<center>' . '<input type="text" placeholder="نام و نام خانوادگی" style="font-family: IRANSans; direction: rtl;" name="namkh" id="namkh" required>' . '<br><BR></center>';	
		echo '<center>' . '<input type="text" placeholder="نام مدرسه" style="font-family: IRANSans; direction: rtl;" name="nameklas" id="nameklas" required>' . '<br><BR></center>';
		while($row = mysqli_fetch_assoc($resultb)) 
		{
		$telm=$telm+1;		
		$soalasli=$row["matn"];
		$shenasoal=$row["id"];
		$ordersoalnu=$telm;
		echo '<p style="text-align:right;">';
		echo "<font color='red' face='IRANSansWeb-Bold'> سوال " . farsikonnumb($ordersoalnu) . "  </font></p>";
		echo '<span style="font-family: IRANSans;">' . '<span style="text-align:right;">' . $soalasli . '</span></span><br>';
		$sqlc = "SELECT * FROM gozineha where soal='$shenasoal' order by RAND()";
		$resultc = mysqli_query($con, $sqlc);
		$kerm=0;
		$kermo=0;
			while($rowb = mysqli_fetch_assoc($resultc)) 
				{
					$kerm=$kerm+1;
					echo '<p style="text-align:right; color: blue; font-family: IRANSansWeb-Bold;"><span style="text-align:right;">' . '<input type="radio" id="'.$kermo.'" name="'.$telm.'" value="'.$rowb["id"].'" required>' . ' گزینه ';
					echo farsikonnumb($kerm);
					echo '</p>';
					echo '<font face="IRANSans">' . '<span style="text-align:right;">' . $rowb["matn"] . '</span>' . "</font></span><br><hr>";
					
					
			
				}

		echo '<br><center>•</center><br><br>';
		}
		$ownerofexam=fact_ret("ongoingexams", "examid", $shenaz, "user");
		echo '<input type="hidden" value="'.$ownerofexam.'" name="sahebi" id="sahebi">';
		echo '<input type="hidden" value="'.$row_cnt.'" name="tedad" id="tedad">' . '<input type="hidden" value="' . 'ꆜ ' . $visuniid . ' - ⌂ ' . getUserIpAddr() . '" name="visuniid" id="visuniid">' . '<input type="hidden" value="'.$shenaz.'" name="quizer" id="quizer">';
		echo '<br><center><input style="font-family: IRANSans;" class="btn btn-primary" type="submit" value="اتمام آزمون و ثبت نمره"></center><br><br></form>';
		
		} else {
			
			echo '<font face="IRANSans">';
			echo '<center>به سامانه آزمون خوش آمدید.<br><a href="tarrah.php">مدیریت</a></center></font>';
			
		}	
	
	
	
} else {
			
			echo '<font face="IRANSans">';
			echo '<center>مهلت این آزمون به پایان رسیده است. در صورتی که آزمون را پشت سر گذاشته اید، میتوانید کارنامه خود را در <a href="karnameh.php">اینجا</a> مشاهده نمایید.</center>';
			
		}




} else {
	echo '<font face="IRANSans">';
	echo '<center>به سامانه آزمونیار شریفی خوش آمدید.<br><br><a href="tarrah.php">مدیریت</a><br><hr><a href="register.php">ثبت نام رایگان</a><br><hr><a href="https://me.refinedview.com/?p=62">آشنایی با سامانه</a></center></font>';
}





?>


</span>


<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.1/umd/popper.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/js/bootstrap.min.js"></script>
</body>
</html>