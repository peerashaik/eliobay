<?php
define('DB_SERVER','https://eliobay.com');
define('DB_USER','eliobay');
define('DB_PASS' ,'ElioBay@390');
define('DB_NAME', 'eliobay');
$con = mysqli_connect(DB_SERVER,DB_USER,DB_PASS,DB_NAME);

// Check connection
if (mysqli_connect_errno()) {
	echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
?>
