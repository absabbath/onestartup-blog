<?php

namespace Onestartup\Blog\Controller;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Yajra\Datatables\Datatables;
use Onestartup\Blog\Model\EntryCategory as Category;
use Onestartup\Blog\Model\EntryTag as TagCatalog;
use Onestartup\Blog\Model\Entry;

class BlogController extends Controller
{
    public function index(Request $request)
    {
        if(isset($request->category)){
            $category = Category::where('slug', $request->category)->first();
            $posts = $category->entries()->where('status',1)->orderBy('publication_date', 'asc')->paginate(15);
        } elseif (isset($request->tags)) {
            $tags = explode(",", $request->tags);
            $posts = Entry::where('status',1)->where(function ($query) use($tags) {
                for ($i = 0; $i < count($tags); $i++){
                    $query->orwhere('tags', 'like',  '%' . $tags[$i] .'%');
                }      
            })->orderBy('publication_date', 'asc')->paginate(15);
           
        } else {
            $posts = Entry::where('status',1)->orderBy('publication_date', 'asc')->paginate(3);
        }
        $otros = Entry::where('status',1)->inRandomOrder()->take(3)->get();
        $categories = Category::where('active', 1)->get();
        
        return view('blog::post.list')
            ->with('categories', $categories)
            ->with('otros', $otros)
            ->with('posts', $posts);
    }

    public function show($slug)
    {
        $post = Entry::where('slug',$slug)->first();
        $post->increment('views');
        $tags = explode(",", $post->tags);
        

        $otros = Entry::where('id', '!=', $post->id)->where('status',1)->where(function ($query) use($tags) {
             for ($i = 0; $i < count($tags); $i++){
                $query->orwhere('tags', 'like',  '%' . $tags[$i] .'%');
             }      
        })->take(3)->get();
        
        $categories = Category::all();

        if ($post != null) {
            if ($post->status == 2) {
                return redirect('inactivo');
            }
        } else {
            return redirect('no_existe');
        }

        

        return view('blog::post.single')
            ->with('post', $post)
            ->with('categories', $categories)
            ->with('otros', $otros);
    }
}
