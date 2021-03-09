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
<link rel="stylesheet" href="font.css">
<link rel="shortcut icon" href="favicon.png">
<style>
table, th, td {
	border: 2px solid black;
}
</style>
<title>نتایج  </title>
</head>
<body>


<?php



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


$activeuser14b = $_COOKIE['username'];

echo '<center><a href="tarrah.php">بازگشت</a></center><br><br>';

$sqlbf = "SELECT * FROM soal where azed<>'n' and user='$activeuser14b' group by azed";
$resulftb = mysqli_query($con, $sqlbf);
echo '<center>';
echo '<span dir="rtl">';
echo '<font color="red">فهرست آزمون ها </font><br><br>';
echo '<table style="text-align:center; width:90%;"> <thead> <tr> <th>آزمون</th> <th>پایان دوره امتحان</th> <th>آغاز مجدد دوره امتحان</th> </tr> </thead> <tbody>';
while($rowfd = mysqli_fetch_assoc($resulftb)){

echo ' <tr> <td> <a href="' . $base_url . '?az=' . $rowfd["azed"] . '">' . 'آزمون ' . $rowfd["azed"] . '</a></td><td>' . '<a href="' . $base_url . 'payandoreemtehan.php?id=' . $rowfd["azed"] . '">' . 'پایان دوره  ' . '</a> </td><td> ' . '<a href="' . $base_url . 'aghazdoreemtehan.php?id=' . $rowfd["azed"] . '">' . 'آغاز مجدد دوره  ' . '</a></td></tr>';
	
}
echo '</tbody> </table>';
echo '</span>';

echo '<hr>';
echo '<font color="red">فهرست کارنامه ها</font><br><br>';
?>
<center><a href="hazfkarn.php" onclick="return confirm('آیا مطمئن هستید؟')">حذف تمامی کارنامه های موجود در لیست</a></center><br>
<span dir="rtl">کارنامه های صادر شده از هر رایانه در کنار هم قرار دارند. در هر دسته کارنامه، کارنامه های پایینی  جدید تر اند.</span>
<br><br>
<?php
$sqlb = "SELECT * FROM exams where scope='in' and user='$activeuser14b' ORDER BY visid asc, id asc";
$resultb = mysqli_query($con, $sqlb);
$numcntkar=0;
echo '<span dir="rtl">';
echo '<table style="text-align:center; width:90%;"><thead><tr><th>ردیف</th><th>مشاهده آزمون بعنوان مدیر</th><th>نام و نام خانوادگی • مدرسه</th><th>نمره</th><th>سوالات اشتباه</th><th>شناسه منزل ⌂ - شناسه رایانه ꆜ </th></tr></thead><tbody>';
while($row = mysqli_fetch_assoc($resultb)){
	
	
$numcntkar=$numcntkar+1;
echo '<tr><td>'.farsikonnumb($numcntkar).'</td>'.'<td><a href="' . $base_url . '?az=' . $row["shenas"] . '">' . $row["shenas"] . '</a>' . '</td><td>' . $row["name"] . '</td><td>' . farsikonnumb($row["nomreh"]) . '</td><td>' . farsikonnumb($row["soalatesh"]) . '</td><td><font><b>' . $row["visid"] . '</b></font></td></tr>';
	
}


echo '</tbody></table>';
echo '</span>';
echo '<br><br><center><a href="tarrah.php">بازگشت</a></center>';
echo '</center>';

mysqli_close($con);


?>









<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.1/umd/popper.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/js/bootstrap.min.js"></script>
</body>
</html>