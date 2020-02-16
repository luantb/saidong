<?php

namespace App\Http\Controllers\Admin;

use App\Banner;
use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Http\Requests\StorePostRequest;
use App\Post;
use App\Product;
use http\Client\Request;


class PostController extends Controller
{
    public function index()
    {

        $posts = Post::all();
        return view('admin.post.index', compact('posts'));
    }

    public function create()
    {

        return view('admin.post.create');
    }

    public function edit(Post $post)
    {

        return view('admin.post.edit', compact('post'));
    }

    public function store(StorePostRequest $request)
    {
        $file = $request->image;
        $imgaeName = convert_slug($request->title).'-'.time().'.'.$file->getClientOriginalExtension();
        $dataPost = array(
            'title' => $request->title,
            'seo_url' => $this->convert_slug($request->title).'-'.time(),
            'description' => $request->description,
            'keywords' => $request->keywords,
            'content' => $request['content'],
            'is_top' => isset($request->is_top)?$request->is_top:0,
            'type' => $request->type,
            'status' => isset($request->status)?$request->status:0,
            'image' => $imgaeName,

        );
        $a = $file->move('upload/post', $imgaeName);
            if ($a && Post::create($dataPost)){
                return redirect()->route('admin.post.index');
            }
        return view('admin.post.create');

    }

    function convert_slug($string ){
        return strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $string)));
    }



    public function update(Requests\UpdatePostRequest $request)
    {
        $post = Post::where('id',$request->id)->first();
        $post->title = $request->title;
        $post->description = $request->description;
        $post->status = $request->status;
        $post->seo_url = $this->convert_slug($request->title);
        $post->keywords = $request->keywords;
        $post->content = $request['content'];
        $post->content = isset($request->is_top)?$request->is_top:0;
        $post->type = $request->type;
        $post->status = isset($request->status)?$request->status:0;

        if(isset($request->image) && !empty($request->image)){
            $file = $request->image;
            $post->image = convert_slug($request->title).'-'.time().'.'.$file->getClientOriginalExtension();
            $file->move('upload/post', $post->image);
        }
        if ($post->save()){
            return redirect()->route('admin.post.index');
        }
        return redirect()->route('admin.post.edit',$request->id);

    }

    public function showPost(\Illuminate\Http\Request $re)
    {
        $post = Post::where('id',$re->id)->first();
        $post->status =1;
        $post->save();
        return back();
    }

    public function destroy(Post $post)
    {
        $post->delete();
        return back();
    }
    public function hide(\Illuminate\Http\Request $re)
    {
        $post = Post::where('id',$re->id)->first();
        $post->status =0;
        $post->save();
        return back();
    }

    public function massDestroy(MassDestroyProductRequest $request)
    {
        Product::whereIn('id', request('ids'))->delete();

        return response(null, 204);
    }
}
