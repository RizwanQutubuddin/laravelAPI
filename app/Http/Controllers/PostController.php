<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json(Post::all());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $post=new Post;
        $post->title=$request->title;
        $post->description=$request->description;
        $post->save();
        return response()->json([
            'message'=>'Post Create',
            'state'=>'success',
            'data'=>$post
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        return response()->json(['post'=>$post]);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        $post->title=$request->title;
        $post->description=$request->description;
        $post->save();
        return response()->json([
            'message'=>'Post Updated',
            'state'=>'success',
            'data'=>$post
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        $post->delete();
        return response()->json([
            'message'=>'Post deleted',
            'state'=>'success'
        ]);
    }

    public function render($request,Throwable $e){
        if($request->is('api/*')){
            return response()->json([
                'message'=>'Record not found',
            ],400); 
        }
    }
}
