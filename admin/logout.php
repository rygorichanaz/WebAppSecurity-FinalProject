<?php
session_start();
session_unset();
session_destroy();
?>
<!DOCTYPE html>
<html lang=en>
    <head>
        <title>Logout - Discount Juice</title>
        <link rel="stylesheet" href="/includes/style.css">
    </head>
    <body>
        <?php include('../includes/header.php'); ?>
        <p>You have been successfully logged out.</p>
    </body>
</html>
