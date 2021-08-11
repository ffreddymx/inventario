<?php
session_start();
include_once('dbconect.php');

if(isset($_POST['cotizar'])){
	$database = new Connection();
	$db = $database->open();
	try{
		$user =  $_SESSION['user_id'];
		//hacer uso de una declaración preparada para prevenir la inyección de sql
		$stmt = $db->prepare("INSERT INTO cotizar(cantidad, fecha, precio, idpro, user) VALUES (:cant, :fech, :prec, :idpro,:user)");
		//instrucción if-else en la ejecución de nuestra declaración preparada
		$_SESSION['message'] = ( $stmt->execute(array(':cant' => $_POST['cantidad'] , ':fech' => $_POST['fecha']  , ':idpro' => $_POST['id'] , ':prec' => $_POST['precio'],':user'=>$user )) ) ? 'Empleado guardado correctamente' : 'Algo salió mal. No se puede agregar miembro';	
	
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
header('location: cotizar.php');
?>