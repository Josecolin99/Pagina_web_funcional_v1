<?php
include("../../../conexion.php");
$id= $_POST['id'];
$titulo = $_POST['titulo'];
$resumen = $_POST['resumen'];
$contenido = $_POST['contenido'];
$imagen = $_POST['imagen'];
$fecha = $_POST['fecha'];
$autor = $_POST['autor'];
$Sql="UPDATE `notas` SET `titulo`='$titulo',`resumen`='$resumen',`contenido`='$contenido',`imagen`='$imagen',`fecha`='$fecha',`autor`='$autor' WHERE id='$id'";
#mysqli_query($con, $Sql);

#header("Location: modificar.php");

if ( mysqli_query($con,$Sql) ) { header("Location: modificar.php?pagina=1").mysqli_affected_rows($con); } else { echo "Error: ".mysqli_error($con);}
#echo $titulo, $resumen, $contenido,$imagen,$fecha,$autor; 
#echo(var_dump($resumen));
#echo(var_dump($contenido));
#echo(var_dump($fecha));
#echo(var_dump($autor));