@extends('blog-public::layout')

@section('content')
<h1>
	Titulo: {{$post->title}}
</h1>

<p>Portada:</p>
<img width="150" src="{{asset('storage/'.$post->cover)}}">
<p>
	Publicacion: {{$post->publication_date}}
</p>

<p>
	Tags: {{$post->tags}}
</p>


<p>
	Categoria: {{$post->category->name}}
</p>


<p>
	Contenido: {!! $post->body !!}
</p>

<p>
	Categorias: Listado de categorias:
</p>
<ul>
	@foreach($categories as $category)
		<li>
			{{$category->name}}
		</li>
	@endforeach
</ul>

<p>
	Listado de post relacionados con sus tags:
</p>
<ul>
	@foreach($otros as $entry)
		<li>
			<img width="100" src="{{asset('storage/'.$entry->cover)}}">
			<a href="{{route('show.blog', $entry->slug)}}">
				{{$entry->title}}
			</a>
		</li>
	@endforeach
</ul>

@endsection