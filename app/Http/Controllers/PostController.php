<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use Session;
use App\Category;
use App\Tag;

class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

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
        $categories = Category::all();
        $tags = Tag::all();
        return view('create')->withCategories($categories)->withTags($tags);
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
        //dd($request);
        $this->validate($request, array(
                'title'=>'required|max:255|unique:posts,title',
                'body'=>'required',
                'category'=>'required|integer'
            ));
        $post = new Post;
        $post->title = $request->title;
        $post->body = $request->body;
        $post->category_id = $request->category;
        $post->slug = implode('-', explode(' ', $request->title));
        $post->save();
        $post->tags()->sync($request->tag, false);

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
        $categories = Category::all();
        $cats = array();
        foreach ($categories as $category) {
            $cats[$category->id] = $category->name;
        }
        $post = Post::find($id);
        
        $tags = Tag::all();
        $tags1 = array();
        foreach ($tags as $tag) {
            $tags1[$tag->id] = $tag->name;
        }

        $value = [];
        foreach ($post->tags as $key) {
            $value[] = $key->id;
        }

        return view('edit')->withPost($post)->withCategories($cats)->withTags($tags1)->withValue($value);
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
                //in posts table's title column
            ));
        }
        $this->validate($request, array(
                'title'=>'required|max:255',
                'body'=>'required'
            ));
        $post = Post::find($id);
        $post->title = $request->title;
        $post->category_id = $request->category;
        $post->body = $request->body;
        $post->slug = implode('-', explode(' ', $request->title));
        $post->save();

        if($request->tag){
            $post->tags()->sync($request->tag);
        } else{
            $post->tags()->sync([]);
        }
        Session::flash('success', 'Updated Successfully!');

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
        $post->tags()->detach();
        $post->delete();
        Session::flash('success','Deleted Successfully!');
        return redirect()->route('posts.index');
    }
}
