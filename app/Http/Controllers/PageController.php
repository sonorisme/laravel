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
}
