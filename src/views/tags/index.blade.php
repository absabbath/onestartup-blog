@extends('layouts.admin.admin-layout')

@section('content')
<div class='row'>
  <div class='col-md-12 collapse' id='agregarTag'>
    <div class='box'>
      <div class='box-header dark'>
        <h2>
          Agregar nuevo tag
          <span></span>
          <a aria-expanded='false' class='btn btn-xs btn-danger button-ml' data-toggle='collapse' href='#agregarTag'>
            Cancelar
          </a>
        </h2>
      </div>
      <div class='box-body'>
        <div class='col-md-6 offset-3'>
          {!! Form::open(['route'=> 'blog.admin.tag.store','method'=>'POST']) !!}
          @include('blog::tags.fields')
          <br>
          <div class='form-group'>
            <button class='btn btn-primary' type='submit'>
              Registrar
            </button>
          </div>
          {!! Form::close() !!}
        </div>
      </div>
    </div>
  </div>
  <div class='col-md-12'>
    <div class='box'>
      <div class='box-header dark'>
        <h2>
          Listado de tags
          <span>
            <a aria-expanded='false' class='btn btn-xs btn-info button-ml' data-toggle='collapse' href='#agregarTag'>
              <i class='fas fa-plus'></i>
              Agregar tags
            </a>
          </span>
        </h2>
      </div>
      <div class='box-body'>
        <div class='col-md-12'>
          <table class='table'>
            <tr>
              <th>#</th>
              <th>Tag</th>
              <th></th>
            </tr>
            @foreach ($tags as $tag)
            <tr>
              <td> {{$tag->id}}</td>
              <td> {{$tag->description}}</td>
              <td>
                {!! Form::open(['route'=> ['blog.admin.tag.destroy',$tag->id],'method'=>'DELETE'])!!}
                <button class='btn btn-danger btn-xs button-mb' onclick="return confirm('¿Estás seguro de eliminar este elemento?');" type='submit'>
                  <i class='fas fa-trash-alt icon-special-size'></i>
                  Eliminar
                </button>
                {!! Form::close()!!}
                <a class='btn btn-xs accent' href="{{route('blog.admin.tag.edit', $tag->id)}}">
                  <i class='fas fa-edit icon-special-size'></i>
                  Editar
                </a>
              </td>
              @endforeach
            </tr>
          </table>
        </div>
      </div>
      <div class='dker p-a text-right'>
        {{ $tags->links() }}
      </div>
    </div>
  </div>
</div>


@endsection