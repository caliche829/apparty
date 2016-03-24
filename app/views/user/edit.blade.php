
<div class="row">
	<div id="breadcrumb" class="col-md-12">
		<ol class="breadcrumb">
			<li><a class="ajax-link" href="/">Inicio</a></li>
			<li><a class="ajax-link" href="#">Editar Usuario</a></li>			
		</ol>
	</div>
</div>
<div class="row">
	<div class="col-xs-12 col-sm-12">
		<div class="box">
			<div class="box-header">
				<div class="box-name">
					<i class="fa fa-search"></i>
					<span>Registro de Datos</span>
				</div>
				<div class="box-icons">
					
					<a class="expand-link">
						<i class="fa fa-expand"></i>
					</a>
					
				</div>
				<div class="no-move"></div>
			</div>
			<div class="box-content">
				<h4 class="page-header">Editar Usuario</h4>

			    {{ Form::open(array('action' => 'UsersController@postEditUser', 'id' => 'editForm')) }}									<input type="hidden" name="_token" value="{{{ Session::getToken() }}}">
					{{ Form::hidden('id', $user->id) }}
													
					<fieldset>
				        <div class="row">
							<div class="col-sm-6">	
							    <div class="form-group">
						            <label for="fullname">Nombre completo</label>
						            {{ Form::text('fullname', $user->fullname,  array('placeholder'=>'Nombres y apellidos', 'class'=>'form-control')) }}
						        </div>
							</div>

							<div class="col-sm-6">	
							    <div class="form-group">
						            <label for="phone">Celular</label>
						            {{ Form::text('phone', $user->phone,  array('placeholder'=>'# celular', 'class'=>'form-control')) }}
						        </div>
							</div>
						</div>

						<div class="row">
							<div class="col-sm-6">	
							    <div class="form-group">
						            <label for="email">{{{ Lang::get('confide::confide.e_mail') }}}</label>
						            {{ Form::text('email', $user->email,  array('placeholder'=>'Email', 'class'=>'form-control')) }}
						        </div>
							</div>

							<div class="col-sm-6">	
							    
							</div>
						</div>
				        
				        <div class="row">
							<div class="col-sm-6">	
							    <div class="form-group">
						            <label for="password">{{{ Lang::get('confide::confide.password') }}}</label>
						            <input class="form-control" placeholder="{{{ Lang::get('confide::confide.password') }}}" type="password" name="password" id="password">
						        </div>
							</div>

							<div class="col-sm-6">	
							    <div class="form-group">
						            <label for="password_confirmation">{{{ Lang::get('confide::confide.password_confirmation') }}}</label>
						            <input class="form-control" placeholder="{{{ Lang::get('confide::confide.password_confirmation') }}}" type="password" name="password_confirmation" id="password_confirmation">
						        </div>
							</div>
						</div>

						<div class="row">
							<div class="col-sm-6">	
								<label for="rol">Rol</label><br>
							    {{Form::select('rol', $roles, $roleId);}}
							</div>

							<div class="col-sm-6">	
							    <div class="checkbox">
									<label style="padding-left: 30px;">
										@if($user->active)
											<input name="active" type="checkbox" checked>
										@else
											<input name="active" type="checkbox">
										@endif
										Activo
										<i class="fa fa-square-o"></i>
									</label>
								</div>
							</div>
						</div>
												
				        <br>				        
				        
				        <div id="errors_div"></div>

				        <div class="form-actions form-group">
				          <button type="submit" class="btn btn-primary">Guardar</button>
				        </div>

				    </fieldset>

				{{ Form::close() }}
			</div>
		</div>
	</div>
</div>

<script type="text/javascript">

$(document).ready(function() {

	// Captura evento submit del formulario
	$('#editForm').submit(function() {
		
		$('#errors_div').html('<i class="fa fa-refresh fa-spin"></i>');
		
		SaveContent('#editForm');

		// Cancela el evento submit original
		return false; 
	});
	
});
</script>


				


