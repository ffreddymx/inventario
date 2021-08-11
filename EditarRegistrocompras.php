<?php
	session_start();
	include_once('dbconect.php');

	if(isset($_POST['editar'])){
		$database = new Connection();
		$db = $database->open();
		try{

			$id = $_GET['id'];


			$sql = "SELECT idpro,cantidad FROM compras WHERE id = '$id' ";
				foreach ($db->query($sql) as $row) {
			$idpro = $row['idpro'];	
			$excan = $row['cantidad'];		
			 }



			$name = $_POST['name'];
            $cantidad = $_POST['cantidad'];
			$precio = $_POST['precio'];
			$fecha = $_POST['fecha'];

			$sql = "UPDATE  compras SET cantidad = '$cantidad',precio = '$precio', fecha = '$fecha' WHERE id = '$id'";
			//if-else statement in executing our query
			$_SESSION['message'] = ( $db->exec($sql) ) ? 'Producto actualizado correctamente' : 'No se puso actualizar producto';



  #se devuelven las cantidades al alamcen

	$sql = "UPDATE  products SET cantidad = cantidad - ('$excan'-'$cantidad') WHERE id = '$idpro'";
			$_SESSION['message'] = ( $db->exec($sql) ) ? 'Producto actualizado correctamente' : 'Productos insuficientes';	


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

	header('location: compras.php');

?>