@extends('layouts.admin.admin-layout')

@section('content')
<div class='row'>
  <div class='col-md-12'>
    <div class='box'>
      <div class='box-header dark'>
        <h2>Actualizar información</h2>
      </div>
      <div class='box-body'>
        {!! Form::open(['route'=> 'blog.admin.entry.store','method'=>'POST', 'enctype'=>'multipart/form-data', "id"=>"target"]) !!}
        @include('blog::entry.fields')
      </div>
      <div class='dker p-a text-right'>
        <div class='col-md-12'>
          <a class='btn danger' href="{{route('blog.admin.entry.index')}}" style='margin-right:10px'>Cancelar</a>
          <button class='btn dark' type='submit'>
            Registrar
          </button>
          {!! Form::close() !!}
        </div>
      </div>
    </div>
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
