<?php
session_start();
require_once "../includes/db.inc.php"; 
require_once "force_login.inc";
?>
<html>
<body>

<?php

include('../includes/header.php');

$myid = $_REQUEST['id'];
$myname = $_REQUEST['name'];
$myprice = $_REQUEST['price'];
$mydescription = $_REQUEST['description'];
$myimage = $_REQUEST['image'];

if($_REQUEST['name']) {
	$sql = "UPDATE products SET name='$myname', price=$myprice, description='$mydescription', image='$myimage' WHERE id=$myid";

	// This is the procedural style to query the database
	if(mysqli_query($mysqli, $sql) === TRUE){
		echo "$myname updated successfully!";
	} else {
		echo "Error: $sql <br>" . mysqli_error($mysqli);
	}
}

$sql = "SELECT * FROM products WHERE id=$myid";

// This is the procedural style to query the database
$result = mysqli_query($mysqli, $sql);

$row = mysqli_fetch_array($result);

?>

<form>
	<input type="hidden" name="id" value="<?= $row['id'] ?>" />
	<table>
		<tr>
			<td>
				<label>Name:</label>
			</td>
			<td>
				<input type="text" name="name" maxLength=64 value="<?= $row['name'] ?>" required />
			</td>
		</tr>
		<tr>
			<td>
				<label>Price:</label>
			</td>
			<td>
				<input type="number" name="price" placeholder="0.00" min="0" max="999.99" step="0.01" value="<?php echo $row['price'] ?>" required />
			</td>
		</tr>
		<tr>
			<td>
				<label>Description:</label>
			</td>
			<td>
				<input type="text" name="description" maxLength=256 value="<?= $row['description'] ?>" />
			</td>
		</tr>
		<tr>
			<td>
				<label>Image Filename:</label>
			</td>
			<td>
				<input type="text" name="image" maxLength=64 value="<?= $row['image'] ?>" />
			</td>
		</tr>
	</table>
	<input type="submit" value="Update Product">
</form>

</body>
</html>
