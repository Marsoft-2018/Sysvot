<?php 
	session_start();

	require_once ("../modelo/Conect.php");
	require_once ('../modelo/User.php');

	$usuario = $_REQUEST['user'];
	$password = $_REQUEST['password'];

	// $usuario = $_GET['usuario'];
	// $password = $_GET['contrasena'];
 	
 	// echo "Datos: ".$usuario." - ".$password;
	$objUsu = new User();
	$objUsu->id = $usuario;
	$objUsu->password = $password;
	echo json_encode($objUsu->login());

?>