<?php
session_start();
include_once('dbconect.php');

if(isset($_POST['agregar'])){
	$database = new Connection();
	$db = $database->open();
	try{
		//hacer uso de una declaración preparada para prevenir la inyección de sql
		$stmt = $db->prepare("INSERT INTO products(codigo,name,cantidad,fecha,precio,detalles,iddepa) VALUES (:codigo,:name,:cantidad, :fecha, :precio,:detalles,:iddepa)");
		//instrucción if-else en la ejecución de nuestra declaración preparada
		$_SESSION['message'] = ( $stmt->execute(array(':codigo'=> $_POST['codigo'],':name' => $_POST['name'] ,':cantidad' => $_POST['cantidad'] , ':fecha' => $_POST['fecha'] , ':precio' => $_POST['precio'],':detalles' => $_POST['detalles'],':iddepa' => $_POST['depa'] )) ) ? 'Producto agregado correctamente' : 'Algo salió mal. No se puede agregar producto';	
	
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

header('location: productos.php');
	
?>