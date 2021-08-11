<?php
	session_start();
	include_once('dbconect.php');

	if(isset($_POST['editar'])){
		$database = new Connection();
		$db = $database->open();
		try{
			$id = $_GET['id'];
			$user = $_POST['usuario'];
			$nombre = $_POST['nombre'];
			$apellido = $_POST['apellido'];
			$tel= $_POST['telefono'];
			$tipo= $_POST['tipo'];

			$sql = "UPDATE  users SET usuario='$user', nombre = '$nombre', apellido = '$apellido',telefono = '$tel',pass='$tipo' WHERE id = '$id'";
			//if-else statement in executing our query
			$_SESSION['message'] = ( $db->exec($sql) ) ? 'Empleado actualizado correctamente' : 'No se pudo actualizar empleado';

		}
		catch(PDOException $e){
			$_SESSION['message'] = $e->getMessage();
		}

		//Cerrar la conexión
		$database->close();
	}
	else{
		$_SESSION['message'] = 'Complete el formulario de edición';
	}

	header('location: empleados.php');

?>