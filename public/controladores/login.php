<?php
	session_start();

	include '../../config/conexionBD.php';

	$usuario = isset($_POST["usu"]) ? trim($_POST["usu"]) : null;
	$contrasena = isset($_POST["con"]) ? trim($_POST["con"]) : null;

	$sql = "SELECT * FROM usuario WHERE usu_correo = '$usuario' and usu_password = MD5('$contrasena')";

	$result = $conn -> query($sql);

	if ($result -> num_rows > 0) {
		$_SESSION['isLogged'] = TRUE;
		header("Location: ../../admin/vista/usuario/vista/index.php");
	} else {
		header("Location: ../vista/login.html");
	}

	$conn -> close();
?>