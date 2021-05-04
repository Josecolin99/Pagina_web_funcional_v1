<?php
session_start();
include "../conexion.php";
if (isset($_SESSION['user'])) {
} else {
    header("Location: login.php?Error=Acceso denegado");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Bienes Raices</title>
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,900" rel="stylesheet">
    <link rel="stylesheet" href="../css/normalize.css">
    <link rel="stylesheet" href="../css/styles.css">
</head>

<body>

    <header class="site-header">
        <iframe class="iheader" name="_parent" src="../template/header.html" frameborder="0" hspace="0" vspace="0" marginheight="0" marginwidth="0" scrolling="no"></iframe>
    </header>
    <?php
    $data = $_SESSION['user'][0];
    ?>

    <h1 class="fw-300 centrar-texto">Hola: <span class="precio"><?php print($data["nombre"]); ?></span></h1>
    <main class="contenedor seccion contenido-centrado">
        <h2 class="fw-300 centrar-texto">Elija una opcion</h2>

        <a href="admin/agregar_producto/agregar.php" class="boton boton-amarillo d-block">Agregar</a>
        <a href="admin/modificar_producto/modificar.php?pagina=1" class="boton boton-amarillo d-block">Modificar</a>
        <a href="admin/eliminar_producto/eliminar.php?pagina=1" class="boton boton-amarillo d-block">Eliminar</a>

        <form class="contacto" action="cerrar.php" method="post">
            <input type="submit" value="Cerrar Sesion" class="boton boton-verde">
        </form>
    </main>

    <footer class="site-footer seccion">
        <iframe class="ifooter" name="_parent" src="../template/footer.html" frameborder="0" hspace="0" vspace="0" marginheight="0" marginwidth="0" scrolling="no"></iframe>
    </footer>
</body>

</html>