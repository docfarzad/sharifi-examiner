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

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
<link rel="stylesheet" href="style.css">
<link rel="stylesheet" href="font.css">
<link rel="shortcut icon" href="favicon.png">
<style>
table, th, td {
	border: 2px solid black;
}
</style>
<title>کارنامه های شما</title>
</head>
<body>


<?php

require_once('config.php');

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






if($_COOKIE['visitoridip']<>null){
	echo '<center><font color="red">فهرست کارنامه های شما</font></center><br><br>';
	echo '<br><br><center><span dir="rtl">کارنامه های پایینی جدید تر اند.</span></center><br><br>';
	$cookerid=$_COOKIE['visitoridip'];
	$sqlb = "SELECT * FROM exams where  visid like '%$cookerid%' ORDER BY visid asc, id asc";

	$resultb = mysqli_query($con, $sqlb);
	$numcntkar=0;
	echo '<center><span dir="rtl">';
	echo '<table style="text-align:center; width:90%;"><thead><tr><th>ردیف</th><th>شناسه آزمون</th><th>نام و نام خانوادگی • مدرسه</th><th>نمره</th><th>سوالات اشتباه</th></tr></thead><tbody>';
	while($row = mysqli_fetch_assoc($resultb)){

	$sk=$row["shenas"];
	$sqlffhb = "SELECT * FROM ongoingexams where examid='$sk' and vaziats='stopped'";
	$resfgfgultb = mysqli_query($con, $sqlffhb);
	$sk="73fg28sdf55dfg75sdf03";
		
	if(mysqli_num_rows($resfgfgultb)<>0){
	$numcntkar=$numcntkar+1;
	echo '<tr><td>' . farsikonnumb($numcntkar) . '</td>' . '<td>' . $row["shenas"] . '</td><td>' . $row["name"] . '</td><td>' . farsikonnumb($row["nomreh"]) . '</td><td>' . farsikonnumb($row["soalatesh"]) . '</td></tr>';
	}
		
	}


	echo '</tbody></table>';
	echo '</span>';

	echo '</center>';
	echo '<br><br><br><hr><center><span dir="rtl"><font color="grey"><a href="https://me.refinedview.com/?p=62">طراحی از فرزاد عباس‌پور</a></font></span></center>';

	
	
}else {
	echo '<span dir="rtl"><center>' . 'شما تا به حال ثبت نام نشده اید.' . '</center></span>';
}


mysqli_close($con);


?>









<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.1/umd/popper.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/js/bootstrap.min.js"></script>
</body>
</html>