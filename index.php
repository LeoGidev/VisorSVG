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
$datos = mysqli_query($conn,"SELECT*FROM Temperatura ");
/////////////////obtener el valor de la tabla, debemos nombrarla como Temperatura en la base de datos
$coef=12;
$y1h=0; //variable y para  lineas horizontales
$x1h=0;//variable x para  lineas horizontales
$yn=0;//variable y para numeros de eje uptime(y)