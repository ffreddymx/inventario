<?php
	session_start();
	include_once('dbconect.php');


	if(isset($_GET['id'])){
		$database = new Connection();
		$db = $database->open();
		try{


			$sql = "SELECT idpro,cantidad FROM sold WHERE id = '".$_GET['id']."' ";
				foreach ($db->query($sql) as $row) {
			$idpro = $row['idpro'];	
			$excan = $row['cantidad'];		
			 }


			$sql = "DELETE FROM sold WHERE id = '".$_GET['id']."'";
			//if-else statement in executing our query
			$_SESSION['message'] = ( $db->exec($sql) ) ? 'Producto Borrado' : 'Hubo un error al borrar';
		

	$sql = "UPDATE  products SET cantidad = cantidad + ('$excan') WHERE id = '$idpro'";
			$_SESSION['message'] = ( $db->exec($sql) ) ? 'Producto actualizado correctamente' : 'Productos insuficientes';	



		}
		catch(PDOException $e){
			$_SESSION['message'] = $e->getMessage();
		}

		//Cerrar conexión
		$database->close();

	}
	else{
		$_SESSION['message'] = 'Seleccionar producto para eliminar primero';
	}

	header('location: vendidos.php');

?>