<?php
session_start();
require_once "../includes/db.inc.php"; 
require_once "force_login.inc";
?>

<html>
<body>

<?php

include('../includes/header.php');

if($_REQUEST['name']) {

	$myname = $_REQUEST['name'];
	$myprice = $_REQUEST['price'];

	$sql = "INSERT INTO products (name, price) VALUES ('$myname', $myprice)";

	// This is the object-oriented style to query the database
	if($mysqli->query($sql) === TRUE) {
		echo "Product $myname created successfully!";
	} else {
		echo "Error: $sql <br>" . $mysqli->error;
	}

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

<form action="upload.php" method="post" enctype="multipart/form-data">
	Select image to upload:
	<input type="file" name="fileToUpload" id="fileToUpload">
	<input type="submit" value="Upload Image" name="submit">
</form>
</body>
</html>
