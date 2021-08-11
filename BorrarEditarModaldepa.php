<!-- Ventana Editar Registros CRUD -->
<div class="modal fade" id="edit_<?php echo $row['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <center><h4 class="modal-title" id="myModalLabel">Editar departamento</h4></center>
            </div>
            <div class="modal-body">
			<div class="container-fluid">
			<form method="POST" action="EditarRegistrodepa.php?id=<?php echo $row['id']; ?>">
				<div class="row form-group">
					<div class="col-sm-2">
						<label class="control-label" style="position:relative; top:7px;">Nombre:</label>
					</div>
					<div class="col-sm-10">
						<input type="text" class="form-control" name="name" value="<?php echo $row['nombre']; ?>">
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
                <center><h4 class="modal-title" id="myModalLabel">Borrar departamento</h4></center>
            </div>
            <div class="modal-body">	
            	<p class="text-center">¿Esta seguro de borrar el registro?</p>
				<h2 class="text-center"><?php echo $row['nombre'] ?></h2>
			</div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal"> Cancelar</button>
                <a href="BorrarRegistrodepa.php?id=<?php echo $row['id']; ?>" class="btn btn-danger">  Si</a>
            </div>

        </div>
    </div>
</div>