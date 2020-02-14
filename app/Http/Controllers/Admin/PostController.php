<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Http\Requests\StorePostRequest;
use App\Post;


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
                return redirect()->route('admin.post');
            }
        return view('admin.post.create');

    }

    function convert_slug($string ){
        return strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $string)));
    }

    public function edit(Product $product)
    {
        abort_unless(\Gate::allows('product_edit'), 403);

        return view('admin.products.edit', compact('product'));
    }

    public function update(UpdateProductRequest $request, Product $product)
    {
        abort_unless(\Gate::allows('product_edit'), 403);

        $product->update($request->all());

        return redirect()->route('admin.products.index');
    }

    public function show(Product $product)
    {
        abort_unless(\Gate::allows('product_show'), 403);

        return view('admin.products.show', compact('product'));
    }

    public function destroy(Product $product)
    {
        abort_unless(\Gate::allows('product_delete'), 403);

        $product->delete();

        return back();
    }

    public function massDestroy(MassDestroyProductRequest $request)
    {
        Product::whereIn('id', request('ids'))->delete();

        return response(null, 204);
    }
}
