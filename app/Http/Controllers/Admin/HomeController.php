<?php

namespace App\Http\Controllers\Admin;

use App\Gallery;
use App\Http\Requests\storeLdPageRequest;
use App\LandingPage;
use App\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class HomeController
{
    public function index()
    {
        $setting = Setting::find(1);
        return view('admin.setting',compact('setting'));
    }
    public function store(Request $request)
    {
        $panel = Setting::find(1);
        $panel->hotline = $request->hotline;
        $panel->project_name = $request->project_name;
        $panel->address = $request->address;
        $panel->email = $request->email;
        $panel->facebook = isset($request->facebook)?$request->facebook:'';
        $panel->zalo = isset($request->zalo)?$request->zalo:'';
        $panel->contact_info = isset($request->contact_info)?$request->contact_info:'';

        if($request->baner_contact){
            $file = $request->baner_contact;
            $imgaeName = "baner-contact".'-'.time().'.'.$file->getClientOriginalExtension();
            if($file->move('upload/setting', $imgaeName)){
                $panel->baner_contact = $imgaeName;
            };
        }

        if ($panel->save()){
            Session::flash('success', 'Cập nhật thành công');
        }else{
            Session::flash('error', 'Có lỗi sảy ra vui lòng thử lại');
        }
        return redirect()->route('admin.home.index');




    }

}
