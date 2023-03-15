<?php
// Start user session
session_start();
require_once "../includes/db.inc.php"; 
// Require the user to be logged in to access page
require_once "force_login.inc";
?>
<!DOCTYPE html>
<html lang=en>
<head>
	<title>Delete - Discount Juice</title>
	<link rel="stylesheet" href="/includes/style.css">
</head>
<body>
<?php
// Show navigaion header on page
include('../includes/header.php');

// Check that the client token matches the known token
if ($_REQUEST['csrf_token'] === $_SESSION['csrf_token']) {
    // Change the token value so it can't be used twice
    $_SESSION['csrf_token'] = bin2hex(random_bytes(64));
	$myid = $_REQUEST['id'];
	$sql = "DELETE FROM products WHERE id=$myid";

	// This is the object-oriented style to query the database
	if($mysqli->query($sql) === TRUE) {
		echo "Successfully deleted.";
	} else {
		echo "Error: $sql <br>" . $mysqli->error;
	}
}
?>
</body>
</html>
