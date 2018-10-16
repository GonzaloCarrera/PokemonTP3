<!DOCTYPE html>
<head>
	<title>Login</title>
</head>
<body>

	<?php

	if(isset($_POST["enviar"]) && $_SERVER["REQUEST_METHOD"] == "POST"){

		if(isset($_POST["nombre"]) && isset($_POST["contraseña"])){
			$nombre = $_POST["nombre"];
			$password = $_POST["contraseña"];
            require ("validarUsuario.php");
		  	if ($loginOk) {
                session_start();
                $_SESSION["LOGIN"]=$nombre;
                header("Location: pokedex.php");
		  	} else {
                header("Location: pokedex.php");
			}
		  }
		}

    ?>
    
    
	</body>