<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use Mail;
use Session;


class PageController extends Controller
{
    //
    public function getIndex(){
    	$posts = Post::orderBy('created_at')->take(5)->get();
    	return view('home1')->withPosts($posts);
    }

    public function getSingle($slug){
    	$post = Post::where('slug', '=', $slug)->first();
    	return view('single')->withPost($post);
    }

    public function getArchive(){
    	$posts = Post::paginate(10);
    	return view('archive')-》withPosts($posts);
    }

    public function getContact(){
        return view('contact');
    }

    public function postContact(Request $request){
        //
        $this->validate($request, [
            'email'=>'email|required',
            'text'=>'min:10',
            'subject'=>'min:3'
            ])


    }

}
