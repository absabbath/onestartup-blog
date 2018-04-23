@extends('layouts.admin.admin-layout')

@section('content')
<div class='row'>
  <div class='col-md-12'>
    <div class='box'>
      <div class='box-header dark'>
        <h2>Actualizar información</h2>
      </div>
      <div class='box-body'>
        {!! Form::model($post,['route'=> ['blog.admin.entry.update',$post->id],"method"=>"PUT", 'enctype'=>'multipart/form-data']) !!}
        @include('blog::entry.fields')
      </div>
      <div class='dker p-a text-right'>
        <div class='col-md-12'>
          <a class='btn danger' href="{{route('blog.admin.entry.index')}}" style='margin-right:10px'>Cancelar</a>
          {!! Form::submit('Actualizar información', ['class'=>'btn dark']) !!}
          {!! Form::close() !!}
        </div>
      </div>
    </div>
  </div>
</div>
<!-- .modal nuevo contrato -->
<div class='modal fade' data-backdrop='true' id='ver'>
  <div class='modal-dialog modal-lg'>
    <div class='modal-content box-shadow-z3'>
      <div class='modal-body text-center p-lg'>
        @if ($post->cover == null)
          <h4>No hay imagen asignada</h4>
        @else
          <img class='image-modal-preview' src="{{asset('storage/'.$post->cover)}}">
        @endif
      </div>
      <div class='modal-footer'>
        <button class='btn dark p-x-md' data-dismiss='modal' type='button'>Cerrar</button>
        @if($post->cover != null)
          {!! Form::open(['route'=> ['delete.cover.entry',$post->id],'method'=>'DELETE'])!!}
            <button class='btn btn-danger button-mb' onclick="return confirm('¿Estás seguro de eliminar este elemento?');" type='submit'>
              <i class='fas fa-trash-alt icon-special-size'></i>
              Eliminar
            </button>
          {!! Form::close()!!}
        @endif
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
</div>
@endsection
@section('script_extras')
<script src='https://cdn.ckeditor.com/4.8.0/standard/ckeditor.js'></script>
<script>
  var options = {
    filebrowserImageBrowseUrl: '/laravel-filemanager?type=Images',
    filebrowserImageUploadUrl: '/laravel-filemanager/upload?type=Images&_token=',
    filebrowserBrowseUrl: '/laravel-filemanager?type=Files',
    filebrowserUploadUrl: '/laravel-filemanager/upload?type=Files&_token='
  };
</script>
<script>
  CKEDITOR.replace('body', options);
  $('#tags').select2();
  $("#publication_date").datepicker({
    dateFormat: "yy-mm-dd"
  });
</script>
@endsection
