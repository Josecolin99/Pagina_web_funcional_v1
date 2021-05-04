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



    <main class="seccion contenedor">
        <h2 class="fw-300 centrar-texto">Casas y Depas en Venta</h2>
        <!--
        <div class="alado-de-otro margen-ariba ">
            <div class="alado-de-otro-filtro acomodar estiloform">
            <form class="contacto" action="login/admin/filtro/filtro.php" method="post" class="acomodar">
                <input type="submit" value="Filtrar" class="boton boton-verde btn-sin-borde margen-izq-drch limitar-ancho">

                <select class="limitar-ancho centrar-select" id="opciones" name="contacto" required>
                    <option value="" disabled selected>-- Filtrar --</option>
                    <option value="Fecha">Telefono</option>
                    <option value="Autor">Email</option>
                </select>
                <form>
            </div>
            <div class="acomodar">
                <h2 class="fw-300 centrar-texto">Casas y Depas en Venta</h2>
            </div>
            <div class="acomodar">

            </div>
        </div>
-->

        <div class="contenedor-anuncios">
            <?php
            include 'conexion.php';
            // Verificar si no hay registros en la tabla
            $verifica = mysqli_query($con, "select * from notas") or die(mysqli_error($con));
            $cuenta = mysqli_num_rows($verifica);
            if ($cuenta == 0) {
                header("Location:error/sin-contenido.php");
            }
            //Cantidad de registros por paginas
            $por_pagina = 9;

            if (isset($_GET['pagina'])) {
                $pagina = $_GET['pagina'];
            } else {
                $pagina = 1;
            }

            //Comprueba que la pagina no sea menor a 0 o 0
            if ($pagina <= 0) {
                $pagina = 1;
            }
            // La inicia en 0 y se multiplica $por_pagina
            // Y si la pagina no es legible te manda a la pagina 1
            try {
                $empieza = ($pagina - 1) * $por_pagina;
            } catch (TypeError $empieza) {
                header("Location: anuncios.php?pagina=1");
            }



            //Comienza el ciclo
            $re = mysqli_query($con, "select * from notas order by id desc limit $empieza, $por_pagina") or die(mysqli_error($con));
            while ($f = mysqli_fetch_assoc($re)) {
            ?>
                <div class="anuncio">
                    <center>
                        <img class="limitar" src="<?php echo $f['imagen']; ?>" alt="Anuncio casa en el lago">
                    </center>
                    <div class="contenido-anuncio bajo">
                        <div>
                            <h3><?php echo $f['titulo']; ?></h3>
                            <p><?php echo $f['resumen']; ?></p>
                            <p class="precio"><?php echo $f['fecha']; ?></p>
                            <p>Autor: <?php echo $f['autor']; ?></p>
                        </div>
                        <div>
                            <a href="anuncio.php?id=<?php echo $f['id']; ?>" class="boton boton-amarillo d-block">Ver Propiedad</a>
                        </div>
                    </div>
                </div>
            <?php
            }
            ?>

        </div>
        <div class="ocultar">
            <center>
                <?php
                //Seleccionar todo de la tabla elementos
                $res = mysqli_query($con, "select * from notas");

                //Contar el total de registros
                $total_registros = mysqli_num_rows($res);
                //Usando ceil para dividir el total de registros entre $por_pagina
                $total_paginas = ceil($total_registros / $por_pagina);

                //Total de paginas
                $totalpaginas = ceil($total_registros / $por_pagina);

                //Errores:
                if ($pagina > $total_paginas) {
                    header("Location: anuncios.php?pagina=" . $total_paginas);
                }

                //Primeros links

                if ($pagina > $totalpaginas || $pagina <= 0) {
                    echo "<a class='pagina boton bntlink boton-amarillo btnborder' href='anuncios.php?pagina=1'>Primera</a>";
                }

                if ($pagina > 1) {
                    echo "<a class='pagina boton bntlink boton-amarillo btnborder' href='anuncios.php?pagina=1'>Primera</a>";
                    echo "<a class='pagina boton bntlink boton-amarillo btnborder' href='anuncios.php?pagina=" . ($pagina - 1) . "'><<</a>";
                }




                //Arreglo de los liks
                ?>
                <span>
                    <?php
                    $rangoinicio = 0;
                    $rangofin = 0;
                    $y = 1;
                    $z = 10;
                    if ($pagina >= $y && $pagina <= $z) {
                        $rangoinicio = $y;
                        $rangofin = $z;
                        if ($rangofin > $totalpaginas) {
                            $rangofin = $totalpaginas;
                        }
                        for ($i = $rangoinicio; $i <= $rangofin; $i++) {
                            if ($i == $pagina) {
                                echo "<a class='boton bntlink boton-amarillo-select btnborder' href='anuncios.php?pagina=" . $i . "'>" . $i . "</a>";
                            } else {
                                echo "<a class='boton bntlink boton-amarillo btnborder' href='anuncios.php?pagina=" . $i . "'>" . $i . "</a>";
                            }
                        }
                    } else {
                        $a = 10;
                        $bandera = True;
                        while ($bandera == True) {
                            if ($pagina >= ($y + $a) && $pagina <= ($z + $a)) {
                                $rangoinicio = ($y + $a);
                                $rangofin = ($z + $a);
                                if ($rangofin > $totalpaginas) {
                                    $rangofin = $totalpaginas;
                                }
                                //$rangofin = $totalpaginas;

                                for ($i = $rangoinicio; $i <= $rangofin; $i++) {
                                    if ($i == $pagina) {
                                        echo "<a class='boton bntlink boton-amarillo-select btnborder' href='anuncios.php?pagina=" . $i . "'>" . $i . "</a>";
                                    } else {
                                        echo "<a class='boton bntlink boton-amarillo btnborder' href='anuncios.php?pagina=" . $i . "'>" . $i . "</a>";
                                    }
                                }
                                break;
                            } else {
                                $a = $a + 10;
                            }
                        }
                    }
                    //Fin del areglo
                    ?>
                </span>
                <?php

                //Ultimo link
                if ($pagina < $totalpaginas) {
                    echo "<a class='pagina boton bntlink boton-amarillo btnborder' href='anuncios.php?pagina=" . ($pagina + 1) . "'>>></a>";
                    echo "<a class='pagina boton bntlink boton-amarillo btnborder' href='anuncios.php?pagina=" . $totalpaginas . "'>Última</a>";
                }
                ?>


            </center>
        </div>
    </main>

    <footer class="site-footer seccion">
        <iframe class="ifooter" name="_parent" src="template/footer.html" frameborder="0" hspace="0" vspace="0" marginheight="0" marginwidth="0" scrolling="no"></iframe>
    </footer>
</body>

</html>