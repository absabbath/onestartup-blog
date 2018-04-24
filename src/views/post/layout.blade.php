<!DOCTYPE html>
<html>
<head>
	<title>
		{{$post->title or "Titulo general"}}
	</title>
	@include('blog-public::metatags')
</head>
<body>
	{{-- Aqui toda la estructura del blog--}}

	@yield('content')

	{{-- Aqui el footer --}}

</body>
</html>