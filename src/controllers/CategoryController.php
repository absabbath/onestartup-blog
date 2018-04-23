<?php

namespace Onestartup\Blog\Controller;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Yajra\Datatables\Datatables;

use Onestartup\Blog\Model\EntryCategory as Category;

class CategoryController extends Controller
{    
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        $categories = Category::paginate(25);

        return view('blog::category.index')
            ->with('categories', $categories);
    }

    /**
     * Store a newly created resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        $category = new Category($request->all());

        if (isset($request->portada)) {
            
            $file = $request->file('portada');
            $nombre = $file->getClientOriginalName();
            $nombre_file = str_replace(' ', '_', $nombre);
            $ubicacion_donde_guarda ='categories/'.$nombre_file;
            \Storage::disk('local')->put($ubicacion_donde_guarda,  \File::get($file));
            $category->cover = $ubicacion_donde_guarda;
            
        } 

        $category->save();

        return redirect()
            ->back()
            ->with('message_success', 'Categoria añadida correctamente');
    }

    /**
     * Show the form for editing the specified resource.
     * @return Response
     */
    public function edit($id)
    {   
        $category = Category::find($id);

        return view('blog::category.edit')
            ->with('category', $category);
    }

    /**
     * Update the specified resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function update(Request $request, $id)
    {
        $category = Category::find($id);
        $category->fill($request->all());

        if (isset($request->portada) && $request->portada != null ) {
            
            $file = $request->file('portada');
            $nombre = $file->getClientOriginalName();
            $nombre_file = str_replace(' ', '_', $nombre);
            $ubicacion_donde_guarda ='categories/'.$nombre_file;
            \Storage::disk('local')->put($ubicacion_donde_guarda,  \File::get($file));
            $category->cover = $ubicacion_donde_guarda;
            
            
        }

        $category->save();

        return redirect()
            ->back()
            ->with('message_success', 'Categoria actualizado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     * @return Response
     */
    public function destroy($id)
    {
        $category = Category::find($id);
        $category->delete();

        return redirect()
            ->back()
            ->with('message_danger', 'Categoria eliminada correctamente');
    }

    public function deleteCover($id)
    {
        $entry = Category::find($id);
        $entry->cover = null;
        $entry->save();

        return redirect()
                ->back()
                ->with('message_success', 'Imagen eliminada correctamente');
    }
}
