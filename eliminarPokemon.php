<?php
    session_start();
    if(isset($_SESSION["LOGIN"])){    
        if(isset($_POST["idPokemon"])){  
            require ("conexion.php");
            $idPokemon = $_POST["idPokemon"];
            $consulta="DELETE FROM pokemon where id =" .$idPokemon;
            //obtenemos el resultado
            $resultado=mysqli_query($conexion,$consulta);

            //imprimimos los resultados
            mysqli_close($conexion);
            header("Location: pokedex.php");
            exit;
        }
        header("Location: pokedex.php");
        exit;
    }
    header("Location: pokedex.php");
    exit;
?>