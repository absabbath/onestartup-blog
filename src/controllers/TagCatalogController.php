<?php

namespace Onestartup\Blog\Controller;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Yajra\Datatables\Datatables;

use Onestartup\Blog\Model\EntryTag as TagCatalog;

class TagCatalogController extends Controller
{

    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        $tags = TagCatalog::paginate(25);

        return view('blog::tags.index')
            ->with('tags', $tags);
    }

    /**
     * Store a newly created resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        $tag = new TagCatalog($request->all());
        $tag->save();

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
        $tag = TagCatalog::find($id);

        return view('blog::tags.edit')
            ->with('tag', $tag);
    }

    /**
     * Update the specified resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function update(Request $request, $id)
    {
        $tag = TagCatalog::find($id);
        $tag->fill($request->all());
        $tag->save();

        return redirect()
            ->back()
            ->with('message_success', 'Tag actualizado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     * @return Response
     */
    public function destroy($id)
    {
        $tag = TagCatalog::find($id);
        $tag->delete();

        return redirect()
            ->back()
            ->with('message_danger', 'Tag eliminado correctamente');
    }
}
