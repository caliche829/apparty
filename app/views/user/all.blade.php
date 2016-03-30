<div class="row">
	<div id="breadcrumb" class="col-md-12">
		<ol class="breadcrumb">
			<li><a href="/">Inicio</a></li>
			<li><a href="#">Usuarios</a></li>			
		</ol>
	</div>
</div>
<div class="row">
	<div class="col-xs-12 col-md-12">
		<div class="box">
			<div class="box-header">
				<div class="box-name">
					<h3>					
						<span>Usuarios</span>
					</h3>
				</div>
				<div class="box-icons">
					
					<a class="expand-link">
						<i class="fa fa-expand"></i>
					</a>
					
				</div>
				<div class="no-move"></div>
			</div>
			<div class="box-content">

				@if (Authority::can('create', 'User'))
					<a class="btn btn-primary" href="#" onclick="LoadAjaxContent('users/create')">Crear usuario</a>
				@endif

				<div style="padding: 10px 0; border-top: 2px solid grey;">
					<table class="table table-bordered table-striped table-hover table-heading table-datatable" id="datatable-1">
						<thead>
							<tr>
								<th>Nombre Completo</th>										
								<th>Email</th>
								<th>Rol</th>
								<th>Estado</th>
								<th>Acción</th>							
							</tr>
						</thead>
						<tbody>
						<!-- Start: list_row -->
							@if ($users)
								@foreach($users as $user)
									<tr>
										<td>
											{{$user->fullname}}
										</td>
										<td>
											{{$user->email}}
										</td>
										<td>
											{{$user->roles()->first()->name}}
										</td>
										<td>
											@if($user->active)
												Activo
											@else
												Inactivo
											@endif
										</td>
										<td>
											<button type="button" class="btn btn-default" onclick="LoadAjaxContent('users/edit/{{$user->id}}');">
												<span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
											</button>
										</td>						
									</tr>
								@endforeach
							@else
								<tr>
									<td>-</td>
									<td>-</td>								
								</tr>							
							@endif

						</tbody>					
					</table>
				</div>				
			</div>			
		</div>
	</div>
</div>

<script type="text/javascript">
	// Se ejecutan los plug-in de la tabla de datos y los combos
	$(document).ready(function() {	
		TestTable1();
		MakeSelect2();
	});

</script>