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
	$sql = "UPDATE products SET name=?, price=?, description=?, image=? WHERE id=?";

	// Prepare the statement
	if($stmt = mysqli_prepare($mysqli, $sql)){
		
		mysqli_stmt_bind_param($stmt, "sssss", $myname, $myprice, $mydescription, $myimage, $myid);

		// Add prepared statement here -- Setup variables
		$myid = $_REQUEST['id'];
		$myname = $_REQUEST['name'];
		$myprice = $_REQUEST['price'];
		$mydescription = $_REQUEST['description'];
		$myimage = $_REQUEST['image'];
		
		// Run the query
		if(mysqli_stmt_execute($stmt)){
			echo "Product " . htmlentities($myname) . " updated successfully!";
		} else {
			echo "Error: $sql <br>" . $mysqli->error;
			echo "<br/>Error: Try again or contact the administrator.";
		}
	}
	$result = mysqli_stmt_get_result($stmt);

	// This is the procedural style to query the database
	//if(mysqli_query($mysqli, $sql) === TRUE){
	//	echo htmlentities($myname) . " updated successfully!";
	//} else {
	//	echo "Error: $sql <br>" . mysqli_error($mysqli);
	//}
}

$sql = "SELECT * FROM products WHERE id=$myid";

// This is the procedural style to query the database
$result = mysqli_query($mysqli, $sql);

$row = mysqli_fetch_array($result);

?>

<!-- Added <div> tag -- Rylee, 3/1/2023 -->
<div><form>
	<input type="hidden" name="id" value="<?= $row['id'] ?>" />
	<table>
		<tr>
			<td>
				<label>Name:</label>
			</td>
			<td>
				<input type="text" name="name" maxLength=64 value="<?= htmlentities($row['name']) ?>" required />
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
				<input type="text" name="description" maxLength=256 value="<?= htmlentities($row['description']) ?>" />
			</td>
		</tr>
		<tr>
			<td>
				<label>Image Filename:</label>
			</td>
			<td>
				<input type="text" name="image" maxLength=64 value="<?= htmlentities($row['image']) ?>" />
			</td>
		</tr>
	</table>
	<input type="submit" value="Update Product">
</form></div>

</body>
</html>
