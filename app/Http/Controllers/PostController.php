<?php

namespace App\Http\Controllers;

use App\Banner;
use App\LandingPage;
use App\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $posts = Post::where(['status'=>1,'type'=>1])->get();

        return view('post',compact('posts'));
    }
    public function view($slug)
    {
        $post = Post::where(['seo_url'=>$slug])->first();

        return view('detail',compact('post'));
    }
}
