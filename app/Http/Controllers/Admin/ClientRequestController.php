<?php

namespace App\Http\Controllers\Admin;

use App\ClientRequest;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ClientRequestController extends Controller
{
    public function index()
    {

        $clients = ClientRequest::orderBy('created_at','DESC')->get();

        return view('admin.clrequest.index', compact('clients'));
    }
    public function edit($id)
    {

        $clients = ClientRequest::where('id',$id)->first();
        if ($clients){
            $clients->status=1;
            $clients->save();
        }
        return back();
    }
}
