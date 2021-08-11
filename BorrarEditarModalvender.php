<!-- Ventana Editar Registros CRUD -->
<div class="modal fade" id="edit_<?php echo $row['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <center><h4 class="modal-title" id="myModalLabel">Compra de producto</h4></center>
            </div>
            <div class="modal-body">
			<div class="container-fluid">
			<form method="POST" action="EditarRegistroproductos.php?id=<?php echo $row['id']; ?>">
				<div class="row form-group">
					<div class="col-sm-2">
						<label class="control-label" style="position:relative; top:7px;">Nombre:</label>
					</div>
					<div class="col-sm-10">
						<input type="text" class="form-control" name="name" value="<?php echo $row['name']; ?>">
					</div>
				</div>
                	<div class="row form-group">
					<div class="col-sm-2">
						<label class="control-label" style="position:relative; top:7px;">Cantidad:</label>
					</div>
					<div class="col-sm-10">
						<input type="text" class="form-control" name="cantidad" value="<?php echo $row['cantidad']; ?>">
					</div>
				</div>
				<div class="row form-group">
					<div class="col-sm-2">
						<label class="control-label" style="position:relative; top:7px;">Fecha:</label>
					</div>
					<div class="col-sm-10">
						<input type="date" class="form-control" name="fecha" value="<?php echo $row['fecha']; ?>">
					</div>
				</div>
				<div class="row form-group">
					<div class="col-sm-2">
						<label class="control-label" style="position:relative; top:7px;">Precio:</label>
					</div>
					<div class="col-sm-10">
						<input type="text" class="form-control" name="precio" value="<?php echo $row['precio']; ?>">
					</div>
				</div>
				
                     <div class="row form-group">
					<div class="col-sm-2">
						<label class="control-label" style="position:relative; top:7px;">Detalles:</label>
					</div>
					<div class="col-sm-10">
						<input type="text" class="form-control" name="detalles" value="<?php echo $row['detalles']; ?>">
					</div>
				</div>


            </div> 
			</div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal"> Cancel</button>
                <button type="submit" name="editar" class="btn btn-success"> Actualizar Ahora</a>
			</form>
            </div>

        </div>
    </div>
</div>


<!-- Vender -->
<div class="modal fade" id="delete_<?php echo $row['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <center><h4 class="modal-title" id="myModalLabel">Venta del producto</h4></center>
            </div>
            <div class="modal-body">	
            	<p class="text-center">Producto Seleccionado</p>
				<h4 class="text-center"><?php echo 'Codigo = '.$row['codigo']?></h4>
				<h4 class="text-center"><?php echo $row['name'].' $'.$row['precio']; ?></h4>
			</div>

		<form method="POST" action="ventaProductos.php">

	      <input type="hidden" name="precio" value="<?php echo $row['precio']; ?>">
	      <input type="hidden" name="id" value="<?php echo $row['id']; ?>">


			    <div class="modal-body">	
            	<p class="text-left">Cantidad a vender ?</p>
     			<input type="text" class="form-control" name="cantidad" value="">
			   </div>

			  <div class="modal-body">	
            	<p class="text-left">Fecha</p>
     			<input type="date" class="form-control" name="fecha" value="">
			   </div>	   

            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal"> Cancelar</button>
                <button type="submit" name="vender" class="btn btn-success"> Confirmar venta</button>
              </div>
         </form>     
        </div>
    </div>
</div>

<!-- Compras -->
<div class="modal fade" id="comprar_<?php echo $row['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <center><h4 class="modal-title" id="myModalLabel">Compra de Productos</h4></center>
            </div>
            <div class="modal-body">	
            	<p class="text-center">Producto Seleccionado</p>
				<h4 class="text-center"><?php echo 'Codigo = '.$row['codigo']?></h4>
				<h4 class="text-center"><?php echo $row['name'].' $'.$row['precio']; ?></h4>
			</div>

		<form method="POST" action="compraProductos.php">

	      <input type="hidden" name="precio" value="<?php echo $row['precio']; ?>">
	      <input type="hidden" name="id" value="<?php echo $row['id']; ?>">


			    <div class="modal-body">	
            	<p class="text-left">Cantidad comprada ?</p>
     			<input type="text" class="form-control" name="cantidad" value="">
			   </div>

			  <div class="modal-body">	
            	<p class="text-left">Fecha</p>
     			<input type="date" class="form-control" name="fecha" value="">
			   </div>	   

            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal"> Cancelar</button>
                <button type="submit" name="vender" class="btn btn-success"> Confirmar compra</button>
              </div>
         </form>     
        </div>
    </div>
</div>

<!-- Corizar -->
<div class="modal fade" id="cotizar_<?php echo $row['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <center><h4 class="modal-title" id="myModalLabel">Agregar a la cotización</h4></center>
            </div>
            <div class="modal-body">	
            	<p class="text-center">Producto Seleccionado</p>
				<h4 class="text-center"><?php echo 'Codigo = '.$row['codigo']?></h4>
				<h4 class="text-center"><?php echo $row['name'].' $'.$row['precio']; ?></h4>
			</div>

		<form method="POST" action="cotizarProducto.php">

	      <input type="hidden" name="precio" value="<?php echo $row['precio']; ?>">
	      <input type="hidden" name="id" value="<?php echo $row['id']; ?>">


			    <div class="modal-body">	
            	<p class="text-left">Cantidad </p>
     			<input type="text" class="form-control" name="cantidad" value="">
			   </div>

			  <div class="modal-body">	
            	<p class="text-left">Fecha</p>
     			<input type="date" class="form-control" name="fecha" value="">
			   </div>	   

            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal"> Cancelar</button>
                <button type="submit" name="cotizar" class="btn btn-success">Agregar a la Cotización</button>
              </div>
         </form>     
        </div>
    </div>
</div>


<!-- Quitar -->
<div class="modal fade" id="quitar_<?php echo $row['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <center><h4 class="modal-title" id="myModalLabel">Quitar producto</h4></center>
            </div>
            <div class="modal-body">	
            	<p class="text-center">¿Esta seguro de quitar el producto?</p>
				<h2 class="text-center"><?php echo $row['name'].' '.$row['precio']; ?></h2>
			</div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal"> Cancelar</button>
                <a href="quitardecotizacion.php?id=<?php echo $row['id'];?>" class="btn btn-danger">  Si</a>
            </div>

        </div>
    </div>
</div>