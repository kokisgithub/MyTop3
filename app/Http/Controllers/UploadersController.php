<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Uploader;
use App\Http\Requests\UploaderRequest;

class UploadersController extends Controller
{
    public function getIndex(){
        $user = Auth::user();
        $uploader = Uploader::where('user_id', $user->id)->latest()->first();
        return view('uploader.index', [
            'user'            =>  $user,
            'uploader'        =>  $uploader,
        ]);
    }
    
    public function upload(UploaderRequest $request){
        $user = Auth::user();
        $imageName = $request->file('image')->getClientOriginalName(); 
        $extension = $request->file('image')->getClientOriginalExtension();
        $newImageName = pathinfo($imageName, PATHINFO_FILENAME) . "_" . uniqid() . "." . $extension;
        $path = $request->file('image')->storeAs('public', $newImageName);
        $filename = basename($path);

        $uploader = new Uploader();
        $uploader->user_id = $user->id;
        $uploader->image = $filename;
        $uploader->save();
        
        return redirect('/uploaders');
    }

}