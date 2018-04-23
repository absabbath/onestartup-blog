<div class="row">
  <div class="col-md-6">
      <div class="form-group">
          {!! Form::label('title', 'Titúlo', ['class'=>'control-label'])!!}
          {!! Form::text('title', null, ["class"=>"form-control", "required"=>"required", "id"=>"first"]) !!}
      </div>
  </div>

  <div class="col-md-6">
      <div class="form-group">
          {!! Form::label('slug', 'URL Slug', ['class'=>'control-label'])!!}
          {!! Form::text('slug', null, ["class"=>"form-control", "required"=>"required", "id"=>"second"]) !!}
      </div>
  </div>

</div>

<div class="row">
  <div class="col-md-6">
      <div class="form-group">
          {!! Form::label('cover', 'Portada', ['class'=>'control-label'])!!}
          @if (isset($post))
            <span>
              <a class="btn btn-xs accent" data-target="#ver" data-toggle="modal" href="#" ui-toggle-class="fade-up-big">
                Ver actual 
                <i class="fa fa-eye"></i>
              </a>
            </span>
          @endif
          <br>
          {!! Form::file('cover', null, ["class"=>"form-control", "required"=>"required"]) !!}
      </div>
      <div class="form-group">
          {!! Form::label('tags', 'Etiquetas', ['class'=>'control-label'])!!}
          {!! Form::select('tags[]', $tags, isset($post->tags) ? explode(",",$post->tags) : null, ["class"=>"form-control", "required"=>"required", "id"=>"tags", "multiple"=>"multiple"]) !!}
      </div>
  </div>

  <div class="col-md-6">
      <div class="form-group">
        {!! Form::label('publication_date', 'Fecha de publicación', ['class'=>'control-label'])!!}
        {!! Form::text('publication_date', null, ["class"=>"form-control", "required"=>"required", "id"=>"publication_date"]) !!}
      </div>
  </div>
</div>

<div class='row'>
  <div class='col-md-6'>
    <div class="form-group" >
      {!! Form::label('status', 'Estado', ['class'=>'control-label'])!!}
      {!! Form::select('status', [1=>'Activo', 2=>'Inactivo'], null, ["class"=>"form-control", "required"=>"required"]) !!}
    </div>
  </div>
  <div class='col-md-6'>
    <div class="form-group" >
      {!! Form::label('category_id', 'Categoria', ['class'=>'control-label'])!!}
      {!! Form::select('category_id', $categories, null, ["class"=>"form-control", "required"=>"required"]) !!}
    </div>
  </div>
</div>

<div class="row">
  <div class="col-md-12">
    {!! Form::label('body', 'Contenido', ['class'=>'control-label'])!!}
    {!! Form::textarea('body', null, ["class"=>"form-control", "required"=>"required", 'id'=>'body', 'rows'=>"30", 'cols'=>"80"]) !!}
  </div>
</div>


