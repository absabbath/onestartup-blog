@extends('layouts.admin.admin-layout')

@section('content')
<div class='row'>
  <div class='col-md-12'>
    <div class='box'>
      <div class='box-header dark'>
        <h2>
          Listado de entradas
          <span>
            <a class='btn btn-xs btn-info button-ml' href="{{route('blog.admin.entry.create')}}">
              <i class='fas fa-plus'></i>
              Agregar Entrada
            </a>
          </span>
        </h2>
      </div>
      <div class='box-body'>
        <table class='table' id='posts'>
          <thead>
            <tr>
              <th>#</th>
              <th>Publicación</th>
              <th>Contenido</th>
              <th></th>
            </tr>
          </thead>
        </table>
      </div>
    </div>
  </div>
</div>
@endsection
@push('scripts')
<script>
    
  $(function() {
    $('#posts').DataTable({
      processing: true,
      serverSide: true,
      pageLength: 25,
      ajax: '{{ route("blog.datatable") }}',
      columns: [
            {data: 'id', name: 'id'},
            {data: 'preview', name: 'preview'},
            {data: 'content', name: 'content'},
            {data: 'form', name: 'form'},
        ]
    });
  
  });
</script>
@endpush




