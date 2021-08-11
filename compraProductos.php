<?php
session_start();
include_once('dbconect.php');

if(isset($_POST['vender'])){
	$database = new Connection();
	$db = $database->open();
	try{
		//hacer uso de una declaración preparada para prevenir la inyección de sql
		$stmt = $db->prepare("INSERT INTO compras(cantidad, fecha, precio, idpro) VALUES (:cant, :fech, :prec, :idpro)");
		//instrucción if-else en la ejecución de nuestra declaración preparada
		$_SESSION['message'] = ( $stmt->execute(array(':cant' => $_POST['cantidad'] , ':fech' => $_POST['fecha']  , ':idpro' => $_POST['id'] , ':prec' => $_POST['precio'])) ) ? 'Empleado guardado correctamente' : 'Algo salió mal. No se puede agregar miembro';	
	

	$can = $_POST['cantidad'];
	$id = $_POST['id'];

	$sql = "UPDATE  products SET cantidad = cantidad + '$can' WHERE id = '$id'";
			$_SESSION['message'] = ( $db->exec($sql) ) ? 'Producto actualizado correctamente' : 'Productos insuficientes';	

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
header('location: vender.php');
?>