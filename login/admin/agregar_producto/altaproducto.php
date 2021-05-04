<?php
	include ("../../../conexion.php");
	
	if(!isset($_POST['titulo']) &&  !isset($_POST['resumen']) && !isset($_POST['contenido'])){
		header("Location: agregar.php");
	}else{
		      		$titulo=$_POST['titulo'];
					$resumen=$_POST['resumen'];
					$contenido=$_POST['contenido'];
					$imagen=$_POST['imagen'];
					if(empty($_POST["fecha"])){
						date_default_timezone_set('America/Mexico_City');
						$fecha = date('Y-m-d');
					}else{
						$fecha=$_POST['fecha'];}
					$autor=$_POST['autor'];
					$Sql="insert into notas (titulo,resumen,contenido,imagen,fecha,autor) values(
							'".$titulo."',
							'".$resumen."',
							'".$contenido."',
							'".$imagen."',
							'".$fecha."',
							'".$autor."')";
					mysqli_query($con,$Sql);
					header ("Location: agregar.php");
		      }
?>
