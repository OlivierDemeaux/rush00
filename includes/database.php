<?php
$servername = "172.17.0.2";
$username = "root";
$password = "1234";
try
{
	$db = mysqli_connect($servername, $username, $password, 'mydb');
}
catch (Exception $e)
{
	echo "Error\n";
	exit;
}
date_default_timezone_set("Europe/Paris");
?>
