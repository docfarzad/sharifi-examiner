<?php


require_once('auth.php');

	if (passwcheck($_COOKIE['username'], $_COOKIE['password'])=="false") {
		// Password not set or incorrect. Send to login.php.
		header('Location: login.php');
		exit;
	}



?>