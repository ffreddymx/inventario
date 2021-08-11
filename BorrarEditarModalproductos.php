<!-- Ventana Editar Registros CRUD -->
<div class="modal fade" id="edit_<?php echo $row['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <center><h4 class="modal-title" id="myModalLabel">Editar el producto</h4></center>
            </div>
            <div class="modal-body">
			<div class="container-fluid">
			<form method="POST" action="EditarRegistroproductos.php?id=<?php echo $row['id']; ?>">

				<div class="row form-group">
					<div class="col-sm-2">
						<label class="control-label" style="position:relative; top:7px;">Código:</label>
					</div>
					<div class="col-sm-10">
						<input type="text" class="form-control" name="codigo" value="<?php echo $row['codigo']; ?>">
					</div>
				</div>


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

<!-- Delete -->
<div class="modal fade" id="delete_<?php echo $row['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <center><h4 class="modal-title" id="myModalLabel">Borrar producto</h4></center>
            </div>
            <div class="modal-body">	
            	<p class="text-center">¿Esta seguro de borrar el registro?</p>
				<h2 class="text-center"><?php echo $row['name'].' '.$row['precio']; ?></h2>
			</div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal"> Cancelar</button>
                <a href="BorrarRegistroproductos.php?id=<?php echo $row['id']; ?>" class="btn btn-danger">  Si</a>
            </div>

        </div>
    </div>
</div>