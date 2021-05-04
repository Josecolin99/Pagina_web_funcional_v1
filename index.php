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

    <header class="site-header inicio">
        <div class="contenedor contenido-header">
            <div class="barra">
                <a href="index.php">
                    <img src="img/logo.svg" alt="Logotipo de Bienes Raices">
                </a>

                <!--<div class="mobile-menu">
                    <a href="#navegacion">
                        <img src="img/barras.svg" alt="Icono Menu">
                    </a>
                </div>-->

                <nav id="navegacion" class="navegacion">
                    <a href="nosotros.html">Nosotros</a>
                    <a href="anuncios.php?pagina=1">Anuncios</a>
                    <a href="contacto.html">Contacto</a>
                </nav>
            </div>
            <h1>Venta de Casas y Departamentos Exclusivos de Lujo</h1>
        </div> <!-- contenedor -->
    </header>

    <section class="contenedor seccion">
        <h2 class="fw-300 centrar-texto">Más Sobre Nosotros</h2>

        <div class="iconos-nosotros">
            <div class="icono">
                <img src="img/icono1.svg" alt="Icono Seguridad">
                <h3>Seguridad</h3>
                <p>Quasi quibusdam, quos deserunt, recusandae iusto dolorem voluptatibus quaerat veritatis consectetur culpa sit dignissimos maiores iure id, magnam non voluptatum molestiae doloremque.</p>
            </div>

            <div class="icono">
                <img src="img/icono2.svg" alt="Icono Mejor Precio">
                <h3>El Mejor Precio</h3>
                <p>Quasi quibusdam, quos deserunt, recusandae iusto dolorem voluptatibus quaerat veritatis consectetur culpa sit dignissimos maiores iure id, magnam non voluptatum molestiae doloremque.</p>
            </div>

            <div class="icono">
                <img src="img/icono3.svg" alt="Icono a Tiempo">
                <h3>A Tiempo</h3>
                <p>Quasi quibusdam, quos deserunt, recusandae iusto dolorem voluptatibus quaerat veritatis consectetur culpa sit dignissimos maiores iure id, magnam non voluptatum molestiae doloremque.</p>
            </div>
        </div>
    </section>

    <main class="seccion contenedor">
        <h2 class="fw-300 centrar-texto">Nuevas entradas</h2>

        <div class="contenedor-anuncios">
        <?php
            include 'conexion.php';
            $re = mysqli_query($con, "select * from notas order by id desc LIMIT 3") or die(mysqli_error($con));
            while ($f = mysqli_fetch_array($re)) {
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

        <div class="ver-todas">
            <a href="anuncios.php" class="boton boton-verde">Ver Todas</a>
        </div>
    </main>

    <section class="imagen-contacto">
        <div class="contenedor contenido-contacto">
            <h2>Encuentra la casa de tus sueños</h2>
            <p>Llena el formulario de contacto y un asesor se pondrá en contacto contigo a la brevedad</p>
            <a href="contacto.html" class="boton boton-amarillo">Contactános</a>
        </div>
    </section>

    <div class="seccion-inferior contenedor seccion">
        <section class="blog">
            <h3 class="centrar-texto fw-300">Nuestro Blog</h3>

            <article class="entrada-blog">
                <div class="imagen">
                    <img src="img/blog1.jpg" alt="Entrada de blog">
                </div>
                <div class="texto-entrada">
                    <a href="entrada.html">
                        <h4>Terraza  en el techo de tu casa</h4>
                    </a>
                    <p>Escrito el: <span> 20/10/2019 </span> por: <span> Admin </span> </p>
                    <p>Consejos para construir una terraza en el techo de tu casa, con los mejores materiales y ahorrando dinero</p>
                </div>
            </article>

            <article class="entrada-blog">
                <div class="imagen">
                    <img src="img/blog2.jpg" alt="Entrada de blog">
                </div>
                <div class="texto-entrada">
                    <a href="entrada.html">
                        <h4>Guía para la decoración de tu hogar</h4>
                    </a>
                    <p>Escrito el: <span> 20/10/2019 </span> por: <span> Admin </span> </p>
                    <p>Maximiza el espacio en tu hogar con esta guia, aprende a combinar muebles y colores para darle vida a tu espacio</p>
                </div>
            </article>
        </section>

        <section class="testimoniales">
            <h3 class="centrar-texto fw-300">Testimoniales</h3>
            <div class="testimonial">
                
                <blockquote>
                    El personal se comportó de una excelente forma, muy buena atención y la casa que me ofrecieron cumple con todas mis expectativas.
                </blockquote>
                <p>- Juan De la torre</p>
            </div>
        </section>

    </div>

    <footer class="site-footer seccion">
        <iframe class="ifooter" name="_foo" src="template/footer.html" frameborder="0" hspace="0" vspace="0" marginheight="0" marginwidth="0" scrolling="no"></iframe>
    </footer>
</body>
</html>