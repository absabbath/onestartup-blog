@extends('blog::post.layout')

@section('content')

Listado de entradas
<p>
	Categorias:
	{{$categories}}
</p>

<p>
	Entradas todas
	{{$posts}}
</p>

<p>
	Entradas al azar
	{{$otros}}
</p>


<p>
	Paginacion:

	{!! $posts->links() !!}
</p>
@endsection