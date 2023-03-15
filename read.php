<?php 
// Start the session
session_start();
// Set the csrf_token to a value that's unpredictable
$_SESSION["csrf_token"] = bin2hex(random_bytes(64));
// Include database credentials
require_once "includes/db.inc.php";
?>
<!DOCTYPE html>
<html>
<head>
	<title>Products - Discount Juice</title>
	<link rel="stylesheet" href="/includes/style.css">
</head>
<body>
<?php
// Draw header
include('includes/header.php');
?>
<!-- Draw heading after the header -->
<h1>Products</h1>
<p>Our juices are the greatest in the world! Made with homemade techniques and packaged in renewable biodegradable packaging!</p>
<p>---------</p>
<!-- List ways to sort the page -->
<a href='?order=name'>Sort by Name</a> | <a href='?order=price'>Sort by Price Ascending</a> | <a href='?order=price DESC'>Sort by Price Descending</a>
<br />
<p>---------</p>
<!-- Setup search field -->
<form method="get" rel="search">
	<input type="text" name="search" maxlength="300" />
	<input type="hidden" name="order" value="name" />
	<input type="submit" value="Search" />
</form>

<?php
// Set variables from search field or order by link
$search = $_REQUEST['search'];
$order = $_REQUEST['order'];
// if order is not set, set it to order by 'id'
if (empty($order)) {
	$order = 'id';
}
// Connect to db
$sql = "SELECT * FROM products WHERE name LIKE ? ORDER BY $order";

$search = "%{$search}%";
// Prepare the statement
$stmt = mysqli_prepare($mysqli, $sql);
mysqli_stmt_bind_param($stmt, "s", $search);
// Run the query
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);

// START table to hold product entries
echo "<table><tbody>";

while($row = mysqli_fetch_array($result)) {
	// Grab and sanitize variables
	$name = htmlentities($row['name']);
	$description = htmlentities($row['description']);

	// START a new cell
	echo "<td style='padding-right: 40px' width=400px>";
	// Display 'name' from db as h2 header
	echo "<h2>{$name}</h2><br />";
	// Write 'description' from db to screen
	echo "{$description}<br />";
	// Display 'image' using url from db
	echo "<img src='img/{$row['image']}' height=140px /><br />";
	// Write 'price' from db to screen
	echo "\${$row['price']}<br />";
	// Create a "Buy Now" button
	echo "<form method='post' action='/cart/'>
    	<input type='hidden' name='product_id' value='{$row['id']}' />
    	<input type='submit' value='Buy Now' />
	</form>";
	
	// Check if user is logged in to admin acct -- If yes, display "update" and "delete" links
	if($_SESSION['username'] != NULL) {
		echo "<br />";
		echo "<a href='/admin/update.php?id={$row['id']}'>update</a> ";
		// "Delete" button now uses a CSRF Token
		echo "<form method='post' action='/admin/delete.php?id={$row['id']}'>
			<input type='hidden' name='csrf_token' value='{$_SESSION['csrf_token']}' />
			<input type='submit' value='Delete' />
			</form>";
	}

	// END cell
	echo "</td>";
}
// END table
echo "</tbody></table>";
?>

</body>
</html>