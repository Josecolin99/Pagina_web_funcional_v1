<?php
include("../../../conexion.php");
#$id= $_POST['id'];
#$Sql="UPDATE `notas` SET `titulo`='$titulo',`resumen`='$resumen',`contenido`='$contenido',`imagen`='$imagen',`fecha`='$fecha',`autor`='$autor' WHERE id='$id'";
#mysqli_query($con, $Sql);

#header("Location: modificar.php");

#if ( mysqli_query($con,$Sql) ) { header("Location: eliminar.php").mysqli_affected_rows($con); } else { echo "Error: ".mysqli_error($con);}
#echo $titulo, $resumen, $contenido,$imagen,$fecha,$autor; 
#echo(var_dump($resumen));
#echo(var_dump($contenido));
#echo(var_dump($fecha));
#echo(var_dump($autor));
$borrar_id = $_POST['id'];
$borrar = "DELETE FROM notas WHERE id = '$borrar_id'";

if (!isset($_POST['borrar'])) {
    mysqli_query($con, $borrar);
    header("Location: eliminar.php?pagina=1");
} else {
    header("Location: eliminar.php?pagina=1");
}
