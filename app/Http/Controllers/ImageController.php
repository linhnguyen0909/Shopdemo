<?php

namespace App\Http\Controllers;

use App\Models\Photo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class ImageController extends Controller
{
    public function imageUpload()
    {
//        $a=base64_encode(file_get_contents('http://shopdemo.test/storage/images/1604052711.jpg'));
//        dd($a);
        return view('imageUpload');
    }

    public function imageUploadPost(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        $file_name = time().'.'.$request->image->getClientOriginalExtension();
        Storage::disk('public')->put('images/'.$file_name, FILE::get($request->image));
        $data = [
            'file_name' => $file_name,
            'size' => $request->image->getSize(),
            'mime_type' => $request->image->getMimeType(),
            'path' => url(Storage::url('images/'.$file_name)),
            'base64'=>base64_encode(file_get_contents($request->image)),
        ];
        $photo = new Photo();
       $photo->title='123123';
        $photo->image =$data['path'];
        $photo->save();
        return 'Success';
    }

    public function index()
    {
        $photo = Photo::all();
        $image = $photo->pluck('image')->last();
        return $image;

    }

}
