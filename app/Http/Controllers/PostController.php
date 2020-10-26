<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatePostRequest;
use App\Models\Post;
use Flugg\Responder\Responder;
use Illuminate\Http\Request;
use Webpatser\Uuid\Uuid;
use function GuzzleHttp\Promise\all;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Responder $responder)
    {
        return $responder->success(Post::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreatePostRequest $request,Responder $responder)
    {
        $request->validated();
        $post = new Post();
        $post->fill($request->all())->save();
        return $responder->success($post->toArray());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post,Responder $responder)
    {
        return $responder->success($post->toArray());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post,Responder $responder)
    {
        $updated = $post->fill($request->all())->save();
        return $responder->success();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post,Responder $responder)
    {
        $post->delete();
        return $responder->success();
    }

}
