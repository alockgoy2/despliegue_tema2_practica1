<?php
	//mostrar errores (depuración)
	ini_set('display_errors',1);
	ini_set('display_startup_errors',1);
	error_reporting(E_ALL);

	//obtener datos del formulario
	$nombre = $_POST['nombre']; //obtener el nombre
	$edad = $_POST['edad']; //obtener la edad

	//datos de conexión a la base de datos
	$servidor = "localhost"; //dirección del servidor
	$usuario = "alonso"; //nombre de usuario
	$clave = "franceselquemehackee"; //contraseña del usuario
	$baseDatos = "prueba"; //nombre de la base de datos

	//crear la conexión
	$conexion = new mysqli($servidor, $usuario, $clave, $baseDatos);

	//verificar que la conexión funciona
	if($conexion->connect_error){
		echo "Error conectando a la base de datos: " . $conexion->connect_error;
	} else {
		//consulta sql
		$consulta = "insert into persona (nombre, edad) values ('$nombre', '$edad')";

		//intentar insertar los datos
		if($conexion->query($consulta) === TRUE){
			echo "Datos añadidos con éxito";
		} else {
			echo "Error añadiendo los datos: " . $conexion->error;
		}
	}

	//cerrar la conexión
	$conexion->close();
?>
