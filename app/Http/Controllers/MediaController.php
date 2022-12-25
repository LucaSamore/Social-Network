<?php

namespace App\Http\Controllers;

use App\Http\Requests\ImageRequest;
use App\Http\Requests\VideoRequest;
use Illuminate\Http\Request;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;

final class MediaController extends Controller
{
    public function uploadImage(ImageRequest $request)
    {
        $request->validated();
        $uploadedFileUrl = Cloudinary::upload($request->file('image')->getRealPath())->getSecurePath();
        dd($uploadedFileUrl);
        // file url must be stored inside images table
    }

    public function uploadVideo(VideoRequest $request)
    {
        $request->validated();
        $uploadedFileUrl = Cloudinary::uploadVideo($request->file('video')->getRealPath())->getSecurePath();
        dd($uploadedFileUrl);
        // file url must be stored inside videos table
    }
}
