<?php
// Start user session
session_start();
require_once "../includes/db.inc.php"; 
// Require the user to be logged in to access page
require_once "force_login.inc";
?>
<html>
<body>

<?php
// Show navigaion header on page
include('../includes/header.php');

$myid = $_REQUEST['id'];

$sql = "DELETE FROM products WHERE id=$myid";

// This is the object-oriented style to query the database
if($mysqli->query($sql) === TRUE) {
	echo "Successfully deleted.";
} else {
	echo "Error: $sql <br>" . $mysqli->error;
}

?>

</body>
</html>
