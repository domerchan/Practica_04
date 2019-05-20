<!DOCTYPE html>
<html>

	<head>
		<meta charset="utf-8">
		<title>Crear Nuevo Usuario</title>
		<link rel="stylesheet" type="text/css" href="">
		<style type="text/css" rel="stylesheet">
			.error {
				color: red;
			}
		</style>
	</head>

	<body>

		<?php
			include'../../config/conexionBD.php';

			$cedula = isset($_POST["ced"]) ? trim($_POST["ced"]) : null;
			$nombres = isset($_POST["nom"]) ? mb_strtoupper(trim($_POST["nom"]), 'utf-8') : null;
			$apellidos = isset($_POST["ape"]) ? mb_strtoupper(trim($_POST["ape"]), 'utf-8') : null;
			$direccion = isset($_POST["dir"]) ? mb_strtoupper(trim($_POST["dir"]), 'utf-8') : null;
			$telefono = isset($_POST["tel"]) ? trim($_POST["tel"]) : null;
			$email = isset($_POST["ema"]) ? trim($_POST["ema"]) : null;
			$fNacimiento = isset($_POST["fec"]) ? trim($_POST["fec"]) : null;
			$contrasena = isset($_POST["con"]) ? trim($_POST["con"]) : null;

			$sql = "INSERT INTO usuario VALUES (0, '$cedula', '$nombres', '$apellidos', '$direccion', '$telefono', '$email', MD5('$contrasena'), '$fNacimiento', 'N', null, null)";

			if ($conn -> query($sql) === TRUE) {
				echo "Se han creado los datos correctamente";
			} else {
				if ($conn -> errno == 1062) {
					echo "<p class='error'>La persona con la cédula $cedula ya está registrada en el sistema </p>";
				} else {
					echo "<p class = 'error'>Error: ".mysqli.error($conn)."<p/>";
				}
			}

			$conn -> close();
			echo "<a href='../vista/login.html'>Regresar</a>";
		?>
	</body>

</html>