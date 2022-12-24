<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;

final class MediaController extends Controller
{
    public function upload(Request $request)
    {
        $uploadedFileUrl = Cloudinary::uploadFile($request->file('uploadFile')->getRealPath())->getSecurePath();
        dd($uploadedFileUrl);
    }
}
