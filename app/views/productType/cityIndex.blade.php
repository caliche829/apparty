<div class="row">
	<div id="breadcrumb" class="col-md-12">
		<ol class="breadcrumb">
			<li><a href="/">Inicio</a></li>
			<li><a href="#">Categorias</a></li>			
		</ol>
	</div>
</div>
<div class="row">
	<div class="col-xs-12 col-md-12">
		<div class="box">
			<div class="box-header">
				<div class="box-name">
					<h3>					
						<span>Categorias x Ciudad</span>
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

				<div class="row">
					<div class="col-sm-10">	
					    <label class="col-sm-4 control-label">Seleccionar Ciudad</label>
						<div class="col-sm-8">
						    {{Form::select('city', $cities, null, array('class'=>'form-control', 'data-toggle'=>'tooltip', 'data-placement'=>'bottom', 'title'=>'Ciudad', 'id'=>'city'));}}
					    </div>
					</div>
					<div class="col-sm-2">	
					    <a class="btn btn-primary" href="#" onclick="getCategoriesByCity()">Buscar</a>
					</div>
				</div>

				<div style="padding: 10px 0; border-top: 2px solid grey;" id="cityCategories">
					
				</div>				
			</div>			
		</div>
	</div>
</div>

<script type="text/javascript">
	
	function getCategoriesByCity(){
		var cityId = $('#city').val();
		if(cityId > 0){
			LoadAjaxContent('producttypes/city-all/'+cityId, '#cityCategories');
		}
	}

</script>