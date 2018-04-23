<?php

namespace Onestartup\Blog\Controller;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Yajra\Datatables\Datatables;
use Onestartup\Blog\Model\EntryCategory as Category;
use Onestartup\Blog\Model\EntryTag as TagCatalog;
use Onestartup\Blog\Model\Entry;

class AdminBlogController extends Controller
{
    public function index()
    {
        return view('blog::entry.index');
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        $categories = Category::pluck('name', 'id');
        $tags = TagCatalog::pluck('description', 'description');

        return view('blog::entry.create')
            ->with('categories', $categories)
            ->with('tags', $tags);
    }

    /**
     * Store a newly created resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        
        $post = new Entry($request->all());
        $post->tags = implode(",", $request->tags);

        if (isset($request->cover)) {
            
            $file = $request->file('cover');
            $nombre = $file->getClientOriginalName();
            $nombre_file = str_replace(' ', '_', $nombre);
            $ubicacion_donde_guarda ='posts/'.$nombre_file;
            \Storage::disk('local')->put($ubicacion_donde_guarda,  \File::get($file));
            $post->cover = $ubicacion_donde_guarda;
        } 

        \Auth::user()->entries()->save($post);

        return redirect()
                ->route('blog.admin.entry.edit', $post->id)
                ->with('message_success', "Entrada agregada correctamente");
    }

    /**
     * Show the specified resource.
     * @return Response
     */
    public function show()
    {
        return view('blog::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @return Response
     */
    public function edit($id)
    {
        $entry = Entry::find($id);

        $categories = Category::pluck('name', 'id');
        $tags = TagCatalog::pluck('description', 'description');

        return view('blog::entry.edit')
            ->with('categories', $categories)
            ->with('post', $entry)
            ->with('tags', $tags);
    }

    /**
     * Update the specified resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function update(Request $request, $id)
    {
        $post = Entry::find($id);
        $post->fill($request->all());
        $post->tags = implode(",", $request->tags);

        if (isset($request->cover) && $request->cover != '') {
            
            $file = $request->file('cover');
            $nombre = $file->getClientOriginalName();
            $nombre_file = str_replace(' ', '_', $nombre); //reemplaza los eespacios en los archivos por guin bajo
            $ubicacion_donde_guarda ='posts/'.$nombre_file;
            \Storage::disk('local')->put($ubicacion_donde_guarda,  \File::get($file));
            $post->cover = $ubicacion_donde_guarda;   
        }

        $post->save();

        return redirect()
            ->back()
            ->with('message_info', 'Información actualizada correctamente');
    }

    /**
     * Remove the specified resource from storage.
     * @return Response
     */
    public function destroy($id)
    {
        $entry = Entry::find($id);
        $entry->delete();

        return redirect()
            ->back()
            ->with('message_danger', 'Entrada eliminada correctamente');
    }

    public function getEntries()
    {

        $entries = Entry::select(['id','title','slug', 'body','status', 'cover','tags','created_at', 'category_id', 'publication_date', 'views']);
        return Datatables::of($entries)
            ->addColumn('preview', function ($entry) {
                return "<p><b>$entry->title</b></p>".
                        "<img src='".asset('storage/'.$entry->cover)."' class='image-entry'/>";
            })
            ->addColumn('content', function ($entry) {
                return "<p>".strip_tags(substr($entry->body, 0, 250).'...', '')."</p>".
                        "<p class='mb0'>Etiquetas: <b>".str_replace(',', ', ',$entry->tags)."</b></p>".
                        "<p class='mb0'>Categoría: <b>".$entry->category->name."</b></p>".
                        "<p class='mb0'>Estatus: <b>".($entry->status==1 ? 'Activo':'Inactivo')."</b></p>".
                        "<p class='mb0'>Publicado: <b>".($entry->publication_date != null ? $entry->publication_date : 'No asignado')."</b></p>".
                        "<p class='mb0'>URL del artículo: <a target='_blank' class='link' href='".route('show.blog', $entry->slug)."'>".route('show.blog', $entry->slug)."</a></p>".
                        "<p class='mb0'>Visitas: <b>".$entry->views."</b></p>";
            })
            ->addColumn('form', function ($entry) {
                return "<form method='POST' action='".route('delete.entry',$entry->id)."'>".
                csrf_field() .
                "<button class='btn btn-danger btn-xs button-mb' onclick='return confirm();' type='submit'>".
                "<i class='fas fa-trash-alt icon-special-size'></i>Eliminar</button>".
                "</form>".
                "<a href='".route('show.blog', $entry->slug)."' class='btn btn-xs info button-mb' target='new'>".
                "<i class='fas fa-eye icon-special-size'></i>Ver</a>".
                "<br><a href='".route('blog.admin.entry.edit', $entry->id)."' class='btn btn-xs accent mb0'>".
                "<i class='fas fa-edit icon-special-size'></i>Editar</a>";
            })
            ->filterColumn('preview', function($query, $keyword) {
                $query->whereRaw("title like ?", ["%{$keyword}%"]);
            })
            ->filterColumn('form', function($query, $keyword) {
                $query->whereRaw("title like ?", ["%{$keyword}%"]);
            })
            ->filterColumn('content', function($query, $keyword) {
                $query->whereRaw("tags like ?", ["%{$keyword}%"]);
            })
            ->order(function ($query) {
                    if (request()->has('preview')) {
                        $query->orderBy('title', 'asc');
                    }

                    if (request()->has('content')) {
                        $query->orderBy('title', 'desc');
                    }

                    if (request()->has('form')) {
                        $query->orderBy('title', 'asc');
                    }
                })
            ->rawColumns(['preview', 'content', 'form'])
            ->make();
        
    }

    public function deleteCover($id)
    {
        $entry = Entry::find($id);
        $entry->cover = null;
        $entry->save();

        return redirect()
                ->back()
                ->with('message_success', 'Imagen eliminada correctamente');
    }
}
