<?php


$username = "adminIwWIzTz";
$password = "CgZtiAk91QXr";
$database = "ampache";
$server="127.2.54.130";

$db_connect = @mysqli_connect($server,$username,$password,$database)
OR die("Could not connect to server");
?>