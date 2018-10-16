<?php
    require ("nav.php");  
    require ("buscar.html"); 
    $pokemon = null;
    $idPokemon = null;
    if(isset($_SESSION["LOGIN"])){    
        if(isset($_GET["idPokemon"])){  
            require ("conexion.php");
            $idPokemon = $_GET["idPokemon"];
            $consulta="SELECT * FROM pokemon where id =" .$idPokemon;
            //obtenemos el resultado
            $resultado=mysqli_query($conexion,$consulta);

            $pokemon=mysqli_fetch_assoc($resultado);
            mysqli_close($conexion);
        }
    } else{
        header("Location: pokedex.php");
            exit;
    }

    if(isset($_SESSION["LOGIN"])){    
        if(isset($_POST["modificar"]) && $_SERVER["REQUEST_METHOD"] == "POST"){

            if(isset($_POST["nombre"]) && isset($_POST["ataque"]) && isset($_POST["tipo"])){
            require("conexion.php");
            
            $nombre = $_POST["nombre"];
            $ataque = $_POST["ataque"];
            $tipo = $_POST["tipo"];
            $imagen = $_FILES['imagen'];
            if(basename($imagen['name'])!=null){
                $imagen = $_FILES['imagen'];
                $newImg = "recursos/img/" . basename($imagen['name']);
                if(is_uploaded_file($imagen['tmp_name'])){
                    if (move_uploaded_file($imagen['tmp_name'], $newImg)) {
                        $consulta='UPDATE pokemon SET imagen = "' .$newImg . '", nombre="' .$nombre . '", ataque="' .$ataque. '", tipo="' .$tipo. '" WHERE id=' .$idPokemon;
                        $resultado=mysqli_query($conexion,$consulta);
                    }
                }
		}else{
            $consulta='UPDATE pokemon SET nombre="' .$nombre . '", ataque="' .$ataque. '", tipo="' .$tipo. '" WHERE id=' .$idPokemon;
            $resultado=mysqli_query($conexion,$consulta);
        }
        header("Location: pokedex.php");
            exit;
            mysqli_close($conexion);
            }
        }
    } else{
        header("Location: pokedex.php");
        exit;
    }
?>

<!DOCTYPE html>
<head>
    <title>Modificar pokemon</title>
</head>
<body>
<div class="container text-center">
    <div style = "background-color:rgba(133,133,133,0.4); display: inline-block; padding:1em;">
    <img class="align-center" src="<?php echo $pokemon['imagen'] ?>" alt="imagen">
		<form name="form" action="" method="POST" enctype="multipart/form-data">
			<label>Id</label><br/>
			<input type="text" style="margin-bottom:1em;" value="<?php echo $pokemon['id'] ?>" disabled><br/>
			<label>Imagen</label><br/>
			<input type="file" style="margin-bottom:1em;" name="imagen"><br/>
			<label>Nombre</label><br/>
			<input type="text" style="margin-bottom:1em;" name="nombre" value="<?php echo $pokemon['nombre'] ?>"><br/>
			<label>Ataque</label><br/>
			<input type="text" style="margin-bottom:1em;" name="ataque" value="<?php echo $pokemon['ataque'] ?>"><br/>
			<label>Tipo</label><br/>
			<input type="text" style="margin-bottom:1em;" name="tipo" value="<?php echo $pokemon['tipo'] ?>"><br/>
			<input type="submit" style="margin-top:1em;" name="modificar" value="Modificar">
        </form>
    </div>
</div>
</body>