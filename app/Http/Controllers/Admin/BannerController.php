<?php

namespace App\Http\Controllers\Admin;
use App\Banner;
use App\Http\Controllers\Controller;
use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use App\Post;
use Illuminate\Http\Request;

class BannerController extends Controller
{
    public function index()
    {

        $banners = Banner::all();
        return view('admin.banner.index', compact('banners'));
    }

    public function create()
    {
        return view('admin.banner.create');
    }

    public function edit(Banner $banner)
    {
        return view('admin.banner.edit', compact('banner'));
    }

    public function store(StorePostRequest $request)
    {
        $file = $request->image;
        $imgaeName = convert_slug($request->title).'-'.time().'.'.$file->getClientOriginalExtension();
        $dataPost = array(
            'title' => $request->title,
            'description' => $request->description,
            'status' => isset($request->status)?$request->status:0,
            'image' => $imgaeName,

        );
        $a = $file->move('upload/banner', $imgaeName);
        if ($a && Banner::create($dataPost)){
            return redirect()->route('admin.banner');
        }
        return view('admin.banner.create');

    }

    public function update(UpdatePostRequest $request)
    {
        $banner = Banner::where('id',$request->id)->first();
        $banner->title = $request->title;
        $banner->description = $request->description;
        $banner->status = isset($request->status)?$request->status:0;


        if(isset($request->image) && !empty($request->image)){
            $file = $request->image;
            $banner->image = convert_slug($request->title).'-'.time().'.'.$file->getClientOriginalExtension();
            $file->move('upload/banner', $banner->image);
        }
        if ($banner->save()){
            return redirect()->route('admin.banner.index');
        }
        return redirect()->route('admin.banner.edit',$request->id);

    }
    public function destroy(Request $request)
    {
        $baner = Banner::where('id',$request->id)->first();
        $baner->delete();
        return back();
    }

}
