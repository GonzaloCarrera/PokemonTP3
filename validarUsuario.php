<?php
    require ("conexion.php");

    $loginOk = false;
    $consulta="SELECT * FROM usuario where user = '" .$nombre . "' and pass ='" .$password . "'";

    $resultado=mysqli_query($conexion,$consulta);
    if(mysqli_num_rows($resultado)==1){
        $loginOk = true;
    }

    mysqli_close($conexion);
    return $loginOk;
?>