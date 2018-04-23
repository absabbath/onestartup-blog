@extends('layouts.admin.admin-layout')

@section('content')
<div class='row'>
  <div class='col-md-12'>
    <div class='box'>
      <div class='box-header dark'>
        <h2>Actualizar información</h2>
      </div>
      <div class='box-body'>
        <div class='col-md-12'>
          {!! Form::model($tag,['route'=> ['blog.admin.tag.update',$tag->id],"method"=>"PUT", 'enctype'=>'multipart/form-data']) !!}
          @include('blog::tags.fields')
        </div>
      </div>
      <div class='dker p-a text-right'>
        <div class='col-md-12'>
          <a class='btn danger' href="{{route('blog.admin.tag.index')}}">Cancelar</a>
          {!! Form::submit('Actualizar información', ['class'=>'btn dark']) !!}
          {!! Form::close() !!}
        </div>
      </div>
    </div>
  </div>
</div>

@endsection