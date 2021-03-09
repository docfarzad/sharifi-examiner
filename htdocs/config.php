<?php


$base_url = "http://azmoonyarsharifi.byethost7.com/";
$totalexamsfornewuser = 21;
$con = mysqli_connect("sql310.byethost7.com","b7_28074641","NyY2pL8xb6nNk9gz","b7_28074641_azmoon");



if (mysqli_connect_errno()) {
	echo "Failed to connect to MySQL: " . mysqli_connect_error();
	exit();	
	}

mysqli_query($con, "SET NAMES utf8");



	
?>