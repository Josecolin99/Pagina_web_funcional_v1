<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Bienes Raices</title>
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,900" rel="stylesheet">
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/styles.css">
</head>

<body>

    <header class="site-header">
        <iframe class="iheader" name="_parent" src="template/header.html" frameborder="0" hspace="0" vspace="0" marginheight="0" marginwidth="0" scrolling="no"></iframe>
    </header>


    <?php
    include 'conexion.php';
    $re = mysqli_query($con, "select * from notas where id=" . $_GET['id']) or die(mysqli_error($con));
    while ($f = mysqli_fetch_array($re)) {
    ?>


        <h1 class="fw-300 centrar-texto"><?php echo $f['titulo']; ?></h1>


        <main class="contenedor seccion contenido-centrado">

            <div class="alinearderecha">
                <p>Publicado el: <span class="precio"> <?php echo $f['fecha']; ?> </span> por: <span class="precio"> <?php echo $f['autor']; ?></span></p>
            </div>
            <br>
            <center>
                <img src="<?php echo $f['imagen']; ?>" alt="Imagen Anuncio">
            </center>
            <!--.resumen-propiedad-->
            <br>
            <?php echo nl2br($f['contenido']); ?>

            <br>


        </main>
    <?php
    }
    ?>

    <footer class="site-footer seccion">
        <iframe class="ifooter" name="_parent" src="template/footer.html" frameborder="0" hspace="0" vspace="0" marginheight="0" marginwidth="0" scrolling="no"></iframe>
    </footer>
</body>

</html>