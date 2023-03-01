<a href='/'>Home</a> | 

<?php

if($_SESSION['username'] != NULL) {
    echo "<a href='/admin/logout.php'>Logout</a>";
    echo " | <a href='/admin/create.php'>Create</a>";
} else {
    echo "<a href='/admin/login.php'>Login</a>";
}

?> | <a href='/read.php'>Products</a>

<hr />
<br />