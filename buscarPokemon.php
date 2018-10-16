<?php
//creamos la consulta
require ("conexion.php");
$nombrePokemon = null;
    
    $pokemons = Array();
    if(isset($_GET["whoisthatpokemon"])&&$_GET["whoisthatpokemon"]!=null){
        $nombrePokemon = strtolower($_GET['whoisthatpokemon']);

        $consulta="SELECT * FROM pokemon where nombre = '" .$nombrePokemon . "'";

        //obtenemos el resultado
        $resultado=mysqli_query($conexion,$consulta);

        //imprimimos los resultados
        while ($rows=mysqli_fetch_assoc($resultado)) {
            array_push($pokemons, $rows);
        }

    mysqli_close($conexion);
    return $pokemons;
    } else{
        $consulta="SELECT * FROM pokemon";

        //obtenemos el resultado
        $resultado=mysqli_query($conexion,$consulta);

        //imprimimos los resultados
        while ($rows=mysqli_fetch_assoc($resultado)) {
            array_push($pokemons, $rows);
        }
        mysqli_close($conexion);
    return $pokemons;
    }



?>