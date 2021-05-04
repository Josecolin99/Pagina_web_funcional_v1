<?php
session_start();
	include "../conexion.php";
	if(isset($_SESSION['user'])){
        header("Location: admin.php");
	}else{
		
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


    <h1 class="fw-300 centrar-texto">Login</h1>

    <main class="contenedor seccion contenido-centrado">
        <h2 class="fw-300 centrar-texto">Llena el formulario de Contacto</h2>
        <?php 
		if(isset($_GET['error'])){
			echo '<span class="alert"><center>Datos No Validos</center></span>';
		}
		?>

        <form class="contacto" action="verificar.php" method="post">
            <fieldset>
            <label>Usuario: <span>*</span>
			    <input type="text" name="user" placeholder="Usuario" required>
		    </label>

		    <label>Contraseña: <span>*</span>
			    <input type="password" name="password" placeholder="Contraseña"  required>
		    </label>

            </fieldset>

            <input type="submit" value="Iniciar sesion" class="boton boton-verde">

        </form>
    </main>

    <footer class="site-footer seccion">
        <iframe class="ifooter" name="_parent" src="../template/footer.html" frameborder="0" hspace="0" vspace="0" marginheight="0" marginwidth="0" scrolling="no"></iframe>
    </footer>
</body>
</html>