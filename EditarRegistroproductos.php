<?php
	session_start();
	include_once('dbconect.php');

	if(isset($_POST['editar'])){
		$database = new Connection();
		$db = $database->open();
		try{
			$id = $_GET['id'];
			$codigo = $_POST['codigo'];
			$name = $_POST['name'];
            $cantidad = $_POST['cantidad'];
			$precio = $_POST['precio'];
			$fecha = $_POST['fecha'];
			$detalles = $_POST['detalles'];

			$sql = "UPDATE  products SET codigo = '$codigo', name = '$name', cantidad = '$cantidad',precio = '$precio', fecha = '$fecha', detalles = '$detalles' WHERE id = '$id'";
			//if-else statement in executing our query
			$_SESSION['message'] = ( $db->exec($sql) ) ? 'Producto actualizado correctamente' : 'No se puso actualizar producto';

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

	header('location: productos.php');

?>