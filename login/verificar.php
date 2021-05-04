<?php
session_start();
include "../conexion.php";
$re=mysqli_query($con,"select * from usuarios where user='".$_POST['user']."' AND 
 					password='".$_POST['password']."'")	or die(mysqli_error($con));
	while ($f=mysqli_fetch_array($re)) {
		$arreglo[]=array('nombre'=>$f['nombre']);
	}
	if(isset($arreglo)){
		$_SESSION['user']=$arreglo;
		header("Location: admin.php");
	}else{
		header("Location: login.php?error=datos no validos");
	}
?>