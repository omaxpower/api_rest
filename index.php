<!DOCTYPE html>
<html>
	<head>
		<title>PHP Mysql REST API CRUD</title>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" />
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
	</head>
	<body>
		<div class="container">
			<br />
			
			<h1 align="center">CRUD base de datos Mysql con API REST </h1>
			<br />
			<div align="right" style="margin-bottom:5px;">
				<button type="button" name="add_button" id="add_button" class="btn btn-primary btn-sm">Agregar Producto</button>
			</div>
			<div class="table-responsive">
				<table class="table table-striped">
					<thead class="thead-dark">
						<tr>
							<th>Nombre</th>
							<th>Descripcion</th>
							<th>Categoria</th>
							<th>Lugar</th>
							<th>Fecha Registro</th>
							<th>Codigo</th>
							<th>Proveedor</th>
							<th>Cantidad</th>
							<th>Editar</th>
							<th>Borrar</th>
							<br/>
						</tr>
					</thead>
					<tbody></tbody>
				</table>
			</div>
		</div>

		
	</body>
</html>

<div id="apicrudModal" class="modal fade" role="dialog">
	<div class="modal-dialog">
		<div class="modal-content">
			<form method="post" id="api_crud_form">
				<div class="modal-header text-right">
		        	<button type="button" class="close" data-dismiss="modal">&times;</button>
		        	<h4 class="modal-title w-100"></h4>
		      	</div>
				  
				  <div class="modal-body">
		      		<div class="form-group">
			        	<label>Nombre</label>
			        	<input type="text" name="nombres" id="nombres" class="form-control" />
			        </div>
			        <div class="form-group">
			        	<label>Descripcion</label>
			        	<input type="text" name="descripcion" id="descripcion" class="form-control" />
			        </div>
					<div class="form-group">
			        	<label for="categoria">Categoria</label>
						<select type="text" name="categoria" class="form-control" id="categoria">
						<option value="">...</option>
						<option value="Accesorios">Accesorios</option>
						<option value="Computadoras">Computadoras</option>
						<option value="Impresoras">Impresoras</option>
						<option value="Monitores">Monitores</option>
						<option value="Portatiles">Portatiles</option>
						<option value="Tabletas">Tabletas</option>
						<option value="Celulares">Celulares</option>
						<option value="Servidores">Servidores</option>
						</select>

			        </div>
					<div class="form-group">
			        	<label for= "lugar">Lugar</label>
						<select type="text" name="lugar" class="form-control" id="lugar">
						<option value="">...</option>
						<option value="Colombia">Colombia</option>
						<option value="Argentina">Argentina</option>
						<option value="Ecuador">Ecuador</option>
						<option value="Peru">Peru</option>
						<option value="Brasil">Brasil</option>
						<option value="Bolivia">Bolivia</option>
						<option value="EEUU">EEUU</option>
						<option value="Europa">Europa</option>
						<option value="Asia">Asia</option>
						</select>
					</div>
					
					<div class="form-group">
			        	<label>Fecha Registro</label>
			        	<input type="text" name="fregis" id="fregis" class="form-control" />
			        </div>
					<div class="form-group">
			        	<label>Codigo</label>
			        	<input type="text" name="cod" id="cod" class="form-control" />
			        </div>
					<div class="form-group">
			        	<label>Proveedor</label>
			        	<input type="text" name="proveedor" id="proveedor" class="form-control" />
			        </div>
					<div class="form-group">
			        	<label>Cantidad</label>
			        	<input type="text" name="cantidad" id="cantidad" class="form-control" />
			        </div>

			    <div class="modal-footer">
			    	<input type="hidden" name="hidden_id" id="hidden_id" />
			    	<input type="hidden" name="action" id="action" value="insert" />
			    	<input type="submit" name="button_action" id="button_action" class="btn btn-info" value="Insert" />
			    	<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
	      		</div>
			</form>
		</div>
  	</div>
</div>


<script type="text/javascript">
$(document).ready(function(){

	fetch_data();

	function fetch_data()
	{
		$.ajax({
			url:"fetch.php",
			success:function(data)
			{
				$('tbody').html(data);
			}
		})
	}

	$('#add_button').click(function(){
		$('#action').val('insert');
		$('#button_action').val('Agregar');
		$('.modal-title').text('Agregar producto');
		$('#apicrudModal').modal('show');
	});

	$('#api_crud_form').on('submit', function(event){
		event.preventDefault();
		if(($('#nombres').val() == ''))
		{
			alert("Ingrese nombre de producto");
		}
		else if($('#descripcion').val() == '')
		{
			alert("Ingrese descripcion de producto");
		}
		else if($('#categoria').val() == '')
		{
			alert("Ingrese categoria de producto");
		}
		else if($('#lugar').val() == '')
		{
			alert("Ingrese lugar de procedencia de producto");
		}
		else if($('#fregis').val() == '')
		{
			alert("Ingrese una fecha valida");
		}
		else if($('#proveedor').val() == '')
		{
			alert("Ingrese proveedordel producto");
		}
		else if($('#cantidad').val() == '')
		{
			alert("Ingrese una cantidad valida");
		}
		
		else
		{
			var form_data = $(this).serialize();
			$.ajax({
				url:"action.php",
				method:"POST",
				data:form_data,
				success:function(data)
				{
					fetch_data();
					$('#api_crud_form')[0].reset();
					$('#apicrudModal').modal('hide');
					if(data == 'insert')
					{
						alert("Producto agregado correctamente");
					}
					if(data == 'update')
					{
						alert("Producto actualizado correctamente");
					}
				}
			});
		}
	});

	$(document).on('click', '.edit', function(){
		var id = $(this).attr('id');
		var action = 'fetch_single';
		$.ajax({
			url:"action.php",
			method:"POST",
			data:{id:id, action:action},
			dataType:"json",
			success:function(data)
			{
				$('#hidden_id').val(id);
				$('#nombres').val(data.nombres);
				$('#descripcion').val(data.descripcion);
				$('#categoria').val(data.categoria);
				$('#lugar').val(data.lugar);
				$('#fregis').val(data.fregis);
				$('#cod').val(data.cod);
				$('#proveedor').val(data.proveedor);
				$('#cantidad').val(data.cantidad);

				$('#action').val('update');
				$('#button_action').val('Editar');
				$('.modal-title').text('Editar registro');
				$('#apicrudModal').modal('show');
			}
		})
	});

	$(document).on('click', '.delete', function(){
		var id = $(this).attr("id");
		var action = 'delete';
		if(confirm("Estas seguro de eliminar el registro"))
		{
			$.ajax({
				url:"action.php",
				method:"POST",
				data:{id:id, action:action},
				success:function(data)
				{
					fetch_data();
					alert("Registro eliminado");
				}
			});
		}
	});

});
</script>