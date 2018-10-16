<?php
    require ("nav.php");  
    require ("buscar.html"); 
    $pokemon = null;
    $idPokemon = null;


    if(isset($_SESSION["LOGIN"])){ 
    if(isset($_POST["cargar"])){
        require("conexion.php");
        $imagen = $_FILES['imagen'];
        $nombre = $_POST["nombre"];
        $ataque = $_POST["ataque"];
        $tipo = $_POST["tipo"];
		$newImg = "recursos/img/" . basename($imagen['name']);
    	if(is_uploaded_file($imagen['tmp_name'])){
			
			if (move_uploaded_file($imagen['tmp_name'], $newImg)) {
                $consulta='INSERT INTO pokemon (imagen, nombre, ataque, tipo) VALUES ("'.$newImg.'","'.$nombre.'","'.$ataque.'","'.$tipo.'")' ;
	    		$resultado=mysqli_query($conexion,$consulta);
			}
		}
        mysqli_close($conexion);
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
    <title>Cargar pokemon</title>
</head>
<body>
<div class="container text-center">
    <div style = "background-color:rgba(133,133,133,0.4); display: inline-block; padding:1em;" data-aos="fadeIn" data-aos-delay="200">
        <form name="form" action="" method="POST" enctype="multipart/form-data">
        
        <div class="input-group mb-3">
  <div class="input-group-prepend">
  </div>
  <div class="custom-file">
    <input type="file" class="custom-file-input" id="imagen" name="imagen" aria-describedby="inputGroupFileAddon01" required>
    <label class="custom-file-label" for="inputGroupFile01">imagen</label>
  </div>
</div>

<div class="input-group mb-3">
  <div class="input-group-prepend">
  </div>
  <input type="text" class="form-control text-center" name="nombre" placeholder="nombre" aria-label="nombre" aria-describedby="basic-addon1" required>
</div>

<div class="input-group mb-3">
  <div class="input-group-prepend">
  </div>
  <input type="text" class="form-control text-center" name="ataque" placeholder="ataque" aria-label="ataque" aria-describedby="basic-addon1" required>
</div>

<div class="input-group mb-3">
  <div class="input-group-prepend">
  </div>
  <input type="text" class="form-control text-center" name="tipo" placeholder="tipo" aria-label="tipo" aria-describedby="basic-addon1" required>
</div>
			<input type="submit" class="btn btn-success" name="cargar" value="Cargar Pokemon">
        </form>
    </div>
</div>
</body>