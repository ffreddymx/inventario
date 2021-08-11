<!-- Ventana Editar Registros CRUD -->
<div class="modal fade" id="edit_<?php echo $row['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <center><h4 class="modal-title" id="myModalLabel">Editar empleado</h4></center>
            </div>
            <div class="modal-body">
			<div class="container-fluid">
			<form method="POST" action="EditarRegistro.php?id=<?php echo $row['id']; ?>">
				
				<div class="row form-group">
					<div class="col-sm-2">
						<label class="control-label" style="position:relative; top:7px;">Usuario:</label>
					</div>
					<div class="col-sm-10">
						<input type="text" class="form-control" name="usuario" value="<?php echo $row['usuario']; ?>">
					</div>
				</div>


				<div class="row form-group">
					<div class="col-sm-2">
						<label class="control-label" style="position:relative; top:7px;">Tipo:</label>
					</div>
					<div class="col-sm-10">

             	 <select class="form-control" id="tipo" name="tipo">
                 <option selected>Tipo</option>
                    <option value="1">Administrador </option>
                    <option value="2">Empleado </option>
                    <option value="0">Clientes </option>
                      </select>	
					</div>
				</div>



				<div class="row form-group">
					<div class="col-sm-2">
						<label class="control-label" style="position:relative; top:7px;">Nombre:</label>
					</div>
					<div class="col-sm-10">
						<input type="text" class="form-control" name="nombre" value="<?php echo $row['nombre']; ?>">
					</div>
				</div>
				
				<div class="row form-group">
					<div class="col-sm-2">
						<label class="control-label" style="position:relative; top:7px;">Apellido:</label>
					</div>
					<div class="col-sm-10">
						<input type="text" class="form-control" name="apellido" value="<?php echo $row['apellido']; ?>">
					</div>
				</div>
				<div class="row form-group">
					<div class="col-sm-2">
						<label class="control-label" style="position:relative; top:7px;">Telefono:</label>
					</div>
					<div class="col-sm-10">
						<input type="text" class="form-control" name="telefono" value="<?php echo $row['telefono']; ?>">
					</div>
                </div>
            </div> 
			</div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                <button type="submit" name="editar" class="btn btn-success">  Actualizar Ahora</a>
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
                <center><h4 class="modal-title" id="myModalLabel">Borrar empleado</h4></center>
            </div>
            <div class="modal-body">	
            	<p class="text-center">¿Esta seguro de borrar el registro?</p>
				<h2 class="text-center"><?php echo $row['nombre'].' '.$row['apellido']; ?></h2>
			</div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">  Cancelar</button>
                <a href="BorrarRegistro.php?id=<?php echo $row['id']; ?>" class="btn btn-danger">  Si</a>
            </div>

        </div>
    </div>
</div> 