<?php
	session_start();
	session_destroy();
	header('location:pokedex.php');
	exit;
?>