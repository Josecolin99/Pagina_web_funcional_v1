<?php
session_start();
include "../../../conexion.php";
if (isset($_SESSION['user'])) {
} else {
    header("Location: ../../login.php?Error=Acceso denegado");
}
?>

<!DOCTYPE html>
<html lang="es-Mx">

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

    <h1 class="fw-300 centrar-texto">Agregar</h1>

    <main class="contenedor seccion contenido-centrado">
        <h2 class="fw-300 centrar-texto">Llena el formulario</h2>

        <form class="contacto" action="modificarproducto.php" method="post">
            <?php
            $id= $_GET['id'];
            $re = mysqli_query($con, "select * from notas where id=" . $id) or die(mysqli_error($con));
            while ($f = mysqli_fetch_array($re)) {
            ?>
            <fieldset>


                    <input type="hidden" name="id" placeholder="Id" value="<?php echo $id; ?>" required>


                <label>Titulo: <span>*</span>
                    <input type="text" name="titulo" placeholder="Titulo" value="<?php echo $f['titulo']; ?>" required>
                </label>

                <label>Resumen: <span>*</span>
                    <input type="text" name="resumen" placeholder="Titulo" value="<?php echo $f['resumen']; ?>" required>
                </label>

                <label>Cuerpo:
                    <textarea class="resize" name="contenido" required><?php echo $f['contenido']; ?></textarea>
                </label>


                <label>Imagen: <span>*</span>
                    <input type="text" name="imagen" placeholder="Imagen" value=<?php echo $f['imagen']; ?> class="campo-form" required>
                </label>


                <label for="fecha">Fecha:
                    <input type="date" name="fecha" value=<?php echo $f['fecha']; ?>>
                </label>

                <label>Autor: <span>*</span>
                    <input type="text" name="autor" placeholder="Autor" class="campo-form" value=<?php echo $f['autor']; ?> required>
                </label>
            <?php } ?>

            <input type="submit" value="Enviar" class="boton boton-verde">

        </form>
    </main>

    <footer class="site-footer seccion">
        <iframe class="ifooter" name="_parent" src="../../../template/footer.html" frameborder="0" hspace="0" vspace="0" marginheight="0" marginwidth="0" scrolling="no"></iframe>
    </footer>
</body>

</html>