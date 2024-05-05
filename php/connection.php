<?php

$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
$dbname = "portfolio-site";

if (!$conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname)) {

	die("failed to connect!");
}