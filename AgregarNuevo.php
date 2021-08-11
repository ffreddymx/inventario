<?php
session_start();
include_once('dbconect.php');

if(isset($_POST['agregar'])){
	$database = new Connection();
	$db = $database->open();
	try{
		//hacer uso de una declaración preparada para prevenir la inyección de sql
		$stmt = $db->prepare("INSERT INTO users(nombre, apellido, telefono) VALUES (:nombre, :apellido, :telefono)");
		//instrucción if-else en la ejecución de nuestra declaración preparada
		$_SESSION['message'] = ( $stmt->execute(array(':nombre' => $_POST['nombre'] , ':apellido' => $_POST['apellido'] , ':telefono' => $_POST['telefono'])) ) ? 'Empleado guardado correctamente' : 'Algo salió mal. No se puede agregar miembro';	
	
	}
	catch(PDOException $e){
		$_SESSION['message'] = $e->getMessage();
	}

	//cerrar la conexion
	$database->close();
}
else{
	$_SESSION['message'] = 'Llene el formulario';
}
header('location: empleados.php');
?>