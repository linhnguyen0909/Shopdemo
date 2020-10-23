<?php

namespace App\Http\Controllers;

use App\Http\Requests\UploadFileRequest;
use App\Models\FileUpload;
use Flugg\Responder\Responder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use function Composer\Autoload\includeFile;

class FileController extends Controller
{
    public function store( UploadFileRequest $request,Responder $responder)
    {
        $request->validated();
        $fileUpload= new FileUpload();
        if ($request->file('images')){
            $imagePath=$request->file('images');
            $imageName=$imagePath->getClientOriginalName();
            $path=$request->file('images')->storeAs('/app',$imageName,'public');
        }
        $fileUpload->name=$request->name;
        $fileUpload->image='/storage/'.$path;
        $fileUpload->save();
        return $responder->success($fileUpload->toArray());
    }
    public function getImage(){
        $path = storage_path() . "/app/1603428578.jpeg";
        return File::get($path);
    }
}
