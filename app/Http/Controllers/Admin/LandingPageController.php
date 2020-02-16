<?php

namespace App\Http\Controllers\Admin;

use App\Banner;
use App\Gallery;
use App\Http\Controllers\Controller;
use App\Http\Requests\storeLdPageRequest;
use App\Http\Requests\StorePostRequest;
use App\LandingPage;
use App\Post;
use Illuminate\Http\Request;

class LandingPageController extends Controller
{
    public function index()
    {

        $panels = LandingPage::get();
        return view('admin.landingPage.index', compact('panels'));
    }

    public function create()
    {
        return view('admin.landingPage.create');
    }

    public function edit( $id)
    {
        $panel = LandingPage::with(['gallerys'])->where('id',$id)->first();
        return view('admin.landingPage.edit', compact('panel'));
    }

    public function store(storeLdPageRequest $request)
    {
        if ($request->id){
            $panel = LandingPage::where('id',$request->id)->first();
        }else{
            $panel = new LandingPage();
        }
        $panel->title = $request->title;
        $panel->slug_title = convert_slug($request->title);
        $panel->position = isset($request->position)?$request->position:0;
        $panel->page_type = $request->page_type;
        $panel->content = isset( $request['content'])? $request['content']:'';
        $panel->status = isset($request->status)?$request->status:0;
        $panel->in_menu = isset($request->in_menu)?$request->in_menu:0;
        $panel->order_number = isset($request->order_number)?$request->order_number:0;
        $panel->menu_name = isset($request->menu_name)?$request->menu_name:'';
        $panel->type = isset($request->type)?$request->type:0;

        if ($panel->save() ){
            if (isset($request->image) && count($request->image) >0){
                foreach ($request->image as $key=>$file ){
                    $imgaeName = convert_slug($request->title).'-'.$key.'-'.time().'.'.$file->getClientOriginalExtension();
                    if ( $file->move('upload/gallery', $imgaeName)){
                        Gallery::create(array(
                            'panel_id'=>$panel->id,
                            'name'=>$imgaeName,
                        ));
                    }
                }
            }
            return redirect()->route('admin.landingPage.index');
        }
        return view('admin.landingPage.create');

    }

    public function destroy(Request $request)
    {
        $panel = LandingPage::where('id',$request->id)->first();
        if ($panel->slug_title !="lien-he" || $panel->slug_title !="san-pham" || $panel->slug_title !="tin-tuc" ){
            $panel->delete();
        }
        return back();
    }
    public function deleteImage(Request $request)
    {
        $gallery = Gallery::where('id',$request->i_id)->first();
        if ($gallery->delete()){
            return response()->json(['status'=>'success','mgs'=>'Xóa thành công']);
        }else{
            return response()->json(['status'=>'error','mgs'=>'Có lỗi xảy ra']);
        }

    }
}
