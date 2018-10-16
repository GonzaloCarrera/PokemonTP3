<?php
    session_start();
    if(!isset($_SESSION["LOGIN"])){
        echo '<nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="pokedex.php">Pokémon</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
      
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
              <a class="nav-link" href="pokedex.php">Inicio</a>
            </li>
          </ul>
          <form class="form-inline my-2 my-lg-0" action="login.php" method="POST">
            <input class="form-control mr-sm-2" type="text" placeholder="usuario" name="nombre" id="nombre">
            <input class="form-control mr-sm-2" type="password" placeholder="password" name="contraseña" id="contraseña">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit" name="enviar">Iniciar sesión</button>
          </form>
        </div>
      </nav>';
    } else{
        echo '<nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="pokedex.php">Pokémon</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
      
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
              <a class="nav-link" href="pokedex.php">Inicio</a>
            </li>
            <li class="nav-item active">
              <a class="nav-link" href="cargarPokemon.php">Cargar pokémon</a>
            </li>
          </ul>
          <div class="form-inline my-2 my-lg-0">
          <span style="margin-right:1em;">Bienvenido, ' .$_SESSION["LOGIN"] .'</span>
          <form class="form-inline my-2 my-lg-0" action="cerrarSesion.php" method="post">
            <button class="btn btn-outline-danger my-2 my-sm-0" type="submit" name="enviar">Cerrar sesión</button>
          </form>
          </div>
        </div>
      </nav>';
    }

    
?>

