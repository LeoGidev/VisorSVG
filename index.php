<?php
//abrimos base de datos
$dbhost	= "";	       // localhost or IP
$dbuser	= "";		      // database username
$dbpass	= "";		         // database password
$dbname	= "";    // database name

$conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname); //envía datos de login a la db


if (!$conn) {
      die("Connection failed: " . mysqli_connect_error());
}