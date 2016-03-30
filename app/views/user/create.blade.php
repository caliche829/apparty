
<div class="row">
	<div id="breadcrumb" class="col-md-12">
		<ol class="breadcrumb">
			<li><a class="ajax-link" href="/">Inicio</a></li>
			<li><a class="ajax-link" href="#">Crear Usuario</a></li>			
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
				<h4 class="page-header">Nuevo Usuario</h4>

			    <form method="POST" action="{{{ URL::to('users') }}}" accept-charset="UTF-8" id="createForm">
				    <input type="hidden" name="_token" value="{{{ Session::getToken() }}}">
				    <fieldset>
				        <div class="row">
							<div class="col-sm-6">	
							    <div class="form-group">
						            <label for="fullname">Nombre completo</label>
						            <input class="form-control" placeholder="Nombres y apellidos" type="text" name="fullname" id="fullname" value="{{{ Input::old('fullname') }}}">
						        </div>
							</div>

							<div class="col-sm-6">	
							    <div class="form-group">
						            <label for="phone">Celular</label>
						            <input class="form-control" placeholder="Nombres y apellidos" type="text" name="phone" id="phone" value="{{{ Input::old('phone') }}}">
						        </div>
							</div>
						</div>

						<div class="row">
							<div class="col-sm-6">	
							    <div class="form-group">
					                <label for="username">{{{ Lang::get('confide::confide.username') }}}</label>
					                <input class="form-control" placeholder="{{{ Lang::get('confide::confide.username') }}}" type="text" name="username" id="username" value="{{{ Input::old('username') }}}">
					            </div>
							</div>

							<div class="col-sm-6">	
							    <div class="form-group">
						            <label for="email">{{{ Lang::get('confide::confide.e_mail') }}}</label>
						            <input class="form-control" placeholder="{{{ Lang::get('confide::confide.e_mail') }}}" type="text" name="email" id="email" value="{{{ Input::old('email') }}}">
						        </div>
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
							    {{Form::select('rol', $roles, null);}}
							</div>

							<div class="col-sm-6">	
							    <div class="checkbox">
									<label style="padding-left: 30px;">
										<input name="active" type="checkbox"> Activo
										<i class="fa fa-square-o"></i>
									</label>
								</div>
							</div>
						</div>
												
				        <br>				        
				        @if (Session::get('error'))
				            <div class="alert alert-error alert-danger">
				                @if (is_array(Session::get('error')))
				                    {{ head(Session::get('error')) }}
				                @endif
				            </div>
				        @endif

				        @if (Session::get('notice'))
				            <div class="alert">{{ Session::get('notice') }}</div>
				        @endif

				        <div id="errors_div"></div>

				        <div class="form-actions form-group">
				          <button type="submit" class="btn btn-primary">{{{ Lang::get('confide::confide.signup.submit') }}}</button>
				        </div>

				    </fieldset>
				</form>
			</div>
		</div>
	</div>
</div>

<script type="text/javascript">

$(document).ready(function() {

	// Captura evento submit del formulario
	$('#createForm').submit(function() {
		
		$('#errors_div').html('<i class="fa fa-refresh fa-spin"></i>');
		
		SaveContent('#createForm');

		// Cancela el evento submit original
		return false; 
	});
	
});
</script>

