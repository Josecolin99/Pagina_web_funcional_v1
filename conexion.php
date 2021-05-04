<?php
	$server="localhost";
	$username="root";
	$password="";
	$db='noticias';
	$con=mysqli_connect($server,$username,$password)or die("No se ha podido establecer la conexion");
	//$con=mysqli($server,$username,$password)or die("no se ha podido establecer la conexion");
	$sdb=mysqli_select_db($con,$db)or die("La base de datos no existe");
?>