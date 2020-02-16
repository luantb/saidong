<?php

namespace App\Http\Controllers;

use App\Banner;
use App\ClientRequest;
use App\LandingPage;
use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class HomeController extends Controller
{


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $banners = Banner::where('status',1)->get();
        $listNews = Post::where(['status'=>1,'type'=>1])->limit(4)->get();
        $listProduct = Post::where(['status'=>1,'type'=>2])->limit(3)->get();
        $listPanel  = LandingPage::with(['gallerys'])->where(['status'=>1])->orderBy('order_number')->get();
        return view('home',compact('banners','listNews','listProduct','listPanel'));
    }

    public function contact()
    {

        return view('contact');
    }
    public function sendRequest(Request $request)
    {
        ClientRequest::create([
            'name'=>$request->name,
            'phone'=>$request->phone,
            'email'=>isset($request->email)?$request->email:'',
            'status'=>0,
    ]);
        Session::flash('mgs', "Gửi yêu cầu thành công !");

        return back();
    }
}
