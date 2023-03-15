<?php
session_start();
require_once "../includes/db.inc.php";

if($_SERVER['REQUEST_METHOD'] == 'POST'){
	$myusername = $_REQUEST['username'];
	$mypassword = $_REQUEST['password'];

	// $sql = "SELECT * FROM users WHERE username='$myusername' AND password=SHA2('$mypassword', 256)";
	$sql = "SELECT * FROM users WHERE username='$myusername' AND password=SHA2('$mypassword', 256)";

	$myusername = "%{$myusername}%";
	$mypassword = "%{$mypassword}%";

	// Prepare the statement
	$stmt = mysqli_prepare($mysqli, $sql);
	mysqli_stmt_bind_param($stmt, "ss", $myusername, $mypassword);

	// Run the query
	mysqli_stmt_execute($stmt);
	$result = mysqli_stmt_get_result($stmt);

	$row = mysqli_fetch_array($result);

	// This is what happens when a user successfully authenticates
	if(!empty($row)) {
		// Delete any data in the current session to start new
		session_destroy();
		session_start();

		$_SESSION['username'] = $row['username'];

		
	// This is what happens when the username and/or password doesn't match
	} else {
		echo "<p>Incorrect username OR password</p>";
	}
}

if($_SESSION['username']) {
	// Let's redirect instead of saying "Welcome" here
	//echo "<p>Welcome {$_SESSION['username']}</p>";

	//header("Location: {$_REQUEST['redirect']}");
	header("Location: https://www.test.discountjuiceshop.com/");
	exit();

} else {
?>
<!DOCTYPE HTML>
<html lang=en>
<head>
	<title>Login - Discount Juice</title>
	<link rel="stylesheet" href="/includes/style.css">
</head>
<body>
<?php include('../includes/header.php'); ?>
<form method="post" action="login.php">
	<input type="hidden" name="redirect" value="<?= $_REQUEST['redirect'] ?>" />

	<label>Username:</label>
	<input type="text" name="username" maxLength=64 required/>

	<label>Password:</label>
	<input type="password" name="password" required/>

	<input type="submit" value="Log In" />
</form>

<?php
}
?>

</body>
</html>
