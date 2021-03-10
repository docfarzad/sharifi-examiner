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
<title>ثبت نمره</title>
</head>
<body>




<?php


require_once('config.php');


$quizid=$_POST["quizer"];
$quizownersahebi=$_POST["sahebi"];

$sqlrtg = "SELECT * FROM ongoingexams where examid='$quizid'";
$resultrtgh = mysqli_query($con, $sqlrtg);
while($rowfrtghd = mysqli_fetch_assoc($resultrtgh)){
	
	
$sharayeti=$rowfrtghd["vaziats"];
	
	
}

if($sharayeti=='going'){

	$tedader=$_POST["tedad"];
	$visuid=mysqli_real_escape_string($con, $_POST["visuniid"]); 
	$namerdfd=$_POST["namkh"];
	$namerd=$_POST["namkh"] . ' * ' . $_POST["nameklas"];
	$nomreh=0;
	$eshter='';
	for($x = 1; $x <= $tedader; $x+=1){

	$secsoal=null;
	$secsoal=$_POST[$x];

	$sqlb = "SELECT * FROM gozineha where id='$secsoal'";
	$resultb = mysqli_query($con, $sqlb);

	while($row = mysqli_fetch_assoc($resultb)){

	if($row["dorosti"]=='y'){ $nomreh=$nomreh+1; } else {$eshter .= $x . ' - '; }
		
	}

			
	}


	$sqlh = "INSERT INTO exams (`shenas`, `name`, `soalatesh`, `nomreh`, `visid`, `user`) VALUES ('$quizid','$namerd','$eshter','$nomreh','$visuid', '$quizownersahebi')";
	$resulth = mysqli_query($con, $sqlh);

	echo '<span dir="rtl"><center>';
	echo $namerdfd . ' عزیز، ';
	echo 'نمره شما ثبت شد.';
	
	echo '</center></span>';

	
	
}else {
	echo '<span dir="rtl"><center>';
	echo 'متاسفانه مهلت آزمون به پایان رسیده است.';
	echo '</center></span>';
}


mysqli_close($con);


?>









<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.1/umd/popper.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/js/bootstrap.min.js"></script>
</body>
</html>
