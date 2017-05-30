<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class PageController extends Controller
{
    //
    public function getIndex(){
    	$posts = Post::orderBy('created_at')->take(5)->get();
    	return view('home')->withPosts($posts);
    }

    public function getSingle($slug){
    	$post = Post::where('slug', '=', $slug)->first();
    	return view('single')->withPost($post);
    }

    public function getArchive(){
    	$posts = Post::paginate(10);
    	return view('archive')-》withPosts($posts);
    }

}
