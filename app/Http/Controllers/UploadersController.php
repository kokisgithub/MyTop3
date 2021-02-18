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
        return view('uploader.index')->with('user', $user);
    }
    
    public function confirm(UploaderRequest $request){
        $user = Auth::user();
        $image_name = uniqid("IMAGE_") . "." . $request->file('image')->guessExtension(); 
        $request->file('image')->move(public_path() . "/img/tmp", $image_name);
        $image = "/img/tmp/".$image_name;
        
        return view('uploader.confirm');
    }

    public function finish(UploaderRequest $request){
        $user = Auth::user();
        $uploader = new Uploader;
        $uploader->user_id = $user->id;
        $uploader->image = $request->image;
        $uploader->save();

        $lastInsertedId = $uploader->id;

        if (!file_exists(public_path() . "/img/" . $lastInsertedId)) {
            mkdir(public_path() . "/img/" . $lastInsertedId, 0777);
        }

        rename(public_path() . $request->image, public_path() . "/img/" . $lastInsertedId . "/image." .pathinfo($request->image, PATHINFO_EXTENSION));

        return view('uploader.finish');
    }

}
