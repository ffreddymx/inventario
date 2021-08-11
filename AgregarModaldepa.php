<!-- Agregar Nuevos Registros -->
<div class="modal fade" id="addnew" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <center><h4 class="modal-title" id="myModalLabel">Agregar nuevo departamento</h4></center>
            </div>
            <div class="modal-body">
			<div class="container-fluid">
			<form method="POST" action="AgregarNuevodepa.php">
				<div class="row form-group">
					<div class="col-sm-2">
						<label class="control-label" style="position:relative; top:7px;">Nombre:</label>
					</div>
					<div class="col-sm-10">
						<input type="text" class="form-control" name="name">
					</div>
				</div>


			</div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal"> Cancelar</button>
                <button type="submit" name="agregar" class="btn btn-primary"> Guardar Registro</button>
			</form>
            </div>

        </div>
    </div>
</div>