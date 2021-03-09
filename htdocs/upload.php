<?php

require_once('auth.php');

if ($_FILES['file']['name']) {
 if (!$_FILES['file']['error']) {
	$name = $_COOKIE["username"] . "_" . generateRandomString(25);
	$path = $_FILES['file']['name'];
	$ext = pathinfo($path, PATHINFO_EXTENSION);
	$ext = strtolower($ext);
	if ($_FILES['file']['size'] > 1048576)
		{
			exit();
		}
	$osextens = array("jpg", "jpeg", "bmp", "png");
	if (in_array($ext, $osextens)==false)
		{
		exit();
		}
	$filename = $name . '.' . $ext;
	$destination = 'files/' . $filename; //change this directory
	$location = $_FILES["file"]["tmp_name"];
	move_uploaded_file($location, $destination);
	echo 'files/' . $filename;//change this URL
 }
 else
 {
  echo  $message = 'Ooops!  Your upload triggered the following error:  '.$_FILES['file']['error'];
 }
}

?>