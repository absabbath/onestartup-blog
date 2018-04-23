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
          {!! Form::model($category,['route'=> ['blog.admin.category.update',$category->id],"method"=>"PUT", 'enctype'=>'multipart/form-data']) !!}
          @include('blog::category.fields')
        </div>
      </div>
      <div class='dker p-a text-right'>
        <div class='col-md-12'>
          <a class='btn danger' href="{{route('blog.admin.category.index')}}">Cancelar</a>
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
        @if ($category->cover == null)
        <h4> No hay imagen asignada</h4>
        @else
          <img class='image-modal-preview' src="{{asset('storage/'.$category->cover)}}">
        @endif
      </div>
      <div class='modal-footer'>
        <button class='btn dark p-x-md' data-dismiss='modal' type='button'>Cerrar</button>
        @if($category->cover != null)
          {!! Form::open(['route'=> ['delete.cover.category',$category->id],'method'=>'DELETE'])!!}
            <button class='btn btn-danger button-mb' onclick="return confirm('¿Estás seguro de eliminar este elemento?');" type='submit'>
              <i class='fas fa-trash-alt icon-special-size'>
                Eliminar
              </i>
            </button>
          {!! Form::close()!!}
        @endif
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
</div>
@endsection
