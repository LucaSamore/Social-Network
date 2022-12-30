<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostRequest;
use App\Models\Post;
use App\Models\Image;
use Illuminate\Support\Facades\Storage;

use Illuminate\Http\Request;

final class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request\PostRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostRequest $request)
    {
        $request->validated();


        /*Bisogna prendere l'id dell'utente che pubblica il post dalla sessione*/
        $user_id = '0198cc50-2b38-3a65-9216-90aca113f6bc';
        $user_id = $request->session()->get("user_id");
        echo "ID:".$user_id;

        /*SAVE THE POST*/
        $post = new Post(['user_id' => $user_id, 'textual_content' => $request->input('textual_content'), ]);
        $post->save();

        //save the image in a folder 
        /*if per controllare se l'immagine è presente*/
        if($request->hasFile('photoPath')){
            $path = $request->file("photoPath")->path();
            $extension = $request->file("photoPath")->extension();
            //$size = $request->file("photoPath")->getSize();
            //echo "SIZE:".$size;
            /*if per controllare estensione e dimensione file*/
            $validExtensions = array("png", "jpeg","jpg");
            //$MAX_SIZE_IMAGE = ;
            if (in_array( $extension, $validExtensions) /*&& extension <= MAX_SIZE_IMAGE*/){
                //echo $path."\n";
                //echo $extension."\n";
                $path = $request->file('photoPath')->storeAs(
                    "public/images/".$user_id, $post->id.".".$extension
                );
                Storage::setVisibility($path, 'private');
                $image = new Image(['post_id' => $post["id"], 'path' => "/storage/".$path]);
                $image->save();
                
                $url = Storage::url($path);
                echo "URL:".asset($path);
    
                /*$contents = Storage::get($path);
                echo "CONTENT:".$contents;*/
                //echo $request[""]."\n";
                return $request->input('textual_content') . " published <img src='".asset($url)."'/>" ;
        }
        return "post saved without image.";
    }
}

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show($post)
    {
        /*$data = [
            /*"username" => "username",
            /*"textual_content" => $post->textual_content,
            /*"number_of_likes" => 0/*$post->number_of_likes,
            /*"number_of_comments" => 0 /*$post->number_of_comments,
            /*"photo_path" => "",
        ];*/
        $data = Post::findOrFail($post)->user()->first();
        echo $data->username;
        dd($data);
        return View("post", $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        //
    }
}
