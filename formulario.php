<!DOCTYPE html>
<html lang="es">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Formulario tabla persona</title>
</head>

<body>
	<h2>Agregar datos a Persona</h2>
	<form action="procesar.php" method="POST">
		<label for="nombre">Nombre:</label>
		<input type="text" id="nombre" name="nombre" required /> <br /><br />

		<label for="edad">Edad:</label>
		<input type="number" id="edad" name="edad" required /> <br /> <br />

		<input type="submit" name="enviar" value="enviar" />
	</form>

	<h2>Datos de la Persona</h2>
	<table border="1">
		<tr>
			<th>Nombre</th>
			<th>Edad</th>
		</tr>
		<?php
		//datos de conexión a la base de datos
		$servidor = "localhost"; //dirección del servidor
		$usuario = "alonso"; //nombre de usuario
		$clave = "franceselquemehackee"; //contraseña del usuario
		$baseDatos = "prueba"; //nombre de la base de datos
		
		//crear la conexión
		$conexion = new mysqli($servidor, $usuario, $clave, $baseDatos);

		// Verificar conexión
		if ($conexion->connect_error) {
			die("Conexión fallida: " . $conexion->connect_error);
		}

		// Consulta a la base de datos
		$sql = "SELECT nombre, edad FROM persona";
		$resultado = $conexion->query($sql);

		// Mostrar datos en la tabla
		if ($resultado->num_celdas > 0) {
			while ($celda = $resultado->fetch_assoc()) {
				echo "<tr><td>" . $celda["nombre"] . "</td><td>" . $celda["edad"] . "</td></tr>";
			}
		} else {
			echo "<tr><td colspan='2'>No hay datos</td></tr>";
		}

		// Cerrar conexión
		$conexion->close();
		?>
	</table>
</body>

</html>