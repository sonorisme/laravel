<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use Session;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index()
    {
        //
        //$posts = Post::all();
        $posts = Post::orderBy('id', 'desc')->paginate(3);
        return view('index')->withPosts($posts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $this->validate($request, array(
                'title'=>'required|max:255|unique:posts,title',
                'body'=>'required'
            ));
        $post = new Post;
        $post->title = $request->title;
        $post->body = $request->body;
        $post->slug = implode('-', explode(' ', $request->title));
        $post->save();

        return redirect()->route('posts.show', $post->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $post = Post::find($id);
        return view('show')->withNew($post);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $post = Post::find($id);
        return view('edit')->withPost($post);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        if($request->title != Post::find($id)->title){
            $this->validate($request, array(
                'title'=>'unique:posts,title'
            ));
        }
        $this->validate($request, array(
                'title'=>'required|max:255',
                'body'=>'required'
            ));
        $post = Post::find($id);
        $post->title = $request->title;
        $post->body = $request->body;
        $post->slug = implode('-', explode(' ', $request->title));
        $post->save();
        Session::flash('success', 'Updated Successfully!');
        //return view('show')->with
        return redirect()->route('posts.show', $post->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $post = Post::find($id);
        $post->delete();
        Session::flash('success','Deleted Successfully!');
        return redirect()->route('posts.index');
    }
}
