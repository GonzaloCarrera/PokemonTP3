<html>
    <head>
        <title>Pokedex</title>
    </head>
    <body>
        <?php

            require ("nav.php");                      
		
            require ("buscar.html");
            
            require ("buscarPokemon.php");
            

            echo '<div class="container">';                
            //ksort($pokemons);
            $nombrePokemon = null;
            
            if(isset($_GET["whoisthatpokemon"])){
                $nombrePokemon = strtolower($_GET['whoisthatpokemon']);
            }
            if($nombrePokemon == null){
                echo '<table class="table table-bordered text-center" style="background-color:rgba(133,133,133,0.4);" data-aos="fadeIn" data-aos-delay="200">
          <thead class="thead-dark">
            <tr>
            <th scope="col">imagen</th>
            <th scope="col">nombre</th>
            <th scope="col">ataque</th>
            <th scope="col">tipo</th>';
            if(isset($_SESSION["LOGIN"])){
                echo '<th scope="col">opciones</th>';
            }
          '</tr>
        </thead>
        <tbody>';
                foreach($pokemons as $pokemon=>$stats){
                    echo "<tr>";
                    foreach($stats as $i=>$desc){
                        if($i=='imagen'){
                            echo '<td class="align-middle"                         
                            data-aos="fade-right"
                            data-aos-offset="-400"
                            data-aos-delay="0"
                            data-aos-duration="500"
                            data-aos-easing="linear"
                            data-aos-once="true"
                            data-aos-anchor-placement="top-center"><img src = ' . $desc . ' alt="..." style="max-width:6em;"></td>';
                        } else {
                            if($i=='id'){}
                                else{
                            echo '<td class="align-middle">' . $desc. '</td>';
                                }
                                if(isset($_SESSION["LOGIN"])){
                                    if($i=='tipo'){
                                        echo ' <td class="align-middle">
                                        <a class="btn btn-success my-2" href=modificarPokemon.php?idPokemon='.$stats['id'].'>Modificar</a>
                                        <form class="form-block my-2 my-lg-0" action="eliminarPokemon.php" method="post">
                                    <button class="btn btn-danger my-2 my-sm-0" type="submit" name="idPokemon" value='.$stats['id'].'>Eliminar</button>
                                    </form>
                                    </td>';
                                    }
                                }
                        }
                    }
                    echo "</tr>";
                }
              echo '</tbody>
                </table>';
            } else {
                if(count($pokemons) > 0){
                    echo '<table class="table table-bordered text-center" style="background-color:rgba(133,133,133,0.4);" data-aos="fadeIn" data-aos-delay="200">
          <thead class="thead-dark">
            <tr>
            <th scope="col">imagen</th>
            <th scope="col">nombre</th>
            <th scope="col">ataque</th>
            <th scope="col">tipo</th>
          </tr>
        </thead>
        <tbody>';
                foreach($pokemons as $pokemon=>$stats){
                    echo "<tr>";
                    foreach($stats as $i=>$desc){
                        if($i=='imagen'){
                            echo '<td class="align-middle"                         
                            data-aos="fade-right"
                            data-aos-offset="-400"
                            data-aos-delay="0"
                            data-aos-duration="500"
                            data-aos-easing="linear"
                            data-aos-once="true"
                            data-aos-anchor-placement="top-center"><img src = ' . $desc . ' alt="..." style="max-width:6em;"></td>';
                        } else {
                            if($i=='id'){}
                                else{
                            echo '<td class="align-middle">' . $desc. '</td>';
                                }
                         
                        }
                    }
                    echo "</tr>";
                }
              echo '</tbody>
                </table>';
                } else{
                   echo '<p class="text-center saw">El pokemon <span class="text-danger">' . $nombrePokemon . "</span> no ha sido encontrado.</p>";
                }
            }
            echo '</div>';
        ?>
        
 
    </body>
</html>
