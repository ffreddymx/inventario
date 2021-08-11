<?php
session_start();
include_once('dbconect.php');

if(isset($_POST['agregar'])){
	$database = new Connection();
	$db = $database->open();
	try{
		//hacer uso de una declaración preparada para prevenir la inyección de sql
		$stmt = $db->prepare("INSERT INTO sold(name,cantidad,fecha,precio,detalles) VALUES (:name,:cantidad, :fecha, :precio,:detalles)");
		//instrucción if-else en la ejecución de nuestra declaración preparada
		$_SESSION['message'] = ( $stmt->execute(array(':name' => $_POST['name'] ,':cantidad' => $_POST['cantidad'] , ':fecha' => $_POST['fecha'] , ':precio' => $_POST['precio'],':detalles' => $_POST['detalles'] )) ) ? 'Producto agregado correctamente' : 'Algo salió mal. No se puede agregar producto';	
	
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

header('location: vendidos.php');
	
?>