<?php

namespace Onestartup\Blog\Controller;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Yajra\Datatables\Datatables;

class AdminBlogController extends Controller
{

    public function list()
    {
    	return view('blog::list');
    }

    /*public function datatable()
    {
    	$interesteds = Interested::select(['id','name','email', 'phone','landing','origin','created_at'])->orderBy('id', 'desc');

        return Datatables::of($interesteds)
        ->addColumn('details_url', function ($interested) {
            return "<a href='".route('crm.show',$interested->id)."'>Ver Detalle</a>";
        })
        ->rawColumns(['details_url'])
        ->make();
    }*/

    /*public function show($id)
    {
        $interested = Interested::find($id);

        return view('crm::show')
            ->with('interested', $interested);
    }

    public function storeTracing(Request $request, $id)
    {
        $interested = Interested::find($id);
        $comment = new Tracing($request->all());
        $comment->user_id = \Auth::user()->id;

        $interested->tracings()->save($comment);

        return redirect()
            ->back()
            ->with('message_success', 'Información agregada correctamente');
    }*/
}
