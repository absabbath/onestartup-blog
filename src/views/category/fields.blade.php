<div class="form-group">
	{!! Form::label('name', 'Nombre *') !!}
	{!! Form::text('name', null, ["class"=>"form-control", "required"=>"required", "placeholder"=>"Coloque aquí el nombre de la categoría", "id"=>"first"]) !!}
</div>

<div class="form-group">
	{!! Form::label('slug', 'URL Slug *') !!}
	{!! Form::text('slug', null, ["class"=>"form-control", "required"=>"required", "placeholder"=>"Coloque aquí la liga o URL de la categoría", "id"=>"second"]) !!}
</div>

<div class="form-group">
	{!! Form::label('description', 'Resumen') !!}
	{!! Form::text('description', null, ["class"=>"form-control", "placeholder"=>"Coloque la información descriptiva de la categoría"]) !!}

</div>

<div class="form-group">
	{!! Form::label('active', 'Estado') !!}
	{!! Form::select('active', [true=>'Activo', false=>'Inactivo'], null, ["class"=>"form-control", "required"=>"required"]) !!}
</div>

<div class="form-group">
	{!! Form::label('portada', 'Imagén de portada') !!}
	@if (isset($category))
		<span>
		  <a class="btn btn-xs accent" data-target="#ver" data-toggle="modal" href="#" ui-toggle-class="fade-up-big">
		    Ver actual 
		    <i class="fa fa-eye"></i>
		  </a>
		</span>
	@endif
	<br>
	{!! Form::file('portada', null, ["class"=>"form-control"]) !!}
</div>