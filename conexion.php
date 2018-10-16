<?php


//conexion a la base de datos
$db_host="localhost";
$db_nombre="pokemon";
$db_user="root";
$db_pass="";
$conexion=mysqli_connect($db_host,$db_user,$db_pass, $db_nombre);

//establecemos tipo de caracteres
mysqli_set_charset($conexion,"utf-8");

//comprobamos que la base conecto eficazmente
if(mysqli_connect_errno()){
	echo "error al conectar servidor";
	exit();
}

//mensaje si no se puede lograr la conexion
mysqli_select_db($conexion,$db_nombre) or die ("no se encuentra la base de datos");
?>