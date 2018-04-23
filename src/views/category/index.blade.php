@extends('layouts.admin.admin-layout')

@section('content')
<div class='row'>
  <div class='col-md-12 collapse' id='agregarCategoria'>
    <div class='box'>
      <div class='box-header dark'>
        <h2>
          Agregar nueva categoria
          <span></span>
          <a aria-expanded='false' class='btn btn-xs btn-danger button-ml' data-toggle='collapse' href='#agregarCategoria'>
            Cancelar
          </a>
        </h2>
      </div>
      <div class='box-body'>
        <div class='col-md-12'>
          {!! Form::open(['route'=> 'blog.admin.category.store','method'=>'POST', 'enctype'=>'multipart/form-data']) !!}
          @include('blog::category.fields')
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
          Listado de Categorias
          <span>
            <a aria-expanded='false' class='btn btn-xs btn-info button-ml' data-toggle='collapse' href='#agregarCategoria'>
              <i class='fas fa-plus'></i>
              Agregar Categorías
            </a>
          </span>
        </h2>
      </div>
      <div class='box-body'>
        <div class='col-md-12'>
          <table class='table'>
            <tr>
              <th>#</th>
              <th>Categoría</th>
              <th>Descripción</th>
              <th>Entradas</th>
              <th></th>
            </tr>
            @foreach ($categories as $category)
            <tr>
              <td> {{$category->id}}</td>
              <td>
                <p> {{$category->name}}</p>
                <p>
                  URL Slug:
                  <b> {{$category->slug != null ? $category->slug : 'N/A'}}</b>
                </p>
              </td>
              <td> {{$category->description}}</td>
              <td> {{$category->entries->count()}}</td>
              <td>
                {!! Form::open(['route'=> ['blog.admin.category.destroy',$category->id],'method'=>'DELETE'])!!}
                <button class='btn btn-danger btn-xs button-mb' onclick="return confirm('¿Estás seguro de eliminar este elemento?');" type='submit'>
                  <i class='fas fa-trash-alt icon-special-size'></i>
                  Eliminar
                </button>
                {!! Form::close()!!}
                <a class='btn btn-xs accent' href="{{route('blog.admin.category.edit', $category->id)}}">
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
        {{ $categories->links() }}
      </div>
    </div>
  </div>
</div>
@endsection
