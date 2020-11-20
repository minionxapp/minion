<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UploadController extends Controller
{
    
    
        public function showimage()
        {
            // return "aaaaa";
            return view("/walet/showimages");
        }
        public function upload()
        {
            return view('/walet/upload');
        }
    
        public function store(Request $request)
        {
            $this->validate($request, [
                'featured_image' => 'required|file|max:7000', // max 7MB
            ]);
            // $path = Storage::putFile('public/images', $request->file('featured_image'),  );
            $fileName = $request->file('featured_image')->getClientOriginalName(); //Get Image Name
            // $extension = $request->file('featured_image')->getClientOriginalExtension();  //Get Image Extension
            $path = Storage::putFileAs('public\images', $request->file('featured_image') , $fileName);
            return redirect()
                ->back()
                ->withSuccess("Image succes Uploaded in " . $path);
        }









}
