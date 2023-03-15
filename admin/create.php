<?php
session_start();
require_once "../includes/db.inc.php"; 
require_once "force_login.inc";
?>
<!DOCTYPE html>
<html lang=en>
<head>
	<title>Add New - Discount Juice</title>
	<link rel="stylesheet" href="/includes/style.css">
</head>
<body>

<?php

include('../includes/header.php');

if($_REQUEST['name']) {
	$sql = "INSERT INTO products (name, price, description, image) VALUES (?, ?, ?, ?)";

	// Prepare the statement
	if($stmt = mysqli_prepare($mysqli, $sql)){
		
		mysqli_stmt_bind_param($stmt, "ssss", $myname, $myprice, $mydescription, $myimage);

		// Add prepared statement here -- Setup variables
		$myname = $_REQUEST['name'];
		$myprice = $_REQUEST['price'];
		$mydescription = $_REQUEST['description'];
		$myimage = $_REQUEST['image'];
		
		// Run the query
		if(mysqli_stmt_execute($stmt)){
			echo "Product " . htmlentities($myname) . " created successfully!";
		} else {
			echo "Error: $sql <br>" . $mysqli->error;
			echo "<br/>Error: Try again or contact the administrator.";
		}
	}
	$result = mysqli_stmt_get_result($stmt);
}

?>

<form>
<table>
	<tr>
	<td>
		<label>Name:</label>
	</td>
	<td>
		<input type="text" name="name" maxLength=64 required />
	</td>
	</tr>
	<tr>
	<td>
		<label>Price:</label>
	</td>
	<td>
		<input type="number" name="price" placeholder="0.00" min="0" max="999.99" step="0.01" required />
	</td>
	</tr>
	<tr>
	<td>
		<label>Description:</label>
	</td>
	<td>
		<input type="text" name="description" maxLength=256 />
	</td>
	</tr>
	<tr>
	<td>
		<label>Image Filename:</label>
	</td>
	<td>
		<input type="text" name="image" maxLength=64 />
	</td>
	</tr>
</table>
<input type="submit" value="Create Product">
</form>

</body>
</html>
