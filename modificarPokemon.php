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
            mysqli_close($conexion);
            header("Location: pokedex.php");
            exit;
            
            }
            header("Location: pokedex.php");
            exit;
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
    <div style = "background-color:rgba(133,133,133,0.4); display: inline-block; padding:1em;" data-aos="fadeIn" data-aos-delay="200">
    <img class="align-center" src="<?php echo $pokemon['imagen'] ?>" alt="imagen">
        <form name="form" action="" method="POST" enctype="multipart/form-data">

<label>id</label>
  <div class="input-group mb-3">
  <div class="input-group-prepend">
  </div>
  <input type="text" class="form-control text-center" name="id" placeholder="id" aria-label="id" value="<?php echo $pokemon['id'] ?>" aria-describedby="basic-addon1" required disabled>
</div>

<label>imagen</label>
        <div class="custom-file input-group mb-3">
    <input type="file" class="custom-file-input" id="imagen" name="imagen" aria-describedby="inputGroupFileAddon01">
    <label class="custom-file-label" for="inputGroupFile01">imagen</label>
  </div>

<label>nombre</label>
  <div class="input-group mb-3">
  <div class="input-group-prepend">
  </div>
  <input type="text" class="form-control text-center" name="nombre" placeholder="nombre" aria-label="nombre" value="<?php echo $pokemon['nombre'] ?>"aria-describedby="basic-addon1" required>
</div>

<label>ataque</label>
<div class="input-group mb-3">
  <div class="input-group-prepend">
  </div>
  <input type="text" class="form-control text-center" name="ataque" placeholder="ataque" aria-label="ataque" value="<?php echo $pokemon['ataque'] ?>" aria-describedby="basic-addon1" required>
</div>

<label>tipo</label>
<div class="input-group mb-3">
  <div class="input-group-prepend">
  </div>
  <input type="text" class="form-control text-center" name="tipo" placeholder="tipo" value="<?php echo $pokemon['tipo'] ?>" aria-label="tipo" aria-describedby="basic-addon1" required>
</div>
			<input type="submit" class="btn btn-success" name="modificar" value="Modificar">
        </form>
    </div>
</div>
</body>