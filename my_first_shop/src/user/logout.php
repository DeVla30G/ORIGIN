<?php
		session_start();
		session_unset();
		session_destroy();
		setcookie('user', NULL, time() - 100);
		setcookie('user_token', NULL, time() - 100);
		header('location: index.php');
	