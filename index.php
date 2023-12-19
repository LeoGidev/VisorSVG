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
echo"
<div class='row'>
        <div class='col-md-6'>";


echo "<svg  id='svg' width='600' height='340' viewBox='0,0,600,340' style='border:2px solid black; '>"; 
//ejes x e y
echo "<line x1='50' y1='300' x2='600' y2='300' style='stroke:black;stroke-width:2' />";
echo "<line x1='50' y1='20' x2='50' y2='300' style='stroke:black;stroke-width:2' />";

//cuadrilla
///lineas horizontales
for($y1h=1;$y1h<12;$y1h++){
	$y = $y1h *25 ;
	echo"<line x1='50' y1='".$y;
	echo "' x2='800' y2='".$y;
	echo "' style='stroke:black;stroke-width:0.2' />";
}
///lineas verticales
for($x1h=0;$x1h<25;$x1h++){
	$x =50 + $x1h *20 ;
	echo"<line x1='".$x;
	echo "' y1='40' x2='".$x;
	echo "' y2='300' style='stroke:black;stroke-width:0.2' />";
}
//numeros x
///verticales
for($x1h=0;$x1h<25;$x1h++){
	$x =50 + $x1h *20 ;
	
	echo"<text font-family='Verdana'
        font-size='10' x='".$x;
	echo "' y='318' fill='blue'>".$x1h;
	echo "</text>";
}

///numeros de eje y
for($yn=1,$valor=10;$yn<12;$yn++,$valor--){
	$num = 25 + $yn *25;
	$valor2 = $valor *50/$coef;
	echo"<text font-family='Verdana'
        font-size='10' x='20' y='".$num;
	echo "' fill='blue'>".round($valor2);
	echo "</text>";
}
// se obtiene el valor de y dividiendo la cantidad del punto en dos y restando eso a 300
/// puntos de eje x1
echo "<text font-family='Verdana' font-size='13' x='550' y='318' fill='blue'> horas </text>";
echo "<text font-family='Verdana' font-size='13' x='20' y='15' fill='blue'> Temperatura </text>";

echo "<polyline points='";
$puntox=0;
$puntoy=0;
$uptimefinal=0;
$nodocaid=0;
$puntcomp=300;

$x=1;
// 3) Ir Imprimiendo las filas resultantes 
while ($fila = mysqli_fetch_array($datos)){
	

    $b=0;	
    
    
        echo $x * 10 +50;
        echo ",";
        echo 300 - ($coef*round($fila['tempIN'])/2);
        echo" ";
        $x++;
    
    
    
        
    }
        