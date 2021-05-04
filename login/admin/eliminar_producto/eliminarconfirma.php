<?php
session_start();
include "../../../conexion.php";
if (isset($_SESSION['user'])) {
} else {
    header("Location: ../../login.php?Error=Acceso denegado");
}
?>
<!DOCTYPE html>
<html lang="es_MX">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Bienes Raices</title>
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,900" rel="stylesheet">
    <link rel="stylesheet" href="../../../css/normalize.css">
    <link rel="stylesheet" href="../../../css/styles.css">
</head>

<body>

    <header class="site-header">
        <iframe class="iheader" name="_parent" src="../../../template/header.html" frameborder="0" hspace="0" vspace="0" marginheight="0" marginwidth="0" scrolling="no"></iframe>
    </header>
    <h2 class="fw-300 centrar-texto">¿Realmente quiere eliminar este articulo?</h2>

    <main class="seccion contenedor">


        <div class="">
            <?php
            include '../../../conexion.php';
            $id = $_GET['id'];
            $re = mysqli_query($con, "select * from notas where id=" . $id) or die(mysqli_error($con));
            while ($f = mysqli_fetch_array($re)) {
            ?>
                <div class="anuncio">
                    <center>
                        <img class="limitar" src="<?php echo $f['imagen']; ?>" alt="Anuncio casa en el lago">
                    </center>
                    <div class="contenido-anuncio">
                        <h3><?php echo $f['titulo']; ?></h3>
                        <p><?php echo $f['resumen']; ?></p>
                        <p class="precio"><?php echo $f['fecha']; ?></p>
                        <p>Autor: <?php echo $f['autor']; ?></p>
                        <form class="contacto" action="eliminarproducto.php" method="post">

                            <center>

                                <input type="hidden" name="id" placeholder="Id" value="<?php echo $id; ?>" required>
                                <input type="submit" id=btnBorrar value="Si" class="boton boton-rojo agrandarborton">
                                <a href="eliminarproducto.php?id=<?php echo $f['id']; ?>" class="boton boton-verde agrandarborton">No</a>
                            </center>
                        </form>
                    </div>
                </div>
            <?php
            }
            ?>

        </div>
    </main>

    <footer class="site-footer seccion">
        <iframe class="ifooter" name="_parent" src="../../../template/footer.html" frameborder="0" hspace="0" vspace="0" marginheight="0" marginwidth="0" scrolling="no"></iframe>
    </footer>
</body>

</html>