<meta content='text/html; charset=UTF-8' http-equiv='Content-Type'>
<meta charset='utf-8'>
<meta content='ie=edge' http-equiv='x-ua-compatible'>
<meta content='' name='description'>
<meta content='width=device-width, initial-scale=1' name='viewport'>

<meta content="{{isset($post) ? strip_tags(substr($post->body, 0, 120), '') :'Descripcion general del blog'}}" name='description'>
<link href="{{isset($post) ? route('show.blog', $post->slug) : route('main.blog')}}" rel='canonical'>
<meta content='es_MX' property='og:locale'>
<meta content='website' property='og:type'>
<meta content="{{$post->title or 'Titulo general del blog'}}" property='og:title'>
<meta content="{{isset($post) ? strip_tags(substr($post->body, 0, 120), '') :'Descripcion general del blog'}}" property='og:description'>
<meta content="{{isset($post) ? route('show.blog', $post->slug) : route('main.blog')}}" property='og:url'>
<meta content='ODESSA' property='og:site_name'>
<meta content="{{isset($post) ? asset('storage').'/'.$post->cover : asset('assets/img/Odessa-Seguros-alta-2.png')}}" property='og:image'>
<meta content="{{isset($post) ? asset('storage').'/'.$post->cover : asset('assets/img/Odessa-Seguros-alta-2.png')}}" property='og:image:secure_url'>
<meta content='summary' name='twitter:card'>
<meta content="{{isset($post) ? strip_tags(substr($post->body, 0, 120), '') :'Descripcion general del blog'}}" name='twitter:description'>
<meta content="{{$post->title or 'titulo general del blog'}}" name='twitter:title'>
<meta content='@odessa_seguros' name='twitter:site'>
<meta content="{{isset($post) ? asset('storage').'/'.$post->cover : asset('assets/img/Odessa-Seguros-alta-2.png')}}" name='twitter:image'>
<meta content='@odessa_seguros' name='twitter:creator'>
