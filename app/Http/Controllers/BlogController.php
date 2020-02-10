<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;
use Auth;

class BlogController extends Controller
{
    public function index()
    {

        if(Auth::user()->role == 'author'){
            $blogs = Blog::where('user_id',Auth::user()->id)->get();
        }else{
            $blogs = Blog::all();
        }

        return view('blog.index', [
           'blogs' => $blogs
        ]);
    }

    public function create()
    {
        return view('blog.create');
    }

    public function store(Request $request)
    {
        // dd($request);
        $data = $request->validate([
            'user_id' => 'required',
            'title' => 'required',
            'description' => 'nullable',
        ]);

        try{
            \DB::transaction(function () use($data) {
                Blog::create( $data );
            });
        }
        catch( \Exception $e ){
            \Log::info('BlogController store() : ' . $e );
        }

        return redirect()->route('blog.index');
    }

    public function edit(Blog $blog)
    {
        return view('blog.edit', [
            'blog' => $blog,
        ] );
    }

    public function show(Request $request)
    {
    
    }

    public function update(Request $request, Blog $blog)
    {
        $data = $request->validate([
            'user_id' => 'required',
            'title' => 'required',
            'description' => 'nullable',
        ]);

        try{
            \DB::transaction(function () use($data, $blog) {
                $blog->update( $data );
            });
        }
        catch( \Exception $e ){
            \Log::info('BlogController Update() : ' . $e );
        }

        return redirect()->route('blog.index')->with('success','Blog updated successfully');
    }

    public function destroy(Blog $blog)
    {
        $blog->delete();
        return redirect()->route('blog.index')->with('success','Blog deleted successfully');
    }
}
