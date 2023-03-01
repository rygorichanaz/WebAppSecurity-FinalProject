<?php
session_start();

if(!$_SESSION['username']) {
	header("Location: https://www.test.discountjuiceshop.com/admin/login.php");
	exit();
}
?>
